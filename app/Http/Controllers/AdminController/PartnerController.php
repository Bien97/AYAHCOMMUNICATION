<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners', compact('partners'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'name' => 'required|string|max:255',
            'link' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('partners', 'public');
        }

        Partner::create($data);

        return back()->with('success', 'Partenaire ajouté avec succès.');
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'name' => 'required|string|max:255',
            'link' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('partners', 'public');
        }

        $partner->update($data);

        return back()->with('success', 'Partenaire modifié avec succès.');
    }

    public function destroy($id)
    {
        Partner::destroy($id);
        return back()->with('success', 'Partenaire supprimé avec succès.');
    }
}
