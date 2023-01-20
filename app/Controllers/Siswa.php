<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Siswa extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Upload file siswa baru',
            'validation' => \Config\Services::validation(),
        ];

        return view('siswa/index', $data);
    }

    public function uploadFile()
    {
        $file = $this->request->getFile('file');
        dd($file);
        $extension = $file->getClientExtension();
    }
}
