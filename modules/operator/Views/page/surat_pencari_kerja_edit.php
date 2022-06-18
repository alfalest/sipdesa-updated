<!-- Main content -->
<div class="container">
  <div class="row">
    <div class="col-12 pt-2">
      <div class="card round-1">
        <div class="card-header pr-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="font-weight-bold text-lg m-0">Verifikasi Surat Pengantar Pencari Kerja</p>
            </div>
            <div>
              <a href="<?= base_url() ?>/operator/surat-pencari-kerja" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
            </div>
          </div>
        </div>
        <div class="card-body">


          <form action="<?= base_url() ?>/operator/surat-pencari-kerja-update" id="surat_pencari_kerja" method="post" enctype="multipart/form-data">
            <input value="<?= (isset($data_surat_pencari_kerja['id_surat_pencari_kerja'])) ? esc($data_surat_pencari_kerja['id_surat_pencari_kerja']) : '' ?>" name="id_surat_pencari_kerja" type="hidden" id="id_surat_pencari_kerja">
            <div class="form-group row">
              <div class="col-lg-4  text-sm text-muted font-weight-bold">
                Verifikasi
              </div>
              <div class="col-lg-8">
                <div class="custom-control custom-radio">
                  <input type="radio" name="status_surat_pencari_kerja" id="status_surat_pencari_kerja_terima" class="custom-control-input custom-control-input-success" value="2" <?= (isset($data_surat_pencari_kerja['status_surat_pencari_kerja']) && $data_surat_pencari_kerja['status_surat_pencari_kerja'] == 2) ?  'checked' : '' ?> required>
                  <label for="status_surat_pencari_kerja_terima" class="custom-control-label">Diterima</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" name="status_surat_pencari_kerja" id="status_surat_pencari_kerja_tolak" class="custom-control-input custom-control-input-danger" value="3" <?= (isset($data_surat_pencari_kerja['status_surat_pencari_kerja']) && $data_surat_pencari_kerja['status_surat_pencari_kerja'] == 3) ?  'checked' : '' ?>>
                  <label for="status_surat_pencari_kerja_tolak" class="custom-control-label">Ditolak</label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="keterangan_operator" class="col-lg-4 text-sm text-muted">Catatan Verifikasi</label>
              <div class="col-lg-8">
                <textarea name="keterangan_operator" id="keterangan_operator" class="form-control bw-2 border-primary round-1" style="min-height:40px; max-height:100px;"><?= (isset($data_surat_pencari_kerja['keterangan_operator'])) ? esc($data_surat_pencari_kerja['keterangan_operator']) : '' ?></textarea>
              </div>
            </div>
            <hr>
            <p class="font-weight-bold text-md text-primary mb-1">Setting tiket undangan</p>
            <button class="btn btn-light text-primary collapsed mb-2" type="button" data-toggle="collapse" data-target="#panduan_tiket" aria-expanded="false" aria-controls="panduan_tiket">
              Info/Bantuan
              <i class="fas fa-angle-double-down ml-2"></i>
            </button>
            <div id="panduan_tiket" class="mb-2 collapse">
              Pemohon surat akan menerima nomor tiket jika verifikasi diterima.<br>
              Nomor tiket merupakan pemberitahuan kepada pemohon surat bahwa surat sudah selesai diverifikasi dan pemohon bisa datang untuk mengambil surat.<br>
              Apabila diperlukan, operator dapat menambahkan keterangan, tanggal, dan waktu pengambilan surat secara khusus.<br>
              <br>
              Ketentuan:<br>
              - Jam waktu selesai harus lebih dari waktu mulai.<br>
              - Jam waktu mulai tidak dapat disimpan jika bidang tanggal tidak diisi.<br>
              - Tanggal hanya dapat diisi dengan tanggal hari ini sampai 30 hari kedepan.<br>
              - Keterangan maksimal 150 karakter. bisa diisi nama loket pelayanan atau nama staff yang dapat ditemui atau keterangan lain yang dirasa perlu<br><br>
            </div>
            <div class="form-group row">
              <label for="keterangan_tiket" class="col-lg-4 text-sm text-muted">Keterangan pelayanan</label>
              <div class="col-lg-8">
                <textarea name="keterangan_tiket" id="keterangan_tiket" class="form-control bw-2 border-primary round-1" style="min-height:40px; max-height:100px;"><?= (isset($data_surat_pencari_kerja['keterangan_tiket'])) ? esc($data_surat_pencari_kerja['keterangan_tiket']) : '' ?></textarea>

              </div>
            </div>
            <div class="form-group row">
              <label for="tanggal_kunjungan_tiket" class="col-lg-4 text-sm text-muted">Tanggal pelayanan</label>
              <div class="col-lg-8">
                <input value="<?= (isset($data_surat_pencari_kerja['tanggal_kunjungan_tiket'])) ? $data_surat_pencari_kerja['tanggal_kunjungan_tiket'] : '' ?>" name="tanggal_kunjungan_tiket" type="date" id="tanggal_kunjungan_tiket" class="form-control bw-2 border-primary round-1">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4 text-sm text-muted font-weight-bold">Waktu pelayanan</div>
              <div class="col-lg-8">
                <div class="row">
                  <div class="col-6">
                    <span class="text-muted text-sm">Mulai</span>
                    <input value="<?= (isset($data_surat_pencari_kerja['waktu_mulai_tiket'])) ? $data_surat_pencari_kerja['waktu_mulai_tiket'] : '' ?>" name="waktu_mulai_tiket" type="time" id="waktu_mulai_tiket" class="form-control bw-2 border-primary round-1">
                  </div>
                  <div class="col-6">
                    <span class="text-muted text-sm">Selesai</span>
                    <input value="<?= (isset($data_surat_pencari_kerja['waktu_selesai_tiket'])) ? $data_surat_pencari_kerja['waktu_selesai_tiket'] : '' ?>" name="waktu_selesai_tiket" type="time" id="waktu_selesai_tiket" class="form-control bw-2 border-primary round-1">
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <div class="form-group row">
              <div class="col-lg-8 offset-lg-4">
                <button type="submit" class="btn btn-block btn-success round-1">
                  SIMPAN
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div><!-- /.container-fluid -->

<!-- /.content -->

<?php if (isset($message_info)) :
  $icon_color = ['text-danger', 'text-success'];
  $icon_symbol = ['fa-times-circle', 'fa-check-circle'];
?>
  <div class="modal fade" id="modal_message_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content round-1">
        <div class="modal-header">
          <div class="modal-title">
            <h4 class="">
              <i class="mr-2 fas <?= $icon_symbol[$message_info['status']] ?> <?= $icon_color[$message_info['status']] ?>"></i>
              <?= (isset($message_info['status']) && $message_info['status'] == 1) ? 'Berhasil' : 'Gagal' ?>
            </h4>
          </div>
        </div>
        <div class="modal-body p-0">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 p-3 text-center">
                <i class="p-2 mb-2 fa-6x fa-fw far <?= $icon_symbol[$message_info['status']] ?> <?= $icon_color[$message_info['status']] ?>"></i>
                <h4 class="font-weight-bold"><?= (isset($message_info['status']) && $message_info['status'] == 1) ? 'Berhasil' : 'Gagal' ?></h4>
                <p class="text-break"><?= (isset($message_info['text'])) ? $message_info['text'] : '' ?></p>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer d-flex">
          <div class="flex-fill">
            <div class="row">
              <div class="col-6">
                <a href="<?= base_url() ?>/operator/surat-pencari-kerja" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
              </div>
              <div class="col-6">
                <button type="button" class="font-weight-bold btn-block btn-primary btn round-1" data-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>