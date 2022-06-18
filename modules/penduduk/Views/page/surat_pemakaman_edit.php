<!-- Main content -->
<div class="container">
  <div class="row">
    <div class="col-12 pt-2">
      <div class="card round-1">
        <div class="card-header">
          <div class="card-title">
            <p class="font-weight-bold text-lg m-0">Form Surat Keterangan Pemakaman</p>
          </div>
          <div class="card-tools">
            <div>
              <a href="<?= base_url() ?>/penduduk/surat-pemakaman" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form action="<?= base_url() ?>/penduduk/surat-pemakaman-update" id="surat_pemakaman" method="post" enctype="multipart/form-data">
            <input value="<?= (isset($data_surat_pemakaman['id_surat_pemakaman'])) ? $data_surat_pemakaman['id_surat_pemakaman'] : '' ?>" name="id_surat_pemakaman" type="hidden" id="id_surat_pemakaman">
            <div class="tab-content">

              <!-- data lampiran start -->
              <div class="tab-pane active show" id="tab_lampiran">
                <div class="row">
                  <div class="col-12">
                    <span class="text-md font-weight-bold text-primary">Data Surat Pemakaman</span>
                    <hr>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="nama_pemakaman" class="col-lg-4 text-sm text-muted">Nama Orang Yang Dimakamkan</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pemakaman['nama_pemakaman'])) ? $data_surat_pemakaman['nama_pemakaman'] : '' ?>" name="nama_pemakaman" type="text" max-length="150" id="nama_pemakaman" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_pemakaman'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['nama_pemakaman'])) ? $invalid_info['nama_pemakaman'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="jenis_kelamin" class="col-lg-4 text-sm text-muted">Jenis Kelamin</label>
                  <div class="col-lg-8">
                    <select name="jenis_kelamin_pemakaman" id="jenis_kelamin_pemakaman" class="form-control bw-2 round-1  <?= (isset($invalid_info['jenis_kelamin_pemakaman'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['jenis_kelamin'])) : ?>
                        <?php foreach ($arr_kode_kata['jenis_kelamin'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_pemakaman['jenis_kelamin_pemakaman']) && $data_surat_pemakaman['jenis_kelamin_pemakaman'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['jenis_kelamin_pemakaman'])) ? $invalid_info['jenis_kelamin_wafat'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="umur_pemakaman" class="col-lg-4 text-sm text-muted">Umur</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pemakaman['umur_pemakaman'])) ? $data_surat_pemakaman['umur_pemakaman'] : '' ?>" name="umur_pemakaman" id="umur_pemakaman" class="form-control bw-2 round-1 <?= (isset($invalid_info['umur_pemakaman'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['umur_pemakaman'])) ? $invalid_info['umur_pemakaman'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="kewarganegaraan" class="col-lg-4 text-sm text-muted">Kewarganegaraan</label>
                  <div class="col-lg-8">
                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control bw-2 round-1  <?= (isset($invalid_info['kewarganegaraan'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['kewarganegaraan'])) : ?>
                        <?php foreach ($arr_kode_kata['kewarganegaraan'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_pemakaman['kewarganegaraan'])) ?  (($data_surat_pemakaman['kewarganegaraan'] ==  $value['nomor_kode']) ? 'selected' : '') : (($value['nomor_kode'] == 100) ? 'selected'  : '') ?>><?= strtoupper($value['tampilan_kata']) ?></option>
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
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_pemakaman['agama']) && $data_surat_pemakaman['agama'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['agama'])) ? $invalid_info['agama'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="pekerjaan_pemakaman" class="col-lg-4 text-sm text-muted">Pekerjaan</label>
                  <div class="col-lg-8">
                    <select name="pekerjaan_pemakaman" id="pekerjaan_pemakaman" class="form-control bw-2 round-1 <?= (isset($invalid_info['pekerjaan_pemakaman'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['jenis_pekerjaan'])) : ?>
                        <?php foreach ($arr_kode_kata['jenis_pekerjaan'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_pemakaman['pekerjaan_pemakaman']) && $data_surat_pemakaman['pekerjaan_pemakaman'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['pekerjaan_pemakaman'])) ? $invalid_info['pekerjaan_pemakaman'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tempat_dimakamkan" class="col-lg-4 text-sm text-muted">TPU</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pemakaman['tempat_dimakamkan'])) ? $data_surat_pemakaman['tempat_dimakamkan'] : '' ?>" name="tempat_dimakamkan" type="text" id="tempat_dimakamkan" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['tempat_dimakamkan'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tempat_dimakamkan'])) ? $invalid_info['tempat_dimakamkan'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="alamat_pemakaman" class="col-lg-4 text-sm text-muted">Alamat TPU</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pemakaman['alamat_pemakaman'])) ? $data_surat_pemakaman['alamat_pemakaman'] : '' ?>" name="alamat_pemakaman" type="text" id="alamat_pemakaman" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['alamat_pemakaman'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['alamat_pemakaman'])) ? $invalid_info['alamat_pemakaman'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="hari_wafat" class="col-lg-4 text-sm text-muted">Hari Wafat</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pemakaman['hari_wafat'])) ? $data_surat_pemakaman['hari_wafat'] : '' ?>" name="hari_wafat" type="text" id="hari_wafat" class="form-control bw-2 round-1 <?= (isset($invalid_info['hari_wafat'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['hari_wafat'])) ? $invalid_info['hari_wafat'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tanggal_wafat_pemakaman" class="col-lg-4 text-sm text-muted">Tanggal Wafat</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pemakaman['tanggal_wafat_pemakaman'])) ? $data_surat_pemakaman['tanggal_wafat_pemakaman'] : ((isset($tanggal_sekarang)) ? $tanggal_sekarang : '') ?>" name="tanggal_wafat_pemakaman" type="date" class="form-control bw-2 round-1 <?= (isset($invalid_info['tanggal_wafat_pemakaman'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tanggal_wafat_pemakaman'])) ? $invalid_info['tanggal_wafat_pemakaman'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="jam_lahir" class="col-lg-4 text-sm text-muted">Jam Wafat</label>
                  <div class="col-lg-8">
                    <span class="text-sm text-muted"><b>AM:</b> (00:00 Malam -> 11:59 Siang), <b>PM:</b> (12:00 Siang -> 23:59 Malam)</span>
                    <input value="<?= (isset($data_surat_pemakaman['jam_wafat'])) ? $data_surat_pemakaman['jam_wafat'] : ((isset($tanggal_sekarang)) ? $tanggal_sekarang : '') ?>" name="jam_wafat" type="time" id="jam_wafat" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['jam_wafat'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['jam_wafat'])) ? $invalid_info['jam_wafat'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tempat_wafat" class="col-lg-4 text-sm text-muted">Tempat Wafat</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pemakaman['tempat_wafat'])) ? $data_surat_pemakaman['tempat_wafat'] : '' ?>" name="tempat_wafat" type="text" id="tempat_wafat" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['tempat_wafat'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tempat_wafat'])) ? $invalid_info['tempat_wafat'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="penyebab_wafat" class="col-lg-4 text-sm text-muted">Penyebab Wafat</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_pemakaman['penyebab_wafat'])) ? $data_surat_pemakaman['penyebab_wafat'] : '' ?>" name="penyebab_wafat" type="text" id="penyebab_wafat" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['penyebab_wafat'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['penyebab_wafat'])) ? $invalid_info['penyebab_wafat'] : '' ?></span>
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
                <a href="<?= base_url() ?>/penduduk/surat-pemakaman" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
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