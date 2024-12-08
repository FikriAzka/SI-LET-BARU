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
    // Add detailed logging
    Log::info('IRS Submission Request:', $request->all());

    try {
        // Validate the incoming request
        $validatedData = $request->validate([
            'total_sks' => 'required|numeric',
            'semester' => 'required|string',
            'schedules' => 'required|array',
            'schedules.*.mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'schedules.*.jadwal_id' => 'required|exists:jadwals,id',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        // Create a new IRS record
        $irs = Irs::create([
            'nim' => Auth::user()->nim, // Adjust based on your user model
            'jadwal_id' => $validatedData['schedules'][0]['jadwal_id'], // Store first jadwal_id if needed
            'semester' => $validatedData['semester'],
            'status' => 'Menunggu Persetujuan',
        ]);

        // Commit the transaction
        DB::commit();

        // Log successful submission
        Log::info('IRS Submission Successful', ['irs_id' => $irs->id]);

        return response()->json([
            'success' => true,
            'message' => 'Rencana Studi berhasil disimpan',
            'irs_id' => $irs->id
        ]);
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