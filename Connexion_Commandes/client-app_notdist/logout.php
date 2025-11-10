<?php
session_start();
require_once 'config/db.php';

if (isset($_SESSION['client_id'])) {
    // Journaliser la déconnexion
    $sql = "INSERT INTO journal (IdClient, action) VALUES (?, 'deconnexion')";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['client_id']);
    mysqli_stmt_execute($stmt);

    session_destroy();
}

header('Location: login.php');
exit;