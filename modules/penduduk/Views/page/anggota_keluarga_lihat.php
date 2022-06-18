
    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">
            <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
              <p class="font-weight-bold text-lg m-0">Anggota Keluarga</p>
              </div>
              <div>
              <?php if(isset($data_nik['status_perubahan_nik'])) {
                        switch ($data_nik['status_perubahan_nik']) {
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
              <a href="<?=base_url()?>/penduduk/anggota-keluarga<?= (isset($filename)) ? '/'.$filename : '' ?>" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
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
                        <?= $status_perubahan_nik[$data_nik['status_perubahan_nik']] ?>
                      </div>
                      <div class="text-sm text-muted"><?= date( 'H:i:s , d-m-Y' , strtotime($data_nik['update_time']))?></div>
                    </div>
                    <div class="">
                    <?php if($data_nik['status_perubahan_nik'] == 1) : ?>
                      <a href="<?= base_url() ?>/penduduk/anggota-keluarga-edit/<?=$data_nik['id_perubahan_nik']?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-edit"></i> Edit</a>
                    <?php endif; ?>
                    </div>
                  </div>
                  <div class="d-flex flex-row py-2" id="kartu_keluarga_foto">
                    <div class="mr-2">
             
                    </div>
                    <div class="d-flex flex-column">
                      <div class="align-middle text-sm font-weight-bold">Keterangan :</div>

                      <div class="align-middle text-sm"><?=(isset($data_nik['keterangan_operator']) && $data_nik['keterangan_operator'] != '')? $data_nik['keterangan_operator'] : $keterangan_operator[$data_nik['status_perubahan_nik']] ?></div>
                    </div>
                  </div>
                  <div>
                   <table class="table">
                      <tbody>
                        <tr>
                          <td>Nomor KK</td>
                          <td><?=(isset($data_nik['nkk']))? $data_nik['nkk'] : '' ?></td>
                        </tr>
                        <tr>
                          <td>NIK</td>
                          <td><?=(isset($data_nik['nik']))? $data_nik['nik'] : '' ?></td>
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