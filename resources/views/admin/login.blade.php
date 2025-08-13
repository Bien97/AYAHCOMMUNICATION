<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Connexion Admin - Company</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
<!-- Font Awesome pour les icônes -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<style>
  body, html {
    height: 100%;
    margin: 0;
    background-color: #FFFFFF;
    font-family: 'Poppins', sans-serif;
    color: #5B5B5B;
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
    max-width: 500px;
    padding: 40px 30px;
    text-align: center;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
  }
  .login-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 50px rgba(106, 74, 143, 0.3);
  }

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

  .admin-badge {
    background: linear-gradient(135deg, #6A4A8F, #8B5FBF);
    color: white;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 25px;
    display: inline-block;
    box-shadow: 0 4px 12px rgba(106, 74, 143, 0.3);
  }

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
  .form-control.is-invalid {
    border-color: #dc3545;
  }

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
    position: relative;
  }
  .btn-login:hover,
  .btn-login:focus {
    background-color: #5b3d74;
    box-shadow: 0 8px 28px rgba(91, 61, 116, 0.7);
    transform: scale(1.05);
  }
  .btn-login:disabled {
    opacity: 0.7;
    transform: none;
    cursor: not-allowed;
  }

  .spinner-border-sm {
    width: 1rem;
    height: 1rem;
  }

  .remember-checkbox {
    margin-top: 20px;
    text-align: left;
  }
  .remember-checkbox input[type="checkbox"] {
    margin-right: 8px;
    transform: scale(1.1);
  }
  .remember-checkbox label {
    font-size: 0.9rem;
    color: #6A4A8F;
    cursor: pointer;
    user-select: none;
  }

  @media (max-width: 480px) {
    .login-card {
      max-width: 100%;
      padding: 30px 20px;
      margin: 0 10px;
    }
    .btn-login {
      font-size: 1rem;
      padding: 12px 0;
    }
  }

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

  /* Messages d'alerte */
  .alert {
    border-radius: 10px;
    margin-bottom: 20px;
    border: none;
    font-weight: 500;
  }
  .alert-success {
    background-color: #d4edda;
    color: #155724;
  }
  .alert-danger {
    background-color: #f8d7da;
    color: #721c24;
  }
</style>
</head>
<body>
  <div class="login-card animate-fadeInUp" role="main" aria-label="Formulaire de connexion admin">
    
    <!-- Messages Flash -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="fas fa-check-circle me-2"></i>
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-exclamation-triangle me-2"></i>
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-exclamation-triangle me-2"></i>
      @foreach($errors->all() as $error)
        {{ $error }}<br>
      @endforeach
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="login-logo">
      @if(isset($settings) && $settings->logo_header)
        <img src="{{ asset('storage/' . $settings->logo_header) }}" alt="Logo de l'entreprise" />
      @else
        <img src="{{ asset('images/default-logo.png') }}" alt="Logo par défaut" />
      @endif
    </div>

    <div class="admin-badge">
      <i class="fas fa-shield-alt me-2"></i>
      Administration
    </div>

    <form method="POST" action="{{ route('admin.login.submit') }}" id="loginForm">
      @csrf
      
      <div class="mb-3">
        <label for="email" class="form-label">Adresse e-mail</label>
        <input type="email" 
               id="email" 
               name="email"
               class="form-control @error('email') is-invalid @enderror" 
               placeholder="admin@company.com" 
               value="{{ old('email') }}"
               required 
               autocomplete="username" />
        @error('email')
          <div class="invalid-feedback text-start">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" 
               id="password" 
               name="password"
               class="form-control @error('password') is-invalid @enderror" 
               placeholder="••••••••" 
               required 
               autocomplete="current-password" />
        @error('password')
          <div class="invalid-feedback text-start">{{ $message }}</div>
        @enderror
      </div>

      {{-- <div class="remember-checkbox">
        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember">Se souvenir de moi</label>
      </div> --}}

      <button type="submit" class="btn btn-login w-100" id="loginBtn">
        <span class="btn-text">Se connecter</span>
        <span class="spinner-border spinner-border-sm ms-2 d-none" id="loginSpinner"></span>
      </button>

    </form>

    <!-- Informations de connexion par défaut (à supprimer en production) -->
    {{-- @if(app()->environment('local'))
    <div class="alert alert-info mt-4" style="font-size: 0.8rem;">
      <i class="fas fa-info-circle me-1"></i>
      <strong>Identifiants par défaut :</strong><br>
      Email: admin@company.com<br>
      Mot de passe: admin123456
    </div>
    @endif --}}
  </div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const loginForm = document.getElementById('loginForm');
  const loginBtn = document.getElementById('loginBtn');
  const loginSpinner = document.getElementById('loginSpinner');
  const btnText = loginBtn.querySelector('.btn-text');

  loginForm.addEventListener('submit', function() {
    // Désactiver le bouton et afficher le spinner
    loginBtn.disabled = true;
    loginSpinner.classList.remove('d-none');
    btnText.textContent = 'Connexion...';
  });

  // Validation côté client
  const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');

  function validateForm() {
    const email = emailInput.value.trim();
    const password = passwordInput.value;
    
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (!email) {
      showFieldError(emailInput, 'L\'adresse e-mail est obligatoire.');
      return false;
    }
    
    if (!emailRegex.test(email)) {
      showFieldError(emailInput, 'L\'adresse e-mail n\'est pas valide.');
      return false;
    }
    
    if (!password) {
      showFieldError(passwordInput, 'Le mot de passe est obligatoire.');
      return false;
    }
    
    if (password.length < 6) {
      showFieldError(passwordInput, 'Le mot de passe doit contenir au moins 6 caractères.');
      return false;
    }
    
    // Nettoyer les erreurs
    clearFieldError(emailInput);
    clearFieldError(passwordInput);
    return true;
  }

  function showFieldError(field, message) {
    field.classList.add('is-invalid');
    let feedback = field.parentNode.querySelector('.invalid-feedback');
    if (!feedback) {
      feedback = document.createElement('div');
      feedback.className = 'invalid-feedback text-start';
      field.parentNode.appendChild(feedback);
    }
    feedback.textContent = message;
  }

  function clearFieldError(field) {
    field.classList.remove('is-invalid');
    const feedback = field.parentNode.querySelector('.invalid-feedback');
    if (feedback) feedback.remove();
  }

  // Validation en temps réel
  emailInput.addEventListener('blur', function() {
    const email = this.value.trim();
    if (email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        showFieldError(this, 'L\'adresse e-mail n\'est pas valide.');
      } else {
        clearFieldError(this);
      }
    }
  });

  passwordInput.addEventListener('input', function() {
    if (this.value.length > 0) {
      clearFieldError(this);
    }
  });
});
</script>

</body>
</html>