<!DOCTYPE html>
<html lang="en">
<head>
  <?= $this->renderSection('head') ?>
</head>
<body>
<div class="wrapper">
<?= $this->renderSection('navbar') ?>
  
  <!-- Main content -->
  <?= $this->renderSection('page') ?>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<?= $this->renderSection('script') ?>

</body>
</html>
