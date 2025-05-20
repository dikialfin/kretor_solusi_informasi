<?php

namespace App\Controllers;

use App\Models\Tamu;
use CodeIgniter\Files\File;
use CodeIgniter\API\ResponseTrait;

class Admin extends BaseController
{
    use ResponseTrait;

    protected $tamuModel;
    public function __construct()
    {
        $this->tamuModel = new Tamu();
    }

    public function index(): string
    {
        $data = $this->tamuModel->orderBy('created_at', 'DESC')->get()->getResult();
        $filter = $this->request->getGet('filter');

        if ($filter) {
            $data = $this->tamuModel
                ->like('created_at', $filter)
                ->orderBy('created_at', 'DESC')
                ->get()
                ->getResult();
        }
        return view('admin/index', ['data' => $data, 'filter' => $filter, 'session' => $this->session]);
    }

    public function downloadData()
    {
        $filter = $this->request->getPost('filter');
        $data = $this->tamuModel->orderBy('created_at', 'DESC')->get()->getResult();

        if (!empty($filter)) {
            $data = $this->tamuModel
                ->like('created_at', $filter)
                ->orderBy('created_at', 'DESC')
                ->get()
                ->getResult();
        }

        $filename = 'data_tamu_' . date('YmdHis') . '.csv';
        $filepath = WRITEPATH . 'uploads/' . $filename;

        $file = fopen($filepath, 'w');
        if ($file === false) {
            $this->session->setFlashData('failed', 'gagal menyimpan data');
            return redirect()->back();
        }

        fputcsv($file, ['ID', 'Nama', 'Email', 'Pesan', 'Created At', 'Updated At']);

        foreach ($data as $row) {
            $csvRow = [
                $row->id,
                $row->nama,
                $row->email,
                $row->pesan,
                $row->created_at,
                $row->updated_at,
            ];
            fputcsv($file, $csvRow);
        }

        fclose($file);

        return $this->response->download(new File($filepath), null) 
            ->setFileName($filename)
            ->setContentType('text/csv');
    }
}
