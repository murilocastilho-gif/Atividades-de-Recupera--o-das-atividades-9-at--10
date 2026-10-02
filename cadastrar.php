<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['nome']) && !empty($_POST['categoria']) && !empty($_POST['descricao']) && isset($_POST['preco']) && isset($_POST['quantidade']) && !empty($_POST['data_validade'])) {
        
        $sql = "INSERT INTO produtos (nome, categoria, descricao, preco, quantidade, data_validade) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param(
                "sssdis", 
                $_POST['nome'], 
                $_POST['categoria'], 
                $_POST['descricao'], 
                $_POST['preco'], 
                $_POST['quantidade'],
                $_POST['data_validade']
            );
            
            if ($stmt->execute()) {
                header("Location: index.php");
                exit;
            } else {
                $erro = "Erro: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $erro = "Erro: " . $mysqli->error;
        }
    } else {
        $erro = "Preenche todos os campos obrigatórios!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<body>
    <h1>Cadastrar Produto</h1>
    <?php if(isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="POST">
        Nome: <input type="text" name="nome" required><br><br>
        Categoria: <input type="text" name="categoria" required><br><br>
        Descrição: <textarea name="descricao" required></textarea><br><br>
        Preço: <input type="number" step="0.01" name="preco" required><br><br>
        Quantidade: <input type="number" name="quantidade" required><br><br>
        Validade: <input type="date" name="data_validade" required><br><br>
        <button type="submit">Guardar</button>
        <a href="index.php">Voltar</a>
    </form>
</body>
</html>  