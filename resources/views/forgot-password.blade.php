<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Lupa Password</title>
    <style>
        body {
            background-color: #2596be;
            background: url('images/IMG2.jpeg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #fff;
        }
        .login-container {
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 40px;
            max-width: 400px;
            margin: 80px auto;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
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
        .alert-danger, .alert-success {
            background-color: rgba(248, 215, 218, 0.9);
            color: #721c24;
            border: none;
            border-radius: 5px;
        }
        .alert-success {
            background-color: rgba(212, 237, 218, 0.9);
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h1>Lupa Password</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Kirim Link Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
