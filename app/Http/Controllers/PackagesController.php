<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Test;



class PackagesController extends Controller
{
    function index()
    {
      $package = Package::all();
      $tests = Test::all();

      return view('index',compact('tests','packages'));

    }


    function store(Request $request)
    {

        $this->validate(request(),[
          'speciality' => 'required',
          'packagename' => 'required',
          'packagetype' => 'required',
          'test'=> 'required'
        ]);


        $package = new Package;


        $test = implode(',',$_POST['test']);
        $package->test = $test;

        $full_dur = $request['duration'].' '.$request['time'];
        $package->duration = $full_dur;

        $package->speciality = request('speciality');
        $package->packagename = request('packagename');
        $package->packagetype = request('packagetype');


        $package->save();

        return redirect('/');


    }



}
