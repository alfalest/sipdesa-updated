

    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">
            <div class="card-header">
        <div class="card-title">
          <h5 class="font-weight-bold">Detail Anggota Keluarga</h5>
        </div>
        <div class="card-tools">
          <div>
          <a href="<?=base_url()?>/operator/anggota-keluarga" class="text-sm btn btn-primary btn-sm rounded-pill">
            <i class="fas fa-times"></i>
          </a>
          </div>
        </div>
      </div>
              <div class="card-body px-1 px-sm-2 px-md-3 px-lg-4">     
              <div class="row">
                <div class="col-12">
                  <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                    <div class="d-flex justify-content-between pb-2">
                      <?php if(isset($data_user_pemohon['email'])) : ?>
                      <div class="d-flex flex-column">
                        <span>Pemohon:</span>
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
                        <button type="button" class="btn btn-primary round-1 py-0 px-2 " data-toggle="modal" data-target="#modal_data_diri_pemohon"><i class="fas fa-eye pr-2"></i> Pemohon</button>
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

              <?php $status_perubahan_nik = [  1 => '<span class="badge badge-info">proses</span>', 2 => '<span class="badge badge-success">diterima</span>', 3 => '<span class="badge badge-danger">ditolak</span>']; ?>
              <?php $keterangan_operator = [  1 => '<span class=""><i>Menunggu Proses Verifikasi</i></span>', 2 => '<span class=""><i>Verifikasi diterima, data Anda telah masuk dalam Basis Data</i></span>', 3 => '<span class=""><i>Verifikasi ditolak, Periksa kembali data yang Anda masukan dan ulangi proses dengan lebih teliti</i></span>']; ?>
            <div class="row">
              <div id="kartu_keluarga_list" class="col-12">
                <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                  <div class="d-flex justify-content-between border-bottom pb-2">
                    <div class="d-flex flex-row">
                      <div class="mr-3">
                        <?= $status_perubahan_nik[$data_nik['status_perubahan_nik']] ?>
                      </div>
                      <div class="text-sm text-muted"><?= date( 'H:i:s , d-m-Y' , strtotime($data_nik['update_time']))?></div>
                    </div>
                    <div class="">
                    <?php if($data_nik['status_perubahan_nik'] == 1) : ?>
                      <a href="<?= base_url() ?>/operator/anggota-keluarga-edit/<?=$data_nik['id_perubahan_nik']?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-edit"></i> Verifikasi</a>
                    <?php endif; ?>
                    </div>
                  </div>
                  <div class="d-flex flex-row py-2">
                    <div class="mr-2">
             
                    </div>
                    <div class="d-flex flex-column">
                      <div class="align-middle text-sm font-weight-bold">Keterangan :</div>

                      <div class="align-middle text-sm"><?=(isset($data_nik['keterangan_operator']) && $data_nik['keterangan_operator'] != '')? $data_nik['keterangan_operator'] : $keterangan_operator[$data_nik['status_perubahan_nik']] ?></div>
                    </div>
                  </div>
                  <div class="d-flex flex-row py-2">
                  <?php if(isset($data_kk)) : ?>
                    <div class="mr-2" id="kartu_keluarga_foto">
                    <?php if(isset($data_kk['link_foto_kk']) && $data_kk['link_foto_kk'] != '') : ?>
                      <img class="img-size-50" src="<?=base_url()?>/image-content/<?= $data_kk['link_foto_kk'] ?>" alt="<?=$data_kk['nkk']?> <?=$data_kk['nama_kepala_keluarga']?>">
                    <?php else : ?>
                      <img class="img-size-50" src="<?=base_url()?>/images/image_state/no_picture.png" alt="No Picture : <?=$data_kk['nkk']?> <?=$data_kk['nama_kepala_keluarga']?>">
                    <?php endif; ?>
                    </div>
                    <div class="d-flex flex-column">
                      <div class="align-middle text-sm"><a href="<?=base_url()?>/operator/data-kartu-keluarga-lihat/<?=$data_kk['id_master_kk']?>"><span style="letter-spacing:0.15em" class="font-weight-bold"><?=$data_kk['nkk']?></span></a></div>
                      <div class="align-middle text-sm font-weight-bold"><?=$data_kk['nama_kepala_keluarga']?></div>
                      <div class="align-middle text-sm"><?= date( 'd-m-Y' , strtotime($data_kk['tanggal_dikeluarkan']))?></div>
                    </div>

                  <?php else : ?>
                    <div class="border border-danger p-2 round-1">
                      <span class="text-danger font-weight-bold">Belum ada kartu keluarga dengan nomor <?= $data_nik['nkk'] ?> yang terverifikasi.</span>
                    </div>
                  <?php endif; ?>

                  </div>
                  <div>
                   <table class="table">
                      <tbody>
                        <tr>
                          <td>Nomor KK</td>
                          <td><span style="letter-spacing:0.15em;" class="font-weight-bold"><?=(isset($data_nik['nkk']))? $data_nik['nkk'] : '' ?></span></td>
                        </tr>
                        <tr>
                          <td>NIK</td>
                          <td><span style="letter-spacing:0.15em;" class="font-weight-bold"><?=(isset($data_nik['nik']))? $data_nik['nik'] : '' ?></span></td>
                        </tr>
                        <tr>
                          <td>Nama Lengkap</td>
                          <td><?=(isset($data_nik['nama_lengkap']))? $data_nik['nama_lengkap'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td><?=(isset($data_nik['jenis_kelamin']))? $data_nik['jenis_kelamin'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Tempat, Tgl. Lahir</td>
                          <td><?=(isset($data_nik['tempat_lahir']))? $data_nik['tempat_lahir'] : '' ?>, <?=(isset($data_nik['tanggal_lahir']))? $data_nik['tanggal_lahir'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Gol. Darah</td>
                          <td><?=(isset($data_nik['gol_darah']))? $data_nik['gol_darah'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Agama</td>
                          <td><?=(isset($data_nik['agama']))? $data_nik['agama'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Pendidikan Terakhir</td>
                          <td>
                          <?=(isset($data_nik['pendidikan_terakhir']))? $data_nik['pendidikan_terakhir'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Pekerjaan</td>
                          <td>
                          <?=(isset($data_nik['jenis_pekerjaan']))? $data_nik['jenis_pekerjaan'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Status Perkawinan</td>
                          <td>
                          <?=(isset($data_nik['status_perkawinan']))? $data_nik['status_perkawinan'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Status Hubungan Dalam Keluarga</td>
                          <td>
                          <?=(isset($data_nik['status_hubungan_dalam_keluarga']))? $data_nik['status_hubungan_dalam_keluarga'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Kewarganegaraan</td>
                          <td><?=(isset($data_nik['kewarganegaraan']))? $data_nik['kewarganegaraan'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>No. Paspor</td>
                          <td>
                          <?=(isset($data_nik['no_paspor']))? $data_nik['no_paspor'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>No. KITAP</td>
                          <td>
                          <?=(isset($data_nik['no_kitap']))? $data_nik['no_kitap'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Nama Ayah</td>
                          <td>
                          <?=(isset($data_nik['nama_ayah']))? $data_nik['nama_ayah'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Nama Ibu</td>
                          <td>
                          <?=(isset($data_nik['nama_ibu']))? $data_nik['nama_ibu'] : '' ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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

