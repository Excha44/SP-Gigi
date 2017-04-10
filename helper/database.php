<?php

class Database {

    private static $_host = '127.0.0.1';
    private static $_user = 'root';
    private static $_pass = '';
    private static $_dbnm = 'sp_gigi';
    private static $_salt = 'SJUZ5C6RlhQs98fJjbJw4sZIMvZ83yFisr7CKZya';
    private static $_db;
    private static $_last_query;

    public static function init() {
        if (!self::$_db) {
            self::$_db = new mysqli(self::$_host, self::$_user, self::$_pass);
            if (self::$_db->connect_error) {
                die('Connection Error: ' . self::$_db->connect_error);
            }
            if (!self::$_db->select_db(self::$_dbnm)) {
                if (!self::initiateDb()) {
                    die('Connection Error: ' . self::$_db->error);
                }
            }
        }
    }
    
    public static function lastQuery() {
        return self::$_last_query;
    }
    
    public static function error() {
        return self::$_db->error;
    }

    private static function initiateDb() {
        if (!self::query("CREATE DATABASE " . self::$_dbnm)) {
            return false;
        }
        self::query("USE " . self::$_dbnm);
        return true;
    }

    public static function query($q) {
        self::init();
        self::$_last_query = $q;
        return self::$_db->query($q);
    }

    public static function insertId() {
        return self::$_db->insert_id;
    }

    public static function getSingle($q) {
        return @self::get($q)[0];
    }

    public static function get($q) {
        $t = self::query($q);
        $r = array();
        while ($v = $t->fetch_object()) {
            $r[] = $v;
        }
        return $r;
    }

    public static function escapeAll($d) {
        $d = (object) $d;
        foreach ($d as $i => $v) {
            $d->$i = self::escapeString($v);
        }
        return $d;
    }

    public static function escapeString($q) {
        self::init();
        return self::$_db->escape_string($q);
    }

    public static function hash($q) {
        return sha1(self::$_salt . $q);
    }

    public static function hashCheck($pass, $hash) {
        return $hash == self::hash($pass);
    }
    
    public static function insert($table, $data) {
        $fields = $value = '';
        foreach ($data as $i => $v) {
            $fields .= ($fields == '' ? '' : ',') . $i;
            if($v===NULL){
                $v = 'NULL';
            } else {
                $v = "'" . self::escapeString($v) . "'";
            }
            $value .= ($value == '' ? '' : ',') . $v;
        }
        return self::query("INSERT INTO {$table} ({$fields}) VALUES ({$value})");
    }
    
    public static function update($table, $data, $where) {
        $value = '';
        foreach ($data as $i => $v) {
            if($v===NULL){
                $v = 'NULL';
            } else {
                $v = "'" . self::escapeString($v) . "'";
            }
            $value .= ($value == '' ? '' : ',') . "{$i}={$v}";
        }
        return self::query("UPDATE {$table} set {$value} WHERE {$where}");
    }
    
    public static function delete($table, $where) {
        return self::query("DELETE FROM {$table} WHERE {$where}");
    }

}