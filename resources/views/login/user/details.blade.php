<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>user-profile</title>
    <style>
        label {
            display: inline-block;
            width: 120px;
        }

        h2 {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>User Details</h2>
        <hr>
        <div>AccountId: <input name="accountId" value="{{ $user->accountID }}" readonly /></div>
        <div>Email: <input name="email" value="{{ $user->email }}" readonly /></div>
        <div>Fullname: <input name="fullname" value="{{ $user->fullname }}" readonly /></div>
        <div>Role: <select name="role" disabled>
                <option value="0">Please choose one</option>
                <option value="1" @if ($user->role == 1) selected @endif>Admin</option>
                <option value="2" @if ($user->role == 2) selected @endif>User</option>
            </select>
        </div>
        <div>Active: <select name="active" disabled>
                <option value="0">Please choose one</option>
                <option value="1" @if ($user->active == 1) selected @endif>Active</option>
                <option value="2" @if ($user->active == 2) selected @endif>Disable</option>
            </select>
        </div>
        <br>
        <h5><a href="{{ url('index') }}">Return Home</a> | <a href="{{ url('logout') }}">
                Logout </a> </h5>
    </div>
</body>

</html>
