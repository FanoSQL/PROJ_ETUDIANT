<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['client_id'])) {
    header('Location: login.php');
    exit;
}

$commande_id = $_GET['id'] ?? 0;

// Vérifier que la commande appartient au client
$sql = "SELECT c.*, cl.nom FROM commandes c JOIN clients cl ON c.IdClient = cl.IdClient WHERE c.IdCommande = ? AND c.IdClient = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'ii', $commande_id, $_SESSION['client_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$commande = mysqli_fetch_assoc($result);

if (!$commande) {
    die("<div class='container mt-5'><div class='alert alert-danger'>Commande introuvable ou non autorisée.</div></div>");
}

// Récupérer les détails de la commande
$sql_details = "SELECT * FROM details_commande WHERE IdCommande = ?";
$stmt_details = mysqli_prepare($conn, $sql_details);
mysqli_stmt_bind_param($stmt_details, 'i', $commande_id);
mysqli_stmt_execute($stmt_details);
$result_details = mysqli_stmt_get_result($stmt_details);
$details = [];
while ($row = mysqli_fetch_assoc($result_details)) {
    $details[] = $row;
}

// Récupérer les informations de livraison
$sql_livraison = "SELECT * FROM livraisons WHERE IdCommande = ?";
$stmt_livraison = mysqli_prepare($conn, $sql_livraison);
mysqli_stmt_bind_param($stmt_livraison, 'i', $commande_id);
mysqli_stmt_execute($stmt_livraison);
$livraison = mysqli_stmt_get_result($stmt_livraison)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📦 Détail de la commande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>📦 Détail de la commande</h1>
            <a href="dashboard.php" class="btn btn-outline-secondary">← Retour</a>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Référence : <?= htmlspecialchars($commande['reference_commande']) ?></h3>
                <p class="mb-0">Client : <?= htmlspecialchars($commande['nom']) ?></p>
                <p class="mb-0">Date : <?= $commande['date_commande'] ?></p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">📝 Détails des produits</h4>
            </div>
            <div class="card-body">
                <?php if (empty($details)): ?>
                    <p>Aucun produit dans cette commande.</p>
                <?php else: ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Référence</th>
                                <th>Description</th>
                                <th>Quantité</th>
                                <th>Prix TTC</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            <?php foreach ($details as $detail): ?>
                                <tr>
                                    <td><?= htmlspecialchars($detail['reference_produit']) ?></td>
                                    <td><?= htmlspecialchars($detail['description']) ?></td>
                                    <td><?= $detail['quantite'] ?></td>
                                    <td><?= number_format($detail['prix_ttc'], 2, ',', ' ') ?> €</td>
                                    <td><?= number_format($detail['quantite'] * $detail['prix_ttc'], 2, ',', ' ') ?> €</td>
                                </tr>
                                <?php $total += $detail['quantite'] * $detail['prix_ttc']; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" class="text-end"><strong>Total :</strong></td>
                                <td><strong><?= number_format($total, 2, ',', ' ') ?> €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">🚚 Livraison</h4>
            </div>
            <div class="card-body">
                <?php if ($livraison): ?>
                    <p><strong>Adresse :</strong> <?= nl2br(htmlspecialchars($livraison['adresse_livraison'])) ?></p>
                    <p><strong>Date de livraison :</strong> <?= $livraison['date_livraison'] ?></p>
                <?php else: ?>
                    <p>Aucune information de livraison disponible.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>