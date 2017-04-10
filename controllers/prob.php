<?php
class Prob extends BaseController {

    public static function index() {
        $data_penyakit = Database::get("SELECT * FROM penyakit");
		$data_gejala = Database::get("SELECT * FROM gejala");
		
        return array('prob/index', compact('data_penyakit', 'data_gejala'));
    }
}
