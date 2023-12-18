
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>UCS-Myeik</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('dist/assets/img/ucsm.png') }}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('dist/css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/new-style.css') }}">
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar container mx-auto mt-3 fixed-top"  style="
            background: rgba( 255, 255, 255, 0.25 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 10.5px );
            -webkit-backdrop-filter: blur( 10.5px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
        ">
            <div class="w-100 d-flex align-items-center justify-content-between">
                <a class="navbar-brand d-block" href="/">
                    <img src="{{ asset('dist/assets/img/ucsm.png') }}" width="50px" height="50px" />
                </a>
                <div class="">
                    @if (Route::has('login'))
                    <div class="d-flex gap-2 align-items-center justify-content-end">
                        @auth
                            @role('User')
                                <a href="{{ url('/report-items') }}" class="btn btn-primary">Report</a>
                                <button data-bs-toggle='modal' data-bs-target='#handleLogoutConfirmModal' class="btn btn-danger">
							        Logout                                    
                                </button>
                                <form id="logoutuser" method="POST" action="{{ route('logout') }}" >
                                    @csrf
                                </form>
                            @else
                                <a href="{{ url('/dashboard') }}" class="glass-btn">Dashboard</a>   
                            @endrole
                        @else
                            <a href="/login" class="glass-btn">Login</a>
                            @if (Route::has('register'))
                                <a href="/register" class="glass-btn">Register</a>                                        
                            @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </nav>
      
        <main>
            @yield('content')

            {{-- modal logout confirm --}}
            <div class="modal fade show" id="handleLogoutConfirmModal" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h3 class="text-center">Are you sure to logout?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancel</button>
                            <button onclick="document.querySelector('#logoutuser').submit();" class="btn btn-primary delete-btn">Logout</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
       
        <!-- Footer-->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><a href="https://www.ucsmyeik.edu.mm/" class="text-decoration-none">Main Website</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!" class="text-decoration-none">Terms of Use</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!" class="text-decoration-none">Privacy Policy</a></li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2022. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-4">
                                <a href="#!" class="text-decoration-none"><i class="bi-facebook fs-4"></i></a>
                            </li>
                            <li class="list-inline-item me-4">
                                <a href="#!" class="text-decoration-none"><i class="bi-twitter fs-4"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!" class="text-decoration-none"><i class="bi-instagram fs-4"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('dist/js/scripts.js') }}"></script>
        <script src="{{ asset('vendor/global/global.min.js') }}"></script>

        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script>
            $('.report-filter').on('change',(e) => {
                let departmentId = e.target.value

                $('#reportfilter').submit()
            })
        </script>
    </body>
</html>
