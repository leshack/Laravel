<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('page_title') {{config('app.name')}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')  }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('plugins/daterangepicker/daterangepicker.css') }}">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{ url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
   <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Bootstrap select -->
  <link rel="stylesheet" href="{{ url('css/bootstrap-select.css') }}">
    <!-- Bootstrap file input -->
  <link rel="stylesheet" href="{{ url('css/fileinput.min.css') }}">
    <!-- Awesome Bootstrap checkbox -->
  <link rel="stylesheet" href="{{ url('css/awesome-bootstrap-checkbox.css') }}">

   <link rel="stylesheet" href="{{url('css/ijaboCropTool/ijaboCropTool.min.css') }}">

   <link rel="stylesheet" href="{{url('css/awesome-bootstrap-checkbox.css')}}">

  <!-- favicon -->
  <link rel="icon" href="{{url('images/favicon-icon/favicon.png')}}" type="image/png">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

    {{-- 1. Top menu --}}
    @include('Admin.Layout.topmenu')
    {{-- 2. Left menu --}}
    @include('Admin.Layout.leftmenu')
    {{-- 3. Main  content body --}}
  <div class="content-wrapper">
    <section class="content">
        @yield('content')
    </section>

  </div>



    {{-- 4.Right menu --}}
    @include('Admin.Layout.rightmenu')
    {{-- 5. Footer  --}}
    @include('Admin.Layout.footermenu')


</div>
<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
        let switchery = new Switchery(html,  { size: 'small' });
    });</script>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('dist/js/adminlte.min.js') }}"></script>
<!-- SearchTable -->
	<!-- Loading Scripts -->

<script src="{{ url('js/jquery.min.js') }}"></script>
<script src="{{ url('js/bootstrap-select.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/bootstrap-select.js') }}"></script>
<script src="{{ url('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('js/Chart.min.js') }}"></script>
<script src="{{ url('js/fileinput.js') }}"></script>
<script src="{{ url('js/chartData.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>

<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="{{ url('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('plugins/chart.js/Chart.min.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ url('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ url('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ url('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('dist/js/pages/dashboard.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
 <script src="{{url('css/ijaboCropTool/ijaboCropTool.min.js') }}"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
<script>
$(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
  </script>

<script type="text/JavaScript">
    <!--
    function MM_findObj(n, d) { //v4.01
      var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
        d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
      if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
      for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
      if(!x && d.getElementById) x=d.getElementById(n); return x;
    }

    function MM_validateForm() { //v4.0
      var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
      for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
        if (val) { nm=val.name; if ((val=val.value)!="") {
          if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
            if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
          } else if (test!='R') { num = parseFloat(val);
            if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
            if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
              min=test.substring(8,p); max=test.substring(p+1);
              if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
        } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
      } if (errors) alert('The following error(s) occurred:\n'+errors);
      document.MM_returnValue = (errors == '');
    }

    function MM_jumpMenu(targ,selObj,restore){ //v3.0
      eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
      if (restore) selObj.selectedIndex=0;
    }
    //-->
    </script>
    <script type="text/javascript" src="nicEdit.js"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script>
{{-- CUSTOM JS CODES --}}
<script>

    $.ajaxSetup({
       headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       }
    });

    $(function(){

      /* UPDATE USER PERSONAL INFO */
      $(document).on('click','#change_picture_btn', function(){
        $('#admin_image').click();
      });


      $('#admin_image').ijaboCropTool({
            preview : '.user_picture',
            setRatio:1,
            allowedExtensions: ['jpg', 'jpeg','png'],
            buttonsText:['CROP','QUIT'],
            buttonsColor:['#30bf7d','#ee5155', -15],
            processUrl:'{{ route("admin.profilepic") }}',
            // withCSRF:['_token','{{ csrf_token() }}'],
            onSuccess:function(message, element, status){
               alert(message);
            },
            onError:function(message, element, status){
              alert(message);
            }
         });


    });

  </script>

  {{-- CUSTOM JS CODES --}}
<script>

    $.ajaxSetup({
       headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       }
    });

    $(function(){

      /* UPDATE USER PERSONAL INFO */
      $('#PasswordForm').on('submit',function(e){
         e.preventDefault();

         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#PasswordForm')[0].reset();
                alert(data.msg);
              }
            }
         });
      });


    });

  </script>
   {{-- CUSTOM JS CODES --}}
<script>

    $.ajaxSetup({
       headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       }
    });

    $(function(){

      /* UPDATE USER PERSONAL INFO */
      $('#AdminInfoForm').on('submit',function(e){
         e.preventDefault();

         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                 $('#AdminInfoForm')[0].reset();
            //   $('.admin_name').each(function()){
            //       $(this).html( $('#AdminInfoForm').find( $('input[name="name"]')).val() );
            //   });
                alert(data.msg);
              }
            }
         });
      });


    });

  </script>

  {{-- CUSTOM JS CODES --}}
 <script>

    $.ajaxSetup({
       headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       }
    });

    $(function(){

      /* UPDATE USER PERSONAL INFO */
      $('#form').on('submit',function(e){
         e.preventDefault();
        //  alert('hi');
         var form = this;
         $.ajax({
            url:$(form).attr('action'),
            method:$(form).attr('method'),
            data:new FormData(form),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(form).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                 $(form).find('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('form')[0].reset();
                alert(data.msg);
              }
            }
         });
      });


    });
