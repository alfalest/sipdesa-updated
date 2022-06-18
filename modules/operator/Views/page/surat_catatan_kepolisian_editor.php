<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">00000000000000000000000000000000000000000000000000000
      <div class="col-12">
        <div class="card round-1">
          <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
                <p class="font-weight-bold text-lg m-0">Editor Surat Pengantar Keterangan Catatan Kepolisian</p>
              </div>
              <div>
                <a href="<?= base_url() ?>/operator/surat-catatan-kepolisian-lihat/<?= (isset($data_surat['id_surat']) && $data_surat['id_surat']) ? $data_surat['id_surat'] : '' ?>" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              </div>
            </div>
          </div>
          <form autocomplete="off" action="<?= base_url() ?>/operator/surat-catatan-kepolisian-editor-update" method="post">
            <input type="hidden" name="id_surat" value="<?= (isset($data_surat['id_surat']) && $data_surat['id_surat'] != '') ? $data_surat['id_surat'] : '' ?>">
            <!-- /.card-header -->
            <div class="card-body round-1 p-0">
              <div class="container-fluid">

                <div class="row">
                  <div class="col-12 p-0">
                    <div class="form-group">
                      <textarea name="teks_isi_surat" id="compose-textarea" class="form-control round-1" style="height: 300px" required><?= (isset($data_surat['teks_isi_surat']) && $data_surat['teks_isi_surat'] != '') ? $data_surat['teks_isi_surat'] : '' ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 p-3">
                    <div class="form-group row">
                      <label for="nomor_surat" class="col-lg-4 text-sm text-muted">Nomor Surat</label>
                      <div class="col-lg-8">
                        <span class="text-muted">[#nomor_surat#] <i>Pada bidang ini spasi akan dihilangkan</i></span>
                        <input value="<?= (isset($data_surat['nomor_surat'])) ? esc($data_surat['nomor_surat']) : '' ?>" name="nomor_surat" type="text" max-length="150" id="nomor_surat" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['nomor_surat'])) ? 'is-invalid' : 'border-primary' ?>">
                        <span class="invalid-feedback"><?= (isset($invalid_info['nomor_surat'])) ? $invalid_info['nomor_surat'] : '' ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nama_penanda_tangan" class="col-lg-4 text-sm text-muted">Nama Penanda Tangan</label>
                      <div class="col-lg-8">
                        <span class="text-muted">[#nama_penanda_tangan#]</span>
                        <input value="<?= (isset($data_surat['nama_penanda_tangan'])) ? esc($data_surat['nama_penanda_tangan']) : '' ?>" name="nama_penanda_tangan" type="text" max-length="150" id="nama_penanda_tangan" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_penanda_tangan'])) ? 'is-invalid' : 'border-primary' ?>">
                        <span class="invalid-feedback"><?= (isset($invalid_info['nama_penanda_tangan'])) ? $invalid_info['nama_penanda_tangan'] : '' ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="jabatan_penanda_tangan" class="col-lg-4 text-sm text-muted">Jabatan Penanda Tangan</label>
                      <div class="col-lg-8">
                        <span class="text-muted">[#jabatan_penanda_tangan#]</span>
                        <input value="<?= (isset($data_surat['jabatan_penanda_tangan'])) ? esc($data_surat['jabatan_penanda_tangan']) : '' ?>" name="jabatan_penanda_tangan" type="text" max-length="150" id="jabatan_penanda_tangan" alt="Masukan nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['jabatan_penanda_tangan'])) ? 'is-invalid' : 'border-primary' ?>">
                        <span class="invalid-feedback"><?= (isset($invalid_info['jabatan_penanda_tangan'])) ? $invalid_info['jabatan_penanda_tangan'] : '' ?></span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="keterangan_pembuatan_surat" class="col-lg-4 text-sm text-muted">Keterangan Pembuatan Surat</label>
                      <div class="col-lg-8">
                        <span class="text-muted">[#keterangan_pembuatan_surat#]</span>
                        <input value="<?= (isset($data_surat['keterangan_pembuatan_surat'])) ? esc($data_surat['keterangan_pembuatan_surat']) : '' ?>" name="keterangan_pembuatan_surat" type="text" max-length="150" id="keterangan_pembuatan_surat" alt="Masukan nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['keterangan_pembuatan_surat'])) ? 'is-invalid' : 'border-primary' ?>">
                        <span class="invalid-feedback"><?= (isset($invalid_info['keterangan_pembuatan_surat'])) ? $invalid_info['keterangan_pembuatan_surat'] : '' ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 p-3">
                  <div class="form-group">
                    <button type="submit" name="simpan" value="simpan" class="round-1 btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                  </div>
                </div>
              </div>

            </div>
        </div>
        <!-- /.card-body -->
        <!-- /.card -->
        </form>
      </div>
    </div>
  </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- Modal -->
<?php if (isset($message_info)) :
  $icon_color = ['text-danger', 'text-success'];
  $icon_symbol = ['fa-times-circle', 'fa-check-circle'];
?>
  <div class="modal fade" id="modal_message_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content round-1">
        <div class="modal-body p-0">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 p-3 text-center">
                <i class="p-2 mb-2 fa-6x fa-fw far <?= $icon_symbol[$message_info['status']] ?> <?= $icon_color[$message_info['status']] ?>"></i>
                <h4 class="font-weight-bold"><?= (isset($message_info['status']) && $message_info['status'] == 1) ? 'Berhasil' : 'Gagal' ?></h4>
                <p class=""><?= (isset($message_info['text'])) ? $message_info['text'] : '' ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-12 border-top bw-2 p-3 text-center">
                <div class="row">
                  <div class="col-6">
                    <a href="<?= base_url() ?>/master/template-email-list" class="font-weight-bold btn-block btn-primary btn round-1" data-dismiss="modal">KEMBALI</a>
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
    </div>
  </div>
<?php endif; ?>


<div class="modal fade" id="modal_insert_image_url">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom bw-2 p-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="font-weight-bold text-lg m-0">Info</p>
                </div>
                <div>
                  <button type="button" class="btn btn-primary btn-sm rounded-pill" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <p id="text_insert_image_url" class="text-center text-danger font-weight-bold"></p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3 text-center">
              <div class="row">
                <div class="col-12">
                  <button class="btn btn-block btn-danger btn-sm rounded-pill" type="button" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal_insert_image_img">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom bw-2 p-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="font-weight-bold text-lg m-0">Info</p>
                </div>
                <div>
                  <button type="button" class="btn btn-primary btn-sm rounded-pill" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <p id="text_insert_image_img" class="text-center text-danger font-weight-bold"></p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3 text-center">
              <div class="row">
                <div class="col-12">
                  <button class="btn btn-block btn-danger btn-sm rounded-pill" type="button" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>