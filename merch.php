<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nekrofilth - Merch</title>
    <meta name="description" content="Nekrofilth" />
    <meta name="author" content="Nekrofilth" />
    <meta property="og:image" content="http://nekrofilth.com/images/backgrounds/devilsbreath.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/modal.css" />
    <link rel="stylesheet" href="css/dropit.css" />
    <link rel="stylesheet" href="css/style.css" />

    <script src="js/jquery-2.1.4.js"></script>
    <script src="js/handlebars-v3.0.3.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/sortElements.js"></script>
    <script src="js/dropit.js"></script>
    <script src="js/simpleCart.js"></script>
    <script src="js/simpleCart-config.js"></script>
    <script src="js/merch.js"></script>



    <script id="merch-template" type="text/x-handlebars-template">
    <div class="merchitem simpleCart_shelfItem {{#if is_soldout}}is_soldout{{/if}} type-{{info_type}}" data-id="{{id}}"=>

      <input type="hidden" name="custom" value="My Custom data" class="item_customdataname">

            <div class="merchthumb">
                {{#if thumbnail}}
                <img src="images/merch/{{thumbnail}}" />
                {{else}}
                <img src="images/merch/default_thumb.png" />
                {{/if}}

                {{#if itemdetail}}
                <a class = "itemdetail" href="images/merch/{{itemdetail}}" data-width="{{imagewidth}}" data-height="{{imageheight}}">See Detail</a>
                {{/if}}

            </div>

            <div class = "info">
                    <div class="type bubble">{{info_type}}</div>
                    <div class="title">{{info_title}}</div>
                    <div class="price bubble item_price">{{info_price}}</div>

                    <div class="description">{{info_description}}</div>
                    <div class="item_name" style="display:none;">{{info_title}} [{{info_type}}]</div>

            </div>
            {{#if is_soldout}}
            <div class="soldout bubble">SOLD OUT</div>
            {{else}}
            <div class="soldout">
              {{#if options}}
                {{{splitoptions options}}}
              {{/if}}

              <input type="text" value="1" style="width:30px; text-align:center;" class="item_Quantity" />
              <a class="greenlink item_add" href="javascript:;">Add to Cart</a>
            </div>
            {{/if}}
    </div>
    </script>

</head>
<body>

<main class="merch">
<?php include("header.php"); ?>

        <!-- This section is filled in dynamically -->
        <section class="primary">
            <header>
                    <h1>Nekrofilth Store</h1>
            </header>
        </section>

        <aside class="merchoptions">
            <header>
                <h1>Options</h1>
            </header>

            <a href="#" class="merchfilter merchlink blacklink" data-filter="soldout">Show Sold-Out Items</a><br /><br />

            <h2>Select Only</h2>
            <div><!--div necessary for JS functionality (links must not be siblings of other sections) -->
                <a href="#" class="merchselect merchlink blacklink" data-filter="Seven_Inch">7-inches</a>
                <a href="#" class="merchselect merchlink blacklink" data-filter="LP">LPs</a>
                <a href="#" class="merchselect merchlink blacklink" data-filter="Shirt">Shirts</a>
                <a href="#" class="merchselect merchlink blacklink" data-filter="Patch">Patches</a>
            </div>

            <h2>Toggle</h2>
            <div>
                <a href="#" class="merchfilter merchlink whitelink selected" data-filter="Seven_Inch">7-inches</a>
                <a href="#" class="merchfilter merchlink whitelink selected" data-filter="LP">LPs</a>
                <a href="#" class="merchfilter merchlink whitelink selected" data-filter="Shirt">Shirts</a>
                <a href="#" class="merchfilter merchlink whitelink selected" data-filter="Patch">Patches</a>
            </div>

            <h2>Sort By</h2>
            <div>
                <a href="#" class="merchsort merchlink blacklink" data-sort="Name">Name</a>
                <a href="#" class="merchsort merchlink blacklink" data-sort="Type">Type</a>
                <a href="#" class="merchsort merchlink blacklink" data-sort="Price_Ascend">Price (Low-High)</a>
                <a href="#" class="merchsort merchlink blacklink" data-sort="Price_Descend">Price (High-Low)</a>
            </div>

        </aside>

<footer>
<p>&copy; Nekrofilth 2015</p>
</footer>

</main>
</body>
</html>
