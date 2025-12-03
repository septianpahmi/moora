@include('dashboard.partials.header')
@include('dashboard.partials.navbar')
@include('dashboard.partials.sidebar')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-box"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Kriteria</span>
                            <span class="info-box-number">{{ $kriteriaCount }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-boxes"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Sub Kriteria</span>
                            <span class="info-box-number">{{ $subCount }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Alteranif</span>
                            <span class="info-box-number">{{ $altCount }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header bg-info">
                            <h3 class="widget-user-username">Alternatif Terbaik Periode Terbaru</h3>
                            @if ($bestLatest)
                                <h5 class="widget-user-desc">{{ $bestLatest->alternatif->nama }}</h5>
                            @else
                                <h5 class="widget-user-desc">Belum ada hasil</h5>
                            @endif
                        </div>
                        <div class="widget-user-image">
                            @if ($bestLatest)
                                <img class="img-circle elevation-2"
                                    src="images/alternatif/{{ $bestLatest->alternatif->image }}" alt="User Avatar">
                            @else
                                <img class="img-circle elevation-2" src="dist/img/default-150x150.png"
                                    alt="User Avatar">
                            @endif
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        @if ($bestLatest)
                                            <h5 class="description-header">{{ $latestPeriode->nama }}</h5>
                                        @else
                                            <h5 class="description-header">-</h5>
                                        @endif
                                        <span class="description-text">PERIODE</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        @if ($bestLatest)
                                            <h5 class="description-header">{{ number_format($bestLatest->yi, 4) }}</h5>
                                        @else
                                            <h5 class="description-header">-</h5>
                                        @endif
                                        <span class="description-text">NILAI YI</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        @if ($bestLatest)
                                            <h5 class="description-header">{{ $bestLatest->rank }}</h5>
                                        @else
                                            <h5 class="description-header">-</h5>
                                        @endif
                                        <span class="description-text">RANK</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header bg-success">
                            <h3 class="widget-user-username">Alternatif Terbaik Sepanjang Waktu</h3>
                            @if ($bestGlobal)
                                <h5 class="widget-user-desc">{{ $bestGlobal->alternatif->nama }}</h5>
                            @else
                                <h5 class="widget-user-desc">Belum ada hasil</h5>
                            @endif
                        </div>
                        <div class="widget-user-image">
                            @if ($bestGlobal)
                                <img class="img-circle elevation-2"
                                    src="images/alternatif/{{ $bestGlobal->alternatif->image }}" alt="User Avatar">
                            @else
                                <img class="img-circle elevation-2" src="dist/img/default-150x150.png"
                                    alt="User Avatar">
                            @endif
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6 border-right">
                                    <div class="description-block">
                                        @if ($bestGlobal)
                                            <h5 class="description-header">{{ $bestGlobal->periode->nama }}</h5>
                                        @else
                                            <h5 class="description-header">-</h5>
                                        @endif
                                        <span class="description-text">PERIODE</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 border-right">
                                    <div class="description-block">
                                        @if ($bestGlobal)
                                            <h5 class="description-header">{{ number_format($bestGlobal->yi, 4) }}
                                            </h5>
                                        @else
                                            <h5 class="description-header">-</h5>
                                        @endif
                                        <span class="description-text">NILAI YI</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('dashboard.partials.footer')
