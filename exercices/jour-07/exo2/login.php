<?php
session_start();

$error = null;

/* Traitement du formulaire */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'admin' && $password === '1234') {
        $_SESSION['user'] = $username;

        // Redirection après connexion (PRG)
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Identifiants incorrects';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Connexion</title>
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
    <div class="container mt-5">
        <div class="card p-4">
            <h1>Connexion</h1>

            <?php if ($error): ?>
                <p style="color:red"><?= $error ?></p>
            <?php endif; ?>

            <form method="post">
                <div class="mb-3">
                    <label>Nom d'utilisateur</label><br>
                    <input class="form-control" type="text" name="username" required>
                </div>

                <div class="mb-3">
                    <label>Mot de passe</label><br>
                    <input class="form-control" type="password" name="password" required>
                </div>

                <button class="btn btn-primary w-100" type="submit">Se connecter</button>
            </form>
        </div>
    </div>
</body>

</html>

