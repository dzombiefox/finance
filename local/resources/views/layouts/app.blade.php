<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Finance</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->

        {{ HTML::script('assets/js/jquery-1.10.2.min.js') }}
        {{ HTML::script('assets/js/jquery.number.js') }}
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}      
        {{ HTML::script('assets/js/select2.js') }}   
       
        {!!Html::style('assets/fonts/glyphicons/css/glyphicons.min.css')!!} 
        {!!Html::style('assets/css/select2.css')!!}       
        {!!Html::style('assets/css/bootstrap.min.css')!!}
        {!!Html::style('assets/css/jquery-ui.css')!!}
        {!!Html::style('assets/css/styles.css?=121')!!}
        {!!Html::style('assets/plugins/datatables/dataTables.css')!!}
        {!!Html::style('assets/plugins/codeprettifier/prettify.css')!!}
        {!!Html::style('assets/plugins/form-toggle/toggles.css')!!}
        {!!Html::style('assets/css/jquery.datetimepicker.css')!!}
<style type="text/css">

.notes { 
      padding: 3px 10px;
      border-collapse: collapse;
   font-size: 12px;font-weight: normal;}  
.datagrid table { 
    border-collapse: collapse;
    text-align: left; width: 100%; } 
.datagrid {font: normal 14px/150% Arial, Helvetica, sans-serif; 
          background: #fff; overflow: hidden; -webkit-border-radius: 3px;
          -moz-border-radius: 3px; 
          border-radius: 3px;}
