<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>
			Info - Série

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

			
	<section class="container">
		<?php foreach ($series as $serie) { ?>
			<h1 class="fw-lighter">Série
				<strong><?= $serie->nome ?></strong>
			</h1>
			<div class="container">
				<section class="d-flex justify-content-between align-items-center">
					<a href="/listar-series">
						<button class="btn btn-info">Voltar</button>
					</a>

					<a href="/nova-temporada/<?= $serie->id ?>">
						<button class="btn btn-outline-success">Nova Temporada</button>
					</a>
				</section>
			</div>
		<?php } ?>

		<ul class="list-group mt-4">
			<?php foreach ($temporadas as $temporada) { ?>
				<?php
					$modal = 'Temporada ' . $temporada->numeroTemporada . ' Modal';
					$nomeModal = str_replace(' ', '-', $modal);
                    $modalEdicao = 'Temporada ' . $temporada->numeroTemporada . ' Modal-Edicao';
					$nomeModalEdicao = str_replace(' ', '-', $modalEdicao);
				?>

				<li class="list-group-item mb-4 shadow border-0 rounded-0 d-flex justify-content-between align-items-center">
					<span>Temporada
						<?= $temporada->numeroTemporada ?></span>
					<div class="d-flex">
						<button class="btn btn-primary me-2" data-bs-target="#<?= $nomeModal ?>" data-bs-toggle="modal" type="button">
							<span class="material-icons">
								visibility
							</span>
						</button>
						<a href="/deletar-temporada/<?= $temporada->id ?>">
							<button class="btn btn-danger me-2" type="button">
								<span class="material-icons">
									delete
								</span>
							</button>
						</a>

						<button class="btn btn-info" data-bs-target="#<?= $nomeModalEdicao ?>" data-bs-toggle="modal" type="button">
							<span class="material-icons">
								edit
							</span>
						</button>

					</div>
				</li>
			<?php } ?>
		</ul>
	</section>

	<?php foreach ($temporadas as $temporada) { ?>
	<?php
        $modal = 'Temporada ' . $temporada->numeroTemporada . ' Modal';
        $nomeModal = str_replace(' ', '-', $modal);
		$modalEdicao = 'Temporada ' . $temporada->numeroTemporada . ' Modal-Edicao';
		$nomeModalEdicao = str_replace(' ', '-', $modalEdicao);
        $episodios = Episodio::find('idTemporada = ' . $temporada->id);
    ?>
	<!-- Modal -->
	<div class="modal fade" id="<?= $nomeModal ?>" tabindex="-1" aria-labelledby="<?= $nomeModal ?>Label" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="<?= $nomeModal ?>Label">Temporada
						<?= $temporada->numeroTemporada ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<a href="/novo-episodio/<?= $temporada->id ?>">
						<button class="btn mb-4 bg-success bg-gradient text-white">Novo episódio</button>
					</a>
					<ul class="list-group">
						<?php foreach ($episodios as $episodio) { ?>
							<li class="list-group-item rounded-0 d-flex justify-content-between align-items-center">
								<span>Episódio
									<?= $episodio->numero ?></span>
								<section class="d-flex justify-content-center align-items-center">
									<?php if ($episodio->assistido == 1) { ?>
										<input type="checkbox" id="assistido" checked onclick='window.location.assign("/assistir-episodio/<?= $episodio->id ?>")'>
									<?php } elseif ($episodio->assistido == 0) { ?>
										<input type="checkbox" id="assistido" onclick='window.location.assign("/assistir-episodio/<?= $episodio->id ?>")'>
									<?php } ?>
									<a href="/deletar-episodio/<?= $episodio->id ?>">
										<button class="btn btn-danger ms-3">
											<i class="material-icons">delete</i>
										</button>
									</a>
								</li>
							</li>
						</section>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="<?= $nomeModalEdicao ?>" tabindex="-1" aria-labelledby="<?= $nomeModalEdicao ?>Label" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="<?= $nomeModalEdicao ?>Label">Temporada
						<?= $temporada->numeroTemporada ?></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="/editar-temporada/<?= $temporada->id ?>/serie/<?= $temporada->idSerie ?>" name="editaTemporada" method="post" enctype="multipart/form-data">
						<div class="mb-3">
							<label for="numeroTemporada" class="form-label">Número da Temporada</label>
							<input type="number" id="numeroTemporada" name="numeroTemporada" value="<?= $temporada->numeroTemporada ?>" class="form-control fs-6">
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



		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

	</body>

</html>
