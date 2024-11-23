<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marriage Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            color: white;
            font-family: 'Arial', sans-serif;
        }

        h2 {
            margin-bottom: 20px;
        }

        .form-container {
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
        }

        .form-container:hover {
            transform: scale(1.05);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .captcha-container {
            margin-top: 10px;
        }

        .fa-eye {
            cursor: pointer;
        }

        video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            transform: translate(-50%, -50%);
            object-fit: cover;
        }

        @media (max-width: 576px) {
            .form-container {
                width: 90%;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <video autoplay muted loop>
        <source src="WhatsApp Video 2024-11-21 at 18.40.18_ffa98777.mp4" type="video/mp4">
        
    </video>

    <div class="container">
        <h1 style="color:black; backdrop:blur(-10px); font-size:25px; margin-left:28%;">"Sign In to Your Marraige Registration World!!"</h1>
        <div class="text-center my-4">
            <button class="btn btn-primary" id="showLogin">Login</button>
            <button class="btn btn-success" id="showSignup">Sign Up</button>
        </div>

        <div id="loginContainer" class="form-container">
            <h2>Login</h2>
            <form id="loginForm" action="login.php" method="POST">
                <div class="form-group">
                    <label for="loginEmail">Email:</label>
                    <input type="email" class="form-control" id="loginEmail" name="loginEmail" required>
                    <small class="form-text text-muted" id="loginEmailError" style="display:none;"></small>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password:</label>
                    <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>
                <div class="captcha-container">
                    <label for="captchaInput">Enter the CAPTCHA: <span id="captchaText"></span></label>
                    <input type="text" class="form-control" id="captchaInput" required>
                </div>
                <button type="submit" class="btn btn-primary" id="loginButton" disabled>Login</button>
                <a href="forget.php"><button type="button"  style="margin-top: 10px; text-decoration:none;">Forgot Password?</button></a>
            </form>
        </div>

        <div id="signupContainer" class="form-container" style="display: none;">
            <h2>Sign Up</h2>
            <form id="signupForm" action="signup.php" method="POST">
                <div class="form-group">
                    <label for="signupEmail">Email:</label>
                    <input type="email" class="form-control" id ="signupEmail" name="signupEmail" required>
                    <small class="form-text text-muted" id="signupEmailError" style="display:none;"></small>
                </div>
                <div class="form-group">
                    <label for="signupPassword">Password:</label>
                    <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
                    <i class="fas fa-eye" id="togglePasswordSignup"></i>
                    <small class="form-text text-muted" id="signupPasswordError" style="display:none;"></small>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" class="form-control" id="confirmPassword" required>
                    <i class="fas fa-eye" id="toggleConfirmPassword"></i>
                    <small class="form-text text-muted" id="confirmPasswordError" style="display:none;"></small>
                </div>
                <button type="submit" class="btn btn-success">Sign Up</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Generate a simple CAPTCHA
            function generateCaptcha() {
                const captcha = Math.floor(Math.random() * 10000); // Generate a random number
                $('#captchaText').text(captcha);
                return captcha;
            }
            let currentCaptcha = generateCaptcha();

            // Toggle password visibility
            $('#togglePassword').click(function() {
                const passwordInput = $('#loginPassword');
                passwordInput.attr('type', passwordInput.attr('type') === 'password' ? 'text' : 'password');
            });

            $('#togglePasswordSignup').click(function() {
                const passwordInput = $('#signupPassword');
                passwordInput.attr('type', passwordInput.attr('type') === 'password' ? 'text' : 'password');
            });

            $('#toggleConfirmPassword').click(function() {
                const passwordInput = $('#confirmPassword');
                passwordInput.attr('type', passwordInput.attr('type') === 'password' ? 'text' : 'password');
            });

            // Show login container
            $('#showLogin').click(function() {
                $('#signupContainer').hide();
                $('#loginContainer').show();
                currentCaptcha = generateCaptcha(); // Regenerate CAPTCHA on switch
            });

            // Show signup container
            $('#showSignup').click(function() {
                $('#loginContainer').hide();
                $('#signupContainer').show();
            });

            // Enable login button if CAPTCHA is correct
            $('#captchaInput').on('input', function() {
                const userInput = $(this).val();
                $('#loginButton').prop('disabled', userInput !== currentCaptcha.toString());
            });

            // Validate signup form
            $('#signupForm').on('submit', function(e) {
                e.preventDefault();
                let valid = true;
                const email = $('#signupEmail').val();
                const password = $('#signupPassword').val();
                const confirmPassword = $('#confirmPassword').val();

                // Reset error messages
                $('#signupEmailError').hide();
                $('#signupPasswordError').hide();
                $('#confirmPasswordError').hide();

                // Email validation
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(email)) {
                    $('#signupEmailError').text('Please enter a valid email address.').show();
                    valid = false;
                }

                // Password validation
                const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z]).{8,}$/; // At least 8 characters, one uppercase and one lowercase
                if (!passwordPattern.test(password)) {
                    $('#signupPasswordError').text('Password must be at least 8 characters long and include both uppercase and lowercase letters.').show();
                    valid = false;
                }

                // Confirm password validation
                if (password !== confirmPassword) {
                    $('#confirmPasswordError').text('Passwords do not match.').show();
                    valid = false;
                }

                if (valid) {
                    this.submit(); // Submit the form if valid
                }
            });

            // Handle forgot password button click
            $('#forgotPassword').click(function() {
                alert('Forgot Password functionality is not implemented yet.');
            });
        });
    </script>
</body>
</html>