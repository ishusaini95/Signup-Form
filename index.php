<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-5">Sign Up</h1>
        <form action="signup.php" method="post" enctype="multipart/form-data">
            
        
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div> 
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" required>
                    </div>
            

                <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <div class="form-group"> <br> 
                        <label for="profile_picture">Profile Picture (png, jpg, avif, webp - max 2MB)</label>
                        
                        <input type="file" class="form-control-file" id="profile_picture" name="profile_picture" accept=".png,.jpg,.avif,.webp" required>
                    </div>

            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
        </form>
        <p class="text-center mt-3">Already have an account? <a href="index1.php">Log In</a>.</p>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>