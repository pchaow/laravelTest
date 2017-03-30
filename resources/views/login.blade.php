<html>
<head>
    <title>Login</title>
</head>
<body>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>Normal Login</h1>
<form method="post" action="/login">
    {{csrf_field()}}
    <label>email</label>
    <input type="email" value="" name="email">
    <label>password</label>
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>

<h1>Up Login</h1>
<form method="post" action="/login_up">
    {{csrf_field()}}
    <label>Username</label>
    <input type="text" value="" name="username">
    <label>password</label>
    <input type="password" name="password">
    <button type="submit">Login</button>
</form>

</body>
</html>