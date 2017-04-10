<?php
class Verifikasi extends BaseController {

    public static function index() {
        $data_history = Database::get("SELECT id_history, id_gejala, nama FROM history, penyakit 
										WHERE penyakit.id_penyakit = history.id_penyakit AND status_pilih = 0");		
		
        return array('verifikasi/index', compact('data_history'));
    }
	
	public static function setuju() {
		$id_history = @$_GET['id'];
        $data = array();
		
		if($id_history){
			$data_history = Database::getSingle("SELECT * FROM history WHERE id_history = '$id_history'");
			$data_history_gejala = $data_history->id_gejala;
			$data_history_gejala = explode("," , $data_history_gejala);
			
			
			$id_grup_gejala_max = Database::getSingle('SELECT  MAX(id_grup_gejala) as id FROM grup_gejala');
			$id_grup_gejala = $id_grup_gejala_max->id;
			$data_history_baru = (object) [                    
						'id_grup_gejala' => $id_grup_gejala+1,
						'id_penyakit' => $data_history->id_penyakit,                    
					];
			//echo $data_history_baru->id_grup_gejala . "&nbsp" . $data_history_baru->id_penyakit . "<br><br>";
			Database::insert("basis_pengetahuan", $data_history_baru);
			
			$data2 = (object) [
					'id_grup_gejala' => $data_history_baru->id_grup_gejala,
					'id_gejala' => ""
					];		
			//echo $data2->id_grup_gejala . "<br>";
			foreach($data_history_gejala as $v){				
				$data2->id_gejala = $v;
				//echo $data2->id_gejala . "&nbsp&nbsp";
				Database::insert('grup_gejala', $data2);
			}
			
			Database::update('history', ['status_pilih' => 1], "id_history = '$id_history'");
            $_SESSION['notif'] = "sukses";
			header("location:home.php?c=verifikasi&m=index");
		} else {
			echo "gagal";
		}
	}
	
	public static function tidak_setuju() {
		$id_history = @$_GET['id'];
        $data = array();
		
		if($id_history){
			Database::update('history', ['status_pilih' => 1], "id_history = '$id_history'");
            $_SESSION['notif'] = "sukses";
			header("location:home.php?c=verifikasi&m=index");
		} else {
			echo "gagal";
		}
	}
}
