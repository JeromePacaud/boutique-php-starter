<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "jour-09" . DIRECTORY_SEPARATOR . "Class" . DIRECTORY_SEPARATOR . "User.php";

$user = new User("Sophie Dupont", 'sophie.dupont@email.com');
$address = new Address("8 rue de la république", "Paris", "75000", "France");
$address2 = new Address("9 rue des champs elysée", "Paris", "75000", "France");

$user->addAddress($address);
$user->addAddress($address2);

// echo $user->getDefaultAddress()->getAdress();
// echo $user->getAddress()[1]->getAdress();
// echo $user->getRegistrationDate();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>jour-09</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<pre class="container row">
    <div class="col-md-4">
        <?= var_dump($user) ?>
    </div>
    <div class="col-md-4">
        <?= var_dump($address) ?>
    </div>
    <div class="col-md-4">
        <?= var_dump($address2) ?>
    </div>
</pre>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4 text-center">User & Address</h2>

        <div class="row">
            <!-- User -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">Nom : <strong><?= $user->getName() ?></strong></h5>
                        <ul class="list-group list-group-flush mb-2">
                            <li class="list-group-item">
                                Email : <strong><?= $user->getEmail() ?></strong></p>
                            </li>
                            <li class="list-group-item">
                                Adresse par defaut : <strong><?= $user->getDefaultAddress()->getAdress() ?></strong>
                            </li>
                            <li class="list-group-item">
                                Autre adresse : <strong><?= $user->getAddress()[1]->getAdress() ?></strong>
                            </li>
                            <li class="list-group-item">
                                Date d'inscription : <strong><?= $user->getRegistrationDate() ?></strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>