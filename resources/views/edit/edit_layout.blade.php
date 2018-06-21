<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Health Packages</title>
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

     jQuery("[required]").after("<span class='required'> *</span>");

    var d = "<?php echo $package->duration ?>";
    var d1 = d.replace("[Days,Hours,Minutes]","");
    var dur = parseInt(d,10);
    $("#duration").attr("value",dur);
    var d2 = "{{ $package->duration }}";
    var d3 = d2.replace(/[0-9]/g, '');
    $("#dtime").attr("label",d3);
    $("#dtime").attr("value",d3);



       // alert(dur);

    var insuranceclaim = $("input[name=insurance]").val();
    var bool = (insuranceclaim==1);
    $("#insurancecheck").attr('checked', bool);
    $("#offerp").prop('disabled',!insurancecheck.checked);

    var offerp = $("input[name=offerp]").val();
    var bool2 = (offerp>0);
    $("#offercheck").attr('checked', bool2);

    var r_cost1 = $("input[name=r_cost1]").val();
    var bool3 = (r_cost1>0);
    $("#recurringcheck1").attr('checked', bool3);
    $("#r_cost1").prop('disabled',!recurringcheck1.checked);

    var r_cost2 = $("input[name=r_cost2]").val();
    var bool4 = (r_cost2>0);
    $("#recurringcheck2").attr('checked', bool4);
    $("#r_cost2").prop('disabled',!recurringcheck2.checked);

    var service = $("select[id=service]").val();
    var bool5 = (service>0);
    $("#servicecheck").attr('checked', bool5);
    $("#service").prop('disabled',!servicecheck.checked);


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
    //$("#r_time1").prop('background-color:#FFF',this.checked);
  });

  $( "#recurringcheck2" ).on( "click", function() {
    $("#r_cost2").prop('disabled',!this.checked);
    //$("#r_time2").prop('background-color:#FFF',this.checked);
  });

});

</script>

<script type="text/javascript">

