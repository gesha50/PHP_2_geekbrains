<html>
<head>
    <title>Document</title>
</head>
<body>
{% for item in data %}
<div>
    <h4>{{ item.title }}</h4>
    <a href="item.php?path={{ item.path }}"><img style='width: 300px;' src="img/{{ item.path }}" alt=""></a>
</div>
{% endfor %}
</body>
</html>