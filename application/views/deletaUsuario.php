<link rel="stylesheet" href="<?= base_url('assets/css/base.css') ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	
	<div id="container" class="container">
		<div>
			<br>
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
					<th>ID</th>
					<th>Usuário</th>
					<th>Senha</th>
					<th>Nome</th>
				</tr>
			</thead>
		<tbody>
			<?php foreach($usuarios as $usuario) { ?>
				<tr>
					<td><?=$usuario['id']?></td>
					<td><?=$usuario['usuario']?></td>
					<td><?=$usuario['senha']?></td>
					<td><?=$usuario['nome']?></td>
                    <td><a class="deletaBtn" href="<?= base_url("index.php/Home/deletarFormUsuarios?id={$usuario['id']}")?>">Deletar</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<a href="<?= base_url("index.php/Home")?>"><button class="btn btn-primary">Voltar</button></a>
	</div>
	<script src="<?= base_url("assets/js/checkDelete.js")?>"></script>