@extends('layout')

@section('table')

  <table id="table_id" class="display" style="width:100%">
          <thead>
              <tr>
                  <th>Id</th>
                  <th>Package Name</th>
                  <th>Type</th>
                  <th>Offer Price</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  {{-- <th>Action</th> --}}
              </tr>
          </thead>
          {{-- <tbody>
            @foreach ($packages as $package)

              <tr>
                <td>{{ $package->package_id }}</td>
                <td>{{ $package->packagename }}</td>
                <td>{{ $package->packagetype }}</td>
                <td>{{ $package->from_date }}</td>
                <td>{{ $package->to_date }}</td>
                <td>{{ $package->offerprice }}</td>
                <td></td>
              </tr>

            @endforeach
          </tbody> --}}
<<<<<<< HEAD
  
=======
          <tfoot>
              <tr>
                  <th>Id</th>
                  <th>Package Name</th>
                  <th>Type</th>
                  <th>Offer Price</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  {{-- <th>Action</th> --}}
              </tr>
          </tfoot>
>>>>>>> origin/shiyaf
      </table>


@endsection
