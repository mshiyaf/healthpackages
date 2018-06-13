<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Test;
use App\Service;
use App\Category;


class PackagesController extends Controller
{
    function index()
    {
      $package = Package::all();
      $tests = Test::all();
      $services = Service::all();
      $categories = Category::all();
      return view('index',compact('tests','packages','services','categories'));

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
        $package->service_id = request('service');
        $package->packagename = request('packagename');
        $package->packagetype = request('packagetype');
        $package->totalcost = request('totalcost');
        $package->offerprice = request('offerp');
        $output = request('soutput');
        $n = request('y');
        $new = json_decode($output);
        for ($i=1; $i <= $n ; $i++) {
          $tests = new Package;
          $tests->test_id = $new->{$i};
          $tests->service_id = $i;
          $tests->save();
        }

        // $package->insuranceclaim = request('insuranceclaim');



        $package->save();



        // return response()->json(['message' => 'Your message']);
        //dd(speciality);
        return redirect('/');


    }



}
