{% extends "layouts/template.volt" %}

{% block titulo_head %}Sistema de Séries :: InfoIdeias
{% endblock %}


{% block content %}
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
			{% for serie in series %}
				<?php
				$nomeModal = str_replace('.', '', $serie->nome);
				$nomeModal = strtolower(str_replace(' ', '-', $nomeModal)) . '-' . $serie->id . '-Modal';
				?>
				<li class="list-group-item d-flex justify-content-between rounded-0 border mt-1 align-items-center">
					<span title="serie-{{serie.id}}">{{serie.nome}}</span>

					<section class="d-flex align-items-center justify-content-between">
						<a href="/lista-temporadas/serie/{{serie.id}}" class="me-2">
							<button class="btn btn-primary">
								<span class="material-icons">
									visibility
								</span>
							</button>
						</a>

						<a href="/deleta-serie/{{serie.id}}" class="me-2">
							<button class="btn btn-danger">
								<span class="material-icons">
									delete_outline
								</span>
							</button>
						</a>

						<button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#{{nomeModal}}">
							<span class="material-icons">
								edit
							</span>
						</button>
					</section>
				</li>
			{% endfor %}
		</ul>
	</div>

	{% include "/serie/modais.volt" %}
{% endblock %}
