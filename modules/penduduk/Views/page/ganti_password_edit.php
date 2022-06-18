
    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">
              <div class="card-body">                
              <div class="row">
                  <div class="col-12 d-flex justify-content-between">
                    <p class="font-weight-bold text-lg m-0">Ganti Password</p>
                    <div>
                      <a href="<?=base_url()?>/penduduk/setting-akun" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                    </div>  
                  </div>
                </div>
              <hr>
              <form action="<?=base_url()?>/penduduk/ganti-password-update" id="form_ganti_password" method="post" enctype="multipart/form-data">


              <div class="form-group row">  
                <label for="password_lama" class="col-lg-4 text-sm text-muted">Password Lama</label>
                <div class="col-lg-8">
                  <div class="input-group">
                    <input value="<?=(isset($data_setup['password_lama']))? $data_setup['password_lama'] : '' ?>" name="password_lama" type="password" min-length="8" max-length="25" id="password_lama" alt="Masukan SMTP Host name email" title="Masukan SMTP Host name email" class="round-1-bl round-1-tl bw-2 form-control border-right-0 <?= (isset($invalid_info['password_lama'])) ? 'is-invalid' : 'border-primary' ?>" >
                    <div class="input-group-append">
                      <div class="round-1-br round-1-tr border-left-0 bw-2 input-group-text bg-white <?= (isset($invalid_info['password_lama'])) ? 'border-danger' : 'border-primary' ?>">
                          <span data-lihatpass="password_lama" class="fas fa-lock"></span>
                      </div>
                    </div>
                    <span class="invalid-feedback"><?= (isset($invalid_info['password_lama'])) ? $invalid_info['password_lama'] : '' ?></span>
                  </div>
                </div>
              </div>

              <div class="form-group row">  
                <label for="password_baru" class="col-lg-4 text-sm text-muted">Password Baru</label>
                <div class="col-lg-8">
                  <div class="input-group">
                    <input value="<?=(isset($data_setup['password_baru']))? $data_setup['password_baru'] : '' ?>" name="password_baru" type="password" min-length="8" max-length="25" id="password_baru" alt="Masukan SMTP Host name email" title="Masukan SMTP Host name email" class="round-1-bl round-1-tl bw-2 form-control border-right-0 <?= (isset($invalid_info['password_baru'])) ? 'is-invalid' : 'border-primary' ?>" >
                    <div class="input-group-append">
                      <div class="round-1-br round-1-tr border-left-0 bw-2 input-group-text bg-white <?= (isset($invalid_info['password_baru'])) ? 'border-danger' : 'border-primary' ?>">
                          <span data-lihatpass="password_baru" class="fas fa-lock"></span>
                      </div>
                    </div>
                    <span class="invalid-feedback"><?= (isset($invalid_info['password_baru'])) ? $invalid_info['password_baru'] : '' ?></span>
                  </div>
                </div>
              </div>

              <div class="form-group row">  
                <label for="konfirmasi_password_baru" class="col-lg-4 text-sm text-muted">Konfirmasi Password Baru</label>
                <div class="col-lg-8">
                  <div class="input-group">
                    <input value="<?=(isset($data_setup['konfirmasi_password_baru']))? $data_setup['konfirmasi_password_baru'] : '' ?>" name="konfirmasi_password_baru" type="password" min-length="8" max-length="25" id="konfirmasi_password_baru" alt="Masukan SMTP Host name email" title="Masukan SMTP Host name email" class="round-1-bl round-1-tl bw-2 form-control border-right-0 <?= (isset($invalid_info['konfirmasi_password_baru'])) ? 'is-invalid' : 'border-primary' ?>" >
                    <div class="input-group-append">
                      <div class="round-1-br round-1-tr border-left-0 bw-2 input-group-text bg-white <?= (isset($invalid_info['konfirmasi_password_baru'])) ? 'border-danger' : 'border-primary' ?>">
                          <span data-lihatpass="konfirmasi_password_baru" class="fas fa-lock"></span>
                      </div>
                    </div>
                    <span class="invalid-feedback"><?= (isset($invalid_info['konfirmasi_password_baru'])) ? $invalid_info['konfirmasi_password_baru'] : '' ?></span>
                  </div>
                </div>
              </div>

              <hr>
              <div class="form-group row">
                <div class="col-lg-8 offset-lg-4">
                <button id="tombol_simpan" type="submit" class="btn btn-block btn-success round-1">
                    SIMPAN<i class="ml-2 fas fa-save"></i>
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
              <a href="<?= base_url() ?>/penduduk/setting-akun" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
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