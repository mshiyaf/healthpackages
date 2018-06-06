<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Test;
use DB;


class PackagesController extends Controller
{
    function index()
    {
      $package = Package::all();
      $tests = Test::all();

      return view('index',compact('tests','packages'));

    }


    function store()
    {
        $this->validate(request(),[
          'speciality' => 'required',
          'packagename' => 'required',
          'packagetype' => 'required',
          'test'=> 'required'
        ]);

        Package::create(request(['speciality','packagename','packagetype']));

        $package = new Package;
        $test = Package::all();
        $test = implode(',',$_POST['test']);
        $package->test = $test;
        $package->save();

        return redirect('/');


    }



}
