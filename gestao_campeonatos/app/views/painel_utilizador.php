<?php
session_start();
if (!isset($_SESSION['id_utilizador']) || $_SESSION['tipo_utilizador'] !== 'utilizador') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Utilizador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Painel do Utilizador</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php">Meu Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="meus_campeonatos.php">Meus Campeonatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="minhas_pontuacoes.php">Minhas Pontuações</a>
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
        <h2 class="text-center">Bem-vindo ao Painel do Utilizador</h2>
        <p class="text-center">Aqui você pode gerenciar seu perfil, visualizar seus campeonatos e pontuações.</p>
        
        <!-- Seção de opções -->
        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <a href="perfil.php" class="btn btn-info btn-block">Editar Perfil</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="meus_campeonatos.php" class="btn btn-success btn-block">Meus Campeonatos</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="minhas_pontuacoes.php" class="btn btn-warning btn-block">Minhas Pontuações</a>
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