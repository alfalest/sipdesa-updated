
    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">
            <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
              <p class="font-weight-bold text-lg m-0">Detail Tiket</p>
              </div>
              <div>
              <a href="<?=base_url()?>/penduduk/tiket-undangan" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              </div>
            </div> 
            </div>
              <div class="card-body px-2 px-md-3 px-lg-4">   
              <div class="row">
                <div class="col-12">
                <div class="row">
                <div class="col-12 mb-2">
                  <span class="text-muted">
                  Silahkan datang dan tunjukan nomor tiket kepada petugas kami.
                  </span>
                </div>
                </div>
                      <div class="border shadow-sm round-1 mb-3 p-2">
                        <div class="row">
                          <div class="col-12 pb-3"><span class="">Nomor Tiket<span></div>
                          <div class="col-12 text-center">
                         <div class="d-flex justify-content-center">
                         <div class="shadow-sm border bw-2 border-success text-center round-1 font-weight-bold text-xl text-success py-2 px-5">
                          <?= $data_tiket['nomor_tiket'] ?>
                          </div>
                         </div>
                           
                         
                          </div>
                        </div>
                        <hr>
                      <div class="row">
                          <div class="col-5">Dibuat</div>
                          <div class="col-7">
                          <span class="font-weight-bold">
                          <?= date( 'd-m-Y, H:i' ,strtotime($data_tiket['create_time'])) ?>
                          </span>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-5">Jenis Tiket</div>
                          <div class="col-7">
                          <span class="font-weight-bold">
                          <?= str_replace('_', ' ',ucfirst($data_tiket['jenis_tiket'])) ?>
                          </span>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-5">Keterangan Operator</div>
                          <div class="col-7">
                          <span class="font-weight-bold">
                          <?= (isset($data_tiket['keterangan_tiket']) && $data_tiket['keterangan_tiket'] != '') ? $data_tiket['keterangan_tiket'] : '-' ?>
                          </span>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-5">Dijadwalkan</div>
                          <div class="col-7">
                          <span class="font-weight-bold">
                          <?php if(isset($data_tiket['dijadwalkan']) && is_array($data_tiket['dijadwalkan']) && count($data_tiket['dijadwalkan'])) :?>
                              <?= $data_tiket['dijadwalkan']['hari'] ?>, <?= $data_tiket['dijadwalkan']['tanggal'] ?> <?= $data_tiket['dijadwalkan']['bulan'] ?> <?= $data_tiket['dijadwalkan']['tahun'] ?>
                              <?= (isset( $data_tiket['waktu_mulai_tiket']) && $data_tiket['waktu_mulai_tiket'] != null) ? '<br>Pukul: '.substr($data_tiket['waktu_mulai_tiket'], 0, -3) : '' ?>
                              <?= (isset( $data_tiket['waktu_selesai_tiket']) && $data_tiket['waktu_selesai_tiket'] != null) ? ' - '.substr($data_tiket['waktu_selesai_tiket'], 0, -3) : '' ?>
                          <?php else : ?>
                          -
                          <?php endif; ?>
                          </span>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 text-center">
                            
                              <a href="<?= base_url() ?>/penduduk/<?=  $data_tiket['filename_surat'] ?>/<?= $data_tiket['id_surat']?>" class="round-1 btn btn-block btn-light text-indigo">
                                <i class="fas fa-file-alt mr-3"></i>
                                <span class="font-weight-bold text-indigo text-md">
                          <?= str_replace('_', ' ',ucfirst($data_tiket['jenis_tiket'])) ?>
                          </span>
                              </a>
                              <br>
                            </div>
                        </div>
                      </div>
                </div>
              </div>

                
                <div class="row">
                <div class="col-12">
                  <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                    <div class="d-flex justify-content-between pb-2">
                      <?php if(isset($data_user_pemohon['email'])) : ?>
                      <div class="d-flex flex-column">
                        <span>Data diri:</span>
                        <span class="font-weight-bold"><?= $data_user_pemohon['nama_alias'] ?></span>
                        <span class="font-weight-bold text-muted"><?= $data_user_pemohon['email'] ?></span>
                      </div>
                      <?php else : ?>
                        <div class="d-flex flex-row">
                          <span class="font-weight-bold text-danger">Error: Hubungi pengembang aplikasi jika anda melihat tulisan ini</span>
                        </div>
                      <?php endif; ?>
                      <?php if(isset($data_diri_pemohon['id_data_diri'])) : ?>
                      <div class="d-flex flex-column">
                        <button type="button" class="btn btn-primary round-1 py-0 px-2 " data-toggle="modal" data-target="#modal_data_diri_pemohon"><i class="fas fa-eye pr-2"></i> Lihat</button>
                      </div>
                      <?php else : ?>
                        <div class="d-flex flex-row">
                          <span class="font-weight-bold text-danger">Pemohon belum melengkapi data diri</span>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">

                <?php if(isset($data_tiket['status_tiket'])) : ?>
                    <div class="row">
                      <div class="col-12">
                        <span class="font-weight-bold text-muted">Detail Kehadiran</span><br>
                        <?php
                          $status_kehadiran = ['Tidak diketahui','Menunggu', 'Hadir', 'Tidak Hadir']
                        ?>
                      </div>
                    </div>                      
                      <?php if(isset($data_tiket['waktu_kehadiran']) && is_array($data_tiket['waktu_kehadiran'])) : ?>
                        <div class="row">
                          <div class="col-6">Status</div>
                          <div class="col-6">
                          <span class="font-weight-bold">
                          <?= (isset($data_tiket['status_tiket'])) ? $status_kehadiran[$data_tiket['status_tiket']] : '' ?>
                          </span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">Hari</div>
                          <div class="col-6">
                          <span class="font-weight-bold">
                          <?= $data_tiket['waktu_kehadiran']['hari'] ?>
                          </span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">Tanggal</div>
                          <div class="col-6">
                          <span class="font-weight-bold">
                          <?= $data_tiket['waktu_kehadiran']['tanggal'].' '.$data_tiket['waktu_kehadiran']['bulan'].' '.$data_tiket['waktu_kehadiran']['tahun']  ?>
                          </span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-6">Jam</div>
                          <div class="col-6">
                          <span class="font-weight-bold">
                          <?= $data_tiket['waktu_kehadiran']['jam'].':'.$data_tiket['waktu_kehadiran']['menit'] ?>
                          <span>
                          </div>
                        </div>
                        
                      <?php else : ?>
                      <div class="row">
                        <div class="col-12">
                          <pre>Anda belum hadir</pre>
                        </div>
                      </div>
                      <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>
              <hr>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->

    <!-- /.content -->


    <?php if(isset($data_diri_pemohon['id_data_diri'])) : 
  $icon_color = ['text-danger', 'text-success' ]; 
  $icon_symbol = ['fa-times-circle', 'fa-check-circle' ]; 
