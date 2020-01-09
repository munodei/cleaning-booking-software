<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
    public function index(Request $request){

    	$title    = 'Services';
    	$services =  Service::all();

    	return view('admin.services',compact('title','services'));

    }

    public function editService(Request $request){


    }

    public function addService(Request $request){


    }

    public function deleteService(Request $request){


    }

    public function getService(Request $request){


    }
    
}
