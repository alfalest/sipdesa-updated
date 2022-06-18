

    <!-- Main content -->
    <section class="content">
      <div class="container">
      
        <div class="row">
          <div class="col-12 pt-2">

          <div class="card round-1">
              
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-header pr-3">
            <div class="d-flex justify-content-between">
              <div>
              <p class="font-weight-bold text-lg m-0">Kode Kata</p>
              </div>
              <div>
              <a href="<?=base_url()?>/master" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
              </div>
            </div> 
            </div>
                <div class="card-body round-1 p-0">
                <div class="container">
                <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <form action="" method="get">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent border border-right-0 bw-2 border-primary round-1-bl round-1-tl">
                                                <i class="fas fa-search text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="cari" id="cari" class="border-left-0 border-right-0 border-primary bw-2 form-control" value="<?=(isset($inp_val['cari']) && $inp_val['cari'] != '') ? $inp_val['cari'] : '' ?>">
                                        <span class="input-group-append">
                                            <button type="submit" class="border border-left-0 bw-2 border-primary btn-primary btn btn-sm round-1-br round-1-tr">Cari</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <?php if(isset($inp_val['cari']) && $inp_val['cari'] != '') : ?>
                            <div class="mb-3">
                                Pencarian: <a href="<?= base_url() ?>/master/kode-kata" class="text-danger"><?= $inp_val['cari'] ?> <i class="fas fa-times"></i></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                  <div class="row">
                    <div class="col-12">
                    <div class="border-bottom px-2 pb-2 pt-3 d-flex justify-content-between">
                      <p class="h5">List Kode Kata</p>
                      <span><?=(isset($jml_ditemukan)) ? $jml_ditemukan : '0' ?>/<?=(isset($jml_semua)) ? $jml_semua : '0' ?></span>
                      <div>
                        <a href="<?=base_url()?>/master/kode-kata-edit" class="btn btn-success btn-sm round-1"><i class="fas fa-plus"></i></a>
                      </div>
                      
                    </div>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-12">
                            <div class="table-responsive">
                              <table class="table table-head-fixed table-sm text-nowrap">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Grup</th>
                                    <th>Kode</th>
                                    <th>Tampilan</th>
                                    <th class="text-center">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php if( isset($kode_kata) && count($kode_kata) ) :?>
                                <?php
                                $no_urut = 1;
                                 if(isset($halaman_ini) && isset($item_per_page)){
                                   $no_urut = ((($halaman_ini - 1) * $item_per_page ) + 1 );
                                 }
                                  ?>
                                <?php foreach($kode_kata as $value) : ?>
                                  <tr>
                                    <td><?=isset($no_urut) ? $no_urut: ''?></td>
                                    <td><?=$value['grup_kata']?></td>
                                    <td><?=$value['nomor_kode']?></td>
                                    <td><?=$value['tampilan_kata']?></td>
                                    <td class="text-center"><a href="<?= base_url() ?>/master/kode-kata-edit/<?=$value['id_kode_kata']?>" class="btn btn-sm btn-success round-1"><i class="fas fa-edit"></i></a></td>
                                  </tr>
                                <?php
                              $no_urut++;
                              endforeach; ?>
                                <?php else : ?>
                                  <tr>
                                    <td colspan="6">
                                    Tidak ada kode kata
                                    </td>
                                  </tr>
                                <?php endif; ?>
                                </tbody>
                              </table>
                    
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <?= (isset($pager) ) ? $pager->links('kode_kata', 'sipdesa_pager') : "" ?>
                      </div>
                    </div>
                  </div>
                  <br>
                </div>
                <!-- /.card-footer -->
              
              
            </div>


          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

