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
      return view('index',compact('packages','tests'));

    }
    function store()
    {
        $this->validate(request(),[
          'speciality' => 'required',
          'packagename' => 'required',
          'packagetype' => 'required'
          ]
        );
        //create new post
        Package::create(request(['speciality','packagename','packagetype']));
        // $package = new Package;
        //
        // $package->speciality = request('speciality');
        // $package->packagename = request('packagename');
        // $package->packagetype = request('packagetype');
        //
        // //save to db
        //
        // $package->save();

        //redirect to homepage

        return redirect('/');

    }
}
