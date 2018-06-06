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
          $table->increments('clinic_id');
          $table->string('speciality');
          $table->integer('package_id')->default('0');
          $table->string('packagename');
          $table->string('packagetype');
<<<<<<< HEAD
          // $table->string('duration');
           $table->string('test');
          // $table->integer('totalcost');
          // $table->integer('offerprice');
=======
          $table->string('duration');
          $table->string('test');
          $table->integer('totalcost');
          $table->integer('offerprice');
>>>>>>> origin/shiyaf
          // $table->string('availability');
          // $table->string('insuranceclaim');
          // $table->string('agegroup');
          // $table->string('medhistory');
          // $table->string('r_duration');
          // $table->string('r_cost');
          $table->rememberToken();
          $table->timestamps();

        });
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
