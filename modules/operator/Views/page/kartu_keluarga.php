
    <!-- Main content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-12 pt-2">
        <div class="card round-1">
        <div class="card-header">
        <div class="card-title">
          <h5 class="font-weight-bold">Kartu Keluarga</h5>
        </div>
        <div class="card-tools">
          <div>
          <a href="<?=base_url()?>/operator/kependudukan" class="text-sm btn btn-primary btn-sm rounded-pill">
            <i class="fas fa-times"></i>
          </a>
          </div>
        </div>
      </div>
          <div class="card-body px-1 px-sm-2 px-md-3 px-lg-4">
            <div class="row">
              <div class="col-12">
                <div class="d-flex justify-content-between">
                  <a class="border shadow-sm btn btn-block btn-light my-0 mx-1 round-1 text-primary" href="<?= base_url() ?>/operator/kartu-keluarga/diproses">
                    Diproses <i class="fas fa-angle-right"></i>
                  </a>
                  <a class="border shadow-sm btn btn-block btn-light  my-0 mx-1 round-1 text-primary" href="<?= base_url() ?>/operator/kartu-keluarga/diterima">
                    Diterima <i class="fas fa-angle-right"></i>
                  </a>
                  <a class="border shadow-sm btn btn-block btn-light  my-0 mx-1 round-1 text-primary" href="<?= base_url() ?>/operator/kartu-keluarga/ditolak">
                    Ditolak <i class="fas fa-angle-right"></i>
                  </a>
                </div>
              </div>
            </div>
            <br>
            <?php if( isset($kk_proses) && count($kk_proses) ) :?>
            <?php $status_perubahan_kk = [  1 => '<span class="badge badge-info">proses</span>', 2 => '<span class="badge badge-success">diterima</span>', 3 => '<span class="badge badge-danger">ditolak</span>']; ?>
            <div class="row">
              <div id="kartu_keluarga_list_op" class="col-12">
                <?php foreach($kk_proses as $value) : ?>
                <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                  <div class="d-flex justify-content-between border-bottom pb-2">
                    <div class="d-flex flex-row">
                      <div class="mr-3">
                        <?= $status_perubahan_kk[$value['status_perubahan_kk']] ?>
                      </div>
                      <div class="text-sm text-muted"><?= date( 'H:i:s , d-m-Y' , strtotime($value['update_time']))?></div>
                    </div>
                    <div class="">
                    <?php if($value['status_perubahan_kk'] == 1) : ?>
                      <a href="<?= base_url() ?>/operator/kartu-keluarga-lihat/<?=$value['id_perubahan_kk']?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-eye"></i> Lihat</a>
                    <?php endif; ?>
                    </div>
                  </div>
                  <div class="d-flex flex-row pt-2">
                    <div class="mr-2">
                    <?php if(isset($value['link_foto_kk']) && $value['link_foto_kk'] != '') : ?>
                      <img class="img-size-50" src="<?=base_url()?>/image-content/<?= $value['link_foto_kk'] ?>" alt="<?=$value['nkk']?> <?=$value['nama_kepala_keluarga']?>">
                    <?php else : ?>
                      <img class="img-size-50" src="<?=base_url()?>/images/image_state/no_picture.png" alt="No Picture : <?=$value['nkk']?> <?=$value['nama_kepala_keluarga']?>">
                    <?php endif; ?>
                    </div>
                    <div class="d-flex flex-column">
                      <div class="align-middle text-sm"><a href="<?=base_url()?>/operator/kartu-keluarga-lihat/<?=$value['id_perubahan_kk']?>"><span style="letter-spacing:0.15em" class="font-weight-bold"><?=$value['nkk']?></span></a></div>
                      <div class="align-middle text-sm font-weight-bold"><?=$value['nama_kepala_keluarga']?></div>
                      <div class="align-middle text-sm"><?= date( 'd-m-Y' , strtotime($value['tanggal_dikeluarkan']))?></div>
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
                <div class="d-flex justify-content-center"><?= (isset($pager) ) ? $pager->links('kk_proses', 'sipdesa_pager') : "" ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->