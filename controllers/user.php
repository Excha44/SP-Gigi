<?php
class User extends BaseController {

    public static function index() {
        $data = Database::get("SELECT * FROM user WHERE level = 1");
        return array('user/index', compact('data'));
    }

    public static function view() {
		$id = @$_GET['id'];
        $data['data'] = Database::getSingle("
                SELECT *
                FROM user
                WHERE id = {$id} AND level = 1");
        return array('user/view', $data);
    }

    public static function edit() {
        $id = @$_GET['id'];
        $data = array();
        if ($id) {
            $data = Database::getSingle("
                SELECT *
                FROM user
                WHERE id = {$id} AND level = 1");
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
        return array('user/edit', compact('data'));
    }

    public static function save() {
        $id = $_POST['id'];
        $data = (object) $_POST['data'];
        $error = array();
        if (@empty($data->username)) {
            $error[] = 'Username harus diisi!';
        } else {
            if( Database::getSingle( sprintf("SELECT COUNT(0) jumlah FROM user WHERE id != '%s' AND username = '%s'", $id, $data->username) )->jumlah > 0 ) {
                $error[] = 'Username sudah digunakan!';
            }
        }
        if (@empty($data->password)) {
            if(!$id) {
                $error[] = 'Password harus diisi!';
            } else {
                unset($data->password);
            }
        } else {
            $data->password = Database::hash($data->password);
        }
        
        if ($error) {
            return '<div>' . implode('</div><div>', $error) . '</div>';
        } else {
			if ($id) {
				Database::update('user', $data, "id = {$_POST['id']}");
				$data->id = $_POST['id'];
			} else {
                $data->level = 1;
				Database::insert('user', $data);
				$data->id = Database::insertId();
			}
            $_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = 'Data Berhasil Disimpan';
			header("location: index.php?c=user&m=view&id={$data->id}");
            return;
        }
    }

    public static function delete() {
        if(Database::getSingle( "SELECT COUNT(0) jumlah FROM user WHERE level = 1" )->jumlah <= 1) {
            $_SESSION['_CONTENT_FOR_NOTIFICATION_WARNING'] = 'Minimal harus ada satu Administrator';
        } elseif ( $_SESSION['admin']->id == $_GET['id'] ) {
            $_SESSION['_CONTENT_FOR_NOTIFICATION_WARNING'] = 'Anda tidak bisa menghapus diri Anda sendiri';
        } else {
            if( Database::delete('user', "id={$_GET['id']} AND level = 1") ) {
                $_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = 'Data Berhasil Dihapus';
            } else {
                $_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = 'Data Gagal Dihapus';
            }
        }
		header("location: index.php?c=user&m=index");
    }

}
