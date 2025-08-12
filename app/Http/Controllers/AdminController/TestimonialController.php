<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', "regex:/^[\pL\s'\-\.]+$/u"],
            'position' => ['nullable', 'string', 'max:255', "regex:/^[\pL\s'\-\.]*$/u"],
            'text' => 'required|string',
            'stars' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'name.regex' => 'Le nom ne peut contenir que des lettres, espaces, apostrophes, tirets et points, sans chiffres.',

            'position.string' => 'Le poste doit être une chaîne de caractères.',
            'position.max' => 'Le poste ne peut pas dépasser 255 caractères.',
            'position.regex' => 'Le poste ne peut contenir que des lettres, espaces, apostrophes, tirets et points, sans chiffres.',

            'text.required' => 'Le texte est obligatoire.',
            'text.string' => 'Le texte doit être une chaîne de caractères.',

            'stars.required' => 'Le nombre d\'étoiles est obligatoire.',
            'stars.integer' => 'Le nombre d\'étoiles doit être un entier.',
            'stars.min' => 'Le nombre d\'étoiles doit être au minimum 1.',
            'stars.max' => 'Le nombre d\'étoiles doit être au maximum 5.',

            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être au format JPG, JPEG, PNG ou WEBP.',
            'image.max' => 'L\'image ne peut pas dépasser 5 Mo.',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create($data);

        return back()->with('success', 'Témoignage ajouté avec succès.');
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', "regex:/^[\pL\s'\-\.]+$/u"],
            'position' => ['nullable', 'string', 'max:255', "regex:/^[\pL\s'\-\.]*$/u"],
            'text' => 'required|string',
            'stars' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'name.regex' => 'Le nom ne peut contenir que des lettres, espaces, apostrophes, tirets et points, sans chiffres.',

            'position.string' => 'Le poste doit être une chaîne de caractères.',
            'position.max' => 'Le poste ne peut pas dépasser 255 caractères.',
            'position.regex' => 'Le poste ne peut contenir que des lettres, espaces, apostrophes, tirets et points, sans chiffres.',

            'text.required' => 'Le texte est obligatoire.',
            'text.string' => 'Le texte doit être une chaîne de caractères.',

            'stars.required' => 'Le nombre d\'étoiles est obligatoire.',
            'stars.integer' => 'Le nombre d\'étoiles doit être un entier.',
            'stars.min' => 'Le nombre d\'étoiles doit être au minimum 1.',
            'stars.max' => 'Le nombre d\'étoiles doit être au maximum 5.',

            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être au format JPG, JPEG, PNG ou WEBP.',
            'image.max' => 'L\'image ne peut pas dépasser 5 Mo.',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        return back()->with('success', 'Témoignage mis à jour avec succès.');
    }

    public function destroy($id)
    {
        Testimonial::destroy($id);
        return back()->with('success', 'Témoignage supprimé avec succès.');
    }
}
