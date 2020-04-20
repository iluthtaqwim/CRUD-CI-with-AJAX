<div id="body" class="card-body">
    <div class="container mt-3">
        <button class="btn btn-primary btn-sm mb-2" id="btn_add" type="submit">Add Data</button>
        <table id="table" class="table">
            <thead>
                <tr>
                    <th>nis</th>
                    <th>nama</th>
                    <th>tanggal lahir</th>
                    <th>alamat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($siswa as $murid) : ?>
                    <tr>
                        <td scope="row"><?php echo $murid->nis; ?></td>
                        <td scope="row"><?php echo $murid->nama; ?></td>
                        <td scope="row"><?php echo $murid->tgl_lahir; ?></td>
                        <td scope="row"><?php echo $murid->alamat; ?></td>
                        <td scope="row">
                            <button type="button" name="edit" class="btn btn-primary btn-xs edit" id="<?php echo $murid->id_siswa; ?> ">Edit</button>
                            <button type="button" name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $murid->id_siswa; ?> ">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

    <hr>
    <br>
    <h2 class="text-center">Tabel Kelas</h2>

    <button class="btn btn-primary btn-sm mb-2" id="btnAddKls" type="submit">Add Data</button>
    <table id="tbl_kelas" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tingkat</th>
                <th>Ruang</th>
                <th>Jumlah Siswa</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($kelas as $kls) : ?>
                <tr>
                    <td scope="row"><?php echo $no++; ?></td>
                    <td><?php echo $kls->tingkat; ?></td>
                    <td><?php echo $kls->ruang; ?></td>
                    <td><?php echo $kls->jumlah_siswa; ?></td>
                    <td scope="row">
                        <button type="button" name="edit_kls" class="btn btn-primary btn-xs edit_kls" id="<?php echo $kls->id_kelas; ?> ">Edit</button>
                        <button type="button" name="delete_kls" class="btn btn-danger btn-xs delete_kls" id="<?php echo $kls->id_kelas; ?> ">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>

<!-- Modal -->

<div id="model" title="Add Data">
    <form method="post" id="user_form">
        <div class="form-group">
            <label for="">NIS</label>
            <input type="text" pattern="^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$" class="form-control" name="nis" id="nis" aria-describedby="helpId" placeholder="">
            <span id="error_nis" class="text-danger"></span>
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
            <span id="error_nama" class="text-danger"></span>
        </div>
        <div class="form-group">
            <label for="">tgl_lahir</label>
            <input type="date" class="form-control" name="tgl" id="tgl" aria-describedby="helpId" placeholder="">
            <span id="error_tgl" class="text-danger"></span>
        </div>
        <div class="form-group">
            <label for="">alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" aria-describedby="helpId" placeholder="">
            <span id="error_alamat" class="text-danger"></span>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="">
            <span id="error_pasword" class="text-danger"></span>
        </div>

        <div class="form-group">
            <input type="hidden" name="action" id="action" value="insert" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="form_action" id="form_action" class="btn btn-info" value="Insert" />
        </div>
    </form>
</div>

<div id="delete_confirmation" title="Confirmation">
    <input type="hidden" name="id_delete">
    <p>Are you sure you want to Delete this data?</p>
</div>

<div id="delete_confirmation_kls" title="Confirmation">
    <input type="hidden" name="id_delete">
    <p>Are you sure you want to Delete this data?</p>
</div>

<!-- Modal Kelas -->
<!-- Modal -->

