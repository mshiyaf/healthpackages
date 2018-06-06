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

              <div class="form-group col-md-2">
                <input type="text" class="form-control" id="duration" placeholder=" ">
              </div>

              <div class="form-group col-md-3">
                <select name="time" id="time" class="form-control" placeholder=" ">
                  <option>days</option>
                  <option>hours</option>
                  <option>minutes</option>
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
              <button type="submit" class="btn btn-primary btn-block"> Create </button>
          </div>

          <small class="text-muted">By clicking the 'Create' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>

      </form>

      @include('errors')

  </article>

@endsection
