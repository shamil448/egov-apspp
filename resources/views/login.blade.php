<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login Dashboard</title>
    <style>
        body {
            background-color: #2596be; /* Blue background */
            background: url('images/IMG1.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #fff; /* White text */
        }
        .login-container {
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black */
            border-radius: 15px;
            padding: 40px;
            max-width: 400px;
            margin: 80px auto;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2); /* Deep shadow */
        }
        h1 {
            color: #ffffff;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
        }
        .form-label {
            color: #fff;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .alert-danger {
            background-color: rgba(248, 215, 218, 0.9);
            color: #721c24;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h1>Login</h1>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $item) 
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">   
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            @include('components.footer')
        </div>
    </div>
</body>
</html>
