<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sim 077</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <style>
      .form__wrapper{
        position: relative;
      }
      .form__innner{
        width: 150px;
        position: absolute;
        bottom: 28px;
      }
    </style>

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="/" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>SIM 007</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{auth()->user()->name}}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                
                <div class="navbar-nav w-100">
                    <a href="/" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Bosh saxifa</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Viloyatlar</a>
                        <div class="dropdown-menu bg-transparent border-0"> 
                           @foreach ($regions as $region)
                            <div class="nav-item nav-link d-flex justify-content-between" >
                                <a href="/region/{{$region->id}}" ><i class="bi bi-geo-alt-fill"></i> {{$region->name}}</a>  <i onclick="editmodal(`{{$region->name }}`,`{{ $region->id }} `)" class="bi bi-pen "></i>
                            </div>
                           @endforeach 
                           <a onclick="togglemodal()" style="background-color: rgb(14, 139, 62); color:rgb(239, 248, 255)" class="nav-item nav-link"><i style="color: #009cff" class="bi bi-plus-circle-fill"></i> 
                            Viloyat qo'shish
                           </a>                          
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content"  >
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input required class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{auth()->user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="/profile" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>My Profile</a>
                            <a href="/logout" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            
            <!-- Viloyat -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Viloyat qo'shish</h5>
                    </div>
                    <div class="modal-body form__wrapper">
                      <form action="" id="form-action" method="" onsubmit=" closeit()">
                        @csrf
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Viloyat nomi</label>
                          <input required type="text" class="form-control" name="name"  placeholder="Farg'ona" id="edit">
                        </div>
                        <div class="modal-footer" style="display: flex; justify-content: space-between">
                            <div >
                            </div>
                            <div>
                              <button type="button" onclick="closeit()"  class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                              <button type="submit" class="btn btn-primary">Saqlash</button>
                            </div>
                        </div>
                      </form>
                      <div id="DelDiv" class="form__innner">
                        <form action="" id="del" method="POST">
                          @csrf
                          @method('DELETE')
                          <button   class="btn btn-danger" >Delete</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            {{-- Shaxar --}}
              <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">SHaxar qo'shish</h5>
              
                    </div>
                    <div class="modal-body">
                      <form action="" id="form-action2"  method="" onsubmit=" closeit()">
                        @csrf
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Viloyat</label>
                          <select class="form-select form-select-lg mb-3" name="region_id" aria-label=".form-select-lg example">
                            @foreach ($regions as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Shaxar nomi</label>
                          <input required type="text" name="name" class="form-control" placeholder="Farg'ona" id="edit2">
                        </div>
                        <div class="modal-footer">
                          <button type="button" onclick="closeit()"  class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                          <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                      </form>
                      <div id="DelDiv2" class="form__innner">
                        <form action="" id="del2" method="POST">
                          @csrf
                          @method('DELETE')
                          <button   class="btn btn-danger" >Delete</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            {{-- Obyekt --}}
              <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Obyekt qo'shish</h5>
              
                    </div>
                    <div class="modal-body">
                      <form action="" method="POST"  id="form-action3" onsubmit="closeit()">
                        @csrf
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Shahar</label>
                 
                          <input type="hidden" >
                          <select class="form-select form-select-lg mb-3" name="city_id" aria-label=".form-select-lg example">
                            @foreach ($cities as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                          <label for="recipient-name"  class="col-form-label">Obyekt nomi</label>
                          <input required type="text" name="name" class="form-control" placeholder="Farg'ona" id="edit3">
                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Tel Raqami</label>
                          <input required type="text" name="phone" class="form-control" placeholder="+998 00 1234567" id="edit4">
                        </div>
                        <div class="modal-footer">
                          <button type="button" onclick="closeit()"  class="btn btn-secondary" data-dismiss="modal">Yopish</button>
                          <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                      </form>
                      <div id="DelDiv3" class="form__innner">
                        <form action="" id="del3" method="POST">
                          @csrf
                          @method('DELETE')
                          <button   class="btn btn-danger" >Delete</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            
            <script>
                            let modalme = document.getElementById('exampleModal');
                            let inp = document.getElementById('edit');
                            let del= document.getElementById('del');
                            let del2= document.getElementById('del2');
                            let inp2 = document.getElementById('edit2');
                            let modalme2 = document.getElementById('exampleModal2');
                            let inp3 = document.getElementById('edit3');
                            let inp4 = document.getElementById('edit4');
                            let modalme3 = document.getElementById('exampleModal3');
                            let elForm = document.getElementById('form-action');
                            let elForm2 = document.getElementById('form-action2');
                            let elForm3 = document.getElementById('form-action3');
                            let DelDiv = document.getElementById('DelDiv');
                            let DelDiv2 = document.getElementById('DelDiv2');
                            let DelDiv3 = document.getElementById('DelDiv3');

                            function togglemodal2(){
                                modalme2.classList.add("show");
                                console.log(modalme.classList)
                                modalme2.style.display = 'block'
                                elForm2.action = `/city`
                                elForm2.method = "POST"
                                DelDiv2.style.display = 'none';
                            }            
                            function editmodal2(ok, id ){
                              modalme2.classList.add("show");
                              inp2.value = ok
                              modalme2.style.display = 'block';
                              elForm2.action = `/city/${id}`
                              elForm2.method = "POST"
                              del2.action = `/city/${id}`
                              DelDiv.style.display = 'block';
                            }            
                            function togglemodal3(){
                                modalme3.classList.add("show");
                                console.log(modalme.classList)
                                modalme3.style.display = 'block'
                                inp.value = ''
                                elForm3.action = `/obyekt`
                                elForm3.method = "POST"
                                DelDiv3.style.display = 'none';
                            }            
                            function editmodal3(ok3 , id , p){
                                modalme3.classList.add("show");
                                inp3.value = ok3
                                inp4.value = p
                                modalme3.style.display = 'block';
                                console.log(id);
                                elForm3.action = `/obyekt/${id}`
                                elForm3.method = "POST"
                                del3.action = `/obyekt/${id}`
                                DelDiv.style.display = 'block';
                            }            
                            function editmodal(av,id){
                              modalme.classList.add("show");
                              modalme.style.display = 'block';
                              inp.value = av
                              elForm.action = `/region/${id}`
                              elForm.method = "POST"
                              del.action = `/region/${id}`
                              DelDiv.style.display = 'block';
                            }
                            function togglemodal(){
                                modalme.classList.add("show");
                                console.log(modalme.classList);
                                modalme.style.display = 'block';
                                inp.value = ''
                                elForm.action = `/region`
                                elForm.method = "POST"
                                DelDiv.style.display = 'none';

                            }
                            function closeit(){
                                modalme.classList.remove("show");
                                modalme.style.display = 'none';
                                modalme2.classList.remove("show");
                                modalme2.style.display = 'none';
                                modalme3.classList.remove("show");
                                modalme3.style.display = 'none';
            
                            }
                          


                        </script>


                @yield('content')

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">SIM 007</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/chart/chart.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Template Javascript -->
    <script src="sweetalert2.min.js"></script>

    <script>    
       $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
        })
      </script>
    <script src="/js/main.js"></script>
</body>

</html>