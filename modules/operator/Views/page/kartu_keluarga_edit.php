
    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">
            <div class="card-header">
        <div class="card-title">
          <h5 class="font-weight-bold">Verifikasi Kartu Keluarga</h5>
        </div>
        <div class="card-tools">
          <div>
          <a href="<?=base_url()?>/operator/kartu-keluarga-lihat/<?=$data_kk['id_perubahan_kk']?>" class="text-sm btn btn-primary btn-sm rounded-pill">
            <i class="fas fa-times"></i>
          </a>
          </div>
        </div>
      </div>
              <div class="card-body">                
  
              <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                  <div class="d-flex justify-content-between border-bottom pb-2">
                    <div class="d-flex flex-row">
                      <div class="mr-3">
                      </div>
                      <div class="text-sm text-muted"><?= date( 'H:i:s , d-m-Y' , strtotime($data_kk['update_time']))?></div>
                    </div>
                    <div class="">
                    
                    </div>
                  </div>
                  <div class="d-flex flex-row pt-2">
                    <div class="mr-2" id="kartu_keluarga_foto">
                    <?php if(isset($data_kk['link_foto_kk']) && $data_kk['link_foto_kk'] != '') : ?>
                      <img class="img-size-50" src="<?=base_url()?>/image-content/<?= $data_kk['link_foto_kk'] ?>" alt="<?=$data_kk['nkk']?> <?=$data_kk['nama_kepala_keluarga']?>">
                    <?php else : ?>
                      <img class="img-size-50" src="<?=base_url()?>/images/image_state/no_picture.png" alt="No Picture : <?=$data_kk['nkk']?> <?=$data_kk['nama_kepala_keluarga']?>">
                    <?php endif; ?>
                    </div>
                    <div class="d-flex flex-column">
                      <div class="align-middle text-sm"><a href="<?=base_url()?>/operator/kartu-keluarga-lihat/<?=$data_kk['id_perubahan_kk']?>"><?=$data_kk['nkk']?></a></div>
                      <div class="align-middle text-sm font-weight-bold"><?=$data_kk['nama_kepala_keluarga']?></div>
                      <div class="align-middle text-sm"><?= date( 'd-m-Y' , strtotime($data_kk['tanggal_dikeluarkan']))?></div>
                    </div>
                  </div>
                </div>

              <form action="<?=base_url()?>/operator/kartu-keluarga-update" id="kartu_keluarga" method="post">
              <input value="<?=(isset($data_kk['id_perubahan_kk']))? $data_kk['id_perubahan_kk'] : '' ?>" name="id_perubahan_kk" type="hidden"  id="id_perubahan_kk">
              <div class="form-group row">
                  <div class="col-lg-4  text-sm text-muted font-weight-bold">
                  Verifikasi
                  </div>     
                  <div class="col-lg-8">
                    <div class="custom-control custom-radio">
                      <input type="radio" name="status_perubahan_kk" id="status_perubahan_kk_terima" class="custom-control-input custom-control-input-success" value="2" <?=(isset($data_kk['status_perubahan_kk_terima']) && $data_kk['status_perubahan_kk_terima'] == 2 )?  'checked' : '' ?> required>
                      <label for="status_perubahan_kk_terima" class="custom-control-label">Terima</label>    
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" name="status_perubahan_kk" id="status_perubahan_kk_tolak" class="custom-control-input custom-control-input-danger" value="3" <?=(isset($data_kk['status_perubahan_kk_terima']) && $data_kk['status_perubahan_kk_terima'] == 3 )?  'checked' : '' ?>>
                      <label for="status_perubahan_kk_tolak" class="custom-control-label">Tolak</label>    
                    </div>
                  </div>
              </div>
                  <div class="form-group row">
                    <label for="keterangan_operator" class="col-lg-4 text-sm text-muted">Catatan</label>
                    <div class="col-lg-8">
                      <textarea name="keterangan_operator" max-length="100" id="keterangan_operator" alt="Masukan Keterangan" title="Masukan Keterangan" class="form-control bw-2 border-primary round-1"><?=(isset($data_kk['keterangan_operator']))? $data_kk['keterangan_operator'] : '' ?></textarea>
                    </div>
                  </div>
              <hr>
              <div class="form-group row">
                <div class="col-lg-8 offset-lg-4">
                  <button type="submit" class="btn btn-block btn-success round-1">
                    SIMPAN
                  </button>
                </div>
              </div>
              </form>
              </div>
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
      <div class="modal-body p-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3 text-center">
              <i class="p-2 mb-2 fa-6x fa-fw far <?= $icon_symbol[$message_info['status']]?> <?= $icon_color[$message_info['status']]?>"></i>
              <h4 class="font-weight-bold"><?= (isset($message_info['status']) && $message_info['status'] == 1) ? 'Berhasil' : 'Gagal' ?></h4>
                <p class="text-break"><?= (isset($message_info['text'])) ? $message_info['text'] : '' ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-12 border-top bw-2 p-3 text-center">
              <div class="row">
                <div class="col-6">
                  <a href="<?= base_url() ?>/operator/kartu-keluarga" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
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