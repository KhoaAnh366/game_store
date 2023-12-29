<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <hr>
        @if (session('message'))
            <h4 style="color: red">
                Error: {{ session('message') }}
            </h4>
        @endif
        <form action="{{ url('checkLogin') }}" method="post">
            @csrf
            <div>Email: <br><input name="email" value="lanhpt@fpt.com" required /> </div>
            <div>Password:<br><input type="password" name="pwd" value="123" required /> </div>
            <div><input type="submit" value="Login" class="btn btn-danger"></div>
        </form>
    </div>
</body>

</html>
