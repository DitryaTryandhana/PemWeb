# script 1
<script>
        $(document).ready(function(){
            $(".bg-loader").hide();
        })
    </script>
# script 2
 <script>
        $(document).ready(function(){
            $(".bg-loader").hide();
            
            $("#loginForm").on('submit', function(e) {
                e.preventDefault();
                
                $.ajax({
                    type: "POST",
                    url: "auth/login.php",
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Logging in...',
                            text: 'Please wait',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Login successful!',
                                text: 'Welcome to BELIFT LAB'
                            }).then(() => {
                                window.location.href = 'indexhome.html';
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Login failed!',
                                text: response.message
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong. Please try again.'
                        });
                    }
                });
            });
        });
    </script>   
#seluruh dokumen html diberi code javascript diatas agar bisa dijalankan sesuai dengan keinginan kita kecuali(Script 2 cuman berada di diindex.html saja)
