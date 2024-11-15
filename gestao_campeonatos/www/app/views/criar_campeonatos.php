<?php
session_start();
if (!isset($_SESSION['id_utilizador']) || $_SESSION['tipo_utilizador'] !== 'administrador') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Campeonato</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="painel_administrador.php">Painel do Administrador</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="criar_campeonatos.php">Criar Campeonatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adicionar_parametros.php">Adicionar Parâmetros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inserir_pontuacoes.php">Inserir Pontuações</a>
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
    <h2 class="text-center">Criar Campeonatos</h2>
    <br>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nome_campeonato">Nome do Campeonato</label>
                <input type="text" class="form-control" id="nome_campeonato" name="nome_campeonato" required>
            </div>
            <div class="form-group">
                <label for="data_inicio">Data de Início</label>
                <input type="date" class="form-control" id="data_inicio" name="data_inicio" required>
            </div>
            <div class="form-group">
                <label for="data_fim">Data de Fim</label>
                <input type="date" class="form-control" id="data_fim" name="data_fim" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar Campeonato</button>
        </form>
    </div>

    <!-- Rodapé -->
    <footer class="bg-light text-center py-3 mt-5">
        <div class="container">
            <small>&copy; 2024 Gestão de Campeonatos. Todos os direitos reservados.</small>
        </div>
    </footer>

    <!-- Scripts do Bootstrap e jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
