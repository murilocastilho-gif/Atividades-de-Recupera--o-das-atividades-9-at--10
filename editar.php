<?php
require 'conexao.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE produtos SET nome = ?, categoria = ?, descricao = ?, preco = ?, quantidade = ?, data_validade = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param(
            "sssdisi", 
            $_POST['nome'], 
            $_POST['categoria'], 
            $_POST['descricao'], 
            $_POST['preco'], 
            $_POST['quantidade'], 
            $_POST['data_validade'],
            $id
        );
        $stmt->execute();
        $stmt->close();
        header("Location: index.php");
        exit;
    }
}

$stmt = $mysqli->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$p = $resultado->fetch_assoc();
$stmt->close();

if (!$p) {
    die("Produto não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt">
<body>
    <h1>Editar Produto</h1>
    <form method="POST">
        Nome: <input type="text" name="nome" value="<?= htmlspecialchars($p['nome']) ?>" required><br><br>
        Categoria: <input type="text" name="categoria" value="<?= htmlspecialchars($p['categoria']) ?>" required><br><br>
        Descrição: <textarea name="descricao" required><?= htmlspecialchars($p['descricao']) ?></textarea><br><br>
        Preço: <input type="number" step="0.01" name="preco" value="<?= $p['preco'] ?>" required><br><br>
        Quantidade: <input type="number" name="quantidade" value="<?= $p['quantidade'] ?>" required><br><br>
        Validade: <input type="date" name="data_validade" value="<?= $p['data_validade'] ?>" required><br><br>
        <button type="submit">Atualizar</button>
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>