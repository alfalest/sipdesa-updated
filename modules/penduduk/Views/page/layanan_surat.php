<!-- Main content -->
<section class="content">
  <div class="container">

    <div class="row">
      <div class="col-12 pt-2">
        <div class="card round-1">
          <div class="card-body">
            <div class="row">
              <div class="col-12 d-flex justify-content-between">
                <p class="font-weight-bold text-lg m-0">Layanan Surat</p>
                <div>
                  <a href="<?= base_url() ?>/penduduk/" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-12">
                <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/penduduk/surat-kelahiran">
                  <div class="d-flex justify-content-between">
                    <div>Surat Keterangan Kelahiran</div>
                    <div>
                      <?php if (isset($badge_notif['surat_kelahiran']) && $badge_notif['surat_kelahiran'] != 0) : ?>
                        <span class="badge badge-danger mr-3"><?= $badge_notif['surat_kelahiran'] ?></span>
                      <?php endif; ?>
                      <i class="fas fa-angle-right"></i>
                    </div>
                  </div>
                </a>
                <hr>
                <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/penduduk/surat-pengantar-nikah">
                  <div class="d-flex justify-content-between">
                    <div>Surat Pengantar Nikah</div>
                    <div>
                      <?php if (isset($badge_notif['surat_pengantar_nikah']) && $badge_notif['surat_pengantar_nikah'] != 0) : ?>
                        <span class="badge badge-danger mr-3"><?= $badge_notif['surat_pengantar_nikah'] ?></span>
                      <?php endif; ?>
                      <i class="fas fa-angle-right"></i>
                    </div>
                  </div>
                </a>
                <hr>
                <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/penduduk/surat-kematian">
                  <div class="d-flex justify-content-between">
                    <div>Surat Keterangan Kematian</div>
                    <div>
                      <?php if (isset($badge_notif['surat_kematian']) && $badge_notif['surat_kematian'] != 0) : ?>
                        <span class="badge badge-danger mr-3"><?= $badge_notif['surat_kematian'] ?></span>
                      <?php endif; ?>
                      <i class="fas fa-angle-right"></i>
                    </div>
                  </div>
                </a>
                <hr>
                <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/penduduk/surat-pemakaman">
                  <div class="d-flex justify-content-between">
                    <div>Surat Keterangan Pemakaman</div>
                    <div>
                      <?php if (isset($badge_notif['surat_pemakaman']) && $badge_notif['surat_pemakaman'] != 0) : ?>
                        <span class="badge badge-danger mr-3"><?= $badge_notif['surat_pemakaman'] ?></span>
                      <?php endif; ?>
                      <i class="fas fa-angle-right"></i>
                    </div>
                  </div>
                </a>
                <hr>
                <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/penduduk/surat-catatan-kepolisian">
                  <div class="d-flex justify-content-between">
                    <div>Surat Pengantar Keterangan catatan Kepolisian</div>
                    <div>
                      <?php if (isset($badge_notif['surat_catatan_kepolisian']) && $badge_notif['surat_catatan_kepolisian'] != 0) : ?>
                        <span class="badge badge-danger mr-3"><?= $badge_notif['surat_catatan_kepolisian'] ?></span>
                      <?php endif; ?>
                      <i class="fas fa-angle-right"></i>
                    </div>
                  </div>
                </a>
                <hr>
                <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/penduduk/surat-pencari-kerja">
                  <div class="d-flex justify-content-between">
                    <div>Surat Pengantar Pencari Kerja</div>
                    <div>
                      <?php if (isset($badge_notif['surat_pencari_kerja']) && $badge_notif['surat_pencari_kerja'] != 0) : ?>
                        <span class="badge badge-danger mr-3"><?= $badge_notif['surat_pencari_kerja'] ?></span>
                      <?php endif; ?>
                      <i class="fas fa-angle-right"></i>
                    </div>
                  </div>
                </a>
                <hr>
                <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/penduduk/surat-belum-memiliki-rumah">
                  <div class="d-flex justify-content-between">
                    <div>Surat Keterangan Belum Memiliki Rumah</div>
                    <div>
                      <?php if (isset($badge_notif['surat_belum_memiliki_rumah']) && $badge_notif['surat_belum_memiliki_rumah'] != 0) : ?>
                        <span class="badge badge-danger mr-3"><?= $badge_notif['surat_belum_memiliki_rumah'] ?></span>
                      <?php endif; ?>
                      <i class="fas fa-angle-right"></i>
                    </div>
                  </div>
                </a>
                <hr>
                <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/penduduk/surat-ket-tidak-mampu">
                  <div class="d-flex justify-content-between">
                    <div>Surat Keterangan Tidak Mampu (SKTM)</div>
                    <div>
                      <?php if (isset($badge_notif['surat_ket_tidak_mampu']) && $badge_notif['surat_ket_tidak_mampu'] != 0) : ?>
                        <span class="badge badge-danger mr-3"><?= $badge_notif['surat_ket_tidak_mampu'] ?></span>
                      <?php endif; ?>
                      <i class="fas fa-angle-right"></i>
                    </div>
                  </div>
                </a>
                <hr>
                <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/penduduk/surat-ket-janda">
                  <div class="d-flex justify-content-between">
                    <div>Surat Keterangan Janda</div>
                    <div>
                      <?php if (isset($badge_notif['surat_ket_janda']) && $badge_notif['surat_ket_janda'] != 0) : ?>
                        <span class="badge badge-danger mr-3"><?= $badge_notif['surat_ket_janda'] ?></span>
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