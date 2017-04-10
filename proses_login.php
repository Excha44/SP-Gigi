<?php
include_once "helper/database.php";
session_start();


if ($_POST && $_GET['s'] == 'register' || $_GET['s'] == 'register_diagnosis') {
	$data = array();
	$data = (object) $_POST['data'];
	
	$run = Database::insert('user', $data);
	
	if ($run){				
        		
		echo '<script type="text/javascript">';
		if($_GET['s'] == 'register') {
			echo 'alert("Anda telah berhasil register pada sistem");';
			echo 'window.location.href = "index.php#services";';
		} elseif ($_GET['s'] == 'register_diagnosis') {
			echo 'window.location.href = "index.php#team";';
		}
		echo '</script>';
	} else {
		echo "error";
	}
	
}

if ($_POST && $_GET['s'] == 'login' || $_GET['s'] == 'login_diagnosis') {
	$data = array();
	$data = (object) $_POST['data'];
	
	$user = Database::getSingle("SELECT * FROM user WHERE username='{$data->username}' AND level=2");
	
	if($user){
		if ($data->password == $user->password){				
			$_SESSION['user'] = $data->username;
			$_SESSION['id_user'] = $user->id;
			
			
			echo '<script type="text/javascript">';
			if ($_GET['s'] == 'login') {
				//echo 'alert("Anda telah berhasil login pada sistem");';
				echo 'window.location.href = "index.php";';
			} elseif ($_GET['s'] == 'login_diagnosis') {			
				echo 'window.location.href = "diagnosis.php";';
			}		
			echo '</script>';
			
		} else {
			echo '<script type="text/javascript">';
			echo 'alert("Username atau Password salah");';
			echo 'window.location.href = "index.php#services";';		
			echo '</script>';
		}
	} else {
			echo '<script type="text/javascript">';
			echo 'alert("Username atau Password salah");';
			echo 'window.location.href = "index.php#services";';		
			echo '</script>';
	}
}


if ($_GET['s'] == 'logout') {
	unset($_SESSION['user']);
	unset($_SESSION['id_user']);

	echo '<script type="text/javascript">';	
	echo 'window.location.href = "index.php";';
	echo '</script>';
}
?>
