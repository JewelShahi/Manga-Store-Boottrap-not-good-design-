<?php
include 'connection.php';

$product_id = $_GET['product_id'] ?? null;
$product = [];

if ($product_id) {
    try {
        $sql = "SELECT * FROM products WHERE product_id = :product_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Product not found";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Product ID not provided";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Character Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="accordionExample.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1>Characters</h1>
                <div id="characterSlider" class="carousel slide" data-ride="carousel">
                    <!-- <ol class="carousel-indicators">
                        <li data-target="#characterSlider" data-slide-to="0" class="active"></li>
                        <li data-target="#characterSlider" data-slide-to="1"></li>
                        <li data-target="#characterSlider" data-slide-to="2"></li>
                    </ol> -->
                    <!-- <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/jjk/gojo.png" class="d-block mx-auto mw-100 mh-100" style="object-fit: cover" alt="Character 1" />
                        </div>
                        <div class="carousel-item">
                            <img src="images/jjk/yuji.png" class="d-block w-100" alt="Character 3" />
                        </div>
                        <div class="carousel-item">
                            <img src="images/jjk/sukuna.png" class="d-block w-100" alt="Character 4" />
                        </div>
                    </div> -->
                    <ol class="carousel-indicators">
                        <?php
                        // Decode JSON data from the 'characters' field
                        $json_data = json_decode($product['characters'], true);

                        // Loop through each image in the JSON data and create carousel indicators
                        for ($i = 0; $i < count($json_data); $i++) {
                            echo '<li data-target="#characterSlider" data-slide-to="' . $i . '"';
                            // Check if this is the first item, if yes, set it as active
                            if ($i === 0) {
                                echo ' class="active"';
                            }
                            echo '></li>';
                        }
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        // Loop through each image in the JSON data and create carousel items
                        foreach ($json_data as $key => $image) {
                            echo '<div class="carousel-item' . ($key === 0 ? ' active' : '') . '">';
                            echo '<img src="' . $image . '" class="d-block w-100" alt="Character ' . ($key + 1) . '" />';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#characterSlider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#characterSlider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="character-info">
                    <h1 class="text-primary">Main character</h1>
                    <h3><em><?php echo $product['product_name']; ?></em></h3>
                    <p><?php echo $product['description']; ?></p>
                </div>
                <div class="manga-info">
                    <h2 class="text-primary"><?php echo $product['product_name']; ?> Manga</h2>
                    <p><?php echo $product['additional_info']; ?></p>
                    <span class="badge badge-success price-tag mt-2 mb-2 w-100" style="font-size: 35px; padding: 10px">$<?php echo $product['price']; ?></span>
                    <br />
                    <button type="button" class="btn btn-primary add-to-cart-btn w-100">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer mt-5 py-4">
        <div class="container text-center">
            <h5 class="text-uppercase mb-4">Popularity</h5>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <canvas id="popularityChart" width="400" height="200"></canvas>
                </div>
            </div>
            <p class="text-muted">Based on user ratings and reviews</p>
        </div>
    </footer>
    <a type="button" class="btn btn-primary" style="width: 100%; padding: 5px; font-size: 30px" href="index.php">Back</a>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="accordionExample.js"></script>
    <script>
        var page1Labels = ["Yuji", "Gojo", "Sukuna"];
        var page1Data = [75, 85, 95];
        createPopularityChart(page1Labels, page1Data);
    </script>
</body>

</html>