<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>SiADE | Sistem Informasi Administrasi Desa</title>
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
<link rel="stylesheet" type="text/css" href="{BASE_URL}assets/metronic/plugins/select2/select2_metro.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="{BASE_URL}assets/metronic/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="{BASE_URL}assets/metronic/css/style.css" rel="stylesheet" type="text/css"/>
<link href="{BASE_URL}assets/metronic/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="{BASE_URL}assets/metronic/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="{BASE_URL}assets/metronic/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{BASE_URL}assets/metronic/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
<link href="{BASE_URL}assets/metronic/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{BASE_URL}assets/metronic/favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	&nbsp;
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="{SITE_URL}/login" method="post">
	    <div class="col-md-6">	
                <h3 class="form-title">&nbsp;</h3>
		{ERROR_SECTION}
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">UserID</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="UserID" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Kata Sandi</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Kata Sandi" name="password"/>
			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Ingat Saya </label>
			<button type="submit" class="btn blue pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		<div class="forget-password">
			<h4>Lupa Password ?</h4>
			<p>
				Klik <a href="javascript:;" id="forget-password">di sini</a>
				untuk mendapatkan password anda kembali.
			</p>
		</div>
            </div>
            <div class="col-md-6">
            </div>    
            <div class="clearfix"></div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="{SITE_URL}/home/forget_password" method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> Back </button>
			<button type="submit" class="btn blue pull-right">
			Submit <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
	
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2016 &copy; SiADE - Sistem Informasi Administrasi Desa.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script> 
	<![endif]-->
<script src="{BASE_URL}assets/metronic/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{BASE_URL}assets/metronic/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{BASE_URL}assets/metronic/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{BASE_URL}assets/metronic/scripts/app.js" type="text/javascript"></script>
<script src="{BASE_URL}assets/metronic/scripts/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>