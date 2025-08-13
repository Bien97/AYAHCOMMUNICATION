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
        // On récupère le premier enregistrement ou on en crée un vide
        $aboutSection = AboutSection::first() ?? new AboutSection();
        return view('admin.about', compact('aboutSection'));
    }

    public function store(Request $request)
    {
        try {
            // Vérifier s'il existe déjà un enregistrement
            $aboutSection = AboutSection::first();
            if (!$aboutSection) {
                $aboutSection = new AboutSection();
            }

            // Déterminer quelle section remplir
            $nextSection = $aboutSection->getNextAvailableSection();
            if (!$nextSection) {
                return back()->with('error', 'Toutes les sections sont déjà remplies (maximum 3 sections).');
            }

            // Définir les champs selon la section
            $titleField = $nextSection == 1 ? 'title' : "title_{$nextSection}";
            $paragraphField = $nextSection == 1 ? 'paragraph' : "paragraph_{$nextSection}";

            // Validation
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'paragraph' => 'required|string',
                'image_about' => $aboutSection->image_about ? 'nullable|image|mimes:jpg,jpeg,png,svg|max:5120' : 'nullable|image|mimes:jpg,jpeg,png,svg|max:5120',
            ], [
                'title.required' => 'Le titre est obligatoire.',
                'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',
                'paragraph.required' => 'Le paragraphe est obligatoire.',
                'image_about.image' => 'Le fichier doit être une image.',
                'image_about.mimes' => 'L\'image doit être au format JPG, JPEG, PNG ou SVG.',
                'image_about.max' => 'L\'image ne peut pas dépasser 5 MB.',
            ]);

            // Assigner les valeurs aux bons champs
            $aboutSection->$titleField = $data['title'];
            $aboutSection->$paragraphField = $data['paragraph'];

            // Gestion de l'upload d'image (une seule pour toutes les sections)
            if ($request->hasFile('image_about')) {
                if ($request->file('image_about')->isValid()) {
                    // Supprimer l'ancienne image si elle existe
                    if ($aboutSection->image_about) {
                        Storage::disk('public')->delete($aboutSection->image_about);
                    }
                    $aboutSection->image_about = $request->file('image_about')->store('about_images', 'public');
                } else {
                    return back()->withErrors(['image_about' => 'Erreur lors de l\'upload de l\'image.'])->withInput();
                }
            }

            $aboutSection->save();

            return back()->with('success', "Section {$nextSection} ajoutée avec succès.");

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de l\'ajout. Veuillez réessayer.')->withInput();
        }
    }

    public function update(Request $request, $sectionNumber)
    {
        try {
            if (!in_array($sectionNumber, [1, 2, 3])) {
                return back()->with('error', 'Numéro de section invalide.');
            }

            $aboutSection = AboutSection::firstOrFail();

            // Définir les champs selon la section
            $titleField = $sectionNumber == 1 ? 'title' : "title_{$sectionNumber}";
            $paragraphField = $sectionNumber == 1 ? 'paragraph' : "paragraph_{$sectionNumber}";

            // Validation
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

            // Assigner les valeurs
            $aboutSection->$titleField = $data['title'];
            $aboutSection->$paragraphField = $data['paragraph'];

            // Gestion de l'upload d'image
            if ($request->hasFile('image_about')) {
                if ($request->file('image_about')->isValid()) {
                    // Supprimer l'ancienne image si elle existe
                    if ($aboutSection->image_about) {
                        Storage::disk('public')->delete($aboutSection->image_about);
                    }
                    $aboutSection->image_about = $request->file('image_about')->store('about_images', 'public');
                } else {
                    return back()->withErrors(['image_about' => 'Erreur lors de l\'upload de l\'image.'])->withInput();
                }
            }

            $aboutSection->save();

            return back()->with('success', "Section {$sectionNumber} mise à jour avec succès.");

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de la mise à jour. Veuillez réessayer.')->withInput();
        }
    }

    public function destroy($sectionNumber)
    {
        try {
            if (!in_array($sectionNumber, [1, 2, 3])) {
                return back()->with('error', 'Numéro de section invalide.');
            }

            $aboutSection = AboutSection::firstOrFail();
            
            // Définir les champs selon la section
            $titleField = $sectionNumber == 1 ? 'title' : "title_{$sectionNumber}";
            $paragraphField = $sectionNumber == 1 ? 'paragraph' : "paragraph_{$sectionNumber}";

            // Vider les champs de la section
            $aboutSection->$titleField = null;
            $aboutSection->$paragraphField = null;

            // Si c'est la section 1 et qu'aucune autre section n'est remplie, supprimer l'image aussi
            if ($sectionNumber == 1 && !$aboutSection->isSectionFilled(2) && !$aboutSection->isSectionFilled(3)) {
                if ($aboutSection->image_about) {
                    Storage::disk('public')->delete($aboutSection->image_about);
                    $aboutSection->image_about = null;
                }
            }

            $aboutSection->save();

            return back()->with('success', "Section {$sectionNumber} supprimée avec succès.");

        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de la suppression.');
        }
    }
}