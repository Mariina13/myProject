<?php
$UrlAccueil = $this->generateUrl("Accueil");
$UrlconnectMe   = $this->generateUrl("connectMe");
$Urladminis   = $this->generateUrl("adminis");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyProject</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo $urlAccueil ?>assets/css/utilisateurs.css"/>
</head>
<body>
  <header>
    <h1>Marina DAGUET - Développeuse Web Fullstack Junuior</h1>
  
  </header>
</body>
</html>