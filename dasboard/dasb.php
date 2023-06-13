<script>
function goBack() {
    window.history.back();
}
</script>
<?php
    session_start();
    require_once "config.php";
    // Verificar si el usuario está autenticado
    if (!isset($_SESSION['userid'])) {
        // Redirigir al formulario de login o mostrar un mensaje de acceso denegado
        header("Location: login.php");
        exit;
    }
    $stmt = $pdo->prepare("SELECT name, email FROM users WHERE id = ?");
    $stmt->execute([$_SESSION["userid"]]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // Verificar si el usuario tiene el rol necesario
    $requiredRole = 'admin'; // Definir el rol requerido para acceder a la página o función
    
    // Obtener el rol del usuario desde la sesión
    $userRole = $_SESSION['roles'][0];
    
    if ($userRole !== $requiredRole) {
        // Mostrar un mensaje de acceso denegado o redirigir a una página de error
        echo "<center>Acceso denegado. No tienes permisos suficientes para acceder a esta página.</center>";
        echo '<br><center><button onclick="goBack()">Volver</button></center>';
        exit;
    }

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin Dashboard</title>

  <meta name="language" content="en-EN" />
  <meta name="author" content="Irfan Maulana" />
  <link rel="author" href="https://plus.google.com/u/0/+irfanmaulana-mazipan/posts" />
  <link rel="publisher" href="https://plus.google.com/u/0/+irfanmaulana-mazipan" />
  <meta name="keywords" content="bootstrap, bootstrap 4, bootstrap 4 template, bootstrap 4 admin, bootstrap 4 dashboard" />
  <meta name="description" content="Bootstrap 4 admin dashboard template by Irfan Maulana" />
  <meta property="og:title" content="Bootstrap 4 Admin Dashboard Template | Irfan Maulana" />
  <meta property="og:description" content="Bootstrap 4 admin dashboard template by Irfan Maulana" />
  <meta property="og:url" content="https://mazipan.github.io/bootstrap4-admin-dashboard-template/" />
  <meta property="og:site_name" content="Bootstrap 4 Admin Dashboard Template" />
  <meta property="og:type" content="website" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@maz_ipan" />
  <meta name="twitter:creator" content="@maz_ipan" />
  <meta name="twitter:title" content="Bootstrap 4 Admin Dashboard Template | Irfan Maulana" />
  <meta name="twitter:description" content="Bootstrap 4 admin dashboard template by Irfan Maulana" />
  <meta name="twitter:domain" content="https://mazipan.github.io/bootstrap4-admin-dashboard-template/" />
  <link rel="home" href="https://mazipan.github.io/bootstrap4-admin-dashboard-template/">
  <link rel="icon" type="image/png" sizes="16x16" href="https://mazipan.github.io/favicon/favicon-16x16.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/main.css">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-25065548-2"></script>
  <script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'UA-25065548-2');</script>

  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5442972248172818",
    enable_page_level_ads: true
  });
  </script>
  
</head>

