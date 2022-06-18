    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List Email</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <?php if(isset($db_template_email)): ?>
            <ul>
              <?php foreach ($db_template_email as $keys => $values) : ?>
                <li>
                  <a href="<?= base_url() ?>/master/template-email-edit/<?= $values['id_template_email'] ?>"><?= $values['id_template_email'] ?>. <?= $values['jenis_template_email'] ?>: <?= $values['judul_email'] ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
