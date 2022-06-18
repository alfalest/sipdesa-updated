<?php

namespace App\Controllers;


class Install_table extends BaseController
{

    public function __construct()
    {
        helper('Array_seed_custom_helper');
    }

    public function index($param_tbl = '', $param_col = '')
    {

        $this->data['table_field_exist'] = [];
        $this->data['table_field_data'] = [];
        $this->data['table_field'] = [];
        $this->data['file_seeder'] = [];
        $this->data['file_seeder_custom'] = arr_seed_custom();

        $message_info = ['status' => 0, 'text' => ''];


        foreach (filepro_install() as $value) {
            if (file_exists(ROOTPATH . 'app/Helpers/Filepro_' . $value . '_helper.php')) {

                $helper_name = 'Filepro_' . $value . '_helper';
                helper($helper_name);
                $func_helper = 'funcpro_' . $value;
                $this->data['table_field'] = array_merge($this->data['table_field'], $func_helper());

                if(file_exists(ROOTPATH . 'app/Database/Seeds/' . ucfirst($value) . '_seeder.php')){
                    $this->data['file_seeder'][$value] = ucfirst($value);
                }

            }
        }

        $db = \Config\Database::connect();
        $arr_list_table = [];
        if(count($this->data['table_field'])){
            foreach ($this->data['table_field'] as $key => $value) {
                if($db->tableExists($key)){
                    $this->data['table_field_exist'][$key] = $db->getFieldNames($key);
                    $this->data['table_field_data'][$key] = $db->getFieldData($key);

                    foreach ($this->data['table_field_data'] as $key_d => $value_d) {
                        foreach ($value_d as $key_f => $value_f) {
                            $value_f = json_decode(json_encode($value_f), true);
                            $this->data['table_field_dt'][$key_d][$value_f['name']] = $value_f;
                        }
                    }
                    
                }
            }
        }

        $tbl_not_exist = false;

        foreach (filepro_install() as $value) {
            if(!$db->tableExists($value)){
                $tbl_not_exist = true;
            }
        }

        if(!$tbl_not_exist){
            return redirect()->to( base_url());
            exit;
        }


        if(isset($param_tbl) && $param_tbl != ''){

            if($param_col != ''){
                if(isset($this->data['table_field_exist'][$param_tbl])){
                    if(!in_array( $param_col , $this->data['table_field_exist'][$param_tbl])){
                        if( $this->create_column($param_tbl, $param_col)){
                            $message_info['status'] = 1;
                            $message_info['text'] .= 'Column '.$param_tbl.' berhasil di install <br>';
                            $this->session->setFlashdata('message_info', $message_info);
                            return redirect()->to( base_url().'/install-table');
                        } else {
                            $message_info['text'] .= 'Column '.$param_tbl.' gagal di install <br>';
                            $this->session->setFlashdata('message_info', $message_info);
                            return redirect()->to( base_url().'/install-table');
                            exit;
                        }
                    } else {
                        $message_info['text'] .= 'Column '.$param_col.' sudah ada<br>';
                        $this->session->setFlashdata('message_info', $message_info);
                        return redirect()->to( base_url().'/install-table');
                        exit;
                    }
                } else {
                    $message_info['text'] .= 'Table '.$param_tbl.' belum terinstall <br>';
                    $this->session->setFlashdata('message_info', $message_info);
                    return redirect()->to( base_url().'/install-table');
                    exit;
                }
            } else {
                if(!isset($this->data['table_field_exist'][$param_tbl])){

                    //doing forge here
    
                    //if forge success;
                    if( $this->create_table($param_tbl)){
                        $message_info['status'] = 1;
                        $message_info['text'] .= 'Table '.$param_tbl.' berhasil di install <br>';
                        $this->session->setFlashdata('message_info', $message_info);
                        return redirect()->to( base_url().'/install-table');
                    } else {
                        $message_info['text'] .= 'Table '.$param_tbl.' gagal di install <br>';
                        $this->session->setFlashdata('message_info', $message_info);
                        return redirect()->to( base_url().'/install-table');
                        exit;
                    }
                    
    
    
                } else {
                    $message_info['text'] .= 'Table '.$param_tbl.' sudah terinstall <br>';
                    $this->session->setFlashdata('message_info', $message_info);
                    return redirect()->to( base_url().'/install-table');
                    exit;
                }
            }
        }

      
        if ($this->session->getFlashdata('message_info')) {
            $this->data['message_info'] = $this->session->getFlashdata('message_info') ;
        }

        $this->data['tbl_installed'] = filepro_install();
        $this->data['tbl_install'] = $arr_list_table;

        $this->data['v']['script'] = 'install_table';
        $this->data['v']['page'] = 'install_table';
        return view('App\Views\login_register', $this->data);
        
    }

