
    <!-- Main content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-12 pt-2">
        <div class="card round-1">
          <div class="card-body">
            <div class="row">
              <div class="col-12 d-flex justify-content-between">
                <p class="font-weight-bold text-lg m-0">Anggota Keluarga</p>
                <div>
                  
                  <a href="<?=base_url()?>/penduduk/kependudukan" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                </div>  
              </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-12">
            <div class="py-3 px-1">
            <a href="<?=base_url()?>/penduduk/anggota-keluarga-edit" class="btn btn-primary btn-sm rounded-pill"><i class="mr-2 fas fa-plus"></i> Tambah Anggota Keluarga</a>

            </div>
            </div>
            </div>
            <div class="row">
              <div class="col-4">
                <a class="border shadow-sm btn btn-block round-1 mb-2 <?= (isset($status_anggota_keluarga_state) && $status_anggota_keluarga_state == 1 ) ? 'btn-primary' : 'btn-light text-primary '?>" href="<?= base_url() ?>/penduduk/anggota-keluarga/diproses">
                  Diproses <i class="fas fa-angle-right"></i>
                </a>
              </div>
              <div class="col-4">
                <a class="border shadow-sm btn btn-block round-1 mb-2 <?= (isset($status_anggota_keluarga_state) && $status_anggota_keluarga_state == 2 ) ? 'btn-primary' : 'btn-light text-primary '?>" href="<?= base_url() ?>/penduduk/anggota-keluarga/diterima">
                  Diterima <i class="fas fa-angle-right"></i>
                </a>
              </div>
              <div class="col-4">
                <a class="border shadow-sm btn btn-block round-1 mb-2 <?= (isset($status_anggota_keluarga_state) && $status_anggota_keluarga_state == 3 ) ? 'btn-primary' : 'btn-light text-primary '?>" href="<?= base_url() ?>/penduduk/anggota-keluarga/ditolak">
                  Ditolak <i class="fas fa-angle-right"></i>
                </a>
              </div>
            </div>
            <br>
            <?php if( isset($nik_proses) && count($nik_proses) ) :?>
            <?php $status_perubahan_nik = [  1 => '<span class="badge badge-info">proses</span>', 2 => '<span class="badge badge-success">diterima</span>', 3 => '<span class="badge badge-danger">ditolak</span>']; ?>
            <div class="row">
              <div id="kartu_keluarga_list" class="col-12">
                <?php foreach($nik_proses as $value) : ?>
                <div class="position-relative border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                <?php if($value['belum_dilihat'] == 1) : ?>
                  <div class="position-absolute" style="top:-8px; left:-8px;">
                    <a href="<?=base_url()?>/penduduk/anggota-keluarga-lihat/<?=$value['id_perubahan_nik']?>">
                      <span class=""><i class="fas fa-circle text-orange"></i> </span>
                    </a>
                  </div>
                  <?php endif; ?>
                  <div class="d-flex justify-content-between border-bottom pb-2">
                    <div class="d-flex flex-row">
                      <div class="mr-3">
                        <?= $status_perubahan_nik[$value['status_perubahan_nik']] ?>
                      </div>
                      <div class="text-sm text-muted"><?= date( 'H:i:s , d-m-Y' , strtotime($value['update_time']))?></div>
                    </div>
                    <div class="">
                    <?php if($value['status_perubahan_nik'] == 1) : ?>
                      <a href="<?= base_url() ?>/penduduk/anggota-keluarga-edit/<?=$value['id_perubahan_nik']?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-edit"></i> Edit</a>
                    <?php endif; ?>
                    </div>
                  </div>
                  <div class="d-flex flex-row pt-2">
                    <div class="mr-2">
  
                    </div>
                    <div class="d-flex flex-column">
                      <div class="align-middle text-sm"><a href="<?=base_url()?>/penduduk/anggota-keluarga-lihat/<?=$value['id_perubahan_nik']?>"><?=$value['nik']?></a></div>
                      <div class="align-middle text-sm font-weight-bold"><?=$value['nama_lengkap']?></div>
                      <div class="align-middle text-sm "><?=strtoupper($arr_kode_kata['status_hubungan_dalam_keluarga'][$value['status_hubungan_dalam_keluarga']])?></div>
                      <div class="align-middle text-sm"><?= date( 'd-m-Y' , strtotime($value['tanggal_lahir']))?></div>
                    </div>
                  </div>
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
                <div class="d-flex justify-content-center"><?= (isset($pager) ) ? $pager->links('nik_proses', 'sipdesa_pager') : "" ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->