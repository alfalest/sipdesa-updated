
    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">
            <div class="card-header">
            <div class="card-title">
            <p class="font-weight-bold text-lg m-0">Form Surat Pengantar Nikah</p>
            </div>
            <div class="card-tools">
            <div>
                      <a href="<?=base_url()?>/penduduk/surat-pengantar-nikah" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                    </div> 
            </div>
                    
                     
            </div>
              <div class="card-body">                
           <div class="row">
              <div class="col-12">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" id="tab_pemohon_button" href="#tab_pemohon" data-toggle="tab">1. Data Pemohon</a></li>
                  <li class="nav-item"><a class="nav-link" id="tab_pasangan_button" href="#tab_pasangan" data-toggle="tab">1. Data Pasangan</a></li>
                  <li class="nav-item"><a class="nav-link" id="tab_ayah_button" href="#tab_ayah" data-toggle="tab">2. Data Ayah</a></li>
                  <li class="nav-item"><a class="nav-link" id="tab_ibu_button" href="#tab_ibu" data-toggle="tab">3. Data Ibu</a></li>
                  <li class="nav-item"><a class="nav-link" id="tab_lampiran_button" href="#tab_lampiran" data-toggle="tab">4. Lampiran</a></li>
                </ul>
              </div>
              </div>
              <hr>

              <form action="<?=base_url()?>/penduduk/surat-pengantar-nikah-update" id="surat_pengantar_nikah" method="post" enctype="multipart/form-data">
              <input value="<?=(isset($data_surat_pengantar_nikah['id_surat_pengantar_nikah']))? $data_surat_pengantar_nikah['id_surat_pengantar_nikah'] : '' ?>" name="id_surat_pengantar_nikah" type="hidden"  id="id_surat_pengantar_nikah">
             <div class="tab-content">


             <!-- data pemohon start -->
              <div class="tab-pane active show" id="tab_pemohon">
              <div class="row">
              <div class="col-12">
                  <span class="text-md font-weight-bold text-primary">Data Pemohon</span>
                  <hr>
                </div>
              </div>
              <div class="form-group row">
                
                <label for="nama_pemohon" class="col-lg-4 text-sm text-muted">Nama Lengkap</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['nama_pemohon']))? $data_surat_pengantar_nikah['nama_pemohon'] : '' ?>" name="nama_pemohon" type="text" max-length="150" id="nama_pemohon" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['nama_pemohon'])) ? $invalid_info['nama_pemohon'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="nik_pemohon" class="col-lg-4 text-sm text-muted">NIK</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['nik_pemohon']))? $data_surat_pengantar_nikah['nik_pemohon'] : '' ?>" name="nik_pemohon" type="number" pattern="[0-9]{16}" max-length="16" id="nik_pemohon" alt="Masukan nama lengkap anak" title="Masukan 16 Nomor nik anak jika" class="form-control bw-2 round-1 <?= (isset($invalid_info['nik_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['nik_pemohon'])) ? $invalid_info['nik_pemohon'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="jenis_kelamin_pemohon" class="col-lg-4 text-sm text-muted">Jenis Kelamin</label>
                <div class="col-lg-8">
                  <select name="jenis_kelamin_pemohon" id="jenis_kelamin_pemohon" class="form-control bw-2 round-1  <?= (isset($invalid_info['jenis_kelamin_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($arr_kode_kata['jenis_kelamin_pemohon'])) :?>
                    <?php foreach ($arr_kode_kata['jenis_kelamin_pemohon'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['jenis_kelamin_pemohon']) && $data_surat_pengantar_nikah['jenis_kelamin_pemohon'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['jenis_kelamin_pemohon'])) ? $invalid_info['jenis_kelamin_pemohon'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="tempat_lahir_pemohon" class="col-lg-4 text-sm text-muted">Tempat lahir</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['tempat_lahir_pemohon']))? $data_surat_pengantar_nikah['tempat_lahir_pemohon'] : '' ?>" name="tempat_lahir_pemohon" type="text" id="tempat_lahir_pemohon" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tempat_lahir_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['tempat_lahir_pemohon'])) ? $invalid_info['tempat_lahir_pemohon'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="tanggal_lahir_pemohon" class="col-lg-4 text-sm text-muted">Tanggal lahir</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['tanggal_lahir_pemohon']))? $data_surat_pengantar_nikah['tanggal_lahir_pemohon'] : ((isset($tanggal_sekarang))? $tanggal_sekarang : '' ) ?>" name="tanggal_lahir_pemohon" type="date" id="tanggal_lahir_pemohon" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tanggal_lahir_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['tanggal_lahir_pemohon'])) ? $invalid_info['tanggal_lahir_pemohon'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="agama_pemohon" class="col-lg-4 text-sm text-muted">Agama</label>
                <div class="col-lg-8">
                  <select name="agama_pemohon" id="agama_pemohon" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($arr_kode_kata['agama_pemohon'])) :?>
                      <?php foreach ($arr_kode_kata['agama_pemohon'] as $key => $value) : ?>
                        <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['agama_pemohon']) && $data_surat_pengantar_nikah['agama_pemohon'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['agama_pemohon'])) ? $invalid_info['agama_pemohon'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="jenis_pekerjaan_pemohon" class="col-lg-4 text-sm text-muted">Pekerjaan</label>
                <div class="col-lg-8">
                  <select name="jenis_pekerjaan_pemohon" id="jenis_pekerjaan_pemohon" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_pemohon'])) ? 'is-invalid' : 'border-primary' ?>">
                    <?php if(isset($arr_kode_kata['jenis_pekerjaan_pemohon'])) :?>
                      <?php foreach ($arr_kode_kata['jenis_pekerjaan_pemohon'] as $key => $value) : ?>
                        <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['jenis_pekerjaan_pemohon']) && $data_surat_pengantar_nikah['jenis_pekerjaan_pemohon'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['jenis_pekerjaan_pemohon'])) ? $invalid_info['jenis_pekerjaan_pemohon'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="alamat_pemohon" class="col-lg-4 text-sm text-muted">Alamat</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['alamat_pemohon']))? $data_surat_pengantar_nikah['alamat_pemohon'] : '' ?>" name="alamat_pemohon" type="text" max-length="150" id="alamat_pemohon" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['alamat_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['alamat_pemohon'])) ? $invalid_info['alamat_pemohon'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="rt_pemohon" class="col-lg-4 text-sm text-muted">RT</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['rt_pemohon']))? $data_surat_pengantar_nikah['rt_pemohon'] : '' ?>" name="rt_pemohon" type="number" max-length="3" pattern="[0-9]{0,3}" id="rt_pemohon" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rt_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['rt_pemohon'])) ? $invalid_info['rt_pemohon'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="rw_pemohon" class="col-lg-4 text-sm text-muted">RT</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['rw_pemohon']))? $data_surat_pengantar_nikah['rw_pemohon'] : '' ?>" name="rw_pemohon" type="number" max-length="3" pattern="[0-9]{0,3}" id="rw_pemohon" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rw_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['rw_pemohon'])) ? $invalid_info['rw_pemohon'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="provinsi_pemohon" class="col-lg-4 text-sm text-muted">Provinsi</label>
                <div class="col-lg-8">
                  <select name="provinsi_pemohon" id="provinsi_pemohon" class="form-control bw-2 round-1 <?= (isset($invalid_info['provinsi_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($data_surat_pengantar_nikah['provinsi_pemohon'])) :?>
                    <?php if(isset($arr_wilayah['provinsi_pemohon'])) :?>
                      <?php foreach ($arr_wilayah['provinsi_pemohon'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['provinsi_pemohon']) && $data_surat_pengantar_nikah['provinsi_pemohon'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['provinsi_pemohon'])) ? $invalid_info['provinsi_pemohon'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="kab_kota_pemohon" class="col-lg-4 text-sm text-muted">Kabupaten/Kota</label>
                <div class="col-lg-8">
                <select name="kab_kota_pemohon" id="kab_kota_pemohon" class="form-control bw-2 round-1 <?= (isset($invalid_info['kab_kota_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($data_surat_pengantar_nikah['kab_kota_pemohon'])) :?>
                    <?php if(isset($arr_wilayah['kab_kota_pemohon'])) :?>
                      <?php foreach ($arr_wilayah['kab_kota_pemohon'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kab_kota_pemohon']) && $data_surat_pengantar_nikah['kab_kota_pemohon'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                </select>
                <span class="invalid-feedback"><?= (isset($invalid_info['kab_kota_pemohon'])) ? $invalid_info['kab_kota_pemohon'] : '' ?></span> 
                </div>
                </div>
              <div class="form-group row">
                <label for="kecamatan_pemohon" class="col-lg-4 text-sm text-muted">Kecamatan</label>
                <div class="col-lg-8">
                <select name="kecamatan_pemohon" id="kecamatan_pemohon" class="form-control bw-2 round-1 <?= (isset($invalid_info['kecamatan_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                <?php if(isset($data_surat_pengantar_nikah['kecamatan_pemohon'])) :?>
                    <?php if(isset($arr_wilayah['kecamatan_pemohon'])) :?>
                      <?php foreach ($arr_wilayah['kecamatan_pemohon'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kecamatan_pemohon']) && $data_surat_pengantar_nikah['kecamatan_pemohon'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                </select>
                <span class="invalid-feedback"><?= (isset($invalid_info['kecamatan_pemohon'])) ? $invalid_info['kecamatan_pemohon'] : '' ?></span> 
                </div>
                </div>
              <div class="form-group row">
                <label for="kel_desa_pemohon" class="col-lg-4 text-sm text-muted">Desa/Kelurahan</label>
                <div class="col-lg-8">
                  <select name="kel_desa_pemohon" id="kel_desa_pemohon" class="form-control bw-2 round-1 <?= (isset($invalid_info['kel_desa_pemohon'])) ? 'is-invalid' : 'border-primary' ?>"  >
                  <?php if(isset($data_surat_pengantar_nikah['kel_desa_pemohon'])) :?>
                    <?php if(isset($arr_wilayah['kel_desa_pemohon'])) :?>
                      <?php foreach ($arr_wilayah['kel_desa_pemohon'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kel_desa_pemohon']) && $data_surat_pengantar_nikah['kel_desa_pemohon'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                  </select>  
                  <span class="invalid-feedback"><?= (isset($invalid_info['kel_desa_pemohon'])) ? $invalid_info['kel_desa_pemohon'] : '' ?></span> 
                </div>
              </div>
              <div class="form-group row">
                <label for="kode_pos_pemohon" class="col-lg-4 text-sm text-muted">Kode Pos</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['kode_pos_pemohon']))? $data_surat_pengantar_nikah['kode_pos_pemohon'] : '' ?>" name="kode_pos_pemohon" type="text" max-length="5" id="kode_pos_pemohon" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['kode_pos_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['kode_pos_pemohon'])) ? $invalid_info['kode_pos_pemohon'] : '' ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="kewarganegaraan_pemohon" class="col-lg-4 text-sm text-muted">Kewarganegaraan</label>
                <div class="col-lg-8">
                  <select name="kewarganegaraan_pemohon" id="kewarganegaraan_pemohon" class="form-control bw-2 round-1  <?= (isset($invalid_info['kewarganegaraan_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($arr_kode_kata['kewarganegaraan_pemohon'])) :?>
                    <?php foreach ($arr_kode_kata['kewarganegaraan_pemohon'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['kewarganegaraan_pemohon']))?  (($data_surat_pengantar_nikah['kewarganegaraan_pemohon'] ==  $value['nomor_kode']) ? 'selected' : '') : (($value['nomor_kode'] == 100) ? 'selected'  : '') ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['kewarganegaraan_pemohon'])) ? $invalid_info['kewarganegaraan_pemohon'] : '' ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="status_pernikahan_pemohon" class="col-lg-4 text-sm text-muted">Status Pernikahan</label>
                <div class="col-lg-8">
                  <select name="status_pernikahan_pemohon" id="status_pernikahan_pemohon" class="form-control bw-2 round-1  <?= (isset($invalid_info['status_pernikahan_pemohon'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($arr_kode_kata['status_pernikahan_pemohon'])) :?>
                    <?php foreach ($arr_kode_kata['status_pernikahan_pemohon'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['status_pernikahan_pemohon']))?  (($data_surat_pengantar_nikah['status_pernikahan_pemohon'] ==  $value['nomor_kode']) ? 'selected' : '') : (($value['nomor_kode'] == 100) ? 'selected'  : '') ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['status_pernikahan_pemohon'])) ? $invalid_info['status_pernikahan_pemohon'] : '' ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="beristri_ke" class="col-lg-4 text-sm text-muted">Beristri</label>
                <div class="col-lg-8">
                <span class="text-sm">Isi jika status pernikahan beristri. tulis jumlah istri</span>
                  <input value="<?=(isset($data_surat_pengantar_nikah['beristri_ke']))? $data_surat_pengantar_nikah['beristri_ke'] : '' ?>" name="beristri_ke" type="number" max-length="3" pattern="[0-9]{0,3}" id="beristri_ke" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['beristri_ke'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['beristri_ke'])) ? $invalid_info['beristri_ke'] : '' ?></span>
                </div>
              </div>

     
                <hr>
                <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6">
                  <button type="button" onclick="goto_form('pasangan')" class="align-middle btn btn-block btn-primary round-1">
                    Selanjutnya<i class="ml-2 fas fa-angle-right"></i>
                  </button>
                </div>
                </div>
              </div>
              <!-- data pemohon end -->

             <!-- data pemohon start -->
             <div class="tab-pane" id="tab_pasangan">
              <div class="row">
              <div class="col-12">
                  <span class="text-md font-weight-bold text-primary">Data Pasangan</span>
                  <hr>
                </div>
              </div>
              <div class="form-group row">
                
                <label for="nama_pasangan" class="col-lg-4 text-sm text-muted">Nama Pasangan</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['nama_pasangan']))? $data_surat_pengantar_nikah['nama_pasangan'] : '' ?>" name="nama_pasangan" type="text" max-length="150" id="nama_pasangan" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['nama_pasangan'])) ? $invalid_info['nama_pasangan'] : '' ?></span>
                </div>
              </div>

              <div class="form-group row">
                
                <label for="nama_ayah_pasangan" class="col-lg-4 text-sm text-muted">Nama Ayah Pasangan </label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['nama_ayah_pasangan']))? $data_surat_pengantar_nikah['nama_ayah_pasangan'] : '' ?>" name="nama_ayah_pasangan" type="text" max-length="150" id="nama_ayah_pasangan" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_ayah_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['nama_ayah_pasangan'])) ? $invalid_info['nama_ayah_pasangan'] : '' ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nik_pasangan" class="col-lg-4 text-sm text-muted">NIK</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['nik_pasangan']))? $data_surat_pengantar_nikah['nik_pasangan'] : '' ?>" name="nik_pasangan" type="number" pattern="[0-9]{16}" max-length="16" id="nik_pasangan" alt="Masukan nama lengkap anak" title="Masukan 16 Nomor nik anak jika" class="form-control bw-2 round-1 <?= (isset($invalid_info['nik_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['nik_pasangan'])) ? $invalid_info['nik_pasangan'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="jenis_kelamin_pasangan" class="col-lg-4 text-sm text-muted">Jenis Kelamin</label>
                <div class="col-lg-8">
                  <select name="jenis_kelamin_pasangan" id="jenis_kelamin_pasangan" class="form-control bw-2 round-1  <?= (isset($invalid_info['jenis_kelamin_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($arr_kode_kata['jenis_kelamin_pasangan'])) :?>
                    <?php foreach ($arr_kode_kata['jenis_kelamin_pasangan'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['jenis_kelamin_pasangan']) && $data_surat_pengantar_nikah['jenis_kelamin_pasangan'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['jenis_kelamin_pasangan'])) ? $invalid_info['jenis_kelamin_pasangan'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="tempat_lahir_pasangan" class="col-lg-4 text-sm text-muted">Tempat lahir</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['tempat_lahir_pasangan']))? $data_surat_pengantar_nikah['tempat_lahir_pasangan'] : '' ?>" name="tempat_lahir_pasangan" type="text" id="tempat_lahir_pasangan" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tempat_lahir_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['tempat_lahir_pasangan'])) ? $invalid_info['tempat_lahir_pasangan'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="tanggal_lahir_pasangan" class="col-lg-4 text-sm text-muted">Tanggal lahir</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['tanggal_lahir_pasangan']))? $data_surat_pengantar_nikah['tanggal_lahir_pasangan'] : ((isset($tanggal_sekarang))? $tanggal_sekarang : '' ) ?>" name="tanggal_lahir_pasangan" type="date" id="tanggal_lahir_pasangan" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tanggal_lahir_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['tanggal_lahir_pasangan'])) ? $invalid_info['tanggal_lahir_pasangan'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="agama_pasangan" class="col-lg-4 text-sm text-muted">Agama</label>
                <div class="col-lg-8">
                  <select name="agama_pasangan" id="agama_pasangan" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($arr_kode_kata['agama_pasangan'])) :?>
                      <?php foreach ($arr_kode_kata['agama_pasangan'] as $key => $value) : ?>
                        <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['agama_pasangan']) && $data_surat_pengantar_nikah['agama_pasangan'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['agama_pasangan'])) ? $invalid_info['agama_pasangan'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="jenis_pekerjaan_pasangan" class="col-lg-4 text-sm text-muted">Pekerjaan</label>
                <div class="col-lg-8">
                  <select name="jenis_pekerjaan_pasangan" id="jenis_pekerjaan_pasangan" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_pasangan'])) ? 'is-invalid' : 'border-primary' ?>">
                    <?php if(isset($arr_kode_kata['jenis_pekerjaan_pasangan'])) :?>
                      <?php foreach ($arr_kode_kata['jenis_pekerjaan_pasangan'] as $key => $value) : ?>
                        <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['jenis_pekerjaan_pasangan']) && $data_surat_pengantar_nikah['jenis_pekerjaan_pasangan'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['jenis_pekerjaan_pasangan'])) ? $invalid_info['jenis_pekerjaan_pasangan'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="alamat_pasangan" class="col-lg-4 text-sm text-muted">Alamat</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['alamat_pasangan']))? $data_surat_pengantar_nikah['alamat_pasangan'] : '' ?>" name="alamat_pasangan" type="text" max-length="150" id="alamat_pasangan" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['alamat_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['alamat_pasangan'])) ? $invalid_info['alamat_pasangan'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="rt_pasangan" class="col-lg-4 text-sm text-muted">RT</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['rt_pasangan']))? $data_surat_pengantar_nikah['rt_pasangan'] : '' ?>" name="rt_pasangan" type="number" max-length="3" pattern="[0-9]{0,3}" id="rt_pasangan" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rt_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['rt_pasangan'])) ? $invalid_info['rt_pasangan'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="rw_pasangan" class="col-lg-4 text-sm text-muted">RT</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['rw_pasangan']))? $data_surat_pengantar_nikah['rw_pasangan'] : '' ?>" name="rw_pasangan" type="number" max-length="3" pattern="[0-9]{0,3}" id="rw_pasangan" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rw_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['rw_pasangan'])) ? $invalid_info['rw_pasangan'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="provinsi_pasangan" class="col-lg-4 text-sm text-muted">Provinsi</label>
                <div class="col-lg-8">
                  <select name="provinsi_pasangan" id="provinsi_pasangan" class="form-control bw-2 round-1 <?= (isset($invalid_info['provinsi_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($data_surat_pengantar_nikah['provinsi_pasangan'])) :?>
                    <?php if(isset($arr_wilayah['provinsi_pasangan'])) :?>
                      <?php foreach ($arr_wilayah['provinsi_pasangan'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['provinsi_pasangan']) && $data_surat_pengantar_nikah['provinsi_pasangan'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['provinsi_pasangan'])) ? $invalid_info['provinsi_pasangan'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="kab_kota_pasangan" class="col-lg-4 text-sm text-muted">Kabupaten/Kota</label>
                <div class="col-lg-8">
                <select name="kab_kota_pasangan" id="kab_kota_pasangan" class="form-control bw-2 round-1 <?= (isset($invalid_info['kab_kota_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($data_surat_pengantar_nikah['kab_kota_pasangan'])) :?>
                    <?php if(isset($arr_wilayah['kab_kota_pasangan'])) :?>
                      <?php foreach ($arr_wilayah['kab_kota_pasangan'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kab_kota_pasangan']) && $data_surat_pengantar_nikah['kab_kota_pasangan'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                </select>
                <span class="invalid-feedback"><?= (isset($invalid_info['kab_kota_pasangan'])) ? $invalid_info['kab_kota_pasangan'] : '' ?></span> 
                </div>
                </div>
              <div class="form-group row">
                <label for="kecamatan_pasangan" class="col-lg-4 text-sm text-muted">Kecamatan</label>
                <div class="col-lg-8">
                <select name="kecamatan_pasangan" id="kecamatan_pasangan" class="form-control bw-2 round-1 <?= (isset($invalid_info['kecamatan_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                <?php if(isset($data_surat_pengantar_nikah['kecamatan_pasangan'])) :?>
                    <?php if(isset($arr_wilayah['kecamatan_pasangan'])) :?>
                      <?php foreach ($arr_wilayah['kecamatan_pasangan'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kecamatan_pasangan']) && $data_surat_pengantar_nikah['kecamatan_pasangan'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                </select>
                <span class="invalid-feedback"><?= (isset($invalid_info['kecamatan_pasangan'])) ? $invalid_info['kecamatan_pasangan'] : '' ?></span> 
                </div>
                </div>
              <div class="form-group row">
                <label for="kel_desa_pasangan" class="col-lg-4 text-sm text-muted">Desa/Kelurahan</label>
                <div class="col-lg-8">
                  <select name="kel_desa_pasangan" id="kel_desa_pasangan" class="form-control bw-2 round-1 <?= (isset($invalid_info['kel_desa_pasangan'])) ? 'is-invalid' : 'border-primary' ?>"  >
                  <?php if(isset($data_surat_pengantar_nikah['kel_desa_pasangan'])) :?>
                    <?php if(isset($arr_wilayah['kel_desa_pasangan'])) :?>
                      <?php foreach ($arr_wilayah['kel_desa_pasangan'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kel_desa_pasangan']) && $data_surat_pengantar_nikah['kel_desa_pasangan'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                  </select>  
                  <span class="invalid-feedback"><?= (isset($invalid_info['kel_desa_pasangan'])) ? $invalid_info['kel_desa_pasangan'] : '' ?></span> 
                </div>
              </div>
              <div class="form-group row">
                <label for="kode_pos_pasangan" class="col-lg-4 text-sm text-muted">Kode Pos</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['kode_pos_pasangan']))? $data_surat_pengantar_nikah['kode_pos_pasangan'] : '' ?>" name="kode_pos_pasangan" type="text" max-length="5" id="kode_pos_pasangan" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['kode_pos_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['kode_pos_pasangan'])) ? $invalid_info['kode_pos_pasangan'] : '' ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="kewarganegaraan_pasangan" class="col-lg-4 text-sm text-muted">Kewarganegaraan</label>
                <div class="col-lg-8">
                  <select name="kewarganegaraan_pasangan" id="kewarganegaraan_pasangan" class="form-control bw-2 round-1  <?= (isset($invalid_info['kewarganegaraan_pasangan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($arr_kode_kata['kewarganegaraan_pasangan'])) :?>
                    <?php foreach ($arr_kode_kata['kewarganegaraan_pasangan'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['kewarganegaraan_pasangan']))?  (($data_surat_pengantar_nikah['kewarganegaraan_pasangan'] ==  $value['nomor_kode']) ? 'selected' : '') : (($value['nomor_kode'] == 100) ? 'selected'  : '') ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['kewarganegaraan_pasangan'])) ? $invalid_info['kewarganegaraan_pasangan'] : '' ?></span>
                </div>
              </div>
     
                <hr>
                <div class="row">
                <div class="col-6">
                  <button type="button" onclick="goto_form('pemohon')"  class="btn btn-block btn-primary round-1">
                  <i class="mr-2 fas fa-angle-left"></i>Sebelumnya
                  </button>
                </div>
                <div class="col-6">
                  <button type="button" onclick="goto_form('ayah')" class="align-middle btn btn-block btn-primary round-1">
                    Selanjutnya<i class="ml-2 fas fa-angle-right"></i>
                  </button>
                </div>
                </div>
              </div>
              <!-- data pemohon end -->

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
                  <input value="<?=(isset($data_surat_pengantar_nikah['nama_ayah']))? $data_surat_pengantar_nikah['nama_ayah'] : '' ?>" name="nama_ayah" type="text" max-length="150" id="nama_ayah" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_ayah'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['nama_ayah'])) ? $invalid_info['nama_ayah'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="nik_ayah" class="col-lg-4 text-sm text-muted">NIK</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['nik_ayah']))? $data_surat_pengantar_nikah['nik_ayah'] : '' ?>" name="nik_ayah" type="number" pattern="[0-9]{16}" max-length="16" id="nik_ayah" alt="Masukan nama lengkap anak" title="Masukan 16 Nomor nik anak jika" class="form-control bw-2 round-1 <?= (isset($invalid_info['nik_ayah'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['nik_ayah'])) ? $invalid_info['nik_ayah'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="tempat_lahir_ayah" class="col-lg-4 text-sm text-muted">Tempat lahir</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['tempat_lahir_ayah']))? $data_surat_pengantar_nikah['tempat_lahir_ayah'] : '' ?>" name="tempat_lahir_ayah" type="text" id="tempat_lahir_ayah" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tempat_lahir_ayah'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['tempat_lahir_ayah'])) ? $invalid_info['tempat_lahir_ayah'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="tanggal_lahir_ayah" class="col-lg-4 text-sm text-muted">Tanggal lahir</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['tanggal_lahir_ayah']))? $data_surat_pengantar_nikah['tanggal_lahir_ayah'] : ((isset($tanggal_sekarang))? $tanggal_sekarang : '' ) ?>" name="tanggal_lahir_ayah" type="date" id="tanggal_lahir_ayah" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tanggal_lahir_ayah'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['tanggal_lahir_ayah'])) ? $invalid_info['tanggal_lahir_ayah'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="agama_ayah" class="col-lg-4 text-sm text-muted">Agama</label>
                <div class="col-lg-8">
                  <select name="agama_ayah" id="agama_ayah" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_ayah'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($arr_kode_kata['agama_ayah'])) :?>
                      <?php foreach ($arr_kode_kata['agama_ayah'] as $key => $value) : ?>
                        <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['agama_ayah']) && $data_surat_pengantar_nikah['agama_ayah'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['agama_ayah'])) ? $invalid_info['agama_ayah'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="jenis_pekerjaan_ayah" class="col-lg-4 text-sm text-muted">Pekerjaan</label>
                <div class="col-lg-8">
                  <select name="jenis_pekerjaan_ayah" id="jenis_pekerjaan_ayah" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_ayah'])) ? 'is-invalid' : 'border-primary' ?>">
                    <?php if(isset($arr_kode_kata['jenis_pekerjaan_ayah'])) :?>
                      <?php foreach ($arr_kode_kata['jenis_pekerjaan_ayah'] as $key => $value) : ?>
                        <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['jenis_pekerjaan_ayah']) && $data_surat_pengantar_nikah['jenis_pekerjaan_ayah'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['jenis_pekerjaan_ayah'])) ? $invalid_info['jenis_pekerjaan_ayah'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="alamat_ayah" class="col-lg-4 text-sm text-muted">Alamat</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['alamat_ayah']))? $data_surat_pengantar_nikah['alamat_ayah'] : '' ?>" name="alamat_ayah" type="text" max-length="150" id="alamat_ayah" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['alamat_ayah'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['alamat_ayah'])) ? $invalid_info['alamat_ayah'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="rt_ayah" class="col-lg-4 text-sm text-muted">RT</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['rt_ayah']))? $data_surat_pengantar_nikah['rt_ayah'] : '' ?>" name="rt_ayah" type="number" max-length="3" pattern="[0-9]{0,3}" id="rt_ayah" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rt_ayah'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['rt_ayah'])) ? $invalid_info['rt_ayah'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="rw_ayah" class="col-lg-4 text-sm text-muted">RT</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['rw_ayah']))? $data_surat_pengantar_nikah['rw_ayah'] : '' ?>" name="rw_ayah" type="number" max-length="3" pattern="[0-9]{0,3}" id="rw_ayah" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rw_ayah'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['rw_ayah'])) ? $invalid_info['rw_ayah'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="provinsi_ayah" class="col-lg-4 text-sm text-muted">Provinsi</label>
                <div class="col-lg-8">
                  <select name="provinsi_ayah" id="provinsi_ayah" class="form-control bw-2 round-1 <?= (isset($invalid_info['provinsi_ayah'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($data_surat_pengantar_nikah['provinsi_ayah'])) :?>
                    <?php if(isset($arr_wilayah['provinsi_ayah'])) :?>
                      <?php foreach ($arr_wilayah['provinsi_ayah'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['provinsi_ayah']) && $data_surat_pengantar_nikah['provinsi_ayah'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['provinsi_ayah'])) ? $invalid_info['provinsi_ayah'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="kab_kota_ayah" class="col-lg-4 text-sm text-muted">Kabupaten/Kota</label>
                <div class="col-lg-8">
                <select name="kab_kota_ayah" id="kab_kota_ayah" class="form-control bw-2 round-1 <?= (isset($invalid_info['kab_kota_ayah'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($data_surat_pengantar_nikah['kab_kota_ayah'])) :?>
                    <?php if(isset($arr_wilayah['kab_kota_ayah'])) :?>
                      <?php foreach ($arr_wilayah['kab_kota_ayah'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kab_kota_ayah']) && $data_surat_pengantar_nikah['kab_kota_ayah'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                </select>
                <span class="invalid-feedback"><?= (isset($invalid_info['kab_kota_ayah'])) ? $invalid_info['kab_kota_ayah'] : '' ?></span> 
                </div>
                </div>
              <div class="form-group row">
                <label for="kecamatan_ayah" class="col-lg-4 text-sm text-muted">Kecamatan</label>
                <div class="col-lg-8">
                <select name="kecamatan_ayah" id="kecamatan_ayah" class="form-control bw-2 round-1 <?= (isset($invalid_info['kecamatan_ayah'])) ? 'is-invalid' : 'border-primary' ?>" >
                <?php if(isset($data_surat_pengantar_nikah['kecamatan_ayah'])) :?>
                    <?php if(isset($arr_wilayah['kecamatan_ayah'])) :?>
                      <?php foreach ($arr_wilayah['kecamatan_ayah'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kecamatan_ayah']) && $data_surat_pengantar_nikah['kecamatan_ayah'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                </select>
                <span class="invalid-feedback"><?= (isset($invalid_info['kecamatan_ayah'])) ? $invalid_info['kecamatan_ayah'] : '' ?></span> 
                </div>
                </div>
              <div class="form-group row">
                <label for="kel_desa_ayah" class="col-lg-4 text-sm text-muted">Desa/Kelurahan</label>
                <div class="col-lg-8">
                  <select name="kel_desa_ayah" id="kel_desa_ayah" class="form-control bw-2 round-1 <?= (isset($invalid_info['kel_desa_ayah'])) ? 'is-invalid' : 'border-primary' ?>"  >
                  <?php if(isset($data_surat_pengantar_nikah['kel_desa_ayah'])) :?>
                    <?php if(isset($arr_wilayah['kel_desa_ayah'])) :?>
                      <?php foreach ($arr_wilayah['kel_desa_ayah'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kel_desa_ayah']) && $data_surat_pengantar_nikah['kel_desa_ayah'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                  </select>  
                  <span class="invalid-feedback"><?= (isset($invalid_info['kel_desa_ayah'])) ? $invalid_info['kel_desa_ayah'] : '' ?></span> 
                </div>
              </div>
              <div class="form-group row">
                <label for="kode_pos_ayah" class="col-lg-4 text-sm text-muted">Kode Pos</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['kode_pos_ayah']))? $data_surat_pengantar_nikah['kode_pos_ayah'] : '' ?>" name="kode_pos_ayah" type="text" max-length="5" id="kode_pos_ayah" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['kode_pos_ayah'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['kode_pos_ayah'])) ? $invalid_info['kode_pos_ayah'] : '' ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="kewarganegaraan_ayah" class="col-lg-4 text-sm text-muted">Kewarganegaraan</label>
                <div class="col-lg-8">
                  <select name="kewarganegaraan_ayah" id="kewarganegaraan_ayah" class="form-control bw-2 round-1  <?= (isset($invalid_info['kewarganegaraan_ayah'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($arr_kode_kata['kewarganegaraan_ayah'])) :?>
                    <?php foreach ($arr_kode_kata['kewarganegaraan_ayah'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['kewarganegaraan_ayah']))?  (($data_surat_pengantar_nikah['kewarganegaraan_ayah'] ==  $value['nomor_kode']) ? 'selected' : '') : (($value['nomor_kode'] == 100) ? 'selected'  : '') ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['kewarganegaraan_ayah'])) ? $invalid_info['kewarganegaraan_ayah'] : '' ?></span>
                </div>
              </div>

                <hr>

                <div class="row">
                <div class="col-6">
                  <button type="button" onclick="goto_form('pasangan')"  class="btn btn-block btn-primary round-1">
                  <i class="mr-2 fas fa-angle-left"></i>Sebelumnya
                  </button>
                </div>
                <div class="col-6">
                  <button type="button" onclick="goto_form('ibu')"  class="btn btn-block btn-primary round-1">
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
                  <input value="<?=(isset($data_surat_pengantar_nikah['nama_ibu']))? $data_surat_pengantar_nikah['nama_ibu'] : '' ?>" name="nama_ibu" type="text" max-length="150" id="nama_ibu" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_ibu'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['nama_ibu'])) ? $invalid_info['nama_ibu'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="nik_ibu" class="col-lg-4 text-sm text-muted">NIK</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['nik_ibu']))? $data_surat_pengantar_nikah['nik_ibu'] : '' ?>" name="nik_ibu" type="number" pattern="[0-9]{16}" max-length="16" id="nik_ibu" alt="Masukan nama lengkap anak" title="Masukan 16 Nomor nik anak jika" class="form-control bw-2 round-1 <?= (isset($invalid_info['nik_ibu'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['nik_ibu'])) ? $invalid_info['nik_ibu'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="tempat_lahir_ibu" class="col-lg-4 text-sm text-muted">Tempat lahir</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['tempat_lahir_ibu']))? $data_surat_pengantar_nikah['tempat_lahir_ibu'] : '' ?>" name="tempat_lahir_ibu" type="text" id="tempat_lahir_ibu" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tempat_lahir_ibu'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['tempat_lahir_ibu'])) ? $invalid_info['tempat_lahir_ibu'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="tanggal_lahir_ibu" class="col-lg-4 text-sm text-muted">Tanggal lahir</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['tanggal_lahir_ibu']))? $data_surat_pengantar_nikah['tanggal_lahir_ibu'] : ((isset($tanggal_sekarang))? $tanggal_sekarang : '' ) ?>" name="tanggal_lahir_ibu" type="date" id="tanggal_lahir_ibu" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['tanggal_lahir_ibu'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['tanggal_lahir_ibu'])) ? $invalid_info['tanggal_lahir_ibu'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="agama_ibu" class="col-lg-4 text-sm text-muted">Agama</label>
                <div class="col-lg-8">
                  <select name="agama_ibu" id="agama_ibu" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_ibu'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($arr_kode_kata['agama_ibu'])) :?>
                      <?php foreach ($arr_kode_kata['agama_ibu'] as $key => $value) : ?>
                        <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['agama_ibu']) && $data_surat_pengantar_nikah['agama_ibu'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['agama_ibu'])) ? $invalid_info['agama_ibu'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="jenis_pekerjaan_ibu" class="col-lg-4 text-sm text-muted">Pekerjaan</label>
                <div class="col-lg-8">
                  <select name="jenis_pekerjaan_ibu" id="jenis_pekerjaan_ibu" class="form-control bw-2 round-1 <?= (isset($invalid_info['agama_ibu'])) ? 'is-invalid' : 'border-primary' ?>">
                    <?php if(isset($arr_kode_kata['jenis_pekerjaan_ibu'])) :?>
                      <?php foreach ($arr_kode_kata['jenis_pekerjaan_ibu'] as $key => $value) : ?>
                        <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['jenis_pekerjaan_ibu']) && $data_surat_pengantar_nikah['jenis_pekerjaan_ibu'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['jenis_pekerjaan_ibu'])) ? $invalid_info['jenis_pekerjaan_ibu'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="alamat_ibu" class="col-lg-4 text-sm text-muted">Alamat</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['alamat_ibu']))? $data_surat_pengantar_nikah['alamat_ibu'] : '' ?>" name="alamat_ibu" type="text" max-length="150" id="alamat_ibu" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['alamat_ibu'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['alamat_ibu'])) ? $invalid_info['alamat_ibu'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="rt_ibu" class="col-lg-4 text-sm text-muted">RT</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['rt_ibu']))? $data_surat_pengantar_nikah['rt_ibu'] : '' ?>" name="rt_ibu" type="number" max-length="3" pattern="[0-9]{0,3}" id="rt_ibu" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rt_ibu'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['rt_ibu'])) ? $invalid_info['rt_ibu'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="rw_ibu" class="col-lg-4 text-sm text-muted">RT</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['rw_ibu']))? $data_surat_pengantar_nikah['rw_ibu'] : '' ?>" name="rw_ibu" type="number" max-length="3" pattern="[0-9]{0,3}" id="rw_ibu" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rw_ibu'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['rw_ibu'])) ? $invalid_info['rw_ibu'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="provinsi_ibu" class="col-lg-4 text-sm text-muted">Provinsi</label>
                <div class="col-lg-8">
                  <select name="provinsi_ibu" id="provinsi_ibu" class="form-control bw-2 round-1 <?= (isset($invalid_info['provinsi_ibu'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($data_surat_pengantar_nikah['provinsi_ibu'])) :?>
                    <?php if(isset($arr_wilayah['provinsi_ibu'])) :?>
                      <?php foreach ($arr_wilayah['provinsi_ibu'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['provinsi_ibu']) && $data_surat_pengantar_nikah['provinsi_ibu'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['provinsi_ibu'])) ? $invalid_info['provinsi_ibu'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="kab_kota_ibu" class="col-lg-4 text-sm text-muted">Kabupaten/Kota</label>
                <div class="col-lg-8">
                <select name="kab_kota_ibu" id="kab_kota_ibu" class="form-control bw-2 round-1 <?= (isset($invalid_info['kab_kota_ibu'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($data_surat_pengantar_nikah['kab_kota_ibu'])) :?>
                    <?php if(isset($arr_wilayah['kab_kota_ibu'])) :?>
                      <?php foreach ($arr_wilayah['kab_kota_ibu'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kab_kota_ibu']) && $data_surat_pengantar_nikah['kab_kota_ibu'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                </select>
                <span class="invalid-feedback"><?= (isset($invalid_info['kab_kota_ibu'])) ? $invalid_info['kab_kota_ibu'] : '' ?></span> 
                </div>
                </div>
              <div class="form-group row">
                <label for="kecamatan_ibu" class="col-lg-4 text-sm text-muted">Kecamatan</label>
                <div class="col-lg-8">
                <select name="kecamatan_ibu" id="kecamatan_ibu" class="form-control bw-2 round-1 <?= (isset($invalid_info['kecamatan_ibu'])) ? 'is-invalid' : 'border-primary' ?>" >
                <?php if(isset($data_surat_pengantar_nikah['kecamatan_ibu'])) :?>
                    <?php if(isset($arr_wilayah['kecamatan_ibu'])) :?>
                      <?php foreach ($arr_wilayah['kecamatan_ibu'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kecamatan_ibu']) && $data_surat_pengantar_nikah['kecamatan_ibu'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                </select>
                <span class="invalid-feedback"><?= (isset($invalid_info['kecamatan_ibu'])) ? $invalid_info['kecamatan_ibu'] : '' ?></span> 
                </div>
                </div>
              <div class="form-group row">
                <label for="kel_desa_ibu" class="col-lg-4 text-sm text-muted">Desa/Kelurahan</label>
                <div class="col-lg-8">
                  <select name="kel_desa_ibu" id="kel_desa_ibu" class="form-control bw-2 round-1 <?= (isset($invalid_info['kel_desa_ibu'])) ? 'is-invalid' : 'border-primary' ?>"  >
                  <?php if(isset($data_surat_pengantar_nikah['kel_desa_ibu'])) :?>
                    <?php if(isset($arr_wilayah['kel_desa_ibu'])) :?>
                      <?php foreach ($arr_wilayah['kel_desa_ibu'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kel_desa_ibu']) && $data_surat_pengantar_nikah['kel_desa_ibu'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                  </select>  
                  <span class="invalid-feedback"><?= (isset($invalid_info['kel_desa_ibu'])) ? $invalid_info['kel_desa_ibu'] : '' ?></span> 
                </div>
              </div>
              <div class="form-group row">
                <label for="kode_pos_ibu" class="col-lg-4 text-sm text-muted">Kode Pos</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['kode_pos_ibu']))? $data_surat_pengantar_nikah['kode_pos_ibu'] : '' ?>" name="kode_pos_ibu" type="text" max-length="5" id="kode_pos_ibu" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['kode_pos_ibu'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['kode_pos_ibu'])) ? $invalid_info['kode_pos_ibu'] : '' ?></span>
                </div>
              </div>


              <div class="form-group row">
                <label for="kewarganegaraan_ibu" class="col-lg-4 text-sm text-muted">Kewarganegaraan</label>
                <div class="col-lg-8">
                  <select name="kewarganegaraan_ibu" id="kewarganegaraan_ibu" class="form-control bw-2 round-1  <?= (isset($invalid_info['kewarganegaraan_ibu'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($arr_kode_kata['kewarganegaraan_ibu'])) :?>
                    <?php foreach ($arr_kode_kata['kewarganegaraan_ibu'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_surat_pengantar_nikah['kewarganegaraan_ibu']))?  (($data_surat_pengantar_nikah['kewarganegaraan_ibu'] ==  $value['nomor_kode']) ? 'selected' : '') : (($value['nomor_kode'] == 100) ? 'selected'  : '') ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['kewarganegaraan_ibu'])) ? $invalid_info['kewarganegaraan_ibu'] : '' ?></span>
                </div>
              </div>

                <hr>

       
                <div class="row">
                <div class="col-6">
                  <button type="button" onclick="goto_form('ayah')"  class="btn btn-block btn-primary round-1">
                  <i class="mr-2 fas fa-angle-left"></i>Sebelumnya
                  </button>
                </div>
                <div class="col-6">
                  <button type="button" onclick="goto_form('lampiran')"  class="btn btn-block btn-primary round-1">
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
                <label for="foto_ktp_ayah" class="col-lg-4 text-sm text-muted">Foto KTP Ayah</label>
                <div class="col-lg-8">
                  <input name="foto_ktp_ayah" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_ktp_ayah" class="text-sm px-3 form-control-file border bw-2 round-1 <?= (isset($invalid_info['foto_ktp_ayah'])) ? 'border-danger is-invalid' : 'border-primary' ?>" <?=(isset($data_surat_pengantar_nikah['link_foto_ktp_ayah']) && $data_surat_pengantar_nikah['link_foto_ktp_ayah'] != '') ? '' : '' ?>>
                  <span class="invalid-feedback"><?= (isset($invalid_info['foto_ktp_ayah'])) ? $invalid_info['foto_ktp_ayah'] : '' ?></span>    
                </div>
              </div>

              <div class="form-group row">
                <label for="foto_ktp_ibu" class="col-lg-4 text-sm text-muted">Foto KTP Ibu</label>
                <div class="col-lg-8">
                  <input name="foto_ktp_ibu" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_ktp_ibu" class=" text-sm px-3 form-control-file border bw-2 border-primary round-1 <?= (isset($invalid_info['foto_ktp_ibu'])) ? 'border-danger is-invalid' : 'border-primary' ?>" <?=(isset($data_surat_pengantar_nikah['link_foto_ktp_ibu']) && $data_surat_pengantar_nikah['link_foto_ktp_ibu'] != '') ? '' : '' ?>>
                  <span class="invalid-feedback"><?= (isset($invalid_info['foto_ktp_ibu'])) ? $invalid_info['foto_ktp_ibu'] : '' ?></span>  
                </div>
              </div>

              <div class="form-group row">
                <label for="foto_kartu_keluarga" class="col-lg-4 text-sm text-muted">Foto Kartu Keluarga</label>
                <div class="col-lg-8">
                  <input name="foto_kartu_keluarga" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_kartu_keluarga" class=" text-sm px-3 form-control-file border bw-2 border-primary round-1 <?= (isset($invalid_info['foto_kartu_keluarga'])) ? 'border-danger is-invalid' : 'border-primary' ?>" <?=(isset($data_surat_pengantar_nikah['link_foto_kartu_keluarga']) && $data_surat_pengantar_nikah['link_foto_kartu_keluarga'] != '') ? '' : '' ?>>
                  <span class="invalid-feedback"><?= (isset($invalid_info['foto_kartu_keluarga'])) ? $invalid_info['foto_kartu_keluarga'] : '' ?></span>  
                </div>
              </div>

              <div class="form-group row">
                <label for="foto_ktp_pemohon" class="col-lg-4 text-sm text-muted">Foto KTP Pemohon</label>
                <div class="col-lg-8">
                  <input name="foto_ktp_pemohon" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_ktp_pemohon" class=" text-sm px-3 form-control-file border bw-2 border-primary round-1 <?= (isset($invalid_info['foto_ktp_pemohon'])) ? 'border-danger is-invalid' : 'border-primary' ?>" <?=(isset($data_surat_pengantar_nikah['link_foto_ktp_pemohon']) && $data_surat_pengantar_nikah['link_foto_ktp_pemohon'] != '') ? '' : '' ?>>
                  <span class="invalid-feedback"><?= (isset($invalid_info['foto_ktp_pemohon'])) ? $invalid_info['foto_ktp_pemohon'] : '' ?></span> 
                </div>
              </div>

              <div class="form-group row">
                <label for="foto_ktp_pasangan" class="col-lg-4 text-sm text-muted">Foto KTP Pasangan</label>
                <div class="col-lg-8">
                  <input name="foto_ktp_pasangan" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_ktp_pasangan" class=" text-sm px-3 form-control-file border bw-2 border-primary round-1 <?= (isset($invalid_info['foto_ktp_pasangan'])) ? 'border-danger is-invalid' : 'border-primary' ?>" <?=(isset($data_surat_pengantar_nikah['link_foto_ktp_pasangan']) && $data_surat_pengantar_nikah['link_foto_ktp_pasangan'] != '') ? '' : '' ?>>
                  <span class="invalid-feedback"><?= (isset($invalid_info['foto_ktp_pasangan'])) ? $invalid_info['foto_ktp_pasangan'] : '' ?></span>  
                </div>
              </div>

              <div class="form-group row">
                <label for="foto_kartu_keluarga_pasangan" class="col-lg-4 text-sm text-muted">Foto Kartu Keluarga Pasangan</label>
                <div class="col-lg-8">
                  <input name="foto_kartu_keluarga_pasangan" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_kartu_keluarga_pasangan" class=" text-sm px-3 form-control-file border bw-2 border-primary round-1 <?= (isset($invalid_info['foto_kartu_keluarga_pasangan'])) ? 'border-danger is-invalid' : 'border-primary' ?>" <?=(isset($data_surat_pengantar_nikah['link_foto_kartu_keluarga_pasangan']) && $data_surat_pengantar_nikah['link_foto_kartu_keluarga_pasangan'] != '') ? '' : '' ?>>
                  <span class="invalid-feedback"><?= (isset($invalid_info['foto_kartu_keluarga_pasangan'])) ? $invalid_info['foto_kartu_keluarga_pasangan'] : '' ?></span>  
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                <hr>
                    <h4>Tempat Akad Nikah</h4>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="alamat_akad" class="col-lg-4 text-sm text-muted">Alamat tempat akad</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['alamat_akad']))? $data_surat_pengantar_nikah['alamat_akad'] : '' ?>" name="alamat_akad" type="text" max-length="150" id="alamat_akad" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['alamat_akad'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['alamat_akad'])) ? $invalid_info['alamat_akad'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="rt_akad" class="col-lg-4 text-sm text-muted">RT tempat akad</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['rt_akad']))? $data_surat_pengantar_nikah['rt_akad'] : '' ?>" name="rt_akad" type="number" max-length="3" pattern="[0-9]{0,3}" id="rt_akad" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rt_akad'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['rt_akad'])) ? $invalid_info['rt_akad'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="rw_akad" class="col-lg-4 text-sm text-muted">RT tempat akad</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['rw_akad']))? $data_surat_pengantar_nikah['rw_akad'] : '' ?>" name="rw_akad" type="number" max-length="3" pattern="[0-9]{0,3}" id="rw_akad" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['rw_akad'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['rw_akad'])) ? $invalid_info['rw_akad'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="provinsi_akad" class="col-lg-4 text-sm text-muted">Provinsi tempat akad</label>
                <div class="col-lg-8">
                  <select name="provinsi_akad" id="provinsi_akad" class="form-control bw-2 round-1 <?= (isset($invalid_info['provinsi_akad'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($data_surat_pengantar_nikah['provinsi_akad'])) :?>
                    <?php if(isset($arr_wilayah['provinsi_akad'])) :?>
                      <?php foreach ($arr_wilayah['provinsi_akad'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['provinsi_akad']) && $data_surat_pengantar_nikah['provinsi_akad'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['provinsi_akad'])) ? $invalid_info['provinsi_akad'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="kab_kota_akad" class="col-lg-4 text-sm text-muted">Kabupaten/Kota tempat akad</label>
                <div class="col-lg-8">
                <select name="kab_kota_akad" id="kab_kota_akad" class="form-control bw-2 round-1 <?= (isset($invalid_info['kab_kota_akad'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($data_surat_pengantar_nikah['kab_kota_akad'])) :?>
                    <?php if(isset($arr_wilayah['kab_kota_akad'])) :?>
                      <?php foreach ($arr_wilayah['kab_kota_akad'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kab_kota_akad']) && $data_surat_pengantar_nikah['kab_kota_akad'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                </select>
                <span class="invalid-feedback"><?= (isset($invalid_info['kab_kota_akad'])) ? $invalid_info['kab_kota_akad'] : '' ?></span> 
                </div>
                </div>
              <div class="form-group row">
                <label for="kecamatan_akad" class="col-lg-4 text-sm text-muted">Kecamatan tempat akad</label>
                <div class="col-lg-8">
                <select name="kecamatan_akad" id="kecamatan_akad" class="form-control bw-2 round-1 <?= (isset($invalid_info['kecamatan_akad'])) ? 'is-invalid' : 'border-primary' ?>" >
                <?php if(isset($data_surat_pengantar_nikah['kecamatan_akad'])) :?>
                    <?php if(isset($arr_wilayah['kecamatan_akad'])) :?>
                      <?php foreach ($arr_wilayah['kecamatan_akad'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kecamatan_akad']) && $data_surat_pengantar_nikah['kecamatan_akad'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                </select>
                <span class="invalid-feedback"><?= (isset($invalid_info['kecamatan_akad'])) ? $invalid_info['kecamatan_akad'] : '' ?></span> 
                </div>
                </div>
              <div class="form-group row">
                <label for="kel_desa_akad" class="col-lg-4 text-sm text-muted">Desa/Kelurahan tempat akad</label>
                <div class="col-lg-8">
                  <select name="kel_desa_akad" id="kel_desa_akad" class="form-control bw-2 round-1 <?= (isset($invalid_info['kel_desa_akad'])) ? 'is-invalid' : 'border-primary' ?>"  >
                  <?php if(isset($data_surat_pengantar_nikah['kel_desa_akad'])) :?>
                    <?php if(isset($arr_wilayah['kel_desa_akad'])) :?>
                      <?php foreach ($arr_wilayah['kel_desa_akad'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_surat_pengantar_nikah['kel_desa_akad']) && $data_surat_pengantar_nikah['kel_desa_akad'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                  </select>  
                  <span class="invalid-feedback"><?= (isset($invalid_info['kel_desa_akad'])) ? $invalid_info['kel_desa_akad'] : '' ?></span> 
                </div>
              </div>
              <div class="form-group row">
                <label for="kode_pos_akad" class="col-lg-4 text-sm text-muted">Kode Pos tempat akad</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_surat_pengantar_nikah['kode_pos_akad']))? $data_surat_pengantar_nikah['kode_pos_akad'] : '' ?>" name="kode_pos_akad" type="text" max-length="5" id="kode_pos_akad" alt="Masukan nama lengkap anak" title="Masukan Nama lengkap anak" class="form-control bw-2 round-1 <?= (isset($invalid_info['kode_pos_akad'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['kode_pos_akad'])) ? $invalid_info['kode_pos_akad'] : '' ?></span>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                <hr>
                    <h4>Pencatatan Isbat</h4>
                </div>
              </div>

              <div class="form-group row">
                <label for="kantor_pengadilan_agama" class="col-lg-4 text-sm text-muted">Kantor Pengadilan Agama</label>
                <div class="col-lg-8">
                  <input placeholder="contoh: TIGARAKSA" value="<?=(isset($data_surat_pengantar_nikah['kantor_pengadilan_agama']))? $data_surat_pengantar_nikah['kantor_pengadilan_agama'] : '' ?>" name="kantor_pengadilan_agama" type="text" id="kantor_pengadilan_agama" alt="Pilih tanggal lahir" title="Pilih tanggal lahir" class="form-control bw-2 round-1 <?= (isset($invalid_info['kantor_pengadilan_agama'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['kantor_pengadilan_agama'])) ? $invalid_info['kantor_pengadilan_agama'] : '' ?></span>
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

    <?php if(isset($message_info)) : 
  $icon_color = ['text-danger', 'text-success' ]; 
  $icon_symbol = ['fa-times-circle', 'fa-check-circle' ]; 
?>
<div class="modal fade" id="modal_message_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content round-1">
      <div class="modal-header">
        <div class="modal-title">
          <h4 class="">
            <i class="mr-2 fas <?= $icon_symbol[$message_info['status']]?> <?= $icon_color[$message_info['status']]?>"></i>
            <?= (isset($message_info['status']) && $message_info['status'] == 1) ? 'Berhasil' : 'Gagal' ?>
          </h4>
        </div>
      </div>
      <div class="modal-body p-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3 text-center">
              <i class="p-2 mb-2 fa-6x fa-fw far <?= $icon_symbol[$message_info['status']]?> <?= $icon_color[$message_info['status']]?>"></i>
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
              <a href="<?= base_url() ?>/penduduk/surat-pengantar-nikah" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
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