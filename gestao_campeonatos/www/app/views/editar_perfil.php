<?php
session_start();
require_once '../models/Utilizador.php'; // Incluindo o modelo de Utilizador

// Verifica se o utilizador está logado e é do tipo 'utilizador'
if (!isset($_SESSION['id_utilizador']) || $_SESSION['tipo_utilizador'] !== 'utilizador') {
    header("Location: login.php");
    exit();
}

// Instancia o modelo de Utilizador
$utilizadorModel = new Utilizador();
$id_utilizador = $_SESSION['id_utilizador'];

/// Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_completo = $_POST['nome_completo'];
    $data_nascimento = $_POST['data_nascimento'];
    $numero_documento_identificacao = $_POST['numero_documento_identificacao'];

    // Tenta atualizar os dados do utilizador
    $success = $utilizadorModel->updateUser ($id_utilizador, $nome_completo, $data_nascimento, $numero_documento_identificacao);

    if ($success === false) {
        header("Location: editar_perfil.php?error=O Número do Documento de Identificação já está em uso por outro utilizador.");
        exit();
    } elseif ($success) {
        header("Location: editar_perfil.php?success=Dados atualizados com sucesso!");
        exit();
    } else {
        header("Location: editar_perfil.php?error=Erro ao atualizar os dados. Tente novamente.");
        exit();
    }
}

// Busca os dados do utilizador para preencher o formulário
$utilizador = $utilizadorModel->getUserById($id_utilizador); // Corrigido aqui
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="painel_utilizador.php">Painel do Utilizador</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="editar_perfil.php">Editar Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ver_pontuacoes.php">Ver Pontuações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ver_classificacoes.php">Ver Classificações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Terminar Sessão</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Container principal -->
    <div class="container mt-5">
        <h2 class="text-center">Editar Perfil</h2>
        <br>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nome_completo">Nome Completo</label>
                <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="<?php echo htmlspecialchars($utilizador['nome_completo']); ?>" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($utilizador['data_nascimento']); ?>" required>
            </div>
            <div class="form-group">
                <label for="numero_documento_identificacao">Número do Documento de Identificação</label>
                <input type="text" class="form-control" id="numero_documento_identificacao" name="numero_documento_identificacao" value="<?php echo htmlspecialchars($utilizador['numero_documento_identificacao']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Dados</button>
        </form>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success mt-3">
                <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        <?php endif; ?><?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger mt-3">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>