<?php
session_start();
if (isset($_SESSION['id_utilizador'])) {
    if ($_SESSION['tipo_utilizador'] === 'administrador') {
        header("Location: painel_administrador.php");
    } else {
        header("Location: painel_utilizador.php");
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sessão</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Container Principal -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <!-- Título -->
                    <h2 class="text-center mb-4">Iniciar Sessão</h2>
                    
                    <!-- Mensagem de Erro ou Sucesso -->
                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo htmlspecialchars($_GET['error']); ?>
                        </div>
                    <?php elseif (isset($_GET['success'])): ?>
                        <div class="alert alert-success" role="alert">
                            <?php 
                            if ($_GET['success'] == 'registro') {
                                echo "Registro realizado com sucesso! Faça login para continuar.";
                            } elseif ($_GET['success'] == 'admin' || $_GET['success'] == 'utilizador') {
                                echo "Login bem-sucedido! Redirecionando...";
                            }
                            ?>
                        </div>
                        <script>
                            setTimeout(function() {
                                window.location.href = "<?php echo ($_GET['success'] === 'admin') ? 'painel_administrador.php' : 'painel_utilizador.php'; ?>";
                            }, 5000);
                        </script>
                    <?php endif; ?>
                    
                    <!-- Formulário -->
                    <form action="../controllers/AuthController.php" method="POST">
                        <input type="hidden" name="action" value="login">
                        <div class="form-group">
                            <label for="id_jogador">ID Jogador</label>
                            <input type="text" class="form-control" id="id_jogador" name="id_jogador" required>
                        </div>
                        <div class="form-group">
                            <label for="palavra_passe">Palavra-passe</label>
                            <input type="password" class="form-control" id="palavra_passe" name="palavra_passe" required>
                        </div>
                        
                        <!-- Botão de Enviar -->
                        <button type="submit" class="btn btn-primary btn-block mt-4">Entrar</button>
                        
                        <!-- Link para Registrar -->
                        <p class="text-center mt-3">Não tem uma conta? <a href="registrar.php">Registrar</a></p>
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