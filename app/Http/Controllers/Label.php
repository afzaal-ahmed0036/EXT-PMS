<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use URL;
use Image;
use Excel;
use File;
use PDF;
class Label extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

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



    public function Show()
     {

///////////////////////USER RIGHT & CONTROL ///////////////////////////////////////////    
$allow= check_role(session::get('UserID'),'User','List / Create');
if(@$allow[0]->Allow=='N')
{
return redirect()->back()->with('error', 'You access is limited')->with('class','danger');
}
////////////////////////////END SCRIPT ////////////////////////////////////////////////

 session::put('menu','Labels');     
        $pagetitle = 'Label';

           $labels = DB::table('labels')->get();

        
        return  view ('label',compact('labels','pagetitle'));
     }

    public function StickerSearch(Request $request)
    {
        foreach ($request['codes'] as $key => $code) {
            $data = array(
                "qty" => '1',
                "itemid" => $code,
            );
            $sticker = DB::table('sticker')->insert($data);
        }

        return response()->json(['url' => url('Lables/sticker_print')]);
    }


    public function StickerPrint()
    {

        $stickerxy = DB::table('v_sticker')->get();
        // dd($stickerxy);

        $company = DB::table('companies')->first();
        //dd($company);
        DB::table('sticker')->truncate();
        return  view ('printbarcodedata',compact('stickerxy','company'));

        //$pdf = PDF::loadView('printbarcodedata', compact('stickerxy','company'));
        //$customPaper = array(0, 0, 200, 300);
        //$pdf->set_paper($customPaper);

        
        return $pdf->stream();
    }




     public function LabelSave(request $request)
     {


///////////////////////USER RIGHT & CONTROL ///////////////////////////////////////////    
$allow= check_role(session::get('UserID'),'User','List / Create');
if($allow[0]->Allow=='N')
{
return redirect()->back()->with('error', 'You access is limited')->with('class','danger');
}
////////////////////////////END SCRIPT ////////////////////////////////////////////////



        $data = array (
                 'OrderNumber' => $request->input('OrderNumber'),
                'ClientName' => $request->input('ClientName'),
                'Content' => $request->input('Content'),
                'CustomerOrderDate' => $request->input('CustomerOrderDate'),
                'UnitNumber' => $request->input('UnitNumber'),
                'Description' => $request->input('Description'),
                'LabelDeails' => $request->input('LabelDeails')
                 );

$id = DB::table('labels')->insertGetId($data);

        return redirect('Lables')->with('error','User Created Successfully')->with('class','success');

     }

    public function UserEdit($id)
     {
 session::put('menu','User');     
        $pagetitle = 'User';
 ///////////////////////USER RIGHT & CONTROL ///////////////////////////////////////////    
$allow= check_role(session::get('UserID'),'User','Update');
if($allow[0]->Allow=='N')
{
return redirect()->back()->with('error', 'You access is limited')->with('class','danger');
}
////////////////////////////END SCRIPT ////////////////////////////////////////////////

         $v_users= DB::table('user')->where('UserID',$id)->get();

        return  view ('user_edit',compact('v_users','pagetitle'));
     }


public function UserUpdate(request $request)
     {

     
  ///////////////////////USER RIGHT & CONTROL ///////////////////////////////////////////    
$allow= check_role(session::get('UserID'),'User','Update');
if($allow[0]->Allow=='N')
{
return redirect()->back()->with('error', 'You access is limited')->with('class','danger');
}
////////////////////////////END SCRIPT ////////////////////////////////////////////////

         $this->validate($request,[
          
          'Password'=>'required'
         
      ],
    [
      'Password.required' => 'Customer Name is required',
            
    ]);

        $data = array 
        (
               
                'FullName' => $request->input('FullName'),
                 'Email' => $request->input('Email'),
                 'Password' => $request->input('Password'),
                'UserType' => $request->input('UserType'),
                 'Active' => $request->input('Active')
        );

    
        $id= DB::table('user')->where('UserID',$request->input('UserID'))->update($data);
        return redirect('User')->with('error','Users Updated Successfully')->with('class','success');
     }



     public function UserDelete($id)
     {  
       ///////////////////////USER RIGHT & CONTROL ///////////////////////////////////////////    
$allow= check_role(session::get('UserID'),'User','Delete');
if($allow[0]->Allow=='N')
{
return redirect()->back()->with('error', 'You access is limited')->with('class','danger');
}
////////////////////////////END SCRIPT ////////////////////////////////////////////////

            $id = DB::table('user')->where('UserID',$id)->delete();
            return redirect('User')->with('error','User Deleted Successfully')->with('class','success');

     }

         public function destroy($id)
    {

        $id = DB::table('labels')->where('LabelID',$id)->delete();
        return redirect('Lables')->with('error','User Deleted Successfully')->with('class','success');
    }


}
