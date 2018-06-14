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
          $table->increments('id');
          $table->integer('service_id');
          $table->string('packagename');
          $table->string('packagetype');
          $table->string('duration');
          $table->integer('totalcost');
          $table->integer('offerprice');
          // // $table->string('availability');
          $table->boolean('insuranceclaim');
          $table->date('from_date');
          $table->date('to_date');

          $table->integer('r_cost_monthly');
          $table->integer('r_cost_yearly');
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
