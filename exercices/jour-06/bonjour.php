<?php
$name = trim($_GET['name'] ?? '');
$age  = trim($_GET['age'] ?? '');

$message = "Bonjour visiteur !";

if ($name !== '') {
    $message = "Bonjour " . htmlspecialchars($name);
    if (is_numeric($age)) {
        $message .= ", vous avez " . (int)$age . " ans !";
    } else {
        $message .= " !";
    }
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
        <pre>
            <?= var_dump($_SERVER) ?>
        </pre>
    </div>
    <div class="col-md-4">
        <pre>
            <?= var_dump($_REQUEST) ?>
        </pre>
    </div>
    <div class="col-md-4">
        <pre>
            <?= var_dump($_GET) ?>
        </pre>
    </div>
</div>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4">
            <h1 class="mb-4">Exercice 1 — Bonjour</h1>

            <form method="get" class="row g-3 mb-3">
                <div class="col-md-6">
                    <input class="form-control" name="name" placeholder="Nom" value="<?= htmlspecialchars($name) ?>">
                </div>
                <div class="col-md-6">
                    <input class="form-control" name="age" placeholder="Âge" value="<?= htmlspecialchars($age) ?>">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary">Dire bonjour</button>
                </div>
            </form>

            <div class="alert alert-info"><?= $message ?></div>
        </div>
    </div>
</body>

</html>