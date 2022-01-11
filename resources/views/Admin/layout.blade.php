<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CREATIVE SITUDIO</title>
    <link rel="icon" type="image/x-icon" href="{{asset('admin_assets/images/favicon.ico')}}">

    
   
    <link
      rel="stylesheet"
      href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css"
    />
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
   
    <!-- Custom fonts for this template-->
    <link href="{{asset('admin_assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin_assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin/dashboard')}}">
                <div class="sidebar-brand-icon ">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    <img class="logo-icon" src="{{asset('admin_assets/images/logo.png')}}" alt="logo">
                </div>
                {{-- <div class="sidebar-brand-text mx-3">CREATIVE SITUDIO</div> --}}
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item @yield('dashboard_select')">
                <a class="nav-link" href="{{url('admin/dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item @yield('user_select')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-user"></i>
                    <span>USER</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Users:</h6>
                        <a class="collapse-item" href="{{url('admin/user')}}"> <i class="list"> List</i> </a>
                        
                    </div>
                </div>
            </li>

            <li class="nav-item @yield('team_select')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNine"
                    aria-expanded="true" aria-controls="collapseNine">
                    <i class="fas fa-users"></i>
                    <span>TEAM</span>
                </a>
                <div id="collapseNine" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">TEAM :</h6>
                        <a class="collapse-item" href="{{url('admin/team')}}"> List</a>
                        <a class="collapse-item" href="{{url('admin/team/manageteam')}}"> Add</a>
                    </div>
                </div>
            </li>

            <li class="nav-item @yield('banner_select')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven"
                    aria-expanded="true" aria-controls="collapseSeven">
                    <i class="fas fa-image" aria-hidden="true"></i>
                    <span>Banner</span>
                </a>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Banner :</h6>
                        <a class="collapse-item" href="{{url('admin/banner')}}"> List</a>
                        <a class="collapse-item" href="{{url('admin/video/bannervideo')}}"> Add</a>
                    </div>
                </div>
            </li>

            <li class="nav-item @yield('category_select')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-list"></i>
                    <span>CATEGORY</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Category :</h6>
                        <a class="collapse-item" href="{{url('admin/category')}}"> <i class="list"> List</i> </a>
                        
                    </div>
                </div>
            </li>

            <li class="nav-item @yield('story_select')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-edit"></i>
                    <span>STORIES</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Stories Components:</h6>
                        <a class="collapse-item" href="{{url('admin/story')}}">Story List</a>
                        <a class="collapse-item" href="{{url('admin/story/managestory')}}">Story Add</a>
                    </div>
                </div>
            </li>

            <li class="nav-item @yield('blog_select')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-bold"></i>
                    <span>BLOGS</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">BLOGS :</h6>
                        <a class="collapse-item" href="{{url('admin/blog')}}"> List</a>
                        <a class="collapse-item" href="{{url('admin/blog/manageblog')}}"> Add</a>
                    </div>
                </div>
            </li>

            

            <li class="nav-item @yield('video_select')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFor"
                    aria-expanded="true" aria-controls="collapseFor">
                    <i class="fab fa-youtube" aria-hidden="true"></i>
                    <span>VIDEOS</span>
                </a>
                <div id="collapseFor" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">VIDEOS :</h6>
                        <a class="collapse-item" href="{{url('admin/video')}}"> List</a>
                        <a class="collapse-item" href="{{url('admin/video/managevideo')}}"> Add</a>
                    </div>
                </div>
            </li>

            <li class="nav-item @yield('uploaduser_select')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix"
                    aria-expanded="true" aria-controls="collapseSix">
                    <i class="fas fa-upload" aria-hidden="true"></i>
                    <span>UPLOAD FILE</span>
                </a>
                <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">UPLOAD FILE:</h6>
                        <a class="collapse-item" href="{{url('admin/uploaduser')}}"> List</a>
                        <a class="collapse-item" href="{{url('admin/uploaduser/manageuploadfile')}}"> Add</a>
                    </div>
                </div>
            </li>
          

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User InFormation -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">TheCreativeStudio</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('admin_assets/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{url('admin/updatepassword')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Change Password
                                </a>
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> --}}
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('admin/logout')}}" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                        @section('container')
                        @show
                       
                        </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; www.thecreativestudio.in @php echo date('Y') @endphp </span>
                    </div>
                </div>
            </footer>
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
    <script src="{{asset('admin_assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin_assets/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admin_assets/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin_assets/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin_assets/js/demo/chart-pie-demo.js')}}"></script>

<!-- The template to display files available for upload -->
 
  

    <script src="{{asset('admin_assets/js/vendor/jquery.ui.widget.js')}}"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
 
    
   
    <script>
        $('document').ready(function(){

            // For Add More
          

            // Pop up Form
            $('.openButton').on('click',function(e){
                    $('#myModal').modal('show');
            });
    
            
        });

        $("#usubmitrBtn").click(function(){
            var valid = $("#name").val();
            var file = $("#file").val();
            
            if(valid !='' && file != ''){
                $('#upload_form').submit();
            }else{
                alert("Please enter User name.");
            }
        });
    
        $("#submitBtn").click(function(){        
            var valid=$("#category_name").val();
            if(valid!=''){
                $("#cat_form").submit();
            }else{
                alert("Please enter Category name.");
            }
        });    
    </script>
     <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

     <script>
       tinymce.init({
         selector: 'textarea#editor',
         menubar: false
       });
     </script>
</body>

</html>