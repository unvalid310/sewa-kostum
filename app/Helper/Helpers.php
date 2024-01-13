<?php
if (!function_exists('rupiah')) {
    # code...
    function rupiah($value) {
        return "Rp. ".number_format($value, 0, ',', '.');
    }
}

if (!function_exists('tanggal')) {
    # code...
    function tanggal($tanggal) {
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $date = explode(' ', $tanggal);
        $pecahkan = explode('-', $date[0]);
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
}
