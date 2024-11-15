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
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Painel do Administrador</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="gerir_campeonatos.php">Gerir Campeonatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gerir_pontuacoes.php">Gerir Pontuções</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="classificacoes.php">Classificações</a>
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
        <h2 class="text-center">Bem-vindo ao Painel do Administrador</h2>
        <p class="text-center">Aqui você pode gerenciar seu perfil, visualizar seus campeonatos e pontuações.</p>
        
        <!-- Seção de opções -->
        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <a href="gerir_campeonatos.php" class="btn btn-info btn-block">Gerir Campeonatos</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="gerir_pontuacoes.php" class="btn btn-success btn-block">Gerir Pontuções</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="classificacoes.php" class="btn btn-warning btn-block">Classificações</a>
            </div>
        </div>
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