//Reset input file
$('input[type="file"][name="Vimage1"]').val('');
            //Image preview
            $('input[type="file"][name="Vimage1"]').on('change', function(){
                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                     if(typeof(FileReader) != 'undefined'){
                          img_holder.empty();
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:300px;max-height:200px;border:solid:1px:#000;'}).appendTo(img_holder);
                          }
                          img_holder.show();
                          reader.readAsDataURL($(this)[0].files[0]);
                     }else{
                         $(img_holder).html('This browser does not support FileReader');
                     }
                }else{
                    $(img_holder).empty();
                }
            });

            //Reset input file
            $('input[type="file"][name="Vimage2"]').val('');
            //Image preview image 2
            $('input[type="file"][name="Vimage2"]').on('change', function(){
                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder2');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                     if(typeof(FileReader) != 'undefined'){
                          img_holder.empty();
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:300px;max-height:200px;border:solid:1px:#000;'}).appendTo(img_holder);
                          }
                          img_holder.show();
                          reader.readAsDataURL($(this)[0].files[0]);
                     }else{
                         $(img_holder).html('This browser does not support FileReader');
                     }
                }else{
                    $(img_holder).empty();
                }
            });

              //Reset input file
              $('input[type="file"][name="Vimage3"]').val('');
            //Image preview image 2
            $('input[type="file"][name="Vimage3"]').on('change', function(){
                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder3');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                     if(typeof(FileReader) != 'undefined'){
                          img_holder.empty();
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:300px;max-height:200px;border:solid:1px:#000;'}).appendTo(img_holder);
                          }
                          img_holder.show();
                          reader.readAsDataURL($(this)[0].files[0]);
                     }else{
                         $(img_holder).html('This browser does not support FileReader');
                     }
                }else{
                    $(img_holder).empty();
                }
            });
              //Reset input file
              $('input[type="file"][name="Vimage4"]').val('');
            //Image preview image 2
            $('input[type="file"][name="Vimage4"]').on('change', function(){
                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder4');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                     if(typeof(FileReader) != 'undefined'){
                          img_holder.empty();
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:300px;max-height:200px;border:solid:1px:#000;'}).appendTo(img_holder);
                          }
                          img_holder.show();
                          reader.readAsDataURL($(this)[0].files[0]);
                     }else{
                         $(img_holder).html('This browser does not support FileReader');
                     }
                }else{
                    $(img_holder).empty();
                }
            });
              //Reset input file
              $('input[type="file"][name="Vimage5"]').val('');
            //Image preview image 2
            $('input[type="file"][name="Vimage5"]').on('change', function(){
                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder5');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                     if(typeof(FileReader) != 'undefined'){
                          img_holder.empty();
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:300px;max-height:200px;border:solid:1px:#000;'}).appendTo(img_holder);
                          }
                          img_holder.show();
                          reader.readAsDataURL($(this)[0].files[0]);
                     }else{
                         $(img_holder).html('This browser does not support FileReader');
                     }
                }else{
                    $(img_holder).empty();
                }
            });
            $(document).on('click', '#editBtn',function(){
                var vehicle_id = $(this).data('id');
                s,get({vehicle_id:vehicle_id} ,function($data){
                    var vehicle_modal = $('.exampleModalCenter');

                    $(vehicle_modal).modal('show');
                }, 'json');
            })
            // $(document).on('click', '#editBtn',function(){
            //     var vehicle_id = $(this).data('id');
            //     $.get("vehicle_id" ,function(data){
            //         var vehicle_modal = $('#exampleModalCenter');
            //         $(vehicle_modal).find('form').find('.img-holder').html('<img src="/images/Adminimages/vehicleimages/'+data.result
            //         .vehicle_image+'" class="img-fluid" style="max-width:100px;margin-botton:10px;">');
            //         $(vehicle_modal).modal('show');
            //     });
            // })
     $(document).ready(function(){
    $('.js-switch').change(function () {
        let status = $(this).prop('checked') == true ? 1: 0;
        let testimonialId = $(this).data('id');
        $.ajax({

            dataType:'json',
            type: "GET",
            url: "{{ route ('admin.testimonials.status')}}",
            data: { 'status': status, 'id': testimonialId },
            success: function (data) {
                toastr.options.closeButton = true;
                toastr.options.closeMethod = 'fadeOut';
                toastr.options.closeDuration = 100;
                toastr.success(data.msg);
            }
        });
    });
})

  </script>
</body>
</html>
