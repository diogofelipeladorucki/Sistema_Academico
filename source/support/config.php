<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 

$raiz = "../../";

require_once("../../source/support/Conection.class.php");
require_once("../../vendor/autoload.php");

//DATABASE
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_DBNAME", "sistemaacademico");
define("CONF_DB_PASSWORD", "");
define("CONF_TABLE_USUARIO", "usuario");
define("CONF_TABLE_ALUNO", "aluno");

//PROJECT URLs
define("CONF_URL_BASE", "http://my-site/Sistema_Academico");
define("CONF_URL_ADMIN", CONF_URL_BASE . "/admin");
define("CONF_URL_ERROR", CONF_URL_BASE . "/404");

//DATES
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

//CADASTRO VALIDATE
define("VAL_USUARIO_CADASTRO_SUCESSO", "Cadastro realizado com sucesso!");
define("VAL_USUARIO_CADASTRO_EMAIL_JA_EXISTE", "Este e-mail já foi cadastrado!");
define("VAL_USUARIO_CADASTRO_USERNAME_JA_EXISTE", "Este nome de usuário já foi cadastrado!");
define("VAL_USUARIO_CADASTRO_FALHA_DB", "Cadastro não realizado! Infelizmente houve uma falha com nossa conexão.");

//SENHAS
define("CONF_MIN_SENHA", 4);
define("CONF_MAX_SENHA", 100);


################################### VALIDACOES #####################################

//CAMPO VALIDATE
define("CONF_MAX_CAMPO_255", "");




define("CONF_BANCO_FALHA", "");


define("CADASTRAR", 1);
define("ALTERAR", 2);
define("DETALHAR", 3);






