
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
                      <?php if(isset($data_kk['status_perubahan_kk'])) {
                        switch ($data_kk['status_perubahan_kk']) {
                          case 1:
                            $filename = 'diproses';
                            break;
                          case 2:
                            $filename = 'diterima';
                            break;
                          case 3:
                            $filename = 'ditolak';
                            break;
                                                                           
                          default:
                            break;
                        }
                      }
                      ?>
                      <a href="<?=base_url()?>/penduduk/kartu-keluarga<?= (isset($filename)) ? '/'.$filename : '' ?>" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                    </div>  
                  </div>
                </div>
              <hr>

              <?php $status_perubahan_kk = [  1 => '<span class="badge badge-info">proses</span>', 2 => '<span class="badge badge-success">diterima</span>', 3 => '<span class="badge badge-danger">ditolak</span>']; ?>
              <?php $keterangan_operator = [  1 => '<span class=""><i>Menunggu Proses Verifikasi</i></span>', 2 => '<span class=""><i>Verifikasi diterima, data Anda telah masuk dalam Basis Data</i></span>', 3 => '<span class=""><i>Verifikasi ditolak, Periksa kembali data yang Anda masukan dan ulangi proses dengan lebih teliti</i></span>']; ?>
            <div class="row">
              <div id="kartu_keluarga_list" class="col-12">
                <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                  <div class="d-flex justify-content-between border-bottom pb-2">
                    <div class="d-flex flex-row">
                      <div class="mr-3">
                        <?= $status_perubahan_kk[$data_kk['status_perubahan_kk']] ?>
                      </div>
                      <div class="text-sm text-muted"><?= date( 'H:i:s , d-m-Y' , strtotime($data_kk['update_time']))?></div>
                    </div>
                    <div class="">
                    <?php if($data_kk['status_perubahan_kk'] == 1) : ?>
                      <a href="<?= base_url() ?>/penduduk/kartu-keluarga-edit/<?=$data_kk['id_perubahan_kk']?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-edit"></i> Edit</a>
                    <?php endif; ?>
                    </div>
                  </div>
                  <div class="d-flex flex-row py-2" id="kartu_keluarga_foto">
                    <div class="mr-2">
                    <?php if(isset($data_kk['link_foto_kk']) && $data_kk['link_foto_kk'] != '') : ?>
                      <img class="img-size-50" src="<?=base_url()?>/image-content/<?= $data_kk['link_foto_kk'] ?>" alt="<?=$data_kk['nkk']?> <?=$data_kk['nama_kepala_keluarga']?>">
                    <?php else : ?>
                      <img class="img-size-50" src="<?=base_url()?>/images/image_state/no_picture.png" alt="No Picture : <?=$data_kk['nkk']?> <?=$data_kk['nama_kepala_keluarga']?>">
                    <?php endif; ?>
                    </div>
                    <div class="d-flex flex-column">
                      <div class="align-middle text-sm font-weight-bold">Keterangan :</div>

                      <div class="align-middle text-sm"><?=(isset($data_kk['keterangan_operator']) && $data_kk['keterangan_operator'] != '')? $data_kk['keterangan_operator'] : $keterangan_operator[$data_kk['status_perubahan_kk']] ?></div>
                    </div>
                  </div>
                  <div>
                   <table class="table">
                      <tbody>
                        <tr>
                          <td>Nomor</td>
                          <td><?=(isset($data_kk['nkk']))? $data_kk['nkk'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Nama Kepala Keluarga</td>
                          <td><?=(isset($data_kk['nama_kepala_keluarga']))? $data_kk['nama_kepala_keluarga'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td><?=(isset($data_kk['alamat']))? $data_kk['alamat'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>RT/RW</td>
                          <td><?=(isset($data_kk['rt']))? $data_kk['rt'] : '' ?>/<?=(isset($data_kk['rw']))? $data_kk['rw'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Kode Pos</td>
                          <td><?=(isset($data_kk['kode_pos']))? $data_kk['kode_pos'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>Desa / Kelurahan</td>
                          <td>
                          <?=(isset($data_kk['kel_desa']))? $data_kk['kel_desa'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Kecamatan</td>
                          <td>
                          <?=(isset($data_kk['kecamatan']))? $data_kk['kecamatan'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Kabupaten / Kota</td>
                          <td>
                          <?=(isset($data_kk['kab_kota']))? $data_kk['kab_kota'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Provinsi</td>
                          <td>
                          <?=(isset($data_kk['provinsi']))? $data_kk['provinsi'] : '' ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Dikeluarkan Tanggal</td>
                          <td><?=(isset($data_kk['tanggal_dikeluarkan']))? $data_kk['tanggal_dikeluarkan'] : '' ?></td>
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