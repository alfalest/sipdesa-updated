<?php

function get_now()

{
    return date('Y-m-d H:i:s');
}

function get_date(){
    return date('Y-m-d');
}


function ubah_tanggal($date = ''){
        $hari = [ 
            1=> 'Minggu',
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
            'tahun' => date('Y'),
            'jam' => date('H'),
            'menit' => date('i'),
            'detik' => date('s')

        ];

        if($date != ''){
            $dates = [
                'hari' => $hari[date('N',strtotime($date))],
                'tanggal' => date('j',strtotime($date)),
                'bulan' => $bulan[date('n',strtotime($date))],
                'tahun' => date('Y',strtotime($date)),
                'jam' => date('H',strtotime($date)),
                'menit' => date('i',strtotime($date)),
                'detik' => date('s',strtotime($date))
            ];
        }
        return $dates;
    }


function post_date($date)
{
    return date('Y-m-d',strtotime($date));
}


function datediff_minutes($date1, $date2, $return)
{
    // Declare and define two dates
    $date1 = strtotime($date1); 
    $date2 = strtotime($date2); 
    // Formulate the Difference between two dates
    $diff = abs($date2 - $date1); 
    // To get the year divide the resultant date into
    // total seconds in a year (365*60*60*24)
    $years = floor($diff / (365*60*60*24)); 
    // To get the month, subtract it with years and
    // divide the resultant date into
    // total seconds in a month (30*60*60*24)
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
    // To get the day, subtract it with years and 
    // months and divide the resultant date into
    // total seconds in a days (60*60*24)
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    // To get the hour, subtract it with years, 
    // months & seconds and divide the resultant
    // date into total seconds in a hours (60*60)
    $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)  / (60*60));
    $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 
    // To get the minutes, subtract it with years,
    // months, seconds and hours and divide the 
    // resultant date into total seconds i.e. 60
    switch ($return)
    {
        case 1:
            return $years;
        break;
        case 2:
            return $months;
        break;
        case 3:
            return $days;
        break;
        case 4:
            return $hours;
        break;
        case 5:
            return $minutes;
        break;
        default:
        break;
    }
}