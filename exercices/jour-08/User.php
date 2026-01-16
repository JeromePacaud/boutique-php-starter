<?php

class User
{
    public string $name;
    public string $email;
    public DateTime $registrationDate;

    public function __construct(
        string $name,
        string $email,
        ?DateTime $registrationDate = null
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->registrationDate = $registrationDate ?? new DateTime();
    }

    public function isNewMember(): bool
    {
        $now = new DateTime();
        $interval = $this->registrationDate->diff($now);

        return $interval->days < 30;
    }

    public function memberSince(): int
    {
        $now = new DateTime();
        $interval = $this->registrationDate->diff($now);

        return $interval->days;
    }
}

$user = new User("Jérôme", "jerome@mail.com");
$user2 = new User("Elyes", "elyes@mail.com", new DateTime('2025-10-15'));

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Bonjour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <?php if ($user->isNewMember()): ?>
                <p><?= $user->name ?> est un nouveau membre (depuis <?= $user->memberSince() ?> jour<?= $user->memberSince() > 1 ? 's' : "" ?>)</p>
            <?php else: ?>
                <p><?= $user->name ?> n'est pas un nouveau membre (depuis <?= $user->memberSince() ?> jour<?= $user->memberSince() > 1 ? 's' : "" ?>)</p>
            <?php endif; ?>

            <?php if ($user2->isNewMember()): ?>
                <p><?= $user2->name ?> est un nouveau membre (depuis <?= $user2->memberSince() ?> jour<?= $user2->memberSince() > 1 ? 's' : "" ?>)</p>
            <?php else: ?>
                <p><?= $user2->name ?> n'est pas un nouveau membre (depuis <?= $user2->memberSince() ?> jour<?= $user2->memberSince() > 1 ? 's' : "" ?>)</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>