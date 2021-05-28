
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
