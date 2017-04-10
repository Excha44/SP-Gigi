<?php

class Helper
{

    public static function idNumber($number)
    {
        return number_format($number, 0, ',', '.');
    }

    public static function idDate($date)
    {
        return $date ? date('d-m-Y', strtotime($date)) : '';
    }

    public static function enDate($date)
    {
        return $date ? date('Y-m-d', strtotime($date)) : '';
    }
	
	/*
    public static function getUniqueNomorKredit()
    {
        $nomor = '';
        do {
            $nomor = sprintf('%s%s%s%s-%s%s%s%s-%s%s%s%s', rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9));
            $kredit = Database::getSingle("SELECT COUNT(0) jumlah FROM kredit WHERE nomor = '{$nomor}'");
        } while ($kredit->jumlah > 0);
        return $nomor;
    }

    public static function getUniqueNomorPembayaran()
    {
        $nomor = '';
        do {
            $nomor = sprintf('%s%s%s%s-%s%s%s%s-%s%s%s%s-%s%s%s%s', rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9));
            $kredit = Database::getSingle("SELECT COUNT(0) jumlah FROM pembayaran WHERE nomor = '{$nomor}'");
        } while ($kredit->jumlah > 0);
        return $nomor;
    }
	*/
	
    public static function hitungDpMurni($dp, $jangka, $mobil, $parameter)
    {
        $dp_murni = $dp - ($parameter->asuransi * $mobil->harga / 100 - $parameter->administrasi);
        $faktor = (1 + ($jangka * 5 / 100)) / ($jangka * 12);
        $pembilang = $dp_murni - ($mobil->harga * ($faktor + $parameter->provisi / 100));
        $pembagi = 1 - $faktor - $parameter->provisi / 100;
        $dp_murni = $pembilang / $pembagi;
        return $dp_murni;
    }
    
    public static function hitungCicilan($dp_murni, $jangka, $mobil, $parameter)
    {
        $pokok_hutang = $mobil->harga - $dp_murni;
        $parameter = (array) $parameter;
        $cicilan = ($pokok_hutang + ($pokok_hutang * $jangka * $parameter['bunga_' . $jangka] / 100)) / ($jangka * 12);
        $cicilan = round($cicilan, -3);
        return $cicilan;
    }
    
    public static function hitungDenda($kredit, $tanggal_bayar, $parameter)
    {
        $tanggal_tempo = $kredit->tanggal_mulai;
        $tanggal_bayar = Helper::enDate($tanggal_bayar);
        $tanggal_tempo = Helper::enDate($tanggal_tempo);
        
        $date = date('j', strtotime($tanggal_tempo));
        $month = date('m');
        $year = date('Y');
        
        $tanggal_jatuh_tempo = sprintf('%s-%s-%s', $year, $month, $date);
        
        $selisih = 0;
        if(strtotime($tanggal_bayar) > strtotime($tanggal_jatuh_tempo)) {
            $date1 = date_create($tanggal_bayar);
            $date2 = date_create($tanggal_jatuh_tempo);
            $selisih = date_diff($date1, $date2)->format('%a');
        }
        return $selisih * $parameter->denda * $kredit->cicilan / 100;
    }
    
    public static function getStatusKredit($statusId = false)
    {
        $list = [
            10 => 'Menunggu',
            20 => 'Diproses',
            30 => 'Diterima',
            40 => 'Kredit Berjalan',
            50 => 'Lunas',
            60 => 'Ditolak',
        ];
        return $statusId ? $list[$statusId] : $list;
    }
    
    public static function getStatusPembayaran($statusId = false)
    {
        $list = [
            10 => 'Menunggu',
            20 => 'Berhasil',
            30 => 'Gagal',
        ];
        return $statusId ? $list[$statusId] : $list;
    }

}
