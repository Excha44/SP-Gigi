<?php
class Home {

    public static function katalog() {
        
        $where = '';
        if($search = @$_GET['search']) {
            $searches = explode(' ', $search);
            $fields = 'mobil.nama,merk_mobil.nama,jenis_mobil.nama,spesifikasi.transmisi';
            $first = "AND CONCAT({$fields}) LIKE '%";
            $last = "%' ";
            $where = $first . implode($last . $first, $searches) . $last;
            $where = "WHERE 1 {$where}";    
			 $data = Database::get("
                SELECT mobil.*, merk_mobil.nama AS merk, gambar, transmisi
                FROM mobil
				JOIN spesifikasi ON spesifikasi.mobil_id = mobil.id
                JOIN merk_mobil ON merk_mobil.id = mobil.merk_mobil_id
                JOIN jenis_mobil ON jenis_mobil.id = mobil.jenis_mobil_id
                LEFT JOIN galeri ON galeri.mobil_id = mobil.id AND galeri.urutan = 0
                {$where}
            ");	
			return array('home/search', compact('data'));
        }
        
		/*
        $data = Database::get("
                SELECT mobil.*, merk_mobil.nama AS merk, gambar, transmisi
                FROM mobil
				JOIN spesifikasi ON spesifikasi.mobil_id = mobil.id
                JOIN merk_mobil ON merk_mobil.id = mobil.merk_mobil_id
                JOIN jenis_mobil ON jenis_mobil.id = mobil.jenis_mobil_id
                LEFT JOIN galeri ON galeri.mobil_id = mobil.id AND galeri.urutan = 0
                {$where}
            ");
		*/		
		
		$data_at = Database::get("
                SELECT mobil.*, merk_mobil.nama AS merk, gambar, transmisi
                FROM mobil
				JOIN spesifikasi ON spesifikasi.mobil_id = mobil.id
                JOIN merk_mobil ON merk_mobil.id = mobil.merk_mobil_id
                JOIN jenis_mobil ON jenis_mobil.id = mobil.jenis_mobil_id
                LEFT JOIN galeri ON galeri.mobil_id = mobil.id AND galeri.urutan = 0
                WHERE transmisi = 'Automatic'
            ");
			
		$data_manual = Database::get("
                SELECT mobil.*, merk_mobil.nama AS merk, gambar, transmisi
                FROM mobil
				JOIN spesifikasi ON spesifikasi.mobil_id = mobil.id
                JOIN merk_mobil ON merk_mobil.id = mobil.merk_mobil_id
                JOIN jenis_mobil ON jenis_mobil.id = mobil.jenis_mobil_id
                LEFT JOIN galeri ON galeri.mobil_id = mobil.id AND galeri.urutan = 0
                WHERE transmisi = 'Manual'
            ");
		
		
        return array('home/katalog', compact('data_at', 'data_manual'));
    }
    
    public static function viewKatalog()
    {
        $id = Database::escapeString( $_GET['id'] );
		
        $data = Database::getSingle("
                SELECT mobil.*, merk_mobil.nama AS merk, jenis_mobil.nama AS jenis
                FROM mobil
                JOIN merk_mobil ON merk_mobil.id = mobil.merk_mobil_id
                JOIN jenis_mobil ON jenis_mobil.id = mobil.jenis_mobil_id
                WHERE mobil.id = '{$id}'
            ");
		
		
		$spesifikasi = Database::getSingle("SELECT * FROM spesifikasi WHERE mobil_id = '{$id}'");
        $galeri = Database::get("SELECT * FROM galeri WHERE mobil_id = '{$id}' ORDER BY urutan");
        return array('home/view-katalog', compact('data', 'galeri', 'spesifikasi'));
    }
    
    public static function help()
    {
        return array('home/help');
    }
    
    public static function profil()
    {
        return array('home/profil');
    }

}
