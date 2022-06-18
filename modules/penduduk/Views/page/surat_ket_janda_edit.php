<!-- Main content -->
<div class="container">
  <div class="row">
    <div class="col-12 pt-2">
      <div class="card round-1">
        <div class="card-header">
          <div class="card-title">
            <p class="font-weight-bold text-lg m-0">Form Surat Keterangan Janda</p>
          </div>
          <div class="card-tools">
            <div>
              <a href="<?= base_url() ?>/penduduk/surat-ket-janda" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="<?= base_url() ?>/penduduk/surat-ket-janda-update" id="surat_ket_janda" method="post" enctype="multipart/form-data">
            <input value="<?= (isset($data_surat_ket_janda['id_surat_ket_janda'])) ? $data_surat_ket_janda['id_surat_ket_janda'] : '' ?>" name="id_surat_ket_janda" type="hidden" id="id_surat_ket_janda">
            <div class="tab-content">

              <!-- data lampiran start -->
              <div class="tab-pane active show" id="tab_lampiran">
                <div class="row">
                  <div class="col-12">
                    <span class="text-md font-weight-bold text-primary">Data Pelapor</span>
                    <hr>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="nama_ket_janda" class="col-lg-4 text-sm text-muted">Nama</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_ket_janda['nama_ket_janda'])) ? $data_surat_ket_janda['nama_ket_janda'] : '' ?>" name="nama_ket_janda" type="text" max-length="150" id="nama_ket_janda" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_ket_janda'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['nama_ket_janda'])) ? $invalid_info['nama_ket_janda'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="jenis_kelamin" class="col-lg-4 text-sm text-muted">Jenis Kelamin</label>
                  <div class="col-lg-8">
                    <select name="jenis_kelamin_ket_janda" id="jenis_kelamin_ket_janda" class="form-control bw-2 round-1  <?= (isset($invalid_info['jenis_kelamin_ket_janda'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['jenis_kelamin'])) : ?>
                        <?php foreach ($arr_kode_kata['jenis_kelamin'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_ket_janda['jenis_kelamin_ket_janda']) && $data_surat_ket_janda['jenis_kelamin_ket_janda'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['jenis_kelamin_ket_janda'])) ? $invalid_info['jenis_kelamin_ket_janda'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tempat_lahir_ket_janda" class="col-lg-4 text-sm text-muted">Tempat lahir</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_ket_janda['tempat_lahir_ket_janda'])) ? $data_surat_ket_janda['tempat_lahir_ket_janda'] : '' ?>" name="tempat_lahir_ket_janda" type="text" id="tempat_lahir_ket_janda" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tempat_lahir_ket_janda'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tempat_lahir_ket_janda'])) ? $invalid_info['tempat_lahir_ket_janda'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tanggal_lahir_ket_janda" class="col-lg-4 text-sm text-muted">Tanggal lahir</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_ket_janda['tanggal_lahir_ket_janda'])) ? $data_surat_ket_janda['tanggal_lahir_ket_janda'] : ((isset($tanggal_sekarang)) ? $tanggal_sekarang : '') ?>" name="tanggal_lahir_ket_janda" type="date" id="tanggal_lahir_anak" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tanggal_lahir_ket_janda'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tanggal_lahir_ket_janda'])) ? $invalid_info['tanggal_lahir_ket_janda'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="kewarganegaraan" class="col-lg-4 text-sm text-muted">Kewarganegaraan</label>
                  <div class="col-lg-8">
                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control bw-2 round-1  <?= (isset($invalid_info['kewarganegaraan'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['kewarganegaraan'])) : ?>
                        <?php foreach ($arr_kode_kata['kewarganegaraan'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_ket_janda['kewarganegaraan'])) ?  (($data_surat_ket_janda['kewarganegaraan'] ==  $value['nomor_kode']) ? 'selected' : '') : (($value['nomor_kode'] == 100) ? 'selected'  : '') ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['kewarganegaraan'])) ? $invalid_info['kewarganegaraan'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="agama" class="col-lg-4 text-sm text-muted">Agama</label>
                  <div class="col-lg-8">
                    <select name="agama" id="agama" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['agama'])) : ?>
                        <?php foreach ($arr_kode_kata['agama'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_ket_janda['agama']) && $data_surat_ket_janda['agama'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['agama'])) ? $invalid_info['agama'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="pekerjaan_ket_janda" class="col-lg-4 text-sm text-muted">Pekerjaan</label>
                  <div class="col-lg-8">
                    <select name="pekerjaan_ket_janda" id="pekerjaan_ket_janda" class="form-control bw-2 round-1 <?= (isset($invalid_info['pekerjaan_ket_janda'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['jenis_pekerjaan'])) : ?>
                        <?php foreach ($arr_kode_kata['jenis_pekerjaan'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_ket_janda['pekerjaan_ket_janda']) && $data_surat_ket_janda['pekerjaan_ket_janda'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['pekerjaan_ket_janda'])) ? $invalid_info['pekerjaan_ket_janda'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="alamat_ket_janda" class="col-lg-4 text-sm text-muted">Alamat</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_ket_janda['alamat_ket_janda'])) ? $data_surat_ket_janda['alamat_ket_janda'] : '' ?>" name="alamat_ket_janda" type="text" id="alamat_ket_janda" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['alamat_ket_janda'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['alamat_ket_janda'])) ? $invalid_info['alamat_ket_janda'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="berstatus_janda_selama" class="col-lg-4 text-sm text-muted">Berstatus Janda Selama</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_ket_janda['berstatus_janda_selama'])) ? $data_surat_ket_janda['berstatus_janda_selama'] : '' ?>" name="berstatus_janda_selama" type="text" id="berstatus_janda_selama" class="form-control bw-2 round-1 <?= (isset($invalid_info['berstatus_janda_selama'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['berstatus_janda_selama'])) ? $invalid_info['berstatus_janda_selama'] : '' ?></span>
                  </div>
                </div>

                <hr>
                <div class="row">
                  <div class="col-12">
                    <button id="tombol_simpan" type="submit" class="btn btn-block btn-success round-1">
                      SIMPAN<i class="ml-2 fas fa-save"></i>
                    </button>
                  </div>
                </div>
              </div>

              <!-- data lampiran end -->

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
                <a href="<?= base_url() ?>/penduduk/surat-ket-janda" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
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