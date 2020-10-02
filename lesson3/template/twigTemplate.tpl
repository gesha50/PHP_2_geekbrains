<html>
<head>
    <title>Document</title>
</head>
<body style='display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    text-align:center;
'>

{% for item in photo %}
<div>
<h4>{{ item.0 }}</h4>
<a href="item.php?path={{ item.1 }}"><img style='width: 300px;' src="img/{{ item.1 }}" alt=""></a>
</div>
{% endfor %}

</body>
</html>