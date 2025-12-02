@include('dashboard.partials.header')
@include('dashboard.partials.navbar')
@include('dashboard.partials.sidebar')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }} </h1>
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="{{ route('kriteria') }}">Kriteria</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-success float-sm-right" data-toggle="modal"
                        data-target="#subkriteria{{ $kriteria->id }}">Tambah {{ $title }}</button>
                </div>
                @include('dashboard.subkriteria.create')
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">{{ $kriteria->code }} - {{ $kriteria->title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sub Kriteria</th>
                                        <th>Bobot</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ number_format($item->bobot, 0) }}</td>
                                            <td>
                                                <div class="btn-group btn-block">
                                                    <button type="button" class="btn btn-danger btn-sm delete"
                                                        data-id="{{ $item->id }}"
                                                        url="{{ route('subkriteria.delete', $item->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-warning btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#subkriteriaupdate{{ $item->id }}">
                                                        <i class="fas fa-pencil-ruler"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @include('dashboard.subkriteria.update')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('dashboard.partials.footer')
