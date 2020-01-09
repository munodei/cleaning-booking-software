<?php

namespace App\Http\Controllers;

use App\User;
use App\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request){

    	$title        = 'All Appointments';	
    	$appointments = User::join('appointments','users.id','=','appointments.client_id')->where('deleted_at',null)->select('users.*','appointments.*','appointments.id as appointmentID','users.id as userID')->get();

    	return view('admin.appointments',compact('appointments','title'));

    }

    public function editAppointment(){

    	return redirect()->route('appointments')->with('success','You have successfully edited an appointment!');

    }

    public function addAppointment(){

    	return redirect()->route('appointments')->with('success','You have successfully added an appointment!');

    }

    public function deleteAppointment(){

    	if($_POST){

    	extract($_POST);

    	$appointment             = Appointment::find(intval($delete_appointment_id));

    	$appointment->deleted_at = date('Y-m-d h:i:s');

    	$appointment->save();

    	return redirect()->route('appointments')->with('error','You have successfully deleted an appointment!');

       }

       return redirect()->route('appointments')->with('error','an error occured!');

    }

    public function getAppointment(){

    	return redirect()->route('appointments');
    	
    }
}
