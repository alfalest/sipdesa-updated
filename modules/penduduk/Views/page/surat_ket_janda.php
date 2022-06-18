<!-- Main content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-12 pt-2">
        <div class="card round-1">
          <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
                <p class="font-weight-bold text-lg m-0">Surat Keterangan Janda</p>
              </div>
              <div>
                <a href="<?= base_url() ?>/penduduk/layanan-surat" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              </div>
            </div>
          </div>
          <div class="card-body px-1 px-sm-2 px-md-3 px-lg-4">
            <div class="row">
              <div class="col-12">
                <div class="pb-3 px-1">
                  <a href="<?= base_url() ?>/penduduk/surat-ket-janda-edit" class="px-3 btn btn-primary btn-sm rounded-pill"><i class="mr-2 fas fa-plus"></i>Surat Baru</a>
                  <?php if (isset($data_informasi_layanan['informasi_layanan']) && $data_informasi_layanan['informasi_layanan'] != '') : ?>
                    <button type="button" class="px-3 btn btn-info btn-sm rounded-pill font-weight-bold" data-toggle="modal" data-target="#modal_informasi_layanan"><i class="fas fa-info pr-2"></i> INFORMASI</button>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <a class="border shadow-sm btn btn-block round-1 mb-2 <?= (isset($status_state) && $status_state == 1) ? 'btn-primary' : 'btn-light text-primary ' ?>" href="<?= base_url() ?>/penduduk/surat-ket-janda/diproses">
                  Diproses <i class="fas fa-angle-right"></i>
                </a>
              </div>
              <div class="col-4">
                <a class="border shadow-sm btn btn-block round-1 mb-2 <?= (isset($status_state) && $status_state == 2) ? 'btn-primary' : 'btn-light text-primary ' ?>" href="<?= base_url() ?>/penduduk/surat-ket-janda/diterima">
                  Diterima <i class="fas fa-angle-right"></i>
                </a>
              </div>
              <div class="col-4">
                <a class="border shadow-sm btn btn-block round-1 mb-2 <?= (isset($status_state) && $status_state == 3) ? 'btn-primary' : 'btn-light text-primary ' ?>" href="<?= base_url() ?>/penduduk/surat-ket-janda/ditolak">
                  Ditolak <i class="fas fa-angle-right"></i>
                </a>
              </div>
            </div>
            <br>
            <?php if (isset($kk_proses) && count($kk_proses)) : ?>
              <?php $status_surat_ket_janda = [1 => '<span class="badge badge-info">proses</span>', 2 => '<span class="badge badge-success">diterima</span>', 3 => '<span class="badge badge-danger">ditolak</span>']; ?>
              <div class="row">
                <div id="kartu_keluarga_list" class="col-12">
                  <?php foreach ($kk_proses as $value) : ?>
                    <div class="position-relative border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                      <?php if ($value['belum_dilihat'] == 1) : ?>
                        <div class="position-absolute" style="top:-8px; left:-8px;">
                          <a href="<?= base_url() ?>/penduduk/surat-ket-janda/<?= $value['id_surat_ket_janda'] ?>">
                            <span class=""><i class="fas fa-circle text-orange"></i> </span>
                          </a>
                        </div>
                      <?php endif; ?>
                      <div class="d-flex justify-content-between border-bottom pb-2">
                        <div class="d-flex flex-row">
                          <div class="mr-3">
                            <?= $status_surat_ket_janda[$value['status_surat_ket_janda']] ?>
                          </div>
                          <div class="text-sm text-muted"><?= date('H:i:s , d-m-Y', strtotime($value['update_time'])) ?></div>
                        </div>
                        <div class="">
                          <?php if ($value['status_surat_ket_janda'] == 1) : ?>
                            <a href="<?= base_url() ?>/penduduk/surat-ket-janda-edit/<?= $value['id_surat_ket_janda'] ?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-edit"></i> Edit</a>
                          <?php endif; ?>
                        </div>
                      </div>
                      <a href="<?= base_url() ?>/penduduk/surat-ket-janda-lihat/<?= $value['id_surat_ket_janda'] ?>">
                        <div class="row text-dark">
                          <div class="col-6 col-lg-3 mb-1">
                            <span class="text-muted font-weight-bold">Nama Pelapor</span>
                            <p>Nama : <?= $value['nama_ket_janda'] ?></p>
                          </div>
                        </div>
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php else : ?>
              <div class="row">
                <div class="col-12">
                  <div class="text-center">Belum ada data</div>
                </div>
              </div>
            <?php endif; ?>
            <br>
            <div class="row">
              <div class="col-12">
                <div class="d-flex justify-content-center"><?= (isset($pager)) ? $pager->links('sk', 'sipdesa_pager') : "" ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


<?php if (isset($data_informasi_layanan['informasi_layanan']) && $data_informasi_layanan['informasi_layanan'] != '') :
  $icon_color = ['text-danger', 'text-success'];
  $icon_symbol = ['fa-times-circle', 'fa-check-circle'];
?>
  <div class="modal fade" id="modal_informasi_layanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
      <div class="modal-content round-1">
        <div class="modal-header">
          <div class="modal-title">
            <h4 class="">
              <i class="mr-2 fas fa-info text-info"></i>
              Informasi
            </h4>
          </div>
        </div>
        <div class="modal-body p-0">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 p-3">

                <?= $data_informasi_layanan['informasi_layanan'] ?>

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