<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/signup">
        @csrf
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}"><br>

        <label for="lastname">Last Name:</label><br>
        <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}"><br>

        <label for="role">Role</label><br>
            <select id="role" name="role">
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select><br>


        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email') }}"><br>

        <label for="phone_no">Phone Number:</label><br>
        <input type="text" id="phone_no" name="phone_no" value="{{ old('phone_no') }}"><br>

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="{{ old('username') }}"><br>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="{{ old('address') }}"><br>

        <label for="other_info_address">Other Info Address:</label><br>
        <input type="text" id="other_info_address" name="other_info_address" value="{{ old('other_info_address') }}"><br>

        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
