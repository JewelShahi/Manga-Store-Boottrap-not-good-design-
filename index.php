<?php
include "connection.php";


session_start();


$sql = "SELECT MAX(price) AS max_price, MIN(price) AS min_price FROM products";
$stmt = $conn->prepare($sql);
$stmt->execute();

$priceRange = $stmt->fetch(PDO::FETCH_ASSOC);

$maxPrice = $priceRange['max_price'];
$minPrice = $priceRange['min_price'];

if (isset($_POST['addFilter'])) {
  $filterValue = filter_var($_POST['filter'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $select = $conn->prepare("SELECT product_id, product_name, description, price, banner FROM products WHERE price <=" . $filterValue);
} else {
  $select = $conn->prepare("SELECT product_id, product_name, description, price, banner FROM products");
}
$select->execute();
$products = $select->fetchAll(PDO::FETCH_ASSOC);

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_submit'])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  try {
    $stmt = $conn->prepare("SELECT user_id, username FROM users WHERE username = ? AND password = ? ");
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() > 0) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $_SESSION['username'] = $row['username']; // Save the retrieved username in the session
      echo "<script>alert('Logged in successfully');</script>";
    } else {
      echo "<script>alert('Invalid username or password.');</script>";
    }
  } catch (PDOException $e) {
    $error_message = "Error: " . $e->getMessage();
  }
}

