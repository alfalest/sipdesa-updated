
    <!-- Main content -->
    <section class="content">
      <div class="container">
    
    <div class="row">
    <div class="col-12 pt-2">
      <div class="card round-1">
      <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
              <p class="font-weight-bold text-lg m-0">Kependudukan</p>
              </div>
              <div>
              <a href="<?=base_url()?>/penduduk/" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              </div>
            </div> 
            </div>
      <div class="card-body">
          <div class="row">
          <div class="col-12">
          <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/penduduk/kartu-keluarga/diterima">
            <div class="d-flex justify-content-between">
              <div>Kartu Keluarga</div>
              <div>
              <?php if(isset($badge_notif['perubahan_kk']) && $badge_notif['perubahan_kk'] != 0) : ?>
                  <span class="badge badge-danger mr-3"><?= $badge_notif['perubahan_kk'] ?></span>
                <?php endif; ?>
                <i class="fas fa-angle-right"></i>
              </div>
            </div>
          </a>
          <hr>
          <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/penduduk/anggota-keluarga/diterima">
            <div class="d-flex justify-content-between">
              <div>Anggota Keluarga</div>
              <div>
              <?php if(isset($badge_notif['perubahan_nik']) && $badge_notif['perubahan_nik'] != 0) : ?>
                  <span class="badge badge-danger mr-3"><?= $badge_notif['perubahan_nik'] ?></span>
                <?php endif; ?>
                <i class="fas fa-angle-right"></i>
              </div>
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