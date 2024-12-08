<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\Irs;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IRSController extends Controller
{
public function submitIRS(Request $request)
{
    $mhs = Mahasiswa::where('user_id',  Auth::user()->id)->first();
    // return response()->json($mhs);
    // Add detailed logging
    Log::info('IRS Submission Request:', $request->all());

    try {
        $check = Irs::where('nim', $mhs->nim)
        ->where('jadwal_id', $request->jadwal_id)
        ->where('semester', $mhs->semester)
        ->first();

        // return response()->json($check);

        // Start a database transaction
        // return response()->json($request->jadwal_id);
        // Create a new IRS record
        if(is_null($check)){
            $irs = Irs::create([
                'nim' => $mhs->nim, // Adjust based on your user model
                'jadwal_id' => intval($request->jadwal_id),
                'semester' => $mhs->semester,
                'prioritas' => 1,
                'status' => 'pending'
            ]);
            // return response()->json($irs);
            // Log successful submission
            Log::info('IRS Submission Successful', ['irs_id' => $irs->id]);
    
            return response()->json([
                'success' => true,
                'message' => 'Rencana Studi berhasil disimpan',
                'irs_id' => $irs->id
            ]);
        } else{
            return response()->json([
                'success' => true,
                'message' => 'Rencana Studi berhasil disimpan',
                'irs_id' => $check->id
            ]);
        }

    } catch (\Illuminate\Validation\ValidationException $e) {
        // Handle validation errors
        DB::rollBack();
        
        // Log validation errors
        Log::error('IRS Submission Validation Error', [
            'errors' => $e->errors(),
            'request' => $request->all()
        ]);

        return response()->json([
            'success' => false,
            'message' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        // Rollback the transaction in case of error
        DB::rollBack();

        // Log the error with full details
        Log::error('IRS Submission Error', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
            'request' => $request->all()
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Gagal menyimpan Rencana Studi: ' . $e->getMessage()
        ], 500);
    }
}
}