    public function index_seeder($param_tbl = '', $param_seed = ''){
        $message_info = ['status' => 0, 'text' => ''];

        if($param_tbl != '' ) {
            if($param_seed != ''){
                $seeder_name = $param_seed;
                if(file_exists(ROOTPATH . 'app/Database/Seeds/' . $param_seed . '.php')){
                    $seeder = \Config\Database::seeder();
                    if(!$seeder->call($seeder_name)){
                        $message_info['status'] = 1;
                        $message_info['text'] .= 'Melakukan custom seeder untuk table '.$param_tbl.', Seeder file '.$seeder_name.'<br>';    
                    } else {
                        $message_info['text'] .= 'Error seeder table '.$param_tbl.', file '.$seeder_name.'<br>';    
                    }
                } else {
                    $message_info['text'] .= 'Seeder custom '.$seeder_name.' tidak ada <br>';
                }
            } else {
                $seeder_name = ucfirst($param_tbl).'_seeder';
                if(file_exists(ROOTPATH . 'app/Database/Seeds/' . ucfirst($param_tbl) . '_seeder.php')){
                    $seeder = \Config\Database::seeder();
                    if(!$seeder->call($seeder_name)){
                        $message_info['status'] = 1;
                        $message_info['text'] .= 'Melakukan seeder untuk table '.$param_tbl.', Seeder file '.$seeder_name.'<br>';    
                    } else {
                        $message_info['text'] .= 'Error seeder table '.$param_tbl.', file '.$seeder_name.'<br>';    
                    }
                } else {
                    $message_info['text'] .= 'Seeder '.$seeder_name.' tidak ada <br>';
                }
            }
        } else {
            $message_info['text'] .= 'Seeder '.ucfirst($param_tbl).' tidak ada <br>';
        }
        
        $this->session->setFlashdata('message_info', $message_info);
        return redirect()->to( base_url().'/install-table');
        exit;
    }

    public function create_table($param_tbl = '')
    {
        $all_field = $this->data['table_field'];
        if($param_tbl != '' && count($all_field) && isset($all_field[$param_tbl])){
            $forge = \Config\Database::forge();
            $fields = $all_field[$param_tbl];
            $forge->addField($fields);
            foreach ($fields as $key => $value) {
                if (array_key_exists('auto_increment', $value)) {
                    $forge->addKey($key, true);
                }
            }
            return $forge->createTable($param_tbl);
        } else {
            return false;
        }
    }



    public function create_column($param_tbl = '', $param_col = '')
    {
        $all_field = $this->data['table_field'];
        if($param_tbl != '' && count($all_field) && isset($all_field[$param_tbl]) && $param_col != '' && isset($all_field[$param_tbl][$param_col])){
            $forge = \Config\Database::forge();
            $field[$param_col] = $all_field[$param_tbl][$param_col];
            if (array_key_exists('auto_increment', $field[$param_col] )) {
                $field[$param_col]['first'] = true;
                unset($field[$param_col]['auto_increment']);
                if( $forge->addColumn($param_tbl, $field) ){
                    
                    $db = \Config\Database::connect(); 
                    $query_primary_key = "ALTER TABLE '".$param_tbl."' ADD PRIMARY KEY ('".$param_col."')";
                    $query_auto_increment = "ALTER TABLE '".$param_tbl."' ADD PRIMARY KEY ('".$param_col."')";
                    $query_add = "ALTER TABLE ".$param_tbl." CHANGE ".$param_col." ".$param_col." INT(11) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (".$param_col.")";

                    $db->transStart();
                    $db->query($query_add);
                    $db->transComplete();

                    if ($db->transStatus() === false) {
                        return false;
                    } else {
                        return true;
                    }
                } else {
                    return false;
                }
            } else {
                return $forge->addColumn($param_tbl, $field);
            }
        } else {
            return false;
        }
    }


}
