<!doctype html>
<html lang="br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="<?= SIS_AUTOR ?>">
  <link rel="icon" href="<?= SIS_URL ?>src/Assets/IMG/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="<?= SIS_URL ?>src/Assets/JS/bootstrap-4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= SIS_URL ?>src/Assets/JS/desfontawesome-free-5.7.1/css/all.min.css">
  <link rel="stylesheet" href="<?= SIS_URL ?>src/Assets/JS/Datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= SIS_URL ?>src/Assets/CSS/sidebar.css">
  <link rel="stylesheet" href="<?= SIS_URL ?>src/Assets/CSS/style-padrao.css?t=<?= time() ?>">
  <script src="https://kit.fontawesome.com/17f44d4100.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= SIS_URL ?>src/Assets/CSS/style.css?t=<?= time() ?>">
  <link rel="stylesheet" href="<?= SIS_URL ?>src/Assets/CSS/select2/select2.min.css">

  <title><?= $pagina_titulo ?></title>

</head>

<body>

  <div class="d-flex toggled" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading text-center">
        <a href="<?= SIS_URL ?>" title="Painel"><img class="mb-4" src="<?= SIS_URL ?>src/assets/img/logo.png" alt="Agrodanieli" style=" max-width: 185px;"></a>
      </div>

      <!-- <div class="list-group list-group-flush">
        <a href="<?= SIS_URL ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-chart-line"></i> Dashboard</a>
      </div> -->
      <div class="list-group list-group-flush">
        <a href="<?= SIS_URL_LISCLI ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user-plus"></i> Clientes</a>
      </div>
      <div class="list-group list-group-flush">
        <a href="<?= SIS_URL_LISOS ?>" class="list-group-item list-group-item-action bg-light"><i class="fas fa-file-alt"></i> Ordem Serviço</a>
      </div>
    </div>
    <!-- Sidebar -->


    <div id="page-content-wrapper">
      <!-- topo -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="nav-left">
          <button class="btn btn-default" id="menu-toggle" data-toggle="tooltip" data-placement="top" title="Expandir Menu"><i class="fas fa-th"></i></button>
          <span class="span-usuario">Olá, <?= utf8_encode($usuario) ?>.</span>
        </div>



        <div class="nav-center">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item ">
                <!-- <a class="nav-link" role="button">
                            <?= SIS_TITULO ?>
                          </a> -->
              </li>

            </ul>
          </div>
        </div>


        <div class="nav-right">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <!-- <li class="nav-item ">
                          <a class="nav-link" role="button">
                            <?= SIS_TITULO ?>
                          </a>
                        </li> -->
              <li class="nav-item ">
                <a class="nav-link" role="button" href="src/Components/bd/sair.php">
                  <i class="fas fa-sign-out-alt"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- topo -->