<div id="modelKls" title="Add Data">
    <form method="post" id="kls_form">
        <div class="form-group">
            <label for="">Tingkat</label>
            <input type="number" class="form-control" name="tingkat" id="tingkat" aria-describedby="helpId" placeholder="">
            <span id="error_tingkat" class="text-danger"></span>
        </div>
        <div class="form-group">
            <label for="">Ruang</label>
            <input type="text" class="form-control" name="ruang" id="ruang" aria-describedby="helpId" placeholder="">
            <span id="error_ruang" class="text-danger"></span>
        </div>
        <div class="form-group">
            <label for="">Jumlah Siswa</label>
            <input type="number" class="form-control" name="jml" id="jml" aria-describedby="helpId" placeholder="">
            <span id="error_jml" class="text-danger"></span>
        </div>

        <div class="form-group">
            <input type="hidden" name="action_kls" id="action_kls" value="insert" />
            <input type="hidden" name="hidden_id_kls" id="hidden_id_kls" />
            <input type="submit" name="form_action_kls" id="form_action_kls" class="btn btn-info" value="Insert" />
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {


        $('#table').DataTable();
        //load_data();

        $("#model").dialog({
            autoOpen: false,

        });

        $('#btn_add').click(function() {
            $('#model').attr('title', 'Add Data');
            $('#action').val('insert');
            $('#form_action').val('Insert');
            $('#user_form')[0].reset();
            $('#form_action').attr('disabled', false);
            $("#model").dialog('open');
        });

        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');
            var action = 'fetch_single';
            $.ajax({
                url: "crud/update",
                method: "POST",
                data: {
                    id: id,
                    action: action
                },
                dataType: "json",
                success: function(data) {
                    $('#nama').val(data.nama);
                    $('#alamat').val(data.alamat);
                    $('#tgl').val(data.tgl_lahir);
                    $('#nis').val(data.nis);
                    $('#password').val(data.password);
                    $('#model').attr('title', 'Edit Data');
                    $('#action').val('update');
                    $('#hidden_id').val(id);
                    $('#form_action').val('Update');
                    $('#model').dialog('open');


                    if (data.status == true) {
                        $('#model').dialog('close');
                        window.location.assign(data.lokasi);
                    } else {
                        $("#infolog").html(data.msg);
                    }
                }
            });
        });

        $('#user_form').on('submit', function(event) {
            event.preventDefault();
            var error_nama = '';
            var error_alamat = '';
            var error_tgl = '';
            var error_nis = '';
            var error_password = '';
            if ($('#nama').val() == '') {
                error_nama = 'Name is required';
                $('#error_nama').text(error_nama);
                $('#nama').css('border-color', '#cc0000');
            } else {
                error_nama = '';
                $('#error_nama').text(error_nama);
                $('#nama').css('border-color', '');
            }
            if ($('#alamat').val() == '') {
                error_alamat = 'Alamat is required';
                $('#error_alamat').text(error_alamat);
                $('#alamat').css('border-color', '#cc0000');
            } else {
                error_alamat = '';
                $('#error_alamat').text(error_alamat);
                $('#alamat').css('border-color', '');
            }
            if ($('#tgl').val() == '') {
                error_tgl = 'Tanggal lahir is required';
                $('#error_tgl').text(error_tgl);
                $('#tgl').css('border-color', '#cc0000');
            } else {
                error_tgl = '';
                $('#error_tgl').text(error_tgl);
                $('#tgl').css('border-color', '');
            }
            if ($('#nis').val() == '') {
                error_nis = 'NIS is required';
                $('#error_nis').text(error_nis);
                $('#nis').css('border-color', '#cc0000');
            } else {
                error_nis = '';
                $('#error_nis').text(error_nis);
                $('#nis').css('border-color', '');
            }
            if ($('#password').val() == '') {
                error_password = 'Password is required';
                $('#error_password').text(error_password);
                $('#password').css('border-color', '#cc0000');
            } else {
                error_password = '';
                $('#error_password').text(error_nis);
                $('#password').css('border-color', '');
            }

            if (error_nama != '' || error_alamat != '' || error_tgl != '' || error_nis != '' || error_password != '') {
                return false;
            } else {

                var form_data = $(this).serialize();
                var fa = $('#form_action').val();
                if (fa == 'Insert') {
                    var af = 'crud/create';
                } else {
                    var af = 'crud/update_siswa';
                }
                $.ajax({
                    url: af,
                    dataType: 'json',
                    method: "POST",
                    data: form_data,
                    success: function(data) {
                        if (data.status == true) {
                            $('#model').dialog('close');
                            window.location.assign(data.lokasi);
                        } else {
                            $("#infolog").html(data.msg);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('controller Error');
                    }
                });
            }

        });


        $(document).on('click', '.delete', function() {
            var id = $(this).attr("id");
            $('[name="id_delete"]').val(id);
            $('#delete_confirmation').data('id_siswa', id).dialog('open');
        });


        $(document).on('click', '.delete_kls', function() {
            var id = $(this).attr("id");
            $('[name="id_delete"]').val(id);
            $('#delete_confirmation_kls').data('id_kelas', id).dialog('open');
        });

        $('#delete_confirmation').dialog({
            autoOpen: false,
            modal: true,
            buttons: {
                Ok: function() {
                    var id = $('[name="id_delete"]').val();

                    var action = 'delete';
                    console.log(id);
                    $.ajax({
                        url: "crud/delete",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            id: id,
                            action: action
                        },
                        success: function(data) {

                            if (data.status == true) {
                                $('#delete_confirmation').dialog('close');
                                window.location.assign(data.lokasi);
                            } else {
                                $("#infolog").html(data.msg);
                            }

                        }
                    });
                },
                Cancel: function() {
                    $(this).dialog('close');
                }
            }
        });

    });
