
    <!-- Main content -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 pt-2">
            <div class="card round-1">

            <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
              <p class="font-weight-bold text-lg m-0">Tampilan</p>
              </div>
              <div>
              <a href="<?=base_url()?>/operator<?= (isset($link_back)) ? '/'.$link_back : ''?>" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              </div>
            </div> 
            </div>

              <div class="card-body p-0">   
              <div class="container-fluid p-3">
                              <div class="row">
                  <div class="col-12">
                  <p>Bukan tampilan sebenarnya. tekan print untuk melihat hasil pdf</p>
                    <a class="btn bg-indigo btn-sm rounded-pill px-3 mb-2" href="<?=base_url()?>/operator/template-dokumen-print/<?= (isset($data_template_dokumen['jenis_template'])) ? str_replace( '_' , '-' , $data_template_dokumen['jenis_template']) : ''?>/<?= (isset($data_template_dokumen['id_template_dokumen'])) ? $data_template_dokumen['id_template_dokumen'] : ''?>"><i class="fas fa-print"></i> Print</a>

                    <a class="btn btn-success btn-sm rounded-pill px-3 mb-2" href="<?=base_url()?>/operator/template-dokumen-edit/<?= (isset($data_template_dokumen['jenis_template'])) ? str_replace( '_' , '-' , $data_template_dokumen['jenis_template']) : ''?>/<?= (isset($data_template_dokumen['id_template_dokumen'])) ? $data_template_dokumen['id_template_dokumen'] : ''?>"><i class="fas fa-edit"></i> edit</a>

                  </div>
                  <div class="col-4">
                    Jenis Template
                  </div>
                  <div class="col-8">
                  <?= (isset($title_page)) ? $title_page : '' ?>
                  </div>
                  <div class="col-4">
                    Nama Template
                  </div>
                  <div class="col-8">
                    <?= $data_template_dokumen['nama_template'] ?>
                  </div>
                </div>
              </div>     

              <hr>
              <div class="row">
                <div class="col-12">
<div class="p-2" style="overflow-x: scroll; background-color:#cccccc">
<div style="margin :auto; padding: 0mm 10mm 10mm 10mm ;  width:210mm; max-width:216mm; background-color:#ffffff;">
    <?php if(isset($data_template_dokumen['template_dokumen'])) : ?>
    <?= $data_template_dokumen['template_dokumen'] ?>
    <?php endif; ?>
</div>

      </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->

    <!-- /.content -->


    <?php if(isset($data_diri_pemohon['id_data_diri'])) : 
  $icon_color = ['text-danger', 'text-success' ]; 
  $icon_symbol = ['fa-times-circle', 'fa-check-circle' ]; 
?>
<div class="modal fade" id="modal_data_diri_pemohon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
    <div class="modal-content round-1">
    <div class="modal-header border-bottom bw-2 p-0">
    <div class="container-fluid">
    <div class="row">
            <div class="col-12 p-3 text-center">
              Data Diri Pemohon
            </div>
          </div>
    </div>
    </div>
      <div class="modal-body p-0">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 p-3">
              <div class="d-flex flex-row py-2" id="data_diri_foto">
                <div class="mr-2 d-flex flex-column">
                    <?php if(isset($data_diri_pemohon['link_foto_ktp']) && $data_diri_pemohon['link_foto_ktp'] != '') : ?>
                      <img class="img-size-50" src="<?=base_url()?>/image-content/<?= $data_diri_pemohon['link_foto_ktp'] ?>" alt="<?=$data_diri_pemohon['nik']?> <?=$data_diri_pemohon['nama_lengkap']?>">
                    <?php else : ?>
                      <img class="img-size-50" src="<?=base_url()?>/images/image_state/no_picture.png" alt="No Picture : <?=$data_diri_pemohon['nik']?> <?=$data_diri_pemohon['nama_lengkap']?>">
                    <?php endif; ?>
                      <span>KTP</span>
                </div>
                <div class="mr-2 d-flex flex-column">
                    <?php if(isset($data_diri_pemohon['link_foto_diri']) && $data_diri_pemohon['link_foto_diri'] != '') : ?>
                      <img class="img-size-50" src="<?=base_url()?>/image-content/<?= $data_diri_pemohon['link_foto_diri'] ?>" alt="<?=$data_diri_pemohon['nik']?> <?=$data_diri_pemohon['nama_lengkap']?>">
                    <?php else : ?>
                      <img class="img-size-50" src="<?=base_url()?>/images/image_state/no_picture.png" alt="No Picture : <?=$data_diri_pemohon['nik']?> <?=$data_diri_pemohon['nama_lengkap']?>">
                    <?php endif; ?>
                    <span>Foto Diri</span>
                </div>
              </div>
              <table class="table">
              <tbody>
                <tr><td>Nama</td><td><?= $data_diri_pemohon['nama_lengkap'] ?></td></tr>
                <tr><td>Telepon</td><td><?= $data_diri_pemohon['telepon'] ?></td></tr>
                <tr><td>Email</td><td><?= $data_user_pemohon['email'] ?></td></tr>
                <tr><td>NIK</td><td><?= $data_diri_pemohon['nik'] ?></td></tr>
                <tr><td>Jenis Kelamin</td><td><?= $data_diri_pemohon['jenis_kelamin'] ?></td></tr>
                <tr><td>Gol. Darah</td><td><?= $data_diri_pemohon['gol_darah'] ?></td></tr>
                <tr><td>Tempat, Tgl. Lahir</td><td><?= $data_diri_pemohon['tempat_lahir'] ?>, <?= $data_diri_pemohon['tanggal_lahir'] ?></td></tr>
                <tr><td>Agama</td><td><?= $data_diri_pemohon['agama'] ?></td></tr>
                <tr><td>Pekerjaan</td><td><?= $data_diri_pemohon['jenis_pekerjaan'] ?></td></tr>
                <tr><td>Status Perkawinan</td><td><?= $data_diri_pemohon['status_perkawinan'] ?></td></tr>
                <tr><td>Kewarganegaraan</td><td><?= $data_diri_pemohon['kewarganegaraan'] ?></td></tr>
                <tr><td>Alamat</td><td><?= $data_diri_pemohon['alamat'] ?></td></tr>
                <tr><td>RT/RW</td><td><?= $data_diri_pemohon['rt'] ?>/<?= $data_diri_pemohon['rw'] ?></td></tr>
                <tr><td>Desa/Kelurahan</td><td><?= $data_diri_pemohon['kel_desa'] ?></td></tr>
                <tr><td>Kecamatan</td><td><?= $data_diri_pemohon['kecamatan'] ?></td></tr>
                <tr><td>Kota/Kabupaten</td><td><?= $data_diri_pemohon['kab_kota'] ?></td></tr>
                <tr><td>Provinsi</td><td><?= $data_diri_pemohon['provinsi'] ?></td></tr>
                <tr><td>Kode Pos</td><td><?= $data_diri_pemohon['kode_pos'] ?></td></tr>
              </tbody>
            </table>
            </div>
          </div>
         
        </div>
      </div>
      <div class="modal-footer p-0 border-top bw-2 ">
      <div class="container-fluid">
      <div class="row">
            <div class="col-12 p-3 text-center">
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