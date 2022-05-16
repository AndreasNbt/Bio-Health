<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Info - Bio & Health</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
        <link href="http://fonts.cdnfonts.com/css/sensei" rel="stylesheet">
        <link rel="stylesheet" href="CSS/navbar.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="CSS/cartpage.css">
        <script src="JS/cartpage.js"></script>
        <script src="JS/navbar.js"></script>
    </head>
    <body onload="UpdateDropdown(localStorage.getItem('signed_in_status'))" class="d-flex flex-column min-vh-100">
        
        <?php include "UserNavbar.php"; ?>
        <br>

        <section id="product-info">
            <div class="container-fluid d-flex flex-row justify-content-between left-right-only-pad" style="height:100%">

                <div class="col col-sm-5">
                    <img src="sources/images/pic1.png" alt="Εικόνα προϊόντος"
                         title="Βιολογικό μέλι κουμπαριάς" style="width:100%">
                    <div>
                        <img src="sources/images/v.png" style="width:10%">
                    </div>
                </div>
                
                <div class="col col-sm-6 d-flex flex-column justify-content-center">
                    <div class="d-flex flex-column" >
                        <h5> Green Village - Βιολογικό μέλι κουμπαριάς </h5>
                        <p>Weight: <span id="weight">420gr</span><br>
                        Price: <span id="price">5.00</span> &euro; <br>
                        Stock: <span id="stock" style="color:green">Available</span>
                    </div>

                    <div class="d-flex justify-content-between light-green p-2">
                        <button class="add-btn light-green">Add to Cart</button>
                        <div class="d-flex">
                            <a class="nav-item nav-link nav-icon text-center dark-gray" href="#"><i class="fa-solid fa-cart-shopping fa-2x"></i></a>
                            <a class="nav-item nav-link nav-icon text-center dark-gray" href="#"><i class="fa-solid fa-heart fa-2x"></i></a>
                        </div> 
                    </div>

                    <div class="mt-5"> 
                        <ul class="nav nav-tabs" id="myTab" >
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-bs-toggle="tab">Description</a>
                            </li>
                                <!--
                                <li class="nav-item">
                                    <a href="#ingredients" class="nav-link" data-bs-toggle="tab">Ingredients</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#nutritional" class="nav-link" data-bs-toggle="tab">Nutritional table </a>
                                </li>
                                -->
                        </ul>
                        <div class="tab-content" style="border-top:2px solid green">
                            <div class="tab-pane fade show active" id="description">
                                    
                                <p style="text-align:justify">Η κουμαριά είναι από τα ελάχιστα φυτά τα οποία έχουν ταυτόχρονα άνθη, 
                                        μπουμπούκια, άγουρους και ώριμους καρπούς.
                                </p>
                                <p style="text-align:justify">
                                        Το μέλι κουμαριάς λόγω του χαμηλού ποσοστού γλυκόζης και φρουκτόζης, 
                                        περιέχει τις λιγότερες θερμίδες και έτσι μπορεί να καταναλωθεί 
                                        από άτομα που έχουν διαβήτη τύπου Β. Επίσης, μπορεί να 
                                        χρησιμοποιηθεί και σε περιπτώσεις δίαιτας αλλά πάντα χρειάζεται 
                                        η συμβουλή του γιατρού.
                                        Το μέλι κουμαριάς περιέχει την ουσία Arbutin, η οποία καθαρίζει 
                                        το αίμα και ρυθμίζει το επίπεδο της χοληστερίνης.
                                        Είναι πλούσιο σε ιχνοστοιχεία και βιταμίνες, αποτελώντας 
                                        έτσι μία από τις καλύτερες επιλογές για την τόνωση του οργανισμού 
                                        καθώς οι φυσικές αντιβιοτικές ουσίες που περιέχει το καθιστούν 
                                        ασπίδα προστασίας από διάφορες ασθένειες.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include "UserFooter.php"; ?>
    
        
    </body>
</html>