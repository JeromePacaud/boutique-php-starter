<?php
session_start();

/* Protection de la page */
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="row">
    <div class="col-md-4">
        <h3>$_SERVER</h3>
        <pre>
            <?= var_dump($_SERVER) ?>
        </pre>
    </div>
    <div class="col-md-4">
        <h3>$_GET</h3>
        <pre>
            <?= var_dump($_GET) ?>
        </pre>
    </div>
    <div class="col-md-4">
        <h3>$_SESSION</h3>
        <pre>
            <?= var_dump($_SESSION) ?>
        </pre>
    </div>
</div>

<body class="bg-ligth">

    <div class="container mt-5 mb-5">
        <div class="card p-4">
            <h1 class="text-center">Dashboard</h1>

            <p class="text-center">Bonjour <strong><?= htmlspecialchars($_SESSION['user']) ?></strong> !</p>

            <a class="btn btn-danger" href="logout.php">Se déconnecter</a>
        </div>
    </div>
</body>

</html>