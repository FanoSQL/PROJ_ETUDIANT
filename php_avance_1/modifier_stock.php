<?php
// 1. Connexion à la base de données
require_once "config/MesFonctions.php";
$conn = ConnectMySQLi();
//------------------------

$message = '';

// 2. Traitement du formulaire si soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'modifier_stock') {
    
    $erreurs = [];
    $succes = true;

    // Parcourir chaque ligne du formulaire
    foreach ($_POST['id'] as $index => $id_stock) {
        $id_stock = (int)$id_stock;

        // Récupérer les valeurs du formulaire
        $libelle = trim($_POST['libelle'][$index] ?? '');
        $qte_entree = (int)($_POST['qte_entree'][$index] ?? 0);
        $date_entree = $_POST['date_entree'][$index] ?? '';
        $date_sortie = !empty($_POST['date_sortie'][$index]) ? $_POST['date_sortie'][$index] : null;
        $qte_sortie = !empty($_POST['qte_sortie'][$index]) ? (int)$_POST['qte_sortie'][$index] : null;
        $prix_ht = (float)($_POST['prix_ht'][$index] ?? 0);

        // Validation basique
        if (empty($libelle)) {
            $erreurs[] = "Le libellé de l'article ID $id_stock est vide.";
            $succes = false;
            continue;
        }

        if ($qte_entree < 0) {
            $erreurs[] = "La quantité entrée pour l'article ID $id_stock ne peut pas être négative.";
            $succes = false;
            continue;
        }

        if ($prix_ht < 0) {
            $erreurs[] = "Le prix HT pour l'article ID $id_stock ne peut pas être négatif.";
            $succes = false;
            continue;
        }

        // Préparer la requête de mise à jour
        $sql = "UPDATE stock SET 
                Libelle = ?, 
                QteEntree = ?, 
                DateEntree = ?, 
                DateSortie = ?, 
                QteSortie = ?, 
                PrixUnitaireHT = ? 
                WHERE IdStock = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sisdsdi", $libelle, $qte_entree, $date_entree, $date_sortie, $qte_sortie, $prix_ht, $id_stock);

        if (!mysqli_stmt_execute($stmt)) {
            $erreurs[] = "Erreur lors de la mise à jour de l'article ID $id_stock : " . mysqli_error($conn);
            $succes = false;
        }

        mysqli_stmt_close($stmt);
    }

    if ($succes) {
        $message = "<div style='background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;'>
                    ✅ Toutes les modifications ont été enregistrées avec succès !
                    </div>";
    } else {
        $message = "<div style='background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;'>
                    ❌ Erreurs rencontrées :<br>" . implode("<br>", $erreurs) . "
                    </div>";
    }
}

// 3. Récupérer les données actuelles
$sql = "SELECT IdStock, Libelle, QteEntree, DateEntree, DateSortie, QteSortie, PrixUnitaireHT FROM stock ORDER BY IdStock ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Stock - Gestion Complète</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding: 30px 20px;
            line-height: 1.6;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: 600;
            position: sticky;
            top: 0;
        }

        tr:hover {
            background-color: #f8f9fa;
        }

        input, select {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0,123,255,0.25);
        }

        .btn-modifier {
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 30px auto 0;
            padding: 15px 25px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .btn-modifier:hover {
            background: #218838;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 10px;
            }
            th, td {
                padding: 10px 8px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📝 Modifier l'Ensemble du Stock</h1>

        <?php echo $message; ?>

        <form method="POST" action="">
            <input type="hidden" name="action" value="modifier_stock">

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libellé</th>
                        <th>Qté Entrée</th>
                        <th>Date Entrée</th>
                        <th>Date Sortie</th>
                        <th>Qté Sortie</th>
                        <th>Prix HT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['IdStock']); ?>
                                <input type="hidden" name="id[]" value="<?php echo $row['IdStock']; ?>">
                            </td>
                            <td><input type="text" name="libelle[]" value="<?php echo htmlspecialchars($row['Libelle']); ?>" required></td>
                            <td><input type="number" name="qte_entree[]" value="<?php echo $row['QteEntree']; ?>" min="0" required></td>
                            <td><input type="date" name="date_entree[]" value="<?php echo $row['DateEntree']; ?>" required></td>
                            <td><input type="date" name="date_sortie[]" value="<?php echo $row['DateSortie'] ?? ''; ?>"></td>
                            <td><input type="number" name="qte_sortie[]" value="<?php echo $row['QteSortie'] ?? ''; ?>" min="0"></td>
                            <td><input type="number" step="0.01" name="prix_ht[]" value="<?php echo $row['PrixUnitaireHT']; ?>" min="0" required></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <button type="submit" class="btn-modifier">💾 Enregistrer Toutes les Modifications</button>
        </form>
    </div>
</body>
</html>