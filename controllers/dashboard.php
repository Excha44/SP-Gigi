<?php
class Dashboard extends BaseController {

    public static function index() {
        $data_penyakit = Database::get("SELECT * FROM penyakit");
		$data_menunggu = Database::get("SELECT * FROM history WHERE status_pilih = 0");
		$data_bp = Database::get("SELECT * FROM basis_pengetahuan");
		$data_history = Database::get("SELECT * FROM history");
        return array('dashboard/index', compact('data_penyakit', 'data_menunggu', 'data_bp', 'data_history'));
    }
}
