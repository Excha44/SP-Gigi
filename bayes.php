<?php
include_once "helper/database.php";
session_start();


if(@$_POST['pilih_gejala']){
	$pilih_gejala = @$_POST['pilih_gejala'];
	$jumlah = count($pilih_gejala);
	
	/*
	foreach($pilih_gejala as $v){
	echo $v;
	}
	*/
	
	$jumlah_penyakit_db = Database::getSingle("SELECT COUNT(id_penyakit) as jumlah_penyakit FROM penyakit");
	$jumlah_penyakit = $jumlah_penyakit_db->jumlah_penyakit;
	
	$jumlah_gejala_db = Database::getSingle("SELECT COUNT(id_gejala) as jumlah_gejala FROM gejala");
	$jumlah_gejala = $jumlah_gejala_db->jumlah_gejala;
	//echo $jumlah_gejala;
	
	$prob_gejala = array();
	
	
	// Menghitung probabilitas yang dipilih
	for($j=1; $j<=$jumlah_gejala; $j++){
		for($i=1; $i<=$jumlah_penyakit; $i++){
			
			// Menghitung jumlah gejala $i dari semua basis pengetahuan dengan kode penyakit $i
			$jumlah_gejala_penyakit_db = Database::getSingle("SELECT COUNT(grup_gejala.id_gejala) as jumlah_gejala 
										FROM gejala NATURAL JOIN basis_pengetahuan NATURAL JOIN grup_gejala 
										WHERE id_gejala = '$j' AND id_penyakit= '$i'");
			$jumlah_gejala_penyakit = $jumlah_gejala_penyakit_db->jumlah_gejala;
			
			// Menghitung jumlah penyakit kode $i pada BP
			$jumlah_penyakit_bp_db = Database::getSingle("SELECT COUNT(id_bp) as jumlah_bp FROM basis_pengetahuan WHERE id_penyakit = '$i'");
			$jumlah_penyakit_bp = $jumlah_penyakit_bp_db->jumlah_bp;
			$prob_gejala[$j][$i] = 0;
			for ($x=0 ; $x<$jumlah; $x++) {			
				if($j == $pilih_gejala[$x]){					
					$prob_gejala[$j][$i]= $jumlah_gejala_penyakit / $jumlah_penyakit_bp;
					if($prob_gejala[$j][$i]>0 && $prob_gejala[$j][$i]<1){
						$prob_gejala[$j][$i] = number_format($prob_gejala[$j][$i],2);
					}				
				} 					
			}
			 
		}
	}
	
	
	
	// Menghitung probabilitas penyakit
	$prob_penyakit = array();
	$jumlah_data_bp_db = Database::getSingle("SELECT COUNT(id_bp) as jumlah FROM basis_pengetahuan"); 
	$jumlah_data_bp = $jumlah_data_bp_db->jumlah;
	
	for($i=1; $i<=$jumlah_penyakit; $i++){
		
		$jumlah_kemunculan_penyakit_db = Database::getSingle("SELECT COUNT(id_bp) as jumlah
										FROM basis_pengetahuan
										WHERE id_penyakit= '$i'");
		$jumlah_kemunculan_penyakit = $jumlah_kemunculan_penyakit_db->jumlah;
		
		$prob_penyakit[$i] = $jumlah_kemunculan_penyakit / $jumlah_data_bp;
		
		if($prob_penyakit[$i]>0 && $prob_penyakit[$i]<1){
			$prob_penyakit[$i] = number_format($prob_penyakit[$i],2);
		}
	}
	
	$prob_akhir = array();
	
	//Menghitung pembilang untuk masuk rumus bayes
	$pembilang = array();
	for($i=1; $i<=$jumlah_penyakit; $i++) {
		$pembilang[$i] = 1;
		for($j=0; $j<$jumlah; $j++){
			$pembilang[$i] = $pembilang[$i] * $prob_gejala[$pilih_gejala[$j]][$i]; 
		}
		$pembilang[$i] = $pembilang[$i] * $prob_penyakit[$i];			
		
		if($pembilang[$i]>0 && $pembilang[$i]<1){
			$pembilang[$i] = number_format($pembilang[$i],2);
		}
	}
	
	//Menghitung pembagi untuk masuk rumus bayes
	
	$pembagi = array();
	$pembagi_total = 0;
	for($i=1; $i<=$jumlah_penyakit; $i++) {
		$pembagi[$i] = 1;
		for($j=0; $j<$jumlah; $j++){
			$pembagi[$i] = $pembagi[$i] * $prob_gejala[$pilih_gejala[$j]][$i];						
		}
		
		$pembagi[$i] = $pembagi[$i] * $prob_penyakit[$i];
		
		if($pembagi[$i]>0 && $pembagi[$i]<1){
			$pembagi[$i] = number_format($pembagi[$i],2);
		}
		
		$pembagi_total += $pembagi[$i];
	}
	$pembagi_total = number_format($pembagi_total,2);	
	//echo $pembagi_total . "<br>" . $prob_penyakit[2] ."<br><br>";
	
	if ($pembagi_total == 0){
		//echo "Tidak terdeteksi";
	} else {
		$prob_akhir = array();
		for($i=1; $i<=$jumlah_penyakit; $i++){
			$prob_akhir[$i] = $pembilang[$i] / $pembagi_total;
			
			if($prob_akhir[$i]>0 && $prob_akhir[$i]<1){
				$prob_akhir[$i] = number_format($prob_akhir[$i],2);
			}
			//echo $prob_akhir[$i] . "&nbsp &nbsp &nbsp";
		}	
	
	}
	
	// Mencari prob_akhir terbesar$
	$temp_terbesar = 0;
	$indek_terbesar = 1;
	$peluang_penyakit = 0;
	for($i=1; $i<=$jumlah_penyakit; $i++){
		if($prob_akhir[$i] > $temp_terbesar){
			$temp_terbesar = $prob_akhir[$i];
			$indek_terbesar = $i;
			$peluang_penyakit = $prob_akhir[$i];
		}			
	}

	//Cek Treshold
	if($temp_terbesar < 0.7){
	
		header("location:error.php");
	} else {
		//echo "<br>Penyakit: &nbsp" . $indek_terbesar . "<br>Indek terbesar: &nbsp" . $indek_terbesar;
		$id_user = Database::getSingle("SELECT id FROM user WHERE username = '{$_SESSION['user']}'");

		$data_history = (object) [
						'tanggal' => date("Y-m-d"),
						'id_gejala' => implode(",", $pilih_gejala),
						'id_penyakit' => $indek_terbesar,
						'id_user' => $id_user->id,
						'status_pilih' => "0",
					];
		if(@$_SESSION['user']) {
		    Database::insert('history', $data_history);
		}
		$_SESSION['penyakit'] = $indek_terbesar;
		$_SESSION['prob'] = $peluang_penyakit;
		header("location:result.php");

		//header("location:result.php?p=$indek_terbesar&r=$peluang_penyakit");


	}
	
}
else if(!@$_POST['pilih_gejala']){
    $_SESSION['error'] = "*Gejala harus dipilih untuk dapat mendiagnosis" ;
    header("location:diagnosis.php");
}
?>