@extends('layout')

@section('form')


  <article class="card-body">

      <form method="POST" action="/packages">

          {{ csrf_field() }}

          <div class="form-group">
              <label>Speciality </label>
              <input type="text" list="listspc" name="speciality" id="speciality" class="form-control" placeholder="">
              <datalist id="listspc">
                <option>General Medicine</option>
                <option>General Surgery	</option>
                <option>Paediatrics</option>
                <option>Obstetrics & Gynaecology</option>
                <option>Dermatology	</option>
                <option>Ophthalmology</option>
                <option>Orthopaedics</option>
                <option>ENT (Ear, Nose and Throat)</option>
                <option>Psychiatry</option>
                <option>Anaesthesiology</option>
                <option>Gastroenterology</option>
                <option>Endocrinology</option>
                <option>Oncology</option>

              </datalist>
          </div>


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
                <label>Tests</label>
                <select name="test[]" id="multiple" class="form-control select2-multiple" multiple="multiple">

                <option></option>
                @foreach ($tests as $test)
                  <option value='{{ $test->id }}' >{{ $test->test_name }}</option>
                @endforeach

                </select>
          </div>

          <div class="form-group">
              <label>Total Cost</label>
              <input type="number" min="0" name="totalcost" class="form-control" placeholder=" " >
          </div>


          <label>Offer Price</label>
          <div class="input-group mb-3">

            <div class="input-group-prepend">
              <div class="input-group-text">

                <input type="checkbox" aria-label="Checkbox for following text input" >
              </div>
            </div>
            <input type="number" class="form-control" id="offerp" aria-label="Text input with checkbox" disabled = 'disabled'>
          </div>

        <div class="form-group">
            <label>Insurance Claim</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">

                <div class="input-group-text">
                  <input type="checkbox" name="insurance" id="check" aria-label="" />
                </div>
              </div>
            </div>
        </div>

        <div class="form-group">
            <label>Reccuring</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Default</span>


                <div class="input-group-text" >
                  <input type="checkbox" id="recurringcheck" aria-label="" />

                  <div class="form-row">

                      <div class="form-group col-md-2">
                        <input name="r_duration" type="number" min="0" class="form-control" id="r_duration" placeholder=" Enter number " disabled />
                      </div>

                      <div class="form-group col-md-3">
                        <select name="r_time" id="r_time" class="form-control" placeholder="     " disabled />
                          <option>year</option>
                          <option>month</option>
                          <option>week</option>
                        </select>
                      </div>


                  </div>
                  <input type="text" name="r_cost" id="r_cost" class="form-control" aria-label="Text input with checkbox" disabled />

                  <script>
                    document.getElementById('recurringcheck').onchange = function()
                    {
                    document.getElementById('r_duration').disabled = !this.checked;
                    document.getElementById('r_cost').disabled = !this.checked;
                    document.getElementById('r_time').disabled = !this.checked;

                    };
                  </script>
                </div>
              </div>
            </div>
        </div>






          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> Create </button>
          </div>

          <small class="text-muted">By clicking the 'Create' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>

      </form>

      @include('errors')

  </article>

@endsection
