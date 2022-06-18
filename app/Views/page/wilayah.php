    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Wilayah</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
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
    <table>
    <tbody>
      <?php if(isset($data_wilayah) && is_array($data_wilayah) && count($data_wilayah)) : ?>
      <?= count($data_wilayah) ?>
        <?php foreach ($data_wilayah as $keys => $values) : ?>
          <tr>
            <?php foreach ($values as $key => $value) : ?>
                <td>
                  <?= $key ?>
                </td>
                <td>
                  <?= $value ?>
                </td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
    </table>
    </div>
</div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->