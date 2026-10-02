<?php
require 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $stmt = $mysqli->prepare("DELETE FROM produtos WHERE id = ?");
    if ($stmt) { 
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

header("Location: index.php");
exit;
?>