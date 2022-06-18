
    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">
              <div class="card-body">                
              <div class="row">
                  <div class="col-12 d-flex justify-content-between">
                    <p class="font-weight-bold text-lg m-0">Anggota Keluarga</p>
                    <div>
                      <a href="<?=base_url()?>/penduduk/anggota-keluarga" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                    </div>  
                  </div>
                </div>
              <hr>
              <form action="<?=base_url()?>/penduduk/anggota-keluarga-update" id="kartu_keluarga" method="post" enctype="multipart/form-data">
              <input value="<?=(isset($data_nik['id_perubahan_nik']))? $data_nik['id_perubahan_nik'] : '' ?>" name="id_perubahan_nik" type="hidden"  id="id_perubahan_nik">
              <div class="form-group row">
                <label for="nkk" class="col-lg-4 text-sm text-muted">Nomor Kartu Keluarga</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_nik['nkk']))? $data_nik['nkk'] : '' ?>" name="nkk" type="tel" pattern="[0-9]{16}" max-length="16" id="nkk" alt="Masukan 16 Digit Nomor Kartu Keluarga" title="Masukan 16 Digit Nomor Kartu Keluarga" class="form-control bw-2 border-primary round-1" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="nik" class="col-lg-4 text-sm text-muted">NIK</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_nik['nik']))? $data_nik['nik'] : '' ?>" name="nik" type="tel" pattern="[0-9]{16}" max-length="16" id="nik" alt="Masukan 16 Digit Nomor Kartu Keluarga" title="Masukan 16 Digit Nomor Kartu Keluarga" class="form-control bw-2 border-primary round-1" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_lengkap" class="col-lg-4 text-sm text-muted">Nama Lengkap</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_nik['nama_lengkap']))? $data_nik['nama_lengkap'] : '' ?>" name="nama_lengkap"  type="text" max-length="150" id="nama_lengkap" title="Masukan Nama Lengkap Sesuai KTP" class="form-control bw-2 border-primary round-1" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="jenis_kelamin" class="col-lg-4 text-sm text-muted">Jenis Kelamin</label>
                <div class="col-lg-8">
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control bw-2 border-primary round-1" required>
                  <?php if(isset($arr_kode_kata['jenis_kelamin'])) :?>
                    <?php foreach ($arr_kode_kata['jenis_kelamin'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_nik['jenis_kelamin']) && $data_nik['jenis_kelamin'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
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
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_nik['gol_darah']) && $data_nik['gol_darah'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="tempat_lahir" class="col-lg-4 text-sm text-muted">Tempat Lahir</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_nik['tempat_lahir']))? $data_nik['tempat_lahir'] : '' ?>" name="tempat_lahir"  type="text" max-length="150"id="tempat_lahir" title="Masukan Tempat Lahir Sesuai KTP" class="form-control bw-2 border-primary round-1" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="tanggal_lahir" class="col-lg-4 text-sm text-muted">Tanggal Lahir</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_nik['tanggal_lahir']))? $data_nik['tanggal_lahir'] : '' ?>" name="tanggal_lahir" type="date" max-length="150" id="tanggal_lahir" title="Masukan Tanggal Lahir" class="form-control bw-2 border-primary round-1" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="agama" class="col-lg-4 text-sm text-muted">Agama</label>
                <div class="col-lg-8">
                  <select name="agama" id="agama" class="form-control bw-2 border-primary round-1" required>
                  <?php if(isset($arr_kode_kata['agama'])) :?>
                      <?php foreach ($arr_kode_kata['agama'] as $key => $value) : ?>
                        <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_nik['agama']) && $data_nik['agama'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="pendidikan_terakhir" class="col-lg-4 text-sm text-muted">Pendidikan Terakhir</label>
                <div class="col-lg-8">
                  <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control bw-2 border-primary round-1">
                    <?php if(isset($arr_kode_kata['pendidikan_terakhir'])) :?>
                      <?php foreach ($arr_kode_kata['pendidikan_terakhir'] as $key => $value) : ?>
                        <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_nik['pendidikan_terakhir']) && $data_nik['pendidikan_terakhir'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
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
                        <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_nik['jenis_pekerjaan']) && $data_nik['jenis_pekerjaan'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
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
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_nik['status_perkawinan']) && $data_nik['status_perkawinan'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="status_hubungan_dalam_keluarga" class="col-lg-4 text-sm text-muted">Status hubungan dalam keluarga</label>
                <div class="col-lg-8">
                  <select name="status_hubungan_dalam_keluarga" id="status_hubungan_dalam_keluarga" class="form-control bw-2 border-primary round-1"  required>
                  <?php if(isset($arr_kode_kata['status_hubungan_dalam_keluarga'])) :?>
                    <?php foreach ($arr_kode_kata['status_hubungan_dalam_keluarga'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_nik['status_hubungan_dalam_keluarga']) && $data_nik['status_hubungan_dalam_keluarga'] ==  $value['nomor_kode'])?  'selected' : '' ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="kewarganegaraan" class="col-lg-4 text-sm text-muted">Kewarganegaraan</label>
                <div class="col-lg-8">
                  <select name="kewarganegaraan" id="kewarganegaraan" class="form-control bw-2 round-1  <?= (isset($invalid_info['kewarganegaraan'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <?php if(isset($arr_kode_kata['kewarganegaraan'])) :?>
                    <?php foreach ($arr_kode_kata['kewarganegaraan'] as $key => $value) : ?>
                      <option value="<?= $value['nomor_kode'] ?>" <?=(isset($data_nik['kewarganegaraan']))?  (($data_nik['kewarganegaraan'] ==  $value['nomor_kode']) ? 'selected' : '') : (($value['nomor_kode'] == 100) ? 'selected'  : '') ?>><?= strtoupper($value['tampilan_kata']) ?></option>
                    <?php endforeach; ?>
                  <?php endif;?>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['kewarganegaraan'])) ? $invalid_info['kewarganegaraan'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label for="no_paspor" class="col-lg-4 text-sm text-muted">No. Paspor</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_nik['no_paspor']))? $data_nik['no_paspor'] : '' ?>" name="no_paspor" type="text" max-length="100" id="no_paspor" title="Masukan Nomor Paspor" class="form-control bw-2 border-primary round-1">
                </div>
              </div>
              <div class="form-group row">
                <label for="no_kitap" class="col-lg-4 text-sm text-muted">No. KITAP</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_nik['no_kitap']))? $data_nik['no_kitap'] : '' ?>" name="no_kitap" type="text" max-length="100" id="no_kitap" title="Masukan Nomor Kitap" class="form-control bw-2 border-primary round-1">
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_ayah" class="col-lg-4 text-sm text-muted">Nama Ayah</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_nik['nama_ayah']))? $data_nik['nama_ayah'] : '' ?>" name="nama_ayah" type="text" max-length="100" id="nama_ayah" title="Masukan Nama Ayah" class="form-control bw-2 border-primary round-1"  required>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_ibu" class="col-lg-4 text-sm text-muted">Nama Ibu</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_nik['nama_ibu']))? $data_nik['nama_ibu'] : '' ?>" name="nama_ibu" type="text" max-length="100" id="nama_ibu" title="Masukan Nama Ibu" class="form-control bw-2 border-primary round-1"  required>
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
                  <a href="<?= base_url() ?>/penduduk/anggota-keluarga" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
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