

    <!-- Main content -->
    <section class="content">
      <div class="container">


        <div class="row">
      <div class="col-12 pt-2">
        <div class="card round-1">
          <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
                <p class="font-weight-bold text-lg m-0">Setup PHPMailer</p>
              </div>
              <div>
                <a href="<?=base_url()?>/master/setting-email" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              </div>
            </div> 
          </div>
          <div class="card-body px-1 px-sm-2 px-md-3 px-lg-4">
          <div class="row">
              <div class="col-12 mb-3">
              <a href="<?=base_url()?>/master/setup-email-edit" class="btn-sm px-3 btn btn-primary rounded-pill"><i class="fas fa-plus mr-3 mb-"></i> Tambah</a>
              </div>
          </div>
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
                  Pencarian: <a href="<?= base_url() ?>/master/setup-email" class="text-danger"><?= $inp_val['cari'] ?> <i class="fas fa-times"></i></a>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <br>
            <?php if( isset($data_phpmailer) && count($data_phpmailer) ) :?>
            <?php $is_default = [ 1 => '<span class="badge bg-indigo">Default</span>',   0 => '<span class="badge bg-light">Draft</span>']; ?>
            <?php $port_text = [ 1 => '465',   0 => '587']; ?>
            <?php $bool_text = [ 1 => 'TRUE',   0 => 'FALSE']; ?>
            <div class="row">
              <div id="kartu_keluarga_list" class="col-12">
                <?php foreach($data_phpmailer as $value) : ?>
                <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                  <div class="d-flex justify-content-between border-bottom pb-2">
                    <div class="d-flex flex-row">
                      <div class="mr-3">
                        <?= $is_default[$value['default_setup']] ?>
                      </div>
                      <div class="text-sm text-muted mr-3"><?= date( 'H:i:s , d-m-Y' , strtotime($value['update_time']))?>
                      </div>
                    </div>
                    <div class="">
                      
                      <a href="<?= base_url() ?>/master/setup-email-edit/<?=$value['id_setup_phpmailer']?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-edit mr-2"></i> Edit</a>
                
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-12">
                    <div class="row text-dark">
                      <div class="col-12 col-lg-6">
                        <div class="row h-100">
                          <div class="col-lg-12 col-6">
                            <span class="text-muted">Host</span>
                          </div>
                          <div class="col-lg-12 col-6">
                            <span class="text-muted font-weight-bold"><?=$value['smtp_host']?></span>
                          </div>
                        </div>
                        </div>
                        <div class="col-12 col-lg-6">
                          <div class="row h-100">
                            <div class="col-6">
                              <span class="text-muted">Port</span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted font-weight-bold"><?= $port_text[$value['smtp_port']] ?></span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted">Nama Alias</span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted font-weight-bold"><?= $value['name_alias'] ?></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-6">
                          <div class="row h-100">
                            <div class="col-6">
                              <span class="text-muted">Is HTML</span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted font-weight-bold"><?= $bool_text[$value['is_html']]?></span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted">SMTP Auth</span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted font-weight-bold"><?= $bool_text[$value['smtp_auth']] ?></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-6">
                          <div class="row h-100">
                            <div class="col-6">
                              <span class="text-muted">Username</span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted font-weight-bold"><?= $value['username_email'] ?></span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted">Password</span>
                            </div>
                            <div class="col-6">
                              <span class="text-muted font-weight-bold"><?= $value['password_email'] ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
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

