<!-- Main content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-12 pt-2">
        <div class="card round-1">
          <div class="card-body px-1 px-sm-2 px-md-3 px-lg-4">
            <div class="row">
              <div class="col-12 d-flex justify-content-between">
                <p class="font-weight-bold text-lg m-0">Surat Pengantar Keterangan Catatan Kepolisian</p>
                <div>
                  <a href="<?= base_url() ?>/operator/layanan-surat" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-12">
                <div class="pb-3 px-1">
                  <?php if (isset($data_informasi_layanan['informasi_layanan']) && $data_informasi_layanan['informasi_layanan'] != '') : ?>
                    <button type="button" class="px-3 btn btn-info btn-sm rounded-pill font-weight-bold" data-toggle="modal" data-target="#modal_informasi_layanan"><i class="fas fa-info pr-2"></i> INFORMASI</button>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  <form action="" method="get">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent border border-right-0 bw-2 border-primary round-1-bl round-1-tl">
                          <i class="fas fa-search text-primary"></i>
                        </span>
                      </div>
                      <input type="text" name="cari" id="cari" class="border-left-0 border-right-0 border-primary bw-2 form-control" value="<?= (isset($inp_val['cari']) && $inp_val['cari'] != '') ? $inp_val['cari'] : '' ?>">
                      <span class="input-group-append">
                        <button type="submit" class="border border-left-0 bw-2 border-primary btn-primary btn btn-sm round-1-br round-1-tr">Cari</button>
                      </span>
                    </div>
                  </form>
                </div>
                <?php if (isset($inp_val['cari']) && $inp_val['cari'] != '') : ?>
                  <div class="mb-3">
                    Pencarian: <a href="<?= base_url() ?>/operator/surat-catatan-kepolisian" class="text-danger"><?= $inp_val['cari'] ?> <i class="fas fa-times"></i></a>
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="d-flex justify-content-between">
                  <a class="border shadow-sm btn btn-block btn-light my-0 mx-1 round-1 text-primary" href="<?= base_url() ?>/operator/surat-catatan-kepolisian/diproses">
                    Diproses <i class="fas fa-angle-right"></i>
                  </a>
                  <a class="border shadow-sm btn btn-block btn-light  my-0 mx-1 round-1 text-primary" href="<?= base_url() ?>/operator/surat-catatan-kepolisian/diterima">
                    Diterima <i class="fas fa-angle-right"></i>
                  </a>
                  <a class="border shadow-sm btn btn-block btn-light  my-0 mx-1 round-1 text-primary" href="<?= base_url() ?>/operator/surat-catatan-kepolisian/ditolak">
                    Ditolak <i class="fas fa-angle-right"></i>
                  </a>
                </div>
              </div>
            </div>
            <br>
            <?php if (isset($kk_proses) && count($kk_proses)) : ?>
              <?php $status_surat_catatan_kepolisian = [1 => '<span class="badge badge-info">proses</span>', 2 => '<span class="badge badge-success">diterima</span>', 3 => '<span class="badge badge-danger">ditolak</span>']; ?>
              <div class="row">
                <div id="kartu_keluarga_list" class="col-12">
                  <?php foreach ($kk_proses as $value) : ?>
                    <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                      <div class="d-flex justify-content-between border-bottom pb-2">
                        <div class="d-flex flex-row">
                          <div class="mr-3">
                            <?= $status_surat_catatan_kepolisian[$value['status_surat_catatan_kepolisian']] ?>
                          </div>
                          <div class="text-sm text-muted"><?= date('H:i:s , d-m-Y', strtotime($value['update_time'])) ?></div>
                        </div>
                        <div class="">
                          <?php if ($value['status_surat_catatan_kepolisian'] == 1) : ?>
                            <a href="<?= base_url() ?>/operator/surat-catatan-kepolisian-lihat/<?= $value['id_surat_catatan_kepolisian'] ?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-eye mr-2"></i> Lihat</a>

                          <?php elseif ($value['status_surat_catatan_kepolisian'] == 2) : ?>
                            <a href="<?= base_url() ?>/operator/surat-catatan-kepolisian-editor/<?= $value['id_surat_catatan_kepolisian'] ?>" class="px-3 py-0 btn btn-sm bg-indigo round-1 text-sm"><i class="fas fa-print mr-2"></i> Redaksi Editor</a>
                          <?php endif; ?>
                        </div>
                      </div>
                      <a href="<?= base_url() ?>/operator/surat-catatan-kepolisian-lihat/<?= $value['id_surat_catatan_kepolisian'] ?>">
                        <div class="row text-dark">
                          <div class="col-6 col-lg-3 mb-1">
                            <span class="text-muted font-weight-bold">Nama Pelapor</span><br>
                            <?= $value['nama_catatan_kepolisian'] ?>
                          </div>
                          <div class="col-6 col-lg-3 mb-1">
                            <span class="text-muted font-weight-bold">Tempat/Tanggal Lahir</span><br>
                            <?= $value['tempat_lahir_catatan_kepolisian'] ?>/<?= $value['tanggal_lahir_catatan_kepolisian'] ?>
                          </div>
                          <div class="col-6 col-lg-3 mb-1">
                            <span class="text-muted font-weight-bold">Alamat Pelapor</span><br>
                            <?= $value['alamat_catatan_kepolisian'] ?>
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