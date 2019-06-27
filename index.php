<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Custom function for pixel event customization -->
   <?php
     function echo_param_or_default($param_name, $default_value) {
         if (isset($_GET[$param_name])) {
           $value = (string)$_GET[$param_name];
         } else {
           $value = $default_value;
         }
         echo htmlSpecialChars($value);
     }
   ?>
  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1654970187968359');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1654970187968359&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->


    <!-- Open Graph Metadata -->
  <meta property="og:type" r="website">
  <meta property="og:title" content="<?php echo_param_or_default("title", "some title"); ?>">
  <meta property="og:url" content="<?php echo "https://test-pixel-catalog.herokuapp.com/".$_SERVER['REQUEST_URI']; ?>">
  <meta property="og:description" content="<?php echo_param_or_default("description", "some description"); ?>">
  <meta property="og:image" content="<?php echo_param_or_default("image_url", "https://example.org/image.jpg"); ?>">
  <meta property="og:site_name" content="Mukul's test catalog">
  <meta property="product:brand" content="<?php echo_param_or_default("brand", "Foo Brand"); ?>">
  <meta property="product:category" content="<?php echo_param_or_default("category", "Tech Supplies"); ?>">
  <meta property="product:availability" content="<?php echo_param_or_default("availability", "in stock"); ?>">
  <meta property="product:condition" content="<?php echo_param_or_default("condition", "new"); ?>">
  <meta id="amount" property="product:price:amount" content="<?php echo_param_or_default("price_amount", "99"); ?>">
  <meta id="currency" property="product:price:currency" content="<?php echo_param_or_default("price_currency", "GBP"); ?>">
  <meta property="product:retailer_item_id" content="<?php echo_param_or_default("retailer_item_id", "id_1"); ?>">
  <!-- End Open Graph Metadata -->

</head>
<body>
  <h1> Hello World! </h1>
  <button type="button" id="addToCartButton">Test add to cart!</button>
  <button type="button" id="purchaseButton">Test purchase!</button>


  <script>
    fbq('track', 'ViewContent', {
      content_type: 'product',
    });

    document.getElementById('addToCartButton').addEventListener('click', function(e) {
      e.preventDefault();
      console.log("add to cart");
      fbq('track', 'AddToCart', {
        content_type: 'product',
      });
}, false);
document.getElementById('purchaseButton').addEventListener('click', function(e) {
  e.preventDefault();
  const val = document.getElementById('amount').getAttribute('content');
  const cur = document.getElementById('currency').getAttribute('content');
  console.log("purchase");
  fbq('track','Purchase', {
    content_type: 'product',
    value: val,
    currency: cur

  });
}, false);
  </script>
</body>
</html>
