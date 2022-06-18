<div class="register-box">
  <div class="register-logo">
    <a href="<?= base_url() ?>"><b>SIP</b>DESA</a>
  </div>

  <div class="card round-1">
    <div class="card-body round-1 register-card-body">
      <p class="login-box-msg">Mendaftar akun baru</p>
      <form action="<?= base_url() ?>/register-simpan" method="post">
        <div class="input-group mb-3">
          <input  id="nama_alias" name="nama_alias" value="<?= (isset($nama_alias)) ? $nama_alias : '' ?>" type="text" minlength="3" maxlength="50" class="round-1-bl round-1-tl  bw-2 border-primary form-control" placeholder="Nama Lengkap" required>
          <div class="input-group-append">
            <div class="round-1-br round-1-tr  bw-2 border-primary input-group-text">
              <span class=" fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input  id="email" name="email" type="email" value="<?= (isset($email)) ? $email : '' ?>" maxlength="50" class="round-1-bl round-1-tl  bw-2 border-primary form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="round-1-br round-1-tr  bw-2 border-primary input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" name="password" type="password" value="<?= (isset($password)) ? $password : '' ?>" minlength="8" maxlength="25" class="round-1-bl round-1-tl  bw-2 border-primary form-control" placeholder="Kata Sandi" required>
          <div class="input-group-append">
            <div class="round-1-br round-1-tr  bw-2 border-primary input-group-text">
                <span id="lihat-kata-sandi" class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               Dengan ini saya menyetujui semua <a href="#">syarat dan ketentuan</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block round-1">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- Atau -</p>
        <a href="<?= base_url() ?>/login" class="text-center">Masuk</a>
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
                  <a href="<?= base_url() ?>/register" class="font-weight-bold btn-block btn-primary btn round-1" data-dismiss="modal">KEMBALI</a>
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