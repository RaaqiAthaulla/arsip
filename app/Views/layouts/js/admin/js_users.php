<script>
    show();

    $(document).ready(function() {
        var table = $('#tableUsers').DataTable();

        // Select Row
        $('#tableUsers tbody').on("click", "tr", function() {
            $(this).toggleClass("selected").siblings().removeClass();
            return;
        });

        // Show Edit Modal
        $('#btnEdit').click(function() {
            var id = table.row(".selected").id();

            if (id == null) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please, select row first!'
                });
            } else {
                showEditModal(id);
            }

            return;
        })
    });

    /**
     * Reload Table
     * @param
     * @return
     */
    function refresh() {
        var table = $("#tableUsers").DataTable();
        // table.clear();
        table.ajax.reload();
        return;
    }

    /**
     * Show Table
     * @param
     * @return
     */
    function show() {
        var table = $('#tableUsers').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            destroy: true,
            rowId: 'id',
            order: [0, 'asc'],
            ajax: {
                url: "http://localhost/ArsipAPI/users/getAll.php",
                dataType: "JSON",
                type: "GET",
                deferRender: true,
                dataSrc: "",
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'kode_guru'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'email'
                },
                {
                    data: 'status_asn',
                    render: function (data) {
                        if (data == 1) {
                            return "ASN"
                        } else if (data == 2) {
                            return "BUKAN ASN"
                        }
                    }
                },
                {
                    data: 'username'
                },
                {
                    data: 'password'
                },
                {
                    data: 'status_aktif',
                    render: function(data) {
                        if (data == 1) {
                            return "<button type='button' class='btn btn-success'></button>";
                        } else {
                            return "<button type='button' class='btn btn-danger'></button>";
                        }
                    }
                }
            ]
        });
    }

    /**
     * Show Edit User Modal
     * @param id
     * @return
     */
    function showEditModal(id) {
        $.ajax({
            url: "http://localhost/ArsipAPI/users/get.php?id=" + id,
            dataType: "JSON",
            type: "GET",
            success: function(data) {
                $('#editId').val(data.id);
                $('#editKodeGuru').val(data.kode_guru);
                $('#editNama').val(data.nama);
                $('#editEmail').val(data.email);
                $('#editStatus_asn').val(data.status_asn);
                $('#editUsername').val(data.username);
                $('#editPassword').val(data.password);
                $('#status_aktif').val(data.status_aktif);
                if (data.status_aktif == 0) {
                    document.getElementById('status_aktif').setAttribute('checked', true);
                } else {
                    document.getElementById('status_aktif').removeAttribute('checked');
                }

                $("#editUser").modal("show");
                // console.log(data)
            }
        });

        return;
    }

    /**
     * Edit User
     * @param
     * @return
     */
    function edit() {
        var statusAktif;
        if ($('#status_aktif').is(':checked')) {
            statusAktif = 0;
        } else {
            statusAktif = 1;
        }
        var kodeGuru = $('#editKodeGuru').val();
        console.log(kodeGuru);

        var data = {
            'id': $('#editId').val(),
            'kode_guru': kodeGuru,
            'email': $('#editEmail').val(),
            'status_asn': $('#editStatus_asn').val(),
            'password': $('#editPassword').val(),
            'status_aktif': statusAktif,
        };
        var dataJson = JSON.stringify(data);
        console.log(data)
        $.ajax({
            url: "http://localhost/ArsipAPI/users/put.php",
            contentType: "application/json; charset=utf-8",
            dataType: "JSON",
            type: "put",
            data: dataJson,
            success: function(data) {
                refresh();
                $("#formEdit").trigger("reset");
                $("#editUser").modal("hide");
            }
        });

        return;
    }

    /**
     * Insert New User
     * @param
     * @return
     */
    function insert() {
        // Set Up Date
        const d = new Date()
        let monthFormat;
        let day = d.getDate();
        let year = d.getFullYear();
        let month = d.getMonth() + 1;

        if (month < 10) {
            monthFormat = "0" + month;
        } else {
            monthFormat = month;
        }

        var tanggal = new String();
        tanggal = year + "-" + monthFormat + "-" + day;
        tanggal = tanggal.toString();
        // End Set Up Date

        var data = {
            'kode_guru': $('#kodeGuru').val(),
            'nama': $('#nama').val(),
            'email': $('#email').val(),
            'status_asn': $('#statusASN').val(),
            'username': $('#username').val(),
            'password': $('#password').val(),
            'status_aktif': 1,
            'role': $('#role').val(),
            'created_date': tanggal,
            'last_login': '0000-00-00 00:00:00',
        };

        if (data.kode_guru == "" || data.username == "" || data.password == "" || data.nama == "" || data.email == "" || data.status_asn == "" || data.role == "") {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Gagal!',
                text: 'Field tidak boleh kosong!',
                showConfirmButton: false,
                timer: 1500
            });
        } else {
            var dataJson = JSON.stringify(data);

            $.ajax({
                url: "http://localhost/ArsipAPI/users/post.php",
                contentType: "application/json; charset=utf-8",
                dataType: "JSON",
                type: "POST",
                data: dataJson,
                success: function(data) {
                    if (data.result) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        refresh();
                        $("#formAdd").trigger("reset");
                        $("#addModal").modal("hide");
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Gagal!',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });

            return;
        }
    }

    function logout(id) {
        // Datetime
        var today = new Date();
        var day = today.getDate() + "";
        var month = (today.getMonth() + 1) + "";
        var year = today.getFullYear() + "";
        var hour = today.getHours() + "";
        var minutes = today.getMinutes() + "";
        var seconds = today.getSeconds() + "";

        day = checkZero(day);
        month = checkZero(month);
        year = checkZero(year);
        hour = checkZero(hour);
        minutes = checkZero(minutes);
        seconds = checkZero(seconds);


        function checkZero(data) {
            if (data.length == 1) {
                data = "0" + data;
            }
            return data;
        }

        last_login = year + "-" + month + "-" + day + " " + hour + ":" + minutes + ":" + seconds;
        // End Datetime

        var data = {
            "id": id,
            "last_login": last_login
        }
        var dataJson = JSON.stringify(data);

        $.ajax({
            url: "http://localhost/ArsipAPI/users/logout.php",
            contentType: "application/json; charset=utf-8",
            dataType: "JSON",
            type: "PUT",
            data: dataJson,
            success: function(data) {
                console.log("Berhasil dongg . . .");
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'See you!',
                    showConfirmButton: false,
                    timer: 5000
                });
                window.location.href = "/logout";
            }
        });

        return;
    }
</script>