

    <!-- Main content -->
    <section class="content">
      <div class="container">


        <div class="row">
      <div class="col-12 pt-2">
        <div class="card round-1">
          <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
                <p class="font-weight-bold text-lg m-0">User</p>
              </div>
              <div>
                <a href="<?=base_url()?>/master" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              </div>
            </div> 
          </div>
          <div class="card-body px-1 px-sm-2 px-md-3 px-lg-4">

            <div class="row">
              <div class="col-12">
                <div class="mb-3">
                  Record: <span><?=(isset($jml_ditemukan)) ? $jml_ditemukan : '0' ?>/<?=(isset($jml_semua)) ? $jml_semua : '0' ?></span>            
                </div>
              </div>
              <div class="col-12">
                <div class="mb-3">
                  <form action="" method="get">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent border border-right-0 bw-2 border-primary round-1-bl round-1-tl">
                          <i class="fas fa-search text-primary"></i>
                        </span>
                      </div>
                      <input type="text" name="cari" id="cari" class="border-left-0 border-right-0 border-primary bw-2 form-control" value="<?=(isset($inp_val['cari']) && $inp_val['cari'] != '') ? esc($inp_val['cari']) : '' ?>">
                      <span class="input-group-append">
                        <button type="submit" class="border border-left-0 bw-2 border-primary btn-primary btn btn-sm round-1-br round-1-tr">Cari</button>
                      </span>
                    </div>
                  </form>
                </div>
                <?php if(isset($inp_val['cari']) && $inp_val['cari'] != '') : ?>
                <div class="mb-3">
                  Pencarian: <a href="<?= base_url() ?>/master/user" class="text-danger"><?= $inp_val['cari'] ?> <i class="fas fa-times"></i></a>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-4">
                <a class="border shadow-sm btn btn-block round-1 mb-2 <?= (isset($tipe_user_state) && $tipe_user_state == 3 ) ? 'btn-primary' : 'btn-light text-primary '?>" href="<?= base_url() ?>/master/user/penduduk">
                  Penduduk <i class="fas fa-angle-right"></i>
                </a>
              </div>
              <div class="col-4">
                <a class="border shadow-sm btn btn-block round-1 mb-2 <?= (isset($tipe_user_state) && $tipe_user_state == 2 ) ? 'btn-primary' : 'btn-light text-primary '?>" href="<?= base_url() ?>/master/user/operator">
                  Operator <i class="fas fa-angle-right"></i>
                </a>
              </div>
              <div class="col-4">
                <a class="border shadow-sm btn btn-block round-1 mb-2 <?= (isset($tipe_user_state) && $tipe_user_state == 1 ) ? 'btn-primary' : 'btn-light text-primary '?>" href="<?= base_url() ?>/master/user/master">
                  Master <i class="fas fa-angle-right"></i>
                </a>
              </div>
            </div>
            <br>
            <?php if( isset($data_user) && count($data_user) ) :?>
            <?php $tipe_user = [ 1 => '<span class="badge bg-indigo">Master</span>',   2 => '<span class="badge badge-danger">Operator</span>', 3 => '<span class="badge badge-info">Penduduk</span>']; ?>
            <div class="row">
              <div id="kartu_keluarga_list" class="col-12">
                <?php foreach($data_user as $value) : ?>
                <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                  <div class="d-flex justify-content-between border-bottom pb-2">
                    <div class="d-flex flex-row">
                      <div class="mr-3">
                        <?= $tipe_user[$value['tipe_user']] ?>
                      </div>
                      <div class="text-sm text-muted"><?= date( 'H:i:s , d-m-Y' , strtotime($value['update_time']))?>
                      </div>
                    </div>
                    <div class="">
                      
                      <a href="<?= base_url() ?>/master/user-edit/<?=$value['id_user']?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-edit mr-2"></i> Edit</a>
                
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-3 my-2">
                  <?php if(isset($value['link_foto_diri']) && $value['link_foto_diri'] != '') : ?>
                    <img src="<?= base_url().'/image-content/'.$value['link_foto_diri'] ?>" alt="" class="profile-user-img">
                    <?php else : ?>
                    <img src="<?= base_url() ?>/themes/dist/img/user2-160x160.jpg" alt="" class="profile-user-img">
                    <?php endif; ?>
                  </div>
                  <div class="col-lg-9">
                   <a href="<?=base_url()?>/master/user-lihat/<?=$value['id_user']?>">
                    <div class="row text-dark">
                      <div class="col-12 col-lg-6">
                        <div class="row h-100">
                          <div class="col-lg-12 col-6">
                            <span class="text-muted">User</span>
                          </div>
                          <div class="col-lg-12 col-6">
                            <span class="text-muted font-weight-bold"><?=$value['nama_alias']?></span> <span>&lt;<?=$value['email']?>&gt;</span>
                          </div>
                        </div>
                        </div>
                      <div class="col-12 col-lg-6">
                        <div class="row h-100">
                          <div class="col-lg-12 col-6">
                            <span class="text-muted">Nama Lengkap</span>
                          </div>
                          <div class="col-lg-12 col-6">
                            <span class="text-muted font-weight-bold"><?= strtoupper($value['nama_lengkap'])?></span>
                          </div>
                        </div>
                      </div>
                        <div class="col-12 col-lg-6">
                          <div class="row h-100">
                            <div class="col-lg-12 col-6">
                              <span class="text-muted">NIK</span>
                            </div>
                            <div class="col-lg-12 col-6">
                              <span class="text-muted font-weight-bold"><?= $value['nik']?></span>
                            </div>
                          </div>
                        </div>
                        <?php if($value['create_time'] != NULL) :?>
                        <div class="col-12 col-lg-6">
                          <div class="row h-100">
                            <?php if($value['create_time'] != NULL) :?>
                            <div class="col-6">
                              <span class="text-muted">Telp</span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted font-weight-bold"><?= $value['telepon'] ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if($value['create_time'] != NULL) :?>
                            <div class="col-6">
                              <span class="text-muted">Alamat</span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted font-weight-bold"><?= $value['alamat'] ?></span>
                            </div>
                            <?php endif; ?>
                          </div>
                        </div>
                        <?php endif; ?>
                      </div>
                    </a>
                  </div>
                  </div>
                 
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-12">
                <div class="d-flex justify-content-center"><?= (isset($pager) ) ? $pager->links('user', 'sipdesa_pager') : "" ?></div>
              </div>
            </div>
            <?php else : ?>
            <div class="row">
              <div class="col-12">
                <div class="text-center" id="kartu_keluarga_list">Belum ada data</div>
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

