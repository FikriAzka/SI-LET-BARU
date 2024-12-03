<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

use Illuminate\Container\Attributes\Auth as AttributesAuth;

class SesiController extends Controller
{
    function loginpage()
    {
        if (Auth::check()) {
            $userRole = UserRole::where('user_id', Auth::id())->first();
            if ($userRole) {
                return $this->redirectToDashboard($userRole->role_id);
            }
            Auth::logout();
        }
        
        $userRoles = null;
        return view('indexLoginPage', compact('userRoles'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' =>'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $detaillogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($detaillogin)) {
            $user = Auth::user();
            $userRoles = UserRole::with('role')
                ->where('user_id', $user->id)
                ->get();

            if($userRoles->isEmpty()) {
                Auth::logout();
                return redirect()->route('loginpage')->with('error', 'Role tidak ditemukan');
            }

            if ($userRoles->count() == 1) {
                return $this->redirectToDashboard($userRoles->first()->role_id);
            }

            return view('indexLoginPage', ['userRoles' => $userRoles]);
        }

        return redirect()->route('loginpage')->with('error', 'Email atau password salah');
    }

    public function selectRole(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('loginpage')->with('error', 'Silahkan login terlebih dahulu');
        }

        $roleId = $request->role_id;
        
        // Cek apakah role valid untuk user yang sedang login
        $userRole = UserRole::where('user_id', Auth::id())
            ->where('role_id', $roleId)
            ->first();
        
        if (!$userRole) {
            // Ambil kembali semua role user untuk ditampilkan di form
            $userRoles = UserRole::with('role')
                ->where('user_id', Auth::id())
                ->get();
                
            return view('indexLoginPage', [
                'userRoles' => $userRoles,
            ])->with('error', 'Role tidak valid');
        }
        
        return $this->redirectToDashboard($roleId);
    }

    private function redirectToDashboard($roleId) 
    {
        switch($roleId) {
            case 1: // Mahasiswa
                return redirect()->route('mahasiswa.dashboard');
            case 2: // Akademik
                return redirect()->route('akademik.dashboard');
            case 3: // Dosen
                return redirect()->route('dosen.dashboard');
            case 4: // Dekan
                return redirect()->route('dekan.dashboard');
            case 5: // Kaprodi
                return redirect()->route('kaprodi.dashboard');
            default:
                Auth::logout();
                return redirect()->route('loginpage')->with('error', 'Role tidak valid');
        }
    }
    

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('loginpage'));
    }

}