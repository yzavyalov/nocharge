<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing Letter</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

<div style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h1 style="color: #333;">Internet Association of Fintech Services</h1>
    <p style="margin-bottom: 20px;">Hello, {{ $name }}</p>
    <p style="margin-bottom: 20px;"><strong>Subject of letter:</strong> {{ $subject }}</p>
    <p style="margin-bottom: 20px;"><strong>Text of letter:</strong><br>{{ $text }}</p>
</div>

</body>
</html>

