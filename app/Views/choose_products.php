<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="https://paylite.co.id/assets/img/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

  <title>Signin Paylite Account</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

  <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body>
  <div class="container" style="
display: flex;
justify-content: center;
align-items: center;
height: 100vh;">
    <div class="row">
      <div class="col">
      </div>
      <div class="col">
        <div id="listProduk" class="row" style="margin-top:20px;"></div>
        <div id="listRole" class="row" style="margin-top:20px;"></div>
        <div id="listProgram" class="row" style="margin-top:20px;"></div>
      </div>
      <div class="col">
      </div>
    </div>
  </div>
  <script>
    const user_idCookie = '<?= $_COOKIE["user_id"]; ?>';
    $("#listRole").html("");
    $("#listProgram").html("");
    // Make a GET request to an API endpoint
    fetch('https://api.paylite.co.id/produkPaylite')
    .then(response => {
        if (!response.ok) {
        throw new Error('Network response was not ok');
        }
        return response.json(); // Parse the response body as JSON
    })
    .then(data => {
        // Handle the JSON data
        let option = '';
        console.log(data.data);
        for (const item of data.data) {
            option += `<div>
            <div class="col-md-4"></div>
            <div class="col-md-4" style="display: flex;justify-content: center;">
                <a href="#" onclick="getPayliteProdukId('`+item.paylite_produk_id+`')" class="btn btn-success"
                style="background-color:#00afe4;border-color:#00afe4;color:white;"><i class="fab fa-google"></i>`+item.paylite_produk_name+`</a>

            </div>
            <div class="col-md-4"></div>
          </div>`
            console.log(item.paylite_produk_name); // Do something with each item
        }
        $("#listProduk").html(option);
        // You can perform actions with the data here
    })
    .catch(error => {
        console.error('Fetch error:', error);
        // Handle errors here
    });
    function getPayliteProdukId(idProduk){
        if(idProduk==1){

            console.log("cek");
            // Data yang akan dikirim dalam permintaan POST
            const postData = {
                user_id: user_idCookie,
                paylite_produk_id: idProduk,
            };

            // Objek opsi untuk konfigurasi permintaan
            console.log(postData);
            const requestOptions = {
            method: 'POST', // Metode permintaan
            headers: {
                'Content-Type': 'application/json', // Jenis konten yang dikirim
                // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN' // Header otorisasi jika diperlukan
            },
            body: JSON.stringify(postData) // Mengubah data menjadi bentuk JSON
            };
            fetch('https://api.paylite.co.id/subscriberWhere',requestOptions)
            .then(response => {
                if (!response.ok) {
                throw new Error('Network response was not ok');
                }
                return response.json(); // Parse the response body as JSON
            })
            .then(data => {
                // Handle the JSON data
                console.log(data.data.length);
                let stat = data.data.length;
                if(stat > 0){
                    // set satatus
                    <?php
                    $cookieName = "statusProduk";
                    $cookieValue = "registered";
                    $cookieExpiration = time() + (60 * 60 * 24); // Contoh: kadaluarsa setelah 24 jam
                    $cookiePath = "/";
                    $cookieDomain = ".paylite.co.id";

                    echo "document.cookie = '$cookieName=$cookieValue; expires=$cookieExpiration; path=$cookiePath; domain=$cookieDomain';";
                    ?>
                    // redirect
                    getRole(idProduk);
                }else{
                    // register subscriber
                    getRole(idProduk);
                }

            })
            .catch(error => {
                console.error('Fetch error:', error);
                // Handle errors here
            });

        }else{

            // console.log(idProduk);
            alert("Comming Soon!");
        }
    }
    function getRole(idProduk){
        if(idProduk == 1){
            // Redirect ke halaman tujuan
            window.location.href = "https://edu.paylite.co.id/register";
        }
    }
  </script>
</body>

</html>