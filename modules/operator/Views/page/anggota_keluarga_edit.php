
    <!-- Main content -->
      <div class="container">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">
            <div class="card-header">
        <div class="card-title">
          <h5 class="font-weight-bold">Verifikasi Anggota Keluarga</h5>
        </div>
        <div class="card-tools">
          <div>
      
                    <?php if($data_nik['status_perubahan_nik'] == 1) : ?>
                      <a href="<?= base_url() ?>/operator/anggota-keluarga-lihat/<?=$data_nik['id_perubahan_nik']?>" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              
                      <?php else : ?>
                      <a href="<?=base_url()?>/operator/anggota-keluarga" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                    <?php endif; ?>


          </div>
        </div>
      </div>

              <div class="card-body">                
              <div class="row">
                  <div class="col-12 d-flex justify-content-between">
                    <p class="font-weight-bold text-lg m-0">Anggota Keluarga</p>
                    <div>
                    </div>  
                  </div>
                </div>
              <hr>
              <div class="border shadow-sm round-1 d-flex flex-column mb-3 p-2">
                  <div class="d-flex justify-content-between border-bottom pb-2">
                    <div class="d-flex flex-row">
                      <div class="mr-3">
                      </div>
                      <div class="text-sm text-muted"><?= date( 'H:i:s , d-m-Y' , strtotime($data_nik['update_time']))?></div>
                    </div>
                    <div class="">
                    
                    </div>
                  </div>
                  <div class="d-flex flex-row py-2">
                  <?php if(isset($data_kk)) : ?>
                    <div class="mr-2" id="kartu_keluarga_foto">
                    <?php if(isset($data_kk['link_foto_kk']) && $data_kk['link_foto_kk'] != '') : ?>
                      <img class="img-size-50" src="<?=base_url()?>/image-content/<?= $data_kk['link_foto_kk'] ?>" alt="<?=$data_kk['nkk']?> <?=$data_kk['nama_kepala_keluarga']?>">
                    <?php else : ?>
                      <img class="img-size-50" src="<?=base_url()?>/images/image_state/no_picture.png" alt="No Picture : <?=$data_kk['nkk']?> <?=$data_kk['nama_kepala_keluarga']?>">
                    <?php endif; ?>
                    </div>
                    <div class="d-flex flex-column">
                      <div class="align-middle text-sm"><a href="<?=base_url()?>/operator/anggota-keluarga-lihat/<?=$data_kk['id_master_kk']?>"><span style="letter-spacing:0.15em" class="font-weight-bold"><?=$data_kk['nkk']?></span></a></div>
                      <div class="align-middle text-sm font-weight-bold"><?=$data_kk['nama_kepala_keluarga']?></div>
                      <div class="align-middle text-sm"><?= date( 'd-m-Y' , strtotime($data_kk['tanggal_dikeluarkan']))?></div>
                    </div>

                  <?php else : ?>
                    <div class="border border-danger p-2 round-1">
                      <span class="text-danger font-weight-bold">Belum ada kartu keluarga dengan nomor <?= $data_nik['nkk'] ?> yang terverifikasi.</span>
                    </div>
                  <?php endif; ?>

                  </div>
                  <div>
                      <table class="table">
                        <tbody>
                          <?php 
                            $arr_data_nik = [
                              'nama_lengkap' => 'Nama Lengkap',
                              'nik' => 'NIK',
                              'jenis_kelamin' => 'Jenis Kelamin',
                              'gol_darah' => 'Gol. Darah',
                              'tempat_lahir' => 'Tempat Lahir',
                              'agama' => 'Agama',
                              'pendidikan_terakhir' => 'Pendidikan Terakhir',
                              'jenis_pekerjaan' => 'Pekerjaan',
                              'status_perkawinan' => 'Status Perkawinan',
                              'status_hubungan_dalam_keluarga' => 'Status hubungan dalam keluarga',
                              'kewarganegaraan' => 'Kewarganegaraan',
                              'no_paspor' => 'No. Paspor',
                              'no_kitap' => 'No. KITAP',
                              'nama_ayah' => 'Nama Ayah',
                              'nama_ibu' => 'Nama Ibu',
                            ];
                          ?>
                          <?php foreach ($arr_data_nik as $key => $value) :?>
                          <?php if (isset($data_nik[$key])) :?>
                            <tr>
                            <td><?= $value ?></td>
                            <td>
                              <?php if($key == 'nik' || $key == 'nkk') : ?>
                                <span style="letter-spacing:0.15em;" class="font-weight-bold"><?= $data_nik[$key] ?></span>
                              <?php else : ?>
                                <?= $data_nik[$key] ?>
                              <?php endif; ?>
                            </td>
                            </tr>
                          <?php endif; ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                  </div>
                </div>

              <form action="<?=base_url()?>/operator/anggota-keluarga-update" id="kartu_keluarga" method="post">
              <input value="<?=(isset($data_nik['id_perubahan_nik']))? $data_nik['id_perubahan_nik'] : '' ?>" name="id_perubahan_nik" type="hidden"  id="id_perubahan_nik">
              <div class="form-group row">
                  <div class="col-lg-4  text-sm text-muted font-weight-bold">
                  Verifikasi
                  </div>     
                  <div class="col-lg-8">
                    <div class="custom-control custom-radio">
                      <input type="radio" name="status_perubahan_nik" id="status_perubahan_nik_terima" class="custom-control-input custom-control-input-success" value="2" <?=(isset($data_nik['status_perubahan_nik']) && $data_nik['status_perubahan_nik'] == 2 )?  'checked' : '' ?> required>
                      <label for="status_perubahan_nik_terima" class="custom-control-label">Terima</label>    
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" name="status_perubahan_nik" id="status_perubahan_nik_tolak" class="custom-control-input custom-control-input-danger" value="3" <?=(isset($data_nik['status_perubahan_nik']) && $data_nik['status_perubahan_nik'] == 3 )?  'checked' : '' ?>>
                      <label for="status_perubahan_nik_tolak" class="custom-control-label">Tolak</label>    
                    </div>
                  </div>
              </div>
                  <div class="form-group row">
                    <label for="keterangan_operator" class="col-lg-4 text-sm text-muted">Catatan</label>
                    <div class="col-lg-8">
                      <textarea name="keterangan_operator" max-length="100" id="keterangan_operator" alt="Masukan Keterangan" title="Masukan Keterangan" class="form-control bw-2 border-primary round-1"><?=(isset($data_nik['keterangan_operator']))? $data_nik['keterangan_operator'] : '' ?></textarea>
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
                  <a href="<?= base_url() ?>/operator/anggota-keluarga" class="font-weight-bold btn-block btn-primary btn round-1">KEMBALI</a>
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