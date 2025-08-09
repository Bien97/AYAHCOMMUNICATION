<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSection;

class AboutController extends Controller
{
    public function index()
    {
        $aboutSections = AboutSection::all();
        return view('admin.about', compact('aboutSections'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'paragraph' => 'required|string',
        ]);

        AboutSection::create($data);

        return back()->with('success', 'Section ajoutée avec succès.');
    }

    public function update(Request $request, $id)
    {
        $aboutSection = AboutSection::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'paragraph' => 'required|string',
        ]);

        $aboutSection->update($data);

        return back()->with('success', 'Section mise à jour avec succès.');
    }

    public function destroy($id)
    {
        AboutSection::destroy($id);
        return back()->with('success', 'Section supprimée avec succès.');
    }
}
