<?php
session_start();

if (isset($_SESSION['tipo_utilizador'])) {
    if ($_SESSION['tipo_utilizador'] === 'administrador') {
        header("Location: app/views/painel_administrador.php");
    } else {
        header("Location: app/views/painel_utilizador.php");
    }
} else {
    header("Location: app/views/login.php");
}
?>