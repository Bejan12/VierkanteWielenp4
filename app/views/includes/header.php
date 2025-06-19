<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= URLROOT; ?>/public/css/style.css">
    <link rel="shortcut icon" href="<?= URLROOT; ?>/public/img/favicon.ico" type="image/x-icon">

    <style>
      .dropdown-menu.dropdown-menu-end {
        min-width: 220px; /* Vergroot de breedte van de dropdown */
      }
      .dropdown-item-text.fw-bold.text-primary {
        white-space: normal;
        display: block;
        text-align: left;
      }
    </style>
  </head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="<?= URLROOT; ?>/">
      <img src="/img/logovierkantewielen.png" alt="Logo" width="40" height="40" class="me-2 rounded">
      <span class="fw-bold text-primary">Vierkante Wielen</span>
    </a>

    <!-- Hamburger voor mobiel -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar inhoud -->
    <div class="collapse navbar-collapse" id="mainNavbar">
      <!-- Midden (centraal) -->
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/home/index">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/smartphones/index">Pakketten</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/sneakers/index">Instructeurs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/horloges/index">Over ons</a>
        </li>
      </ul>

      <!-- Rechts (user icoon) -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle fs-4 text-primary"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li>
              <span class="dropdown-item-text fw-bold text-primary">
                <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Gast'; ?>
                <?php if (isset($_SESSION['rol'])): ?>
                  | <?= htmlspecialchars($_SESSION['rol']); ?>
                <?php endif; ?>
              </span>
            </li>
            <li><hr class="dropdown-divider"></li>
            <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Beheerder'): ?>
              <li>
                <a class="dropdown-item" href="<?= URLROOT; ?>/dashboard/index">
                  <i class="bi bi-speedometer2 me-2"></i>Dashboard
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
            <?php endif; ?>
            <li>
              <a class="dropdown-item text-danger" href="<?= URLROOT; ?>/accounts/logout">
                <i class="bi bi-box-arrow-right me-2"></i>Uitloggen
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
