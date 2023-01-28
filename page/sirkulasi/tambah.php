<?php 
  require "../../config.php";
  $tampilNamaBuku = $conn->query("SELECT * FROM buku ORDER BY id_buku") or die(mysqli_error($conn));

  $tampilNamaAnggota = $conn->query("SELECT *FROM anggota ORDER BY id_anggota") or die(mysqli_error($conn));

  $tgl_pinjam = date('d-m-Y');
  $tujuh_hari = mktime(0,0,0, date('n'), date('j') + 7, date('Y'));
  $kembali = date('d-m-Y', $tujuh_hari);

  if(isset($_POST['tambah'])){
    $tgl_pinjam = htmlspecialchars($_POST['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($_POST['tgl_kembali']);

    $nama_buku = $_POST['buku'];
    $pecahB = explode(".", $nama_buku);
    $id = $pecahB[0];
    $judul = $pecahB[1];

    $nama_anggota = $_POST['nama'];
    $pecahN = explode(".", $nama_anggota);
    $nim = $pecahN[0];
    $nama = $pecahN[1];

    $sql = $conn->query("SELECT * FROM buku WHERE judul_buku = '$judul'") or die(mysqli_error($conn));
    while($data = $sql->fetch_assoc()){
      $sisa = $data['jumlah_buku'];

      if($sisa == 0){
        echo "<script>
        alert('Stok Buku Habis, Transaksi tidak dapat dilakukan, silahkan tambah stok buku dulu.');
        document.location.href = '../page/buku/tambah.php';
        </script>";
      }else{
        $conn->query("INSERT INTO transaksi VALUES(null, '$id', '$nim', '$nim', '$tgl_pinjam', '$tgl_kembali', 'pinjam' )") or die(mysqli_error($conn));
        $conn->query("UPDATE buku SET jumlah_buku = (jumlah_buku-1) WHERE id_buku = '$id'") or die(mysqli_error($conn));
        echo "<script>
        alert('Data Peminjaman Telah Ditambahkan.');
        document.location.href = 'sirkulasi.php';        
        </script>";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tambah Peminjaman</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="../../assets/img/letter-z.png" alt="">
        <span class="d-none d-lg-block">Admin Perpus</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Alghofur</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Alghofur</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="../../index.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="page/buku/buku.php">
              <i class="bi bi-circle"></i><span>Buku</span>
            </a>
          </li>
          <li>
            <a href="page/anggota/anggota.php">
              <i class="bi bi-circle"></i><span>Siswa</span>
            </a>
          </li>
        </ul>
      </li><!-- End Data Master Nav -->

    <li class="nav-item">
      <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Sirkulasi</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="sirkulasi.php" class="active">
            <i class="bi bi-circle"></i><span>Peminjaman</span>
          </a>
        </li>
      </ul>
    </li><!-- End Sirkulasi Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="data_admin.php">
      <i class="bi bi-person-vcard-fill"></i>
      <span>Admin</span>
    </a>
  </li><!-- End Admin Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="../logout.php">
      <i class="bi bi-box-arrow-right"></i>
      <span>Logout</span>
    </a>
  </li><!-- End Admin Page Nav -->

</ul>

</aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Master</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
          <li class="breadcrumb-item">Sirkulasi</li>
          <li class="breadcrumb-item"><a href="Sirkulasi.php">Peminjaman</a></li>
          <li class="breadcrumb-item active">Tambah Peminjaman</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="card-header mb-5">
        <form action="" method="post">
            <div class="form-group">
                <label for="nama_buku" class="small mb-1">Buku</label>
                <select name="buku" id="nama_buku" class="form-control">
                    <option value="">-- Pilih Buku --</option>
                    <?php 
                        while($pecahBuku = $tampilNamaBuku->fetch_assoc()){
                            echo "<option value = '$pecahBuku[id_buku].$pecahBuku[judul_buku]'>$pecahBuku[judul_buku]</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_anggota" class="small mb-1">Nama</label>
                <select name="nama" id="nama_anggota" class="form-control">
                    <option value="">-- Pilih Anggota --</option>
                    <?php 
                        while ($pecahAnggota = $tampilNamaAnggota->fetch_assoc()) {
                            echo "<option value='$pecahAnggota[id_anggota].$pecahAnggota[nama_anggota]'>$pecahAnggota[nim].$pecahAnggota[nama_anggota]</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly value="<?= $tgl_pinjam ?>">
            </div>
            <div class="form-group">
                <label for="tgl_kembali">Tanggal Kembali</label>
                <input type="text" name="tgl_kembali" id="tgl_pinjam" class="form-control" readonly value="<?= $kembali ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
            </div>
        </form>
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>AdminPerpus</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="#">Alghofur</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>