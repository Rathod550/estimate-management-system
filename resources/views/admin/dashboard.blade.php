@extends($adminTheme)

@section('title', 'Dashboard')

@section('style')

@endsection

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row dashboard">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xxl-3 col-md-3">
                        <a href="{{ route('admin.index') }}">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Admins <span></span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $adminCount }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <a href="{{ route('admin.estimate') }}">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Estimates <span></span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa fa-id-badge" aria-hidden="true"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $estimateCount }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <a href="{{ route('admin.estimate.approval') }}">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Estimates Approval<span></span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa fa-check-square" aria-hidden="true"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $estimateApprovalCount }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <a href="{{ route('admin.client') }}">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Client <span></span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $clientCount }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <a href="{{ route('admin.service') }}">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Service <span></span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa fa-book" aria-hidden="true"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $serviceCount }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <a href="{{ route('admin.category') }}">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Category <span></span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $categoryCount }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-md-3">
                        <a href="{{ route('admin.udsn.reg') }}">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Udsn Regs <span></span></h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa fa-cube" aria-hidden="true"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $udsnRegsCount }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection

@section('script')

@endsection