<?php

namespace App\Http\Controllers\ClientController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    // Méthode unifiée : validation + CAPTCHA + envoi d'email
    public function send(Request $request)
    {
        try {
            // Validation des données (sans captcha_verified qui est un champ interne)
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'messageContent' => 'required|string|max:5000'
            ]);

            if ($validator->fails()) {
                Log::warning('ContactController: Échec de validation', $validator->errors()->toArray());
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            // Si CAPTCHA n'est pas encore validé, demander validation
            $captchaVerified = $request->input('captcha_verified');
            $isCaptchaValid = $captchaVerified === true || $captchaVerified === 'true' || $captchaVerified === '1';

            if (!$isCaptchaValid) {
                return response()->json([
                    'success' => true,
                    'message' => 'Données validées. Veuillez compléter le CAPTCHA.',
                    'show_captcha' => true
                ]);
            }

            // CAPTCHA validé - Procéder à l'envoi de l'email

            // Préparer les données pour l'email
            $formData = $request->only(['name', 'email', 'subject', 'messageContent']);

            // Envoyer l'email
            try {
                Mail::send('emails.contact', $formData, function ($mailMessage) use ($formData) {
                    $mailMessage->to(env('CONTACT_RECIPIENT_EMAIL', 'parlons@kori-tek.com'), env('CONTACT_RECIPIENT_NAME', 'KORITEK TOGO'))
                        ->subject('Nouveau message de contact : ' . $formData['subject'])
                        ->from(env('MAIL_FROM_ADDRESS', 'parlons@kori-tek.com'), env('MAIL_FROM_NAME', 'KORITEK TOGO'))
                        ->replyTo($formData['email'], $formData['name']);
                });
            } catch (\Exception $mailException) {
                Log::error('ContactController: Erreur spécifique à l\'envoi d\'email', [
                    'message' => $mailException->getMessage(),
                    'file' => $mailException->getFile(),
                    'line' => $mailException->getLine(),
                    'formData' => $formData
                ]);
                throw $mailException; // Re-lancer l'exception pour qu'elle soit captée par le catch principal
            }

            return response()->json([
                'success' => true,
                'message' => 'Votre message a été envoyé avec succès!'
            ]);
        } catch (\Exception $e) {
            Log::error('ContactController: Erreur lors du traitement', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de l\'envoi du message.'
            ], 500);
        }
    }
}
