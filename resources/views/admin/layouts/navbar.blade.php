<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel Navbar</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- FontAwesome (pour les icônes) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

  <!-- Google Fonts Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    /* Navbar */
    .navbar {
      background-color: #2c2f48; /* sombre */
      padding: 0.5rem 1rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .navbar-brand {
      color: #fff;
      font-weight: 700;
      font-size: 1.4rem;
      user-select: none;
    }

    .toggle-btn {
      background: none;
      border: none;
      color: #fff;
      font-size: 1.4rem;
      cursor: pointer;
      transition: color 0.3s ease;
    }
    .toggle-btn:hover, .toggle-btn:focus {
      color: #9b59b6;
      outline: none;
    }

    /* Search box */
    .search-input {
      border-radius: 20px;
      border: none;
      padding: 6px 15px;
      width: 200px;
      max-width: 100%;
      transition: box-shadow 0.3s ease;
    }
    .search-input:focus {
      outline: none;
      box-shadow: 0 0 8px #9b59b6;
    }

    /* Nav icons */
    .nav-icons {
      display: flex;
      align-items: center;
      gap: 1.2rem;
    }
    .nav-icons .btn {
      color: #fff;
      position: relative;
      font-size: 1.3rem;
    }
    /* Badge notification */
    .nav-icons .btn .badge {
      position: absolute;
      top: -6px;
      right: -8px;
      background: #e74c3c;
      color: #fff;
      font-size: 0.65rem;
      padding: 2px 6px;
      border-radius: 50%;
      font-weight: 700;
    }

    /* Dropdown user */
    .dropdown-toggle::after {
      margin-left: 6px;
      color: #fff;
    }
    .dropdown-toggle {
      color: #fff !important;
      font-weight: 600;
    }
    .dropdown-menu {
      border-radius: 8px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.15);
      min-width: 180px;
      font-family: 'Poppins', sans-serif;
    }
    .dropdown-item {
      font-weight: 500;
      color: #333;
    }
    .dropdown-item:hover, .dropdown-item:focus {
      background-color: #9b59b6;
      color: #fff;
      outline: none;
    }
    .dropdown-item.text-danger {
      color: #e74c3c;
    }
    .dropdown-item.text-danger:hover, 
    .dropdown-item.text-danger:focus {
      background-color: #c0392b;
      color: #fff;
    }

    /* Responsive: search field */
    @media (max-width: 576px) {
      .search-input {
        width: 120px;
      }
      .nav-icons {
        gap: 0.8rem;
      }
    }
  </style>
</head>
<body>

<nav class="navbar navbar-dark">
  <div class="container-fluid d-flex align-items-center justify-content-between">
    <!-- Sidebar toggle -->
    <button class="toggle-btn me-3" id="sidebarToggle" aria-label="Toggle sidebar">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Brand -->
    <span class="navbar-brand mb-0 h1">Admin Panel</span>

    <!-- Search -->
    <form class="d-none d-md-flex flex-grow-1 mx-3" role="search" aria-label="Recherche">
      <input type="search" class="form-control search-input" placeholder="Recherche..." aria-label="Recherche" />
    </form>

    <!-- Icons + Profile dropdown -->
    <div class="nav-icons">
      <!-- Notifications -->
      <button type="button" class="btn position-relative" aria-label="Notifications">
        <i class="fas fa-bell"></i>
        <span class="badge">3</span>
      </button>

      <!-- Messages -->
      <button type="button" class="btn position-relative" aria-label="Messages">
        <i class="fas fa-envelope"></i>
        <span class="badge">5</span>
      </button>

      <!-- User dropdown -->
      <div class="dropdown">
        <a href="#" class="btn dropdown-toggle d-flex align-items-center" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-user-circle me-2"></i> Admin
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
          <li><a class="dropdown-item" href="#">Profil</a></li>
          <li><a class="dropdown-item" href="#">Paramètres</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-danger" href="#">Déconnexion</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
