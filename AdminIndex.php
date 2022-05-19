<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/indexstyle.css">
  <title>Bio & Health</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link
          href="https://fonts.googleapis.com/css2?family=Alegreya&family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap"
          rel="stylesheet">
  <link href="htxxtps://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap"
        rel="stylesheet">
  <link href="http://fonts.cdnfonts.com/css/sensei" rel="stylesheet">
  <link rel="stylesheet" href="CSS/navbar.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
  <script src="JS/navbar.js"></script>
</head>

<body onload="UpdateDropdown('1')" class="d-flex flex-column min-vh-100">

<?php include "AdminNavbar.php"; ?>


<div class="container-fluid border main text-center">
  <div class="row">
    <div class="row justify-content-center" id="carouselrow">
      <div class="col-8 carouselCol">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                    class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                    aria-label="Slide 5"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <a href="#firstlink">
                <img src="https://picsum.photos/1920/720" class="d-block w-100" alt="...">
              </a>
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <a href="#secondlink">
                <img src="https://picsum.photos/1920/720" class="d-block w-100" alt="...">
              </a>
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <a href="#thirdlink">
                <img src="https://picsum.photos/1920/720" class="d-block w-100" alt="...">
              </a>
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <a href="#fourthlink">
                <img src="https://picsum.photos/1920/720" class="d-block w-100" alt="...">
              </a>
              <div class="carousel-caption d-none d-md-block">
                <h5>Fourth slide label</h5>
                <p>Some representative placeholder content for the fourth slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <a href="#fifthlink">
                <img src="https://picsum.photos/1920/720" class="d-block w-100" alt="...">
              </a>
              <div class="carousel-caption d-none d-md-block">
                <h5>Fifth slide label</h5>
                <p>Some representative placeholder content for the fifth slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>

    <section>
      <div class="row justify-content-center">
        <div class="col-8 mt-5 categories">
          <h1 class="navbar-logo-1 pb-5">Take a look at our products</h1>
          <div>
            <div class="d-flex justify-content-around">
              <div>
                <a href="UserSearch.php">
                  <img class="img-responsive rounded" src="sources/images/dairy_index_image.png" style="width: 250px;height: 250px" alt="Product Name">
                  <h5 class="caption" style="color: #212529">Dairy</h5>
                </a>
              </div>
              <div>
                <a href="UserSearch.php">
                  <img class="img-responsive rounded" src="sources/images/vegan_index_image.png" style="width: 250px;height: 250px" alt="Product Name">
                  <h5 class="caption" style="color: #212529">Vegan</h5>
                </a>
              </div>
              <div>
                <a href="UserSearch.php">
                  <img class="img-responsive rounded" src="sources/images/fruits_index_image.png" style="width: 250px;height: 250px" alt="Product Name">
                  <h5 class="caption" style="color: #212529">Fruits</h5>
                </a>
              </div>
            </div>
            <div class="mt-5">
              <div class="d-flex justify-content-around">
                <div>
                  <a href="UserSearch.php">
                    <img class="img-responsive rounded" src="sources/images/vegetables_index_image.png" style="width: 250px;height: 250px" alt="Product Name">
                    <h5 class="caption" style="color: #212529">Vegetables</h5>
                  </a>
                </div>
                <div>
                  <a href="UserSearch.php">
                    <img class="img-responsive rounded" src="sources/images/sugar_free_index_image.png" style="width: 250px;height: 250px" alt="Product Name">
                    <h5 class="caption" style="color: #212529">Sugar free</h5>
                  </a>
                </div>
                <div>
                  <a href="UserSearch.php">
                    <img class="img-responsive rounded" src="sources/images/gluten_free_free_index_image.png" style="width: 250px;height: 250px" alt="Product Name">
                    <h5 class="caption" style="color: #212529">Gluten free</h5>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <div class="row justify-content-center" id="firstRowAfterCarousel">
      <div class="col-4">
        <a href="UserSearch.php">
          <figure class="figure">
            <img src="https://picsum.photos/3000/2500" class="img-fluid rounded mx-auto d-block"
                 alt="Responsive image">
            <figcaption class="figcaption text-center text-dark">
              <h5>Offers</h5>
            </figcaption>
          </figure>
        </a>
      </div>
      <div class="col-4">
        <a href="UserSearch.php">
          <figure class="figure">
            <img src="https://picsum.photos/1920/720" class="img-fluid rounded mx-auto d-block"
                 alt="Responsive image">
            <figcaption class="figcaption text-center text-dark">
              <h5>New Products</h5>
            </figcaption>
          </figure>
        </a>
        <a href="UserMoreInfo.php">
          <figure class="figure">
            <img src="https://picsum.photos/1920/720" class="img-fluid rounded mx-auto d-block"
                 alt="Responsive image">
            <figcaption class="figcaption text-center text-dark">
              <h5>Useful Information</h5>
            </figcaption>
          </figure>
        </a>
      </div>
    </div>
  </div>
</div>

<?php include "AdminFooter.php"; ?>

</body>

</html>