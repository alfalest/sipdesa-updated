<!-- Main content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-12 pt-2">
        <div class="card round-1">
          <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
                <p class="font-weight-bold text-lg m-0">Tiket Pelayanan</p>
              </div>
              <div>
                <a href="<?= base_url() ?>/penduduk/layanan-surat" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              </div>
            </div>
          </div>
          <div class="card-body px-1 px-sm-2 px-md-3 px-lg-4">
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
                      <input type="text" name="cari" id="cari" class="border-left-0 border-right-0 border-primary bw-2 form-control" value="<?= (isset($inp_val['cari']) && $inp_val['cari'] != '') ? esc($inp_val['cari']) : '' ?>">
                      <span class="input-group-append">
                        <button type="submit" class="border border-left-0 bw-2 border-primary btn-primary btn btn-sm round-1-br round-1-tr">Cari</button>
                      </span>
                    </div>
                  </form>
                </div>
                <?php if (isset($inp_val['cari']) && $inp_val['cari'] != '') : ?>
                  <div class="mb-3">
                    Pencarian: <a href="<?= base_url() ?>/penduduk/tiket-undangan" class="text-danger"><?= $inp_val['cari'] ?> <i class="fas fa-times"></i></a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-lg-3">
                <a class="border shadow-sm btn btn-block round-1 mb-2 <?= (isset($status_tiket_state) && $status_tiket_state == 4) ? 'btn-primary' : 'btn-light text-primary ' ?>" href="<?= base_url() ?>/penduduk/tiket-undangan/hari-ini">
                  Hari ini <i class="fas fa-angle-right"></i>
                </a>
              </div>
              <div class="col-6 col-lg-3">
                <a class="border shadow-sm btn btn-block round-1 mb-2 <?= (isset($status_tiket_state) && $status_tiket_state == 1) ? 'btn-primary' : 'btn-light text-primary ' ?>" href="<?= base_url() ?>/penduduk/tiket-undangan/menunggu">
                  Menunggu <i class="fas fa-angle-right"></i>
                </a>
              </div>
              <div class="col-6 col-lg-3">
                <a class="border shadow-sm btn btn-block round-1 mb-2 <?= (isset($status_tiket_state) && $status_tiket_state == 2) ? 'btn-primary' : 'btn-light text-primary ' ?>" href="<?= base_url() ?>/penduduk/tiket-undangan/hadir">
                  Hadir <i class="fas fa-angle-right"></i>
                </a>
              </div>
              <div class="col-6 col-lg-3">
                <a class="border shadow-sm btn btn-block round-1 mb-2 <?= (isset($status_tiket_state) && $status_tiket_state == 3) ? 'btn-primary' : 'btn-light text-primary ' ?>" href="<?= base_url() ?>/penduduk/tiket-undangan/tidak-hadir">
                  Tidak Hadir <i class="fas fa-angle-right"></i>
                </a>
              </div>
            </div>
            <br>
            <?php if (isset($kk_proses) && count($kk_proses)) : ?>
              <?php $status_tiket = [1 => '<span class="badge badge-info">menunggu</span>', 2 => '<span class="badge badge-success">hadir</span>', 3 => '<span class="badge badge-danger">tidak hadir</span>']; ?>
              <div class="row">
                <div id="kartu_keluarga_list" class="col-12">
                  <?php foreach ($kk_proses as $value) : ?>
                    <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                      <div class="d-flex justify-content-between border-bottom pb-2">
                        <div class="d-flex flex-row">
                          <div class="mr-3">
                            <?= $status_tiket[$value['status_tiket']] ?>
                          </div>
                          <div class="text-sm text-muted"><?= date('H:i:s , d-m-Y', strtotime($value['update_time'])) ?>
                          </div>
                        </div>
                        <div class="">
                          <?php if ($value['status_tiket'] == 1) : ?>
                            <a href="<?= base_url() ?>/penduduk/tiket-undangan-lihat/<?= $value['id_tiket'] ?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-eye mr-2"></i> Lihat</a>
                          <?php endif; ?>
                        </div>
                      </div>
                      <a href="<?= base_url() ?>/penduduk/tiket-undangan-lihat/<?= $value['id_tiket'] ?>">
                        <div class="row text-dark">
                          <div class="col-12 col-lg-6">
                            <div class="row h-100">
                              <div class="col-lg-12 col-6">
                                <span class="text-muted">Nomor Tiket</span>
                              </div>
                              <div class="col-lg-12 col-6">
                                <span class="text-success font-weight-bold text-lg"><?= $value['nomor_tiket'] ?></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-lg-6">
                            <div class="row h-100">
                              <div class="col-lg-12 col-6">
                                <span class="text-muted">Pemohon</span>
                              </div>
                              <div class="col-lg-12 col-6">
                                <span class="text-muted font-weight-bold"><?= $value['nama_alias'] ?></span> <span>&lt;<?= $value['email'] ?>&gt;</span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-lg-6">
                            <div class="row h-100">
                              <div class="col-lg-12 col-6">
                                <span class="text-muted">Pelayanan</span>
                              </div>
                              <div class="col-lg-12 col-6">
                                <span class="text-muted font-weight-bold"><?= str_replace("_", " ", ucfirst($value['jenis_tiket'])) ?></span>
                              </div>
                            </div>
                          </div>
                          <?php if ($value['tanggal_kunjungan_tiket'] != NULL) : ?>
                            <div class="col-12 col-lg-6">
                              <div class="row h-100">
                                <?php if ($value['tanggal_kunjungan_tiket'] != NULL) : ?>
                                  <div class="col-6">
                                    <span class="text-muted">Dijadwalkan</span>
                                  </div>
                                  <div class="col-6">
                                    <span class="text-muted font-weight-bold"><?= date('d-m-Y', strtotime($value['tanggal_kunjungan_tiket'])) ?></span>
                                  </div>
                                <?php endif; ?>
                                <?php if ($value['waktu_mulai_tiket'] != NULL) : ?>
                                  <div class="col-6">
                                    <span class="text-muted">Pukul</span>
                                  </div>
                                  <div class="col-6">
                                    <span class="text-muted font-weight-bold"><?= substr($value['waktu_mulai_tiket'], 0, -3) ?><?= ($value['waktu_selesai_tiket'] != NULL) ? ' - ' . substr($value['waktu_selesai_tiket'], 0, -3) : '' ?></span>
                                  </div>
                                <?php endif; ?>
                              </div>
                            </div>
                          <?php endif; ?>
                        </div>
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-12">
                  <div class="d-flex justify-content-center"><?= (isset($pager)) ? $pager->links('sk', 'sipdesa_pager') : "" ?></div>
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
</section>
<!-- /.content -->