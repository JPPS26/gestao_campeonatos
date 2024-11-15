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
    <title>Perfil do Utilizador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Container Principal -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <!-- Título -->
                    <h2 class="text-center mb-4">Meu Perfil</h2>
                    
                    <!-- Formulário -->
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nome">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                        </div>
                        <div class="form-group">
                            <label for="numero_documento_identificacao">Número Documento de Identificação</label>
                            <input type="text" class="form-control" id="numero_documento_identificacao" name="numero_documento_identificacao" required>
                        </div>
                        
                        <!-- Botão de Atualização -->
                        <button type="submit" class="btn btn-primary btn-block">Atualizar Perfil</button>
                    </form>
                </div>
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