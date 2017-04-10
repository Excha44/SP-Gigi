<?php

class BaseController {

    public static function init($controller = 'auth') {
        if(!isset($_SESSION['admin']) || !self::hasAbility($_GET['c']) ) {
            $_SESSION['intended_url'] = '?' . $_SERVER['QUERY_STRING'];
            header("location:index.php?c={$controller}&m=login");
        }
    }
    public static function hasAbility($controller) {
        $aclList = array(
            '1'=>'dashboard,penyakit,data_diagnosis,prob,user',
            '2'=>'pelanggan',
			'3'=>'dashboard,verifikasi',
        );
        $user = $_SESSION['admin'];
        $acl = $aclList[$user->level];
        if($acl == '*') {
        }elseif(!preg_match('/'.$controller.'/', $acl)) {
            return false;
        }
        return true;
    }

}
?>
