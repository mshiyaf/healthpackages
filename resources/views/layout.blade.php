<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Health Packages</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.css">
    <link rel="stylesheet" href="/css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>


    <br><br>
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-11">

                <div class="card">

                    <header class="card-header">


                        <div class="row">
                          <div class="col">
                                  <h4 class="card-title mt-2">Health Packages</h4>
                          </div>
                          <div class="col-md-2">
                              <a class="btn btn-primary" href="/create_package" role="button">Create New</a>
                          </div>

                        </div>

                    </header>

                    <article class="card-body">

                        @yield('table')

                    </article>

                </div>
                <!-- card.// -->

            </div>
            <!-- col.//-->

        </div>
        <!-- row.//-->

    </div>
    <!--container end.//-->


<script src="/js/app.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
<script type="text/javascript">


    $(document).ready( function () {
        $("#table_id").DataTable({

          "processing": true,
  				"serverSide": true,
          "ajax": {
                "url":"<?= route('dataProcessing') ?>",
                "dataType":"json",
                "type":"POST",
                "data":{"_token":"<?= csrf_token() ?>"}
              },

          columns: [
            { data: 'package_id'},
            { data: 'packagename'},
            { data: 'packagetype'},
            { data: 'offerprice'},
            { data: 'created_at'},
            { data: 'updated_at'},
            { data: 'action' ,'searchable':false,'orderable':false}
          ]

        });

    });

</script>

</body>

</html>
