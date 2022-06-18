<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/google-font/sourcesanspro/css.css">
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">-->
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/ionicons/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url() ?>/themes/dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/summernote/summernote-bs4.min.css">

<link rel="stylesheet" href="<?= base_url() ?>/themes/custom/style.css">
	<title>Opss!</title>
<style type="text/css">
/*======================
    404 page
=======================*/

.page_404{ padding:40px 0;
}

.page_404  img{ width:100%;}

.four_zero_four_bg{
 
 background-image: url(<?= base_url() ?>/themes/img/animation/dribbble_1.gif);
    height: 400px;
    background-position: center;
	background-repeat: no-repeat;
 }
 
 
 .four_zero_four_bg h1{
 font-size:80px;
 }
 
  .four_zero_four_bg h3{
			 font-size:80px;
			 }
			 
			 .link_404{			 
	color: #fff!important;
    padding: 10px 20px;
    background: #39ac31;
    margin: 20px 0;
    display: inline-block;}
	.contant_box_404{ margin-top:-50px;}

</style>
</head>
<body class="layout-top-nav bg-white">
<div class="wrapper">

<div class="content-wrapper bg-white">

<div class="content bg-white">
<div class="container text-center">

<section class="page_404">
<div class="container">
	<div class="row">	
	<div class="col-sm-12 ">
	<div class="text-center">
	<div class="four_zero_four_bg">
		<h1 class="text-center ">Opss</h1>
	
	
	</div>
	
	<div class="contant_box_404">
	<h3 class="h2">
	Halaman tidak tersedia
	</h3>
	
	
	
	<?php if (! empty($message) && $message !== '(null)') : ?>
		<p><?= nl2br(esc($message)) ?>	</p>
		<div class="row">
			<div class="col">
				<div class="text-sm containter">

					Periksa penulisan routes method (post / get)
<br>
					Periksa penulisan nama file dan nama class pada Controller
<br>
					Periksa penulisan nama method pada class.
<br><br>
				</div>
			</div>
			
	</div>
	<?php else : ?>
		<p>		Maaf! tidak bisa menemukan halaman yang Anda cari	</p>
	<?php endif ?>


	
	<a href="<?= base_url() ?>" class="btn rounded-pill btn-primary">Ke Beranda</a>
</div>
	</div>
	</div>
	</div>
</div>
</section>

</div>

</div>
</div>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>/themes/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>/themes/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/themes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>/themes/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>/themes/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>/themes/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>/themes/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>/themes/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>/themes/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/themes/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>/themes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/themes/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/themes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/themes/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->

</body>

</html>
