<!-- Main content -->
<div class="container">
  <div class="row">
    <div class="col-12 pt-2">
      <div class="card round-1">
        <div class="card-header">
          <div class="card-title">
            <p class="font-weight-bold text-lg m-0">Form Surat Keterangan Kelahiran</p>
          </div>
          <div class="card-tools">
            <div>
              <a href="<?= base_url() ?>/penduduk/surat-kelahiran" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
            </div>
          </div>


        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" id="tab_anak_button" href="#tab_anak" data-toggle="tab">1. Data Anak</a></li>
                <li class="nav-item"><a class="nav-link" id="tab_ayah_button" href="#tab_ayah" data-toggle="tab">2. Data Ayah</a></li>
                <li class="nav-item"><a class="nav-link" id="tab_ibu_button" href="#tab_ibu" data-toggle="tab">3. Data Ibu</a></li>
                <li class="nav-item"><a class="nav-link" id="tab_lampiran_button" href="#tab_lampiran" data-toggle="tab">4. Lampiran</a></li>
              </ul>
            </div>
          </div>
          <hr>

          <form action="<?= base_url() ?>/penduduk/surat-kelahiran-update" id="surat_kelahiran" method="post" enctype="multipart/form-data">
            <input value="<?= (isset($data_surat_kelahiran['id_surat_kelahiran'])) ? $data_surat_kelahiran['id_surat_kelahiran'] : '' ?>" name="id_surat_kelahiran" type="hidden" id="id_surat_kelahiran">
            <div class="tab-content">


              <!-- data anak start -->
              <div class="tab-pane active show" id="tab_anak">
                <div class="row">
                  <div class="col-12">
                    <span class="text-md font-weight-bold text-primary">Data Anak</span>
                    <hr>
                  </div>
                </div>
                <div class="form-group row">

                  <label for="nama_anak" class="col-lg-4 text-sm text-muted">Nama Lengkap</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['nama_anak'])) ? $data_surat_kelahiran['nama_anak'] : '' ?>" name="nama_anak" type="text" max-length="150" id="nama_anak" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['nama_anak'])) ? $invalid_info['nama_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nik_anak" class="col-lg-4 text-sm text-muted">NIK</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['nik_anak'])) ? $data_surat_kelahiran['nik_anak'] : '' ?>" name="nik_anak" type="number" pattern="[0-9]{16}" max-length="16" id="nik_anak" alt="Masukan nama lengkap anak" title="Masukan 16 Nomor nik anak jika" class="form-control bw-2 round-1 <?= (isset($invalid_info['nik_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['nik_anak'])) ? $invalid_info['nik_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jenis_kelamin_anak" class="col-lg-4 text-sm text-muted">Jenis Kelamin</label>
                  <div class="col-lg-8">
                    <select name="jenis_kelamin_anak" id="jenis_kelamin_anak" class="form-control bw-2 round-1  <?= (isset($invalid_info['jenis_kelamin_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['jenis_kelamin_anak'])) : ?>
                        <?php foreach ($arr_kode_kata['jenis_kelamin_anak'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_kelahiran['jenis_kelamin_anak']) && $data_surat_kelahiran['jenis_kelamin_anak'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['jenis_kelamin_anak'])) ? $invalid_info['jenis_kelamin_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tempat_lahir_anak" class="col-lg-4 text-sm text-muted">Tempat lahir</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['tempat_lahir_anak'])) ? $data_surat_kelahiran['tempat_lahir_anak'] : '' ?>" name="tempat_lahir_anak" type="text" id="tempat_lahir_anak" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tempat_lahir_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tempat_lahir_anak'])) ? $invalid_info['tempat_lahir_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tanggal_lahir_anak" class="col-lg-4 text-sm text-muted">Tanggal lahir</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['tanggal_lahir_anak'])) ? $data_surat_kelahiran['tanggal_lahir_anak'] : ((isset($tanggal_sekarang)) ? $tanggal_sekarang : '') ?>" name="tanggal_lahir_anak" type="date" id="tanggal_lahir_anak" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tanggal_lahir_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tanggal_lahir_anak'])) ? $invalid_info['tanggal_lahir_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="agama_anak" class="col-lg-4 text-sm text-muted">Agama</label>
                  <div class="col-lg-8">
                    <select name="agama_anak" id="agama_anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['agama_anak'])) : ?>
                        <?php foreach ($arr_kode_kata['agama_anak'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_kelahiran['agama_anak']) && $data_surat_kelahiran['agama_anak'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['agama_anak'])) ? $invalid_info['agama_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jenis_pekerjaan_anak" class="col-lg-4 text-sm text-muted">Pekerjaan</label>
                  <div class="col-lg-8">
                    <select name="jenis_pekerjaan_anak" id="jenis_pekerjaan_anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['jenis_pekerjaan_anak'])) : ?>
                        <?php foreach ($arr_kode_kata['jenis_pekerjaan_anak'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_kelahiran['jenis_pekerjaan_anak']) && $data_surat_kelahiran['jenis_pekerjaan_anak'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['jenis_pekerjaan_anak'])) ? $invalid_info['jenis_pekerjaan_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="alamat_anak" class="col-lg-4 text-sm text-muted">Alamat</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['alamat_anak'])) ? $data_surat_kelahiran['alamat_anak'] : '' ?>" name="alamat_anak" type="text" max-length="150" id="alamat_anak" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['alamat_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['alamat_anak'])) ? $invalid_info['alamat_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="rt_anak" class="col-lg-4 text-sm text-muted">RT</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['rt_anak'])) ? $data_surat_kelahiran['rt_anak'] : '' ?>" name="rt_anak" type="number" max-length="3" pattern="[0-9]{0,3}" id="rt_anak" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rt_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['rt_anak'])) ? $invalid_info['rt_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="rw_anak" class="col-lg-4 text-sm text-muted">RT</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['rw_anak'])) ? $data_surat_kelahiran['rw_anak'] : '' ?>" name="rw_anak" type="number" max-length="3" pattern="[0-9]{0,3}" id="rw_anak" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rw_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['rw_anak'])) ? $invalid_info['rw_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="provinsi_anak" class="col-lg-4 text-sm text-muted">Provinsi</label>
                  <div class="col-lg-8">
                    <select name="provinsi_anak" id="provinsi_anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['provinsi_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($data_surat_kelahiran['provinsi_anak'])) : ?>
                        <?php if (isset($arr_wilayah['provinsi_anak'])) : ?>
                          <?php foreach ($arr_wilayah['provinsi_anak'] as $key => $value) : ?>
                            <option value="<?= $value['kode_wilayah'] ?>" <?= (isset($data_surat_kelahiran['provinsi_anak']) && $data_surat_kelahiran['provinsi_anak'] ==  $value['kode_wilayah']) ?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['provinsi_anak'])) ? $invalid_info['provinsi_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kab_kota_anak" class="col-lg-4 text-sm text-muted">Kabupaten/Kota</label>
                  <div class="col-lg-8">
                    <select name="kab_kota_anak" id="kab_kota_anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['kab_kota_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($data_surat_kelahiran['kab_kota_anak'])) : ?>
                        <?php if (isset($arr_wilayah['kab_kota_anak'])) : ?>
                          <?php foreach ($arr_wilayah['kab_kota_anak'] as $key => $value) : ?>
                            <option value="<?= $value['kode_wilayah'] ?>" <?= (isset($data_surat_kelahiran['kab_kota_anak']) && $data_surat_kelahiran['kab_kota_anak'] ==  $value['kode_wilayah']) ?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['kab_kota_anak'])) ? $invalid_info['kab_kota_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kecamatan_anak" class="col-lg-4 text-sm text-muted">Kecamatan</label>
                  <div class="col-lg-8">
                    <select name="kecamatan_anak" id="kecamatan_anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['kecamatan_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($data_surat_kelahiran['kecamatan_anak'])) : ?>
                        <?php if (isset($arr_wilayah['kecamatan_anak'])) : ?>
                          <?php foreach ($arr_wilayah['kecamatan_anak'] as $key => $value) : ?>
                            <option value="<?= $value['kode_wilayah'] ?>" <?= (isset($data_surat_kelahiran['kecamatan_anak']) && $data_surat_kelahiran['kecamatan_anak'] ==  $value['kode_wilayah']) ?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['kecamatan_anak'])) ? $invalid_info['kecamatan_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kel_desa_anak" class="col-lg-4 text-sm text-muted">Desa/Kelurahan</label>
                  <div class="col-lg-8">
                    <select name="kel_desa_anak" id="kel_desa_anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['kel_desa_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($data_surat_kelahiran['kel_desa_anak'])) : ?>
                        <?php if (isset($arr_wilayah['kel_desa_anak'])) : ?>
                          <?php foreach ($arr_wilayah['kel_desa_anak'] as $key => $value) : ?>
                            <option value="<?= $value['kode_wilayah'] ?>" <?= (isset($data_surat_kelahiran['kel_desa_anak']) && $data_surat_kelahiran['kel_desa_anak'] ==  $value['kode_wilayah']) ?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['kel_desa_anak'])) ? $invalid_info['kel_desa_anak'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kode_pos_anak" class="col-lg-4 text-sm text-muted">Kode Pos</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['kode_pos_anak'])) ? $data_surat_kelahiran['kode_pos_anak'] : '' ?>" name="kode_pos_anak" type="text" max-length="5" id="kode_pos_anak" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['kode_pos_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['kode_pos_anak'])) ? $invalid_info['kode_pos_anak'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="kewarganegaraan_anak" class="col-lg-4 text-sm text-muted">Kewarganegaraan</label>
                  <div class="col-lg-8">
                    <select name="kewarganegaraan_anak" id="kewarganegaraan_anak" class="form-control bw-2 round-1  <?= (isset($invalid_info['kewarganegaraan_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['kewarganegaraan_anak'])) : ?>
                        <?php foreach ($arr_kode_kata['kewarganegaraan_anak'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_kelahiran['kewarganegaraan_anak'])) ?  (($data_surat_kelahiran['kewarganegaraan_anak'] ==  $value['nomor_kode']) ? 'selected' : '') : (($value['nomor_kode'] == 100) ? 'selected'  : '') ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['kewarganegaraan_anak'])) ? $invalid_info['kewarganegaraan_anak'] : '' ?></span>
                  </div>
                </div>



                <hr>
                <div class="row">
                  <div class="col-6">
                  </div>
                  <div class="col-6">
                    <button type="button" onclick="goto_form('ayah')" class="align-middle btn btn-block btn-primary round-1">
                      Selanjutnya<i class="ml-2 fas fa-angle-right"></i>
                    </button>
                  </div>
                </div>
              </div>
              <!-- data anak end -->


              <!-- data ayah start -->
              <div class="tab-pane" id="tab_ayah">
                <div class="row">
                  <div class="col-12">
                    <span class="text-md font-weight-bold text-primary">Data Ayah</span>
                    <hr>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama_ayah" class="col-lg-4 text-sm text-muted">Nama Lengkap</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['nama_ayah'])) ? $data_surat_kelahiran['nama_ayah'] : '' ?>" name="nama_ayah" type="text" max-length="150" id="nama_ayah" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['nama_ayah'])) ? $invalid_info['nama_ayah'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nik_ayah" class="col-lg-4 text-sm text-muted">NIK</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['nik_ayah'])) ? $data_surat_kelahiran['nik_ayah'] : '' ?>" name="nik_ayah" type="number" pattern="[0-9]{16}" max-length="16" id="nik_ayah" alt="Masukan nama lengkap anak" title="Masukan 16 Nomor nik anak jika" class="form-control bw-2 round-1 <?= (isset($invalid_info['nik_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['nik_ayah'])) ? $invalid_info['nik_ayah'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tempat_lahir_ayah" class="col-lg-4 text-sm text-muted">Tempat lahir</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['tempat_lahir_ayah'])) ? $data_surat_kelahiran['tempat_lahir_ayah'] : '' ?>" name="tempat_lahir_ayah" type="text" id="tempat_lahir_ayah" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tempat_lahir_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tempat_lahir_ayah'])) ? $invalid_info['tempat_lahir_ayah'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tanggal_lahir_ayah" class="col-lg-4 text-sm text-muted">Tanggal lahir</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['tanggal_lahir_ayah'])) ? $data_surat_kelahiran['tanggal_lahir_ayah'] : ((isset($tanggal_sekarang)) ? $tanggal_sekarang : '') ?>" name="tanggal_lahir_ayah" type="date" id="tanggal_lahir_ayah" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tanggal_lahir_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tanggal_lahir_ayah'])) ? $invalid_info['tanggal_lahir_ayah'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="agama_ayah" class="col-lg-4 text-sm text-muted">Agama</label>
                  <div class="col-lg-8">
                    <select name="agama_ayah" id="agama_ayah" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['agama_ayah'])) : ?>
                        <?php foreach ($arr_kode_kata['agama_ayah'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_kelahiran['agama_ayah']) && $data_surat_kelahiran['agama_ayah'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['agama_ayah'])) ? $invalid_info['agama_ayah'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jenis_pekerjaan_ayah" class="col-lg-4 text-sm text-muted">Pekerjaan</label>
                  <div class="col-lg-8">
                    <select name="jenis_pekerjaan_ayah" id="jenis_pekerjaan_ayah" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['jenis_pekerjaan_ayah'])) : ?>
                        <?php foreach ($arr_kode_kata['jenis_pekerjaan_ayah'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_kelahiran['jenis_pekerjaan_ayah']) && $data_surat_kelahiran['jenis_pekerjaan_ayah'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['jenis_pekerjaan_ayah'])) ? $invalid_info['jenis_pekerjaan_ayah'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="alamat_ayah" class="col-lg-4 text-sm text-muted">Alamat</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['alamat_ayah'])) ? $data_surat_kelahiran['alamat_ayah'] : '' ?>" name="alamat_ayah" type="text" max-length="150" id="alamat_ayah" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['alamat_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['alamat_ayah'])) ? $invalid_info['alamat_ayah'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="rt_ayah" class="col-lg-4 text-sm text-muted">RT</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['rt_ayah'])) ? $data_surat_kelahiran['rt_ayah'] : '' ?>" name="rt_ayah" type="number" max-length="3" pattern="[0-9]{0,3}" id="rt_ayah" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rt_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['rt_ayah'])) ? $invalid_info['rt_ayah'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="rw_ayah" class="col-lg-4 text-sm text-muted">RT</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['rw_ayah'])) ? $data_surat_kelahiran['rw_ayah'] : '' ?>" name="rw_ayah" type="number" max-length="3" pattern="[0-9]{0,3}" id="rw_ayah" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rw_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['rw_ayah'])) ? $invalid_info['rw_ayah'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="provinsi_ayah" class="col-lg-4 text-sm text-muted">Provinsi</label>
                  <div class="col-lg-8">
                    <select name="provinsi_ayah" id="provinsi_ayah" class="form-control bw-2 round-1 <?= (isset($invalid_info['provinsi_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($data_surat_kelahiran['provinsi_ayah'])) : ?>
                        <?php if (isset($arr_wilayah['provinsi_ayah'])) : ?>
                          <?php foreach ($arr_wilayah['provinsi_ayah'] as $key => $value) : ?>
                            <option value="<?= $value['kode_wilayah'] ?>" <?= (isset($data_surat_kelahiran['provinsi_ayah']) && $data_surat_kelahiran['provinsi_ayah'] ==  $value['kode_wilayah']) ?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['provinsi_ayah'])) ? $invalid_info['provinsi_ayah'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kab_kota_ayah" class="col-lg-4 text-sm text-muted">Kabupaten/Kota</label>
                  <div class="col-lg-8">
                    <select name="kab_kota_ayah" id="kab_kota_ayah" class="form-control bw-2 round-1 <?= (isset($invalid_info['kab_kota_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($data_surat_kelahiran['kab_kota_ayah'])) : ?>
                        <?php if (isset($arr_wilayah['kab_kota_ayah'])) : ?>
                          <?php foreach ($arr_wilayah['kab_kota_ayah'] as $key => $value) : ?>
                            <option value="<?= $value['kode_wilayah'] ?>" <?= (isset($data_surat_kelahiran['kab_kota_ayah']) && $data_surat_kelahiran['kab_kota_ayah'] ==  $value['kode_wilayah']) ?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['kab_kota_ayah'])) ? $invalid_info['kab_kota_ayah'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kecamatan_ayah" class="col-lg-4 text-sm text-muted">Kecamatan</label>
                  <div class="col-lg-8">
                    <select name="kecamatan_ayah" id="kecamatan_ayah" class="form-control bw-2 round-1 <?= (isset($invalid_info['kecamatan_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($data_surat_kelahiran['kecamatan_ayah'])) : ?>
                        <?php if (isset($arr_wilayah['kecamatan_ayah'])) : ?>
                          <?php foreach ($arr_wilayah['kecamatan_ayah'] as $key => $value) : ?>
                            <option value="<?= $value['kode_wilayah'] ?>" <?= (isset($data_surat_kelahiran['kecamatan_ayah']) && $data_surat_kelahiran['kecamatan_ayah'] ==  $value['kode_wilayah']) ?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['kecamatan_ayah'])) ? $invalid_info['kecamatan_ayah'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kel_desa_ayah" class="col-lg-4 text-sm text-muted">Desa/Kelurahan</label>
                  <div class="col-lg-8">
                    <select name="kel_desa_ayah" id="kel_desa_ayah" class="form-control bw-2 round-1 <?= (isset($invalid_info['kel_desa_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($data_surat_kelahiran['kel_desa_ayah'])) : ?>
                        <?php if (isset($arr_wilayah['kel_desa_ayah'])) : ?>
                          <?php foreach ($arr_wilayah['kel_desa_ayah'] as $key => $value) : ?>
                            <option value="<?= $value['kode_wilayah'] ?>" <?= (isset($data_surat_kelahiran['kel_desa_ayah']) && $data_surat_kelahiran['kel_desa_ayah'] ==  $value['kode_wilayah']) ?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['kel_desa_ayah'])) ? $invalid_info['kel_desa_ayah'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kode_pos_ayah" class="col-lg-4 text-sm text-muted">Kode Pos</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['kode_pos_ayah'])) ? $data_surat_kelahiran['kode_pos_ayah'] : '' ?>" name="kode_pos_ayah" type="text" max-length="5" id="kode_pos_ayah" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['kode_pos_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['kode_pos_ayah'])) ? $invalid_info['kode_pos_ayah'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="kewarganegaraan_ayah" class="col-lg-4 text-sm text-muted">Kewarganegaraan</label>
                  <div class="col-lg-8">
                    <select name="kewarganegaraan_ayah" id="kewarganegaraan_ayah" class="form-control bw-2 round-1  <?= (isset($invalid_info['kewarganegaraan_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['kewarganegaraan_ayah'])) : ?>
                        <?php foreach ($arr_kode_kata['kewarganegaraan_ayah'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_kelahiran['kewarganegaraan_ayah'])) ?  (($data_surat_kelahiran['kewarganegaraan_ayah'] ==  $value['nomor_kode']) ? 'selected' : '') : (($value['nomor_kode'] == 100) ? 'selected'  : '') ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['kewarganegaraan_ayah'])) ? $invalid_info['kewarganegaraan_ayah'] : '' ?></span>
                  </div>
                </div>

                <hr>

                <hr>
                <div class="row">
                  <div class="col-6">
                    <button type="button" onclick="goto_form('anak')" class="btn btn-block btn-primary round-1">
                      <i class="mr-2 fas fa-angle-left"></i>Sebelumnya
                    </button>
                  </div>
                  <div class="col-6">
                    <button type="button" onclick="goto_form('ibu')" class="btn btn-block btn-primary round-1">
                      Selanjutnya<i class="ml-2 fas fa-angle-right"></i>
                    </button>
                  </div>
                </div>
              </div>
              <!-- data ayah end -->




              <!-- data ibu start -->
              <div class="tab-pane" id="tab_ibu">
                <div class="row">
                  <div class="col-12">
                    <span class="text-md font-weight-bold text-primary">Data Ibu</span>
                    <hr>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama_ibu" class="col-lg-4 text-sm text-muted">Nama Lengkap</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['nama_ibu'])) ? $data_surat_kelahiran['nama_ibu'] : '' ?>" name="nama_ibu" type="text" max-length="150" id="nama_ibu" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['nama_ibu'])) ? $invalid_info['nama_ibu'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nik_ibu" class="col-lg-4 text-sm text-muted">NIK</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['nik_ibu'])) ? $data_surat_kelahiran['nik_ibu'] : '' ?>" name="nik_ibu" type="number" pattern="[0-9]{16}" max-length="16" id="nik_ibu" alt="Masukan nama lengkap anak" title="Masukan 16 Nomor nik anak jika" class="form-control bw-2 round-1 <?= (isset($invalid_info['nik_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['nik_ibu'])) ? $invalid_info['nik_ibu'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tempat_lahir_ibu" class="col-lg-4 text-sm text-muted">Tempat lahir</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['tempat_lahir_ibu'])) ? $data_surat_kelahiran['tempat_lahir_ibu'] : '' ?>" name="tempat_lahir_ibu" type="text" id="tempat_lahir_ibu" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tempat_lahir_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tempat_lahir_ibu'])) ? $invalid_info['tempat_lahir_ibu'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tanggal_lahir_ibu" class="col-lg-4 text-sm text-muted">Tanggal lahir</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['tanggal_lahir_ibu'])) ? $data_surat_kelahiran['tanggal_lahir_ibu'] : ((isset($tanggal_sekarang)) ? $tanggal_sekarang : '') ?>" name="tanggal_lahir_ibu" type="date" id="tanggal_lahir_ibu" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tanggal_lahir_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['tanggal_lahir_ibu'])) ? $invalid_info['tanggal_lahir_ibu'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="agama_ibu" class="col-lg-4 text-sm text-muted">Agama</label>
                  <div class="col-lg-8">
                    <select name="agama_ibu" id="agama_ibu" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['agama_ibu'])) : ?>
                        <?php foreach ($arr_kode_kata['agama_ibu'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_kelahiran['agama_ibu']) && $data_surat_kelahiran['agama_ibu'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['agama_ibu'])) ? $invalid_info['agama_ibu'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jenis_pekerjaan_ibu" class="col-lg-4 text-sm text-muted">Pekerjaan</label>
                  <div class="col-lg-8">
                    <select name="jenis_pekerjaan_ibu" id="jenis_pekerjaan_ibu" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['jenis_pekerjaan_ibu'])) : ?>
                        <?php foreach ($arr_kode_kata['jenis_pekerjaan_ibu'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_kelahiran['jenis_pekerjaan_ibu']) && $data_surat_kelahiran['jenis_pekerjaan_ibu'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['jenis_pekerjaan_ibu'])) ? $invalid_info['jenis_pekerjaan_ibu'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="alamat_ibu" class="col-lg-4 text-sm text-muted">Alamat</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['alamat_ibu'])) ? $data_surat_kelahiran['alamat_ibu'] : '' ?>" name="alamat_ibu" type="text" max-length="150" id="alamat_ibu" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['alamat_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['alamat_ibu'])) ? $invalid_info['alamat_ibu'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="rt_ibu" class="col-lg-4 text-sm text-muted">RT</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['rt_ibu'])) ? $data_surat_kelahiran['rt_ibu'] : '' ?>" name="rt_ibu" type="number" max-length="3" pattern="[0-9]{0,3}" id="rt_ibu" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rt_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['rt_ibu'])) ? $invalid_info['rt_ibu'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="rw_ibu" class="col-lg-4 text-sm text-muted">RT</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['rw_ibu'])) ? $data_surat_kelahiran['rw_ibu'] : '' ?>" name="rw_ibu" type="number" max-length="3" pattern="[0-9]{0,3}" id="rw_ibu" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rw_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['rw_ibu'])) ? $invalid_info['rw_ibu'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="provinsi_ibu" class="col-lg-4 text-sm text-muted">Provinsi</label>
                  <div class="col-lg-8">
                    <select name="provinsi_ibu" id="provinsi_ibu" class="form-control bw-2 round-1 <?= (isset($invalid_info['provinsi_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($data_surat_kelahiran['provinsi_ibu'])) : ?>
                        <?php if (isset($arr_wilayah['provinsi_ibu'])) : ?>
                          <?php foreach ($arr_wilayah['provinsi_ibu'] as $key => $value) : ?>
                            <option value="<?= $value['kode_wilayah'] ?>" <?= (isset($data_surat_kelahiran['provinsi_ibu']) && $data_surat_kelahiran['provinsi_ibu'] ==  $value['kode_wilayah']) ?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['provinsi_ibu'])) ? $invalid_info['provinsi_ibu'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kab_kota_ibu" class="col-lg-4 text-sm text-muted">Kabupaten/Kota</label>
                  <div class="col-lg-8">
                    <select name="kab_kota_ibu" id="kab_kota_ibu" class="form-control bw-2 round-1 <?= (isset($invalid_info['kab_kota_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($data_surat_kelahiran['kab_kota_ibu'])) : ?>
                        <?php if (isset($arr_wilayah['kab_kota_ibu'])) : ?>
                          <?php foreach ($arr_wilayah['kab_kota_ibu'] as $key => $value) : ?>
                            <option value="<?= $value['kode_wilayah'] ?>" <?= (isset($data_surat_kelahiran['kab_kota_ibu']) && $data_surat_kelahiran['kab_kota_ibu'] ==  $value['kode_wilayah']) ?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['kab_kota_ibu'])) ? $invalid_info['kab_kota_ibu'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kecamatan_ibu" class="col-lg-4 text-sm text-muted">Kecamatan</label>
                  <div class="col-lg-8">
                    <select name="kecamatan_ibu" id="kecamatan_ibu" class="form-control bw-2 round-1 <?= (isset($invalid_info['kecamatan_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($data_surat_kelahiran['kecamatan_ibu'])) : ?>
                        <?php if (isset($arr_wilayah['kecamatan_ibu'])) : ?>
                          <?php foreach ($arr_wilayah['kecamatan_ibu'] as $key => $value) : ?>
                            <option value="<?= $value['kode_wilayah'] ?>" <?= (isset($data_surat_kelahiran['kecamatan_ibu']) && $data_surat_kelahiran['kecamatan_ibu'] ==  $value['kode_wilayah']) ?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['kecamatan_ibu'])) ? $invalid_info['kecamatan_ibu'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kel_desa_ibu" class="col-lg-4 text-sm text-muted">Desa/Kelurahan</label>
                  <div class="col-lg-8">
                    <select name="kel_desa_ibu" id="kel_desa_ibu" class="form-control bw-2 round-1 <?= (isset($invalid_info['kel_desa_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($data_surat_kelahiran['kel_desa_ibu'])) : ?>
                        <?php if (isset($arr_wilayah['kel_desa_ibu'])) : ?>
                          <?php foreach ($arr_wilayah['kel_desa_ibu'] as $key => $value) : ?>
                            <option value="<?= $value['kode_wilayah'] ?>" <?= (isset($data_surat_kelahiran['kel_desa_ibu']) && $data_surat_kelahiran['kel_desa_ibu'] ==  $value['kode_wilayah']) ?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['kel_desa_ibu'])) ? $invalid_info['kel_desa_ibu'] : '' ?></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kode_pos_ibu" class="col-lg-4 text-sm text-muted">Kode Pos</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['kode_pos_ibu'])) ? $data_surat_kelahiran['kode_pos_ibu'] : '' ?>" name="kode_pos_ibu" type="text" max-length="5" id="kode_pos_ibu" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['kode_pos_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['kode_pos_ibu'])) ? $invalid_info['kode_pos_ibu'] : '' ?></span>
                  </div>
                </div>


                <div class="form-group row">
                  <label for="kewarganegaraan_ibu" class="col-lg-4 text-sm text-muted">Kewarganegaraan</label>
                  <div class="col-lg-8">
                    <select name="kewarganegaraan_ibu" id="kewarganegaraan_ibu" class="form-control bw-2 round-1  <?= (isset($invalid_info['kewarganegaraan_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['kewarganegaraan_ibu'])) : ?>
                        <?php foreach ($arr_kode_kata['kewarganegaraan_ibu'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_kelahiran['kewarganegaraan_ibu'])) ?  (($data_surat_kelahiran['kewarganegaraan_ibu'] ==  $value['nomor_kode']) ? 'selected' : '') : (($value['nomor_kode'] == 100) ? 'selected'  : '') ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['kewarganegaraan_ibu'])) ? $invalid_info['kewarganegaraan_ibu'] : '' ?></span>
                  </div>
                </div>

                <hr>


                <div class="row">
                  <div class="col-6">
                    <button type="button" onclick="goto_form('ayah')" class="btn btn-block btn-primary round-1">
                      <i class="mr-2 fas fa-angle-left"></i>Sebelumnya
                    </button>
                  </div>
                  <div class="col-6">
                    <button type="button" onclick="goto_form('lampiran')" class="btn btn-block btn-primary round-1">
                      Selanjutnya<i class="ml-2 fas fa-angle-right"></i>
                    </button>
                  </div>
                </div>

              </div>
              <!-- data ibu end -->







              <!-- data lampiran start -->

              <div class="tab-pane" id="tab_lampiran">
                <div class="row">
                  <div class="col-12">
                    <span class="text-md font-weight-bold text-primary">Lampiran</span>
                    <hr>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="jam_lahir" class="col-lg-4 text-sm text-muted">Jam lahir</label>
                  <div class="col-lg-8">
                    <span class="text-sm text-muted"><b>AM:</b> (00:00 Malam -> 11:59 Siang), <b>PM:</b> (12:00 Siang -> 23:59 Malam)</span>
                    <input value="<?= (isset($data_surat_kelahiran['jam_lahir'])) ? $data_surat_kelahiran['jam_lahir'] : ((isset($tanggal_sekarang)) ? $tanggal_sekarang : '') ?>" name="jam_lahir" type="time" id="jam_lahir" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['jam_lahir'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['jam_lahir'])) ? $invalid_info['jam_lahir'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="kelahiran_anak_ke" class="col-lg-4 text-sm text-muted">Kelahiran Anak-ke</label>
                  <div class="col-lg-8">
                    <input value="<?= (isset($data_surat_kelahiran['kelahiran_anak_ke'])) ? $data_surat_kelahiran['kelahiran_anak_ke'] : '' ?>" name="kelahiran_anak_ke" type="number" max-length="3" pattern="[0-9]{0,3}" id="kelahiran_anak_ke" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['kelahiran_anak_ke'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['kelahiran_anak_ke'])) ? $invalid_info['kelahiran_anak_ke'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tempat_dilahirkan" class="col-lg-4 text-sm text-muted">Tempat Dilahirkan</label>
                  <div class="col-lg-8">
                    <select name="tempat_dilahirkan" id="tempat_dilahirkan" class="form-control bw-2 round-1  <?= (isset($invalid_info['tempat_dilahirkan'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['tempat_dilahirkan'])) : ?>
                        <?php foreach ($arr_kode_kata['tempat_dilahirkan'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_kelahiran['tempat_dilahirkan']) && $data_surat_kelahiran['tempat_dilahirkan'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['tempat_dilahirkan'])) ? $invalid_info['tempat_dilahirkan'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="jenis_kelahiran" class="col-lg-4 text-sm text-muted">Jenis Kelahiran</label>
                  <div class="col-lg-8">
                    <select name="jenis_kelahiran" id="jenis_kelahiran" class="form-control bw-2 round-1  <?= (isset($invalid_info['jenis_kelahiran'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['jenis_kelahiran'])) : ?>
                        <?php foreach ($arr_kode_kata['jenis_kelahiran'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_kelahiran['jenis_kelahiran']) && $data_surat_kelahiran['jenis_kelahiran'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['jenis_kelahiran'])) ? $invalid_info['jenis_kelahiran'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="penolong_kelahiran" class="col-lg-4 text-sm text-muted">Penolong Kelahiran</label>
                  <div class="col-lg-8">
                    <select name="penolong_kelahiran" id="penolong_kelahiran" class="form-control bw-2 round-1  <?= (isset($invalid_info['penolong_kelahiran'])) ? 'is-invalid' : 'border-primary' ?>">
                      <?php if (isset($arr_kode_kata['penolong_kelahiran'])) : ?>
                        <?php foreach ($arr_kode_kata['penolong_kelahiran'] as $key => $value) : ?>
                          <option value="<?= $value['nomor_kode'] ?>" <?= (isset($data_surat_kelahiran['penolong_kelahiran']) && $data_surat_kelahiran['penolong_kelahiran'] ==  $value['nomor_kode']) ?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </select>
                    <span class="invalid-feedback"><?= (isset($invalid_info['penolong_kelahiran'])) ? $invalid_info['penolong_kelahiran'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="hubungan_pelapor_dengan_anak" class="col-lg-4 text-sm text-muted">Hubungan dengan anak</label>
                  <div class="col-lg-8">
                    <span class="text-sm">Anda bertindak sebagai pelapor, masukan status hubungan Anda dengan anak.<br>Contoh : Ayah kandung / Saudara Kandung / Wali</span>
                    <input value="<?= (isset($data_surat_kelahiran['hubungan_pelapor_dengan_anak'])) ? $data_surat_kelahiran['hubungan_pelapor_dengan_anak'] : '' ?>" name="hubungan_pelapor_dengan_anak" type="text" max-length="150" id="hubungan_pelapor_dengan_anak" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['hubungan_pelapor_dengan_anak'])) ? 'is-invalid' : 'border-primary' ?>">
                    <span class="invalid-feedback"><?= (isset($invalid_info['hubungan_pelapor_dengan_anak'])) ? $invalid_info['hubungan_pelapor_dengan_anak'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="foto_ktp_ayah" class="col-lg-4 text-sm text-muted">Foto KTP Ayah</label>
                  <div class="col-lg-8">
                    <input name="foto_ktp_ayah" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_ktp_ayah" class="text-sm px-3 form-control-file border bw-2 round-1 <?= (isset($invalid_info['foto_ktp_ayah'])) ? 'border-danger is-invalid' : 'border-primary' ?>" <?= (isset($data_surat_kelahiran['link_foto_ktp_ayah']) && $data_surat_kelahiran['link_foto_ktp_ayah'] != '') ? '' : '' ?>>
                    <span class="invalid-feedback"><?= (isset($invalid_info['foto_ktp_ayah'])) ? $invalid_info['foto_ktp_ayah'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="foto_ktp_ibu" class="col-lg-4 text-sm text-muted">Foto KTP Ibu</label>
                  <div class="col-lg-8">
                    <input name="foto_ktp_ibu" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_ktp_ibu" class=" text-sm px-3 form-control-file border bw-2 border-primary round-1 <?= (isset($invalid_info['foto_ktp_ibu'])) ? 'border-danger is-invalid' : 'border-primary' ?>" <?= (isset($data_surat_kelahiran['link_foto_ktp_ibu']) && $data_surat_kelahiran['link_foto_ktp_ibu'] != '') ? '' : '' ?>>
                    <span class="invalid-feedback"><?= (isset($invalid_info['foto_ktp_ibu'])) ? $invalid_info['foto_ktp_ibu'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="foto_kartu_keluarga" class="col-lg-4 text-sm text-muted">Foto Kartu Keluarga</label>
                  <div class="col-lg-8">
                    <input name="foto_kartu_keluarga" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_kartu_keluarga" class=" text-sm px-3 form-control-file border bw-2 border-primary round-1 <?= (isset($invalid_info['foto_kartu_keluarga'])) ? 'border-danger is-invalid' : 'border-primary' ?>" <?= (isset($data_surat_kelahiran['link_foto_kartu_keluarga']) && $data_surat_kelahiran['link_foto_kartu_keluarga'] != '') ? '' : '' ?>>
                    <span class="invalid-feedback"><?= (isset($invalid_info['foto_kartu_keluarga'])) ? $invalid_info['foto_kartu_keluarga'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="foto_buku_nikah" class="col-lg-4 text-sm text-muted">Foto Buku Nikah</label>
                  <div class="col-lg-8">
                    <input name="foto_buku_nikah" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_buku_nikah" class=" text-sm px-3 form-control-file border bw-2 border-primary round-1 <?= (isset($invalid_info['foto_buku_nikah'])) ? 'border-danger is-invalid' : 'border-primary' ?>" <?= (isset($data_surat_kelahiran['link_foto_buku_nikah']) && $data_surat_kelahiran['link_foto_buku_nikah'] != '') ? '' : '' ?>>
                    <span class="invalid-feedback"><?= (isset($invalid_info['foto_buku_nikah'])) ? $invalid_info['foto_buku_nikah'] : '' ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="foto_akta_perkawinan" class="col-lg-4 text-sm text-muted">Foto Akta Perkawinan</label>
                  <div class="col-lg-8">
                    <input name="foto_akta_perkawinan" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_akta_perkawinan" class=" text-sm px-3 form-control-file border bw-2 border-primary round-1 <?= (isset($invalid_info['foto_akta_perkawinan'])) ? 'border-danger is-invalid' : 'border-primary' ?>" <?= (isset($data_surat_kelahiran['link_foto_akta_perkawinan']) && $data_surat_kelahiran['link_foto_akta_perkawinan'] != '') ? '' : '' ?>>
                    <span class="invalid-feedback"><?= (isset($invalid_info['foto_akta_perkawinan'])) ? $invalid_info['foto_akta_perkawinan'] : '' ?></span>
                  </div>
                </div>

                <hr>
                <div class="row">
                  <div class="col-6">
                    <button type="button" onclick="goto_form('ibu')" class="btn btn-block btn-primary round-1">
                      <i class="mr-2 fas fa-angle-left"></i>Sebelumnya
                    </button>
                  </div>
                  <div class="col-6">
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
                <a href="<?= base_url() ?>/penduduk/surat-kelahiran" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
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