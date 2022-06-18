
    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">
              <div class="card-body">                
              <div class="row">
                  <div class="col-12 d-flex justify-content-between">
                    <p class="font-weight-bold text-lg m-0">Edit Data Diri</p>
                    <div>
                      <a href="<?=base_url()?>/penduduk/data-diri" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                    </div>  
                  </div>
                </div>
              <hr>
              <form action="<?=base_url()?>/penduduk/data-diri-update" id="data_diri" method="post" enctype="multipart/form-data">

              <div class="form-group row">
                <label for="nik" class="col-lg-4 text-sm text-muted">NIK</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_diri['nik']))? $data_diri['nik'] : '' ?>" name="nik" type="tel" pattern="[0-9]{16}" max-length="16" id="nik" alt="Masukan 16 Digit Nomor Induk Kependudukan (NIK)" title="Masukan 16 Digit Nomor Induk Kependudukan (NIK)" class="form-control bw-2 border-primary round-1" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_lengkap" class="col-lg-4 text-sm text-muted">Nama Lengkap</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_diri['nama_lengkap']))? $data_diri['nama_lengkap'] : '' ?>" name="nama_lengkap"  type="text" max-length="150" id="nama_lengkap" title="Masukan Nama Lengkap Sesuai KTP" class="form-control bw-2 border-primary round-1" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="jenis_kelamin" class="col-lg-4 text-sm text-muted">Jenis Kelamin</label>
                <div class="col-lg-8">
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control bw-2 border-primary round-1" required>
                  <?php if(isset($arr_kode_kata['jenis_kelamin'])) :?>
                    <?php foreach ($arr_kode_kata['jenis_kelamin'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_diri['jenis_kelamin']) && $data_diri['jenis_kelamin'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="gol_darah" class="col-lg-4 text-sm text-muted">Gol. Darah</label>
                <div class="col-lg-8">
                  <select name="gol_darah" id="gol_darah" class="form-control bw-2 border-primary round-1" required>
                  <?php if(isset($arr_kode_kata['gol_darah'])) :?>
                    <?php foreach ($arr_kode_kata['gol_darah'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_diri['gol_darah']) && $data_diri['gol_darah'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="tempat_lahir" class="col-lg-4 text-sm text-muted">Tempat Lahir</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_diri['tempat_lahir']))? $data_diri['tempat_lahir'] : '' ?>" name="tempat_lahir"  type="text" max-length="150"id="tempat_lahir" title="Masukan Tempat Lahir Sesuai KTP" class="form-control bw-2 border-primary round-1" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="tanggal_lahir" class="col-lg-4 text-sm text-muted">Tanggal Lahir</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_diri['tanggal_lahir']))? $data_diri['tanggal_lahir'] : '' ?>" name="tanggal_lahir" type="date" max-length="150" id="tanggal_lahir" class="form-control bw-2 border-primary round-1" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="agama" class="col-lg-4 text-sm text-muted">Agama</label>
                <div class="col-lg-8">
                  <select name="agama" id="agama" class="form-control bw-2 border-primary round-1" required>
                  <?php if(isset($arr_kode_kata['agama'])) :?>
                      <?php foreach ($arr_kode_kata['agama'] as $key => $value) : ?>
                        <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_diri['agama']) && $data_diri['agama'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="jenis_pekerjaan" class="col-lg-4 text-sm text-muted">Pekerjaan</label>
                <div class="col-lg-8">
                  <select name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control bw-2 border-primary round-1">
                    <?php if(isset($arr_kode_kata['jenis_pekerjaan'])) :?>
                      <?php foreach ($arr_kode_kata['jenis_pekerjaan'] as $key => $value) : ?>
                        <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_diri['jenis_pekerjaan']) && $data_diri['jenis_pekerjaan'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="status_perkawinan" class="col-lg-4 text-sm text-muted">Status Perkawinan</label>
                <div class="col-lg-8">
                  <select name="status_perkawinan" id="status_perkawinan" class="form-control bw-2 border-primary round-1"  required>
                  <?php if(isset($arr_kode_kata['status_perkawinan'])) :?>
                    <?php foreach ($arr_kode_kata['status_perkawinan'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_diri['status_perkawinan']) && $data_diri['status_perkawinan'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                </div>
              </div>
             
              <div class="form-group row">
                <label for="kewarganegaraan" class="col-lg-4 text-sm text-muted">Kewarganegaraan</label>
                <div class="col-lg-8">
                  <select name="kewarganegaraan" id="kewarganegaraan" class="form-control bw-2 border-primary round-1  <?= (isset($invalid_info['kewarganegaraan'])) ? 'is-invalid' : '' ?>" required>
                  <?php if(isset($arr_kode_kata['kewarganegaraan'])) :?>
                    <?php foreach ($arr_kode_kata['kewarganegaraan'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_diri['kewarganegaraan']))?  (($data_diri['kewarganegaraan'] ==  $value['nomor_kode']) ? 'selected' : '') : (($value['nomor_kode'] == 100) ? 'selected'  : '') ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['kewarganegaraan'])) ? $invalid_info['kewarganegaraan'] : '' ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="provinsi" class="col-lg-4 text-sm text-muted">Provinsi</label>
                <div class="col-lg-8">
                  <select name="provinsi" id="provinsi" class="form-control bw-2 border-primary round-1" required>
                  <?php if(isset($data_diri['provinsi'])) :?>
                    <?php if(isset($arr_wilayah['provinsi'])) :?>
                      <?php foreach ($arr_wilayah['provinsi'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_diri['provinsi']) && $data_diri['provinsi'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="kab_kota" class="col-lg-4 text-sm text-muted">Kabupaten/Kota</label>
                <div class="col-lg-8">
                <select name="kab_kota" id="kab_kota" class="form-control bw-2 border-primary round-1" required>
                  <?php if(isset($data_diri['kab_kota'])) :?>
                    <?php if(isset($arr_wilayah['kab_kota'])) :?>
                      <?php foreach ($arr_wilayah['kab_kota'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_diri['kab_kota']) && $data_diri['kab_kota'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                </select>
                </div>
                </div>
              <div class="form-group row">
                <label for="kecamatan" class="col-lg-4 text-sm text-muted">Kecamatan</label>
                <div class="col-lg-8">
                <select name="kecamatan" id="kecamatan" class="form-control bw-2 border-primary round-1" required>
                <?php if(isset($data_diri['kecamatan'])) :?>
                    <?php if(isset($arr_wilayah['kecamatan'])) :?>
                      <?php foreach ($arr_wilayah['kecamatan'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_diri['kecamatan']) && $data_diri['kecamatan'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                </select>
                </div>
                </div>
              <div class="form-group row">
                <label for="kel_desa" class="col-lg-4 text-sm text-muted">Desa/Kelurahan</label>
                <div class="col-lg-8">
                  <select name="kel_desa" id="kel_desa" class="form-control bw-2 border-primary round-1"  required>
                  <?php if(isset($data_diri['kel_desa'])) :?>
                    <?php if(isset($arr_wilayah['kel_desa'])) :?>
                      <?php foreach ($arr_wilayah['kel_desa'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_diri['kel_desa']) && $data_diri['kel_desa'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                  </select>   
                </div>
              </div>
              <div class="form-group row">
                <label for="alamat" class="col-lg-4 text-sm text-muted">Alamat</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_diri['alamat']))? $data_diri['alamat'] : '' ?>" name="alamat" type="text" max-length="150" id="alamat" class="form-control bw-2 border-primary round-1"  required>
                </div>
              </div>
              <div class="form-group row">
                <label for="rt" class="col-lg-4 text-sm text-muted">RT</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_diri['rt']))? $data_diri['rt'] : '' ?>" name="rt" type="tel" max-length="3" pattern="[0-9]{0}{3}" id="rt" class="form-control bw-2 border-primary round-1"  required>
                </div>
              </div>
              <div class="form-group row">
                <label for="rw" class="col-lg-4 text-sm text-muted">RW</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_diri['rw']))? $data_diri['rw'] : '' ?>" name="rw" type="tel" max-length="3" pattern="[0-9]{0}{3}" id="rw" class="form-control bw-2 border-primary round-1"  required>
                </div>
              </div>
              <div class="form-group row">
                <label for="kode_pos" class="col-lg-4 text-sm text-muted">Kodepos</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_diri['kode_pos']))? $data_diri['kode_pos'] : '' ?>" name="kode_pos" type="tel" max-length="5"  pattern="[0-9]{5}" id="kode_pos" class="form-control bw-2 border-primary round-1">
                </div>
              </div>
              <div class="form-group row">
                <label for="telepon" class="col-lg-4 text-sm text-muted">No. Telepon</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_diri['telepon']))? $data_diri['telepon'] : '' ?>" name="telepon" type="tel" max-length="15" id="telepon" class="form-control bw-2 border-primary round-1"  required>
                </div>
              </div>
              <div class="form-group row">
                <label for="foto_ktp" class="col-lg-4 text-sm text-muted">Foto KTP</label>
                <div class="col-lg-8">
                  <input name="foto_ktp" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_ktp" class=" text-sm px-3 form-control-file border bw-2 border-primary round-1" <?=(isset($data_diri['link_foto_ktp']) && $data_diri['link_foto_ktp'] != '') ? '' : 'required' ?>>
                </div>
              </div>
              <div class="form-group row">
                <label for="foto_diri" class="col-lg-4 text-sm text-muted">Foto Diri</label>
                <div class="col-lg-8">
                  <input name="foto_diri" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_diri" class=" text-sm px-3 form-control-file border bw-2 border-primary round-1"  <?=(isset($data_diri['link_foto_diri']) && $data_diri['link_foto_diri'] != '') ? '' : 'required' ?>>
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

    <?php if(isset($message_info)) : 
  $icon_color = ['text-danger', 'text-success' ]; 
  $icon_symbol = ['fa-times-circle', 'fa-check-circle' ]; 
?>
<div class="modal fade" id="modal_message_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content round-1">
      <div class="modal-body p-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3 text-center">
              <i class="p-2 mb-2 fa-6x fa-fw far <?= $icon_symbol[$message_info['status']]?> <?= $icon_color[$message_info['status']]?>"></i>
              <h4 class="font-weight-bold"><?= (isset($message_info['status']) && $message_info['status'] == 1) ? 'Berhasil' : 'Gagal' ?></h4>
                <p class="text-break"><?= (isset($message_info['text'])) ? $message_info['text'] : '' ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-12 border-top bw-2 p-3 text-center">
              <div class="row">
                <div class="col-6">
                  <a href="<?= base_url() ?>/register" class="font-weight-bold btn-block btn-primary btn round-1" data-dismiss="modal">KEMBALI</a>
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