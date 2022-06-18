<div class="container">
  <div class="row">
    <div class="col-12">
    <div class="pt-2">
      <div class="row">

        <div class="col-6 col-lg-3 pb-3">
          <a href="<?= base_url() ?>/operator/kependudukan" class="p-0">
            <div class="shadow round-1 bg-white p-0 h-100 position-relative" >
              <?php if(isset($badge_notif['kependudukan']) && $badge_notif['kependudukan'] != 0) : ?>
              <div class="position-absolute" style="right:0;top:0;">
                <span class="badge badge-danger">
                <?= $badge_notif['kependudukan'] ?>
                </span>
              </div>
              <?php endif; ?>
              <div class="border-bottom bg-light p-3 text-center round-1-tl round-1-tr">
                <i class="text-indigo fas fa-users fa-3x"></i>
              </div>
              <div class="text-muted text-sm my-auto font-weight-bold pb-2 pt-1 px-1 text-center round-1-bl round-1-br">Kependudukan</div>
            </div>
          </a>
        </div>

        <div class="col-6 col-lg-3 pb-3">
          <a href="<?= base_url() ?>/operator/layanan-surat" class="p-0">
            <div class="shadow round-1 bg-white p-0 h-100 position-relative" >
               <?php if(isset($badge_notif['layanan_surat']) && $badge_notif['layanan_surat'] != 0) : ?>
                <div class="position-absolute" style="right:0;top:0;">
                  <span class="badge badge-danger">
                  <?= $badge_notif['layanan_surat'] ?>
                  </span>
                </div>
              <?php endif; ?>
              <div class="border-bottom bg-light p-3 text-center round-1-tl round-1-tr">
                <i class="text-indigo fas fa-file-alt fa-3x"></i>
              </div>
              <div class="text-muted text-sm my-auto font-weight-bold pb-2 pt-1 px-1 text-center round-1-bl round-1-br">Layanan Surat</div>
            </div>
          </a>
        </div>

        <div class="col-6 col-lg-3 pb-3">
          <a href="<?= base_url() ?>/operator/tiket-undangan/hari-ini" class="p-0">
            <div class="shadow round-1 bg-white p-0 h-100 position-relative" >
               <?php if(isset($badge_notif['tiket_undangan']) && $badge_notif['tiket_undangan'] != 0) : ?>
                <div class="position-absolute" style="right:0;top:0;">
                  <span class="badge badge-danger">
                  <?= $badge_notif['tiket_undangan'] ?>
                  </span>
                </div>
              <?php endif; ?>
              <div class="border-bottom bg-light p-3 text-center round-1-tl round-1-tr">
                <i class="text-indigo fas fa-ticket-alt fa-3x"></i>
              </div>
              <div class="text-muted text-sm my-auto font-weight-bold pb-2 pt-1 px-1 text-center round-1-bl round-1-br">Ticket Undangan</div>
            </div>
          </a>
        </div>

        <div class="col-6 col-lg-3 pb-3">
          <a href="<?= base_url() ?>/operator/informasi-layanan" class="p-0">
            <div class="shadow round-1 bg-white p-0 h-100 position-relative" >
               <?php if(isset($badge_notif['informasi_layanan']) && $badge_notif['informasi_layanan'] != 0) : ?>
                <div class="position-absolute" style="right:0;top:0;">
                  <span class="badge badge-danger">
                  <?= $badge_notif['informasi_layanan'] ?>
                  </span>
                </div>
              <?php endif; ?>
              <div class="border-bottom bg-light p-3 text-center round-1-tl round-1-tr">
                <i class="text-indigo fas fa-info fa-3x"></i>
              </div>
              <div class="text-muted text-sm my-auto font-weight-bold pb-2 pt-1 px-1 text-center round-1-bl round-1-br">Informasi Layanan</div>
            </div>
          </a>
        </div>

        <div class="col-6 col-lg-3 pb-3">
          <a href="<?= base_url() ?>/operator/template-dokumen" class="p-0">
            <div class="shadow round-1 bg-white p-0 h-100 position-relative" >
               <?php if(isset($badge_notif['template_dokumen']) && $badge_notif['template_dokumen'] != 0) : ?>
                <div class="position-absolute" style="right:0;top:0;">
                  <span class="badge badge-danger">
                  <?= $badge_notif['template_dokumen'] ?>
                  </span>
                </div>
              <?php endif; ?>
              <div class="border-bottom bg-light p-3 text-center round-1-tl round-1-tr">
                <i class="text-indigo fas fa-paragraph fa-3x"></i>
              </div>
              <div class="text-muted text-sm my-auto font-weight-bold pb-2 pt-1 px-1 text-center round-1-bl round-1-br">Template Dokumen</div>
            </div>
          </a>
        </div>

        <div class="col-6 col-lg-3 pb-3">
          <a href="<?= base_url() ?>/operator/data-diri" class="p-0">
            <div class="shadow round-1 bg-white p-0 h-100 position-relative" >
              <?php if(isset($badge_notif['data_diri']) && $badge_notif['data_diri'] == 0) : ?>
              <div class="position-absolute" style="right:0;top:0;">
                <span class="badge badge-danger">
                lengkapi
                </span>
              </div>
              <?php endif; ?>
              <div class="border-bottom bg-light p-3 text-center round-1-tl round-1-tr">
                <i class="text-indigo fas fa-user fa-3x"></i>
              </div>
              <div class="text-muted text-sm my-auto font-weight-bold pb-2 pt-1 px-1 text-center round-1-bl round-1-br">Data Diri</div>
            </div>
          </a>
        </div>

        <div class="col-6 col-lg-3 pb-3">
          <a href="<?= base_url() ?>/operator/setting-akun" class="p-0">
            <div class="shadow round-1 bg-white p-0 h-100 position-relative" >
               <?php if(isset($badge_notif['template_dokumen']) && $badge_notif['template_dokumen'] != 0) : ?>
                <div class="position-absolute" style="right:0;top:0;">
                  <span class="badge badge-danger">
                  <?= $badge_notif['template_dokumen'] ?>
                  </span>
                </div>
              <?php endif; ?>
              <div class="border-bottom bg-light p-3 text-center round-1-tl round-1-tr">
                <i class="text-indigo fas fa-cog fa-3x"></i>
              </div>
              <div class="text-muted text-sm my-auto font-weight-bold pb-2 pt-1 px-1 text-center round-1-bl round-1-br">Setting Akun</div>
            </div>
          </a>
        </div>

      </div>
    </div>
    </div>
  </div>
</div>