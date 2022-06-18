
    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">
              <div class="card-body">                
              <div class="row">
                  <div class="col-12 d-flex justify-content-between">
                    <p class="font-weight-bold text-lg m-0">Kartu Keluarga</p>
                    <div>
                      <a href="<?=base_url()?>/penduduk/kartu-keluarga" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                    </div>  
                  </div>
                </div>
              <hr>
              <form action="<?=base_url()?>/penduduk/kartu-keluarga-update" id="kartu_keluarga" method="post" enctype="multipart/form-data">
              <input value="<?=(isset($data_kk['id_perubahan_kk']))? $data_kk['id_perubahan_kk'] : '' ?>" name="id_perubahan_kk" type="hidden"  id="id_perubahan_kk">
              <div class="form-group row">
                <label for="nkk" class="col-lg-4 text-sm text-muted">Nomor Kartu Keluarga</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_kk['nkk']))? $data_kk['nkk'] : '' ?>" name="nkk" type="tel" pattern="[0-9]{16}" max-length="16" id="nkk" alt="Masukan 16 Digit Nomor Kartu Keluarga" title="Masukan 16 Digit Nomor Kartu Keluarga" class="form-control bw-2 border-primary round-1" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama_kepala_keluarga" class="col-lg-4 text-sm text-muted">Nama Kepala Keluarga</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_kk['nama_kepala_keluarga']))? $data_kk['nama_kepala_keluarga'] : '' ?>" name="nama_kepala_keluarga"  type="text" max-length="150" id="nama_kepala_keluarga" title="Masukan Nama Lengkap Sesuai KTP" class="form-control bw-2 border-primary round-1" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="tanggal_dikeluarkan" class="col-lg-4 text-sm text-muted">Tanggal Dikeluarkan</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_kk['tanggal_dikeluarkan']))? $data_kk['tanggal_dikeluarkan'] : '' ?>" name="tanggal_dikeluarkan" type="date" max-length="150" id="tanggal_dikeluarkan" class="form-control bw-2 border-primary round-1" required>
                </div>
              </div>
    
              <div class="form-group row">
                <label for="provinsi" class="col-lg-4 text-sm text-muted">Provinsi</label>
                <div class="col-lg-8">
                  <select name="provinsi" id="provinsi" class="form-control bw-2 border-primary round-1" required>
                  <?php if(isset($data_kk['provinsi'])) :?>
                    <?php if(isset($arr_wilayah['provinsi'])) :?>
                      <?php foreach ($arr_wilayah['provinsi'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_kk['provinsi']) && $data_kk['provinsi'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
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
                  <?php if(isset($data_kk['kab_kota'])) :?>
                    <?php if(isset($arr_wilayah['kab_kota'])) :?>
                      <?php foreach ($arr_wilayah['kab_kota'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_kk['kab_kota']) && $data_kk['kab_kota'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
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
                <?php if(isset($data_kk['kecamatan'])) :?>
                    <?php if(isset($arr_wilayah['kecamatan'])) :?>
                      <?php foreach ($arr_wilayah['kecamatan'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_kk['kecamatan']) && $data_kk['kecamatan'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
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
                  <?php if(isset($data_kk['kel_desa'])) :?>
                    <?php if(isset($arr_wilayah['kel_desa'])) :?>
                      <?php foreach ($arr_wilayah['kel_desa'] as $key => $value) : ?>
                        <option value="<?= $value['kode_wilayah'] ?>" <?=(isset($data_kk['kel_desa']) && $data_kk['kel_desa'] ==  $value['kode_wilayah'])?  'selected' : '' ?>><?= strtoupper($value['nama_wilayah']) ?></option>
                      <?php endforeach; ?>
                    <?php endif;?>
                  <?php endif;?>
                  </select>   
                </div>
              </div>
              <div class="form-group row">
                <label for="alamat" class="col-lg-4 text-sm text-muted">Alamat</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_kk['alamat']))? $data_kk['alamat'] : '' ?>" name="alamat" type="text" max-length="150" id="alamat" class="form-control bw-2 border-primary round-1"  required>
                </div>
              </div>
              <div class="form-group row">
                <label for="rt" class="col-lg-4 text-sm text-muted">RT</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_kk['rt']))? $data_kk['rt'] : '' ?>" name="rt" type="tel" max-length="3" pattern="[0-9]{0}{3}" id="rt" class="form-control bw-2 border-primary round-1"  required>
                </div>
              </div>
              <div class="form-group row">
                <label for="rw" class="col-lg-4 text-sm text-muted">RW</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_kk['rw']))? $data_kk['rw'] : '' ?>" name="rw" type="tel" max-length="3" pattern="[0-9]{0}{3}" id="rw" class="form-control bw-2 border-primary round-1"  required>
                </div>
              </div>
              <div class="form-group row">
                <label for="kode_pos" class="col-lg-4 text-sm text-muted">Kodepos</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_kk['kode_pos']))? $data_kk['kode_pos'] : '' ?>" name="kode_pos" type="tel" max-length="5"  pattern="[0-9]{5}" id="kode_pos" class="form-control bw-2 border-primary round-1">
                </div>
              </div>
              <div class="form-group row">
                <label for="foto_kk" class="col-lg-4 text-sm text-muted">Foto KK</label>
                <div class="col-lg-8">
                  <input name="foto_kk" type="file" accept="image/*" pattern="[0-9]{0}{3}" id="foto_kk" class=" text-sm px-3 form-control-file border bw-2 border-primary round-1" <?=(isset($data_kk['link_foto_kk']) && $data_kk['link_foto_kk'] != '') ? '' : 'required' ?>>
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
                  <a href="<?= base_url() ?>/penduduk/kartu-keluarga" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
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