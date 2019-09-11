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
  <meta property="product:retailer_item_id" content="<?php echo_param_or_default("retailer_item_id", "id_1"); ?>">
  <meta property="og:url" content="<?php echo "https://test-pixel-catalog.herokuapp.com".$_SERVER['REQUEST_URI']; ?>">
  <meta property="og:title" content="<?php echo_param_or_default("title", "some product"); ?>">
  <meta property="og:description" content="<?php echo_param_or_default("description", "some description"); ?>">
  <meta property="og:image" content="<?php echo_param_or_default("image_url", "https://example.org/image.jpg"); ?>">
  <meta property="og:site_name" content="Mukul's test catalog">
  <meta property="product:brand" content="<?php echo_param_or_default("brand", "some brand"); ?>">
  <meta property="product:gender" content="<?php echo_param_or_default("gender", "unisex"); ?>">
  <meta property="product:category" content="<?php echo_param_or_default("category", "Tech Supplies"); ?>">
  <meta property="product:availability" content="<?php echo_param_or_default("availability", "in stock"); ?>">
  <meta property="product:inventory" content="<?php echo_param_or_default("inventory",50); ?>">
  <meta property="product:condition" content="<?php echo_param_or_default("condition", "new"); ?>">
  <meta property="product:price:amount" content="<?php echo_param_or_default("price_amount", "99"); ?>">
  <meta property="product:price:currency" content="<?php echo_param_or_default("price_currency", "GBP"); ?>">
  <meta property="product:custom_label_1" content="<?php echo_param_or_default("retailer_item_id", "flag_1"); ?>">
  <meta property="product:custom_label_0" content="<?php echo_param_or_default("retailer_item_id", "flag_0"); ?>">
  <!-- End Open Graph Metadata -->
</head>
<body>
  <ul>
      <script>
  for(let metaTag of document.getElementsByTagName("meta")){
    let li = document.createElement('li');
    li.innerHTML =  metaTag.getAttribute('property') + ": " + metaTag.getAttribute('content');
    document.body.appendChild(li);
  };
</script>
  </ul>
</body>
</html>