if (isset($_POST['register_submit'])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];

  try {
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->execute([$username, $password, $email]);
    $_SESSION['username'] = $username;
    echo "<script>alert('Registration successful!');</script>";
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <script type="module" src="/@vite/client"></script>
  <script type="module" src="/@vite/client"></script>
  <script type="module" src="/@vite/client"></script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="signup-in.css" />
  <link rel="stylesheet" href="index.css" />
  <title>AnimTrendRx</title>
</head>

<body style="overflow-x: hidden; width: 100%">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #b1c9f0">
    <a class="navbar-brand" href="#">AnimTrendRx</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <i class="fas fa-home"></i> Home

            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gallery.php">
            <i class="fas fa-images"></i> Gallery
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.php">
            <i class="fas fa-blog"></i> Blog
          </a>
        </li>
        <?php
        if (!isset($_SESSION['username'])) {

        ?>
          <li class="nav-item">
            <a class="nav-link" href="#" onclick="openLoginRegisterModal()">
              <i class="fa fa-sign-in"></i> Logister
            </a>
          </li>
        <?php
        } else {

        ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="fa fa-sign-out"></i> Logout
            </a>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </nav>
  <div class="modal fade" id="loginRegisterModal" tabindex="-1" role="dialog" aria-labelledby="loginRegisterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginRegisterModalLabel">Logister</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
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
                  <div id="login-img"></div>
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
                  <div id="signup-img"></div>
                </div>
                <form class="text-center centered-form" method="POST">

                  <div class="form-group">
                    <label for="usernameUp">Username</label>
                    <input type="text" class="form-control" id="usernameUp" name="username" placeholder="Enter your username" required />
                  </div>
                  <div class="form-group">
                    <label for="passwordUp">Email</label>
                    <input type="email" class="form-control" id="passwordUp" name="email" placeholder="Enter your email" required />
                  </div>
                  <div class="form-group">
                    <label for="passwordUp">Password</label>
                    <input type="password" class="form-control" id="passwordUp" name="password" placeholder="Enter your password" required />
                  </div>
                  <button type="submit" class="btn btn-primary" name="register_submit">
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
  <div class="container mt-2 w-100">
    <div class="w-100">
      <div class="text-center w-100">
        <div>
          <h1>Filter</h1>
          <form id="search_icon">
            <input type="text" class="form-control" placeholder="Search" required="" />
            <div class="input-group-append">
              <button class="btn btn-primary" id="search" type="submit" style="color: white">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
          <div class="mt-3">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" value="" id="checkbox1" name="animelover" checked="" />
              <label for="animelover">I love anime</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" value="" id="checkbox2" name="lovetailwind" checked="" />
              <label for="lovetailwind">I love TailwindCSS</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" value="" id="checkbox3" name="hateboot" checked="" disabled="" />
              <label for="hateboot">I HATE BOOTSTRAP</label>
            </div>
          </div>
          <div class="mt-3">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="radioGroup" id="radio1" checked="" disabled="" />
              <label for="radio1">I HATE BOOTSTRAP</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="radioGroup" id="radio2" />
              <label for="radio2">I love Bleach</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="radioGroup" id="radio3" />
              <label for="radio3">I love TailwindCSS
                <?= isset($_SESSION["username"]) && !empty($_SESSION["username"]) ? $_SESSION["username"] : "Not logistered!"; ?>
              </label>
            </div>

          </div>
        </div>
      </div>
      <div class="w-100" id="kys">
        <div id="imageCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#imageCarousel" data-slide-to="0" class=""></li>
            <li data-target="#imageCarousel" data-slide-to="1" class=""></li>
            <li data-target="#imageCarousel" data-slide-to="2" class=""></li>
            <li data-target="#imageCarousel" data-slide-to="3" class=""></li>
            <li data-target="#imageCarousel" data-slide-to="4" class=""></li>
            <li data-target="#imageCarousel" data-slide-to="5" class="active"></li>
            <li data-target="#imageCarousel" data-slide-to="6" class=""></li>
            <li data-target="#imageCarousel" data-slide-to="7" class=""></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item">
              <img src="images/slider/bleach.png" class="d-block img-fluid rounded rounded-20" alt="Image 1" />
            </div>
            <div class="carousel-item">
              <img src="images/slider/jjk.png" class="d-block img-fluid rounded rounded-20" alt="Image 2" />
            </div>
            <div class="carousel-item">
              <img src="images/slider/ds.png" class="d-block img-fluid rounded rounded-20" alt="Image 3" />
            </div>
            <div class="carousel-item">
              <img src="images/slider/bc.png" class="d-block img-fluid rounded rounded-20" alt="Image 4" />
            </div>
            <div class="carousel-item">
              <img src="images/slider/bsd.png" class="d-block img-fluid rounded rounded-20" alt="Image 5" />
            </div>
            <div class="carousel-item active">
              <img src="images/slider/op.png" class="d-block img-fluid rounded rounded-20" alt="Image 6" />
            </div>
            <div class="carousel-item">
              <img src="images/slider/par.png" class="d-block img-fluid rounded rounded-20" alt="Image 7" />
            </div>
            <div class="carousel-item">
              <img src="images/slider/tk.png" class="d-block img-fluid rounded rounded-20" alt="Image 8" />
            </div>
          </div>
          <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <!-- TODO -->
      <div class="form-group">
        <!-- TODO -->
        <form method="POST">
          <label for="priceRange">Price Range</label>
          <input name="filter" type="range" class="form-control-range" id="priceRange" min="<?= $minPrice; ?>" max="<?= $maxPrice; ?>" step="0.01" value="50" />
          <div class="d-flex justify-content-between">
            <span id="minPrice"><?= $minPrice; ?></span>
            <span id="maxPrice"><?= $maxPrice; ?></span>
          </div>
          <br>
          <button name="addFilter" type="submit" class="btn btn-primary px-4 btn-xl">Filter</button>
        </form>
      </div>
      <div data-role="page" id="divOriginal">
        <div class="container">
          <div class="row mt-3 article">
            <?php foreach ($products as $product) : ?>
              <div class="col-md-4">
                <div class="accordion" id="accordionExample<?php echo $product['product_id']; ?>">
                  <div class="card">
                    <div class="card-header" id="heading<?php echo $product['product_id']; ?>">
                      <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $product['product_id']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $product['product_id']; ?>">
                          <img src="<?php echo $product['banner']; ?>" class="d-block w-100" alt="<?php echo $product['product_name']; ?>" />
                        </button>
                      </h5>
                    </div>
                    <div id="collapse<?php echo $product['product_id']; ?>" class="collapse show" aria-labelledby="heading<?php echo $product['product_id']; ?>" data-parent="#accordionExample<?php echo $product['product_id']; ?>">
                      <div class="card-body overflow">
                        <?php echo $product['description']; ?>
                      </div>
                      <a href="product.php?product_id=<?php echo $product['product_id']; ?>">
                        <img src="<?php echo $product['banner']; ?>" class="images d-block w-75 mx-auto my-4" alt="<?php echo $product['product_name']; ?>" />
                      </a>
                      <p class="font-weight-bold text-center d-block w-75 mx-auto my-4" style="font-size: 30px">
                        $<?php echo $product['price']; ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>


    </div>
    <div class="row mt-3 justify-content-center">
      <div class="col-md-6">
        <form id="askQuestionsForm">
          <div class="form-group">
            <label for="questionTextarea" class="text-center w-100">Write you questions here:</label>
            <textarea class="form-control" id="questionTextarea" rows="3"></textarea>
          </div>
          <button type="button" class="btn btn-primary btn-block" onclick="insertQuestions()">
            Submit you question
          </button>
        </form>
      </div>
    </div>
    <script src="index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  </div>
</body>

</html>