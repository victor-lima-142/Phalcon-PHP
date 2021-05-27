<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>
			Sistema de Séries :: InfoIdeias

		</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<style>
			.btn {
				border-radius: 0;
			}

			.form-control {
				border: 0.8px solid #c0c0c0 !important;
			}
		</style>
	</head>

	<body>
		<div class="container-fluid" id="main"> 
	<h1 class="text-center">Lista de Séries</h1>
	<div class="container ps-5 pe-5">
		<ul class="list-group">
			<li class="list-group-item d-flex flex-row-reverse">
				<button type="button" data-bs-toggle="modal" data-bs-target="#novaSerieModal" class="btn bg-success bg-gradient text-white">
					Nova Série
				</button>
			</li>


			<?php foreach ($series as $serie) { ?>
				<li class="list-group-item"><?= $serie->nome ?></li>
			<?php } ?>
		</ul>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="novaSerieModal" tabindex="-1" aria-labelledby="novaSerieModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-white bg-gradient shadow border-0 rounded-0">
				<div class="modal-header">
					<h5 class="modal-title" id="novaSerieModalLabel">Nova Série</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<?= $this->tag->form(['nova-serie', 'method' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'novaSerie']) ?>

						<div
							class="form-floating mb-3">
							<!-- <input type="text" class="form-control border" id="nome" name="nome">-->
							<?= $this->tag->textField(['nome', 'width' => '100%', 'class' => 'form-control']) ?>

							<label for="nome">Nome</label>
						</div>

						<div
							class="form-floating mb-3">
							<!-- <textarea cols="7" row="6" class="form-control border" id="descricao" name="descricao"></textarea> -->
							<?= $this->tag->textField(['descricao', 'width' => '100%', 'class' => 'form-control']) ?>

							<label for="descricao">Descrição</label>
						</div>

						<div
							class="form-floating mb-3">
							<!-- <input type="number" min="1" max="5" class="form-control border" id="avaliacao" name="avaliacao"> -->
							<?= $this->tag->numericField(['avaliacao', 'min' => '1', 'max' => '5', 'class' => 'form-control']) ?>


							<label for="avaliacao">Avaliação</label>
						</div>

						<div class="text-center">
							<button type="submit" class="btn bg-primary bg-gradient text-white">Adicionar</button>
						</div>

					</form>

				</div>
			</div>
		</div>
	</div>

			</div>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

		</body>

	</html>
