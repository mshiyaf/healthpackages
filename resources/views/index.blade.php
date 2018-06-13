@extends('layout')

@section('form')


  <article class="card-body">

      <form>

          {{ csrf_field() }}





          <div class="form-group">
              <label>Package Name</label>
              <input type="text" name="packagename" class="form-control" placeholder=" " >
          </div>


          <div class="form-group">
              <label>Package Type</label>
              <input type="text" list="listptype" name="packagetype" class="form-control" placeholder=" ">
              <datalist id="listptype">
                <option>Basic</option>
                <option>Premium</option>
              </datalist>
          </div>



          {{-- <div class="form-group">
                <label>Category</label>
                <select name="category[]" id="category" class="form-control select2-multiple" multiple="multiple">

                <option></option>

                </select>
          </div>

          <div class="form-group">
                <label>Tests</label>
                <select name="test[]" id="test" class="form-control select2-multiple" multiple="multiple">

                <option></option>
                @foreach ($tests as $test)
                  <option value='{{ $test->test_id }}' >{{ $test->test_name }}</option>
                @endforeach

                </select>
          </div> --}}

          <div class="form-group">
              <label>Speciality </label>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <div class="input-group-text">

                    <input type="checkbox" id="servicecheck">

                  </div>
                </div>
                <select name="service[]" id="service" class="form-control select2-multiple" disabled="disabled">

                <option></option>
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

            {{-- <div class="form-group">
              <article class="card-body">
                  <label>Category 1</label>
                  <select name="category[]" id="category_1" class="form-control select2-multiple" multiple="multiple">

                  <option></option>

                  @foreach ($categories as $category)
                    <option value='{{ $category->cat_id }}' >{{ $category->cat_name }}</option>
                  @endforeach
                  </select>

                  <label>Tests for Category 1</label>
                  <select name="test[]" id="test_1" class="form-control select2-multiple" multiple="multiple">


                  @foreach ($tests as $test)
                    <option value='{{ $test->test_id }}' >{{ $test->test_name }}</option>
                  @endforeach

                  </select>
              </article>
            </div> --}}


          </div>


          <label>Duration</label>
          <div class="form-row">

              <div class="form-group col-md-3">
                <input name="duration" type="number" min="0" class="form-control" id="duration" placeholder=" ">
              </div>

              <div class="form-group col-md-2">
                <select name="time" id="time" class="form-control" placeholder=" ">
                  <option>Days</option>
                  <option>Hours</option>
                  <option>Minutes</option>
                </select>
              </div>
          </div>



          <div class="form-group">
              <label>Total Cost</label>
              <input type="number" min="0" name="totalcost" class="form-control" placeholder=" " >
          </div>



          <label>Offer Price</label>
          <div class="input-group mb-4">
            <div class="input-group-prepend">
              <div class="input-group-text">

                <input type="checkbox" id="offercheck">

              </div>
            </div>
              <input type="number" class="form-control" name="offerp" id="offerp" disabled = 'disabled'>
          </div>



          <div class="col-md-6">
            <div class="form-group">
              <div class="form-check">

                  <input class="form-check-input" type="checkbox" value="" id="insurancecheck">
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
                <select name="r_time" id="r_time1" class="form-control" disabled>
                    <option>Monthly</option>
                  </select>
              </div>

              <div class="form-group col-md-4">
                <input type="text" name="r_cost" id="r_cost1" class="form-control" placeholder="Cost" disabled>
              </div>

          </div>
          <div class="form-row">

              <div class="form-group col-md-1">
                <input style="padding-left:1rem" type="checkbox" id="recurringcheck2">
              </div>


              <div class="form-group col-md-2">
                <select name="r_time" id="r_time2" class="form-control" disabled>
                    <option>Yearly</option>
                  </select>
              </div>

              <div class="form-group col-md-4">
                <input type="text" name="r_cost" id="r_cost2" class="form-control" placeholder="Cost" disabled>
              </div>

          </div>

        </div>



          <div class="form-group">
              <button type="submit" id="submit" class="btn btn-primary btn-block"> Create </button>
          </div>

          <small class="text-muted">By clicking the 'Create' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>

      </form>

      @include('errors')

  </article>

@endsection
