@include('dashboard.partials.header')
@include('dashboard.partials.navbar')
@include('dashboard.partials.sidebar')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$title}}</h1>
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div>
          <div class="col-sm-6">
            <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#subkriteria">
                  Tambah Kriteria
            </button>
            @include('dashboard.subkriteria.create')
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
                <h3 class="card-title">DataTable {{$title}}</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Kriteria</th>
                    <th>Sub Kriteria</th>
                    <th>Bobot</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->kriteria->code}} - {{$item->kriteria->title}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->bobot}}</td>
                        <td>
                          <div class="btn-group btn-block">
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-toggle="modal" data-target="#subkriteria{{ $item->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button url="{{ route('subkriteria.delete', $item->id) }}"
                                                        type="button" class="btn btn-sm btn-danger delete"
                                                        data-id="{{ $item->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                        </td>
                    </tr>
                    @include('dashboard.subkriteria.update')
                    @endforeach
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
