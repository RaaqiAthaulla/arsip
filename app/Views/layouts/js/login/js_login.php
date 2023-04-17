    <script>
    $(document).ready(function() {
        console.log("Script Included");
    });

    function login() {

        var username = $('#username').val();
        var password = $('#password').val();

        if (username == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Field Username wajib diisi!',
                showConfirmButton: false,
                timer: 1500
            });
        } else if (password == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Field password wajib diisi!',
                showConfirmButton: false,
                timer: 1500
            });
        } else {
            $.ajax({
                url: 'http://localhost/ArsipAPI/users/login.php?username=' + username + '&password=' + password,
                dataType: "JSON",
                type: "GET",
                // deferRender: true,
                // dataSrc: "",
                success: function(data) {
                    if (data.result) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 5000
                        });
                        
                        window.location.href = "/login/" + data.id + "/" + data.username + "/" + data.role;
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Gagal!',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 5000
                        });
                    }
                },
            })
        }
    }
</script>