<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Tampilkan daftar semua layanan dengan pencarian dan pengurutan.
     */
    public function index(Request $request)
    {
        $query = Service::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name_service', 'like', '%' . $request->search . '%')
                  ->orWhere('kode_service', 'like', '%' . $request->search . '%');
            });
        }

        switch ($request->input('sort')) {
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'name_asc':
                $query->orderBy('name_service', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name_service', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        $services = $query->paginate(10)->appends($request->query());

        return view('services.index', compact('services'));
    }

    /**
     * Form tambah layanan.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Simpan layanan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_service' => 'required|string|max:255',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric|min:0',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name_service', 'description', 'price']);

        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('services', 'public');
        } else {
            $data['foto'] = null; // untuk menghindari error jika field tidak nullable
        }

        // kode_service digenerate otomatis oleh model (lihat bagian model di bawah)
        Service::create($data);

        return redirect()->route('services.index')->with('success', 'Service berhasil ditambahkan.');
    }

    /**
     * Detail layanan.
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    /**
     * Form edit layanan.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    /**
     * Update layanan.
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name_service' => 'required|string|max:255',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric|min:0',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name_service', 'description', 'price']);

        // Update foto jika ada file baru
        if ($request->hasFile('foto')) {
            if ($service->foto && Storage::disk('public')->exists($service->foto)) {
                Storage::disk('public')->delete($service->foto);
            }
            $data['foto'] = $request->file('foto')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Service berhasil diperbarui.');
    }

    /**
     * Hapus layanan.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // Hapus foto jika ada
        if ($service->foto && Storage::disk('public')->exists($service->foto)) {
            Storage::disk('public')->delete($service->foto);
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service berhasil dihapus.');
    }
}
