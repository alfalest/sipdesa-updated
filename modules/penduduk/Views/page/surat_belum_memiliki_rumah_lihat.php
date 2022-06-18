<!-- Main content -->
<div class="container">
  <div class="row">
    <div class="col-12 pt-2">
      <div class="card round-1">
        <div class="card-header pr-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="font-weight-bold text-lg m-0">Detail Surat Keterangan Belum Memiliki Rumah</p>
            </div>
            <div>
              <?php if (isset($data_surat_belum_memiliki_rumah['status_surat_belum_memiliki_rumah'])) {
                switch ($data_surat_belum_memiliki_rumah['status_surat_belum_memiliki_rumah']) {
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
              <a href="<?= base_url() ?>/penduduk/surat-belum-memiliki-rumah<?= (isset($filename)) ? '/' . $filename : '' ?>" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <?php $status_surat_belum_memiliki_rumah = [1 => '<span class="badge badge-info">proses</span>', 2 => '<span class="badge badge-success">diterima</span>', 3 => '<span class="badge badge-danger">ditolak</span>']; ?>
          <?php $keterangan_operator = [1 => '<span class=""><i>Menunggu Proses Verifikasi</i></span>', 2 => '<span class=""><i>Verifikasi diterima, data Anda telah masuk dalam Basis Data</i></span>', 3 => '<span class=""><i>Verifikasi ditolak, Periksa kembali data yang Anda masukan dan ulangi proses dengan lebih teliti</i></span>']; ?>
          <div class="row">
            <div class="col-12">
              <div class="border shadow-sm round-1 mb-3 p-2">
                <div class="d-flex justify-content-between border-bottom pb-2">
                  <div class="d-flex flex-row">
                    <div class="mr-3">
                      <?= $status_surat_belum_memiliki_rumah[$data_surat_belum_memiliki_rumah['status_surat_belum_memiliki_rumah']] ?>
                    </div>
                    <div class="text-sm text-muted"><?= date('H:i:s , d-m-Y', strtotime($data_surat_belum_memiliki_rumah['update_time'])) ?></div>
                  </div>
                  <div class="">
                    <?php if ($data_surat_belum_memiliki_rumah['status_surat_belum_memiliki_rumah'] == 1) : ?>
                      <a href="<?= base_url() ?>/penduduk/surat-belum-memiliki-rumah-edit/<?= $data_surat_belum_memiliki_rumah['id_surat_belum_memiliki_rumah'] ?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-edit"></i> Edit</a>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="">
                  <div class="align-middle text-sm font-weight-bold">Keterangan :</div>
                  <div class="align-middle text-sm"><?= (isset($data_surat_belum_memiliki_rumah['keterangan_operator']) && $data_surat_belum_memiliki_rumah['keterangan_operator'] != '') ? $data_surat_belum_memiliki_rumah['keterangan_operator'] : $keterangan_operator[$data_surat_belum_memiliki_rumah['status_surat_belum_memiliki_rumah']] ?></div>
                </div>
                <div class="col-12">
                  <hr>
                  <div class="p-3 text-md font-weight-bold">Data Pelapor</div>
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Nama Pelapor</td>
                        <td><?= (isset($data_surat_belum_memiliki_rumah['nama_belum_memiliki_rumah'])) ? $data_surat_belum_memiliki_rumah['nama_belum_memiliki_rumah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td><?= (isset($data_surat_belum_memiliki_rumah['jenis_kelamin_belum_memiliki_rumah'])) ? $data_surat_belum_memiliki_rumah['jenis_kelamin_belum_memiliki_rumah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir</td>
                        <td><?= (isset($data_surat_belum_memiliki_rumah['tempat_lahir_belum_memiliki_rumah'])) ? $data_surat_belum_memiliki_rumah['tempat_lahir_belum_memiliki_rumah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir</td>
                        <td><?= (isset($data_surat_belum_memiliki_rumah['tanggal_lahir_belum_memiliki_rumah'])) ? $data_surat_belum_memiliki_rumah['tanggal_lahir_belum_memiliki_rumah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Kewarganegaraan</td>
                        <td><?= (isset($data_surat_belum_memiliki_rumah['kewarganegaraan_belum_memiliki_rumah'])) ? $data_surat_belum_memiliki_rumah['kewarganegaraan_belum_memiliki_rumah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td><?= (isset($data_surat_belum_memiliki_rumah['agama_belum_memiliki_rumah'])) ? $data_surat_belum_memiliki_rumah['agama_belum_memiliki_rumah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Pekerjaan</td>
                        <td><?= (isset($data_surat_belum_memiliki_rumah['pekerjaan_belum_memiliki_rumah'])) ? $data_surat_belum_memiliki_rumah['pekerjaan_belum_memiliki_rumah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td><?= (isset($data_surat_belum_memiliki_rumah['alamat_belum_memiliki_rumah'])) ? $data_surat_belum_memiliki_rumah['alamat_belum_memiliki_rumah'] : '' ?></td>
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

<?php if (isset($message_info)) :
  $icon_color = ['text-danger', 'text-success'];
  $icon_symbol = ['fa-times-circle', 'fa-check-circle'];
?>
  <div class="modal fade" id="modal_message_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content round-1">
        <div class="modal-body p-0">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 p-3 text-center">
                <i class="p-2 mb-2 fa-6x fa-fw far <?= $icon_symbol[$message_info['status']] ?> <?= $icon_color[$message_info['status']] ?>"></i>
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