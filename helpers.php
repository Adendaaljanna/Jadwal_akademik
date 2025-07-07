<?php

if (!function_exists('formatTanggalIndo')) {
    function formatTanggalIndo($tanggal)
    {
        if (!$tanggal) return '';
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $tgl = date('j', strtotime($tanggal));
        $bln = $bulan[(int)date('n', strtotime($tanggal))];
        $thn = date('Y', strtotime($tanggal));
        return "$tgl $bln $thn";
    }
}

if (!function_exists('formatJam')) {
    function formatJam($jam)
    {
        if (!$jam) return '';
        return date('H:i', strtotime($jam));
    }
} 