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
