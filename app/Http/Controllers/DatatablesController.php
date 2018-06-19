<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Yajra\Datatables\Datatables;

class DatatablesController extends Controller
{

      public function index(){

        return view('index');

      }



      public function getdata()
    {
        $packages = Package::select(['package_id','packagename','packagetype','offerprice','created_at','updated_at']);

        return Datatables::of($packages)->make();
    }
}
