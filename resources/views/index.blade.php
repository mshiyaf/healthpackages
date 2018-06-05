<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


</head>

<body>



    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Create New Health Package</h4>
                    </header>
                    <article class="card-body">
                        <form method="POST" action="/packages">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Speciality </label>
                                <input type="text" name="speciality" id="speciality" class="form-control" placeholder="">
                            </div>
                            <!-- form-group end.// -->

                            <div class="form-group">
                                <label>Package Name</label>
                                <input type="text" name="packagename" class="form-control" placeholder=" " >
                            </div>
                            <!-- form-group end.// -->

                            <div class="form-group">
                                <label>Package Type</label>
                                <input type="text" name="packagetype" class="form-control" placeholder=" ">
                            </div>
                            <!-- form-group end.// -->
                            <label>Duration</label>
                            <div class="form-row">

                                <div class="form-group col-md-4">
                                  <input type="text" class="form-control" id="duration" placeholder=" ">
                                </div>

                                <div class="form-group col-md-4">
                                  <input type="text" class="form-control" placeholder=" ">
                                </div>

                              <div class="form-group">
                                  <label>Speciality </label>
                                  <input type="text" class="form-control" placeholder="">
                              </div>
                              <!-- form-group end.// -->


                              <div class="form-group">
                                  <label>Package Name</label>
                                  <input type="text" class="form-control" placeholder=" ">
                              </div>
                              <!-- form-group end.// -->

                              <div class="form-group">
                                  <label>Package Type</label>
                                  <input type="text" class="form-control" placeholder=" ">
                              </div>
                              <!-- form-group end.// -->
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
                                  <label>Tests</label>
                                  <select id="scroll" name="scroll" class="form-control">


                                    <option>Hack</option>
                                    <option>India</option>
                                    <option>Hello</option>
                                    <option>Hi</option>

                            		  </select>
                              </div>
                              <!-- form-group end.// -->



                              <div class="form-group">
                                  <button type="submit" class="btn btn-primary btn-block"> Create </button>
                              </div>
                              <!-- form-group// -->
                              <small class="text-muted">By clicking the 'Create' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
                        </form>

                      @include('errors')
                    </article>
                    <!-- card-body end .// -->
                </div>
                <!-- card.// -->
            </div>
            <!-- col.//-->

        </div>
        <!-- row.//-->


    </div>
    <!--container end.//-->

    <br><br>
    </article>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
          $(document).ready(function() {
            $('#scroll').select2();
          });
    </script>

</body>

</html>
