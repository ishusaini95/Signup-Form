<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Login Form</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username" for="email">Email or Mobile Number:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="login">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            
            <!-- <a href="logout.php" class="btn btn-primary btn-block mt-5">Logout</a> -->
        </form>
        <?php if (isset($_GET['error'])) {?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error'];?>
            </div>
        <?php }?>
    </div>
    
</body>
</html>