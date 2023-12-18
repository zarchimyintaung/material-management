<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>

    <!--*******************
        Preloader start
    ********************-->
   <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        @include('layouts.header')

        <!--**********************************
            Sidebar start
        ***********************************-->

        @include('layouts.sidebar')        


        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            @yield('content')
            {{-- modal delete confirm --}}
            <div class="modal fade show" id="handleDeleteConfirmModal" style="display: none;" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h3 class="text-center">Are you sure to delete?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" onclick="cancelDeleteModal()">Cancel</button>
                            <a href='' class="btn btn-primary delete-btn">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->

        @include('layouts.footer')

        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    
    @include('layouts.foot')

    @yield('scripts')

</body>
</html>