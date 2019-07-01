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
  <meta id="title" property="og:title" content="<?php echo_param_or_default("title", "some product"); ?>">
  <meta property="og:url" content="<?php echo "https://test-pixel-catalog.herokuapp.com".$_SERVER['REQUEST_URI']; ?>">
  <meta property="og:description" content="<?php echo_param_or_default("description", "some description"); ?>">
  <meta property="og:image" content="<?php echo_param_or_default("image_url", "https://example.org/image.jpg"); ?>">
  <meta property="og:site_name" content="Mukul's test catalog">
  <meta property="product:brand" content="<?php echo_param_or_default("title", "some product"); ?>">
  <meta property="product:category" content="<?php echo_param_or_default("category", "Tech Supplies"); ?>">
  <meta property="product:availability" content="<?php echo_param_or_default("availability", "in stock"); ?>">
  <meta id="inventory" property="product:inventory" content="<?php echo_param_or_default("inventory",50); ?>">
  <meta property="product:condition" content="<?php echo_param_or_default("condition", "new"); ?>">
  <meta id="amount"  property="product:price:amount" content="<?php echo_param_or_default("price_amount", "99"); ?>">
  <meta id="currency"  property="product:price:currency" content="<?php echo_param_or_default("price_currency", "GBP"); ?>">
  <meta id="prod_id" property="product:retailer_item_id" content="<?php echo_param_or_default("retailer_item_id", "id_1"); ?>">
  <!-- End Open Graph Metadata -->

</head>
<body>
  <h1>
      <script> document.getElementById('title').getAttribute('content') </script>
  </h1>
  <ul>
      <script>
  for(let metaTag of document.getElementsByTagName("meta")){
    let li = document.createElement('li');
    li.innerHTML =  metaTag.getAttribute('property') + ": " + metaTag.getAttribute('content');
    document.body.appendChild(li);

  };
</script>
  </ul>
  <button type="button" id="addToCartButton">Test add to cart!</button>
  <button type="button" id="purchaseButton">Test purchase!</button>


  <script>
  const prodId = document.getElementById('prod_id').getAttribute('content');
    fbq('track', 'ViewContent', {
      content_type: 'product',
      content_id: prodId

    });

    document.getElementById('addToCartButton').addEventListener('click', function(e) {
      e.preventDefault();
      const prodId = document.getElementById('prod_id').getAttribute('content');
      console.log("add to cart");
      fbq('track', 'AddToCart', {
        content_type: 'product',
        content_id: prodId
      });
}, false);
document.getElementById('purchaseButton').addEventListener('click', function(e) {
  e.preventDefault();
  const val = document.getElementById('amount').getAttribute('content');
  const cur = document.getElementById('currency').getAttribute('content');
  const prodId = document.getElementById('prod_id').getAttribute('content');
  console.log("purchase");
  fbq('track','Purchase', {
    content_type: 'product',
    value: val,
    currency: cur,
    content_id: prodId

  });
}, false);
  </script>
  <div itemscope itemtype="">
     <div itemscope itemtype="http://schema.org/Product">
       <span itemprop="name"><?php echo_param_or_default("title", "some product"); ?></span>
       <span itemprop="description"><?php echo_param_or_default("description", "some description"); ?></span>
       <span itemprop="brand"><?php echo_param_or_default("brand", "some brand"); ?></span>
       <span itemprop="category"><?php echo_param_or_default("category", "Tech Supplies"); ?></span>
       <span itemprop="productID"><?php echo_param_or_default("retailer_item_id", "id_1"); ?></span>
       <a itemprop="url" href="<?php echo "https://test-pixel-catalog.herokuapp.com".$_SERVER['REQUEST_URI']; ?>">url</a>
       <a itemprop="image" href="<?php echo_param_or_default("image_url", "https://example.org/image.jpg"); ?>">image</a>
       <div itemscope itemtype="http://schema.org/Offer">
         <link itemprop="itemCondition" href="http://schema.org/NewCondition" />
         <link itemprop="availability" href="http://schema.org/InStock" />
         <meta itemprop="inventoryLevel" content="<?php echo_param_or_default("inventory", "50"); ?>">
         <meta itemprop="price" content="<?php echo_param_or_default("price_amount", "99"); ?>">
         <meta itemprop="priceCurrency" content="<?php echo_param_or_default("price_currency", "GBP"); ?>">
       </div>
     </div>
   </div>
</body>
</html>
