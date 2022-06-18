<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Print Preview</title>
	<meta name="description" content="Print Preview">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
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
<link rel="stylesheet" href="<?= base_url() ?>/themes/viewerjs/viewer.css">
<link rel="stylesheet" href="<?= base_url() ?>/themes/custom/style.css">
<style>

@page {
	size: <?= (isset($size_width) && $size_width != '') ? $size_width : '210mm' ?> <?= (isset($size_height) && $size_height != '') ? $size_height : '297mm' ?> <?= (isset($size_orientation) && $size_orientation != '') ? $size_orientation : 'potrait' ?>;
}

@page {
	margin-top: <?= (isset($margin_top) && $margin_top != '') ? $margin_top : '0' ?>;
	margin-right: <?= (isset($margin_right) && $margin_right != '') ? $margin_right : '0' ?>;
	margin-left: <?= (isset($margin_left) && $margin_left != '') ? $margin_left : '0' ?>;
	margin-bottom: <?= (isset($margin_bottom) && $margin_bottom != '') ? $margin_bottom : '0' ?>;
}

@page :first {
	margin-top: <?= (isset($margin_top_first) && $margin_top_first != '') ? $margin_top_first : '0' ?>;
	margin-right: <?= (isset($margin_right_first) && $margin_right_first != '') ? $margin_right_first : '0' ?>;
	margin-left: <?= (isset($margin_left_first) && $margin_left_first != '') ? $margin_left_first : '0' ?>;
	margin-bottom: <?= (isset($margin_bottom_first) && $margin_bottom_first != '') ? $margin_bottom_first : '0' ?>;
}

body { margin: <?= (isset($margin_body) && $margin_body != '') ? $margin_body : '0' ?>; }

@page {
	@top-left-corner { content: counter(page) }
	@top-left { content: counter(page) }
	@top-center { content: counter(page) }
	@top-right { content: counter(page) }
	@top-right-corner { content: counter(page) }
	@right-top { content: counter(page) }
	@right-middle { content: counter(page) }
	@right-bottom { content: counter(page) }
	@bottom-right-corner { content: counter(page) }
	@bottom-right { content: counter(page) }
	@bottom-center { content: counter(page) }
	@bottom-left { content: counter(page) }
	@bottom-left-corner { content: counter(page) }
	@left-bottom { content: counter(page) }
	@left-middle { content: counter(page) }
	@left-top { content: counter(page) }
}

@page CompanyLetterHead:first {
   @top-left { content: "Header in top-left with approx. twice as many words as right cell." }
  @top-right { content: "Right cell (top-right)" }
}

</style>
</head>
<body>
<?php if(isset($print_preview)) : ?>
<?= $print_preview ?>
<?php endif; ?>
</body>
</html>
