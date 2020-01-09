<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
  
  public function index(Request $request){

  	$title    = 'Packages';
  	$packages = Package::all();

  	return view('packages',compact('title','packages'));
  }

  public function servicePackage(Request $request){

  	$title    = 'Service Packages';
  	$packages = Package::all();

  	return view('admin.service-packages',compact('title','packages'));

  }

}
