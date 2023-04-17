<?php

namespace App\Controllers;

// use App\Models\userModel;

$session = \Config\Services::session();

class Auth extends BaseController
{
    public function index()
    {
        echo view('/login/login');
        echo view('/layouts/js/login/js_login');
    }

    public function login($id, $username, $role)
    {
        $dataSesi = [
            'id' => $id,
            'username' => $username,
            'role' => $role,
        ];
        session()->set($dataSesi);

        if ($role == 1) {
            return redirect()->to('admin/Surat_Masuk/' . $id);
        } elseif ($role == 2) {
            return redirect()->to('user/Surat_Masuk/' . $id);
        } else {
            return redirect()->to('/');
        }

        // return redirect()->to('/page/New');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
