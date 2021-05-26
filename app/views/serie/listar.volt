{% extends "layouts/template.volt" %}

{% block content %}
	<h1 style="font-family: 'sans-serif';">Lista de Séries</h1>
	<ul>
		{% for serie in series %}
			<li>{{serie.nome}}</li>
		{% endfor %}
	</ul>
{% endblock %}
