<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body>
    <div class="container" style="margin-top:200px;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <img style="display: flex;justify-content: center;" src="https://paylite.co.id/assets/img/about.png" alt="" width="200">
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row" style="margin-top:20px;">
                  <div class="col-md-4"></div>
                  <a href="<?= $link; ?>" class="btn btn-success col-md-4" style="background-color:#00afe4;border-color:#00afe4;color:white;"><i class="fab fa-google"></i> Masuk dengan Google</a>
                  <div class="col-md-4"></div>
        </div>
    </div>
</body>
</html>