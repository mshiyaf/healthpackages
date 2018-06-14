<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Test;
use App\Service;
use App\Category;
use App\Packcattest;


class PackagesController extends Controller
{
    function index()
    {
      $package = Package::all();
      $tests = Test::all();
      $services = Service::all();
      $categories = Category::all();
      $packcattests = Packcattest::all();
      return view('index',compact('tests','packages','services','categories','packcattests'));

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

        $package->duration = request('full_dur');
        $package->service_id = request('service');
        $package->packagename = request('packagename');
        $package->packagetype = request('packagetype');
        $package->totalcost = request('totalcost');
        $package->offerprice = request('offerp');
        $package->insuranceclaim = request('insuranceclaim');
        $package->from_date = request('from_date');
        $package->to_date = request('to_date');
        $saved = $package->save();

        $output = request('soutput');
        $new = json_decode($output);
        foreach ($new as $key => $value) {
          $tests = new Packcattest;
          $tests->package_id = $package->id;
          $tests->test_id = $value;
          $tests->cat_id = $key;
          $tests->save();
        }


        return redirect('/');


    }



}
