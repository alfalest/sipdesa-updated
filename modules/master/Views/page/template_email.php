
    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">
              <div class="card-header pr-3">
                <div class="d-flex justify-content-between">
                  <div>
                  <p class="font-weight-bold text-lg m-0"><?= (isset($title_page)) ? $title_page : 'Template Dokumen' ?></p>
                  </div>
                  <div>
                  <?php if(isset($title_page)) : ?>
                    <a href="<?=base_url()?>/master/template-email" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                  <?php else : ?>
                  <a href="<?=base_url()?>/master" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                  <?php endif; ?>
                  </div>
                </div> 
              </div>


<?php if(isset($title_page)) : ?>
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
                      <input type="text" name="cari" id="cari" class="border-left-0 border-right-0 border-primary bw-2 form-control" value="<?=(isset($inp_val['cari']) && $inp_val['cari'] != '') ? esc($inp_val['cari']) : '' ?>">
                      <span class="input-group-append">
                        <button type="submit" class="border border-left-0 bw-2 border-primary btn-primary btn btn-sm round-1-br round-1-tr">Cari</button>
                      </span>
                    </div>
                  </form>
                </div>
                <div class="mb-3">
                  Pencarian:
                <?php if(isset($inp_val['cari']) && $inp_val['cari'] != '') : ?>
                  <a href="<?= base_url() ?>/master/<?= (isset($link_back)) ? $link_back : '' ?>" class="text-danger"><?= $inp_val['cari'] ?> <i class="fas fa-times"></i></a>
                <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-12">
            <div class="py-1 px-1">
            <a href="<?=base_url()?>/master/<?= (isset($link_edit)) ? $link_edit : '' ?>" class="btn btn-primary btn-sm rounded-pill"><i class="mr-2 fas fa-plus"></i> Template Baru</a>

            </div>
            </div>
            </div>
            <br>
            <?php if( isset($template_email) && count($template_email) ) :?>
            <div class="row">
              <div id="kartu_keluarga_list" class="col-12">
                <?php foreach($template_email as $value) : ?>
                <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                  <div class="d-flex justify-content-between border-bottom pb-2">
                    <div class="d-flex flex-row">
                      <div class="text-sm text-muted"><?= date( 'H:i:s , d-m-Y' , strtotime($value['create_time']))?>
                      <?php if($value['default_email']) : ?>
                      <span class="ml-3 text-primary">
                        Template Utama
                      </span>
                      <?php endif; ?>
                      </div>
                    </div>
                    <div class="">
                      <a href="<?= base_url() ?>/master/<?= $link_edit ?>/<?=$value['id_template_email']?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-edit mr-2"></i> Edit</a>
                    
                    </div>
                  </div>
                  <a href="<?=base_url()?>/master/<?= $link_lihat ?>/<?=$value['id_template_email']?>">
                    <div class="row text-dark">
                      <div class="col-12 col-lg-6">
                        <div class="row h-100">
                          <div class="col-lg-12 col-6">
                            <span class="text-muted">Judul Email</span>
                          </div>
                          <div class="col-lg-12 col-6">
                            <span class="text-muted font-weight-bold"><?=$value['judul_email']?></span>
                          </div>
                        </div>
                      </div>
                   
                      <div class="col-12 col-lg-6">
                        <div class="row h-100">
                          <div class="col-lg-12 col-6">
                            <span class="text-muted">Template</span>
                          </div>
                          <div class="col-lg-12 col-6">
                            <span class="text-muted font-weight-bold"><?= ucwords(str_replace("_", ' ', $value['jenis_template_email']))?></span>
                          </div>
                        </div>
                      </div>
                      </div>
                    </a>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-12">
                <div class="d-flex justify-content-center"><?= (isset($pager) ) ? $pager->links('template_email', 'sipdesa_pager') : "" ?></div>
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



<?php else : ?>

            <div class="card-body">
          <div class="row">
          <div class="col-12">
          <?php if($arr_key_template) : ?>
          <?php 
            ksort($arr_key_template);
            $list_num = 1;
          ?>
            <?php foreach($arr_key_template as $key => $value) :  ?>
          <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/master/template-email/<?= str_replace('_', '-', $key) ?>">
            <div class="d-flex justify-content-between">
              <div class="text-left"><?= $list_num ?>. <?= ucwords(str_replace('_', ' ', $key)) ?></div>
              <div>
              <?php if(isset($badge_notif['template_email']) && $badge_notif['template_email'] != 0) : ?>
                  <span class="badge badge-danger mr-3"><?= $badge_notif['template_email'] ?></span>
                <?php endif; ?>
              <i class="fas fa-angle-right"></i>
              </div>
            </div>
          </a>
          <hr>
              <?php $list_num++; ?>
            <?php endforeach; ?>
          <?php endif; ?>
          </div>
          </div>
                  </div>
<?php endif; ?>
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
      <div class="modal-header">
        <div class="modal-title">
          <h4 class="">
            <i class="mr-2 fas <?= $icon_symbol[$message_info['status']]?> <?= $icon_color[$message_info['status']]?>"></i>
            <?= (isset($message_info['status']) && $message_info['status'] == 1) ? 'Berhasil' : 'Gagal' ?>
          </h4>
        </div>
      </div>
      <div class="modal-body p-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3 text-center">
              <i class="p-2 mb-2 fa-6x fa-fw far <?= $icon_symbol[$message_info['status']]?> <?= $icon_color[$message_info['status']]?>"></i>
              <h4 class="font-weight-bold"><?= (isset($message_info['status']) && $message_info['status'] == 1) ? 'Berhasil' : 'Gagal' ?></h4>
                <p class="text-break"><?= (isset($message_info['text'])) ? $message_info['text'] : '' ?></p>
            </div>
          </div>
          
        </div>
      </div>
      <div class="modal-footer d-flex">
        <div class="flex-fill">
          <div class="row">
            <div class="col-6">
              <a href="<?= base_url() ?>/master/surat-kelahiran" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
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
<?php endif; ?>
