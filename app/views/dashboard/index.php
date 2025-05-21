<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            background: linear-gradient(145deg, #292941, #1c1c2e);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            padding: 15px 30px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .btn:hover {
            background: linear-gradient(145deg, #3a3a5c, #2e2e49);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        }

        .btn:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>
    <h1>Dashboard voor Beheerders</h1>
    <div class="btn-container">
        <button class="btn" onclick="goToAccounts()">Overzicht Accounts</button>
        <button class="btn" onclick="goToAutos()">Overzicht Auto's</button>
    </div>

    <script>
        function goToAccounts() {
            alert("Navigeren naar Overzicht Accounts...");
            // window.location.href = 'accounts.html'; // gebruik dit voor echte navigatie
        }

        function goToAutos() {
            alert("Navigeren naar Overzicht Auto's...");
            // window.location.href = 'autos.html'; // gebruik dit voor echte navigatie
        }
    </script>
</body>
</html>
