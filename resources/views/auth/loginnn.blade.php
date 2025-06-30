<!DOCTYPE html>
<html>

<head>
    <title>Login Admin</title>
</head>

<body>
    <h2>Login Admin</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" required value="{{ old('email') }}">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>

</html>
