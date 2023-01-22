<?php 
include "../../config.php";

// menangkap id_buku di url
$id_buku = $_GET['id'];

// menampilkan data db sesuai id_buku
global $conn;
$sql = $conn->query("SELECT * FROM buku WHERE id_buku = $id_buku") or die(mysqli_error($conn));
$pecahSql = $sql->fetch_assoc();

$tahun = $pecahSql['tahun_terbit'];

if(isset($_POST['ubah'])) {
	$judul = htmlspecialchars($_POST['judul_buku']);
	$pengarang = htmlspecialchars($_POST['pengarang_buku']);
	$penerbit = htmlspecialchars($_POST['penerbit_buku']);
	$tahun_terbit = htmlspecialchars($_POST['tahun_terbit']);
	$isbn = htmlspecialchars($_POST['isbn']);
	$jumlah = htmlspecialchars($_POST['jumlah_buku']);
	$lokasi = htmlspecialchars($_POST['lokasi']);
	$tgl_input = htmlspecialchars($_POST['tgl_input']);

    if(empty($judul && $pengarang && $penerbit && $tahun_terbit && $isbn && $jumlah && $lokasi && $tgl_input)) {
        echo "
        <script>
        alert('Pastikan anda sudah mengisi semua formulir.');
        
        </script>";
    }

	$sql = $conn->query("UPDATE buku SET judul_buku = '$judul', pengarang_buku = '$pengarang', penerbit_buku = '$penerbit', tahun_terbit = '$tahun_terbit', isbn = '$isbn', jumlah_buku = '$jumlah', lokasi = '$lokasi', tgl_input = '$tgl_input' WHERE id_buku = $id_buku") or die(mysqli_error($conn));
	if($sql) {
		echo "
        <script>alert('Data Berhasil Diubah.');
        document.location.href = 'buku.php';
        ;</script>";
	} else {
		echo "<script>alert('Data Gagal Diubah.');
        document.location.href = 'buku.php';
        </script>";
	}
}

?>

<div class="card-header mb-5">
	
	
</div>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tambah Buku</title>
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
              <span>Siswa</span>
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
      <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
        <li>
          <a href="buku.php" class="active">
            <i class="bi bi-circle"></i><span>Buku</span>
          </a>
        </li>
        <li>
          <a href="../anggota/anggota.php" >
            <i class="bi bi-circle"></i><span>Siswa</span>
          </a>
        </li>
      </ul>
    </li><!-- End Data Master Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Sirkulasi</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="peminjaman.php">
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
          <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
          <li class="breadcrumb-item">Data Master</li>
          <li class="breadcrumb-item"><a href="buku.php">Buku</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="card-header mb-5">
        <form action="" method="post">
            <div class="form-group">
                <label class="small mb-1" for="judul_buku">Judul Buku</label>
                <input class="form-control" id="judul_buku" name="judul_buku" type="text" placeholder="Masukan judul buku" value="<?= $pecahSql['judul_buku']; ?>" />
            </div>
            <div class="form-group">
                <label class="small mb-1" for="pengarang_buku">Pengarang</label>
                <input class="form-control" id="pengarang_buku" name="pengarang_buku" type="text" value="<?= $pecahSql['pengarang_buku']; ?>" placeholder="Masukan pengarang buku"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="penerbit_buku">Penerbit</label>
                <input class="form-control" id="penerbit_buku" name="penerbit_buku" type="text" value="<?= $pecahSql['penerbit_buku']; ?>" placeholder="Masukan penerbit buku"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="tahun_terbit">Tahun Terbit</label>
                <select name="tahun_terbit" id="tahun_terbit" class="form-control">
                    <option value="">-- Pilih Tahun --</option>
                    <?php 
                    // menampilkan tahun terbit dari tahun 1991- hingga tahun sekarang
                    $tahun = date('Y');

                    for ($i = $tahun - 29; $i <= $tahun ; $i++) { ?>
                        <option value="<?= $i ?>" <?php if($pecahSql['tahun_terbit'] == $i){echo "selected";} ?> ><?= $i ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="isbn">ISBN</label>
                <input class="form-control" value="<?= $pecahSql['isbn']; ?>" id="isbn" name="isbn" type="text" placeholder="Masukan isbn buku"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="jumlah_buku">Jumlah Buku</label>
                <input class="form-control" value="<?= $pecahSql['jumlah_buku']; ?>" id="jumlah_buku" name="jumlah_buku" type="number" placeholder="Masukan jumlah buku"/>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <select name="lokasi" id="lokasi" class="form-control">
                    <option value="">-- Pilih Rak --</option>
                    <option value="Rak 1" <?php if($pecahSql['lokasi'] == 'Rak 1'){echo "selected";} ?> >Rak 1</option>
                    <option value="Rak 2" <?php if($pecahSql['lokasi'] == 'Rak 2'){echo "selected";} ?> >Rak 2</option>
                    <option value="Rak 3" <?php if($pecahSql['lokasi'] == 'Rak 3'){echo "selected";} ?> >Rak 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_input">Tanggal Input</label>
                <input type="date" name="tgl_input" id="tgl_input" class="form-control" value="<?= $pecahSql['tgl_input']; ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="ubah">Ubah Data</button>
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