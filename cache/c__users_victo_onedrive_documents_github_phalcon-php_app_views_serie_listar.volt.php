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
				border-radius: 0 !important;
			}

			.form-control {
				border: 0.8px solid #c0c0c0 !important;
			}
		</style>
	</head>

	<body>
		<div class="container-fluid" id="main">
			<?= $this->flash->output(true) ?>

			
	<h1 class="text-center display-4">Lista de Séries</h1>
	<div class="container-fluid">
		<ul class="list-group">
			<li class="list-group-item border-top border-bottom border-0 rounded-0 d-flex flex-row-reverse">
				<button type="button" data-bs-toggle="modal" data-bs-target="#novaSerieModal" class="btn bg-success bg-gradient text-white">
					Nova Série
				</button>
			</li>
		</ul>
	</div>

	<div class="container ps-5 pe-5 mt-2">
		<ul class="list-group">
			<?php foreach ($series as $serie) { ?>
				<?php
				$nomeModal = str_replace('.', '', $serie->nome);
				$nomeModal = strtolower(str_replace(' ', '-', $nomeModal)) . '-' . $serie->id . '-Modal';
				?>
				<li class="list-group-item d-flex justify-content-between rounded-0 border mt-1 align-items-center">
					<span title="serie-<?= $serie->id ?>"><?= $serie->nome ?></span>

					<section class="d-flex align-items-center justify-content-between">
						<a href="/lista-temporadas/serie/<?= $serie->id ?>" class="me-2">
							<button class="btn btn-primary">
								<span class="material-icons">
									visibility
								</span>
							</button>
						</a>

						<a href="/deleta-serie/<?= $serie->id ?>" class="me-2">
							<button class="btn btn-danger">
								<span class="material-icons">
									delete_outline
								</span>
							</button>
						</a>

						<button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#<?= $nomeModal ?>">
							<span class="material-icons">
								edit
							</span>
						</button>
					</section>
				</li>
			<?php } ?>
		</ul>
	</div>

	
<?php foreach ($series as $serie) { ?>
	<?php
				$nomeModal = str_replace('.', '', $serie->nome);
				$nomeModal = strtolower(str_replace(' ', '-', $nomeModal)) . '-' . $serie->id . '-Modal';
				?>

	<div class="modal fade" id="<?= $nomeModal ?>" tabindex="-1" aria-labelledby="<?= $nomeModal ?>Label" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content bg-white bg-gradient shadow border-0 rounded-0">
				<div class="modal-header">
					<h5 class="modal-title" id="<?= $nomeModal ?>Label">Nova Série</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="/editar-serie/<?= $serie->id ?>" name="editaSerie" method="post" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="nome" class="form-label">Nome</label>
							<input type="text" id="nome" name="nome" value="<?= $serie->nome ?>" class="form-control fs-6">
						</div>

						<div class="mb-3">
							<label for="descricao" class="form-label">Descrição</label>
							<textarea id="descricao" name="descricao" class="form-control fs-6" width="100%" rows="5"><?= $serie->descricao ?></textarea>


						</div>

						<div class="mb-3">
							<label for="avaliacao" class="form-label">Avaliação</label>
							<input type="number" id="avaliacao" name="avaliacao" value="<?= $serie->avaliacao ?>" class="form-control fs-6" min="1" max="5">
						</div>

						<div class="text-center">
							<button type="submit" class="btn bg-primary bg-gradient text-white">Atualizar</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
<?php } ?>


<!-- Modal Criar Série -->
<div class="modal fade" id="novaSerieModal" tabindex="-1" aria-labelledby="novaSerieModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content bg-white bg-gradient shadow border-0 rounded-0">
			<div class="modal-header">
				<h5 class="modal-title" id="novaSerieModalLabel">Nova Série</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?= $this->tag->form(['nova-serie', 'method' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'novaSerie']) ?>

					<div class="mb-3">
						<label for="nome" class="form-label">Nome</label>
						<?= $this->tag->textField(['nome', 'width' => '100%', 'class' => 'form-control fs-6']) ?>
					</div>

					<div class="mb-3">
						<label for="descricao" class="form-label">Descrição</label>
						<?= $this->tag->textArea(['descricao', 'width' => '100%', 'class' => 'form-control fs-6', 'rows' => '5']) ?>
					</div>

					<div class="mb-3">
						<label for="avaliacao" class="form-label">Avaliação</label>

						<?= $this->tag->numericField(['avaliacao', 'min' => '1', 'max' => '5', 'class' => 'form-control fs-6']) ?>
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
