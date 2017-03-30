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

    <form method="post" action="/login">
        {{csrf_field()}}
        <label>email</label>
        <input type="email" value="" name="email">
        <label>password</label>
        <input type="password" name="password">
        <button type="submit">Login</button>
    </form>


</body>
</html>