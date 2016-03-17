<!DOCTYPE html>
<html>
<head>
	<title>Mi primer MVC PHP</title>
</head>
<body>
<h1><?php echo $data['name']?></h1>

<form method="POST" action="MainController/name">
	<input type="text" name="name" />
	<input type="Submit" value="Enviar" />
</form>
</body>
</html>