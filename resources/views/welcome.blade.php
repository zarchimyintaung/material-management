@extends('layouts.user-app')

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="text-center text-white">
                        <!-- Page heading-->
                        <h1 class="mb-5 header-title">Computer Materials Management System of <span class="text-primary">UCS(Myeik)</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Icons Grid-->
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-window m-auto text-primary"></i></div>
                        <h3>Easily Maintain</h3>
                        <p class="lead mb-0">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam quam aut expedita reprehenderit natus laboriosam assumenda quia deleniti sed nulla.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-layers m-auto text-primary"></i></div>
                        <h3>Control Department</h3>
                        <p class="lead mb-0">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam quam aut expedita reprehenderit natus laboriosam assumenda quia deleniti sed nulla.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary"></i></div>
                        <h3>Easy to Use</h3>
                        <p class="lead mb-0">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam quam aut expedita reprehenderit natus laboriosam assumenda quia deleniti sed nulla.
                        </p>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Image Showcases-->
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{ asset('dist/assets/img/bg-showcase-1.jpg') }}')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>What is computer hardware?</h2>
                    <p class="lead mb-0">Computer hardware is a collective term used to describe any of the physical components of an analog or digital computer. The term hardware distinguishes the tangible aspects of a computing device from software, which consists of written, machine-readable instructions or programs that tell physical components what to do and when to execute the instructions.
                    </p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('{{ asset('dist/assets/img/bg-showcase-2.jpg') }}')"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>What is materials mangements?</h2>
                    <p class="lead mb-0">Materials management is an aspect of supply chain management and planning. 
                        Materials management requires understanding what materials are needed and where to source them, it is also heavily involved in inventory management and storage.</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{ asset('dist/assets/img/bg-showcase-3.jpg') }}')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Easy to Use & Customize</h2>
                    <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>
                </div>
            </div>
        </div>
    </section>
@endsection