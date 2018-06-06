@extends('layout')

@section('form')


  <article class="card-body">

      <form method="POST" action="/packages">

          {{ csrf_field() }}

          <div class="form-group">
              <label>Speciality </label>
              <input type="text" name="speciality" id="speciality" class="form-control" placeholder="">
          </div>


          <div class="form-group">
              <label>Package Name</label>
              <input type="text" name="packagename" class="form-control" placeholder=" " >
          </div>


          <div class="form-group">
              <label>Package Type</label>
              <input type="text" name="packagetype" class="form-control" placeholder=" ">
          </div>


          <label>Duration</label>
          <div class="form-row">

              <div class="form-group col-md-4">
                <input type="text" class="form-control" id="duration" placeholder=" ">
              </div>

              <div class="form-group col-md-4">
                <input type="text" class="form-control" placeholder=" ">
              </div>

              <div class="form-group col-md-4">
                <input type="text" class="form-control" placeholder=" ">
              </div>

          </div>

            <div class="form-group">
              <label for="default" class="control-label">Default textbox</label>
              <input id="default" type="text" class="form-control" placeholder="Placeholder text">
            </div>

<<<<<<< HEAD
                              <div class="form-group">
                                  <label>Tests</label>
                                  <select id="scroll" name="test" class="form-control">
=======
            <div class="form-group">
              <label for="single" class="control-label">Select2 single select</label>
              <select id="single" class="form-control select2-single">
>>>>>>> origin/shiyaf

                <option></option>
                <optgroup label="Alaskan/Hawaiian Time Zone">
                <option value="AK">Alaska</option>
                <option value="HI" disabled="disabled">Hawaii</option>
                </optgroup>

<<<<<<< HEAD
                                    @foreach ($tests as $test)
                                      <option>{{ $test->test_name }}</option>

                                    @endforeach
=======
              </select>
            </div>
>>>>>>> origin/shiyaf


            <div class="form-group">
                  <label for="multiple" class="control-label">Select2 multi select</label>
              <select id="multiple" class="form-control select2-multiple" multiple>
                <optgroup label="Alaskan/Hawaiian Time Zone">
                  <option value="AK">Alaska</option>
                  <option value="HI" disabled="disabled">Hawaii</option>
                </optgroup>

              </select>

            <div class="form-group">
                <label>Tests</label>
                <select name="test" id="inputState" class="form-control select2-single">

                  <option></option>
                @foreach ($tests as $test)
                  <option>{{ $test->test_name }}</option>
                @endforeach

                </select>
            </div>


          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> Create </button>
          </div>

          <small class="text-muted">By clicking the 'Create' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>

      </form>

      @include('errors')

  </article>

@endsection