$("document").ready(function(){

  var wrapper         = $(".input_fields_wrap"); //Fields wrapper
  var add_button      = $(".add_field_button"); //Add button ID
  var x = 0;
  var output = {};





      @foreach ($packcattest as $pct)


              x++; //text box increment
              var test_id = 'test_'+x;
              var category_id = 'category_'+x;
              var cd = {{ $pct->cat_id }};
              var td = [{{ $pct->test_id }}];

              @foreach ($categories as $category)
                @if ($category->cat_id == $pct->cat_id)


                var cn = "{{ $category->cat_id }}";



              var $div = $('<div class="form-group catclass"><div class="card"><article class="card-body"><label>Category</label><select name="category[]" id='+category_id+' class="form-control select2-multiple"><option></option></select><label>Tests</label><select name="test[]" id='+test_id+' class="form-control select2-multiple" multiple="multiple"></select><div></div><a href="#" class="remove_field">Remove</a></article></div></div>');
              $(wrapper).append($div); //add input box


              @foreach ($categories as $category)
              $("#category_"+x).append($('<option>', {
                  value: {{ $category->cat_id }},
                  text : "{{ $category->cat_name }}"
              }));
              @endforeach

              @foreach ($tests as $test)
              $("#test_"+x).append($('<option>', {

                  value: {{ $test->test_id }},
                  text : "{{ $test->test_name }}"
              }));
              @endforeach

              $div.find("#test_"+x).select2({
              allowClear:true,
              tags :true,
              placeholder: '',
              theme: 'bootstrap' });
              $div.find("#category_"+x).select2({
              allowClear:true,
              placeholder: '',
              tags : true,
              theme: 'bootstrap' });




            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
              e.preventDefault();

              $(this).parent().parent().parent('div').remove();

            });


            $("#category_"+x).val(cn);
            $("#category_"+x).trigger('change');

            @endif
          @endforeach


          $("#test_"+x).val(td);
          $("#test_"+x).trigger('change');

        
      @endforeach


      $(add_button).click(function(e){ //on add input button click
              e.preventDefault();


              x++; //text box increment
              var test_id = 'test_'+x;
              var category_id = 'category_'+x;
              var $div = $('<div class="form-group catclass"><div class="card"><article class="card-body"><label>Category</label><select name="category[]" id='+category_id+' class="form-control select2-multiple"><option></option></select><label>Tests</label><select name="test[]" id='+test_id+' class="form-control select2-multiple" multiple="multiple"></select><div></div><a href="#" class="remove_field">Remove</a></article></div></div>');
              $(wrapper).append($div); //add input box

              @foreach ($categories as $category)
              $("#category_"+x).append($('<option>', {
                  value: {{ $category->cat_id }},
                  text : "{{ $category->cat_name }}"
              }));
              @endforeach
              @foreach ($tests as $test)
              $("#test_"+x).append($('<option>', {
                  value: {{ $test->test_id }},
                  text : "{{ $test->test_name }}"
              }));
              @endforeach

              $div.find("#test_"+x).select2({
              allowClear:true,
              tags :true,
              placeholder: '',
              theme: 'bootstrap' });
              $div.find("#category_"+x).select2({
              allowClear:true,
              placeholder: '',
              tags : true,
              theme: 'bootstrap' });


              $("select[id="+category_id+"]").change(function(){
                  var cat_id = $(this).val();
                  var token = $("input[name='_token']").val();

                  $.ajax({
                      url: '/select-ajax',
                      method: 'POST',
                      data: {cat_id:cat_id, _token:token},
                      success: function(data) {
                        $("select[id="+test_id+"]").html('');
                        $("select[id="+test_id+"]").html(data.options);
                      }
                  });
              });



      $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
              e.preventDefault();

              $(this).parent().parent().parent('div').remove();

      });

  });





      $('#submit').click(function(e){
         e.preventDefault();

         $(".catclass").each(function(){
            var category_id = $(this).find('select:eq(0)').select2("data");
            var c = category_id.map(m => m.id).join(',');

            var test_id = $(this).find('select:eq(1)').select2("data");
            var t = test_id.map(n => n.id).join(',');

            $("output").append(output[c]=t);



         });

         var id = {{ $package->package_id }};
         var service = $("select[id=service]").val();
         var packagename = $("input[name=packagename]").val();
         var packagetype = $("input[name=packagetype]").val();
         var duration = $("input[name=duration]").val();
         var time = $("select[name=time]").val();
         var full_dur = duration+time;
         var soutput = JSON.stringify(output);

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
          url: "/update",
          method: 'post',
          dataType:'json',
          data: {
             id:id,
             service:service,
             packagename:packagename,
             packagetype:packagetype,
             full_dur:full_dur,
             soutput:soutput,
             totalcost:totalcost,
             offerp:offerp,
             insuranceclaim:insuranceclaim,
             from_date:from_date,
             to_date:to_date,
             r_cost1:r_cost1,
             r_cost2:r_cost2
          },
<<<<<<< HEAD

          error: function(x,e) {
            if (x.status==0) {
                alert('You are offline!!\n Please Check Your Network.');
            } else if(x.status==200){
                window.location.href = "/";
            } else if(x.status==404) {
                alert('Requested URL not found.');
            } else if(x.status==500) {
                alert('Internel Server Error.');
            } else if(e=='timeout'){
                alert('Request Time out.');
            } else {
                 // modifyResponse(x);
                alert('Error.\n'+JSON.stringify(JSON.parse(x.responseText).errors));
                // JSON.stringify(JSON.parse(x.responseText).errors)
            }
          }
        });
        //window.location.href = "/";
=======
          success: function(data){
            alert('Package Updated');
            window.location.href = "/";

          },
          error: function (error){
            if(error.responseJSON.errors)
              {
                const errors = error.responseJSON.errors;
                const firstItem = Object.keys(errors)[0];
                const firstItemDOM = document.getElementById(firstItem);
                const firstErrorMessage = errors[firstItem][0];

                firstItemDOM.scrollIntoView({ behavior:'smooth' });

                clearErrors();

                firstItemDOM.insertAdjacentHTML('afterend','<div class="text-danger">'+firstErrorMessage+'</div>');
                firstItemDOM.classList.add('border', 'border-danger')

            }}
        });
        function clearErrors(){

             // remove all error messages
             const errorMessages = document.querySelectorAll('.text-danger')
             errorMessages.forEach((element) => element.textContent = '')
             // remove all form controls with highlighted error text box
             const formControls = document.querySelectorAll('.form-control')
             formControls.forEach((element) => element.classList.remove('border', 'border-danger'))
         }
>>>>>>> origin/shiyaf
       });

     });


</script>



<br><br>

</body>

</html>
