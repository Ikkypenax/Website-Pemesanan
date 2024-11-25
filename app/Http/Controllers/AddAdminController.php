<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddAdminController extends Controller
{

    /**
     * Menampilkan daftar admin.
     */
    public function index()
    {
        // Ambil semua user dengan role 'admin'
        $admins = User::where('role', 'admin')->get();
        return view('admin.index', compact('admins'));
    }

    /**
     * Menambahkan admin baru.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Menyimpan admin baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat admin baru
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 'admin',
        ]);

        return redirect()->to('/admins');
    }

    /**
     * Menghapus admin.
     */
    public function destroy($id)
    {
        // Temukan admin berdasarkan ID
        $admin = User::findOrFail($id);

        // Pastikan superadmin tidak bisa dihapus
        if ($admin->role == 'superadmin') {
            return back()->withErrors(['error' => 'Superadmin tidak bisa dihapus']);
        }

        // Hapus admin
        $admin->delete();

        return redirect()->route('superadmin.index')->with('success', 'Admin berhasil dihapus.');
    }
}
