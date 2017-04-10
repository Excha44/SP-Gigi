<?php

class Authp
{

    public static function login()
    {
        $data = (object) @$_POST['data'];
        if($_POST) {
            $error = array();
			
            if (@empty($data->username)) {
                $error[] = 'Username harus diisi!';
            }
			
            if (@empty($data->password)) {
                $error[] = 'Password harus diisi!';
            }
			
            $user = FALSE;
            if (!empty($data->username) && !empty($data->password)) {
                $data = Database::escapeAll($data);
                $user = Database::getSingle("SELECT * FROM user WHERE username = '{$data->username}' AND level = 2");
                if (!$user) {
                    $error[] = 'Username atau Password salah!';
                } elseif (!Database::hashCheck($data->password, $user->password)) {
                    $error[] = 'Username atau Password salah!';
                }
            }
            if ($error) {
                $_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = '<div>' . implode('</div><div>', $error) . '</div>';
            } else {
                self::_login($user);
                $_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = "Selamat Datang, {$user->username}";
                //$intendedUrl = $_SESSION['intended_url'];                
				header( 'location:index.php' . ( $_SESSION['intended_url'] ? $_SESSION['intended_url'] : '') );
				unset($_SESSION['intended_url']);
                //header( 'location:index.php' . ( $intendedUrl ? $intendedUrl : '?c=pelanggan&m=indexpembayaran') );
            }
        }
        return ['authp/login', compact('data')];
    }

    public static function logout()
    {
        unset($_SESSION['user']);
        header('location: index.php');
    }

    private static function _login($user)
    {
        $user = (object) $user;
        $user->customer = Database::getSingle("SELECT * FROM customer WHERE user_id = {$user->id}");
        unset($user->password);
        $_SESSION['user'] = $user;
    }
    
    public static function register()
    {
        $data = new stdClass();
        
        if($_POST) {
            $error = self::saveregister();
			$data = (object) array_merge( @$_POST['data'] ? $_POST['data'] : [], $_POST['user'] );
            if($error) {
                $_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = $error;
            } else {
                return;
            }
        }
        
        $pendapatan = Database::get('SELECT * FROM pendapatan ORDER BY urutan');
        
        return ['authp/register', compact('data', 'pendapatan')];
    }
    
    public static function saveregister() {
        $id = $_POST['id'];
        $customer = Database::getSingle("SELECT * FROM customer WHERE id = '{$id}'");
        $data = (object) @$_POST['data'];
        $user = (object) $_POST['user'];
        $error = array();
        /*
        if (empty($data->nama)) {
            $error[] = 'Nama harus diisi!';
        }
        if (empty($data->alamat)) {
            $error[] = 'Alamat harus diisi!';
        }
        if ($data->email) {
            if (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
                $error[] = 'Email harus berisi email yang valid!';
            }
            if( Database::getSingle( sprintf("SELECT COUNT(0) jumlah FROM customer WHERE id != '%s' AND email = '%s'", $id, $data->email) )->jumlah > 0 ) {
                $error[] = 'Email sudah digunakan!';
            }
        }
        if (empty($data->no_hp)) {
            $error[] = 'No HP harus diisi!';
        } elseif (!is_numeric($data->no_hp)) {
			$error[] = 'No HP hanya bisa berisi angka!';
		}
		*/
        
        if (empty($user->username)) {
            $error[] = 'Username harus diisi!';
        } else {
            if( Database::getSingle( sprintf("SELECT COUNT(0) jumlah FROM user WHERE id != '%s' AND username = '%s'", @$customer->user_id, $user->username) )->jumlah > 0 ) {
                $error[] = 'Username sudah digunakan!';
            }
        }
        if (empty($user->password)) {
            if(!$id) {
                $error[] = 'Password harus diisi!';
            } else {
                unset($user->password);
            }
        } else {
            $user->password = Database::hash($user->password);
        }
        
        if ($error) {
            return '<div>' . implode('</div><div>', $error) . '</div>';
        } else {
			if ($id) {
				Database::update('user', $user, "id = {$customer->user_id}");
				Database::update('customer', $data, "id = {$id}");
				$data->id = $id;
			} else {
				$user->level = 2;
				Database::insert('user', $user);
				$user->id = Database::insertId();
                
                $data->user_id = $user->id;
                $data->nama = ucwords($user->username);
				Database::insert('customer', $data);
				$data->id = Database::insertId();
			}
            
            //$_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = 'Pendaftaran Berhasil, Selamat Datang ' . $data->nama;
            self::_login($user);
			header("location: index.php");
            return;
        }
    }
	
