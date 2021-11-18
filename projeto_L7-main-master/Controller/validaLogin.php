<?php
ob_start();
session_start();
if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
	//redireciona para a página inicial.
	header("Location: ../sessionDestroy.php"); exit;
}
require_once "C:/xampp/htdocs/L7/projeto_L7-main-master/dao/DaoLogin.php";
require_once "C:/xampp/htdocs/L7/projeto_L7-main-master/model/Mensagem.php";
require_once "C:/xampp/htdocs/L7/projeto_L7-main-master/model/Pessoa.php";

if(isset($_POST)){
    $login = $_POST['email'];
    $senha = $_POST['senha'];
}else{
    header("Location: ../sessionDestroy.php"); exit;
}

$daoLogin = new DaoLogin();

$resp = new Pessoa();
$resp = $daoLogin->validarLogin($email, $senha);
//echo gettype($resp);

if(gettype($resp) == "object"){
    if(!isset($_SESSION['emailp'])){
        $_SESSION['emailp'] = $resp->getemail();
        $_SESSION['idp'] = $resp->getIdpessoa(); 
        $_SESSION['nomep'] = $resp->getNome();
        $_SESSION['perfilp'] = $resp->getPerfil();
        $_SESSION['cpfp'] = $resp->getCpf();
        
        
        $_SESSION['nr'] = rand(1,1000000);
        $_SESSION['confereNr'] = $_SESSION['nr'];
        //echo($_SESSION['nr'])."<br>";
        //echo($_SESSION['confereNr'])."<br>";
        header("Location: ../L7grifes.html");
        exit;

    }
}else{
    $_SESSION['msg'] = $resp;
    if(isset($_SESSION['emailp'])){
        $_SESSION['emailp'] = null;
        $_SESSION['idp'] = null;
        $_SESSION['nomep'] = null;
        $_SESSION['perfilp'] = null;
        $_SESSION['cpfp'] = null;
    }
    header("Location: ../L7grifes.html");
    exit;
}
ob_end_flush();