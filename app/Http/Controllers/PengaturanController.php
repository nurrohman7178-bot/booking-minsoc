<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Pengaturan;

class PengaturanController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $pelanggan = $user->pelanggan;

        return view('pelanggan.setting.index', compact('user', 'pelanggan'));
    }

    public function update(Request $request, string $id)
    {
        $user = auth()->user();

        if ((string) $user->id !== (string) $id) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($user->pelanggan) {
            $user->pelanggan->update([
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
            ]);
        }

        return redirect()->route('setting.index')
            ->with('success', 'Data akun berhasil diperbarui.');
    }
}
