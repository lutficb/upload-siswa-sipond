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
        $extension = $file->getClientExtension();

        if ($extension == 'xls' || $extension == 'xlsx' || $extension == 'ods') {
            if ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else if ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Ods();
            }

            $spreadsheet = $reader->load($file);
        } else {
            return redirect()->back()->with('error', 'File harus berekstensi .xls, .xlsx, atau .ods');
        }
    }
}
