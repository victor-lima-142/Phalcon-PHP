{% extends "layouts/template.volt" %}

{% block titulo_head %}Info - Série
{% endblock %}


{% block content %}
	<section class="container">
		{% for serie in series %}
			<h1 class="fw-lighter">Série
				<strong>{{serie.nome}}</strong>
			</h1>
			<div class="container">
				<section class="d-flex justify-content-between align-items-center">
					<a href="/listar-series">
						<button class="btn btn-info">Voltar</button>
					</a>

					<a href="/nova-temporada/{{serie.id}}">
						<button class="btn btn-outline-success">Nova Temporada</button>
					</a>
				</section>
			</div>
		{% endfor %}

		<ul class="list-group mt-4">
			{% for temporada in temporadas %}
				<?php
					$modal = 'Temporada ' . $temporada->numeroTemporada . ' Modal';
					$nomeModal = str_replace(' ', '-', $modal);
                    $modalEdicao = 'Temporada ' . $temporada->numeroTemporada . ' Modal-Edicao';
					$nomeModalEdicao = str_replace(' ', '-', $modalEdicao);
				?>

				<li class="list-group-item mb-4 shadow border-0 rounded-0 d-flex justify-content-between align-items-center">
					<span>Temporada
						{{temporada.numeroTemporada}}</span>
					<div class="d-flex">
						<button class="btn btn-primary me-2" data-bs-target="#{{nomeModal}}" data-bs-toggle="modal" type="button">
							<span class="material-icons">
								visibility
							</span>
						</button>
						<a href="/deletar-temporada/{{temporada.id}}">
							<button class="btn btn-danger me-2" type="button">
								<span class="material-icons">
									delete
								</span>
							</button>
						</a>

						<button class="btn btn-info" data-bs-target="#{{nomeModalEdicao}}" data-bs-toggle="modal" type="button">
							<span class="material-icons">
								edit
							</span>
						</button>

					</div>
				</li>
			{% endfor %}
		</ul>
	</section>

	{% include "temporada/infoModal.volt" %}
{% endblock %}
