<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Beheerdersdashboard</title>
  <style>
    /* Donker thema */
    body {
      background-color: #1e1e2f;
      color: #f0f0f0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 40px;
      text-shadow: 2px 2px 4px #00000099;
    }

    .btn-container {
      display: flex;
      gap: 20px;
    }

    .btn {
      border: none;
      border-radius: 12px;
      padding: 12px 24px;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      text-decoration: none;
      display: inline-block;
      color: #ffffff;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.4);
    }

    .btn:active {
      transform: scale(0.98);
    }

    /* Specifieke knoppenkleuren */
    .btn-default {
      background: linear-gradient(145deg, #292941, #1c1c2e);
    }

    .btn-default:hover {
      background: linear-gradient(145deg, #3a3a5c, #2e2e49);
    }

    .btn-blue {
      background: linear-gradient(145deg, #0182E2, #005fa3);
    }

    .btn-blue:hover {
      background: linear-gradient(145deg, #1a96f0, #0071c2);
    }

    .btn-red {
      background: linear-gradient(145deg, #e74c3c, #c0392b);
    }

    .btn-red:hover {
      background: linear-gradient(145deg, #ff5e50, #d84333);
    }

    .top-right {
      position: absolute;
      top: 30px;
      right: 40px;
      display: flex;
      gap: 15px;
      z-index: 10;
    }
  </style>
</head>
<body>
  <!-- Rechterboven knoppen -->
  <div class="top-right">
    <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-blue">Terug naar beginscherm</a>
    <a href="<?= URLROOT; ?>/accounts/logout" class="btn btn-red">Uitloggen</a>
  </div>

  <h1>Dashboard voor Beheerders</h1>

  <!-- Hoofdknoppen -->
  <div class="btn-container">
    <button class="btn btn-default" onclick="goToAccounts()">Overzicht Accounts</button>
    <button class="btn btn-default" onclick="goToAutos()">Overzicht Auto's</button>
  </div>

  <script>
    function goToAccounts() {
      alert("Navigeren naar Overzicht Accounts...");
    }

    function goToAutos() {
      alert("Navigeren naar Overzicht Auto's...");
    }
  </script>
</body>
</html>
