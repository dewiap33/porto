<?php
function get_CURL($url){

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);
  
  return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&key=AIzaSyCQOlwi_1xlLBJK1FeHrWHuw8VUVpKWDO4&id=UCroS8cTyIpGnlPQmFk7lRjQ');

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$chennelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

//latest vidio
$urlLatestVidio = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyCQOlwi_1xlLBJK1FeHrWHuw8VUVpKWDO4&channelId=UCroS8cTyIpGnlPQmFk7lRjQ&maxResults=1&order=date&part=snippet';
$result = get_CURL($urlLatestVidio);
$latestVidioId = $result['items'][0]['id']['videoId'];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Dewi Apriliyanti | Portfolio</title>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">DEWI APRILIYANTI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#social">Social Media</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/profile1.png" class="rounded-circle img-thumbnail">
          <h1 class="display-4">Dewi Apriliyanti</h1>
          <h3 class="lead">Mahasiswa Teknik Elektro | Data Analyst Enthusiast</h3>
        </div>
      </div>
    </div>

    <!-- About Section -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <h5>Education</h5>
            <p><strong>Universitas Tidar Magelang</strong><br>S1 Teknik Elektro (GPA: 3.25/4.00) 2021-Present</p>
            <p><strong>SMK Telekomunikasi Tunas Harapan, Semarang</strong><br>Teknik Komputer dan Jaringan 2018-2021</p>
          </div>
          <div class="col-md-5">
            <h5>Skills & Interests</h5>
            <ul>
              <li>Skills: Microsoft Office (Excel, PowerPoint) | Python | SQL | HTML | PHP</li>
              <li>Interests: Analytics, Public Speaking, Scientist</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Social Media Section (YouTube & Instagram) -->
    <section class="social bg-light" id="social">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Social Media</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <!-- YouTube Section -->
          <div class="col-md-6 text-center mb-4">
              <h5>Follow Me on YouTube</h5>
              <p>Subscribe for coding tutorials, life hacks, and more!</p>
              <div class="d-flex justify-content-center align-items-center">
                  <img src="<?php echo $youtubeProfilePic; ?>" width="100" class="rounded-circle img-thumbnail me-3">
                  <div>
                      <p class="mb-1 text-center"><strong><?php echo $chennelName; ?></strong></p>
                      <p class="mb-1 text-center"><?php echo $subscriber; ?> subscribers.</p><script src="https://apis.google.com/js/platform.js"></script>
                      <div class="g-ytsubscribe" data-channelid="UCroS8cTyIpGnlPQmFk7lRjQ" data-layout="default" data-theme="dark" data-count="hidden"></div>
                  </div>
              </div>

              <div class="row mt-3 pb-3">
              <div class="col">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVidioId;?>?rel=0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>

          <!-- Instagram Section -->
          <div class="col-md-6 text-center">
            <h5>Follow Me on Instagram</h5>
            <p>Check out my latest adventures and behind the scenes!</p>
            <img src="img/profile1.png" class="rounded-circle img-thumbnail mb-3" width="100" alt="Instagram Profile">
            <a href="https://www.instagram.com/yourprofile" class="btn btn-primary">Follow on Instagram</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Portfolio Section -->
    <section class="portfolio bg-light" id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Portfolio</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/1.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Pembuatan model untuk Penggunaan Sensor Infrared</h5>
                <p class="card-text">Merancang alat menggunakan Sensor Infrared untuk menghitung barang yang ditampilkan di LCD pada Conveyor.</p>
                <a href="https://github.com/dewiap33/Project1.git" class="btn btn-primary">View Project</a>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/2.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Program untuk Mencari Kesamaan Kasus Pasien</h5>
                <p class="card-text">Mendeteksi kesamaan diagnosis pada pasien paru-paru menggunakan metode uji Case Base Reasoning.</p>
                <a href="https://github.com/dewiap33/Project2.git" class="btn btn-primary">View Project</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p>Feel free to reach out for collaborations or queries!</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">Magelang, Indonesia</li>
              <li class="list-group-item">dewiapril403@gmail.com</li>
              <li class="list-group-item">0895322497910</li>
            </ul>
          </div>

          <div class="col-lg-6">
            <form>
              <div class="form-group">
                <label for="nama">Name</label>
                <input type="text" class="form-control" id="nama" placeholder="Your Name">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Your Email">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3" placeholder="Your Message"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2023. Dewi Apriliyanti. All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  </body>
</html>
