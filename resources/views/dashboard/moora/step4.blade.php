@include('dashboard.partials.header')
@include('dashboard.partials.navbar')
@include('dashboard.partials.sidebar')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">{{ $title }}</h1>
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable {{ $title }}</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <table id="example1" class="table table-bordered table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Alternatif</th>
                                            <th>MAX</th>
                                            <th>MIN</th>
                                            <th>Nilai Yi</th>
                                            <th>Ranking</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($hasilYi as $alt_id => $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row['alternatif'] }}</td>
                                                <td>{{ number_format($row['Benefit'], 4) }}</td>
                                                <td>{{ number_format($row['Cost'], 4) }}</td>
                                                <td><strong>{{ number_format($row['Yi'], 4) }}</strong></td>
                                                <td class="text-center">
                                                    {{ $row['ranking'] }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('dashboard') }}" class="btn btn-success btn-block">Kembali ke Halaman
                                Utama</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('dashboard.partials.footer')
