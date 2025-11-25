<?php
include('Header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - EternaWedd</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
        crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <style>
    .bg-image {
      background-image: url('images/loginbg3.jpg');
      height: 300px;
      background-size: cover;
      background-position: center;
    }
    

    .card {
      margin-top: -100px;
      backdrop-filter: blur(30px);
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 1rem;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }
    
    .password-container {
      position: relative;
    }
    
    .toggle-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      color: #6c757d;
    }
    
    .error-message {
      color: #dc3545;
      font-size: 0.875rem;
      margin-top: 0.25rem;
    }
    
    .social-login {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin: 15px 0;
    }
    
    .social-btn {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }
    
    .social-btn:hover {
      transform: translateY(-2px);
    }
    
    .facebook {
      background-color: #3b5998;
      color: white;
    }
    
    .google {
      background-color: #db4437;
      color: white;
    }
    
    .twitter {
      background-color: #1da1f2;
      color: white;
    }
    
    .github {
      background-color: #333;
      color: white;
    }
    
    .form-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 15px;
    }
  </style>
</head>
<body>

  <section class="text-center">
    <div class="p-5 bg-image"></div>

   <div class="card mx-4 mx-md-5 shadow-5-strong"
       style="background-image: url('images/loginBg.jpg'); 
              background-size: cover; 
              background-position: center; 
              background-repeat: no-repeat;
              border-radius: 1rem;">
       
      <div class="card-body py-5 px-md-5">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5"> <a href="login.php" style="color: #a14e54; text-decoration: none;">Login</h2></a>
            
            
            <!-- Error/Success Messages -->
            <?php
            if (isset($_GET['error'])) {
                echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_GET['error']) . '</div>';
            }
            if (isset($_GET['success'])) {
                echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($_GET['success']) . '</div>';
            }
            ?>
            
            <form action="loginaction.php" method="post" id="loginForm" novalidate>
              <div class="form-group mb-4">
                <input type="text" id="username" class="form-control" placeholder="Username" name="username" required />
                <div class="error-message" id="usernameError"></div>
              </div>

              <div class="form-group mb-4 password-container">
                <input type="password" id="password" class="form-control" placeholder="Password" name="password" required />
                <button type="button" class="toggle-password" id="togglePassword">
                  <i class="far fa-eye"></i>
                </button>
                <div class="error-message" id="passwordError"></div>
              </div>

              <div class="form-group d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember" name="remember" />
                  <label class="form-check-label" for="remember">
                    Remember me
                  </label>
                </div>
                <a href="forgot-password.php" class="text-primary">Forgot password?</a>
              </div>

              <button type="submit" class="btn btn-primary btn-block mb-4">
                Login
              </button>
              
              <div class="text-center mb-3">
                <p>Don't have an account? <a href="register.php" class="text-primary">Register here</a></p>
              </div>

              <div class="text-center">
                <p>or Login with:</p>
                <div class="social-login">
                  <button type="button" class="btn social-btn facebook">
                    <i class="fab fa-facebook-f"></i>
                  </button>

                  <button type="button" class="btn social-btn google">
                    <i class="fab fa-google"></i>
                  </button>

                  <button type="button" class="btn social-btn twitter">
                    <i class="fab fa-twitter"></i>
                  </button>

                  <button type="button" class="btn social-btn github">
                    <i class="fab fa-github"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
      const passwordInput = document.getElementById('password');
      const icon = this.querySelector('i');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
      }
    });
    
    // Form validation
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      let isValid = true;
      
      // Username validation
      const username = document.getElementById('username');
      const usernameError = document.getElementById('usernameError');
      if (username.value.trim() === '') {
        usernameError.textContent = 'Username is required';
        username.classList.add('is-invalid');
        isValid = false;
      } else {
        usernameError.textContent = '';
        username.classList.remove('is-invalid');
      }
      
      // Password validation
      const password = document.getElementById('password');
      const passwordError = document.getElementById('passwordError');
      if (password.value === '') {
        passwordError.textContent = 'Password is required';
        password.classList.add('is-invalid');
        isValid = false;
      } else {
        passwordError.textContent = '';
        password.classList.remove('is-invalid');
      }
      
      if (!isValid) {
        e.preventDefault();
      }
    });
    
    // Clear error messages on input
    document.getElementById('username').addEventListener('input', function() {
      this.classList.remove('is-invalid');
      document.getElementById('usernameError').textContent = '';
    });
    
    document.getElementById('password').addEventListener('input', function() {
      this.classList.remove('is-invalid');
      document.getElementById('passwordError').textContent = '';
    });
  </script>

</body>
</html>
<?php
include('Footer.php');
?>