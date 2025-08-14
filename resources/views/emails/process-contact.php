<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

// Récupérer les données JSON
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Données invalides']);
    exit;
}

// Validation
$name = trim($data['name'] ?? '');
$email = trim($data['email'] ?? '');
$subject = trim($data['subject'] ?? '');
$message = trim($data['message'] ?? '');

if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'Tous les champs sont obligatoires']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Email invalide']);
    exit;
}

try {
    // Charger le template HTML
    $template = file_get_contents('contact.php');
    
    // Remplacer les variables (adaptation pour votre template)
    $template = str_replace('{{ $name }}', htmlspecialchars($name), $template);
    $template = str_replace('{{ $email }}', htmlspecialchars($email), $template);
    $template = str_replace('{{ $subject }}', htmlspecialchars($subject), $template);
    $template = str_replace('{!! nl2br(e($message)) !!}', nl2br(htmlspecialchars($message)), $template);
    
    // Configuration email
    $to = "votre-email@exemple.com"; // Remplacez par votre email
    $email_subject = "Contact: " . $subject;
    
    // Headers pour email HTML
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    
    // Envoyer l'email
    if (mail($to, $email_subject, $template, $headers)) {
        echo json_encode(['success' => true, 'message' => 'Message envoyé avec succès']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'envoi']);
    }
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Erreur serveur: ' . $e->getMessage()]);
}
?>