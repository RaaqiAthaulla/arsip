<?php

namespace App\Controllers;

class User extends BaseController
{

    public static $menus = ["Surat_Masuk", "Surat_Keluar"];

    public function showSrtMasuk($id)
    {
        if ($id == session()->get('id')) {
            $data = [
                'title' => 'Surat Masuk',
                'menus' => self::$menus,
                'menu' => 'Surat_Masuk',
                'id' => $id,
                'username' => session()->get('username')
            ];
            echo view('/user/suratMasuk', $data);
            echo view('/layouts/js/user/js_suratMasuk');
        } else {
            session_destroy();
            return redirect()->to('/');
        }
        return;
    }

    public function showSrtKeluar($id)
    {
        if ($id == session()->get('id')) {
            $data = [
                'title' => 'Surat Keluar',
                'menus' => self::$menus,
                'menu' => 'Surat_keluar',
                'id' => $id,
                'username' => session()->get('username')
            ];
            echo view('/user/suratKeluar', $data);
            echo view('/layouts/js/user/js_suratKeluar');
        } else {
            session_destroy();
            return redirect()->to('/');
        }
        return;
    }
}
