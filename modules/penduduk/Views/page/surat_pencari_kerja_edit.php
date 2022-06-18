<!-- Main content -->
<div class="container">
  <div class="row">
    <div class="col-12 pt-2">
      <div class="card round-1">
        <div class="card-header">
          <div class="card-title">
            <p class="font-weight-bold text-lg m-0">Form Surat Pengantar Pencari Kerja</p>
          </div>
          <div class="card-tools">
            <div>
              <a href="<?= base_url() ?>/penduduk/surat-pencari-kerja" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="<?= base_url() ?>/penduduk/surat-pencari-kerja-update" id="surat_pencari_kerja" method="post" enctype="multipart/form-data">
            <input value="<?= (isset($data_surat_pencari_kerja['id_surat_pencari_kerja'])) ? $data_surat_pencari_kerja['id_surat_pencari_kerja'] : '' ?>" name="id_surat_pencari_kerja" type="hidden" id="id_surat_pencari_kerja">
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
                  <label for="nama_pencari_kerja" class="col-lg-4 text-sm text-muted">Nama</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pencari_kerja['nama_pencari_kerja'])) ? $data_surat_pencari_kerja['nama_pencari_kerja'] : '' ?>" name="nama_pencari_kerja" type="text" max-length="150" id="nama_pencari_kerja" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_pencari_kerja'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['nama_pencari_kerja'])) ? $invalid_info['nama_pencari_kerja'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="jenis_kelamin" class="col-lg-4 text-sm text-muted">Jenis Kelamin</label>
                  <div class="col-lg-8">
                    <select name="jenis_kelamin_pencari_kerja" id="jenis_kelamin_pencari_kerja" class="form-control bw-2 round-1  <?= (isset($invalid_info['jenis_kelamin_pencari_kerja'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['jenis_kelamin'])) : ?>
                        <?php foreach ($arr_kode_kata['jenis_kelamin'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_pencari_kerja['jenis_kelamin_pencari_kerja']) && $data_surat_pencari_kerja['jenis_kelamin_pencari_kerja'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['jenis_kelamin_pencari_kerja'])) ? $invalid_info['jenis_kelamin_pencari_kerja'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tempat_lahir_pencari_kerja" class="col-lg-4 text-sm text-muted">Tempat lahir</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pencari_kerja['tempat_lahir_pencari_kerja'])) ? $data_surat_pencari_kerja['tempat_lahir_pencari_kerja'] : '' ?>" name="tempat_lahir_pencari_kerja" type="text" id="tempat_lahir_pencari_kerja" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tempat_lahir_pencari_kerja'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tempat_lahir_pencari_kerja'])) ? $invalid_info['tempat_lahir_pencari_kerja'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tanggal_lahir_pencari_kerja" class="col-lg-4 text-sm text-muted">Tanggal lahir</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pencari_kerja['tanggal_lahir_pencari_kerja'])) ? $data_surat_pencari_kerja['tanggal_lahir_pencari_kerja'] : ((isset($tanggal_sekarang)) ? $tanggal_sekarang : '') ?>" name="tanggal_lahir_pencari_kerja" type="date" id="tanggal_lahir_anak" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tanggal_lahir_pencari_kerja'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tanggal_lahir_pencari_kerja'])) ? $invalid_info['tanggal_lahir_pencari_kerja'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="kewarganegaraan" class="col-lg-4 text-sm text-muted">Kewarganegaraan</label>
                  <div class="col-lg-8">
                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control bw-2 round-1  <?= (isset($invalid_info['kewarganegaraan'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['kewarganegaraan'])) : ?>
                        <?php foreach ($arr_kode_kata['kewarganegaraan'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_pencari_kerja['kewarganegaraan'])) ?  (($data_surat_pencari_kerja['kewarganegaraan'] ==  $value['nomor_kode']) ? 'selected' : '') : (($value['nomor_kode'] == 100) ? 'selected'  : '') ?>><?= strtoupper($value['tampilan_kata']) ?></option>
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
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_pencari_kerja['agama']) && $data_surat_pencari_kerja['agama'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['agama'])) ? $invalid_info['agama'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="pekerjaan_pencari_kerja" class="col-lg-4 text-sm text-muted">Pekerjaan</label>
                  <div class="col-lg-8">
                    <select name="pekerjaan_pencari_kerja" id="pekerjaan_pencari_kerja" class="form-control bw-2 round-1 <?= (isset($invalid_info['pekerjaan_pencari_kerja'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['jenis_pekerjaan'])) : ?>
                        <?php foreach ($arr_kode_kata['jenis_pekerjaan'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_pencari_kerja['pekerjaan_pencari_kerja']) && $data_surat_pencari_kerja['pekerjaan_pencari_kerja'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['pekerjaan_pencari_kerja'])) ? $invalid_info['pekerjaan_pencari_kerja'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="gol_darah_pencari_kerja" class="col-lg-4 text-sm text-muted">Golongan Darah</label>
                  <div class="col-lg-8">
                    <select name="gol_darah_pencari_kerja" id="gol_darah_pencari_kerja" class="form-control bw-2 round-1 <?= (isset($invalid_info['gol_darah_pencari_kerja'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['gol_darah'])) : ?>
                        <?php foreach ($arr_kode_kata['gol_darah'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_pencari_kerja['gol_darah_pencari_kerja']) && $data_surat_pencari_kerja['gol_darah_pencari_kerja'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['gol_darah_pencari_kerja'])) ? $invalid_info['gol_darah_pencari_kerja'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="nomor_ktp_pencari_kerja" class="col-lg-4 text-sm text-muted">Nomor KTP</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pencari_kerja['nomor_ktp_pencari_kerja'])) ? $data_surat_pencari_kerja['nomor_ktp_pencari_kerja'] : '' ?>" name="nomor_ktp_pencari_kerja" type="number" pattern="[0-9]{16}" max-length="16" id="nomor_ktp_pencari_kerja" alt="Masukan nama lengkap anak" title="Masukan 16 Nomor KTP" class="form-control bw-2 round-1 <?= (isset($invalid_info['nomor_ktp_pencari_kerja'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['nomor_ktp_pencari_kerja'])) ? $invalid_info['nomor_ktp_pencari_kerja'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="alamat_pencari_kerja" class="col-lg-4 text-sm text-muted">Alamat</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pencari_kerja['alamat_pencari_kerja'])) ? $data_surat_pencari_kerja['alamat_pencari_kerja'] : '' ?>" name="alamat_pencari_kerja" type="text" id="alamat_pencari_kerja" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['alamat_pencari_kerja'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['alamat_pencari_kerja'])) ? $invalid_info['alamat_pencari_kerja'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tujuan_membuat_surat_pencari_kerja" class="col-lg-4 text-sm text-muted">Tujuan Membuat Surat</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pencari_kerja['tujuan_membuat_surat_pencari_kerja'])) ? $data_surat_pencari_kerja['tujuan_membuat_surat_pencari_kerja'] : '' ?>" name="tujuan_membuat_surat_pencari_kerja" type="text" id="tujuan_membuat_surat_pencari_kerja" class="form-control bw-2 round-1 <?= (isset($invalid_info['tujuan_membuat_surat_pencari_kerja'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tujuan_membuat_surat_pencari_kerja'])) ? $invalid_info['tujuan_membuat_surat_pencari_kerja'] : '' ?></span>
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
                <a href="<?= base_url() ?>/penduduk/surat-pencari-kerja" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
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