?>
<div class="modal fade" id="modal_data_diri_pemohon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
    <div class="modal-content round-1">
    <div class="modal-header border-bottom bw-2 p-0">
    <div class="container-fluid">
    <div class="row">
            <div class="col-12 p-3 text-center">
              Data Diri Pemohon
            </div>
          </div>
    </div>
    </div>
      <div class="modal-body p-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3">
              <div class="d-flex flex-row py-2" id="data_diri_foto">
                <div class="mr-2 d-flex flex-column">
                    <?php if(isset($data_diri_pemohon['link_foto_ktp']) && $data_diri_pemohon['link_foto_ktp'] != '') : ?>
                      <img class="img-size-50" src="<?=base_url()?>/image-content/<?= $data_diri_pemohon['link_foto_ktp'] ?>" alt="<?=$data_diri_pemohon['nik']?> <?=$data_diri_pemohon['nama_lengkap']?>">
                    <?php else : ?>
                      <img class="img-size-50" src="<?=base_url()?>/images/image_state/no_picture.png" alt="No Picture : <?=$data_diri_pemohon['nik']?> <?=$data_diri_pemohon['nama_lengkap']?>">
                    <?php endif; ?>
                      <span>KTP</span>
                </div>
                <div class="mr-2 d-flex flex-column">
                    <?php if(isset($data_diri_pemohon['link_foto_diri']) && $data_diri_pemohon['link_foto_diri'] != '') : ?>
                      <img class="img-size-50" src="<?=base_url()?>/image-content/<?= $data_diri_pemohon['link_foto_diri'] ?>" alt="<?=$data_diri_pemohon['nik']?> <?=$data_diri_pemohon['nama_lengkap']?>">
                    <?php else : ?>
                      <img class="img-size-50" src="<?=base_url()?>/images/image_state/no_picture.png" alt="No Picture : <?=$data_diri_pemohon['nik']?> <?=$data_diri_pemohon['nama_lengkap']?>">
                    <?php endif; ?>
                    <span>Foto Diri</span>
                </div>
              </div>
              <table class="table">
              <tbody>
                <tr><td>Nama</td><td><?= $data_diri_pemohon['nama_lengkap'] ?></td></tr>
                <tr><td>Telepon</td><td><?= $data_diri_pemohon['telepon'] ?></td></tr>
                <tr><td>Email</td><td><?= $data_user_pemohon['email'] ?></td></tr>
                <tr><td>NIK</td><td><?= $data_diri_pemohon['nik'] ?></td></tr>
                <tr><td>Jenis Kelamin</td><td><?= $data_diri_pemohon['jenis_kelamin'] ?></td></tr>
                <tr><td>Gol. Darah</td><td><?= $data_diri_pemohon['gol_darah'] ?></td></tr>
                <tr><td>Tempat, Tgl. Lahir</td><td><?= $data_diri_pemohon['tempat_lahir'] ?>, <?= $data_diri_pemohon['tanggal_lahir'] ?></td></tr>
                <tr><td>Agama</td><td><?= $data_diri_pemohon['agama'] ?></td></tr>
                <tr><td>Pekerjaan</td><td><?= $data_diri_pemohon['jenis_pekerjaan'] ?></td></tr>
                <tr><td>Status Perkawinan</td><td><?= $data_diri_pemohon['status_perkawinan'] ?></td></tr>
                <tr><td>Kewarganegaraan</td><td><?= $data_diri_pemohon['kewarganegaraan'] ?></td></tr>
                <tr><td>Alamat</td><td><?= $data_diri_pemohon['alamat'] ?></td></tr>
                <tr><td>RT/RW</td><td><?= $data_diri_pemohon['rt'] ?>/<?= $data_diri_pemohon['rw'] ?></td></tr>
                <tr><td>Desa/Kelurahan</td><td><?= $data_diri_pemohon['kel_desa'] ?></td></tr>
                <tr><td>Kecamatan</td><td><?= $data_diri_pemohon['kecamatan'] ?></td></tr>
                <tr><td>Kota/Kabupaten</td><td><?= $data_diri_pemohon['kab_kota'] ?></td></tr>
                <tr><td>Provinsi</td><td><?= $data_diri_pemohon['provinsi'] ?></td></tr>
                <tr><td>Kode Pos</td><td><?= $data_diri_pemohon['kode_pos'] ?></td></tr>
              </tbody>
            </table>
            </div>
          </div>
         
        </div>
      </div>
      <div class="modal-footer p-0 border-top bw-2 ">
      <div class="container-fluid">
      <div class="row">
            <div class="col-12 p-3 text-center">
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
