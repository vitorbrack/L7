<?php
ob_start();
session_start();
session_unset(); // Eliminar todas as variáveis da sessão
// Destrói a sessão por segurança
session_destroy();
// Redireciona o visitante de volta pro login
header("Location: L7grifes.html");
exit;
ob_end_flush();
?>