<?php
class Data_diagnosis extends BaseController {

    public static function index() {
        $data = Database::get("SELECT id_bp, id_grup_gejala, penyakit.nama as nama FROM basis_pengetahuan, penyakit
								WHERE penyakit.id_penyakit = basis_pengetahuan.id_penyakit");
		//$data2 = Database::get("SELECT * FROM penyakit");
		$kode_gejala = Database::get("SELECT * FROM grup_gejala");
        return array('data_diagnosis/index', compact('data', 'kode_gejala'));
    }
	
	public static function edit() {
	
		$data_bp = Database::get("SELECT * FROM basis_pengetahuan");
		$data = array();		
		$id = @$_GET['id'];
		
        if ($id) {
            $data = Database::getSingle("
                SELECT *
                FROM basis_pengetahuan
                WHERE id_bp = {$id}");
        }
		
		if(@$_POST['data_gejala']) {		
			$error = self::save_gejala();
			$data_gejala = (object) $_POST['data_gejala'];
			if($error) {
				$_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = $error;
			} else {
				return;
			}
		}
		
		if(@$_POST['data'] && @$_POST['data2']) {		
			$error = self::save();
			$data2 = (object) $_POST['data2'];
			$data = (object) $_POST['data'];
			if($error) {
				$_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = $error;
			} else {
				return;
			}
		}
		
		
		
		$penyakit = Database::get('SELECT * FROM penyakit');
		$gejala = Database::get('SELECT * FROM gejala');
		$id_grup_gejala = Database::getSingle('SELECT  MAX(id_grup_gejala) as id FROM grup_gejala');
		
        return array('data_diagnosis/edit', compact('data', 'penyakit', 'gejala', 'id_grup_gejala','data_bp'));
	}
	
	public static function save() {
        $id = $_POST['id'];
        $data2 = (object) $_POST['data2'];
		$data = (object) $_POST['data'];
        $error = array();
        if (@empty($data2->id_gejala)) {
            $error[] = 'Kode Gejala harus diisi!';
        }

        if ($error) {
            return '<div>' . implode('</div><div>', $error) . '</div>';
        } else {
			$id_gejala = explode(",", $data2->id_gejala);
			foreach($id_gejala as $v){
				$data2->id_gejala = $v;
				Database::insert('grup_gejala', $data2);
			}
			Database::insert('basis_pengetahuan', $data);
			//$data2->id_gejala = Database::insertId();
			
            //$_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = 'Data Berhasil Disimpan';
			header("location: home.php?c=data_diagnosis&m=edit");
            return;
        }
    }
	
	public static function save_gejala() {
        $id = $_POST['id'];
        $data_gejala = (object) $_POST['data_gejala'];
        $error = array();
        if (@empty($data_gejala->nama)) {
            $error[] = 'Gejala harus diisi!';
        }

        if ($error) {
            return '<div>' . implode('</div><div>', $error) . '</div>';
        } else {
			Database::insert('gejala', $data_gejala);
			$data_gejala->id_gejala = Database::insertId();
			
            //$_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = 'Data Berhasil Disimpan';
			header("location: home.php?c=data_diagnosis&m=edit");
            return;
        }
    }
	
	public static function delete() {
        if( Database::delete('basis_pengetahuan', "id_bp = {$_GET['id']}") ) {
            //$_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = 'Data Berhasil Dihapus';
        } else {
            $_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = 'Data Gagal Dihapus';
        }
		header("location: home.php?c=data_diagnosis&m=index");
    }
}
