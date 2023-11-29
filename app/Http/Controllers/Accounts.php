<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
// for API data receiving from http source
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
// use Datatables;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
// for excel export
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
// end for excel export

use Session;
use DB;
use URL;
use Image;
use File;
use PDF;
use App\Models\Job;
use App\Models\User;
use App\Models\Company;

use Maatwebsite\Excel\Facades\Excel;

class Accounts extends Controller
{

    public function __construct()
    {
        if (session::get('UserID') == 1) {
            echo  "null";
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Dashboard()
    {
        session::put('menu', 'Dashboard');

        $pagetitle = 'Dashboard';

        if (Session::get('UserType') == 'Admin') {
            $totalJobs = Job::count();
            $inProgressJobs = Job::where('JobStatus', 'In-Progress')->count();
            $pendingJobs = Job::where('JobStatus', 'Pending')->count();
            $reviewedJobs = Job::where('JobStatus', 'Reviewed')->count();
            $completedJobs = Job::where('JobStatus', 'Completed')->count();
        } else {
            $user = User::where('UserID', Session::get('UserID'))->first();
            $totalJobs = $user->jobs->count();
            $inProgressJobs = $user->jobs->where('JobStatus', 'In-Progress')->count();
            $pendingJobs = $user->jobs->where('JobStatus', 'Pending')->count();
            $reviewedJobs = $user->jobs->where('JobStatus', 'Reviewed')->count();
            $completedJobs = $user->jobs->where('JobStatus', 'Completed')->count();
        }
        return view('dashboard', compact('pagetitle', 'totalJobs', 'inProgressJobs', 'completedJobs', 'pendingJobs', 'reviewedJobs'));
    }
    public  function Logout()
    {
        Session::flush(); // removes all session data
        return redirect('/')->with('error', 'Logout Successfully.')->with('class', 'success');
    }
    public function Login()
    {
        $company = Company::get();
        return view('login', compact('company'));
    }
    public function UserVerify(request $request)
    {
        $input = $request->only(['username', 'password']);


        $username = $input['username'];
        $password =  $input['password'];

        $data = DB::table('user')->where('Email', '=', $username)
            ->where('Password', '=', $password)
            ->where('Active', '=', 'Yes')
            ->get();
        $company = Company::get();

        if (count($data) > 0) {
            Session::put('FullName', $data[0]->FullName);
            Session::put('UserID', $data[0]->UserID);
            Session::put('Email', $data[0]->Email);
            Session::put('UserType', $data[0]->UserType);

            Session::put('Currency', $company[0]->Currency);
            Session::put('CompanyName', $company[0]->Name . ' ' . $company[0]->Name2);
            // Session::put('isAdmin', $data[0]->isAdmin);



            return redirect('Dashboard')->with('error', 'Welcome to ' . session::get('CompanyName') . ' Software')->with('class', 'success');
        } else {
            //session::flash('error', 'Invalid username or Password. Try again');
            return redirect('Login')->withinput($request->all())->with('error', 'Invalid username or Password. Try again')->with('class', 'danger');
        }

        // for staff login
    }
    function Attachment()
    {
        return view('attachment');
    }
    function AttachmentSave(Request $request)
    {







        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = rand(0, 999999) . time() . '.' . $file->extension();
                $file->move(public_path() . '/documents/', $name);
                $data[] = $name;


                $fileData = array(
                    'InvoiceNo' => $request->InvoiceNo,
                    'FileName' =>  $name

                );
                // dd($fileData);
                $fileid = DB::table('attachment')->insertGetId($fileData);
            }
        }




        return back()->with('success', 'Data Your files has been successfully added');
    }
    public function AttachmentRead()
    {
        $directory = 'documents';
        $files_info = [];

        $file_name = session::get('VHNO');;

        $image = DB::table('attachment')->where('InvoiceNo', $file_name)->get();

        // Read files
        foreach ($image as $file) {

            //  $filename = $file->getFilename();
            //  $size = $file->getSize(); // Bytes
            //  $sizeinMB = round($size / (1000 * 1024), 2);// MB

            //  if($sizeinMB <= 2){ // Check file size is <= 2 MB
            $files_info[] = array(
                "name" => $file->FileName,
                "size" => 12,
                "path" => url($directory . '/' . $file->FileName)
            );
            //  }
            //   }
        }
        return response()->json($files_info);
    }
    public function AttachmentDelete($id, $filename)
    {
        $id =  $id;
        $filename =  $filename;
        DB::table('attachment')->where('AttachmentID', $id)->delete();
        $path = public_path() . '/documents/' . $filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return redirect('Attachment')->with('error', 'File Deleted')->with('class', 'success');
    }

    // parties
    public  function Parties()
    {

        session::put('menu', 'Party');
        $pagetitle = 'Parties';

        $supplier = DB::table('party')->get();
        return view('party', compact('pagetitle', 'supplier'));
    }
    public  function SaveParties(request $request)
    {
        $this->validate(
            $request,
            [
                'PartyName' => 'required',

                'Active' => 'required',


            ],
            [
                'PartyName.required' => 'Party / Cusomter Name is required',



            ]
        );
        $data = array(

            'PartyName' => $request->input('PartyName'),
            'TRN' => $request->input('TRN'),
            'Address' => $request->input('Address'),
            'City' => $request->input('City'),
            'Mobile' => $request->input('Mobile'),
            'Phone' => $request->input('Phone'),
            'Email' => $request->input('Email'),
            'Website' => $request->input('Website'),
            'Active' => $request->input('Active'),
            'InvoiceDueDays' => $request->input('InvoiceDueDays'),



        );

        $id = DB::table('party')->insertGetId($data);




        return redirect('Parties')->with('error', 'Save Successfully.')->with('class', 'success');
    }
    public  function PartiesEdit($id)
    {

        session::put('menu', 'Party');
        $pagetitle = 'Party';

        $supplier = DB::table('party')->where('PartyID', $id)->get();

        return view('party_edit', compact('pagetitle', 'supplier'));
    }
    public  function PartiesUpdate(request $request)
    {
        $this->validate(
            $request,
            [
                'PartyName' => 'required',

                'Active' => 'required',




            ],
            [
                'PartyName.required' => 'Party / Cusomter Name is required',



            ]
        );


        $data = array(

            'PartyName' => $request->input('PartyName'),
            'TRN' => $request->input('TRN'),
            'Address' => $request->input('Address'),
            'City' => $request->input('City'),
            'Mobile' => $request->input('Mobile'),
            'Phone' => $request->input('Phone'),
            'Email' => $request->input('Email'),
            'Website' => $request->input('Website'),
            'Active' => $request->input('Active'),
            'InvoiceDueDays' => $request->input('InvoiceDueDays'),



        );

        $id = DB::table('party')->where('PartyID', $request->input('PartyID'))->update($data);




        return redirect('Parties')->with('error', 'Updated Successfully.')->with('class', 'success');
    }
    public  function PartiesDelete($id)
    {

        $id = DB::table('party')->where('PartyID', $id)->delete();
        return redirect('Parties')->with('error', 'Deleted Successfully')->with('class', 'success');
    }
} // end of controller
