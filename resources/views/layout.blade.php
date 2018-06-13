<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Health Packages</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">
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

  $('.select2-single,#test_1,#category_1').select2({
    allowClear:true,
    placeholder: '',
    theme: 'bootstrap'
  });

  $( "#servicecheck" ).on( "click", function() {
    $("#service").prop('disabled',!this.checked);
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

  var wrapper         = $(".input_fields_wrap"); //Fields wrapper
  var add_button      = $(".add_field_button"); //Add button ID
  var x = 1;




  $(add_button).click(function(e){ //on add input button click
          e.preventDefault();


              x++; //text box increment
              var test_id = 'test_'+x;
              var category_id = 'category_'+x;
              var $div = $('<div class="form-group"><article class="card-body"><label>Category '+x+'</label><select name="category[]" id='+category_id+' class="form-control select2-multiple" multiple="multiple"><option></option></select><label>Test for Category'+x+'</label><select name="test[]" id='+test_id+' class="form-control select2-multiple" multiple="multiple"></select><a href="#" class="remove_field">Remove</a></article></div>');
              $(wrapper).append($div); //add input box
              @foreach ($tests as $test)
              $("#test_"+x).append($('<option>', {
                  value: {{ $test->test_id }},
                  text : "{{ $test->test_name }}"
              }));
              @endforeach
              $div.find("#test_"+x).select2({
              allowClear:true,
              placeholder: '',
              theme: 'bootstrap' });
              $div.find("#category_"+x).select2({
              allowClear:true,
              placeholder: '',
              theme: 'bootstrap' });

              y = x-1;
              var test_id = '#test_'+y;
              var d = $(test_id).select2("data");
              //var tests_idn = d.y.id.join(",");
              //alert(test_id);
              //var id = d[].id;
              console.log(tests_idn);
              // // var tests_id = 'tests_'+x;
              // var tests_idn = test_idn.join(",");
              // // console.log(test_id);
              // alert(test_idn);
              // // // test.toString();
      });

      $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent('article').remove(); x--;
      })


$('#submit').click(function(e){
   e.preventDefault();
   var service = $("select[id=service]").val();
   var packagename = $("input[name=packagename]").val();
   var packagetype = $("input[name=packagetype]").val();
   var duration = $("input[name=duration]").val();
   var time = $("select[name=time]").val();
   var full_dur = duration+time;

   var totalcost = $("input[name=totalcost]").val();
   var offerp = $("input[name=offerp]").val();
   var totalcost = $("input[name=totalcost]").val();
   console.log(service);
   // alert();
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
         service:service,
         packagename:packagename,
         packagetype:packagetype,
         full_dur:full_dur,
         tests:tests,
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
