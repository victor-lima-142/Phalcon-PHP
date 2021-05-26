<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>
			{% block titulo_head %}{% endblock %}

		</title>
		<meta name="generator" content="Bootply"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	</head>

	<body>
		<div class="container-fluid" id="main"> {% block content %}{% endblock %}
			</div>
		</body>

	</html>
