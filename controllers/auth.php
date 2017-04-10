<?php

class Auth
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
                $user = Database::getSingle("SELECT * FROM user WHERE username = '{$data->username}' AND (level = 1 OR level = 3)");
                if (!$user) {
                    $error[] = 'Username atau Password salah!';
                } elseif ( strcmp($data->password, $user->password) != 0) {
                    $error[] = 'Username atau Password salah!';
					echo '<script type="text/javascript">';
					echo 'alert("Username atau Password salah!!");';
					echo 'window.location.href = "index.php";';		
					echo '</script>';
                }
            }
            if ($error) {
                $_SESSION['_CONTENT_FOR_NOTIFICATION_ERROR'] = '<div>' . implode('</div><div>', $error) . '</div>';
            } else {
                self::_login($user);
                $_SESSION['_CONTENT_FOR_NOTIFICATION_SUCCESS'] = "Selamat Datang, {$user->username}"; 
				if ($user->level == 3){
					header( 'location:home.php?c=verifikasi&m=index');
				} else {
					header( 'location:home.php?c=dashboard&m=index');
				}
            }
        }
		
        return ['auth/login', compact('data')];
    }

    public static function logout()
    {
        unset($_SESSION['admin']);
        header('location: index.php?');
    }

    private static function _login($user)
    {
        $user = (object) $user;
        unset($user->password);
        $_SESSION['admin'] = $user;
    }

}
