
    <!-- Main content -->
    <section class="content">
      <div class="container">
      <div class="row">
      <div class="col-12 pt-2">
         <div class="card round-1">
         <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
              <p class="font-weight-bold text-lg m-0">Setup Phpmailer</p>
              </div>
              <div>
              <a href="<?=base_url()?>/master/setup-email" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              </div>
            </div> 
            </div>
            <?php $tipe_user = [ 1 => '<span class="badge bg-indigo">Master</span>', 2 => '<span class="badge badge-danger">Operator</span>',  3 => '<span class="badge badge-info">Penduduk</span>' ]; ?>
         <div class="card-body">
         <div class="row">
          <div class="col-12">
          <form action="<?=base_url()?>/master/setup-email-update" id="form_setup_email" method="post" enctype="multipart/form-data">
          <input value="<?=(isset($data_setup['id_setup_phpmailer']))? $data_setup['id_setup_phpmailer'] : '' ?>" name="id_setup_phpmailer" type="hidden"  id="id_setup_phpmailer">

              <div class="form-group row">  
                <label for="smtp_host" class="col-lg-4 text-sm text-muted">SMTP Host</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_setup['smtp_host']))? $data_setup['smtp_host'] : '' ?>" name="smtp_host" type="text" max-length="100" id="smtp_host" alt="Masukan SMTP Host name email" title="Masukan SMTP Host name email" class="form-control bw-2 round-1 <?= (isset($invalid_info['smtp_host'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['smtp_host'])) ? $invalid_info['smtp_host'] : '' ?></span>
                </div>
              </div>

            <div class="form-group row">
                <label for="smtp_auth" class="col-lg-4 text-sm text-muted">SMTP Auth</label>
                <div class="col-lg-8">
                  <select name="smtp_auth" id="smtp_auth" class="form-control bw-2 round-1  <?= (isset($invalid_info['smtp_auth'])) ? 'is-invalid' : 'border-primary' ?>" >
                      <option value="1" <?=(isset($data_setup['smtp_auth']) && $data_setup['smtp_auth'] == 1)?  'selected' : '' ?>>true</option>
                      <option value="0" <?=(isset($data_setup['smtp_auth']) && $data_setup['smtp_auth'] == 0)?  'selected' : '' ?>>false</option>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['smtp_auth'])) ? $invalid_info['smtp_auth'] : '' ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="smtp_port" class="col-lg-4 text-sm text-muted">SMTP Port</label>
                <div class="col-lg-8">
                  <select name="smtp_port" id="smtp_port" class="form-control bw-2 round-1  <?= (isset($invalid_info['smtp_port'])) ? 'is-invalid' : 'border-primary' ?>" >
                      <option value="1" <?=(isset($data_setup['smtp_port']) && $data_setup['smtp_port'] == 1)?  'selected' : '' ?>>465</option>
                      <option value="0" <?=(isset($data_setup['smtp_port']) && $data_setup['smtp_port'] == 0)?  'selected' : '' ?>>587</option>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['smtp_port'])) ? $invalid_info['smtp_port'] : '' ?></span>
                </div>
            </div>

            <div class="form-group row">  
                <label for="name_alias" class="col-lg-4 text-sm text-muted">Nama Pengirim Alias</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_setup['name_alias']))? $data_setup['name_alias'] : '' ?>" name="name_alias" type="text" max-length="100" id="name_alias" alt="Masukan SMTP Host name email" title="Masukan SMTP Host name email" class="form-control bw-2 round-1 <?= (isset($invalid_info['name_alias'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['name_alias'])) ? $invalid_info['name_alias'] : '' ?></span>
                </div>
            </div>

            
            <div class="form-group row">  
                <label for="username_email" class="col-lg-4 text-sm text-muted">Username Email</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_setup['username_email']))? $data_setup['username_email'] : '' ?>" name="username_email" type="email" max-length="100" id="username_email" alt="Masukan SMTP Host name email" title="Masukan SMTP Host name email" class="form-control bw-2 round-1 <?= (isset($invalid_info['username_email'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['username_email'])) ? $invalid_info['username_email'] : '' ?></span>
                </div>
            </div>

            <div class="form-group row">  
                <label for="password_email" class="col-lg-4 text-sm text-muted">Password Email</label>
                <div class="col-lg-8">
                  <input value="<?=(isset($data_setup['password_email']))? $data_setup['password_email'] : '' ?>" name="password_email" type="text" max-length="100" id="password_email" alt="Masukan SMTP Host name email" title="Masukan SMTP Host name email" class="form-control bw-2 round-1 <?= (isset($invalid_info['password_email'])) ? 'is-invalid' : 'border-primary' ?>" >
                  <span class="invalid-feedback"><?= (isset($invalid_info['password_email'])) ? $invalid_info['password_email'] : '' ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="is_html" class="col-lg-4 text-sm text-muted">HTML</label>
                <div class="col-lg-8">
                  <select name="is_html" id="is_html" class="form-control bw-2 round-1  <?= (isset($invalid_info['is_html'])) ? 'is-invalid' : 'border-primary' ?>" >
                      <option value="1" <?=(isset($data_setup['is_html']) && $data_setup['is_html'] == 1)?  'selected' : '' ?>>true</option>
                      <option value="0" <?=(isset($data_setup['is_html']) && $data_setup['is_html'] == 0)?  'selected' : '' ?>>false</option>
                  </select>
                  <span class="invalid-feedback"><?= (isset($invalid_info['is_html'])) ? $invalid_info['is_html'] : '' ?></span>
                </div>
            </div>

            <div class="row">
              <div class="col-lg-8 offset-lg-4">
                <div class="form-group">
                  <div class="form-check">
                    <input value="1" name="default_setup" type="checkbox" id="default_setup" class="form-check-input"  <?=(isset($data_template_dokumen['default_setup']) && $data_template_dokumen['default_setup'] == 1)? 'checked' : '' ?> >
                    <label for="default_setup" class="form-chek-label">Default Setup</label>
                    <span class="invalid-feedback"><?= (isset($invalid_info['default_setup'])) ? $invalid_info['default_setup'] : '' ?></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-4">
                  <button id="tombol_simpan" type="submit" class="btn btn-block btn-success round-1">
                    SIMPAN<i class="ml-2 fas fa-save"></i>
                  </button>
                </div>
                </div>
          </form>
          </div>
         </div>  
</div></div>
      </div>
      </div>

      </div><!-- /.container-fluid -->
    </section>
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
              <a href="<?= base_url() ?>/master/setup-email-lihat<?= (isset($data_setup['id_setup_phpmailer'])) ? '/'.$data_setup['id_setup_phpmailer'] : '' ?>" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
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