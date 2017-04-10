<?php

class BaseControllerp {

    public static function init($controller = 'auth') {
        if(!isset($_SESSION['user']) || !self::hasAbility($_GET['c']) ) {
            $_SESSION['intended_url'] = '?' . $_SERVER['QUERY_STRING'];
            header("location:index.php?c={$controller}&m=login");
        }
    }
    public static function hasAbility($controller) {
        $aclList = array(
            '1'=>'customer,galeri,jenis_mobil,kredit,merk_mobil,mobil,parameter,pembayaran,pendapatan,user',
            '2'=>'pelanggan',
        );
        $user = $_SESSION['user'];
        $acl = $aclList[$user->level];
        if($acl == '*') {
        }elseif(!preg_match('/'.$controller.'/', $acl)) {
            return false;
        }
        return true;
    }

}
