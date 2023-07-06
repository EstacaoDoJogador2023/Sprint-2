<?php
session_start();
$BancoDeDados = new PDO("mysql:host=localhost;dbname=pit_julio", "root", "");

if (isset($_POST['enviar'])) {
    $NomeAtleta = $_POST['nome'];
    $DataNascimento = $_POST['datanasc'];
    $EsportesAtuacao = $_POST['esportesAtuacao'];
    $Email = $_POST['emailAtleta'];
    $Telefone = $_POST['telefoneAtleta'];
    $Senha = $_POST['senha'];
    $SenhaConfirmacao = $_POST['senhaconf'];
 
    $INSERT = $BancoDeDados->prepare("INSERT INTO Atleta VALUES(null, :nome, :datanascimento, :esporte, :email, :telefone, :senha)");

    if ($Senha == $SenhaConfirmacao) {
        $INSERT->bindParam(':nome', $NomeAtleta);
        $INSERT->bindParam(':datanascimento', $DataNascimento);
        $INSERT->bindParam(':esporte', $EsportesAtuacao);
        $INSERT->bindParam(':email', $Email);
        $INSERT->bindParam(':telefone', $Telefone);
        $INSERT->bindParam(':senha', $Senha);

        if($INSERT->execute()){
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Cadastro feito com sucesso </div>";
            header("Location: exibicoes.php");
        }
        else{
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro no cadastro </div>";
            header("Location: exibicoes.php");
        }
    }
    else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Digite senhas iguais<br> 
                            <a href='../Cadastro.html'>Voltar para cadastro</a></div>";
            header("Location: exibicoes.php");
    }
}

if(isset($_POST['enviar-empresario'])){
    $NomeEmpresa = $_POST['empresa'];
    $EmailComercial = $_POST['emailEmpresa'];
    $TelefoneComercial = $_POST['telefone'];
    $Cnpj = $_POST['cnpj'];
    $Patrocinador = $_POST['patrocinador'];

    $INSERT = $BancoDeDados->prepare("INSERT INTO Empresas VALUES (null, :nome, :email, :telefoneComercial, :cnpj, :patrocinador)");
    
    $INSERT->bindParam(':nome', $NomeEmpresa);
    $INSERT->bindParam(':email', $EmailComercial);
    $INSERT->bindParam(':telefoneComercial', $TelefoneComercial);
    $INSERT->bindParam(':cnpj', $Cnpj);
    $INSERT->bindParam(':patrocinador', $Patrocinador);

    if($INSERT->execute()){
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'> Dados cadastratos com sucesso <br>
                                <a href='../login.html'>Clique aqui para fazer login</a></div>";
            header("Location: exibicoes.php");
    }
    else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Erro no cadastro </div>";
        header("Location: exibicoes.php");
    }
}
?>