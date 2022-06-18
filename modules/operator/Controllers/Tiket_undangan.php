<?php

namespace Operator\Controllers;

use App\Controllers\BaseController;
use Operator\Models\Tbl_perubahan_kk;
use Operator\Models\Tbl_tiket;
use Operator\Models\Tbl_surat_kelahiran;
use Operator\Models\Tbl_user;
use Config\Paths;

class Tiket_undangan extends BaseController
{
    public $tbl_perubahan_kk;
    public $tbl_tiket;
    public $tbl_surat_kelahiran;
    public $tbl_user;
    public function __construct()
    {
        $this->tbl_perubahan_kk = new Tbl_perubahan_kk();
        $this->tbl_tiket = new Tbl_tiket();
        $this->tbl_surat_kelahiran = new Tbl_surat_kelahiran();
        $this->tbl_user = new Tbl_user();
        $this->cek_login([
            'tipe_user' => 2,
            'status_user' => 2,
            'email_verified' => 2
        ]);
        helper('Date_helper');
        helper('form');
    }

    public function index($param = '')
    {
        $data_kk = [];
        $id_user = 0;

        $this->get = $this->request->getGet();
        $urutan = "ASC";
        switch ($param) {
            case 'menunggu':
                $this->data['status_tiket_state'] = 1;
                $status_tiket_state = 1;
                break;
            case 'hadir':
                $this->data['status_tiket_state'] = 2;
                $status_tiket_state = 2;
                $urutan = "DESC";
                break;
            case 'tidak-hadir':
                $this->data['status_tiket_state'] = 3;
                $status_tiket_state = 3;
                $urutan = "DESC";
                break;
            case 'hari-ini':
                $hari_ini = date('Y-m-d');
                $this->data['status_tiket_state'] = 4;
                $status_tiket_state = 1;
                break;
            default:
                $this->data['status_tiket_state'] = 1;
                $status_tiket_state = 1;
                break;
        }


        //SELECT * FROM `tbl_surat_kelahiran` WHERE `tanggal_lahir_anak` BETWEEN '2022-03-01' AND '2022-03-30'

        if (isset($this->session->get('login_session')['id_user'])) {
            $id_user = $this->session->get('login_session')['id_user'];
        }

        $per_page = 5;
        if (isset($hari_ini)) {
            $arr_where = ['tbl_tiket.status_tiket' =>  $status_tiket_state, 'tbl_tiket.tanggal_kunjungan_tiket' => $hari_ini];
        } else {
            $arr_where = ['tbl_tiket.status_tiket' =>  $status_tiket_state];
        }
        if (isset($this->get['cari']) && $this->get['cari'] != '') {
            $this->data['inp_val']['cari'] = $this->get['cari'];

            $this->data['kk_proses'] = $this->tbl_user->where($arr_where)
                ->like('tbl_tiket.nomor_tiket', $this->get['cari'])
                ->orLike('tbl_tiket.keterangan_tiket', $this->get['cari'])
                ->orLike('tbl_user.nama_alias', $this->get['cari'])
                ->orLike('tbl_user.email', $this->get['cari'])
                ->join('tbl_tiket', 'tbl_user.id_user = tbl_tiket.id_user')
                ->orderBy("tbl_tiket.update_time", $urutan)
                ->paginate($per_page, 'sk');
        } else {
            $this->data['kk_proses'] = $this->tbl_user->where($arr_where)
                ->join('tbl_tiket', 'tbl_user.id_user = tbl_tiket.id_user')
                ->orderBy("tbl_tiket.update_time", $urutan)
                ->paginate($per_page, 'sk');
        }

        $this->data['tipedata_session'] = 'No Data';
        if ($this->session->get('tipedata_session')) {
            $tipedata_session = $this->session->get('tipedata_session');
            if (is_array($tipedata_session)) {
                $this->data['tipedata_session'] = 'Is Array Data';
            } else {
                $this->data['tipedata_session'] = 'Not Array Data';
            }
        }

        $this->data['pager'] = $this->tbl_user->pager;

        $this->data['v']['page'] = 'tiket_undangan';
        $this->data['v']['script'] = 'tiket_undangan';
        return view('Operator\Views\dashboard_sidebar', $this->data);
    }
}
