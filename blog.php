<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>AnimTrendRx Blog</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <link rel="stylesheet" href="blog.css" />
  </head>

  <body style="overflow-x: hidden;">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #b1c9f0;">
      <a class="navbar-brand" href="#">Blog</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php"
              ><i class="fas fa-home"></i> Home</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery.php"
              ><i class="fas fa-images"></i> Gallery</a
            >
          </li>
        </ul>
      </div>
    </nav>

    <div class="container mt-3">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="input-group">
            <input
              type="text"
              class="form-control"
              id="searchInput"
              placeholder="Search..."
            />
            <div class="input-group-append">
              <button
                class="btn btn-primary"
                id="search"
                type="button"
                style="color: white"
              >
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-3">
      <div class="w-100 d-flex flex-row flex-wrap justify-content-space-evenly">
        <div id="iframe" class="flex-grow-1 ml-2">
          <iframe
            width="560"
            height="315"
            src="https://www.youtube.com/embed/53_QT4NSB48"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
            class="w-100 rounded"
          ></iframe>
        </div>
        <div id="img-map" >
          <img
            src="images/all.png"
            width="560"
            height="315"
            alt="Workplace"
            usemap="#workmap"
            id="img"
            class="w-100 rounded"
          />
          <map name="workmap">
            <area
              shape="rect"
              coords="320,40,410,200"
              alt="Anime"
              href="image.php"
            />
          </map>
        </div>
      </div>
    </div>

    <div class="container mt-3">
      <h2 class="text-center mb-4">Latest Articles</h2>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card">
            <img
              src="images/slider/bleach.png"
              class="card-img-top"
              alt="Article Image"
            />
            <div class="card-body">
              <h5 class="card-title">Bleach - Ichigo Kurosaki</h5>
              <p class="card-text overflow">
                "Ichigo," it's a name that often appears in the context of
                Japanese anime and manga, most notably in the series "Bleach."
                Ichigo Kurosaki is the main protagonist of "Bleach," a character
                known for his distinctive orange hair and his role as a Soul
                Reaper, defending humans from malevolent spirits and guiding
                souls to the afterlife. If you have a specific context or
                reference related to "icihcigo," please provide more details so
                I can offer a more accurate response.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img
              src="images/slider/jjk.png"
              class="card-img-top"
              alt="Article Image"
            />
            <div class="card-body">
              <h5 class="card-title">Jujutsu Kaisen - Yuji Itadori</h5>
              <p class="card-text overflow">
                Yuji Itadori is the main protagonist of the Japanese manga and
                anime series "Jujutsu Kaisen," created by Gege Akutami. Yuji is
                a high school student with impressive physical abilities and a
                natural talent for sports. His life takes a drastic turn when he
                encounters a cursed object containing dangerous supernatural
                powers. To protect his friends and confront the dark forces at
                play, Yuji joins the Jujutsu High, an institution dedicated to
                battling curses and otherworldly threats.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img
              src="images/slider/ds.png"
              class="card-img-top"
              alt="Article Image"
            />
            <div class="card-body">
              <h5 class="card-title">Demon Slayer - Tanjiro Kamado</h5>
              <p class="card-text overflow">
                Tanjiro Kamado is the main protagonist of the Japanese manga and
                anime series "Demon Slayer: Kimetsu no Yaiba," created by
                Koyoharu Gotouge. Tanjiro begins his journey as a young boy
                living with his family in a peaceful mountainside. However,
                tragedy strikes when demons attack his family, leaving only his
                sister, Nezuko, alive but transformed into a demon.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <script src="blog.js"></script>
  </body>
</html>
