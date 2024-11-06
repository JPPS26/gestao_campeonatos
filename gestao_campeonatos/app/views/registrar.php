<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4">Registrar</h2>
                    
                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo htmlspecialchars($_GET['error']); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['success'])): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo htmlspecialchars($_GET['success']); ?>
                            <br>
                            <a href="login.php" class="alert-link">Clique aqui para fazer login</a>
                        </div>
                    <?php endif; ?>
                    
                    <form action="../controllers/AuthController.php" method="POST">
                        <input type="hidden" name="action" value="register">
                        <!-- ... resto do formulário ... -->
                        <div class="form-group">
                            <label for="nome_completo">Nome Completo</label>
                            <input type="text" class="form-control" id="nome_completo" name="nome_completo" required>
                        </div>
                        <div class="form-group">
                            <label for="id_jogador">ID Jogador</label>
                            <input type="text" class="form-control" id="id_jogador" name="id_jogador" required>
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                        </div>
                        <div class="form-group">
                            <label for="numero_documento_identificacao">Número do Documento de Identificação</label>
                            <input type="text" class="form-control" id="numero_documento_identificacao" name="numero_documento_identificacao" required>
                        </div>
                        <div class="form-group">
                            <label for="palavra_passe">Palavra-passe</label>
                            <input type="password" class="form-control" id="palavra_passe" name="palavra_passe" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmar_palavra_passe">Confirmar Palavra-passe</label>
                            <input type="password" class="form-control" id="confirmar_palavra_passe" name="confirmar_palavra_passe" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block mt-4">Registrar</button>
                        <p class="text-center mt-3">Já tem uma conta? <a href="login.php">Entrar</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light text-center py-3 mt-5">
        <div class="container">
            <small>&copy; 2024 Gestão de Campeonatos. Todos os direitos reservados.</small>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://max cdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>