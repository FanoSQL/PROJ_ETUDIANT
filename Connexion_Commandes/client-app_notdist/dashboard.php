<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['client_id'])) {
    header('Location: login.php');
    exit;
}

$client_id = $_SESSION['client_id'];

// Récupérer les commandes du client
$sql = "SELECT * FROM commandes WHERE IdClient = ? ORDER BY date_commande DESC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $client_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$commandes = [];
while ($row = mysqli_fetch_assoc($result)) {
    $commandes[] = $row;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🏠 Dashboard Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>🏠 Bonjour, <?= htmlspecialchars($_SESSION['nom']) ?> !</h1>
            <a href="logout.php" class="btn btn-outline-danger">🚪 Se déconnecter</a>
        </div>

        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h3 class="mb-0">📦 Vos commandes</h3>
            </div>
            <div class="card-body">
                <?php if (empty($commandes)): ?>
                    <p class="text-center">Aucune commande trouvée.</p>
                <?php else: ?>
                    <ul class="list-group">
                        <?php foreach ($commandes as $cmd): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong><?= htmlspecialchars($cmd['reference_commande']) ?></strong><br>
                                    <small><?= $cmd['date_commande'] ?></small>
                                </div>
                                <a href="commande.php?id=<?= $cmd['IdCommande'] ?>" class="btn btn-sm btn-info">🔍 Détails</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>