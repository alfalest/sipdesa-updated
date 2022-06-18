

    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">
            <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
              <p class="font-weight-bold text-lg m-0">Detail Kartu Keluarga</p>
              </div>
              <div>
              <a href="<?=base_url()?>/operator/data-kartu-keluarga" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              </div>
            </div> 
            </div>
              <div class="card-body">                
         

              <?php $status_perubahan_nik = [  1 => '<span class="badge badge-info">proses</span>', 2 => '<span class="badge badge-success">diterima</span>', 3 => '<span class="badge badge-danger">ditolak</span>']; ?>
              <?php $keterangan_operator = [  1 => '<span class=""><i>Menunggu Proses Verifikasi</i></span>', 2 => '<span class=""><i>Verifikasi diterima, data Anda telah masuk dalam Basis Data</i></span>', 3 => '<span class=""><i>Verifikasi ditolak, Periksa kembali data yang Anda masukan dan ulangi proses dengan lebih teliti</i></span>']; ?>
            <div class="row">
              <div id="kartu_keluarga_list" class="col-12">
                <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                  <div class="d-flex justify-content-between border-bottom pb-2">
                    <div class="d-flex flex-row">
                      <div class="mr-3">
                        
                      </div>
                      <div class="text-sm text-muted"><?= date( 'H:i:s , d-m-Y' , strtotime($data_kartu_keluarga['update_time']))?></div>
                    </div>
                    <div class="">
              
                    </div>
                  </div>
                  <div class="d-flex flex-row py-2">
                  <?php if(isset($data_kartu_keluarga)) : ?>
                    <div class="mr-2" id="kartu_keluarga_foto">
                    <?php if(isset($data_kartu_keluarga['link_foto_kk']) && $data_kartu_keluarga['link_foto_kk'] != '') : ?>
                      <img class="img-size-50" src="<?=base_url()?>/image-content/<?= $data_kartu_keluarga['link_foto_kk'] ?>" alt="<?=$data_kartu_keluarga['nkk']?> <?=$data_kartu_keluarga['nama_kepala_keluarga']?>">
                    <?php else : ?>
                      <img class="img-size-50" src="<?=base_url()?>/images/image_state/no_picture.png" alt="No Picture : <?=$data_kartu_keluarga['nkk']?> <?=$data_kartu_keluarga['nama_kepala_keluarga']?>">
                    <?php endif; ?>
                    </div>
                    <div class="d-flex flex-column">
                      <div class="align-middle text-sm"><a href="<?=base_url()?>/operator/data-kartu-keluarga-lihat/<?=$data_kartu_keluarga['id_master_kk']?>"><span style="letter-spacing:0.15em" class="font-weight-bold"><?=$data_kartu_keluarga['nkk']?></span></a></div>
                      <div class="align-middle text-sm font-weight-bold"><?=$data_kartu_keluarga['nama_kepala_keluarga']?></div>
                      <div class="align-middle text-sm"><?= date( 'd-m-Y' , strtotime($data_kartu_keluarga['tanggal_dikeluarkan'])) ?></div>
                    </div>

                  <?php else : ?>
                    <div class="border border-danger p-2 round-1">
                      <span class="text-danger font-weight-bold">Belum ada kartu keluarga dengan nomor <?= $data_kartu_keluarga['nkk'] ?> yang terverifikasi.</span>
                    </div>
                  <?php endif; ?>

                  </div>
                  <div>
                   <table class="table">
                      <tbody>
                        <tr>
                          <td>Nomor KK</td>
                          <td><span style="letter-spacing:0.15em;" class="font-weight-bold"><?=(isset($data_kartu_keluarga['nkk']))? $data_kartu_keluarga['nkk'] : '' ?></span></td>
                        </tr>
                        <tr>
                          <td>Nama Kepala Keluarga</td>
                          <td><?=(isset($data_kartu_keluarga['nama_kepala_keluarga']))? $data_kartu_keluarga['nama_kepala_keluarga'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Di Keluarkan</td>
                          <td><?=(isset($data_kartu_keluarga['tanggal_dikeluarkan']))? $data_kartu_keluarga['tanggal_dikeluarkan'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td><?=(isset($data_kartu_keluarga['alamat']))? $data_kartu_keluarga['alamat'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>RT/RW</td>
                          <td><?=(isset($data_kartu_keluarga['rt']))? $data_kartu_keluarga['rt'] : '0' ?> / <?=(isset($data_kartu_keluarga['rt']))? $data_kartu_keluarga['rt'] : '0' ?></td>
                        </tr>
                        <tr>
                          <td>Desa/Kelurahan</td>
                          <td><?=(isset($data_kartu_keluarga['kel_desa']))? $data_kartu_keluarga['kel_desa'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Kecamatan</td>
                          <td><?=(isset($data_kartu_keluarga['kecamatan']))? $data_kartu_keluarga['kecamatan'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Kabupaten/Kota</td>
                          <td><?=(isset($data_kartu_keluarga['kab_kota']))? $data_kartu_keluarga['kab_kota'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Provinsi</td>
                          <td><?=(isset($data_kartu_keluarga['provinsi']))? $data_kartu_keluarga['provinsi'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Kode Pos</td>
                          <td><?=(isset($data_kartu_keluarga['kode_pos']))? $data_kartu_keluarga['kode_pos'] : '' ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
              </div>
            </div>
            <div class="card round-1">
            <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
              <p class="font-weight-bold text-lg m-0">Anggota Keluarga</p>
              </div>
              <div>
            
              </div>
            </div> 
            </div>
            <div class="card-body">
            <?php if( isset($data_anggota_keluarga) && count($data_anggota_keluarga) != 0 ) :?>
            <?php $status_tiket = [  1 => '<span class="badge badge-info">menunggu</span>', 2 => '<span class="badge badge-success">hadir</span>', 3 => '<span class="badge badge-danger">tidak hadir</span>']; ?>
           
            <div class="row">
              <div id="kartu_keluarga_list" class="col-12">
                <?php foreach($data_anggota_keluarga as $value) : ?>
                <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                  <div class="d-flex justify-content-between border-bottom pb-2">
                    <div class="d-flex flex-row">
                      <div class="mr-3">
                        
                      </div>
                      <div class="text-sm text-muted"><?= date( 'H:i:s , d-m-Y' , strtotime($value['update_time'])) ?>
                      </div>
                    </div>
                    <div class="">
                      
                      <a href="<?= base_url() ?>/operator/data-penduduk-lihat/<?= $value['id_master_nik'] ?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-eye mr-2"></i> Detail</a>
                   
                    </div>
                  </div>
                    <div class="row text-dark">
                      <div class="col-12 col-lg-6">
                        <div class="row h-100">
                          <div class="col-lg-12 col-6">
                            <span class="text-muted">Nama</span>
                          </div>
                          <div class="col-lg-12 col-6">
                            <span class="text-muted font-weight-bold"><?=$value['nama_lengkap']?></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-lg-6">
                        <div class="row h-100">
                          <div class="col-lg-12 col-6">
                            <span class="text-muted">NIK</span>
                          </div>
                          <div class="col-lg-12 col-6">
                            <span class="text-muted font-weight-bold"><?=$value['nik']?></span>
                          </div>
                        </div>
                        </div>
                        <div class="col-12 col-lg-6">
                          <div class="row h-100">
                            <div class="col-lg-12 col-6">
                              <span class="text-muted">Status Hubungan Keluarga</span>
                            </div>
                            <div class="col-lg-12 col-6">
                              <span class="text-muted font-weight-bold"><?= $value['status_hubungan_dalam_keluarga']?></span>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-12 col-lg-6">
                          <div class="row h-100">
                            <div class="col-6">
                              <span class="text-muted">Tanggal Lahir</span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted font-weight-bold"><?= date( 'd-m-Y' , strtotime($value['tanggal_lahir'])) ?></span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted">Jenis Kelamin</span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted font-weight-bold"><?= $value['jenis_kelamin'] ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-12">
                <div class="d-flex justify-content-center"><?= (isset($pager) ) ? $pager->links('anggota_keluarga', 'sipdesa_pager') : "" ?></div>
              </div>
            </div>
            <?php else : ?>
            <div class="row">
              <div class="col-12">
                <div class="text-center">Belum ada data</div>
              </div>
            </div>
            <?php endif; ?>
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

