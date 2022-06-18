<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <div class="card round-1">
            <div class="card-header">
        <div class="card-title">
          <h5 class="font-weight-bold">Data Penduduk</h5>
        </div>
        <div class="card-tools">
          <div>
          <a href="<?=base_url()?>/operator/kependudukan" class="text-sm btn btn-primary btn-sm rounded-pill">
            <i class="fas fa-times"></i>
          </a>
          </div>
        </div>
      </div>
                <div class="card-body">
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
                                        <input type="text" name="cari" id="cari" class="border-left-0 border-right-0 border-primary bw-2 form-control" value="<?=(isset($inp_val['cari']) && $inp_val['cari'] != '') ? $inp_val['cari'] : '' ?>">
                                        <span class="input-group-append">
                                            <button type="submit" class="border border-left-0 bw-2 border-primary btn-primary btn btn-sm round-1-br round-1-tr">Cari</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <?php if(isset($inp_val['cari']) && $inp_val['cari'] != '') : ?>
                            <div class="mb-3">
                                Pencarian: <a href="<?= base_url() ?>/operator/data-penduduk" class="text-danger"><?= $inp_val['cari'] ?> <i class="fas fa-times"></i></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">

                <?php if(isset($data_penduduk) && count($data_penduduk) != 0) : ?>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>No. KK</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data_penduduk as $keys => $values) : ?>
                        <tr>
                            <td>
                                <a href="<?= base_url() ?>/operator/data-penduduk-lihat/<?= $values['id_master_nik'] ?>" class="text-dark">
                                    <?= $values['nama_lengkap'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>/operator/data-penduduk-lihat/<?= $values['id_master_nik'] ?>" class="text-dark">
                                   <?= $values['nik'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>/operator/data-penduduk-lihat/<?= $values['id_master_nik'] ?>" class="text-dark">
                                   <?= $values['nkk'] ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url() ?>/operator/data-penduduk-lihat/<?= $values['id_master_nik'] ?>" class="text-dark">
                                    <?= $values['alamat'] ?>, RT/RW <?= (isset($values['rt']) && $values['rt'] != '') ? $values['rt'] : 0 ?>/<?= (isset($values['rw']) && $values['rw'] != '') ? $values['rw'] : 0 ?><br>
                                    <?= (isset($values['kel_desa']) && $values['kel_desa'] != '') ? $values['kel_desa'] : '' ?>, <?= (isset($values['kecamatan']) && $values['kecamatan'] != '') ? $values['kecamatan'] : '' ?>, <?= (isset($values['kab_kota']) && $values['kab_kota'] != '') ? $values['kab_kota'] : '' ?>, <?= (isset($values['provinsi']) && $values['provinsi'] != '') ? $values['provinsi'] : '' ?>, <?= (isset($values['kode_pos']) && $values['kode_pos'] != '') ? $values['kode_pos'] : '' ?>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="d-flex justify-content-center"><?= (isset($pager) ) ? $pager->links('data_penduduk', 'sipdesa_pager') : "" ?></div>
        
                <?php else: ?>
                <div class="d-flex text-center">
                    <span>Belum ada data</span>
                </div>
                <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>

                    <!-- DONUT CHART -->
                    <div class="card round-1 collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Jenis Kelamin</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <tr>
                                <td>LAKI-LAKI</td>
                                <td><?= (isset($jml_jenis_kelamin['laki_laki'])) ? $jml_jenis_kelamin['laki_laki'] : 0 ?></td>
                            </tr>
                            <tr>
                                <td>PEREMPUAN</td>
                                <td><?= (isset($jml_jenis_kelamin['perempuan'])) ? $jml_jenis_kelamin['perempuan'] : 0 ?></td>
                            </tr>
                            <tr>
                                <td><b>TOTAL PENDUDUK</b></td>
                                <td><b><?= (isset($jml_jenis_kelamin['perempuan']) && isset($jml_jenis_kelamin['laki_laki'])) ? $jml_jenis_kelamin['perempuan']+$jml_jenis_kelamin['laki_laki'] : 0 ?></b></td>
                            </tr>
                        </table>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>
</div>