</script>

<!-- Script Kelas -->

<script>
    $(document).ready(function() {

        $('#tbl_kelas').DataTable();

        $('#modelKls').dialog({

            autoOpen: false

        });

        $('#btnAddKls').click(function() {
            $('#modelKls').attr('title', 'Add Data');
            $('#action').val('insert');
            $('#form_action').val('Insert');
            $('#kls_form')[0].reset();
            $('#form_action_kls').attr('disabled', false);
            $("#modelKls").dialog('open');
        });

        $('#kls_form').on('submit', function(event) {
            event.preventDefault();
            var error_tingkat = '';
            var error_ruang = '';
            var error_jml = '';

            if ($('#tingkat').val() == '') {
                error_tingkat = 'Tingkat is required';
                $('#error_tingkat').text(error_tingkat);
                $('#tingkat').css('border-color', '#cc0000');
            } else {
                error_tingkat = '';
                $('#error_tingkat').text(error_tingkat);
                $('#tingkat').css('border-color', '');
            }
            if ($('#ruang').val() == '') {
                error_ruang = 'Ruang is required';
                $('#error_ruang').text(error_ruang);
                $('#ruang').css('border-color', '#cc0000');
            } else {
                error_ruang = '';
                $('#error_ruang').text(error_ruang);
                $('#ruang').css('border-color', '');
            }
            if ($('#jml').val() == '') {
                error_jml = 'Jumlah Siswa is required';
                $('#error_jml').text(error_jml);
                $('#jml').css('border-color', '#cc0000');
            } else {
                error_jml = '';
                $('#error_jml').text(error_jml);
                $('#jml').css('border-color', '');
            }

            if (error_tingkat != '' || error_ruang != '' || error_jml != '') {
                return false;
            } else {

                var form_data = $(this).serialize();
                var fa = $('#form_action_kls').val();
                if (fa == 'Insert') {
                    var af = 'crud/addKls';
                } else {
                    var af = 'crud/updateKls';
                }
                $.ajax({
                    url: af,
                    dataType: 'json',
                    method: "POST",
                    data: form_data,
                    success: function(data) {
                        if (data.status == true) {
                            $('#modelKls').dialog('close');
                            window.location.assign(data.lokasi);
                        } else {
                            $("#infolog").html(data.msg);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('controller Error');
                    }
                });
            }

        });

        $(document).on('click', '.edit_kls', function() {
            var id_kls = $(this).attr('id');
            var action_kls = 'fetch';
            $.ajax({
                url: "<?php echo base_url('index.php/crud/update_kelas') ?>",
                method: "POST",
                data: {
                    id: id_kls,
                    action: action_kls,
                },
                dataType: "json",
                success: function(data) {
                    $('#tingkat').val(data.tingkat);
                    $('#ruang').val(data.ruang);
                    $('#jml').val(data.jumlah_siswa);

                    $('#modelKls').attr('title', 'Edit Data');
                    $('#action_kls').val('update');
                    $('#hidden_id_kls').val(data.id_kelas);
                    $('#form_action_kls').val('Update');
                    $('#modelKls').dialog('open');


                    if (data.status == true) {
                        $('#modelKls').dialog('close');
                        window.location.assign(data.lokasi);
                    } else {
                        $("#infolog").html(data.msg);
                    }
                }
            });
        });

        $('#delete_confirmation_kls').dialog({
            autoOpen: false,
            modal: true,
            buttons: {
                Ok: function() {
                    var id = $('[name="id_delete"]').val();

                    var action = 'delete';
                    console.log(id);
                    $.ajax({
                        url: "crud/deleteKls",
                        method: "POST",
                        dataType: 'json',
                        data: {
                            id: id,
                            action: action
                        },
                        success: function(data) {

                            if (data.status == true) {
                                $('#delete_confirmation').dialog('close');
                                window.location.assign(data.lokasi);
                            } else {
                                $("#infolog").html(data.msg);
                            }

                        }
                    });
                },
                Cancel: function() {
                    $(this).dialog('close');
                }
            }
        });




    });
</script>