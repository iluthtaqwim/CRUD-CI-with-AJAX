<div id="body" class="card-body">
    <div class="container mt-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm mb-2 text-center" data-toggle="modal" data-target="#modelIds">
            Add Data
        </button>
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
                            <button type="button" id="<?php echo $murid->id_siswa; ?>" class=" btn btn-primary btn-sm btn_siswa" data-toggle="modal" data-target="#modelEdits">
                                Edit Data
                            </button>
                            <a href="<?php echo site_url('siswa/delete/' . $murid->id_siswa); ?>"><span class="fa fa-trash"></span>
                                <button type="button" class="btn btn-danger btn-sm">Delete

                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- TAble Kelas -->

    <hr>
    <br>
    <h2 class="text-center">Tabel Kelas</h2>

    <button class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#modelAddKelas" id="btnAddKls" type="submit">Add Data</button>
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
                        <button type="button" id="<?php echo $kls->id_kelas; ?>" class=" btn btn-primary btn-sm btn_kelas" data-toggle="modal" data-target="#modelEditKelas">
                            Edit Data
                        </button>
                        <a href="<?php echo site_url('siswa/deleteKelas/' . $kls->id_kelas); ?>"><span class="fa fa-trash"></span>
                            <button type="button" class="btn btn-danger btn-sm">Delete

                            </button>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="modelIds" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url() . 'index.php/siswa/create'; ?>" method="post">
                        <div class="form-group">
                            <label for="">NIS</label>
                            <input type="text" pattern="^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$" class="form-control" name="nis" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">tgl_lahir</label>
                            <input type="date" class="form-control" name="tgl" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">alamat</label>
                            <input type="text" class="form-control" name="alamat" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" name="pass" id="pass" aria-describedby="helpId" placeholder="">
                            <span id="error_pasword" class="text-danger"></span>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal edit -->
    <div class="modal fade" id="modelEdits" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" id="siswa_form">
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


                </div>
                <div class="modal-footer">
                    <input type="hidden" name="action" id="action" value="insert" />
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Save</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="modelAddKelas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url() . 'index.php/siswa/addKelas'; ?>" method="post">
                        <div class="form-group">
                            <label for="">Tingkat</label>
                            <input type="number" class="form-control" name="tingkat" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Ruang</label>
                            <input type="text" class="form-control" name="ruang" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Siswa</label>
                            <input type="number" class="form-control" name="jml" aria-describedby="helpId" placeholder="">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Kelas -->

    <div class="modal fade" id="modelEditKelas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="kelas_form" method="post">
                        <div class="form-group">
                            <label for="">Tingkat</label>
                            <input type="number" class="form-control" id="tingkat" name="tingkat" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Ruang</label>
                            <input type="text" class="form-control" id="ruang" name="ruang" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Siswa</label>
                            <input type="number" class="form-control" id="jml" name="jml" aria-describedby="helpId" placeholder="">
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="action_kls" id="action_kls" value="insert" />
                    <input type="hidden" name="hidden_id_kls" id="hidden_id_kls" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {


        $('#table').DataTable();

        $('#tbl_kelas').DataTable();

        $('#siswa_form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: '<?php echo base_url('index.php/siswa/update_siswa') ?>',
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
        });

        $(document).on('click', '.btn_siswa', function() {
            var id = $(this).attr('id');
            var action = 'fetch_single';
            $.ajax({
                url: "<?php echo base_url('index.php/siswa/update') ?>",
                method: "POST",
                data: {
                    id: id,
                    action: action,
                },
                dataType: "json",
                success: function(data) {
                    $('#nama').val(data.nama);
                    $('#alamat').val(data.alamat);
                    $('#tgl').val(data.tgl_lahir);
                    $('#nis').val(data.nis);
                    $('#password').val(data.password);
                    $('#action').val('update');
                    $('#hidden_id').val(id);
                    $('#form_action').val('Update');

                    if (data.status == true) {
                        window.location.assign(data.lokasi);
                    } else {
                        $("#infolog").html(data.msg);
                    }
                }
            });

        });


        $('#kelas_form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: '<?php echo base_url('index.php/siswa/updateKls') ?>',
                dataType: 'json',
                method: "POST",
                data: form_data,
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
        })

        $(document).on('click', '.btn_kelas', function() {
            var id_kls = $(this).attr('id');
            var action_kls = 'fetch';
            $.ajax({
                url: "<?php echo base_url('index.php/siswa/updateKelas') ?>",
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


                    $('#action_kls').val('update');
                    $('#hidden_id_kls').val(data.id_kelas);
                    $('#form_action_kls').val('Update');
                    $('#modelKls').dialog('open');


                    if (data.status == true) {

                        window.location.assign(data.lokasi);
                    } else {
                        $("#infolog").html(data.msg);
                    }
                }
            });

        });


    });
</script>