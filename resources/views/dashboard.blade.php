@extends('layouts.app')
@section('title','Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">


        @foreach ($categories as $category)
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card-body d-flex px-4 justify-content-between pb-5">
                        <div>
                            <h4 class="fs-18 font-w600 mb-4 text-nowrap">{{ $category->name }}</h4>
                            <div class="d-flex align-items-center">
                                <h2 class="fs-32 font-w700 text-primary mb-0">{{ count($category->items) }}</h2>
                            </div>
                        </div>
                        <div id="columnChart"></div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body bg-primary rounded-lg d-flex px-4 justify-content-between pb-5">
                    <div>
                        <h4 class="fs-18 font-w600 mb-4 text-wrap text-white">Using materials</h4>
                        <div class="d-flex align-items-center">
                            <h2 class="fs-32  font-w700 text-light mb-0">{{ $total_using_device }}</h2>
                        </div>
                    </div>
                    <div id="columnChart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex px-4 bg-warning rounded-lg justify-content-between pb-5">
                    <div>
                        <h4 class="fs-18 font-w600 mb-4 text-nowrap">Need to repair</h4>
                        <div class="d-flex align-items-center">
                            <h2 class="fs-32 font-w700 text-primary mb-0">{{ $total_repair_device }}</h2>

                        </div>
                    </div>
                    <div id="columnChart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body bg-primary rounded-lg d-flex px-4 justify-content-between pb-5">
                    <div>
                        <h4 class="fs-18 font-w600 mb-4 text-wrap text-white">Store Keeping</h4>
                        <div class="d-flex align-items-center">
                            <h2 class="fs-32  font-w700 text-light mb-0">{{ $total_store_device }}</h2>
                        </div>
                    </div>
                    <div id="columnChart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
