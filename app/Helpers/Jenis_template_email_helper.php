<?php


function jenis_template_email(){
    $data = [
        'template_verifikasi_email' => [
            'nama_alias',
            'email',
            'link_verifikasi'
        ],
        'template_lupa_password' => [
            'nama_alias',
            'email',
            'link_lupa_password'
        ]
    ];
    return $data;
}