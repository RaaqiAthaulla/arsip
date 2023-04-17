<?php

namespace App\Controllers;

use CodeIgniter\Session\Session;

class Admin extends BaseController
{
    public static $menus = ["Surat_Masuk", "Surat_Keluar", "Users"];

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
            echo view('/admin/suratMasuk', $data);
            echo view('/layouts/js/admin/js_suratMasuk');
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
            echo view('/admin/suratKeluar', $data);
            echo view('/layouts/js/admin/js_suratKeluar');
        } else {
            session_destroy();
            return redirect()->to('/');
        }
        return;
    }
   
    public function showUsers($id)
    {
        if ($id == session()->get('id')) {
            $data = [
                'title' => 'Users',
                'menus' => self::$menus,
                'menu' => 'Users',
                'id' => $id,
                'username' => session()->get('username'),
                // 'projeks' => $this->projekModel->where('status', 'new')->findAll(),
            ];
            echo view('/admin/Users', $data);
            echo view('/layouts/js/admin/js_users');
        } else {
            session_destroy();
            // echo view('login/login');
            return redirect()->to('/');
        }
        return;
    }
}
