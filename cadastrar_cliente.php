<?php 
    function limpar_texto($str){
        return preg_replace("/[^0-9]/","", $str);
    }
    
    if(count($_POST)> 0) {

       include('conexao.php');

       $erro = false;
       $nome = $_POST['nome'];
       $email = $_POST['email'];
       $telefone = $_POST['telefone'];
       $nascimento = $_POST['nascimento'];
      
    
        if(empty($nome)) {
            $erro = "Preencha o nome";
    }
        if(empty($email)|| !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erro = "Preencha o email";
    }   
    
        if(!empty($nascimento)) {
            $pedacos = explode('/', $nascimento);
            if(count($pedacos) == 3) {
                $nascimento = implode ('-', array_reverse($pedacos));
            } else {
                $erro = "A data de nascimento deve seguir o padrão  dia/mes/ano.";
           }   
        
    }
        
        if(!empty($telefone)) {
            $telefone = limpar_texto($telefone);
            if(strlen($telefone) != 11)
            $erro = "O telefone deve ser preenchido no padrão (95) 99999-9999";
        }
    
        
    
    if($erro) {
            echo "<p><b>ERRO: $erro</b></p>";
    }else{
        $sql_code = "INSERT INTO clientes (nome, email, telefone, nascimento, data) 
        VALUES ('$nome', '$email', '$telefone', '$nascimento', NOW())";
        $deu_certo  = $mysqli->query($sql_code) or die($mysqli->erro);
        if($deu_certo) {
            echo "<p><b>Cliente cadastrado com sucesso!</b></p>";
            unset($_POST);
        }
            
    }
       

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="menu">
    <form  method="POST" action="">
    <h2>CADASTRO</h2>
    <P>
        <label>Nome:</label>
        <input  value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" name="nome" type="text"><br>
    </P>
    <P>
        <label>E-mail:</label>
        <input value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" name="email" type="text"><br>
    </P>
    <P>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <label for="txttelefone">Telefone:</label>
        <input value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone']; ?>" placeholder="(95) 99999-9999" name="telefone" type="text" id="telefone" />
        <script type="text/javascript">$("#telefone").mask("(00) 00000-0000");</script><br>
    </P>
     <P>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <label for="txtdatanascimento">Data de Nascimento:</label>
        <input value="<?php if(isset($_POST['nascimento'])) echo $_POST['nascimento']; ?>" name="nascimento" type="text" id="datanascimento" />
        <script type="text/javascript">$("#datanascimento").mask("99/99/9999");</script><br><br>
     </P>
    <p>

        <button type="submit">Salvar Cliente</button>

    </p>
    
    </form>
    </div>
    </main>
    <a href="index.php"><button>voltar</button> <br>
    <a href="clientes.php"><button>Lista de usuários</button>
   
</body>
</html>