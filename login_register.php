<?php
session_start();

include 'connection.php';

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_submit'])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  try {
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE username = ? AND password = ? ");
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() > 0) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $_SESSION['user_id'] = $row['user_id'];
      echo "<script>alert('Logged in successfully');</script>";
    } else {
      echo "<script>alert('Invalid username or password.');</script>";
    }
  } catch (PDOException $e) {
    $error_message = "Error: " . $e->getMessage();
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <title>AnimTrendRx Logister</title>
  <style>
    @media (min-width: 800px) {
      .image-with-inputs {
        display: flex;
        align-items: center;
      }

      .image-container {
        flex: 1;
        margin-right: 20px;
      }

      .image-container img {
        width: 100%;
        max-width: 100%;
        height: auto;
      }

      .inputs-container {
        flex: 2;
      }
    }

    @media (max-width: 800px) {
      .image-container img {
        display: none;
      }
    }
  </style>
</head>

<body style="overflow-x: hidden; background-color: white !important">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #b1c9f0">
    <a class="navbar-brand" href="#">AniTrendRx</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"><i class="fas fa-home"></i> Home
            <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-blog"></i> Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-images"></i> Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#loginRegisterModal"><i class="fas fa-sign-in-alt"></i> Logister</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="modal fade" id="loginRegisterModal" tabindex="-1" role="dialog" aria-labelledby="loginRegisterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginRegisterModalLabel">Logister</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tabpanel" aria-controls="register" aria-selected="false">Register</a>
            </li>
          </ul>
          <div class="tab-content mt-2">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
              <div class="image-with-inputs">
                <div class="image-container">
                  <img src="path/to/login-image.jpg" class="img-fluid mb-4" alt="Login Image" />
                </div>
                <div class="inputs-container">
                  <form class="text-center" method="POST">
                    <div class="form-group">
                      <label for="loginUsername">Username</label>
                      <input type="text" class="form-control" id="loginUsername" name="username" placeholder="Enter your username" />
                    </div>
                    <div class="form-group">
                      <label for="loginPassword">Password</label>
                      <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter your password" />
                    </div>
                    <button type="submit" class="btn btn-primary" name="login_submit">
                      Login
                    </button>
                  </form>

                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
              <div class="image-with-inputs">
                <div class="image-container">
                  <img src="path/to/register-image.jpg" class="img-fluid mb-4" alt="Register Image" />
                </div>
                <div class="inputs-container">
                  <form class="text-center">
                    <div class="form-group">
                      <label for="registerName">Name</label>
                      <input type="text" class="form-control" id="registerName" placeholder="Enter your name" />
                    </div>
                    <div class="form-group">
                      <label for="registerUsername">Username</label>
                      <input type="text" class="form-control" id="registerUsername" placeholder="Choose a username" />
                    </div>
                    <div class="form-group">
                      <label for="registerPassword">Password</label>
                      <input type="password" class="form-control" id="registerPassword" placeholder="Choose a password" />
                    </div>
                    <button type="button" class="btn btn-primary">
                      Register
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>