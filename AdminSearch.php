<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Search Results - Bio & Health</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
  <link href="http://fonts.cdnfonts.com/css/sensei" rel="stylesheet">
  <link rel="stylesheet" href="CSS/navbar.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="CSS/searchpage.css">
  <script src="JS/adminsearchpage.js"></script>
  <script src="JS/navbar.js"></script>
</head>
<body onload="UpdateDropdown('1')" class="grey-background d-flex flex-column min-vh-100">

  <?php include "AdminNavbar.php"; ?>
  <br>

  <div class="container-fluid left-right-pad">
    <div class="row pb-3 pt-2">
      <div class="col-auto d-flex align-items-end">
        <h5>Showing projects currently in database:</h5>
      </div>

      <div class="col">
        <div class="row float-end">
          <div class="col-auto">
            <label class="filter-sort-label">Show only:</label>
            <select class="form-select">
              <option value="/">Show all</option>
              <option value="/">Dairy</option>
              <option value="/">Vegan</option>
              <option value="/">No salt</option>
            </select>
          </div>

          <div class="col-auto">
            <label class="filter-sort-label">Sort by:</label>
            <select class="form-select">
              <option value="/">Featured</option>
              <option value="/">Popular</option>
              <option value="/">Price ascending</option>
              <option value="/">Price descending</option>
              <option value="/">Stock ascending</option>
              <option value="/">Stock descending</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <!-- container with all the products' images -->
    <div id="products" class="grid-justify-content-evenly">
      <div id="product1" class="container-fluid" style="padding: 0">

        <!-- link and image -->
        <a href="AdminEditProduct.php">
          <img class="img-responsive rounded" src="https://picsum.photos/250" style="width: 200px;height: 250px" alt="Product Name">
        </a>

        <!-- description and price -->
        <div class="row">
          <div class="col-auto">
            <a href="AdminEditProduct.php" style="font-size: 14px">Product Name<br/>(5 left in stock)</a>
          </div>
          <div class="col text-end pt-3">
            <p class="product-info" style="font-size: 14px">5.00€</p>
          </div>
        </div>

        <!-- categories and cart button -->
        <div class="row" style="padding-left: 0.75rem; padding-right: 0">
          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1f5014" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col float-end">
            <div class="row">
              <div class="edit-container">
                <a href="AdminEditProduct.php"><button type="button" class="btn btn-outline-primary btn-lg float-end">Edit</button></a>
                <button type="button" class="btn btn-outline-danger float-end in-search" data-bs-toggle="modal" data-bs-target="#deleteProduct1">Delete</button>
                <div class="modal fade" id="deleteProduct1">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h3 class="modal-title" style="padding-left: 1.5rem">Delete "Product Name" from the database?</h3>
                        <button type="button" style="padding-right: 1.5rem" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body">
                        <div class="container-fluid">
                          <div class="row">
                            <p style="margin: 0">Are you sure you want to delete the product "Prodect Name" from the database? It's data will be lost forever.</p>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success text-lg" data-bs-dismiss="modal" onclick="deleteProduct(1)">Delete</button>
                        <button type="button" class="btn btn-outline-danger text-lg" data-bs-dismiss="modal">Cancel</button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              </div>
          </div>
        </div>
      </div>

      <div id="product2" class="container-fluid" style="padding: 0">

        <!-- link and image -->
        <a href="AdminEditProduct.php">
          <img class="img-responsive rounded" src="https://picsum.photos/250" style="width: 200px;height: 250px" alt="Product Name">
        </a>

        <!-- description and price -->
        <div class="row">
          <div class="col-auto">
            <a href="AdminEditProduct.php" style="font-size: 14px">Product Name<br/>(5 left in stock)</a>
          </div>
          <div class="col text-end pt-3">
            <p class="product-info" style="font-size: 14px">5.00€</p>
          </div>
        </div>

        <!-- categories and cart button -->
        <div class="row" style="padding-left: 0.75rem; padding-right: 0">
          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1f5014" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col float-end">
            <div class="row">
              <div class="edit-container">
                <a href="AdminEditProduct.php"><button type="button" class="btn btn-outline-primary btn-lg float-end">Edit</button></a>
                <button type="button" class="btn btn-outline-danger float-end in-search" data-bs-toggle="modal" data-bs-target="#deleteProduct2">Delete</button>
                <div class="modal fade" id="deleteProduct2">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h3 class="modal-title" style="padding-left: 1.5rem">Delete "Product Name" from the database?</h3>
                        <button type="button" style="padding-right: 1.5rem" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body">
                        <div class="container-fluid">
                          <div class="row">
                            <p style="margin: 0">Are you sure you want to delete the product "Prodect Name" from the database? It's data will be lost forever.</p>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success text-lg" data-bs-dismiss="modal" onclick="deleteProduct(2)">Delete</button>
                        <button type="button" class="btn btn-outline-danger text-lg" data-bs-dismiss="modal">Cancel</button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="product3" class="container-fluid" style="padding: 0">

        <!-- link and image -->
        <a href="AdminEditProduct.php">
          <img class="img-responsive rounded" src="https://picsum.photos/250" style="width: 200px;height: 250px" alt="Product Name">
        </a>

        <!-- description and price -->
        <div class="row">
          <div class="col-auto">
            <a href="AdminEditProduct.php" style="font-size: 14px">Product Name<br/>(5 left in stock)</a>
          </div>
          <div class="col text-end pt-3">
            <p class="product-info" style="font-size: 14px">5.00€</p>
          </div>
        </div>

        <!-- categories and cart button -->
        <div class="row" style="padding-left: 0.75rem; padding-right: 0">
          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1f5014" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col float-end">
            <div class="row">
              <div class="edit-container">
                <a href="AdminEditProduct.php"><button type="button" class="btn btn-outline-primary btn-lg float-end">Edit</button></a>
                <button type="button" class="btn btn-outline-danger float-end in-search" data-bs-toggle="modal" data-bs-target="#deleteProduct3">Delete</button>
                <div class="modal fade" id="deleteProduct3">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h3 class="modal-title" style="padding-left: 1.5rem">Delete "Product Name" from the database?</h3>
                        <button type="button" style="padding-right: 1.5rem" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body">
                        <div class="container-fluid">
                          <div class="row">
                            <p style="margin: 0">Are you sure you want to delete the product "Prodect Name" from the database? It's data will be lost forever.</p>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success text-lg" data-bs-dismiss="modal" onclick="deleteProduct(3)">Delete</button>
                        <button type="button" class="btn btn-outline-danger text-lg" data-bs-dismiss="modal">Cancel</button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="product4" class="container-fluid" style="padding: 0">

        <!-- link and image -->
        <a href="AdminEditProduct.php">
          <img class="img-responsive rounded" src="https://picsum.photos/250" style="width: 200px;height: 250px" alt="Product Name">
        </a>

        <!-- description and price -->
        <div class="row">
          <div class="col-auto">
            <a href="AdminEditProduct.php" style="font-size: 14px">Product Name<br/>(5 left in stock)</a>
          </div>
          <div class="col text-end pt-3">
            <p class="product-info" style="font-size: 14px">5.00€</p>
          </div>
        </div>

        <!-- categories and cart button -->
        <div class="row" style="padding-left: 0.75rem; padding-right: 0">
          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1f5014" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col float-end">
            <div class="row">
              <div class="edit-container">
                <a href="AdminEditProduct.php"><button type="button" class="btn btn-outline-primary btn-lg float-end">Edit</button></a>
                <button type="button" class="btn btn-outline-danger float-end in-search" data-bs-toggle="modal" data-bs-target="#deleteProduct4">Delete</button>
                <div class="modal fade" id="deleteProduct4">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h3 class="modal-title" style="padding-left: 1.5rem">Delete "Product Name" from the database?</h3>
                        <button type="button" style="padding-right: 1.5rem" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body">
                        <div class="container-fluid">
                          <div class="row">
                            <p style="margin: 0">Are you sure you want to delete the product "Prodect Name" from the database? It's data will be lost forever.</p>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success text-lg" data-bs-dismiss="modal" onclick="deleteProduct(4)">Delete</button>
                        <button type="button" class="btn btn-outline-danger text-lg" data-bs-dismiss="modal">Cancel</button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="product5" class="container-fluid" style="padding: 0">

        <!-- link and image -->
        <a href="AdminEditProduct.php">
          <img class="img-responsive rounded" src="https://picsum.photos/250" style="width: 200px;height: 250px" alt="Product Name">
        </a>

        <!-- description and price -->
        <div class="row">
          <div class="col-auto">
            <a href="AdminEditProduct.php" style="font-size: 14px">Product Name<br/>(5 left in stock)</a>
          </div>
          <div class="col text-end pt-3">
            <p class="product-info" style="font-size: 14px">5.00€</p>
          </div>
        </div>

        <!-- categories and cart button -->
        <div class="row" style="padding-left: 0.75rem; padding-right: 0">
          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1f5014" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col float-end">
            <div class="row">
              <div class="edit-container">
                <a href="AdminEditProduct.php"><button type="button" class="btn btn-outline-primary btn-lg float-end">Edit</button></a>
                <button type="button" class="btn btn-outline-danger float-end in-search" data-bs-toggle="modal" data-bs-target="#deleteProduct5">Delete</button>
                <div class="modal fade" id="deleteProduct5">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h3 class="modal-title" style="padding-left: 1.5rem">Delete "Product Name" from the database?</h3>
                        <button type="button" style="padding-right: 1.5rem" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body">
                        <div class="container-fluid">
                          <div class="row">
                            <p style="margin: 0">Are you sure you want to delete the product "Prodect Name" from the database? It's data will be lost forever.</p>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success text-lg" data-bs-dismiss="modal" onclick="deleteProduct(5)">Delete</button>
                        <button type="button" class="btn btn-outline-danger text-lg" data-bs-dismiss="modal">Cancel</button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="product6" class="container-fluid" style="padding: 0">

        <!-- link and image -->
        <a href="AdminEditProduct.php">
          <img class="img-responsive rounded" src="https://picsum.photos/250" style="width: 200px;height: 250px" alt="Product Name">
        </a>

        <!-- description and price -->
        <div class="row">
          <div class="col-auto">
            <a href="AdminEditProduct.php" style="font-size: 14px">Product Name<br/>(5 left in stock)</a>
          </div>
          <div class="col text-end pt-3">
            <p class="product-info" style="font-size: 14px">5.00€</p>
          </div>
        </div>

        <!-- categories and cart button -->
        <div class="row" style="padding-left: 0.75rem; padding-right: 0">
          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1f5014" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col float-end">
            <div class="row">
              <div class="edit-container">
                <a href="AdminEditProduct.php"><button type="button" class="btn btn-outline-primary btn-lg float-end">Edit</button></a>
                <button type="button" class="btn btn-outline-danger float-end in-search" data-bs-toggle="modal" data-bs-target="#deleteProduct6">Delete</button>
                <div class="modal fade" id="deleteProduct6">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h3 class="modal-title" style="padding-left: 1.5rem">Delete "Product Name" from the database?</h3>
                        <button type="button" style="padding-right: 1.5rem" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body">
                        <div class="container-fluid">
                          <div class="row">
                            <p style="margin: 0">Are you sure you want to delete the product "Prodect Name" from the database? It's data will be lost forever.</p>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success text-lg" data-bs-dismiss="modal" onclick="deleteProduct(6)">Delete</button>
                        <button type="button" class="btn btn-outline-danger text-lg" data-bs-dismiss="modal">Cancel</button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="product7" class="container-fluid" style="padding: 0">

        <!-- link and image -->
        <a href="AdminEditProduct.php">
          <img class="img-responsive rounded" src="https://picsum.photos/250" style="width: 200px;height: 250px" alt="Product Name">
        </a>

        <!-- description and price -->
        <div class="row">
          <div class="col-auto">
            <a href="AdminEditProduct.php" style="font-size: 14px">Product Name<br/>(5 left in stock)</a>
          </div>
          <div class="col text-end pt-3">
            <p class="product-info" style="font-size: 14px">5.00€</p>
          </div>
        </div>

        <!-- categories and cart button -->
        <div class="row" style="padding-left: 0.75rem; padding-right: 0">
          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1f5014" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col float-end">
            <div class="row">
              <div class="edit-container">
                <a href="AdminEditProduct.php"><button type="button" class="btn btn-outline-primary btn-lg float-end">Edit</button></a>
                <button type="button" class="btn btn-outline-danger float-end in-search" data-bs-toggle="modal" data-bs-target="#deleteProduct7">Delete</button>
                <div class="modal fade" id="deleteProduct7">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h3 class="modal-title" style="padding-left: 1.5rem">Delete "Product Name" from the database?</h3>
                        <button type="button" style="padding-right: 1.5rem" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body">
                        <div class="container-fluid">
                          <div class="row">
                            <p style="margin: 0">Are you sure you want to delete the product "Prodect Name" from the database? It's data will be lost forever.</p>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success text-lg" data-bs-dismiss="modal" onclick="deleteProduct(7)">Delete</button>
                        <button type="button" class="btn btn-outline-danger text-lg" data-bs-dismiss="modal">Cancel</button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="product8" class="container-fluid" style="padding: 0">

        <!-- link and image -->
        <a href="AdminEditProduct.php">
          <img class="img-responsive rounded" src="https://picsum.photos/250" style="width: 200px;height: 250px" alt="Product Name">
        </a>

        <!-- description and price -->
        <div class="row">
          <div class="col-auto">
            <a href="AdminEditProduct.php" style="font-size: 14px">Product Name<br/>(5 left in stock)</a>
          </div>
          <div class="col text-end pt-3">
            <p class="product-info" style="font-size: 14px">5.00€</p>
          </div>
        </div>

        <!-- categories and cart button -->
        <div class="row" style="padding-left: 0.75rem; padding-right: 0">
          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1f5014" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col float-end">
            <div class="row">
              <div class="edit-container">
                <a href="AdminEditProduct.php"><button type="button" class="btn btn-outline-primary btn-lg float-end">Edit</button></a>
                <button type="button" class="btn btn-outline-danger float-end in-search" data-bs-toggle="modal" data-bs-target="#deleteProduct8">Delete</button>
                <div class="modal fade" id="deleteProduct8">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h3 class="modal-title" style="padding-left: 1.5rem">Delete "Product Name" from the database?</h3>
                        <button type="button" style="padding-right: 1.5rem" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body">
                        <div class="container-fluid">
                          <div class="row">
                            <p style="margin: 0">Are you sure you want to delete the product "Prodect Name" from the database? It's data will be lost forever.</p>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success text-lg" data-bs-dismiss="modal" onclick="deleteProduct(8)">Delete</button>
                        <button type="button" class="btn btn-outline-danger text-lg" data-bs-dismiss="modal">Cancel</button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="product9" class="container-fluid" style="padding: 0">

        <!-- link and image -->
        <a href="AdminEditProduct.php">
          <img class="img-responsive rounded" src="https://picsum.photos/250" style="width: 200px;height: 250px" alt="Product Name">
        </a>

        <!-- description and price -->
        <div class="row">
          <div class="col-auto">
            <a href="AdminEditProduct.php" style="font-size: 14px">Product Name<br/>(5 left in stock)</a>
          </div>
          <div class="col text-end pt-3">
            <p class="product-info" style="font-size: 14px">5.00€</p>
          </div>
        </div>

        <!-- categories and cart button -->
        <div class="row" style="padding-left: 0.75rem; padding-right: 0">
          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#1f5014" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col-auto" style="padding-left: 0;padding-right: 0.25rem">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
          </div>

          <div class="col float-end">
            <div class="row">
              <div class="edit-container">
                <a href="AdminEditProduct.php"><button type="button" class="btn btn-outline-primary btn-lg float-end">Edit</button></a>
                <button type="button" class="btn btn-outline-danger float-end in-search" data-bs-toggle="modal" data-bs-target="#deleteProduct9">Delete</button>
                <div class="modal fade" id="deleteProduct9">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h3 class="modal-title" style="padding-left: 1.5rem">Delete "Product Name" from the database?</h3>
                        <button type="button" style="padding-right: 1.5rem" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body">
                        <div class="container-fluid">
                          <div class="row">
                            <p style="margin: 0">Are you sure you want to delete the product "Prodect Name" from the database? It's data will be lost forever.</p>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success text-lg" data-bs-dismiss="modal" onclick="deleteProduct(9)">Delete</button>
                        <button type="button" class="btn btn-outline-danger text-lg" data-bs-dismiss="modal">Cancel</button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "AdminFooter.php"; ?>


</body>
</html>