<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validation des données reçues
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Email destinataire fixe
        $toEmail = 'contact@tonentreprise.com';

        // Envoi du mail simple (sans view, juste un texte brut)
        Mail::raw(
            "Nom: {$data['name']}\nEmail: {$data['email']}\n\nMessage:\n{$data['message']}",
            function ($message) use ($toEmail, $data) {
                $message->to($toEmail)
                        ->subject('Contact Form: ' . $data['subject'])
                        ->replyTo($data['email'], $data['name']);
            }
        );

        return back()->with('success', 'Votre message a été envoyé avec succès.');
    }
}
