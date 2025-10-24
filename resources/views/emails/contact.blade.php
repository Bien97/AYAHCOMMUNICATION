<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .header {
            background-color: #ff8c00;
            color: white;
            padding: 20px;
            border-radius: 5px 5px 0 0;
            text-align: center;
        }
        .content {
            background-color: white;
            padding: 20px;
            border-radius: 0 0 5px 5px;
        }
        .info-row {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .label {
            font-weight: bold;
            color: #ff8c00;
        }
        .message-content {
            background-color: #f5f5f5;
            padding: 15px;
            border-left: 4px solid #ff8c00;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Nouveau message de contact - KORITEK TOGO</h2>
        </div>
        <div class="content">
            <div class="info-row">
                <span class="label">Nom :</span> {{ $name }}
            </div>
            <div class="info-row">
                <span class="label">Email :</span> {{ $email }}
            </div>
            <div class="info-row">
                <span class="label">Sujet :</span> {{ $subject }}
            </div>
            <div class="message-content">
                <span class="label">Message :</span>
                <p>{{ $messageContent }}</p>
            </div>
        </div>
    </div>
</body>
</html>