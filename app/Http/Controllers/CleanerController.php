<?php

namespace App\Http\Controllers;

use App\Cleaner;
use App\Country;
use Illuminate\Http\Request;

class CleanerController extends Controller
{
    

    public function index(Request $request){

    	$title = 'Cleaners';
    	$cleaners = Cleaner::where('deleted_at',null)->get();
    	$countries = Country::all();

    	return view('admin.cleaners',compact('title','cleaners','countries'));

    }

    public function view(Request $request){


    }

    public function create(Request $request){

    	$rules =  [

		    				'id_number'=>'required',
		    				'first_name'=>'required',
		    				'last_name'=>'required',
		    				'gender'=>'required',

    	          ];

    	$this->validate($request,$rules);

    	if($request->hasFile('photo')) {

	        $filenameWithExt = $request->file('photo')->getClientOriginalName();
	        $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
	        $extension       = $request->file('photo')->getClientOriginalExtension();
	        $fileNameToStore = $filename.'-'.time().'.'.$extension;

	        $request->file('photo')->move(base_path() . '/public/assets/uploads/avatars/', $fileNameToStore);

	        $fileNameToStore = get_option('site_url').'assets/uploads/avatars/'.$filename.'-'.time().'.'.$extension;

        }

        extract($_POST);

    	$cleaner = new Cleaner;

    	if(isset($cleaner_id) && $cleaner_id !='')
    	$cleaner = Cleaner::find(intval($cleaner_id));	

    	$cleaner->id_number          = $id_number ?? '';
    	$cleaner->passport_number    = $passport_number ?? '';
    	$cleaner->first_name         = $first_name ?? '';
    	$cleaner->last_name          = $last_name ?? '';
    	$cleaner->gender             = $gender ?? '';
    	$cleaner->email              = $email ?? '';
    	$cleaner->phone              = $phone ?? '';
    	$cleaner->phone1             = $phone1 ?? '';
        
    	if(!isset($cleaner_id) && $cleaner_id =='')
    	$cleaner->sys_id             = strtoupper(str_random(8));

    	$cleaner->country            = intval($country ?? 1);

    	if($request->hasFile('photo'))
    	$cleaner->photo              = $fileNameToStore;

    	$cleaner->save();

    	if(!isset($cleaner_id) && $cleaner_id =='')
    	return redirect()->route('cleaners')->with('success','You have successfully created a cleaner');

    	return redirect()->route('cleaners')->with('success','You have successfully updated a cleaner');	
    }

    public function viewCleanerProfile($id){

    	$cleaner = Cleaner::find($id);
    	$cleaner_info = '

    <div class="jumbotron">
      <center><h1 class="display-4">'.$cleaner->first_name.' '.$cleaner->last_name.'</h1>
      <p class="lead"><img src="'.$cleaner->photo.'" width="100px" height="100px" /></p>
      <hr class="my-4">
      <p><b>ID Number</b> : '.$cleaner->id_number.'</p>
      <p><b>Passport Number</b> : '.$cleaner->passport_number.'</p>
      <p><b>Gender</b> : '.$cleaner->gender.'</p>
      <p><b>Country</b> : '.Country::find($cleaner->country)->country_name.'</p>
      <p><b>Email</b> : '.$cleaner->email.'</p>
      <p><b>Phone</b> : '.$cleaner->phone.'</p>
      <p><b>Other Phone</b> : '.$cleaner->phone1.'</p>
      <center>
    </div>

    	';
    	return $cleaner_info;

    }



    public function delete(Request $request){


    	extract($_POST);

    	if(isset($delete_cleaner_id) && $delete_cleaner_id !=''){

	    	$cleaner = Cleaner::find('id', $delete_cleaner_id);
	    	$cleaner->deleted_at = date('Y-m-d h:i:s');
	    	$cleaner->save();

	    	return redirect()->route('cleaners')->with('success','You have successfully deleted a cleaner');

       }

      	return redirect()->route('cleaners')->with('error','Error occured!');


    }
}
