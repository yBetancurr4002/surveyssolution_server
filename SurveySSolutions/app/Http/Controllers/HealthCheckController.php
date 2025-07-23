<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class HealthCheckController extends Controller
{
    public function ping()
    {
        try {
            DB::connection()->getPdo();
            $dbStatus = 'connected';
        } catch (\Exception $e) {
            $dbStatus = 'error: ' . $e->getMessage();
        }

        return response()->json([
            'status' => 'ok',
            'message' => 'API SurveySSolutions is running!',
            'database' => $dbStatus,
            'timestamp' => now()->toDateTimeString()
        ]);
    }
}
