
    <!-- Main content -->
    <section class="content">
      <div class="container">
      <div class="row">
      <div class="col-12 pt-2">
         <div class="card round-1">
         <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
              <p class="font-weight-bold text-lg m-0">Data Diri</p>
              </div>
              <div>
              <a href="<?=base_url()?>/operator" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              </div>
            </div> 
            </div>
         <div class="card-body">
          <div class="row">
              <div class="col-12">
              <a href="<?=base_url()?>/operator/data-diri-edit" class="btn-sm px-3 btn btn-primary rounded-pill"><i class="fas fa-edit mr-3"></i> Edit</a>
              </div>
          </div>
          <hr>
               
                <div class="row" id="foto_diri_ktp">
                  <div class="col-12">
                  <div class="row">
                  <div class="col-7 py-2">
                    <span class="text-sm text-muted">Foto Diri</span>
                    <p class="text-sm m-0 pr-2">Foto membantu mempersonalisasikan akun Anda</p>
                  </div>
                    <div class="col-5 py-2 ">
                      <div class="float-right">
                        <?php if(isset($data_diri['link_foto_diri']) && $data_diri['link_foto_diri'] != '') : ?>
                          <img class="profile-user-img img-fluid" src="<?=base_url()?>/image-content/<?= $data_diri['link_foto_diri'] ?>" alt="User profile picture">
                        <?php else : ?>
                          <img class="profile-user-img img-fluid" src="<?=base_url()?>/images/no_picture.png" alt="User profile picture">
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="col-12">
                  <div class="row">
                  <div class="col-7 py-2">
                    <span class="text-sm text-muted">Foto KTP</span>
                    <p class="text-sm m-0 pr-2">Foto KTP membantu proses verifikasi akun Anda untuk proses pelayanan</p>
                  </div>
                    <div class="col-5 py-2">
                    <div class="float-right">
                      <?php if(isset($data_diri['link_foto_ktp']) && $data_diri['link_foto_ktp'] != '') : ?>
                        <img class="profile-user-img img-fluid" src="<?=base_url()?>/image-content/<?= $data_diri['link_foto_ktp'] ?>" alt="User profile picture">
                      <?php else : ?>
                        <img class="profile-user-img img-fluid" src="<?=base_url()?>/images/no_picture.png" alt="User profile picture">
                      <?php endif; ?>
                    </div>
                      
                    </div>
                  </div>
                  </div>
                </div>
                
</div></div>
<div class="card round-1">
<div class="card-body">



                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">NIK</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['nik'])) ? $data_diri['nik'] : '' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Nama</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['nama_lengkap'])) ? $data_diri['nama_lengkap'] : '' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Tempat/Tgl Lahir</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['tempat_lahir'])) ? $data_diri['tempat_lahir'] : '' ?> , <?=(isset($data_diri['tanggal_lahir'])) ? date( 'd-m-Y', strtotime($data_diri['tanggal_lahir'])) : '' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Jenis kelamin</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['jenis_kelamin'])) ? $data_diri['jenis_kelamin'] : '' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Gol. Darah</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['gol_darah'])) ? $data_diri['gol_darah'] : '' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Agama</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['agama'])) ? $data_diri['agama'] : '' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Status Perkawinan</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['status_perkawinan'])) ? $data_diri['status_perkawinan'] : '' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Pekerjaan</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['jenis_pekerjaan'])) ? $data_diri['jenis_pekerjaan'] : '' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Kewarganegaraan</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['kewarganegaraan'])) ? $data_diri['kewarganegaraan'] : '' ?></p></div></div>
              </div>
         </div>
      <div class="card round-1">
        <div class="card-body">
        <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">No. Telepon</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['telepon'])) ? $data_diri['telepon'] : '' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Alamat</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['alamat'])) ? $data_diri['alamat'] : '' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">RT/RW</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['rt'])) ? $data_diri['rt'] : '0' ?>/<?=(isset($data_diri['rw'])) ? $data_diri['rw'] : '0' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Kel/Desa</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['kel_desa'])) ? $data_diri['kel_desa'] : '' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Kecamatan</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['kecamatan'])) ? $data_diri['kecamatan'] : '' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Kab/Kota</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['kab_kota'])) ? $data_diri['kab_kota'] : '' ?></p></div></div>
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Provinsi</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['provinsi'])) ? $data_diri['provinsi'] : '' ?></p></div></div>    
                <hr>
                <div class="row"><div class="col-lg-4"><span class="text-sm text-muted">Kodepos</span></div>
                <div class="col-lg-8"><p class="text-md m-0"><?=(isset($data_diri['kode_pos'])) ? $data_diri['kode_pos'] : '' ?></p></div></div>
                <hr>       
        </div>
      </div>
      </div>
      </div>

      </div><!-- /.container-fluid -->
    </section>
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
                <p class=""><?= (isset($message_info['text'])) ? $message_info['text'] : '' ?></p>
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