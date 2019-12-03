<!DOCTYPE html>
<?php
include './validarLogin.php';
?>
<html lang="pt-br">
    <head>
        <title>SMCA</title>
        <script language="Javascript">
            function confirmacao1() {
                var resposta = confirm("Deseja Sair?");
                if (resposta == true) {
                    window.location.href = "../controller/sairController.php";
                 }
            }
        </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="../img/ico.png"> 
        <style> body{ background: #8ea1f3;}</style>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            /* Remove the navbar's default margin-bottom and rounded borders */
            .navbar {
                margin-bottom: 0;
                border-radius: 0;
            }

        </style>
    </head>
    <body>
        <?php
        switch ($_SESSION["perfil"]) {
            case "Administrador":
                
                echo
                
                "<nav class='navbar navbar-inverse'>
                     <div class='container-fluid'>
                     <div class='navbar-header'>
                    <b class='navbar-brand' href='#'><a href='home.php'>SMCA</a></b>
                   </div>
                   <div class='collapse navbar-collapse' id='myNavbar'>
                    <ul class='nav navbar-nav'>
                        <li><a href='alterarDadosFuncionario.php'>Alterar Dados</a></li>
                        <li><a href='listarAlunos.php'>Alunos</a></li>
                        <li><a href='listarFuncionarios.php'>Funcionários</a></li>
                        <li><a href='listarHistorico.php'>Historico Alunos</a></li>
                        <li><a href='cadastrarAluno.php'>Cadastrar Aluno</a></li>
                        <li><a href='cadastrarFuncionario.php'>Cadastrar Funcionarios</a></li>
                        <li><a href='altenticacaoAluno.php'>Altenticar</a></li>
                    </ul>
                    <ul class='nav navbar-nav navbar-right'>
                        <li><a href='javascript:func()'onclick='confirmacao1()'>
                        <span class='glyphicon glyphicon-log-out'></span>Sair</a>
                        </li>
                    </ul>
                     <div class='navbar-header'>
                    <b class='navbar-brand' href='#'>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b class='glyphicon glyphicon-user' title='Usuário'></b> {$_SESSION["usuario"]}&nbsp;&nbsp;&nbsp;
                    <b class='glyphicon glyphicon-list-alt'></b> {$_SESSION["perfil"]}</b>
                   </div>
                 </div>
                 
                 </div>
                </nav>";
                break;
            case "Funcionario":

                echo
                "<nav class='navbar navbar-inverse'>
                     <div class='container-fluid'>
                     <div class='navbar-header'>
                    <b class='navbar-brand' href='#'><a href='home.php'>SMCA</a></b>
                   </div>
                   <div class='collapse navbar-collapse' id='myNavbar'>
                    <ul class='nav navbar-nav'>
                        <li><a href='alterarDadosFuncionario.php'>Alterar Dados</a></li>
                        <li><a href='listarFuncionariosFun.php'>Funcionários</a></li>
                        <li><a href='listarHistorico.php'>Historico Alunos</a></li>
                        <li><a href='pesquisaAlunoFuncionario.php'>Alunos</a></li>
                        <li><a href='cadastrarAluno.php'>Cadastrar Aluno</a></li>
                        
                        <li><a href='altenticacaoAluno.php'>Altenticacao</a></li>
                    </ul>
                    <ul class='nav navbar-nav navbar-right'>
                        <li><a href='javascript:func()'onclick='confirmacao1()'>
                        <span class='glyphicon glyphicon-log-out'></span>Sair</a>
                        </li>
                    </ul>
                     <div class='navbar-header'>
                    <b class='navbar-brand' href='#'>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    
                    <b class='glyphicon glyphicon-user' title='Usuário'></b> {$_SESSION["usuario"]}&nbsp;&nbsp;&nbsp;
                    <b class='glyphicon glyphicon-list-alt'></b> {$_SESSION["perfil"]}</b>
                   </div>
                 </div>
                 
                 </div>
                </nav>";
                break;
        }
        ?>
    </body>
</html>
