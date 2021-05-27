{% extends "layouts/template.volt" %}

{% block titulo_head %}Sistema de Séries :: InfoIdeias
{% endblock %}


{% block content %}
	<h1 class="text-center">Lista de Séries</h1>
	<div class="container ps-5 pe-5">
		<ul class="list-group">
			<li class="list-group-item d-flex flex-row-reverse">
				<button type="button" data-bs-toggle="modal" data-bs-target="#novaSerieModal" class="btn bg-success bg-gradient text-white">
					Nova Série
				</button>
			</li>


			{% for serie in series %}
				<li class="list-group-item">{{serie.nome}}</li>
			{% endfor %}
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
					{{ form('nova-serie', 'method': 'post', 'enctype' : 'multipart/form-data', 'name':'novaSerie') }}

						<div
							class="form-floating mb-3">
							<!-- <input type="text" class="form-control border" id="nome" name="nome">-->
							{{ text_field("nome", "width": '100%', "class": 'form-control') }}

							<label for="nome">Nome</label>
						</div>

						<div
							class="form-floating mb-3">
							<!-- <textarea cols="7" row="6" class="form-control border" id="descricao" name="descricao"></textarea> -->
							{{ text_field("descricao", "width": '100%', "class": 'form-control') }}

							<label for="descricao">Descrição</label>
						</div>

						<div
							class="form-floating mb-3">
							<!-- <input type="number" min="1" max="5" class="form-control border" id="avaliacao" name="avaliacao"> -->
							{{ numeric_field('avaliacao', 'min': '1', 'max': '5', 'class': 'form-control') }}


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
{% endblock %}
