@extends('admin.master')

@section('main_content')

    <div class="row mt-3">
        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Orders</p>
                            <h4 class="text-white line-height-5 center">{{ $orderCount }}</h4>
                        </div>
                </div>
            </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Customer</p>
                            <h4 class="text-white line-height-5">{{ $customers }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Pending Order</p>
                            <h4 class="text-white line-height-5">{{ $penddingOrder }}</h4>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Processing Order</p>
                            <h4 class="text-white line-height-5">{{ $processinggOrder }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Complete Order</p>
                            <h4 class="text-white line-height-5">{{ $CompleteOrder }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Cancel</p>
                            <h4 class="text-white line-height-5">{{ $cancelOrder }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Order Amount ( {{ $orderCount }} )</p>
                            <h4 class="text-white line-height-5">TK. {{ $totalOrderAmount }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Order Tax ( {{ $orderCount }} )</p>
                            <h4 class="text-white line-height-5">TK. {{ $totalTax }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Order & Tax Amount </p>
                            <h4 class="text-white line-height-5">TK. {{ $totalRevenue }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-bloody">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Order Complete ( {{ $CompleteOrder }} ) Amount </p>
                            <h4 class="text-white line-height-5">TK. {{ $totalAmount }}</h4>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-blooker">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Order Complete ( {{ $CompleteOrder }} ) Tax Amount </p>
                            <h4 class="text-white line-height-5">TK. {{ $totalAmountTax }}</h4>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-3">
            <div class="card gradient-scooter">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="text-white">Total Order & Tax Complete Amount </p>
                            <h4 class="text-white line-height-5">TK. {{ $totalOrderTaxAmount }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- </div> -->
@endsection