<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling body */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #007bff, #00c6ff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Header styling */
        .card-header {
            background: linear-gradient(to right, #007bff, #0056b3);
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            text-align: center;
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Input and button styling */
        .form-control {
            border-radius: 30px;
        }

        .btn {
            border-radius: 30px;
            background: linear-gradient(to right, #007bff, #00c6ff);
            border: none;
            color: white;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background: linear-gradient(to left, #00c6ff, #007bff);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Footer text */
        .footer-text {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9rem;
            color: #fff;
        }

        .footer-text a {
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" action="process_login.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <div class="footer-text">
                            <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