.datagrid table td, 
.datagrid table th { padding: 3px 10px; }
.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );
filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');
background-color:#006699; color:#FFFFFF; font-size: 12px; font-weight: bold; border-left: 1px solid #0070A8; 
} 
.datagrid table thead th:first-child { border: none; }
.datagrid table tbody td { color: #00557F; border-left: 1px solid #E1EEF4;
font-size: 11px;font-weight: normal;
}.datagrid table tbody .alt td { background: #E1EEF4; color: #00557F; }
.datagrid table tbody td:first-child { border-left: none; }
.datagrid table tbody tr:last-child td { border-bottom: none; }
 </style>
        <style>
        .glyphicon{    
          color:#333;}
        body {

            font-family: 'Arial';
        }

        .fa-btn {
            margin-right: 6px;
        }
    fieldset {
    padding: 10px 10px 0px 10px;
    border: 1px solid #dfe5c1;
    margin: 0px 0px 10px 0px;
    width: auto;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
}

    </style>
    <script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
</head>
<body id="app-layout" >
   @if (Auth::guest()) 
@else 
<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
    <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="Toggle Sidebar"></a>
   

    <div class="navbar-header pull-left">
            <a class="navbar-brand" href="{{ url('/') }}"></a>
        </div>

        <ul class="nav navbar-nav pull-right toolbar">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle username" data-toggle="dropdown"><span class="hidden-xs">Welcome  {{ Auth::user()->name }}  <i class="fa fa-caret-down"></i></span></a>
                <ul class="dropdown-menu userinfo arrow">
                    
                    <li class="userlinks">
                        <ul class="dropdown-menu">
                            
                            <li><a href="{{ url('/logout') }}"" class="text-right">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            
            

        </ul>
    </header>
   
       
       
    <div id="page-container">
        <!-- BEGIN SIDEBAR -->

        <nav id="page-leftbar" role="navigation">
                <!-- BEGIN SIDEBAR MENU -->
            <ul class="acc-menu" id="sidebar">
                <li id="search">
                    <a href="javascript:;"><i class="fa fa-search opacity-control"></i></a>
                     
                </li>
                <li class="divider"></li>
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li>
                <li><a href="javascript:;"><i class="fa fa-th"></i> <span>Master Menu</span> </a>
                    <ul class="acc-menu">
                        <li><a href="{{ url('/admin/banks/') }}"><span>Bank</span></a></li> 
                        <li><a href="{{ url('/admin/owners/') }}"><span>Owner</span></a></li>
                        <li><a href="{{ url('/admin/categorys/') }}"><span>Category</span></a></li>
                        <li><a href="{{ url('/admin/items/') }}"><span>Item</span></a></li>
                        <li><a href="{{ url('/admin/accbanks/') }}"><span>Account Bank</span></a></li>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="fa fa-list-ol"></i> <span>Transaksi</span></a>
                    <ul class='acc-menu'>
                        <li><a href="{{ url('/admin/accounts/') }}">Data Account</a></li>
                        
                    </ul>
                </li>
 
               
               
               
               
                <li class="divider"></li>
                <li><a href="{{ url('/admin/report') }}"><i class="fa fa-briefcase"></i> <span>Report</span> </a>
                   
                </li>
                
            </ul>
            <!-- END SIDEBAR MENU -->
        </nav>

       

        <!-- BEGIN RIGHTBAR -->
        <div id="page-rightbar">

            <div id="chatarea">
                <div class="chatuser">
                    <span class="pull-right">Jane Smith</span>
                    <a id="hidechatbtn" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
                <div class="chathistory">
                    <div class="chatmsg">
                        <p>Hey! How's it going?</p>
                        <span class="timestamp">1:20:42 PM</span>
                    </div>
                    <div class="chatmsg sent">
                        <p>Not bad... i guess. What about you? Haven't gotten any updates from you in a long time.</p>
                        <span class="timestamp">1:20:46 PM</span>
                    </div>
                    <div class="chatmsg">
                        <p>Yeah! I've been a bit busy lately. I'll get back to you soon enough.</p>
                        <span class="timestamp">1:20:54 PM</span>
                    </div>
                    <div class="chatmsg sent">
                        <p>Alright, take care then.</p>
                        <span class="timestamp">1:21:01 PM</span>
                    </div>
                </div>
                <div class="chatinput">
                    <textarea name="" rows="2"></textarea>
                </div>
            </div>

            
        </div>
        <!-- END RIGHTBAR -->
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">

         
            <div class="options">
               
            </div>
        </div>
 @endif

        <div class="container">
@yield('content')
      </div>    <!-- container -->
    </div> <!--wrap -->
    </div> <!-- page-content -->

       

</div>
 
 {{ HTML::script('assets/js/jqueryui-1.10.3.min.js') }}
{{ HTML::script('assets/js/bootstrap.min.js') }}
{{ HTML::script('assets/js/enquire.js') }}
{{ HTML::script('assets/js/jquery.cookie.js') }}
{{ HTML::script('assets/js/jquery.nicescroll.min.js') }}
{{ HTML::script('assets/plugins/codeprettifier/prettify.js') }}
{{ HTML::script('assets/plugins/easypiechart/jquery.easypiechart.min.js') }}
{{ HTML::script('assets/plugins/sparklines/jquery.sparklines.min.js') }}
{{ HTML::script('assets/plugins/form-toggle/toggle.min.js') }}
{{ HTML::script('assets/plugins/datatables/jquery.dataTables.min.js') }}
{{ HTML::script('assets/plugins/datatables/TableTools.js') }}
{{ HTML::script('assets/plugins/jquery-editable/jquery.editable.min.js') }}
{{ HTML::script('assets/plugins/datatables/dataTables.editor.js') }}
{{ HTML::script('assets/plugins/datatables/dataTables.editor.bootstrap.js') }}
{{ HTML::script('assets/plugins/datatables/dataTables.bootstrap.js') }}
{{ HTML::script('assets/js/placeholdr.js') }}
{{ HTML::script('assets/js/application.js') }}
{{ HTML::script('assets/js/jquery.datetimepicker.full.js') }}
{{ HTML::script('assets/demo/demo.js') }}
{{ HTML::script('assets/js/jQuery.print.js') }}

<script type="text/javascript">
        function disableDetails(){
            $('#destiny').select2('enable', false);  
            $('#category').select2('enable', false); 
            $('#item').select2('enable', false); 
            $("#at").prop('disabled', true);  
            $("#acn").prop('disabled', true); 
            $("#tr").prop('disabled', true);   
            $("#debit").prop('disabled', true);  
            $("#credit").prop('disabled', true);
            $("#savedt").prop('disabled',true);
        }
        function disableAll(){
            $("#saveac").prop('disabled', true);   
            $("#savedt").prop('disabled', true); 
            $('#destiny').prop('disabled', true);  
            $('#category').prop('disabled', true);
            $('#item').prop('disabled', true); 
            $("#at").prop('disabled', true);  
            $("#acn").prop('disabled', true); 
            $("#tr").prop('disabled', true);   
            $("#debit").prop('disabled', true);  
            $("#credit").prop('disabled', true);  
            $("#accbank").prop('disabled', true); 

        }
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
$(document).ready(function(){           
            // $("#at").number(true);
            $(".credit").number(true);
            $(".debit").number(true);
            $("#accbank").select2();
            $(".debit").keyup(function(){
                $(".credit").val("");
            });
             $(".credit").keyup(function(){
                $(".debit").val("");
            });            
            $("#create").click(function(){
                    $('#accbank').select2('enable', true);
                    disableDetails();
                    $("#saveac").removeAttr('disabled');
                    $("#form-save")[0].reset();
                    $("#id").val("");
                    $("#an").prop('disabled', false);
                    $("#at").prop('disabled', false);
                    $("#account_date").prop('disabled', false);
                    $("#detailTable tr td").remove(); 
                    $(".warning").html('');

            });
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

        $("#account_date").datepicker({ dateFormat: 'yy-mm-dd' });
   });

</script>
<script type="text/javascript">
    $(document).ready(function(){
         $(".tables").dataTable();
         $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search...');
         $('.dataTables_length select').addClass('form-control');
    });

</script>
</body>
</html>
