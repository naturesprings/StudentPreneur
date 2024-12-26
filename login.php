<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>StudentPreneur</title>
  </head>
  <body>
  <?php
    require('model/database.php');
    require('model/user_db.php');

    session_start();
    ob_start(); 
    $action = filter_input(INPUT_POST, 'action');

    if ($action == 'login') {
     
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if ($email && $password) {
         
            $user = get_user_by_email($email);
          
            if ($user && $password === $user['password']) {
             
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] == 'admin') {
                    header("Location: admin.php");
                } else {
                    header("Location: post.php");
                }
                ob_end_flush();
                exit();
            } else {
                $login_error = 'Invalid email or password';
            }
        } else {
            $login_error = 'Please provide valid email and password';
        }
    }
    ob_end_flush();
    ?>

    <div id="app">
      <header>
        <nav>
          <a href="homepage.php"><div class="logo">StudentPreneur</div></a>
          
        </nav>
      </header>

      <section class="login-section">
        <div class="login-left">
          <div>
            <?php if (isset($login_error)) : ?>
              <p class="error"><?php echo $login_error; ?></p>
          <?php endif; ?>
          <form id="loginForm" method="post" action="login.php">
              <input type="hidden" name="action" value="login">
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" name="email" required />
              </div>
              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password" required />
              </div>
              <button type="submit">Login</button>
          </form>
          </div>
        </div>
        <div class="login-right">
          <img src="img/login.jpg" alt="Login Image" />
        </div>
      </section>

      <?php include 'footer.php'; ?>
    </div>
    
  
  </body>
</html>
