<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>

    </script>
    <title>Sekolah</title>
</head>


<body>
    <div class="container mt-5">
        <div class="row  my-auto ">
            <div class="col-md-12 h-100">
                <div class="card mx-auto  border-primary" style="width:20rem">
                    <div class="card-header">
                        <h1 class="text-center card-title">Login</h1>
                        <p id="infolog"></p>
                    </div>
                    <div class="card-body">
                        <form action="#" id="login" method="post">
                            <div class="form-group">
                                <label for="">Nomor Induk Siswa</label>
                                <input type="number" class="form-control" name="nis" id="nis" aria-describedby="helpId" placeholder="">
                                <span id="error_nis" class="form-text text-muted"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="">
                                <span id="error_password" class="form-text text-muted"></span>
                            </div>
                            <input type="submit" class="btn btn-primary" name="masuk" value="Masuk">
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

<script>
    $(document).ready(function() {

        $('#login').on('submit', function(event) {
            event.preventDefault();
            var error_nis = '';
            var error_pass = ''

            if ($('#nis').val() == '') {
                error_nis = "NIS tidak boleh kosong";
                $('#error_nis').text(error_nis);
                $('#nis').css('border-color', '#cc0000');
            } else {
                error_nis = '';
                $('#error_nis').text(error_nis);
                $('#nis').css('border-color', '');
            }

            if ($('#password').val() == '') {
                err_pass = 'Password tidak boleh kosong';
                $('#error_password').text(err_pass);
                $('#password').css('border-color', '#cc0000');
            } else {
                err_pass = '';
                $('#error_password').text(err_pass);
                $('#password').css('border-color', '');
            }

            if (error_nis == '' && error_pass == '') {
                var input_nis = $('[name="nis"]').val();
                var input_pass = $('[name="password"]').val();

                $.ajax({
                    url: '<?php echo base_url('index.php/auth/login') ?>',
                    type: "post",
                    dataType: "JSON",
                    data: {
                        nis: input_nis,
                        password: input_pass
                    },
                    success: function(data) {
                        if (data.status == true) {
                            window.location.assign(data.lokasi);
                        } else {
                            $("#infolog").html(data.msg);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('controller Error');
                    }
                });


            } else {
                console.log('ada yang salah');
            }

        });


    })
</script>

</html>