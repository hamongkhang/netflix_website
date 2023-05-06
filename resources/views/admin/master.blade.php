<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <base href=" {{asset('admin/')}} ">

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.3.1.js">
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.bootstrap4.min.css">
    <link rel="stylesheet" href="admin/css/jConfirm.css">
    <link rel="stylesheet" href="admin/css/mystyle.css">
    <link rel="stylesheet" href="admin/css/nice-select.css">
    <link rel="stylesheet" href="admin/css/magic-check.css">


    {{-- CKeditor CKfinder --}}
    <script type="text/javascript" src="admin/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="admin/ckfinder/ckfinder.js"></script>

    {{-- End CKeditor CKfinder --}}
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.admin_layout.menu')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.admin_layout.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    {{-- Đây là main --}}
                    {{-- End Đây là main --}}
                    @yield('content')
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.admin_layout.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->

    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->

    <script src="admin/js/demo/datatables-demo.js"></script>

    {{--Start Upload file --}}
    <script src="admin/js/bs-custom-file-input.js"></script>
    <script src="admin/js/jConfirm.min.js"></script>
    <script src="admin/js/jquery.nice-select.js"></script>

    {{-- End Upload file --}}

    {{-- End Upload file --}}
    <script>
        //Code nút xoá
        $('[data-toggle="confirm"]').jConfirm({
        question:'Bạn có chắc chắn xoá?',
        confirm_text:'Có',
        deny_text:'Không',
        size:'medium',
        theme:'white',
        follow_href:true
        });
        //Tự tắt thông báo
        $("div.alert").delay(10000).slideUp();
        //Upload file
        $(document).ready(function () {
        bsCustomFileInput.init()
        });
        //Dropdown menu
        $(document).ready(function() {
        $('[data-toggle="movie-dropdown"]').niceSelect();
        });

    </script>
</body>

</html>
