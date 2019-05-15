<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>{TITLE_PAGE}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="{BASE_URL}assets/metronic/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="{BASE_URL}assets/metronic/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="{BASE_URL}assets/metronic/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{BASE_URL}assets/metronic/plugins/select2/select2_metro.css" rel="stylesheet" type="text/css" />
<link href="{BASE_URL}assets/metronic/plugins/data-tables/DT_bootstrap.css" rel="stylesheet" type="text/css" />

<link href="{BASE_URL}assets/metronic/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->

<link href="{BASE_URL}assets/metronic/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="{BASE_URL}assets/metronic/css/style.css" rel="stylesheet" type="text/css"/>
<link href="{BASE_URL}assets/metronic/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="{BASE_URL}assets/metronic/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="{BASE_URL}assets/metronic/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{BASE_URL}assets/metronic/css/custom.css" rel="stylesheet" type="text/css"/>
<!--
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
-->
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{BASE_URL}assets/metronic/favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
    
    {HEADER_SECTION}
    <div class="clearfix"></div>
    <div class="page-container">
    {BODY_SECTION}
    </div>
    {FOOTER_SECTION}

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{BASE_URL}assets/metronic/plugins/respond.min.js"></script>
<script src="{BASE_URL}assets/metronic/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="{BASE_URL}assets/metronic/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{BASE_URL}assets/metronic/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{BASE_URL}assets/metronic/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/flot/jquery.flot.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="{BASE_URL}assets/metronic/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>
<script src="{BASE_URL}assets/metronic/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" type="text/javascript" ></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{BASE_URL}assets/metronic/plugins/select2/select2.min.js" type="text/javascript" ></script>
<script src="{BASE_URL}assets/metronic/plugins/data-tables/jquery.dataTables.js" type="text/javascript" ></script>
<script src="{BASE_URL}assets/metronic/plugins/data-tables/DT_bootstrap.js" type="text/javascript" ></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{BASE_URL}assets/metronic/scripts/app.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/scripts/index.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<script>
      jQuery(document).ready(function() {    
            App.init(); // initlayout and core plugins
            Index.init();
      //  Index.initJQVMAP(); // init index page's custom scripts
      //  Index.initCalendar(); // init index page's custom scripts
      //  Index.initCharts(); // init index page's custom scripts
      //  Index.initChat();
      //  Index.initMiniCharts();
      //  Index.initDashboardDaterange();
      //  Index.initIntro();
      //  Tasks.initDashboardWidget();
     });
   </script>
   <script type="text/javascript">
            
           {SCRIPT_SECTION}
        
   </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>