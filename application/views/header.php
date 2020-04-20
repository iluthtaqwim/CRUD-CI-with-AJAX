<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js">
    </script>

    <title>Sekolah</title>
</head>


<body>
    <div class="container" id="content">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() . 'index.php/siswa/' ?>">Active tab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() . 'index.php/crud' ?>">Tab</a>
                    </li>
                    <?php

                    if (isset($_SESSION['logged_in'])) {

                        echo '<li class="nav-item">
						<a class="nav-link" href="auth/logout">' . $_SESSION['nis'] . '</a>
					</li>';
                    } else {

                        echo '<li class="nav-item">
						<a class="nav-link" href="">Login/Register</a>
					</li>';
                    }

                    ?>

                </ul>
            </div>