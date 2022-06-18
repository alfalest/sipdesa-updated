    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editor Template Email</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <form autocomplete="off" action="<?= base_url() ?>/master/template-email-update" method="post">
          <input type="hidden" name="id_template_email" value="<?= (isset($id_template_email) && $id_template_email != '') ? $id_template_email : '' ?>">
          <div class="card round-1">
              <!-- /.card-header -->
              <div class="card-body round-1 p-0">
                <div class="container-fluid">

                  <div class="row">
                    <div class="col-12 p-0">
                      <div class="form-group">
                          <textarea name="isi_email" id="compose-textarea" class="form-control round-1" style="height: 300px" required><?= (isset($isi_email) && $isi_email != '') ? $isi_email : '' ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 p-3">
                      <div class="form-group">
                        <input name="jenis_template_email" class="form-control round-1" placeholder="Jenis template" required autocomplete="off" value="<?= (isset($jenis_template_email) && $jenis_template_email != '') ? $jenis_template_email : '' ?>">
                      </div>
                      <div class="form-group">
                        <input name="judul_email" class="form-control round-1" placeholder="Judul email" required autocomplete="off"  value="<?= (isset($judul_email) && $judul_email != '') ? $judul_email : '' ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 p-3">
                      <div class="form-group">
                        <a href="<?=base_url()?>/master/template-email-list" class="round-1 btn btn-default"><i class="fas fa-arrow-left"></i> Kembali</a>
                        <?php if(isset($id_template_email) && $id_template_email != '') : ?>
                        <button type="submit" name="hapus"  value="hapus" onclick="return confirm('Anda Yakin?')" class="round-1 btn btn-danger"><i class="fas fa-times"></i> Hapus</button>
                        <a href="<?=base_url()?>/master/template-email-print/<?= $id_template_email ?>" class="round-1 btn btn-default"><i class="fas fa-print"></i> Print</a>
                        <?php endif; ?>
                        <button type="submit" name="simpan" value="simpan" class="round-1 btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </form>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<!-- Modal -->
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
                  <a href="<?= base_url() ?>/master/template-email-list" class="font-weight-bold btn-block btn-primary btn round-1" data-dismiss="modal">KEMBALI</a>
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