	 public static function profil()
    {
        $data = new stdClass();
        
        if($_POST) {
			$id = $_POST['id'];
			$customer = Database::getSingle("SELECT * FROM customer WHERE id = '{$id}'");
			$data = (object) $_POST['data'];
			$user = (object) $_SESSION['user'];
			$error = array();
			
			if (empty($data->nama)) {
				$error[] = 'Nama harus diisi!';
			}
			if (empty($data->alamat)) {
				$error[] = 'Alamat harus diisi!';
			}
			/*
			if ($data->email) {
				if (!filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
					$error[] = 'Email harus berisi email yang valid!';
				}
				if( Database::getSingle( sprintf("SELECT COUNT(0) jumlah FROM customer WHERE id != '%s' AND email = '%s'", $id, $data->email) )->jumlah > 0 ) {
					$error[] = 'Email sudah digunakan!';
				
				}
			}
			*/
			if (empty($data->no_hp)) {
				$error[] = 'No HP harus diisi!';
			} elseif (!is_numeric($data->no_hp)) {
				$error[] = 'No HP hanya bisa berisi angka!';
			}
			
			 if ($error) {
                $_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = '<div>' . implode('</div><div>', $error) . '</div>';
			} else {
				if ($id) {
					//Database::update('user', $user, "id = {$customer->user_id}");
					Database::update('customer', $data, "id = {$id}");
					$data->id = $id;
					$_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = 'Data Profile Telah Disimpan!';			
					header("location: index.php?c=authp&m=profil");
					return;
				} else {
					
					$data->user_id = $user->id;
					Database::insert('customer', $data);
					$data->id = Database::insertId();
					
					echo $data->user_id;
					header("location: index.php");
				}
                if($error) {
                    $_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = $error;
                } else {
                    return ['authp/profil'];
                }
			}
        }
		
		$user = (object) $_SESSION['user'];
		$user_id = $user->id;
        $data = Database::getSingle('SELECT * FROM customer where user_id='.$user_id.'');
		if($_POST)	 {
            $data = (object) array_merge((array)$data, $_POST['data']);
        }
        $pendapatan = Database::get('SELECT * FROM pendapatan ORDER BY urutan');
        //echo $user_id;
        return ['authp/profil', compact('data', 'pendapatan')];
    }
	
	public static function changepassword()
    {	
        $user = (object) $_SESSION['user'];
		$user_id = $user->id; 			
		$data = Database::getSingle('SELECT * FROM user where id='.$user_id.'');
		
		if($_POST) {
			
			$id = $_POST['id'];			
			$data_post = (object) $_POST['data'];
			$data_password = Database::getSingle('SELECT * FROM user where id='.$id.'');
			$error = "";
			
			if (@empty($data_post->password)) {
                $error = 'Password sekarang harus diisi!';
            }
            if (@empty($data_post->password_baru)) {
                $error = 'Password yang baru harus diisi!';
            }
			
			
			if (!Database::hashCheck($data_post->password, $data_password->password)) {
                    $error = 'Password sekarang salah';
            } elseif(Database::hashCheck($data_post->password, $data_password->password)) {
					$data_password->password = Database::hash($data_post->password_baru);
					Database::update('user', $data_password, "id = ".$id."");
					$_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = "Password baru telah disimpan";
					header("location: index.php?c=authp&m=changePassword");			
			}
			
			
            if($error) {
                $_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = $error;
            } else {
                return;
            }
        }
		
		
        return ['authp/password', compact('data')];
    }
}
