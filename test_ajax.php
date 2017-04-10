<?php
/**
 * Created by PhpStorm.
 * User: Billy
 * Date: 3/11/2017
 * Time: 2:19 PM
 */
include_once ('helper/database.php');
$data = $_REQUEST['d'];

$penyakit = Database::get("SELECT * FROM penyakit WHERE id_penyakit = 1 ");

foreach($penyakit as $value){
    echo "Nama   :" . $value->nama . "<br>";
    echo "ID Penyakit : " . $value->id_penyakit . "<br>";
}


?>