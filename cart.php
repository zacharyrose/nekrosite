<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Nekrofilth - Shopping Cart</title>
        <meta name="description" content="Nekrofilth" />
        <meta name="author" content="Zack Rose" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/dropit.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/simplecart.css" />

        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/dropit.js"></script>
        <script src="js/simpleCart.js"></script>
        <script src="js/simpleCart-config.js"></script>
</head>
<body>


<main>

<?php include("header.php"); ?>

        <section class="primary">
                <article>
                        <header>
                                <h1>Shopping Cart</h1>
                        </header>

                        <div class="simpleCart_items"></div>

                        <div class="nekrocart">
                          <h2>
                            SubTotal: <span id="simpleCart_total" class="simpleCart_total"></span> <br />
                            Ship To: <select id="shippingLocation"> <option>USA</option><option>World</option> </select>
                            Shipping: <span id="simpleCart_shipping" class="simpleCart_shipping"></span> <br />
                            <hr />
                            Grand Total: <span id="simpleCart_grandTotal" class="simpleCart_grandTotal"></span> <br />
                          </h2>

                          <h2><a href="javascript:;" class="simpleCart_checkout greenlink">Checkout with PayPal</a></h2>
                        </div>

                        <a class="greenlink debug_action" href="javascript:;">Debug Button</a>
                </article>
        </section>

        <footer>
        <p>&copy; Nekrofilth 2015</p>
        </footer>

</main>

</body>
</html>
