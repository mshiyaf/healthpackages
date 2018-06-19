@extends('/edit/layoutedit')

@section('form')


  <article class="card-body">

      <form>

          {{ csrf_field() }}



          <input type=hidden name="pack_id" id="pack_id" value={{ $package->id }}></input>

          <div class="form-group">
              <label>Package Name</label>
              <input type="text" name="packagename" class="form-control" placeholder=" " value={{ $package->packagename }}>
          </div>


          <div class="form-group">
              <label>Package Type</label>
              <input type="text" list="listptype" name="packagetype" class="form-control" placeholder=" " value={{ $package->packagetype }}>
              <datalist id="listptype">
                <option>Basic</option>
                <option>Premium</option>
              </datalist>
          </div>


          <div class="form-group">
              <label>Speciality </label>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text">

                    <input type="checkbox" id="servicecheck">

                  </div>
                </div>
                <select name="service[]" id="service" class="form-control select2-multiple">

                <option value='{{ $thisservice->service_id }}' selected>{{ $thisservice->service_name }}</option>
                @foreach ($services as $service)
                  <option value='{{ $service->service_id }}' >{{ $service->service_name }}</option>
                @endforeach

              </select>
              </div>
          </div>

          <div class="input_fields_wrap">

            <div class="form-group">
              <button class="add_field_button btn btn-primary">Add More Categories</button>
            </div>

          </div>


          <label>Duration</label>
          <div class="form-row">

              <div class="form-group col-md-3">

                <input name="duration" type="number" min="0" class="form-control" id="duration" placeholder=" "  >
              </div>

              <div class="form-group col-md-2">
                <select name="time" id="time" class="form-control" placeholder=" ">
                  <option id="dtime" value ="<?php echo $package->duration ?>.replace(/[0-9]/g, '')" selected ></option>
                  <option>Days</option>
                  <option>Hours</option>
                  <option>Minutes</option>
                </select>
                {{-- <input type='hidden' id='myhidden' value=''> --}}

              </div>
          </div>



          <div class="form-group">
              <label>Total Cost</label>
              <input type="number" min="0" name="totalcost" class="form-control" placeholder=" " value={{ $package->totalcost }}>
          </div>



          <label>Offer Price</label>
          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <div class="input-group-text">

                <input type="checkbox" id="offercheck">

              </div>
            </div>
              <input type="number" class="form-control" name="offerp" id="offerp" disabled = 'disabled' value={{ $package->offerprice }} }}>
          </div>



          <div class="col-md-6">
            <div class="form-group">
              <div class="form-check">

                  <input type="hidden" name="insurance" id="insurance"  value={{ $package->insuranceclaim }}>
                  <input class="form-check-input" type="checkbox" name="select_letter" value="1" id="insurancecheck" onchange="document.getElementById('insurance').value = this.checked ? 1 : 0">
                  <label class="form-check-label" for="insurancecheck">Insurance Claim</label>


              </div>
            </div>
          </div>




        <label>Reccuring</label>
        <div class="form-group col-md">
          <div class="form-row">

              <div class="form-group col-md-1">
                <input style="padding-left:1rem" type="checkbox" id="recurringcheck1">
              </div>


              <div class="form-group col-md-2">

                <input name="r_time" id="r_time1" class="form-control" disabled placeholder="Monthly">

              </div>

              <div class="form-group col-md-4">
                <input type="text" name="r_cost1" id="r_cost1" class="form-control" placeholder="Cost" disabled value={{ $package->r_cost_monthly }}>
              </div>

          </div>
          <div class="form-row">

              <div class="form-group col-md-1">
                <input style="padding-left:1rem" type="checkbox" id="recurringcheck2">
              </div>


              <div class="form-group col-md-2">

                <input name="r_time" id="r_time2" class="form-control" style='background-colour:white' disabled placeholder="Yearly">

              </div>

              <div class="form-group col-md-4">
                <input type="text" name="r_cost2" id="r_cost2" class="form-control" placeholder="Cost" disabled  value={{ $package->r_cost_yearly}}>
              </div>

          </div>

        </div>


        <label>Available Dates</label>
        <article class="card-body">

        <div class="form-group col-md">
        <div class="form row">
            <div class="form-group col-md-4">
              <input class="form-control" type="date" id="from_date" value={{ $package->from_date }}>
            </div>

            <div class="form-group">
              <label>to</label>
            </div>

            <div class="form-group col-md-4">
              <input class="form-control" type="date" id="to_date" value={{ $package->to_date }}>
            </div>
        </div>
        </div>

      </article>


          <div class="form-group">
              <button type="submit" id="submit" class="btn btn-primary btn-block"> Create </button>
          </div>

          <small class="text-muted">By clicking the 'Create' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>

      </form>

      @include('errors')

  </article>


@endsection
