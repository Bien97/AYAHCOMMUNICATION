<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContact;


class SettingsController extends Controller
{
    public function index()
    {
        $settings = SiteContact::first();
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        try {
            $settings = SiteContact::findOrFail($id);

            $data = $request->validate([
                'site_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'map_location' => 'nullable|string|url',
                'logo_header' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:5120',
                'logo_footer' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:5120',
                'image_background' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:5120',
            ], [
                // Messages personnalisés pour chaque champ
                'site_name.required' => 'Le nom du site est obligatoire.',
                'site_name.string' => 'Le nom du site doit être une chaîne de caractères.',
                'site_name.max' => 'Le nom du site ne peut pas dépasser 255 caractères.',
                
                'email.required' => 'L\'adresse email est obligatoire.',
                'email.email' => 'L\'adresse email doit être valide.',
                'email.max' => 'L\'adresse email ne peut pas dépasser 255 caractères.',
                
                'phone.required' => 'Le numéro de téléphone est obligatoire.',
                'phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
                'phone.max' => 'Le numéro de téléphone ne peut pas dépasser 20 caractères.',
                
                'map_location.url' => 'Le lien Google Maps doit être une URL valide.',
                
                'logo_header.image' => 'Le logo header doit être une image.',
                'logo_header.mimes' => 'Le logo header doit être au format JPG, JPEG, PNG ou SVG.',
                'logo_header.max' => 'Le logo header ne peut pas dépasser 5 MB.',
                
                'logo_footer.image' => 'Le logo footer doit être une image.',
                'logo_footer.mimes' => 'Le logo footer doit être au format JPG, JPEG, PNG ou SVG.',
                'logo_footer.max' => 'Le logo footer ne peut pas dépasser 5 MB.',
                
                'image_background.image' => 'L\'image background doit être une image.',
                'image_background.mimes' => 'L\'image background doit être au format JPG, JPEG, PNG ou SVG.',
                'image_background.max' => 'L\'image background ne peut pas dépasser 5 MB.',
            ]);

            // Gestion des uploads avec vérification d'erreurs
            if ($request->hasFile('logo_header')) {
                if ($request->file('logo_header')->isValid()) {
                    $data['logo_header'] = $request->file('logo_header')->store('logos', 'public');
                } else {
                    return back()->withErrors(['logo_header' => 'Erreur lors de l\'upload du logo header.'])->withInput();
                }
            }

            if ($request->hasFile('logo_footer')) {
                if ($request->file('logo_footer')->isValid()) {
                    $data['logo_footer'] = $request->file('logo_footer')->store('logos', 'public');
                } else {
                    return back()->withErrors(['logo_footer' => 'Erreur lors de l\'upload du logo footer.'])->withInput();
                }
            }

            if ($request->hasFile('image_background')) {
                if ($request->file('image_background')->isValid()) {
                    $data['image_background'] = $request->file('image_background')->store('backgrounds', 'public');
                } else {
                    return back()->withErrors(['image_background' => 'Erreur lors de l\'upload de l\'image background.'])->withInput();
                }
            }

            $settings->update($data);

            return back()->with('success', 'Paramètres mis à jour avec succès.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de la mise à jour. Veuillez réessayer.')->withInput();
        }
    }

    public function destroy($id)
    {
        SiteContact::destroy($id);
        return redirect()->route('admin.settings')->with('success', 'Paramètres supprimés.');
    }
}