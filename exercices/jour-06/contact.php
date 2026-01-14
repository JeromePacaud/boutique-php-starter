<?php
$data = ['name' => '', 'email' => '', 'message' => ''];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($data as $key => $_) {
        $data[$key] = trim($_POST[$key] ?? '');
    }

    if ($data['name'] === '') $errors['name'] = "Nom requis";
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = "Email invalide";
    if (strlen($data['message']) < 10) $errors['message'] = "Message minimum 10 caractères";
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Contact</title>
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
            <h1>Exercice 3 — Contact</h1>

            <form method="post">
                <?php foreach ($data as $field => $value): ?>
                    <div class="mb-3">
                        <label><?= ucfirst($field) ?></label>
                        <?php if ($field === 'message'): ?>
                            <textarea name="<?= $field ?>" class="form-control"><?= htmlspecialchars($value) ?></textarea>
                        <?php else: ?>
                            <input class="form-control" name="<?= $field ?>" value="<?= htmlspecialchars($value) ?>">
                        <?php endif; ?>
                        <div class="text-danger"><?= $errors[$field] ?? '' ?></div>
                    </div>
                <?php endforeach; ?>
                <button class="btn btn-primary">Envoyer</button>
            </form>

            <?php if ($_POST && empty($errors)): ?>
                <div class="alert alert-success mt-3">
                    Message envoyé avec succès ✅
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>