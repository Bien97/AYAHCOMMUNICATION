<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Nouveau message de contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .content {
            background: white;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
        }

        .field {
            margin-bottom: 15px;
        }

        .field strong {
            color: #495057;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>📧 Nouveau message de contact</h2>
            <p>Vous avez reçu un nouveau message depuis votre site web.</p>
        </div>

        <div class="content">
            <div class="field">
                <strong>Nom :</strong> {{ $name }}
            </div>

            <div class="field">
                <strong>Email :</strong> {{ $email }}
            </div>

            <div class="field">
                <strong>Sujet :</strong> {{ $subject }}
            </div>

            <div class="field">
                <strong>Message :</strong><br>
                {!! nl2br(e($messageContent)) !!}
            </div>
        </div>

        <div style="margin-top: 20px; font-size: 12px; color: #6c757d; text-align: center;">
            Message envoyé depuis AYAH Communication
        </div>
    </div>
</body>

</html>
