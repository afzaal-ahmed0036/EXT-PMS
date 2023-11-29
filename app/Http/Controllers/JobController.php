<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Job;
use App\Models\User;
use App\Models\Notification;
use Session;
use PDF;
use File;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = null)
    {
        $pagetitle='Jobs';
        if(Session::get('UserType') == 'Admin'){
            if(!is_null($status))
                $jobs = Job::where('JobStatus',$status)->get();
            else
                $jobs = Job::get();

        }
        else{
            $user = User::where('UserID',Session::get('UserID'))->first();
            if(!is_null($status))
                $jobs = $user->jobs->where('JobStatus',$status);
            else
                $jobs = $user->jobs;
        }
        
        return view('job.index',compact('pagetitle','jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagetitle='Add Job';
        $users = User::where('UserType','User')->get();
        $estimates = DB::table('v_estimate_master')->get();
        return view ('job.create',compact('pagetitle','users','estimates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'name'=>'required',
        ],
        [
        'name.required' => 'Project Name is required',
        ]);

        $input = $request->all();
        $input['created_by'] = session::get('UserID');

        if ($request->file('file'))
        {
             $this->validate($request, [

                'file' => 'required|mimes:jpeg,png,jpg,gif,svg,xlsx,pdf|max:1000',

            ],
            [
            'file.required' => 'Please upload file',
            ]);

             $file = $request->file('file');
             $input['file'] = time().'.'.$file->extension();

             $destinationPath = public_path('/documents/jobs');

             $file->move($destinationPath, $input['file']);

        }

        $job = Job::create($input);

        $job->users()->attach($input['user_id']);

        $notification = new Notification();
        $notification->user_id = $input['user_id'];
        $notification->job_id = $job->id;
        $notification->type = 'New Job Assigned to You';
        $notification->save();

        return redirect()->route('jobs.list')->with('error', 'Job Saved Successfully.')->with('class','success');
    }

    public function updateJobStatus(Request $request)
    {
        $JobDesc = DB::table('jobs')->where(['id' => $request->job_id])->first();

        $userJob = DB::table('user_job_reply')->insert(['UserID' => Session::get('UserID'), 'JobID' => $request->job_id,'UserJobStatus' => $request->job_status]);

        $Job = DB::table('jobs')->where(['id' => $request->job_id])->update(['JobStatus' => $request->job_status]);

        $notification = new Notification();
        $notification->user_id = $JobDesc->created_by;
        $notification->job_id = $request->job_id;
        $notification->type = 'Status Updated to '.$request->job_status;
        $notification->save();

        
        return redirect()->route('jobs.list')->with('error', 'Job status updated successfully!')->with('class','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pagetitle = 'View Job';
        $job = Job::findOrFail($id);
        $notification = Notification::where(['user_id' => Session::get('UserID'), 'job_id' => $id])->first();

        if($notification && $notification->read == 0){
           $notification->read = 1;
           $notification->save(); 
        }
            
        return view('job.show',compact('job','pagetitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->users()->detach();
        Notification::where('job_id',$id)->delete();
        $job->delete();
        return redirect()->route('jobs.list')->with('error','Job Deleted Successfully')->with('class','success');
    }

   public  function jobViewPDF($id)
   {
    $pagetitle = 'Jobs PDF';


    session::put('menu', 'SalesInvoice');
    $job = Job::findOrFail($id);

    $pdf = PDF::loadView('job.pdfView', compact('job', 'pagetitle'))->setOptions(['defaultFont' => 'sans-serif']);
    //return $pdf->download('pdfview.pdf');
    // $pdf->setpaper('A4', 'portiate');
    return $pdf->stream();

   }

     public function JobEdit($id)
  {
    // dd($id);
    $pagetitle = 'Job';
    $job = DB::table('jobs')->where('id', $id)->first();
    //dd($job->other_materials);
    $other_materials =   json_decode($job->other_materials); 

    $user_jobs = DB::table('user_jobs')->where('job_id', $job->id)->first();
    
    $estimates = DB::table('v_estimate_master')->get();
    $users = User::where('UserType','User')->get();
    
    return view('job.edit', compact( 'job','user_jobs','other_materials','estimates','users', 'pagetitle'));
  }


  public  function JobUpdate(request $request)
  {

     if ($request->file('file'))
        {
             $this->validate($request, [

                'file' => 'required|mimes:jpeg,png,jpg,xlsx,pdf|max:1000',
            ],
            [
            'file.required' => 'Please upload file',
            ]);

             $file = $request->file('file');
             $input['file'] = time().'.'.$file->extension();

             $destinationPath = public_path('/documents/jobs');

             $file->move($destinationPath, $input['file']);

            $image_name = $request->input('old_file');
            $image_path = public_path('/documents/jobs/'.$image_name);
            if(File::exists($image_path)) {
            File::delete($image_path);
            }

        }else{
            $input['file'] = $request->input('old_file');
        }


 
     $job_mst = array(
      'EstimateNo' => $request->input('EstimateNo'),
      'name' => $request->input('name'),
      'controller_type' => $request->input('controller_type'),
      'no_of_steps' => $request->input('no_of_steps'),
      'overspeed_governer_voltage' => $request->input('overspeed_governer_voltage'),
      'brake_voltage' => $request->input('brake_voltage'),
      'moter' => $request->input('moter'),
      'encoder_type' => $request->input('encoder_type'),
      'no_of_entrance' => $request->input('no_of_entrance'),      
      'resue' => $request->input('resue'),   
      'cabin_model' => $request->input('cabin_model'),   
      'doors' => $request->input('doors'),   
      'flooring' => $request->input('flooring'),   
      'ropes' => $request->input('ropes'),   
      'meters' => $request->input('meters'),   
      'bundle' => $request->input('bundle'), 
      'delivery_date' => $request->input('delivery_date'),      
      'door_type' => $request->input('door_type'),      
      'file' => $input['file'],
      'other_materials' => $request->input('other_materials'),
      'additional_details' => $request->input('additional_details'),
    );

    $Jobmaster = DB::table('jobs')->where('id', $request->JobID)->update($job_mst);

    
     

    return redirect('JobEdit/'.$request->JobID)->with('error', 'Job Saved')->with('class', 'success');
  }

}
