<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>admin-addUser</title>
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
        <h2>Create new User</h2>
        <hr>
        <form action="{{ url('admin/addUser') }}" method="post">
            {{ csrf_field() }}
            <div><label for="">Email: </label> <input name="email" required /></div>
            <div><label for="">Password:</label> <input type="password" name="password" required /></div>

            <div><label for="">Confirm:</label> <input type="password" name="confirm" required /></div>

            <div><label for="">Fullname:</label> <input name="fullname" required /></div>
            <div><label for="">Role:</label> <select name="role" required>
                    <option value="">Please choose one</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
            <div><label for="">Active:</label> <select name="active" required>
                    <option value="">Please choose one</option>
                    <option value="1">Active</option>
                    <option value="2">Disable</option>
                </select>
            </div>
            <div><input type="submit" value="Create" class="btn btn-danger" /></div>
        </form>
    </div>
</body>

</html>
