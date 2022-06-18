<!DOCTYPE html>
<html lang="en">
<head>
  <?= $this->renderSection('head') ?>
</head>
<body class="hold-transition layout-footer-fixed layout-navbar-fixed layout-fixed text-sm">
<div class="wrapper">
  <?= $this->renderSection('navbar') ?>
  <?= $this->renderSection('sidebar') ?>
  <div class="content-wrapper">
    <div class="content">
      <?= $this->renderSection('page') ?>
    </div>
  </div>
  <?= $this->renderSection('footer') ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<?= $this->renderSection('javascript') ?>
<?= $this->renderSection('script') ?>
</body>
</html>
