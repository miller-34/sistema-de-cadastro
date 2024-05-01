<?php 
include('conexao.php');

$sql_clientes = "SELECT * FROM clientes";
$query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
$num_clientes = $query_clientes->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de clientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de Clientes</h1>
    <p>Estes são os clientes cadastrados no seu sistema:</p>
    <table border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <Th>Nome</Th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Nascimento</th>
            <th>Data</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php 
            if($num_clientes == 0 ){?>
            <tr>
                <td colspan="7">Nenhum cliente foi cadastrado</td>     
            </tr>
           <?php 
           } else { 
                while ($cliente = $query_clientes->fetch_assoc()) {


                    $telefone = "Não informado";
                    if(!empty($cliente['telefone'])) {
                        $telefone = formatar_telefone($cliente['telefone']);  
                } 
                $nascimento = "Não informado";
                if(!empty($cliente['nascimento'])){
                    $nascimento = formatar_data($cliente['nascimento']);
                }
                $data_cadastro = date("d/m/Y H:i", strtotime($cliente['data']));
            ?>
            <tr>
                <td><?php echo $cliente['id'];?></td>
                <td><?php echo $cliente['nome'];?></td>
                <td><?php echo $cliente['email'];?></td>
                <td><?php echo $cliente['telefone'];?></td>
                <td><?php echo $cliente['nascimento'];?></td>
                <td><?php echo $cliente['data'];?></td>
                <td>
                    <a href="editar_cliente.php?id=<?php echo $cliente['id'];?>">Editar</a>
                    <a href="deletar_cliente.php?id=<?php echo $cliente['id'];?>">Deletar</a>
                </td>
            </tr>
            <?php 
            }  
        } ?>
        </tbody>
    </table>
    <a href="cadastrar_cliente.php"><BUtton>VOLTAR</BUtton>
</body>
</html>