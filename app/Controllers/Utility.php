<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Ifsnop\Mysqldump\Mysqldump;

class Utility extends BaseController
{

    public function doBackup()
    {
        $tglSekarang = date('Y-m-d');

        $dbHost = getenv('database.default.hostname');
        $dbUser = getenv('database.default.username');
        $dbPass = getenv('database.default.password');
        $dbName = getenv('database.default.database');

        try {
            // Inisialisasi Mysqldump dengan konfigurasi baru
            $dump = new Mysqldump('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUser, $dbPass);
            // Menjalankan proses backup
            $dump->start(APPPATH . '/Database/Backup/new-' . $tglSekarang . '.sql');

            return $this->response->setJSON([
                'status' => ResponseInterface::HTTP_OK,
                'message' => 'Backup database berhasil'
            ]);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return $this->response->setJSON([
                'status' => ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Gagal melakukan backup database: ' . $e->getMessage()
            ]);
        }
    }


    public function doRestore()
    {

        $forge = \Config\Database::forge();
        $forge->dropDatabase(getenv('database.default.database'));
        $forge->createDatabase(getenv('database.default.database'));

        // Set up database connection parameters
        $tglSekarang = date('Y-m-d');

        $dbHost = getenv('database.default.hostname');
        $dbUser = getenv('database.default.username');
        $dbPass = getenv('database.default.password');
        $dbName = getenv('database.default.database');

        try {
            // Inisialisasi Mysqldump dengan konfigurasi baru
            $dump = new Mysqldump('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUser, $dbPass);
            // Menjalankan proses backup
            $dump->restore(APPPATH . '/Database/Backup/new-' . $tglSekarang . '.sql');

            return $this->response->setJSON([
                'status' => ResponseInterface::HTTP_OK,
                'message' => 'Backup database berhasil'
            ]);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return $this->response->setJSON([
                'status' => ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Gagal melakukan backup database: ' . $e->getMessage()
            ]);
        }
        

        return $this->response->setJSON([
            'status' => ResponseInterface::HTTP_OK,
            'message' => 'Restore database berhasil'
        ]);
    }
}
