<!-- Main content -->
<div class="container">
  <div class="row">
    <div class="col-12 pt-2">
      <div class="card round-1">

        <div class="card-header pr-3">
          <div class="d-flex justify-content-between">
            <div>
              <p class="font-weight-bold text-lg m-0">Detail Surat Kelahiran</p>
            </div>
            <div>
              <?php if (isset($data_surat_kelahiran['status_surat_kelahiran'])) {
                switch ($data_surat_kelahiran['status_surat_kelahiran']) {
                  case 1:
                    $filename = 'diproses';
                    break;
                  case 2:
                    $filename = 'diterima';
                    break;
                  case 3:
                    $filename = 'ditolak';
                    break;

                  default:
                    break;
                }
              }
              ?>
              <a href="<?= base_url() ?>/penduduk/surat-kelahiran<?= (isset($filename)) ? '/' . $filename : '' ?>" class="btn btn-primary btn-sm rounded-pill"><i class="fas fa-times"></i></a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <?php $status_surat_kelahiran = [1 => '<span class="badge badge-info">proses</span>', 2 => '<span class="badge badge-success">diterima</span>', 3 => '<span class="badge badge-danger">ditolak</span>']; ?>
          <?php $keterangan_operator = [1 => '<span class=""><i>Menunggu Proses Verifikasi</i></span>', 2 => '<span class=""><i>Verifikasi diterima, data Anda telah masuk dalam Basis Data</i></span>', 3 => '<span class=""><i>Verifikasi ditolak, Periksa kembali data yang Anda masukan dan ulangi proses dengan lebih teliti</i></span>']; ?>
          <div class="row">
            <div id="kartu_keluarga_list" class="col-12">
              <div class="border shadow-sm round-1 mb-3 p-2">
                <div class="d-flex justify-content-between border-bottom pb-2">
                  <div class="d-flex flex-row">
                    <div class="mr-3">
                      <?= $status_surat_kelahiran[$data_surat_kelahiran['status_surat_kelahiran']] ?>
                    </div>
                    <div class="text-sm text-muted"><?= date('H:i:s , d-m-Y', strtotime($data_surat_kelahiran['update_time'])) ?></div>
                  </div>
                  <div class="">
                    <?php if ($data_surat_kelahiran['status_surat_kelahiran'] == 1) : ?>
                      <a href="<?= base_url() ?>/penduduk/surat-kelahiran-edit/<?= $data_surat_kelahiran['id_surat_kelahiran'] ?>" class="px-3 py-0 btn btn-sm btn-success round-1 text-sm"><i class="fas fa-edit"></i> Edit</a>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="py-2 row" id="foto_lampiran_surat_kelahiran">
                  <div class="col-6 col-lg-4 mb-2">
                    <div class="h-100 text-center border bw-2 p-2">
                      <span>KTP Ayah</span><br>
                      <?php if (isset($data_surat_kelahiran['link_foto_ktp_ayah']) && $data_surat_kelahiran['link_foto_ktp_ayah'] != '') : ?>
                        <img class="img-size-50" style="cursor: zoom-in;" src="<?= base_url() ?>/image-content/<?= $data_surat_kelahiran['link_foto_ktp_ayah'] ?>" alt="<?= $data_surat_kelahiran['nik_ayah'] ?> <?= $data_surat_kelahiran['nama_ayah'] ?>">
                      <?php else : ?>
                        <img class="img-size-50" style="cursor: zoom-in;" src="<?= base_url() ?>/images/image_state/no_picture.png" alt="No Picture : <?= $data_surat_kelahiran['nik_ayah'] ?> <?= $data_surat_kelahiran['nama_ayah'] ?>">
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-6 col-lg-4 mb-2">
                    <div class="h-100 text-center border bw-2 p-2">
                      <span>KTP Ibu</span><br>
                      <?php if (isset($data_surat_kelahiran['link_foto_ktp_ibu']) && $data_surat_kelahiran['link_foto_ktp_ibu'] != '') : ?>
                        <img class="img-size-50" style="cursor: zoom-in;" src="<?= base_url() ?>/image-content/<?= $data_surat_kelahiran['link_foto_ktp_ibu'] ?>" alt="<?= $data_surat_kelahiran['nik_ibu'] ?> <?= $data_surat_kelahiran['nama_ibu'] ?>">
                      <?php else : ?>
                        <img class="img-size-50" style="cursor: zoom-in;" src="<?= base_url() ?>/images/image_state/no_picture.png" alt="No Picture : <?= $data_surat_kelahiran['nik_ibu'] ?> <?= $data_surat_kelahiran['nama_ibu'] ?>">
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-6 col-lg-4 mb-2">
                    <div class="h-100 text-center border bw-2 p-2">
                      <span>Kartu Keluarga</span><br>
                      <?php if (isset($data_surat_kelahiran['link_foto_kartu_keluarga']) && $data_surat_kelahiran['link_foto_kartu_keluarga'] != '') : ?>
                        <img class="img-size-50" style="cursor: zoom-in;" src="<?= base_url() ?>/image-content/<?= $data_surat_kelahiran['link_foto_kartu_keluarga'] ?>" alt="Kartu Keluarga">
                      <?php else : ?>
                        <img class="img-size-50" style="cursor: zoom-in;" src="<?= base_url() ?>/images/image_state/no_picture.png" alt="No Picture Kartu Keluarga">
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="col-6 col-lg-4 mb-2">
                    <div class="h-100 text-center border bw-2 p-2">
                      <span>Buku Nikah</span><br>
                      <?php if (isset($data_surat_kelahiran['link_foto_buku_nikah']) && $data_surat_kelahiran['link_foto_buku_nikah'] != '') : ?>
                        <img class="img-size-50" style="cursor: zoom-in;" src="<?= base_url() ?>/image-content/<?= $data_surat_kelahiran['link_foto_buku_nikah'] ?>" alt="Buku Nikah">
                      <?php else : ?>
                        <img class="img-size-50" style="cursor: zoom-in;" src="<?= base_url() ?>/images/image_state/no_picture.png" alt="No Picture Buku Nikah">
                      <?php endif; ?>
                    </div>

                  </div>
                  <div class="col-6 col-lg-4 mb-2">
                    <div class="h-100 text-center border bw-2 p-2">
                      <span>Akta Perkawinan</span><br>
                      <?php if (isset($data_surat_kelahiran['link_foto_akta_perkawinan']) && $data_surat_kelahiran['link_foto_akta_perkawinan'] != '') : ?>
                        <img class="img-size-50" style="cursor: zoom-in;" src="<?= base_url() ?>/image-content/<?= $data_surat_kelahiran['link_foto_akta_perkawinan'] ?>" alt="Akta Perkawinan">
                      <?php else : ?>
                        <img class="img-size-50" style="cursor: zoom-in;" src="<?= base_url() ?>/images/image_state/no_picture.png" alt="No Picture Akta Perkawinan>">
                      <?php endif; ?>
                    </div>

                  </div>
                </div>
                <div class="">
                  <div class="align-middle text-sm font-weight-bold">Keterangan :</div>

                  <div class="align-middle text-sm"><?= (isset($data_surat_kelahiran['keterangan_operator']) && $data_surat_kelahiran['keterangan_operator'] != '') ? $data_surat_kelahiran['keterangan_operator'] : $keterangan_operator[$data_surat_kelahiran['status_surat_kelahiran']] ?></div>

                </div>
                <div>
                  <hr>
                  <div class="p-3 text-md font-weight-bold">Data Kelahiran</div>

                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Jam Lahir</td>
                        <td><?= (isset($data_surat_kelahiran['jam_lahir'])) ? $data_surat_kelahiran['jam_lahir'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Kelahiran Anak Ke</td>
                        <td><?= (isset($data_surat_kelahiran['kelahiran_anak_ke'])) ? $data_surat_kelahiran['kelahiran_anak_ke'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Tempat Dilahirkan</td>
                        <td><?= (isset($data_surat_kelahiran['tempat_dilahirkan'])) ? $data_surat_kelahiran['tempat_dilahirkan'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelahiran</td>
                        <td><?= (isset($data_surat_kelahiran['jenis_kelahiran'])) ? $data_surat_kelahiran['jenis_kelahiran'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Penolong Kelahiran</td>
                        <td><?= (isset($data_surat_kelahiran['penolong_kelahiran'])) ? $data_surat_kelahiran['penolong_kelahiran'] : '' ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div>
                  <hr>
                  <div class="p-3 text-md font-weight-bold">Data Anak</div>

                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Nama</td>
                        <td><?= (isset($data_surat_kelahiran['nama_anak'])) ? $data_surat_kelahiran['nama_anak'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>NIK</td>
                        <td><?= (isset($data_surat_kelahiran['nik_anak'])) ? $data_surat_kelahiran['nik_anak'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td><?= (isset($data_surat_kelahiran['jenis_kelamin_anak'])) ? $data_surat_kelahiran['jenis_kelamin_anak'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Tempat, Tgl. Lahir</td>
                        <td><?= (isset($data_surat_kelahiran['tempat_lahir_anak'])) ? $data_surat_kelahiran['tempat_lahir_anak'] : '' ?>, <?= (isset($data_surat_kelahiran['tanggal_lahir_anak'])) ? date('d-m-Y', strtotime($data_surat_kelahiran['tanggal_lahir_anak'])) : '' ?></td>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td><?= (isset($data_surat_kelahiran['agama_anak'])) ? $data_surat_kelahiran['agama_anak'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Pekerjaan</td>
                        <td><?= (isset($data_surat_kelahiran['jenis_pekerjaan_anak'])) ? $data_surat_kelahiran['jenis_pekerjaan_anak'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td><?= (isset($data_surat_kelahiran['alamat_anak'])) ? $data_surat_kelahiran['alamat_anak'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>RT/RW</td>
                        <td><?= (isset($data_surat_kelahiran['rt_anak'])) ? $data_surat_kelahiran['rt_anak'] : '' ?>/<?= (isset($data_surat_kelahiran['rw_anak'])) ? $data_surat_kelahiran['rw_anak'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Kode Pos</td>
                        <td><?= (isset($data_surat_kelahiran['kode_pos_anak'])) ? $data_surat_kelahiran['kode_pos_anak'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Desa / Kelurahan</td>
                        <td>
                          <?= (isset($data_surat_kelahiran['kel_desa_anak'])) ? $data_surat_kelahiran['kel_desa_anak'] : '' ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Kecamatan</td>
                        <td>
                          <?= (isset($data_surat_kelahiran['kecamatan_anak'])) ? $data_surat_kelahiran['kecamatan_anak'] : '' ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Kabupaten / Kota</td>
                        <td>
                          <?= (isset($data_surat_kelahiran['kab_kota_anak'])) ? $data_surat_kelahiran['kab_kota_anak'] : '' ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Provinsi</td>
                        <td>
                          <?= (isset($data_surat_kelahiran['provinsi_anak'])) ? $data_surat_kelahiran['provinsi_anak'] : '' ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div>
                  <hr>
                  <div class="p-3 text-md font-weight-bold">Data Ayah</div>

                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Nama</td>
                        <td><?= (isset($data_surat_kelahiran['nama_ayah'])) ? $data_surat_kelahiran['nama_ayah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>NIK</td>
                        <td><?= (isset($data_surat_kelahiran['nik_ayah'])) ? $data_surat_kelahiran['nik_ayah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td><?= (isset($data_surat_kelahiran['jenis_kelamin_ayah'])) ? $data_surat_kelahiran['jenis_kelamin_ayah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Tempat, Tgl. Lahir</td>
                        <td><?= (isset($data_surat_kelahiran['tempat_lahir_ayah'])) ? $data_surat_kelahiran['tempat_lahir_ayah'] : '' ?>, <?= (isset($data_surat_kelahiran['tanggal_lahir_ayah'])) ? date('d-m-Y', strtotime($data_surat_kelahiran['tanggal_lahir_ayah'])) : '' ?></td>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td><?= (isset($data_surat_kelahiran['agama_ayah'])) ? $data_surat_kelahiran['agama_ayah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Pekerjaan</td>
                        <td><?= (isset($data_surat_kelahiran['jenis_pekerjaan_ayah'])) ? $data_surat_kelahiran['jenis_pekerjaan_ayah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td><?= (isset($data_surat_kelahiran['alamat_ayah'])) ? $data_surat_kelahiran['alamat_ayah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>RT/RW</td>
                        <td><?= (isset($data_surat_kelahiran['rt_ayah'])) ? $data_surat_kelahiran['rt_ayah'] : '' ?>/<?= (isset($data_surat_kelahiran['rw_ayah'])) ? $data_surat_kelahiran['rw_ayah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Kode Pos</td>
                        <td><?= (isset($data_surat_kelahiran['kode_pos_ayah'])) ? $data_surat_kelahiran['kode_pos_ayah'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Desa / Kelurahan</td>
                        <td>
                          <?= (isset($data_surat_kelahiran['kel_desa_ayah'])) ? $data_surat_kelahiran['kel_desa_ayah'] : '' ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Kecamatan</td>
                        <td>
                          <?= (isset($data_surat_kelahiran['kecamatan_ayah'])) ? $data_surat_kelahiran['kecamatan_ayah'] : '' ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Kabupaten / Kota</td>
                        <td>
                          <?= (isset($data_surat_kelahiran['kab_kota_ayah'])) ? $data_surat_kelahiran['kab_kota_ayah'] : '' ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Provinsi</td>
                        <td>
                          <?= (isset($data_surat_kelahiran['provinsi_ayah'])) ? $data_surat_kelahiran['provinsi_ayah'] : '' ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div>
                  <hr>
                  <div class="p-3 text-md font-weight-bold">Data Ibu</div>

                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Nama</td>
                        <td><?= (isset($data_surat_kelahiran['nama_ibu'])) ? $data_surat_kelahiran['nama_ibu'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>NIK</td>
                        <td><?= (isset($data_surat_kelahiran['nik_ibu'])) ? $data_surat_kelahiran['nik_ibu'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td><?= (isset($data_surat_kelahiran['jenis_kelamin_ibu'])) ? $data_surat_kelahiran['jenis_kelamin_ibu'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Tempat, Tgl. Lahir</td>
                        <td><?= (isset($data_surat_kelahiran['tempat_lahir_ibu'])) ? $data_surat_kelahiran['tempat_lahir_ibu'] : '' ?>, <?= (isset($data_surat_kelahiran['tanggal_lahir_ibu'])) ? date('d-m-Y', strtotime($data_surat_kelahiran['tanggal_lahir_ibu'])) : '' ?></td>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td><?= (isset($data_surat_kelahiran['agama_ibu'])) ? $data_surat_kelahiran['agama_ibu'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Pekerjaan</td>
                        <td><?= (isset($data_surat_kelahiran['jenis_pekerjaan_ibu'])) ? $data_surat_kelahiran['jenis_pekerjaan_ibu'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td><?= (isset($data_surat_kelahiran['alamat_ibu'])) ? $data_surat_kelahiran['alamat_ibu'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>RT/RW</td>
                        <td><?= (isset($data_surat_kelahiran['rt_ibu'])) ? $data_surat_kelahiran['rt_ibu'] : '' ?>/<?= (isset($data_surat_kelahiran['rw_ibu'])) ? $data_surat_kelahiran['rw_ibu'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Kode Pos</td>
                        <td><?= (isset($data_surat_kelahiran['kode_pos_ibu'])) ? $data_surat_kelahiran['kode_pos_ibu'] : '' ?></td>
                      </tr>
                      <tr>
                        <td>Desa / Kelurahan</td>
                        <td>
                          <?= (isset($data_surat_kelahiran['kel_desa_ibu'])) ? $data_surat_kelahiran['kel_desa_ibu'] : '' ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Kecamatan</td>
                        <td>
                          <?= (isset($data_surat_kelahiran['kecamatan_ibu'])) ? $data_surat_kelahiran['kecamatan_ibu'] : '' ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Kabupaten / Kota</td>
                        <td>
                          <?= (isset($data_surat_kelahiran['kab_kota_ibu'])) ? $data_surat_kelahiran['kab_kota_ibu'] : '' ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Provinsi</td>
                        <td>
                          <?= (isset($data_surat_kelahiran['provinsi_ibu'])) ? $data_surat_kelahiran['provinsi_ibu'] : '' ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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

<?php if (isset($message_info)) :
  $icon_color = ['text-danger', 'text-success'];
  $icon_symbol = ['fa-times-circle', 'fa-check-circle'];
?>
  <div class="modal fade" id="modal_message_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content round-1">
        <div class="modal-body p-0">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12 p-3 text-center">
                <i class="p-2 mb-2 fa-6x fa-fw far <?= $icon_symbol[$message_info['status']] ?> <?= $icon_color[$message_info['status']] ?>"></i>
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