
    <!-- Main content -->
    <section class="content">
      <div class="container">
    
    <div class="row">
    <div class="col-12 pt-2">
      <div class="card round-1">
      <div class="card-body">
                <div class="row">
                  <div class="col-12 d-flex justify-content-between">
                    <p class="font-weight-bold text-lg m-0">Setting akun</p>
                    <div>
                      <a href="<?=base_url()?>/master/" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
                    </div>  
                  </div>
                </div>
          <hr>
          <div class="row">
          <div class="col-12">
          <a class="btn btn-block my-0 mx-1" href="<?= base_url() ?>/master/ganti-password-edit">
            <div class="d-flex justify-content-between">
              <div>Ganti Password</div>
              <div>
                <?php if(isset($badge_notif['ganti_password']) && $badge_notif['ganti_password'] != 0) : ?>
                  <span class="badge badge-danger mr-3"><?= $badge_notif['ganti_password'] ?></span>
                <?php endif; ?>
                <i class="fas fa-angle-right"></i>
              </div>
            </div>
          </a>
          <hr>
          </div>
          </div>
                  </div>

      </div>
      </div>
    </div>
    </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->