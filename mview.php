<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Produtos cadastrados</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 17px/22px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h2 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 24px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 15px 15px 10px 15px;
	}

	

	#body{
		margin: 0 18px 0 15px;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 10px #D0D0D0;
	}
	th{
		background-color:#9FB6CD;
	}
	th,td {
		border:1px solid #D0D0D0;
		padding: 8px 10px;
		height: 20px;
		vertical-align:center;
	}
	table{
		border-collapse:collapse;
	}
	tfoot{
		background-color:#D0D0D0;
	}
	
	</style>
</head>
<body>
	<div id="container">
		<h2>Bem-vindo!</h2>
		<div id="body">
			<table>
				<b><li>Início</li></b><br>
				<li><a href="http://localhost/testexcommerce/index.php/produtos/cadastrar" >Cadastrar Produto</a></li><br>
				<li><a href="http://localhost/testexcommerce" >Logout</a></li><br>
				<h3>Produtos Cadastrados:</h3>
					<thead>
						<tr>
							<th>Nome</th>
							<th>Preço</th>
							<th>Ações</th>
						</tr>
					</thead>
				<?php
					$contador =0;   //percorrer a array $produtos
					foreach($produtos as $produto)
					{
							echo'<tbody>';
								echo'<tr>';
									echo'<td>'.$produto->nome.'</td>';
									echo'<td>'.$produto->preco.'</td>';
									echo'<td><a href="http://localhost/testexcommerce/index.php/produtos/editar/'.$produto->codigo.'" title="Editar Produto">Editar</a>
									<a href="http://localhost/testexcommerce/index.php/produtos/apagar/'.$produto->codigo.'" title="Apagar Produto">Apagar</a>
									<a href="http://localhost/testexcommerce/index.php/produtos/consultar/'.$produto->codigo.'">Consultar</a></td>';
								echo'</tr>';
							echo'</tbody>';
						$contador++;
						
					}
				?>
				<tfoot>
					<td>Total de registros:</td>
					<td><?php echo $contador ?></td>
				</tfoot>
			</table>
			<br>
		</div>
	</div>
</body>
</html>