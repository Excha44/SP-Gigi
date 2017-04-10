<?php
class Penyakit extends BaseController {

    public static function index() {
        $data = Database::get("SELECT * FROM gejala");
		$data2 = Database::get("SELECT * FROM penyakit");
        return array('penyakit/index', compact('data', 'data2'));
    }
	
	public static function edit() {        
		$id = @$_GET['id'];
        $data = array();
        if ($id) {
            $data = Database::getSingle("
                SELECT *
                FROM gejala
                WHERE id_gejala = {$id}");
        }
		
		if(@$_POST) {
			$error = self::save();
			$data = (object) $_POST['data'];
            if($error) {
                $_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = $error;
            } else {
                return;
            }
		}
        return array('penyakit/edit_gejala', compact('data'));
    }
	
	public static function editpenyakit() {        
		$id = @$_GET['id'];
        $data = array();
        if ($id) {
            $data = Database::getSingle("
                SELECT *
                FROM penyakit
                WHERE id_penyakit = {$id}");
        }
		
		if(@$_POST) {
			$error = self::savepenyakit();
			$data = (object) $_POST['data'];
            if($error) {
                $_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = $error;
            } else {
                return;
            }
		}
        return array('penyakit/edit_penyakit', compact('data'));
    }
	
	public static function save() {
        $id = $_POST['id'];
        $data = (object) $_POST['data'];
        $error = array();
        if (@empty($data->nama)) {
            $error[] = 'Nama harus diisi!';
        }

        if ($error) {
            return '<div>' . implode('</div><div>', $error) . '</div>';
        } else {
			if ($id) {
				Database::update('gejala', $data, "id_gejala = {$_POST['id']}");
				$data->id_gejala = $_POST['id'];
			} else {
				Database::insert('gejala', $data);
				$data->id_gejala = Database::insertId();
			}
            //$_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = 'Data Berhasil Disimpan';
			header("location: home.php?c=penyakit&m=index");
            return;
        }
    }
	
	public static function savepenyakit() {
        $id = $_POST['id'];
        $data = (object) $_POST['data'];
        $error = array();
        if (@empty($data->nama)) {
            $error[] = 'Nama harus diisi!';
        }

        if ($error) {
            return '<div>' . implode('</div><div>', $error) . '</div>';
        } else {
			if ($id) {
				$gambar = $_FILES['gambar']['name'];
				if(!$gambar) {
					$error[] = 'Gambar harus diisi!';
				} elseif (!in_array($_FILES['galeri']['type']['gambar'][$index], ['image/jpeg', 'image/png', 'image/gif'])) {
					$error[] = 'Gambar harus berisi file JPG, PNG, atau GIF!';
				}
				//$UploadedFileName=$_FILES['UploadImage']['name'];
			
				Database::update('penyakit', $data, "id_penyakit = {$_POST['id']}");
				
				if($_FILES['gambar']['name']){
					//$upload_directory = "../images/"; //This is the folder which you created just now
					$filename = sprintf('images/%s.jpeg', $id);	
					//$upload_directory = "../images/";
					//$TargetPath=time().$gambar
					if(move_uploaded_file($_FILES['gambar']['tmp_name'], '../' . $filename)){    
						//$QueryInsertFile="INSERT INTO TableName SET ImageColumnName='$TargetPath'";
						Database::update('penyakit', ['gambar'=>$filename], "id_penyakit = {$id}");	
						//mysql_query("UPDATE penyakit SET gambar = '$TargetPath' WHERE id = $id");						
					// Write Mysql Query Here to insert this $QueryInsertFile   .                   
					}
				}
				$data->id_penyakit = $_POST['id'];
			} else {
				Database::insert('penyakit', $data);			
				$data->id_penyakit = Database::insertId();
				if($_FILES['gambar']['name']){
					//$upload_directory = "../images/"; //This is the folder which you created just now
					$filename = sprintf('images/%s.jpeg', $data->id_penyakit);	
					//$upload_directory = "../images/";
					//$TargetPath=time().$gambar
					if(move_uploaded_file($_FILES['gambar']['tmp_name'], '../' . $filename)){    
						//$QueryInsertFile="INSERT INTO TableName SET ImageColumnName='$TargetPath'";
						Database::update('penyakit', ['gambar'=>$filename], "id_penyakit = {$data->id_penyakit}");	
						//mysql_query("UPDATE penyakit SET gambar = '$TargetPath' WHERE id = $id");						
					// Write Mysql Query Here to insert this $QueryInsertFile   .                   
					}
				}
			}
			
			
            //$_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = 'Data Berhasil Disimpan';
			header("location: home.php?c=penyakit&m=index");
            return;
        }
    }
	
	public static function delete() {
        if( Database::delete('gejala', "id_gejala = {$_GET['id']}") ) {
            //$_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = 'Data Berhasil Dihapus';
        } else {
            $_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = 'Data Gagal Dihapus';
        }
		header("location: home.php?c=penyakit&m=index");
    }
	
	public static function deletepenyakit() {
        if( Database::delete('penyakit', "id_penyakit = {$_GET['id']}") ) {
            //$_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = 'Data Berhasil Dihapus';
        } else {
            $_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = 'Data Gagal Dihapus';
        }
		header("location: home.php?c=penyakit&m=index");
    }
}
