
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="login-logo">
      <a href="<?= base_url() ?>"><b>SIP</b>DESA</a>
      </div>
  <div class="card round-1">
    <div class="card-body round-1 login-card-body">
      <p class="login-box-msg">Install</p>
      <div class="row">
      <div class="col-12">
        <table class="table">
        <thead>
          <tr>
            <th>Table</th>
            <th>Column</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($table_field as $key => $value) : ?>
            <tr>
              <td>
              <div class="row">
                <div class="col-lg-6 mb-2">
                   <?= $key ?>
                </div>
                <div class="col-lg-6 mb-2">
                <?php if(isset($table_field_exist[$key])) : ?>
                table ada
                <button disabled class="btn btn-sm btn-primary btn-block">
                  Install table
                </button>
                  <?php if(isset($file_seeder[$key])) : ?>
                    <a href="<?= base_url() ?>/install-table-seeder/<?= $key ?>" class="btn btn-sm btn-success btn-block">
                      <?= $file_seeder[$key] ?>_seeder
                    </a>
                  <?php endif; ?>
                  <?php if(isset($file_seeder_custom[$key])) : ?>
                    <?php foreach($file_seeder_custom[$key] as $val_seeder_custom) :  ?>
                    <a href="<?= base_url() ?>/install-table-seeder/<?= $key ?>/<?=$val_seeder_custom?>" class="btn btn-sm btn-success btn-block">
                      <?= $val_seeder_custom ?>
                    </a>
                    <?php endforeach; ?>
                  <?php endif; ?>
                <?php else : ?>
                table tidak ada
                <a href="<?= base_url() ?>/install-table/<?= $key ?>" class="btn btn-sm btn-primary btn-block">
                Install table
                </a>
                <?php if(isset($file_seeder[$key])) : ?>
                    <button disabled class="btn btn-sm btn-success btn-block">
                      <?= $file_seeder[$key] ?>_seeder
                    </button>
                  <?php endif; ?>

                  <?php if(isset($file_seeder_custom[$key])) : ?>
                    <?php foreach($file_seeder_custom[$key] as $val_seeder_custom) :  ?>
                    <button disabled class="btn btn-sm btn-success btn-block">
                     <?= $val_seeder_custom ?>
                    </button>
                    <?php endforeach; ?>
                  <?php endif; ?>

                <?php endif; ?>
                </div>
              </div>
           
              
              </td>
          
              <td>
              
              <?php foreach ($value as $keys => $values) : ?>
              <div class="row">
                <div class="col-lg-6 mb-2">
                  <div class="text-success">
                    name: <?= $keys ?><br>
                    <?php foreach($values as $keyss => $valuess) : ?>
                      <?= $keyss ?> : <?= $valuess ?><br>
                    <?php endforeach; ?>
                    </div>
                      
                    <?php if(isset($table_field_dt[$key][$keys])) :?>
                  <div class="text-danger">
                    <?php foreach($table_field_dt[$key][$keys] as $keyss => $valuess) : ?>
                      <?= $keyss ?> : <?= $valuess ?><br>
                      <?php unset($table_field_dt[$key][$keys]); ?>
                    <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
                  </div>
                <div class="col-lg-6 mb-2">
                <?php if(isset($table_field_exist[$key]) && in_array($keys, $table_field_exist[$key])) : ?>
                 kolom ada
                  <button disabled class="btn btn-sm btn-primary btn-block">
                  Install column
                  </button>
             
                <?php elseif(!isset($table_field_exist[$key])) : ?>
                  tidak bisa buat kolom
                  <button disabled class="btn btn-sm btn-primary btn-block">
                  Install column
                  </button>
                <?php else : ?>
                  kolom tidak ada
                  <a href="<?= base_url() ?>/install-table/<?= $key ?>/<?=$keys?>" class="btn btn-sm btn-primary btn-block">
                  Install column
                  </a>
                <?php endif; ?>
                </div>
              </div>
              <hr>
              <?php endforeach; ?>

              <?php if(isset($table_field_dt[$key])) :  ?>
                <?php foreach($table_field_dt[$key] as $values_dt) : ?>
                  <div class="row">
                    <div class="col-lg-6 mb-2">
                      <div class="text-danger">
               
                        <?php foreach( $values_dt as $keys_dt => $valuess_dt) : ?>
                          <?= $keys_dt ?> : <?= $valuess_dt ?><br>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <div class="col-lg-6 mb-2">
                    </div>
                  </div>
                    <hr>
                <?php endforeach; ?>
              <?php endif; ?>

              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        </table>
      </div>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
  </div>
  </div>
</div>

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
                  <a href="<?= base_url() ?>/login" class="font-weight-bold btn-block btn-primary btn btn-sm round-1" data-dismiss="modal">KEMBALI</a>
                </div>
                <div class="col-6">
                  <button type="button" class="font-weight-bold btn-block btn-primary btn btn-sm round-1" data-dismiss="modal">OK</button>
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