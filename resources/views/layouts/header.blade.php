 <!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
            <a href="/dashboard" class="brand-logo">
				<img src="{{ asset('dist/assets/img/ucsm.png') }}" style="width: 70px ; height: 70px" alt="">				
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

		
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between align-items-center">
                        <div class="header-left">
					        <h2 class="mt-2">UCS-Myeik</h2>
                        </div>
                        <ul class="navbar-nav header-right">			
							<li class="nav-item dropdown  header-profile">
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="{{ asset('images/user.png') }}" alt="">
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="#" class="dropdown-item ai-icon d-flex gap-2 justify-content-center align-items-center">
                                        <h4 class="mt-2 ms-2">{{ auth()->user()->name }}</h4>
										
                                        <span class="badge bg-primary">
                                            {{ auth()->user()->roles[0]->name }}
                                        </span>
									</a>
						
									<a href="javascript:void(0)" onclick="document.querySelector('#logout').submit()" class="dropdown-item ai-icon">
										<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
										<span class="ms-2">Logout</span>
									</a>

                                     <form id="logout" method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                    </form>
								</div>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
                    
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->