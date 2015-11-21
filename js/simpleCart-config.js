simpleCart({
checkout: {
type: "PayPal" ,
email: "zackrose-facilitator@gmail.com" ,

// use paypal sandbox, default is false
sandbox: true,

// http method for form, "POST" or "GET", default is "POST"
//method: "GET",

// url to return to on successful checkout, default is null
success: "http://localhost/nekrosite/merch.php" ,

// url to return to on cancelled checkout, default is null
cancel: "http://localhost/nekrosite/cart.php"
},

 cartStyle: "table",
    cartColumns: [
        { attr: "name" , label: "Name" },
        { attr: "size" , label: "Size" },
        { attr: "price" , label: "Price", view: 'currency' } ,
        { view: "decrement" , label: false , text: "-" } ,
        { attr: "quantity" , label: "Qty" } ,
        { view: "increment" , label: false , text: "+" } ,
        { attr: "total" , label: "SubTotal", view: 'currency' } ,
        { view: "remove" , text: "Remove" , label: false }
    ]



});

var shippingRates = {
  Shirt: {USA_1: 5, USA_add: 3, World_1: 12, World_add: 7},
  LP: {USA_1: 6, USA_add: 4, World_1: 15, World_add: 5},
  CD: {USA_1: 3, USA_add: 1, World_1: 10, World_add: 3},
  Patch: {USA_1: 1, USA_add: 1, World_1: 3, World_add: 1},
  Cassette: {USA_1: 3, USA_add: 1, World_1: 10, World_add: 3},
  Seven_Inch: {USA_1: 3, USA_add: 1, World_1: 10, World_add: 3}
}

var shippingLocation = function(){ return getCookie("shippingLocation")};

var getHighestShippingRate = function()
{
  var highestRate=0;
  var highest="";
  $.each(shippingRates, function(i, item)
  {
    if (item[shippingLocation()+"_1"] > highestRate)
    {
      highestRate = item[shippingLocation()+"_1"];
      highest = i;
    }
  });

return highest;
//  console.log("Highest Rate for " + shippingLocation() + ": " + highest +". Amount: "+highestRate);

}

var getCartItems = function()
{
  var cartItems=[];
  simpleCart.each( function( item ){
    cartItems.push( {name:item.get("name"), quantity:item.get("quantity")} );
  });
//console.log(cartItems);
return cartItems;
}

var getItemTypes = function()
{
  var findtype = new RegExp(/\[([^)]+)\]/);
  var cartTypes={Shirt:0, LP:0, CD:0, Patch:0, Cassette:0, Seven_Inch:0};

  //var cartTypes={};

  var cartItems=getCartItems();
  //console.log(cartItems);

var matches;
  $.each(cartItems, function(i, item)
  {
    matches = findtype.exec(item["name"]);
    //console.log(item["name"] + " | " + matches);

    if (matches.length >0);
    {
      for (j = 0; j < item["quantity"]; j++)
      cartTypes[matches[1]]++;
    }
  });

return cartTypes;
  //console.log(cartTypes);
}


simpleCart.shipping(function(){

  itemTypes = getItemTypes();

  var first = shippingLocation() + "_1";
  var additional = shippingLocation() + "_add";


  var total = 0;

  var highestRate = getHighestShippingRate();

//console.log(itemTypes);


  $.each(itemTypes, function(i, item)
  {
    if (simpleCart.quantity() > 1)
    {
      if (i==highestRate)
      {
        total+=shippingRates[i][shippingLocation()+"_1"];
        total+=shippingRates[i][shippingLocation()+"_add"] * (item -1);
      }
      else {
        total+=shippingRates[i][shippingLocation()+"_add"] * item;
      }
    }
    else {
      total=shippingRates[i][shippingLocation()+"_1"] * simpleCart.quantity();
    }

  });

  return total;
});


$(document).ready(function(){
  checkCookie("shippingLocation", "USA");

  $(".debug_action").click(simpleCart.shipping);

  $("#shippingLocation").val(shippingLocation);

  $("#shippingLocation").on("change", function(){
    var newLocation = $("#shippingLocation option:selected").text();
    //console.log("newLocation " + newLocation);
    setCookie("shippingLocation", newLocation, 365);

    $("#simpleCart_shipping").text("$"+simpleCart.shipping().toFixed(2));
    $("#simpleCart_grandTotal").text("$"+simpleCart.grandTotal().toFixed(2));
    //console.log("shippingfunction:" + simpleCart.shipping() );
  //  console.log("grandtotal:" + simpleCart.grandTotal() );
    //console.log("cookie: " + getCookie("shippingLocation"));


//    console.log($("#simpleCart_shipping").text());
  //  console.log($("#simpleCart_grandTotal").text());


  });


});


//COOOKIE STUFF
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

function checkCookie(cookieName, defaultValue) {
    var cookie = getCookie(cookieName);
    if (cookie == "") {
          setCookie(cookieName, defaultValue, 365);
    }
}
