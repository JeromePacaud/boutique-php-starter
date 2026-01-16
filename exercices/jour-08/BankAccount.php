<?php

class BankAccount
{
    private float $balance;

    public function __construct(float $balance)
    {
        $this->setBalance($balance);
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    // Setter comme dans TON code
    private function setBalance(float $balance): void
    {
        if ($balance < 0) {
            return; // on ne modifie pas le solde
        }
        $this->balance = $balance;
    }

    public function deposit(float $amount): array
    {
        if ($amount <= 0) {
            return [
                'success' => false,
                'message' => "Le montant du dépôt doit être positif",
                'balance' => $this->balance
            ];
        }

        $this->setBalance($this->balance + $amount);

        return [
            'success' => true,
            'message' => "Dépôt de {$amount} € effectué",
            'balance' => $this->balance
        ];
    }

    public function withdraw(float $amount): array
    {
        if ($amount <= 0) {
            return [
                'success' => false,
                'message' => "Le montant du retrait doit être positif",
                'balance' => $this->balance
            ];
        }

        if ($amount > $this->balance) {
            return [
                'success' => false,
                'message' => "Solde insuffisant",
                'balance' => $this->balance
            ];
        }

        $this->setBalance($this->balance - $amount);

        return [
            'success' => true,
            'message' => "Retrait de {$amount} € effectué",
            'balance' => $this->balance
        ];
    }
}


$deposit = 500;
$withdraw1 = 2500;
$withdraw2 = 0;
$withdraw3 = 500;
$bankAccount = new BankAccount(1000);

$results = [];

$results['deposit'] = $bankAccount->deposit($deposit);
$results['withdraw1'] = $bankAccount->withdraw($withdraw1);
$results['withdraw2'] = $bankAccount->withdraw($withdraw2);
$results['withdraw3'] = $bankAccount->withdraw($withdraw3);
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Compte bancaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <h3 class="card-title text-center">Mon compte</h3>

                        <p><strong>Solde :</strong> <?= $bankAccount->getBalance() ?> €</p>

                        <hr>
                        <p>Vous effectuez un dépôt de <?= $deposit ?> €</p>
                        <p class="<?= $results['deposit']['success'] ? 'text-success' : 'text-danger' ?>">
                            <?= htmlspecialchars($results['deposit']['message']) ?><br>
                            <small>Nouveau solde : <?= $results['deposit']['balance'] ?> €</small>
                        </p>

                        <p>Demande de retrait de <?= $withdraw1 ?> €</p>
                        <p class="<?= $results['withdraw1']['success'] ? 'text-success' : 'text-danger' ?>">
                            <?= htmlspecialchars($results['withdraw1']['message']) ?><br>
                            <small>Nouveau solde : <?= $results['withdraw1']['balance'] ?> €</small>
                        </p>

                        <p>Demande de retrait de <?= $withdraw2 ?> €</p>
                        <p class="<?= $results['withdraw2']['success'] ? 'text-success' : 'text-danger' ?>">
                            <?= htmlspecialchars($results['withdraw2']['message']) ?><br>
                            <small>Nouveau solde : <?= $results['withdraw2']['balance'] ?> €</small>
                        </p>

                        <p>Demande de retrait de <?= $withdraw3 ?> €</p>
                        <p class="<?= $results['withdraw3']['success'] ? 'text-success' : 'text-danger' ?>">
                            <?= htmlspecialchars($results['withdraw3']['message']) ?><br>
                            <small>Nouveau solde : <?= $results['withdraw3']['balance'] ?> €</small>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>