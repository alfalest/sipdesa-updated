<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>"><b>SIP</b>DESA</a>
  </div>
  <div class="card round-1">
    <div class="card-body round-1 login-card-body">
      <p class="login-box-msg">Masuk</p>
      <form action="<?= base_url() ?>/login-auth" method="post">
        <div class="input-group mb-3">
        <input  id="email" name="email" type="email" value="<?= (isset($inp_val['email'])) ? $inp_val['email'] : '' ?>" maxlength="50" class="round-1-bl round-1-tl  bw-2 border-primary form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="round-1-br round-1-tr  bw-2 border-primary input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" name="password" type="password" value="<?= (isset($inp_val['password'])) ? $inp_val['password'] : '' ?>" minlength="8" maxlength="25" class="round-1-bl round-1-tl  bw-2 border-primary form-control" placeholder="Kata Sandi" required>
          <div class="input-group-append">
            <div class="round-1-br round-1-tr  bw-2 border-primary input-group-text">
                <span id="lihat-kata-sandi" class="fas fa-lock"></span>
            </div>
          </div>
        </div> 
        <div class="row">
          <div class="col-12">
           <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Ingat saya
              </label>
            </div> -->
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block round-1">Masuk</button>
          </div>
        </div> 
      </form>
      <div class="social-auth-links text-center">
        <p>- Atau -</p>
        <p class="mb-1">
          <a href="<?= base_url() ?>/lupa-password" class="text-center">Lupa password</a>
        </p>
        <p class="mb-1">
          <a href="<?= base_url() ?>/register" class="text-center">Mendaftar</a>
        </p>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
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
                <p class=""><?= (isset($message_info['text'])) ? $message_info['text'] : '' ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-12 border-top bw-2 p-3 text-center">
              <div class="row">
                <div class="col-6">
                  <a href="<?= base_url() ?>/login" class="font-weight-bold btn-block btn-primary btn round-1" data-dismiss="modal">KEMBALI</a>
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