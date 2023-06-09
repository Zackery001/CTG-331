<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
</head>
<body>
    <h1>Your account has been successfully verified!</h1>
    <a href="{{ route('verify', [$userId, $token]) }}">Click me to verify your account!</a>
</body>
</html>