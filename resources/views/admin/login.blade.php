<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Login - Company</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- Google Fonts (optional) -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
<style>
  body, html {
    height: 100%;
    margin: 0;
    background-color: #FFFFFF; /* fond blanc */
    font-family: 'Poppins', sans-serif;
    color: #5B5B5B; /* gris texte */
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
  }

  .login-card {
    background: #FFFFFF;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(106, 74, 143, 0.15);
    width: 100%;
    max-width: 1000px; /* augmenté de 560px à 800px */
    padding: 40px 30px;
    text-align: center;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
  }
  .login-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(106, 74, 143, 0.3);
  }

  /* Logo */
  .login-logo {
    margin-bottom: 35px;
  }
  .login-logo img {
    max-width: 110px;
    filter: drop-shadow(0 3px 6px rgba(106, 74, 143, 0.15));
    transition: transform 0.3s ease;
  }
  .login-logo img:hover {
    transform: scale(1.1) rotate(-3deg);
  }

  /* Form */
  .form-label {
    font-weight: 600;
    color: #6A4A8F;
    text-align: left;
    display: block;
    margin-bottom: 6px;
    user-select: none;
  }

  .form-control {
    border-radius: 30px;
    padding: 14px 20px;
    font-size: 1rem;
    border: 2px solid #5B5B5B;
    color: #5B5B5B;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
  }
  .form-control::placeholder {
    color: #A0A0A0;
  }
  .form-control:focus {
    border-color: #6A4A8F;
    box-shadow: 0 0 8px rgba(106, 74, 143, 0.5);
    outline: none;
    color: #5B5B5B;
  }

  /* Button */
  .btn-login {
    margin-top: 25px;
    border-radius: 30px;
    padding: 13px 0;
    font-weight: 700;
    font-size: 1.15rem;
    background-color: #6A4A8F;
    border: none;
    color: #FFFFFF;
    box-shadow: 0 6px 20px rgba(106, 74, 143, 0.4);
    transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
  }
  .btn-login:hover,
  .btn-login:focus {
    background-color: #5b3d74;
    box-shadow: 0 8px 28px rgba(91, 61, 116, 0.7);
    transform: scale(1.05);
  }

  /* Forgot password - centré */
  .forgot-link {
    display: block;
    margin-top: 15px;
    font-weight: 500;
    font-size: 0.9rem;
    color: #6A4A8F;
    text-decoration: none;
    text-align: center; /* centré */
    user-select: none;
    transition: color 0.3s ease;
  }
  .forgot-link:hover {
    color: #5b3d74;
    text-decoration: underline;
  }

  /* Mobile (petits écrans) */
  @media (max-width: 480px) {
    .login-card {
      max-width: 100%; /* prend toute la largeur dispo */
      padding: 30px 20px;
      margin: 0 10px; /* petit espace sur les côtés */
    }

    .btn-login {
      font-size: 1rem;
      padding: 12px 0;
    }
  }

  /* Desktop (larges écrans) */
  @media (min-width: 481px) {
    .login-card {
      max-width: 800px; /* augmenté ici aussi */
      padding: 40px 30px;
      margin: auto;
    }

    .btn-login {
      font-size: 1.15rem;
      padding: 13px 0;
    }
  }

  /* Animation fade-in */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  .animate-fadeInUp {
    animation: fadeInUp 0.7s ease forwards;
  }
</style>
</head>
<body>
  <div class="login-card animate-fadeInUp" role="main" aria-label="Formulaire de connexion">
    <div class="login-logo">
      <!-- Remplace par le logo de ton entreprise -->
      <img src="{{ asset('storage/' . $settings->logo_header) }}" alt="Logo de l'entreprise" />
    </div>

    <form>
      <label for="email" class="form-label">Adresse e-mail</label>
      <input type="email" id="email" class="form-control" placeholder="exemple@domaine.com" required autocomplete="username" />

      <label for="password" class="form-label mt-4">Mot de passe</label>
      <input type="password" id="password" class="form-control" placeholder="••••••••" required autocomplete="current-password" />

      <button type="submit" class="btn btn-login w-100">Se connecter</button>

      {{-- <a href="#" class="forgot-link" tabindex="0">Mot de passe oublié ?</a> --}}
    </form>
  </div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
