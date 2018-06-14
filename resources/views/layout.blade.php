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
  var x = 0;
  var output = {};
  //var routput = {};



      $(add_button).click(function(e){ //on add input button click
              e.preventDefault();


              x++; //text box increment
              var test_id = 'test_'+x;
              var category_id = 'category_'+x;
              var $div = $('<div class="form-group"><article class="card-body"><label>Category '+x+'</label><select name="category[]" id='+category_id+' class="form-control" ><option></option></select><label>Test for Category'+x+'</label><select name="test[]" id='+test_id+' class="form-control select2-multiple" multiple="multiple"></select><a href="#" class="submit_field">Done</a><div></div><a href="#" class="remove_field">Remove</a></article></div>');
              $(wrapper).append($div); //add input box
              @foreach ($tests as $test)
              $("#test_"+x).append($('<option>', {
                  value: {{ $test->test_id }},
                  text : "{{ $test->test_name }}"
              }));
              @endforeach
              @foreach ($categories as $category)
              $("#category_"+x).append($('<option>', {
                  value: {{ $category->cat_id }},
                  text : "{{ $category->cat_name }}"
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


              // $('#test_'+x+'').select2().on('select2:select', function (e) {
              //
              //       y = x;
              //       var test_id = '#test_'+y;
              //       var t = $(test_id).select2("data");
              //
              //       var category_id = '#category_'+y;
              //       var c = $(category_id).select2("data");
              //
              //       tests_id=t.map(u => u.id).join(',');
              //       categories_id=c.map(v => v.id).join(',');
              //       $("output").append(output[categories_id]=tests_id);
              //
              //
              //
              // });
              $("select[id="+category_id+"]").change(function(){
                  var cat_id = $(this).val();
                  var token = $("input[name='_token']").val();

                  $.ajax({
                      url: 'select-ajax',
                      method: 'POST',
                      data: {cat_id:cat_id, _token:token},
                      success: function(data) {
                        $("select[id="+test_id+"]").html('');
                        $("select[id="+test_id+"]").html(data.options);
                      }
                  });
              });

              $div.on("click",".submit_field", function (e) {

                    e.preventDefault();
                    var category_id = $(this).parent().find('select:eq(0)').select2("data");
                    var c = category_id.map(m => m.id).join(',');

                    var test_id = $(this).parent().find('select:eq(1)').select2("data");
                    var t = test_id.map(n => n.id).join(',');

                    $("output").append(output[c]=t);

                    $(this).parent().find('select:eq(1)').select2({
                      disabled:'disabled'
                    });
                    $(this).parent().find('select:eq(0)').select2({
                      disabled:'disabled'
                    });

              });


      });

      $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
              e.preventDefault();

              var k = $(this).parent().find('select:eq(0)').select2("data");
              var j=k.map(m => m.id).join(',');

              delete output[j];
              $(this).parent('article').remove();
              //x--;
              console.log(output);
      })



      $('#submit').click(function(e){
         e.preventDefault();
         var service = $("select[id=service]").val();
         var packagename = $("input[name=packagename]").val();
         var packagetype = $("input[name=packagetype]").val();
         var duration = $("input[name=duration]").val();
         var time = $("select[name=time]").val();
         var full_dur = duration+time;
         var soutput = JSON.stringify(output);
         //var sroutput = JSON.stringify(output);
         var totalcost = $("input[name=totalcost]").val();
         var offerp = $("input[name=offerp]").val();
         var totalcost = $("input[name=totalcost]").val();
         var id_no = x;
         var insuranceclaim = $("input[name=insurance]").val();
         var r_cost1 = $("input[name=r_cost1]").val();
         var r_cost2 = $("input[name=r_cost2]").val();

         var from_date = $("input[id=from_date]").val();
         var to_date = $("input[id=to_date]").val();

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
             soutput:soutput,
             totalcost:totalcost,
             offerp:offerp,
             insuranceclaim:insuranceclaim,
             r_cost1:r_cost1,
             r_cost2:r_cost2,
             from_date:from_date,
             to_date:to_date
          },
          success: function(data){
            alert(response.message)
          }
        });

        console.log(output);
       });
 });

</script>


<br><br>

</body>

</html>
