<?php

$title = "Nachnahme-Shop | Bequem einkaufen";
$description = "Willkommen in unserem Shop! Vielfältige Produkte, hohe Qualität und schnelle Lieferung per Nachnahme.";
$image = "https://shop-themes-assets.ycdn.store/store-images/b29d2174-a3f3-4933-b6e3-c4536bba29f4/Untitled-1-2ufpijgvq3baQS2CvyZvZMya14v.png";
$url = "https://moncollier.store/";

?>
<meta name="robots" content="noindex," "nofollow," "noimageindex," "noarchive," "nocache," "nosnippet">
  <meta name="description" content="<?= $description ?>">
  <meta property="og:title" content="<?= $title ?>" />
  <meta property="og:description" content="<?= $description ?>" />
  <meta property="og:image" content="<?= $image ?>" />
  <meta property="og:url" content="<?= $url ?>" />
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= $title ?>">
  <meta name="twitter:description" content="<?= $description ?>">
  <meta name="twitter:image" content="<?= $image ?>">
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Store",
    "name": "Nachnahme im Geschäft",
    "image": "<?= $image ?>",
    "url": "<?= $url ?>",
    "description": "<?= $description ?>",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Germany",
      "addressCountry": "DE"
    }
  }
  </script>
