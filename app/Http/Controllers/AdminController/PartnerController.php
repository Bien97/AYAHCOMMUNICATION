<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners', compact('partners'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:5120',
                'name' => 'required|string|max:255',
                'link' => 'nullable|url|max:255',
            ], [
                'image.image' => 'Le fichier doit être une image.',
                'image.mimes' => 'L\'image doit être au format JPG, JPEG, PNG ou SVG.',
                'image.max' => 'L\'image ne peut pas dépasser 5 Mo.',
                'name.required' => 'Le nom est obligatoire.',
                'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'link.url' => 'Le lien doit être une URL valide.',
                'link.max' => 'Le lien ne peut pas dépasser 255 caractères.',
            ]);

            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {
                    $data['image'] = $request->file('image')->store('partners', 'public');
                } else {
                    return back()->withErrors(['image' => 'Erreur lors de l\'upload de l\'image.'])->withInput();
                }
            }

            Partner::create($data);

            return back()->with('success', 'Partenaire ajouté avec succès.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de l\'ajout. Veuillez réessayer.')->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $partner = Partner::findOrFail($id);

            $data = $request->validate([
                'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:5120',
                'name' => 'required|string|max:255',
                'link' => 'nullable|url|max:255',
            ], [
                'image.image' => 'Le fichier doit être une image.',
                'image.mimes' => 'L\'image doit être au format JPG, JPEG, PNG ou SVG.',
                'image.max' => 'L\'image ne peut pas dépasser 5 Mo.',
                'name.required' => 'Le nom est obligatoire.',
                'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
                'link.url' => 'Le lien doit être une URL valide.',
                'link.max' => 'Le lien ne peut pas dépasser 255 caractères.',
            ]);

            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {
                    // Supprimer l'ancienne image si elle existe
                    if ($partner->image) {
                        Storage::disk('public')->delete($partner->image);
                    }
                    $data['image'] = $request->file('image')->store('partners', 'public');
                } else {
                    return back()->withErrors(['image' => 'Erreur lors de l\'upload de l\'image.'])->withInput();
                }
            }

            $partner->update($data);

            return back()->with('success', 'Partenaire modifié avec succès.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de la mise à jour. Veuillez réessayer.')->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $partner = Partner::findOrFail($id);

            if ($partner->image) {
                Storage::disk('public')->delete($partner->image);
            }

            $partner->delete();

            return back()->with('success', 'Partenaire supprimé avec succès.');

        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de la suppression.');
        }
    }
}
