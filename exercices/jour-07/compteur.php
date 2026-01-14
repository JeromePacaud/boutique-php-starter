<?php

session_start();

$_SESSION["visits"];


if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 1;
} else {
    $_SESSION['visits']++;
}

if (isset($_POST["reset"])) {
    $_SESSION["visits"] = 0;

    header('Location: compteur.php');
    exit;
}

?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Bonjour</title>
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

<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4">
            <h1 class="mb-4">Exercice 1 — COMPTEUR</h1>
            <div class="alert alert-warning">
                Vous avez visité cette page <?= $_SESSION["visits"] ?>
            </div>
            <form class="w-100" action="" method="post">
                <button class="w-100 btn btn-primary" type="submit" name="reset">Reset</button>
            </form>
        </div>
    </div>
</body>

</html>