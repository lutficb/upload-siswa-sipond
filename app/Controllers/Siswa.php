<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Siswa extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new SiswaModel();
    }

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
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Ods();
            }

            $sheetName = 'nis namasiswa kotalahir tanggallahir jeniskelamin anakke bersaudara marhalah kelas spp nokk ttlayah noktpayah pendidikanayah gajiayah namaayah pekerjaanayah ttlibu noktpibu pendidikanibu gajiibu namaibu pekerjaanibu alamat kelurahan kecamatan alamatkota provinsi telephon asalsekolah nisn uangpangkal lulus nokartu nik';

            $arraySheet = explode(" ", $sheetName);

            $spreadsheet = $reader->load($file);
            $siswa = $spreadsheet->getActiveSheet()->toArray();

            for ($s = 1; $s <= count($siswa) - 1; $s++) {

                for ($ds = 0; $ds <= count($siswa[$s]) - 1; $ds++) {
                    $data[$arraySheet[$ds]] = $siswa[$s][$ds];
                }

                $this->model->insert($data);
            }

            $db = db_connect();

            if ($db->affectedRows()) {
                return redirect()->to('/')->with('success', 'Data berhasil disimpan ke database');
            } else {
                return redirect()->back()->with('error', 'Data gagal disimpan');
            }
        } else {
            return redirect()->back()->with('error', 'File harus berekstensi .xls, .xlsx, atau .ods');
        }
    }
}
