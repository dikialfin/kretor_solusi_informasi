<?php

namespace App\Controllers;

use App\Models\Tamu;

class Guest extends BaseController
{
    protected $tamuModel;
    public function __construct() {
        $this->tamuModel = new Tamu();
    }

    public function index(): string
    {
        return view('index', [
            'session' => $this->session
        ]);
    }

    public function save() {
        $validationRules = [
            'nama' => ['required','alpha_space'],
            'email' => ['required','valid_email'],
            'pesan' => ['required'],
        ];

        $data = $this->request->getPost(array_keys($validationRules));

        if (!$this->validateData($data, $validationRules)) {
            return redirect()->back()->withInput();
        }

        if (!$this->tamuModel->insert($data)) {
            $this->session->setFlashData('failed','gagal menyimpan data');
            return redirect()->back();
        }

        $this->session->setFlashData('success','berhasil menyimpan data');
        return redirect()->back();
    }
}
