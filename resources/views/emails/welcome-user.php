<!DOCTYPE html>
<html>
<body>
    <h1>Welcome, {{ $name }} 👋</h1>
{{ dd('o') }}
{{ @dd('o') }}

    <p>
        Thank you for signing up!
        Your current plan is: <strong>{{ $plan }}</strong>.
    </p>

    <p>
        We’re happy to have you with us.
    </p>

    <p>Cheers,<br>The Team</p>
</body>
</html>
