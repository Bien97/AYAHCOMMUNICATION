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
        $settings = SiteContact::findOrFail($id);

        $data = $request->validate([
            'site_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'map_location' => 'nullable|string',
            'logo_header' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'logo_footer' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        if ($request->hasFile('logo_header')) {
            $data['logo_header'] = $request->file('logo_header')->store('logos', 'public');
        }

        if ($request->hasFile('logo_footer')) {
            $data['logo_footer'] = $request->file('logo_footer')->store('logos', 'public');
        }

        $settings->update($data);

        return back()->with('success', 'Paramètres mis à jour avec succès.');
    }

    public function destroy($id)
    {
        SiteContact::destroy($id);
        return redirect()->route('admin.settings')->with('success', 'Paramètres supprimés.');
    }
}

