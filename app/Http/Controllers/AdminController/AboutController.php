<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSection;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $aboutSections = AboutSection::all();
        return view('admin.about', compact('aboutSections'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'paragraph' => 'required|string',
                'image_about' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:5120',
            ], [
                'title.required' => 'Le titre est obligatoire.',
                'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',
                'paragraph.required' => 'Le paragraphe est obligatoire.',
                'image_about.image' => 'Le fichier doit être une image.',
                'image_about.mimes' => 'L\'image doit être au format JPG, JPEG, PNG ou SVG.',
                'image_about.max' => 'L\'image ne peut pas dépasser 5 MB.',
            ]);

            // Gestion de l'upload d'image
            if ($request->hasFile('image_about')) {
                if ($request->file('image_about')->isValid()) {
                    $data['image_about'] = $request->file('image_about')->store('about_images', 'public');
                } else {
                    return back()->withErrors(['image_about' => 'Erreur lors de l\'upload de l\'image.'])->withInput();
                }
            }

            AboutSection::create($data);

            return back()->with('success', 'Section ajoutée avec succès.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de l\'ajout. Veuillez réessayer.')->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $aboutSection = AboutSection::findOrFail($id);

            $data = $request->validate([
                'title' => 'required|string|max:255',
                'paragraph' => 'required|string',
                'image_about' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:5120',
            ], [
                'title.required' => 'Le titre est obligatoire.',
                'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',
                'paragraph.required' => 'Le paragraphe est obligatoire.',
                'image_about.image' => 'Le fichier doit être une image.',
                'image_about.mimes' => 'L\'image doit être au format JPG, JPEG, PNG ou SVG.',
                'image_about.max' => 'L\'image ne peut pas dépasser 5 MB.',
            ]);

            // Gestion de l'upload d'image
            if ($request->hasFile('image_about')) {
                if ($request->file('image_about')->isValid()) {
                    // Supprimer l'ancienne image si elle existe
                    if ($aboutSection->image_about) {
                        Storage::disk('public')->delete($aboutSection->image_about);
                    }
                    $data['image_about'] = $request->file('image_about')->store('about_images', 'public');
                } else {
                    return back()->withErrors(['image_about' => 'Erreur lors de l\'upload de l\'image.'])->withInput();
                }
            }

            $aboutSection->update($data);

            return back()->with('success', 'Section mise à jour avec succès.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de la mise à jour. Veuillez réessayer.')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $aboutSection = AboutSection::findOrFail($id);
            
            // Supprimer l'image associée si elle existe
            if ($aboutSection->image_about) {
                Storage::disk('public')->delete($aboutSection->image_about);
            }

            $aboutSection->delete();

            return back()->with('success', 'Section supprimée avec succès.');

        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de la suppression.');
        }
    }
}