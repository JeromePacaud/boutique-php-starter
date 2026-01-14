<?php
$data = ['username' => '', 'email' => ''];
$errors = [];

if ($_POST) {
    $data['username'] = trim($_POST['username'] ?? '');
    $data['email'] = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirmation'] ?? '';

    if (!preg_match('/^[a-zA-Z0-9]{3,20}$/', $data['username']))
        $errors['username'] = "3-20 caractères alphanumériques";

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
        $errors['email'] = "Email invalide";

    if (strlen($password) < 8)
        $errors['password'] = "Minimum 8 caractères";

    if ($password !== $confirm)
        $errors['confirmation'] = "Les mots de passe ne correspondent pas";
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
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
            <h1>Exercice 4 — Inscription</h1>

            <form method="post">
                <?php foreach ($data as $field => $value): ?>
                    <div class="mb-3">
                        <label><?= ucfirst($field) ?></label>
                        <input class="form-control" name="<?= $field ?>" value="<?= htmlspecialchars($value) ?>">
                        <div class="text-danger"><?= $errors[$field] ?? '' ?></div>
                    </div>
                <?php endforeach; ?>

                <div class="mb-3">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" name="password">
                    <div class="text-danger"><?= $errors['password'] ?? '' ?></div>
                </div>

                <div class="mb-3">
                    <label>Confirmation</label>
                    <input type="password" class="form-control" name="confirmation">
                    <div class="text-danger"><?= $errors['confirmation'] ?? '' ?></div>
                </div>

                <button class="btn btn-primary">S'inscrire</button>
            </form>

            <?php if ($_POST && empty($errors)): ?>
                <div class="alert alert-success mt-3">Inscription réussie 🎉</div>
            <?php endif; ?>

        </div>
    </div>
</body>

</html>