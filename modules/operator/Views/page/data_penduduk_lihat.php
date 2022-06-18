

    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">
            <div class="card-header">
        <div class="card-title">
          <h5 class="font-weight-bold">Detail Penduduk</h5>
        </div>
        <div class="card-tools">
          <div>
          <a href="<?=base_url()?>/operator/data-penduduk" class="text-sm btn btn-primary btn-sm rounded-pill">
            <i class="fas fa-times"></i>
          </a>
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
                      <div class="text-sm text-muted"><?= date( 'H:i:s , d-m-Y' , strtotime($data_penduduk['update_time']))?></div>
                    </div>
                    <div class="">
              
                    </div>
                  </div>
                  <div class="d-flex flex-row py-2">
                  <?php if(isset($data_penduduk)) : ?>
                    <div class="mr-2" id="kartu_keluarga_foto">
                    <?php if(isset($data_penduduk['link_foto_kk']) && $data_penduduk['link_foto_kk'] != '') : ?>
                      <img class="img-size-50" src="<?=base_url()?>/image-content/<?= $data_penduduk['link_foto_kk'] ?>" alt="<?=$data_penduduk['nkk']?> <?=$data_penduduk['nama_kepala_keluarga']?>">
                    <?php else : ?>
                      <img class="img-size-50" src="<?=base_url()?>/images/image_state/no_picture.png" alt="No Picture : <?=$data_penduduk['nkk']?> <?=$data_penduduk['nama_kepala_keluarga']?>">
                    <?php endif; ?>
                    </div>
                    <div class="d-flex flex-column">
                      <div class="align-middle text-sm"><a href="<?=base_url()?>/operator/data-kartu-keluarga-lihat/<?=$data_penduduk['id_master_kk']?>"><span style="letter-spacing:0.15em" class="font-weight-bold"><?=$data_penduduk['nkk']?></span></a></div>
                      <div class="align-middle text-sm font-weight-bold"><?=$data_penduduk['nama_kepala_keluarga']?></div>
                      <div class="align-middle text-sm"><?= date( 'd-m-Y' , strtotime($data_penduduk['tanggal_dikeluarkan'])) ?></div>
                    </div>

                  <?php else : ?>
                    <div class="border border-danger p-2 round-1">
                      <span class="text-danger font-weight-bold">Belum ada kartu keluarga dengan nomor <?= $data_penduduk['nkk'] ?> yang terverifikasi.</span>
                    </div>
                  <?php endif; ?>

                  </div>
                  <div>
                   <table class="table">
                      <tbody>
                        <tr>
                          <td>Nomor KK</td>
                          <td><span style="letter-spacing:0.15em;" class="font-weight-bold"><?=(isset($data_penduduk['nkk']))? $data_penduduk['nkk'] : '' ?></span></td>
                        </tr>
                        <tr>
                          <td>NIK</td>
                          <td><span style="letter-spacing:0.15em;" class="font-weight-bold"><?=(isset($data_penduduk['nik']))? $data_penduduk['nik'] : '' ?></span></td>
                        </tr>
                        <tr>
                          <td>Nama Lengkap</td>
                          <td><?=(isset($data_penduduk['nama_lengkap']))? $data_penduduk['nama_lengkap'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Tempat, Tgl. Lahir</td>
                          <td><?=(isset($data_penduduk['tempat_lahir']))? $data_penduduk['tempat_lahir'] : '' ?>, <?=(isset($data_penduduk['tanggal_lahir']))? date( 'd-m-Y' , strtotime($data_penduduk['tanggal_lahir'])) : '' ?></td>
                        </tr>
                        <tr>
                          <td>Umur</td>
                          <td><?=(isset($data_penduduk['umur']))? $data_penduduk['umur']['tahun'].' Tahun, '.$data_penduduk['umur']['bulan'].' Bulan, '.$data_penduduk['umur']['hari'].' hari' : '0' ?></td>
                        </tr>
                        <tr>
                          <td>Gol. Darah</td>
                          <td><?=(isset($data_penduduk['gol_darah']))? $data_penduduk['gol_darah'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td><?=(isset($data_penduduk['jenis_kelamin']))? $data_penduduk['jenis_kelamin'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Pendidikan Terakhir</td>
                          <td>
                          <?=(isset($data_penduduk['pendidikan_terakhir']))? $data_penduduk['pendidikan_terakhir'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Pekerjaan</td>
                          <td>
                          <?=(isset($data_penduduk['jenis_pekerjaan']))? $data_penduduk['jenis_pekerjaan'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Status Perkawinan</td>
                          <td>
                          <?=(isset($data_penduduk['status_perkawinan']))? $data_penduduk['status_perkawinan'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Status Hubungan Dalam Keluarga</td>
                          <td>
                          <?=(isset($data_penduduk['status_hubungan_dalam_keluarga']))? $data_penduduk['status_hubungan_dalam_keluarga'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Kewarganegaraan</td>
                          <td><?=(isset($data_penduduk['kewarganegaraan']))? $data_penduduk['kewarganegaraan'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>No. Paspor</td>
                          <td>
                          <?=(isset($data_penduduk['no_paspor']))? $data_penduduk['no_paspor'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>No. KITAP</td>
                          <td>
                          <?=(isset($data_penduduk['no_kitap']))? $data_penduduk['no_kitap'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Nama Ayah</td>
                          <td>
                          <?=(isset($data_penduduk['nama_ayah']))? $data_penduduk['nama_ayah'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Nama Ibu</td>
                          <td>
                          <?=(isset($data_penduduk['nama_ibu']))? $data_penduduk['nama_ibu'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td><?=(isset($data_penduduk['alamat']))? $data_penduduk['alamat'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>RT/RW</td>
                          <td><?=(isset($data_penduduk['rt']))? $data_penduduk['rt'] : '0' ?> / <?=(isset($data_penduduk['rt']))? $data_penduduk['rt'] : '0' ?></td>
                        </tr>
                        <tr>
                          <td>Desa/Kelurahan</td>
                          <td><?=(isset($data_penduduk['kel_desa']))? $data_penduduk['kel_desa'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Kecamatan</td>
                          <td><?=(isset($data_penduduk['kecamatan']))? $data_penduduk['kecamatan'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Kabupaten/Kota</td>
                          <td><?=(isset($data_penduduk['kab_kota']))? $data_penduduk['kab_kota'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Provinsi</td>
                          <td><?=(isset($data_penduduk['provinsi']))? $data_penduduk['provinsi'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Kode Pos</td>
                          <td><?=(isset($data_penduduk['kode_pos']))? $data_penduduk['kode_pos'] : '' ?></td>
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

