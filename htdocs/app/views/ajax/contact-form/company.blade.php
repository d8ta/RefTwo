<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Neue Kontaktanfrage</h2>
	{{-- <p>Mail wurde gesendet an: {{$sendto}}</p> --}}
	<p>
		<strong>Vorname: </strong> {{$firstname}}<br>
		<strong>Nachname: </strong> {{$lastname}}<br>
		<strong>Firma: </strong> {{$company}}<br>
		<strong>Telefon: </strong> {{$phone}}<br>
		<strong>E-Mail: </strong> {{$email}}<br><br>
		<strong>Thema: </strong> {{$recipient}}<br><br>
		<strong>Nachricht: </strong><br>
		{!!nl2br($message)!!}
	</p>

</body>
</html>