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

        // $this->validate(request(),[
          // 'speciality' => 'required',
          // 'packagename' => 'required',
          // 'packagetype' => 'required'
          // 'test'=> 'required'
        // ]);

        $package = new Package;
        // $cat = request('test');
        // alert($cat);

        // $test = implode(',',$_POST['test']);
        // $package->test = $test;

        // $full_dur = $request['duration'].' '.$request['time'];
        $package->duration = request('full_dur');
        $package->service_id = request('speciality');
        $package->packagename = request('packagename');
        $package->packagetype = request('packagetype');
        $package->totalcost = request('totalcost');
        $package->offerprice = request('offerp');
        $package->test_id = request('tests');
        // $package->insuranceclaim = request('insuranceclaim');



        $package->save();

        

        // return response()->json(['message' => 'Your message']);
        //dd(speciality);
        // return redirect('/');


    }



}
