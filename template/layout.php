<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($data['title'])) echo $data['title']; ?> - Plugo</title>
    <?php if (isset($data['description'])) { ?>
      <meta name="description" content="<?= $data['description'] ?>">
    <?php } ?>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
  </head>
  <body>
    <?php include '_navbar.php' ?>
    <main class="container">
      <?php require $templatePath ?>
    </main>
    <?php include '_footer.php' ?>
  </body>
</html>