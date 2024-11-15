<?php
require_once '../models/Utilizador.php';

class AuthController {
    public function __construct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action'])) {
                switch ($_POST['action']) {
                    case 'login':
                        $this->login($_POST['id_jogador'], $_POST['palavra_passe']);
                        break;
                    case 'register':
                        $this->registar();
                        break;
                }
            }
        }
    }

    public function login($id_jogador, $palavra_passe) {
        $utilizador = new Utilizador();
        $user = $utilizador->getUserByIdAndPassword($id_jogador, $palavra_passe);
        
        if ($user) {
            session_start();
            $_SESSION['id_utilizador'] = $user['id'];
            $_SESSION['tipo_utilizador'] = $user['tipo_utilizador'];
            
            if ($user['tipo_utilizador'] === 'administrador') {
                header("Location: ../views/painel_administrador.php");
            } else {
                header("Location: ../views/painel_utilizador.php");
            }
            exit();
        } else {
            header("Location: ../views/login.php?error=ID Jogador ou Palavra-passe incorretos.");
            exit();
        }
    }

    public function registar() {
        // Captura os dados do formulário
        $nome_completo = $_POST['nome_completo'];
        $id_jogador = $_POST['id_jogador'];
        $data_nascimento = $_POST['data_nascimento'];
        $numero_documento_identificacao = $_POST['numero_documento_identificacao'];
        $palavra_passe = $_POST['palavra_passe'];
        $confirmar_palavra_passe = $_POST['confirmar_palavra_passe'];
    
        $utilizador = new Utilizador();
    
        // Validações
        if ($palavra_passe !== $confirmar_palavra_passe) {
            header("Location: ../views/registrar.php?error=As senhas não coincidem.");
            exit();
        }
    
        // Verifica se o ID do jogador já existe
        if ($utilizador->verificarIdJogador($id_jogador)) {
            header("Location: ../views/registrar.php?error=Este ID de jogador já está em uso.");
            exit();
        }
    
        // Verifica se o número do documento de identificação já existe
        if ($utilizador->verificarDocumentoIdentificacao($numero_documento_identificacao)) {
            header("Location: ../views/registrar.php?error=Este Número de Documento de Identificação já está registrado.");
            exit();
        }
    
        // Hash da senha
        $palavra_passe_hash = password_hash($palavra_passe, PASSWORD_DEFAULT);
        $tipo_utilizador = 'utilizador';
    
        // Tenta criar o usuário
        $success = $utilizador->createUser(
            $nome_completo,
            $id_jogador,
            $data_nascimento,
            $numero_documento_identificacao,
            $palavra_passe_hash,
            $tipo_utilizador
        );
    
        if ($success) {
            header("Location: ../views/registrar.php?success=Registro realizado com sucesso!");
            exit();
        } else {
            header("Location: ../views/registrar.php?error=Erro ao registrar o utilizador. Tente novamente.");
            exit();
        }
    }
}

// Instancia o controller
$auth = new AuthController();
?>