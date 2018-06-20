<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Test;
use App\Service;
use App\Category;
use App\Packcattest;
use DB;

class PackagesController extends Controller
{

    function index(){

      return view('index');

    }


    function create()
    {
      $package = Package::all();
      $tests = Test::all();
      $services = Service::all();
      $categories = Category::all();
      return view('/create/create_index',compact('tests','package','services','categories'));

    }


    function selectAjax(Request $request)
    {
      if($request->ajax())
      {
      $tests = DB::table('tests')->where('cat_id',$request->cat_id)->pluck("test_name","test_id")->all();
      $data = view('/ajax-select',compact('tests'))->render();
      return response()->json(['options'=>$data]);
      }
    }

    function store(Request $request)
    {
        // $request->validate([
        //   'packagename' => 'required',
        //   'packagetype' => 'required',
        //
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

        $package->r_cost_monthly=request('r_cost1');
        $package->r_cost_yearly=request('r_cost2');
        $saved = $package->save();


        $package->save();

        $output = request('soutput');
        $new = json_decode($output);
        foreach ($new as $key => $value) {
          $tests = new Packcattest;
          $tests->package_id = $package->package_id;
          $tests->test_id = $value;
          $tests->cat_id = $key;
          $tests->save();
        }


        return redirect('/');

    }



    function edit($id){

        $package = Package::find($id);
        $tests = Test::all();
        $services = Service::all();
        $categories = Category::all();
        $id = $package->service_id;

        if($id!=0){
          $thisservice = Service::find($id);
        }
        else{
          $thisservice = new Service;
          $thisservice->service_id=0;
          $thisservice->service_name="";
        }
        return view('edit.edit_index',compact('tests','package','services','categories','thisservice'));

    }



    public function delete($id){
      Package::find($id)->delete();
      return redirect('/');

    }

    function update(Request $request)
    {

        $id=request('id');
        $package=Package::find($id);
        $package->duration = request('full_dur');
        $package->service_id = request('service');
        $package->packagename = request('packagename');
        $package->packagetype = request('packagetype');
        $package->totalcost = request('totalcost');
        $package->offerprice = request('offerp');
        $package->insuranceclaim = request('insuranceclaim');
        $package->from_date = request('from_date');
        $package->to_date = request('to_date');

        $package->r_cost_monthly=request('r_cost1');
        $package->r_cost_yearly=request('r_cost2');
        $saved = $package->save();


        $package->save();

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
