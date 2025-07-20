<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Email</title>
</head>
<body>
    <h2>Hello Admin,</h2>
    You received an email from {{$contact->name}} Here are the details:<br>
    <p><b>Name:</b> {{$contact->name}}</p>
    <p><b>Email:</b> {{$contact->email}}</p>
    <p><b>Telephone:</b> {{$contact->telephone}}</p>
    <p><b>Message:</b> {{$contact->message}}</p>
    Thank You
</body>
</html>