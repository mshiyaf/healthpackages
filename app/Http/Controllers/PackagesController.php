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


    function store()
    {
        $this->validate(request(),[
          'speciality' => 'required',
          'packagename' => 'required',
          'packagetype' => 'required',
          'test'=> 'required'
        ]);

        Package::create(request(['speciality','packagename','packagetype','test']));

        return redirect('/');

    }



}
