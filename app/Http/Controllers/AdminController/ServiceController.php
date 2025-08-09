<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        // Chemin vers le dossier des icônes SVG
        $iconsPath = public_path('icons/icons');

        // Récupère tous les fichiers SVG dans ce dossier
        $iconFiles = File::files($iconsPath);

        // Prépare un tableau avec les noms d'icône (fichiers sans extension)
        $icons = [];
        foreach ($iconFiles as $file) {
            $icons[] = $file->getFilename(); // par exemple "alarm.svg"
        }

        return view('admin.services', compact('services', 'icons'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255', // ici tu stockeras le nom du fichier svg choisi, ex: alarm.svg
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($data);

        return back()->with('success', 'Service ajouté avec succès.');
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return back()->with('success', 'Service mis à jour avec succès.');
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return back()->with('success', 'Service supprimé avec succès.');
    }
}
