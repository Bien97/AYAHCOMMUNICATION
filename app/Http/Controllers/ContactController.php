<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $messages = [
            'name.required'    => 'Le nom est obligatoire.',
            'name.string'      => 'Le nom doit être une chaîne de caractères.',
            'name.max'         => 'Le nom ne peut pas dépasser 255 caractères.',
            'name.regex'       => 'Le nom ne doit pas contenir de chiffres.',

            'email.required'   => 'L’adresse e-mail est obligatoire.',
            'email.email'      => 'L’adresse e-mail n’est pas valide.',
            'email.max'        => 'L’e-mail ne peut pas dépasser 255 caractères.',

            'subject.required' => 'L’objet est obligatoire.',
            'subject.string'   => 'L’objet doit être une chaîne de caractères.',
            'subject.max'      => 'L’objet ne peut pas dépasser 255 caractères.',

            'message.required' => 'Le message est obligatoire.',
            'message.string'   => 'Le message doit être une chaîne de caractères.',
            'message.max'      => 'Le message ne peut pas dépasser 5000 caractères.',
        ];

        $validator = Validator::make($request->all(), [
            'name'    => ['required', 'string', 'max:255', 'regex:/^[^\d]+$/u'],
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors(),
                'message' => 'Veuillez corriger les erreurs dans le formulaire.'
            ], 422);
        }

        try {
            $data = $request->only(['name', 'email', 'subject', 'message']);

            Mail::send('emails.contact', $data, function ($message) use ($data) {
                $message->to('votre-email@entreprise.com')
                        ->subject('Contact: ' . $data['subject'])
                        ->replyTo($data['email'], $data['name']);
            });

            return response()->json([
                'success' => true,
                'message' => 'Message envoyé avec succès !'
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur envoi email contact : ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de l’envoi du message.'
            ], 500);
        }
    }
}
