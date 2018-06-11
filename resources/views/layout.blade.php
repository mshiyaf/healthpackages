<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Health Packages</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css"/>
    <link rel="stylesheet" href="/css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

                    @yield('form')

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

<script type="text/javascript">

  $(document).ready(function() {

  $('.select2-single,.select2-multiple').select2({
    allowClear:true,
    placeholder: '',
    theme: 'bootstrap'
  });


  $( "#offercheck" ).on( "click", function() {
    $("#offerp").prop('disabled',!this.checked);
  });


  $( "#recurringcheck1" ).on( "click", function() {
    $("#r_cost1").prop('disabled',!this.checked);
    $("#r_time1").prop('disabled',!this.checked);
  });

  $( "#recurringcheck2" ).on( "click", function() {
    $("#r_cost2").prop('disabled',!this.checked);
    $("#r_time2").prop('disabled',!this.checked);
  });

});

</script>

<script type="text/javascript">

$("document").ready(function(){
$('#submit').click(function(e){
   e.preventDefault();
   var speciality = $("input[name=speciality]").val();
   var packagename = $("input[name=packagename]").val();
   var packagetype = $("input[name=packagetype]").val();
   var duration = $("input[name=duration]").val();
   var time = $("select[name=time]").val();
   var full_dur = duration+time;
   var test = $("input[name=test[]").val();
   var totalcost = $("input[name=totalcost]").val();
   var offerp = $("input[name=offerp]").val();
   var totalcost = $("input[name=totalcost]").val();
   alert('Created New Package');
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
   $.ajax({
      url: "/packages",
      method: 'post',
      dataType:'json',
      data: {
         speciality:speciality,
         packagename:packagename,
         packagetype:packagetype,
         full_dur:full_dur,
         test:test,
         totalcost:totalcost,
         offerp:offerp
         // type: jQuery('#type').val(),
         // price: jQuery('#price').val()
      },
      success: function(data){
        alert(response.message)
      }
    });
   });
 });

</script>


<br><br>

</body>

</html>
