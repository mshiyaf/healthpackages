@extends('layout')

@section('form')


  <article class="card-body">

      <form method="POST" action="/packages">

          {{ csrf_field() }}

          <div class="form-group">
              <label>Speciality </label>
              <input type="text" list="listspc" name="speciality" id="speciality" class="form-control" placeholder="">
              <datalist id="listspc">
                <option>Volvo</option>
                <option>Saab</option>
                <option>Mercedes</option>
                <option>Audi</option>
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
                <option>Volvo</option>
                <option>Saab</option>
                <option>Mercedes</option>
                <option>Audi</option>
              </datalist>
          </div>


          <label>Duration</label>
          <div class="form-row">

              <div class="form-group col-md-2">
                <input name="duration" type="number" min="0" class="form-control" id="duration" placeholder=" ">
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
              <label>Total Cost</label>
              <input type="number" min="0" name="totalcost" class="form-control" placeholder=" " >
          </div>

          <div class="form-group">
              <label>Offer Price</label>
              <input type="number" min="0" name="offerprice" class="form-control" placeholder=" " >
          </div>


          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> Create </button>
          </div>

          <small class="text-muted">By clicking the 'Create' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>

      </form>

      @include('errors')

  </article>

@endsection
