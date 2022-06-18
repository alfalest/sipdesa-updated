<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];
    public $session;
    public $post;
    public $data = [];
    public $chek_db;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->session = \Config\Services::session();
        $this->post = $this->request->getPost();
        // E.g.: $this->session = \Config\Services::session();
        $this->data['login_session'] = $this->user_session();
        $this->data['hari_ini'] = $this->hari_ini()['hari'] . ', ' . $this->hari_ini()['tanggal'] . ' ' . $this->hari_ini()['bulan'] . ' ' . $this->hari_ini()['tahun'];
        helper('Date_helper');
        helper('Ganti_teks_helper');
        $this->check_db();
        $this->check_db_table();
    }


    /**
     * Method cek_login. jika
     * @param bool $session_key['_return'] default false return void, jika set ke true maka return bool
     * @param string $session_key['_redirect'] hyperlink
     * @param array $session_key data untuk cek key sesuai dengan value session atau tidak
     * 
     * example $session_key = [
     * 'tipe_user' => [ 1 , 2 ],
     * 'email_verified' => 2,
     * 'status_user => 2,
     * '_redirect' => base_url(),
     * ]
     * 
     */

    public function check_db_table()
    {

        helper('Array_filepro_install_helper');
        $db = \Config\Database::connect();
        $arr_tbl = filepro_install();
        $tbl_not_exist = false;

        foreach ($arr_tbl as $value) {
            if (!$db->tableExists($value)) {
                $tbl_not_exist = true;
            }
        }
        if ($tbl_not_exist) {
            $url = base_url() . '/install-table';
            $current_url = str_replace('/index.php', '', current_url());

            $pattern = "/" . str_replace('/', '\/', $url) . "/";
            preg_match($pattern, $current_url, $match);

            if (count($match) == 0) {
                header("Location: " . $url);
                exit;
            }
        }
        // if ($tbl_not_exist) {
        //     $url = base_url() . '/install-table';
        //     $current_url = str_replace('/index.php', '', current_url());
        //     if (!str_contains($current_url, $url)) {
        //         header("Location: " . $url);
        //         exit;
        //     }
        // }
    }

    public function user_session()
    {
        $session = \Config\Services::session();
        $login_session = [];
        if ($session->get('login_session')) {
            $login_session =  $session->get('login_session');
        }
        return $login_session;
    }

    public function check_db()
    {
        $db = \Config\Database::connect();
        $tables = $db->listTables();
        $this->data['arr_db_connection'][] = json_encode($db);
        foreach ($tables as $table) {
            $this->data['arr_db_connection'][] = $table;
        }
        $this->data['arr_db_connection'] = json_encode($this->data['arr_db_connection']);
    }

    public function hari_ini($date = '')
    {
        $hari = [
            1 => 'Minggu',
            2 => 'Senin',
            3 => 'Selasa',
            4 => 'Rabu',
            5 => 'Kamis',
            6 => 'Jumat',
            7 => 'Sabtu'
        ];
        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $dates = [
            'hari' => $hari[date('N')],
            'tanggal' => date('j'),
            'bulan' => $bulan[date('n')],
            'tahun' => date('Y')
        ];

        if ($date != '') {
            $dates = [
                'hari' => $hari[date('N', strtotime($date))],
                'tanggal' => date('j', strtotime($date)),
                'bulan' => $bulan[date('n', strtotime($date))],
                'tahun' => date('Y', strtotime($date))
            ];
        }
        return $dates;
    }

    public function cek_login($session_key = [])
    {

        $this->check_db_table();
        $session = \Config\Services::session();

        $url = '';
        $return = false;

        $izinkan = [];
        if (count($session_key)) {
            if (isset($session_key['_redirect']) && filter_var($session_key['_redirect'], FILTER_VALIDATE_URL)) {
                $url = $session_key['_redirect'];
                unset($session_key['_redirect']);
            }
            if (isset($session_key['_return']) && gettype($session_key['_return']) == 'boolean') {
                $return = $session_key['_return'];
                unset($session_key['_return']);
            }

            $login_session = $session->get('login_session');
            if ($login_session) {
                foreach ($session_key as $key => $value) {
                    if (is_array($value)) {
                        if (in_array($login_session[$key], $value)) {
                            $izinkan[] = true;
                        } else {
                            $izinkan[] = false;
                        }
                    } else {
                        if ($login_session[$key] == $value) {
                            $izinkan[] = true;
                        } else {
                            $izinkan[] = false;
                        }
                    }
                }
            } else {
                $izinkan[] = false;
            }
        }

        if ($url == '') {
            $url = base_url();
        }

        if (in_array(false, $izinkan)) {

            if ($return) {
                return false;
            } else {
                header("Location: " . $url);
                exit;
            }
        } else {
            if ($return) {
                return true;
            }
        }
    }
}
