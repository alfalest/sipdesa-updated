
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="card round-1">
          <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
              <p class="font-weight-bold text-lg m-0">Template <?= (isset($title_page) && $title_page != '') ? $title_page : 'Dokumen' ?></p>
              </div>
              <div>
              <a href="<?=base_url()?>/operator<?= (isset($link_back)) ? '/'.$link_back : '' ?>" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              </div>
            </div> 
            </div>
            <form autocomplete="off" action="<?= base_url() ?>/operator/template-dokumen-update" method="post">
            <input type="hidden" name="id_template_dokumen" value="<?= (isset($data_template_dokumen['id_template_dokumen']) && $data_template_dokumen['id_template_dokumen'] != '') ? $data_template_dokumen['id_template_dokumen'] : '' ?>">
            <input type="hidden" name="jenis_template" value="<?= (isset($data_template_dokumen['jenis_template']) && $data_template_dokumen['jenis_template'] != '') ? $data_template_dokumen['jenis_template'] : '' ?>">
              <!-- /.card-header -->
              <div class="card-body round-1 p-0">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12 p-0">
                      <div class="form-group">
                          <textarea name="template_dokumen" id="compose-textarea" class="form-control round-1" style="height: 300px" required><?= (isset($data_template_dokumen['template_dokumen']) && $data_template_dokumen['template_dokumen'] != '') ? $data_template_dokumen['template_dokumen'] : '' ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 p-3">
                      <?php if(isset($replacer_alias)) : ?>
                      <span class="font-weight-bold text-muted">Alias tersedia:</span>
                        <?php foreach ($replacer_alias as $key => $value) : ?>
                          <?= '[#'.$value.'#], ' ?>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 p-3">
                      <div class="form-group row">
                        <label for="nama_template" class="col-lg-4 text-sm text-muted">Nama Template</label>
                        <div class="col-lg-8">
                          <input value="<?=(isset($data_template_dokumen['nama_template']))? esc($data_template_dokumen['nama_template']) : '' ?>" name="nama_template" type="text" max-length="150" id="nama_template" alt="Masukan nama template" title="Masukan Nama template" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_template'])) ? 'is-invalid' : 'border-primary' ?>" >
                          <span class="invalid-feedback"><?= (isset($invalid_info['nama_template'])) ? $invalid_info['nama_template'] : '' ?></span>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-8 offset-lg-4">
                          <div class="form-group">
                            <div class="form-check">
                              <input value="1" name="default_template" type="checkbox" id="default_template" class="form-check-input"  <?=(isset($data_template_dokumen['default_template']) && $data_template_dokumen['default_template'] == 1)? 'checked' : '' ?> >
                              <label for="default_template" class="form-chek-label">Jadikan Template utama</label>
                              <span class="invalid-feedback"><?= (isset($invalid_info['default_template'])) ? $invalid_info['default_template'] : '' ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="col-12 p-3">
                      <div class="form-group">
                        <button type="submit" name="simpan" value="simpan" class="round-1 btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </div>
            
                </div>
              </div>
              <!-- /.card-body -->
            <!-- /.card -->
            </form>
          </div>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<div class="modal fade" id="modal_masukan_gambar">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header border-bottom bw-2 p-0">
    <div class="container-fluid">
    <div class="row">
            <div class="col-12 p-3">
            <div class="d-flex justify-content-between">
          <div>
            <p class="font-weight-bold text-lg m-0">Masukan Gambar</p>
          </div>
          <div>
            <button type="button" class="btn btn-primary btn-sm rounded-pill" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
          </div>
        </div> 
            </div>
          </div>
    </div>
    </div>

      <div class="modal-body">
        <div class="form-group">
          <label for="url_gambar" class="text-sm text-muted">Masukan link gambar</label>
          <input value="" name="input_url_gambar" type="text" max-length="150" id="input_url_gambar" alt="Masukan url gambar" title="Masukan url gambar" class="form-control bw-2 round-1 <?= (isset($invalid_info['nama_template'])) ? 'is-invalid' : 'border-primary' ?>" >
          <span class="invalid-feedback"><?= (isset($invalid_info['url_gambar'])) ? $invalid_info['url_gambar'] : '' ?></span>
        </div>
      </div>
      <div class="modal-footer">
      <div class="container-fluid">
      <div class="row">
            <div class="col-12 p-3 text-center">
              <div class="row">
                <div class="col-6">
              <button class="btn btn-block btn-danger btn-sm rounded-pill" type="button" data-dismiss="modal" >Close</button>
                </div>
                <div class="col-6">
              <button class="btn btn-block btn-primary btn-sm rounded-pill" type="button" id="tambah_url_gambar" >Tambah</button>
                </div>
              </div>
            </div>
          </div>
      </div>
      </div>
    </div>
  </div>
</div>
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


<div class="modal fade" id="modal_insert_image_url">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom bw-2 p-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="font-weight-bold text-lg m-0">Info</p>
                </div>
                <div>
                  <button type="button" class="btn btn-primary btn-sm rounded-pill" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <p id="text_insert_image_url" class="text-center text-danger font-weight-bold"></p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3 text-center">
              <div class="row">
                <div class="col-12">
                  <button class="btn btn-block btn-danger btn-sm rounded-pill" type="button" data-dismiss="modal" >Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal_insert_image_img">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom bw-2 p-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="font-weight-bold text-lg m-0">Info</p>
                </div>
                <div>
                  <button type="button" class="btn btn-primary btn-sm rounded-pill" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <p id="text_insert_image_img" class="text-center text-danger font-weight-bold"></p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3 text-center">
              <div class="row">
                <div class="col-12">
                  <button class="btn btn-block btn-danger btn-sm rounded-pill" type="button" data-dismiss="modal" >Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>