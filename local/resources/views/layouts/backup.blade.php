<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->

        {{ HTML::script('assets/js/jquery-1.7.1.min.js') }}
        {{ HTML::script('assets/js/jquery.min.js') }}
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
        {{ HTML::script('assets/js/jquery-ui.js') }}
        {{ HTML::script('assets/js/jquery.number.js') }}
        {{ HTML::script('assets/js/select2.js') }}
        {{ HTML::script('assets/js/bootstrap2.min.js') }}
       
        {!!Html::style('assets/css/select2.css')!!}
        {!!Html::style('assets/css/bootstrap.min.css')!!}
        {!!Html::style('assets/css/jquery-ui.css')!!}
       
        <style>
        body {
            
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .the-legend {
    border-style: none;
    border-width: 0;
    font-size: 14px;
    line-height: 20px;
    margin-bottom: 0;
}
.the-fieldset {
    border: 2px groove threedface #444;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
<script type="text/javascript">
   $(document).ready(function(){
    $("#at").number(true);
    $("#credit").number(true);
    $("#debit").number(true);
$("#accbank").select2();
    $("#debit").keyup(function(){
        $("#credit").val("");
    });
     $("#credit").keyup(function(){
        $("#debit").val("");
    });
    
    $("#create").click(function(){
            $("#saveac").removeAttr('disabled');
            $("#form-save")[0].reset();
            $("#id").val("");
            $("#an").prop('disabled', false);
            $("#at").prop('disabled', false);
            $("#detailTable tr td").remove(); 
    });
   // $("#savedt").prop('disabled', true);
    var detail= $('#form-detail');
    var frm = $('#form-save');
    var updateDetail=$("#update-detail");

updateDetail.submit(function(e){
    var data=updateDetail.serialize();
        $.ajax({
                                    type: updateDetail.attr('method'),
                                    url: updateDetail.attr('action'),
                                    data: updateDetail.serialize(),
                                    success: function (data) {
                                       alert("sukses Update data");
                                    //$("input").prop('disabled', true)
                                    }
                                });

     e.preventDefault();
});

    frm.submit(function(e) {
                           $.ajax({
                                    type: frm.attr('method'),
                                    url: frm.attr('action'),
                                    data: frm.serialize(),
                                    success: function (data) {
                                        $("#id").val(data);
                                        $("#an").prop('disabled', true);
                                        $("#at").prop('disabled', true);
                                        $("#account_date").prop('disabled', true);
                                        $("#saveac").prop('disabled', true);
                                        $("#savedt").removeAttr('disabled');
                                    //$("input").prop('disabled', true)
                                    }
                                });
                                        e.preventDefault();
            });

    detail.submit(function(e){
        var acn=$("#acn").val();
        var tra=$("#tra").val();
        var debit=$("#debit").val();
        var credit=$("#credit").val();
        var option=$("#option").val();
        var destiny=$("#destiny").val();
        var data=detail.serialize();  
               $.ajax({
                        type: detail.attr('method'),
                        url: detail.attr('action'),
                        data: detail.serialize(),
                        success: function (data) {  
                                 
                        $('#detailTable').append('<tr><td>'+acn+'</td><td>'+tra+'</td><td>'+debit+'</td><td>'+credit+'</td><td>'+option+'</td><td>'+destiny+'</td></tr>');
                        $("#acn").val("");
                        $("#tra").val("");
                        $("#debit").val("");
                        $("#credit").val("");
                         }
                    });

 
    e.preventDefault();      
    });

$("#account_date").datepicker({ dateFormat: 'yy-mm-dd' });
   });
   function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>

 
</body>
</html>
