<!-- Content Header (Page header) -->
<div class="content-header">
   <div class="container-fluid">
   </div>
   <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card round-1">
               <!-- /.card-header -->
               <!-- form start -->
                <div class="card-body round-1 p-0">
                    <div class="container">
                        <div class="row">
                          <div class="col-12 pt-2">
                            <div class="row">
                              <div class="col-12 border-bottom bw-2 p-3 text-center">
                                <div class="d-flex justify-content-between">
                                    <p class="h5">Kode kata baru</p>
                                    <div>
                                      <a href="<?=base_url()?>/master/kode-kata" class="btn btn-default btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-12 pt-3 px-3">
                                 <form  class="form-horizontal" action="<?= base_url() ?>/master/kode-kata-update" method="post">
                                    <input type="hidden" value="<?= (isset($inp_val['id_kode_kata'])) ? $inp_val['id_kode_kata'] : ''?>" name="id_kode_kata" id="id_kode_kata" >
                                    <div class="form-group row">
                                       <label for="grup_kata" class="col-sm-2 col-form-label">Grup Kata</label>
                                       <div class="col-sm-10">
                                          <input value="<?= (isset($inp_val['grup_kata'])) ? $inp_val['grup_kata'] : ''?>" type="text" class="form-control bw-2 border-primary round-1" name="grup_kata" id="grup_kata" placeholder="Grup Kata" >
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="nomor_kode" class="col-sm-2 col-form-label">Kode Kata</label>
                                       <div class="col-sm-10">
                                          <input value="<?= (isset($inp_val['nomor_kode'])) ? $inp_val['nomor_kode'] : ''?>" type="number" class="form-control bw-2 border-primary round-1" name="nomor_kode" id="nomor_kode" placeholder="Nomor Kata">
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label for="tampilan_kata" class="col-sm-2 col-form-label">Password</label>
                                       <div class="col-sm-10">
                                          <input value="<?= (isset($inp_val['tampilan_kata'])) ? $inp_val['tampilan_kata'] : ''?>" type="text" class="form-control bw-2 border-primary round-1" name="tampilan_kata" id="tampilan_kata" placeholder="Tampilan Kata">
                                       </div>
                                    </div>
                              </div>
                            </div>
                           <!-- /.card-body -->
                            <div class="row">
                              <div class="col-12 border-top bw-2 p-3 text-center">
                                <div class="row">
                                  <?php if(isset($show['delete_button'])) :?>
                                  <div class="col-6">
                                  <button type="submit" class="btn-block round-1 btn btn-primary" name="simpan" value="simpan">Simpan</button>
                                  </div>
                                  <div class="col-6">
                                  <button type="submit" class="btn-block round-1 btn btn-danger" name="delete" value="delete"  onclick="return confirm('Data yang dihapus tidak dapat dikembalikan, Apakah Anda Yakin?')" >Delete</button>
                                  </div>
                                  <?php else :?>
                                  <div class="col-12">
                                  <button type="submit" class="btn-block round-1 btn btn-primary" name="simpan" value="simpan">Simpan</button>
                                  </div>
                                  <?php endif;?>
                                </div>
                              </div>
                            </div>
                           <!-- /.card-footer -->
                           </form>
                          </div>
                        </div>
                    </div>
                </div>
               <!-- /.card-footer -->
            </div>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
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
                           <a href="<?= base_url() ?>/master/kode-kata" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
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