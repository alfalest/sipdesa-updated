
    <!-- Main content -->
    <section class="content">
      <div class="container">
    
    <div class="row">
    <div class="col-12 pt-2">
      <div class="card round-1">
      <div class="card-header">
        <div class="card-title">
          <h5 class="font-weight-bold">Kependudukan</h5>
        </div>
        <div class="card-tools">
          <div>
          <a href="<?=base_url()?>/operator/" class="text-sm btn btn-primary btn-sm rounded-pill">
            <i class="fas fa-times"></i>
          </a>
          </div>
        </div>
      </div>
      <div class="card-body">
          <div class="row">
          <div class="col-12">
          <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/operator/kartu-keluarga">
            <div class="d-flex justify-content-between">
              <div>Verifikasi Kartu Keluarga</div>
              <div>
              <?php if(isset($badge_notif['kk_proses']) && $badge_notif['kk_proses'] != 0) : ?>
                  <span class="badge badge-danger mr-3"><?= $badge_notif['kk_proses'] ?></span>
                <?php endif; ?>
              <i class="fas fa-angle-right"></i>
              </div>
            </div>
          </a>
          <hr>
          <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/operator/anggota-keluarga">
            <div class="d-flex justify-content-between">
              <div>Verifikasi Anggota Keluarga</div>
              <div>
              <?php if(isset($badge_notif['nik_proses']) && $badge_notif['nik_proses'] != 0) : ?>
                  <span class="badge badge-danger mr-3"><?= $badge_notif['nik_proses'] ?></span>
                <?php endif; ?>
                <i class="fas fa-angle-right"></i>
              </div>
            </div>
          </a>
          <hr>
          <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/operator/data-kartu-keluarga">
            <div class="d-flex justify-content-between">
              <div>Data Kartu Keluarga</div><div><i class="fas fa-angle-right"></i></div>
            </div>
          </a>
          <hr>
          <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/operator/data-penduduk">
            <div class="d-flex justify-content-between">
              <div>Data Penduduk</div><div><i class="fas fa-angle-right"></i></div>
            </div>
          </a>
          </div>
          </div>
<hr>
                  </div>

      </div>
      </div>
    </div>
    </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->