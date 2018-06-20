@extends('layout')

@section('table')

  <table id="table_id" class="display" style="width:100%">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Package Name</th>
                  <th>Type</th>
                  <th>Offer Price</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tfoot>
              <tr>
                  <th>ID</th>
                  <th>Package Name</th>
                  <th>Type</th>
                  <th>Offer Price</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
              </tr>
          </tfoot>
      </table>


@endsection
