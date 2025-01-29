<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function checkConnection()
    {
        try {
            $pdo = DB::connection()->getPdo();

            $version = DB::select("SELECT VERSION() AS version")[0]->version;
            $host = DB::connection()->getConfig('host');
            $database = DB::connection()->getDatabaseName();

            return view('index', [
                'status' => 'Connected successfully!',
                'version' => $version,
                'host' => $host,
                'database' => $database
            ]);
        } catch (\Exception $e) {
            return view('index', [
                'status' => 'Connection failed: ' . $e->getMessage(),
                'errorDetails' => $e->getMessage()
            ]);
        }
    }

    public function checkConnectionApi()
    {
        try {
            $pdo = DB::connection()->getPdo();

            $version = DB::select("SELECT VERSION() AS version")[0]->version;
            $host = DB::connection()->getConfig('host');
            $database = DB::connection()->getDatabaseName();

            return response()->json([
                'status' => 'Connected successfully!',
                'version' => $version,
                'host' => $host,
                'database' => $database
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'Connection failed: ' . $e->getMessage(),
                'errorDetails' => $e->getMessage()
            ]);
        }
    }
}