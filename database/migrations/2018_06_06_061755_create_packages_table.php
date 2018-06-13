<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
          $table->increments('package_id');
          $table->integer('service_id');
          $table->string('packagename');
          $table->string('packagetype');
          $table->string('duration');
          $table->integer('totalcost');
          $table->integer('offerprice');
          // // $table->string('availability');
          $table->boolean('insuranceclaim');
          // $table->string('agegroup');
          // // $table->('medhistory');
           $table->integer('r_cost_monthly');
           $table->integer('r_cost_y_yearly');
          $table->rememberToken();
          $table->timestamps();

        });

      // Schema::table('packages',function($table){
      //     $table->foreign('test_id')->references('test_id')->on('tests')->onDelete('cascade');
      //
      // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
