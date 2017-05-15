<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Neue Kontaktanfrage</h2>
	<p>
		<strong>Name: </strong> {{$name}}<br>
		<strong>E-Mail: </strong> {{$email}}<br><br>
		<strong>Nachricht: </strong><br>
		{!!nl2br($message)!!}
	</p>

</body>
</html>