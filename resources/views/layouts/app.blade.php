<!DOCTYPE html>
<html lang="en" >
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Blank Page - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="docs/js/plugins/datej/dist/daterangepicker.min.css">

    <link rel="stylesheet" type="text/css" href="docs\js\plugins\dater\daterangepicker.css" >
    <link rel="stylesheet" type="text/css" href="docs\js\plugins\date3\css\bootstrap-material-datetimepicker.css" >

    <link rel="stylesheet" type="text/css" href="docs/css/main.css">


    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



    @livewireStyles


    @livewireScripts


    <script src="{{mix('js/app.js')}}"></script>



    <style>
       html,body{
           font-family: 'Cairo', sans-serif!important;
       }
          @media print {

              button,a,select,input{
              display: none!important;

              }

          }


       .timeout {
           right: 10px;
           position: fixed;
           top: 97px;
           z-index: 989989899;
           transition: 3s all;

           margin-right: 0px;
        }
        .iscomp{
            background: #034403!important;
        }
       .iscomp :hover{
            color: #fff!important;
        }
       .iscomp a:hover{
            color: #ff2415 !important;
        }
       .darkmode2{

           color:#000000!important;
           background-color: #fff!important;
       }
       .darkmode1{

           color:#000000!important;
           background-color: #effbff!important;
       }
       .loader{
           position: fixed;
           top :0;
           left:0;
           background-color: #191c24;
           display:flex;
           justify-content: center;
           align-items: center;
           height: 100%;
           width:100%;
           z-index: 1000000;

       }
       .disaper{
           animation: pre 1s forwards;


       }
       @keyframes pre {
           100%{
               opacity: 0;
               visibility: hidden;
           }
       }
    </style>
</head>
<body class="app sidebar-mini fixed" style="direction: rtl; text-align:right!important;">

<!-- Navbar-->
<div class="wrapper">
@include('layouts.navbar')
<!-- Sidebar menu-->
@include('layouts.sidebar')
<main class="app-content">

  @yield('content')

</main>

</div>
<!-- Essential javascripts for application to work-->

<script>


    window.livewire.on('create',function(){
        $("#dark-header-modal-pro1").modal("hide");

    }) ;
    window.livewire.on('upprem',function(){
        $("#dark-header-modal-update1").modal("hide");

    }) ;
    window.livewire.on('update',function(){
        $("#dark-header-modal-update1").modal("hide");



    }) ;
    window.livewire.on('update1',function(){
        $(".bd-example-modal-lg-update").modal("hide");



    }) ;
    window.livewire.on('del',function(){
        $("#danger-alert-modal").modal("hide");

    }) ;


</script>
<script>


        setInterval(function () {
            $(".timeout").css({"margin-right":"-1000px"});
        },9000);

        $('#dark-header-modal-pro1').on('hidden.bs.modal',function () {
            livewire.emit('restformcat');

        });

       $(".bd-example-modal-lg-update").on('hidden.bs.modal',function () {
            livewire.emit('getval');

        });



        $('#dark-header-modal-update1').on('hidden.bs.modal',function () {
            livewire.emit('restformcat');

        });





</script>



<script src="docs/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="docs/js/plugins/pace.min.js"></script>

<script type="text/javascript" src="docs/js/plugins/date3/moment.min.js"></script>
<script type="text/javascript" src="docs/js/plugins/date3/js/bootstrap-material-datetimepicker.js"></script>
{{--}}
<script src="docs/js/plugins/dater/moment.min.js"></script>
<script src="docs/js/plugins/dater/daterangepicker.js"></script>


<script type="text/javascript" src="docs/js/plugins/datej/moment.min.js"></script>
<script type="text/javascript" src="docs/js/plugins/datej/jquery.min.js"></script>
<script type="text/javascript" src="docs/js/plugins/datej/dist/jquery.daterangepicker.min.js"></script>
{{--}}

<script type="text/javascript" src="docs/js/plugins/select2.min.js"></script>


<!-- Page specific javascripts-->





<!-- Google analytics script-->
{{--}}
<script type="text/javascript">


    $('.demoSelect').select2();


    $(function() {

var start = moment().subtract(29, 'ايام');
var end = moment();

function cb(start, end) {
  
    
    
    //$('.reportrange span').html(start.format('YYYY,MM,DD') + ' - ' + end.format('YYYY,MM,DD'));
    $('.reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));


}

$('.reportrange').daterangepicker({
    startDate: start,
    alwaysShowCalendars:true,
 
    showDropdowns: true,
    endDate: end,
    ranges: {
       'اليوم': [moment(), moment()],
       'الامس': [moment().subtract(1, 'ايام'), moment().subtract(1, 'ايام')],
       'اخر 7 ايام': [moment().subtract(6, 'ايام'), moment()],
       'اخر 30 يوم': [moment().subtract(29, 'ايام'), moment()],
       'هذا الشهر ': [moment().startOf('شهر'), moment().endOf('شهر')],
       'اخر شهر ': [moment().subtract(1, 'شهر').startOf('شهر'), moment().subtract(1, 'شهر').endOf('شهر')]
    }
}, cb);

cb( end,start);

});
{{--}}
<script type="text/javascript">

$('.datepicker').bootstrapMaterialDatePicker({ weekStart : 0, time: false });



    if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>
<!-- Page specific javascripts-->

{{--}}<script type="text/javascript" src="docs/js/plugins/select2.min.js"></script>{{--}}


<!-- Google analytics script-->
@stack('scripts')

<script>

    function printcon(el){
        var restorpage = document.body.innerHTML;
        var printcontent22 = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent22;
        window.print();
        document.body.innerHTML = restorpage;

    }
</script>

</body>
</html>