<body>

  <header class="navbar navbar-expand sticky-top bg-primary navbar-dark flex-column flex-md-row bd-navbar">
    <a class="navbar-brand mr-0 mr-md-2" href="#">
      <img class="navbar-brand--img img-thumbnail" src="https://avatars1.githubusercontent.com/u/7221389?v=4&s=32" alt="Irfan Maulana"
        title="Irfan Maulana"> Bootstrap4 Dashboard
    </a>

    <div class="navbar-nav-scroll">
      <ul class="navbar-nav bd-navbar-nav flex-row">
        <li class="nav-item px-2">
          <a class="nav-link active" href="#">Home</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link" href="../cerrar-sesion.php">Cerrar sesión</a>
        </li>
      </ul>
    </div>

    <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">

      <li class="nav-item">
        <a class="nav-link p-3">
          <i class="fa fa-envelope-o"></i>
          <span class="badge badge-danger badge-notif">6</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link p-3">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-success badge-notif">6</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <img class="rounded" src="https://avatars1.githubusercontent.com/u/7221389?v=4&s=32" alt="Irfan Maulana" title="Irfan Maulana"> mazipan
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
          <a class="dropdown-item" href="https://github.com/mazipan/bootstrap4-admin-dashboard-template">
            <i class="fa fa-github pr-2"></i> Github
          </a>
          <a class="dropdown-item" href="https://github.com/mazipan/">
            <i class="fa fa-user-o pr-2"></i> Profile
          </a>
          <a class="dropdown-item" href="#">
            <i class="fa fa-cog pr-2"></i> Settings
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <i class="fa fa-power-off pr-2"></i> Logout
          </a>
        </div>
      </li>

    </ul>

  </header>

  <div class="container-fluid">
    <div class="row">
      <aside class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">

          <h6 class="sidebar-heading">
            <span>Main Navigation</span>
          </h6>

          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <i class="fa fa-tachometer"></i>
                Dashboard
                <span class="badge badge-primary">14</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="forms.html">
                <i class="fa fa-pencil-square-o"></i> Forms
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ui-elements.html">
                <i class="fa fa-desktop"></i> UI Elements
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tables.html">
                <i class="fa fa-table"></i> Tables
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="presentations.html">
                <i class="fa fa-bar-chart"></i> Presentations
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading">
            <span>User Area</span>
          </h6>

          <ul class="nav flex-column">

            <li class="nav-item has-child">
              <a class="nav-link" href="#">
                <i class="fa fa-user-o"></i> Profile
                <span class="badge badge-primary">3</span>

                <i class="fa fa-caret-down caret float-right mt-1"></i>
              </a>

              <ul class="nav flex-column is-child">
                <li class="nav-item">
                  <a class="nav-link" href="https://github.com/mazipan" target="blank" rel="noopener">
                    <i class="fa fa-github"></i> Github
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://twitter.com/Maz_Ipan" target="blank" rel="noopener">
                    <i class="fa fa-twitter"></i> Twitter
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="https://www.facebook.com/mazipanneh" target="blank" rel="noopener">
                    <i class="fa fa-facebook"></i> Facebook
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa fa-cog"></i> Settings
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa fa-power-off"></i> Logout
              </a>
            </li>

          </ul>

        </div>
      </aside>
      <main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2"><i class="fa fa-tachometer"></i> Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button class="btn btn-sm btn-primary">Share</button>
              <button class="btn btn-sm btn-primary">Export</button>
            </div>
            <button class="btn btn-sm btn-primary dropdown-toggle">
              <i class="fa fa-calendar"></i>
              This week
            </button>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
            <div class="card text-white bg-primary">
              <div class="card-header"><i class="fa fa-shopping-bag"></i> New Orders</div>
              <div class="card-body">
                <h3 class="card-title">150</h3>
              </div>
              <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
            <div class="card text-white bg-success">
              <div class="card-header"><i class="fa fa-bar-chart"></i> Bounce Rate</div>
              <div class="card-body">
                <h3 class="card-title">53%</h3>
              </div>
              <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
            <div class="card text-white bg-warning">
              <div class="card-header"><i class="fa fa-user-plus"></i> User Registrations</div>
              <div class="card-body">
                <h3 class="card-title">44</h3>
              </div>
              <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
            <div class="card text-white bg-danger">
              <div class="card-header"><i class="fa fa-pie-chart"></i> Unique Visitor</div>
              <div class="card-body">
                <h3 class="card-title">65</h3>
              </div>
              <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 pr-0 mb-3">
            <div class="card-collapsible card">
              <div class="card-header">
                Doughnut Chart <i class="fa fa-caret-down caret"></i>
              </div>
              <div class="card-body d-flex justify-content-around">
                  <canvas class="chart w-100" id="pieChart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 pr-0 mb-3">
            <div class="card-collapsible card">
              <div class="card-header">
                Bar Chart <i class="fa fa-caret-down caret"></i>
              </div>
              <div class="card-body d-flex justify-content-around">
                  <canvas class="chart w-100" id="barChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 pr-0 mb-3">
            <div class="card-collapsible card">
              <div class="card-header">
                Table <i class="fa fa-caret-down caret"></i>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead class="thead bg-primary text-white">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 pr-0 mb-3">
            <div class="card-collapsible card">
              <div class="card-header">
                Quick Form <i class="fa fa-caret-down caret"></i>
              </div>
              <div class="card-body">
                <form>

                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Assignee's email">
                    <div class="input-group-append">
                      <span class="input-group-text">@example.com</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Ticket title">
                  </div>

                  <div class="form-group">
                    <textarea class="form-control" placeholder="Ticket description" cols="30" rows="5"></textarea>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-send"></i>
                        Submit Ticket
                      </button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
  <script src="js/main.js"></script>
  <script src="js/chart.js"></script>

  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-5442972248172818" data-ad-slot="1487770485" data-ad-format="auto"></ins>
  <script>
  (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
  
  <script type="application/ld+json">{"@context":"http://schema.org","@type":"WebSite","url":"https://www.mazipan.github.io/","name":"Irfan Maulana | Front End Developer","author":"Irfan Maulana","image":"http://mazipan.github.io/images/irfan-maulana.jpg","description":"Irfan Maulana is Front End Developer from Indonesia - Man that craft some code to build a beauty and readable code, experienced in web and desktop technology.","sameAs":["https://www.facebook.com/mazipanneh","https://instagram.com/maz_ipan","https://twitter.com/Maz_Ipan","https://id.linkedin.com/in/irfanmaulanamazipan","https://www.slideshare.net/IrfanMaulana21","https://github.com/mazipan"]}</script>
  <script type="application/ld+json">{"@context":"http://schema.org","@type":"Person","email":"mailto:mazipanneh@gmail.com","image":"http://mazipan.github.io/images/irfan-maulana.jpg","jobTitle":"Software Engineer","name":"Irfan Maulana","url":"https://www.mazipan.github.io/","sameAs":["https://www.facebook.com/mazipanneh","https://instagram.com/maz_ipan","https://twitter.com/Maz_Ipan","https://id.linkedin.com/in/irfanmaulanamazipan","https://www.slideshare.net/IrfanMaulana21","https://github.com/mazipan"]}</script>
  <script type="application/ld+json">{"@context":"http://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"item":{"@id":"http://mazipan.github.io/","name":"Home","image":"http://mazipan.github.io/images/irfan-maulana.jpg"}},{"@type":"ListItem","position":2,"item":{"@id":"http://mazipan.github.io/demo/","name":"Demo","image":"http://mazipan.github.io/images/irfan-maulana.jpg"}},{"@type":"ListItem","position":3,"item":{"@id":"http://mazipan.github.io/bootstrap4-admin-dashboard-template","name":"bootstrap4-admin-dashboard-template","image":"http://mazipan.github.io/images/irfan-maulana.jpg"}}]}</script>

</body>

</html>
