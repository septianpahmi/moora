@include('dashboard.partials.header')
@include('dashboard.partials.navbar')
@include('dashboard.partials.sidebar')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">{{$title}}</h1>
            <ol class="breadcrumb ">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
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
                <h3 class="card-title">DataTable {{$title}}</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>nama</th>
                    <th>jabatan</th>
                    <th>nip</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->jabatan}}</td>
                        <td>{{$item->nip}}</td>
                        <td>
                          @if($item->regAlternatif->isEmpty())
    <div class="btn-group btn-block">
        <button type="button" class="btn btn-sm btn-warning"
            data-toggle="modal" data-target="#perhitungan{{ $item->id }}">
            <i class="fas fa-edit"></i>
        </button>
    </div>
@endif

                        </td>
                    </tr>
                    @include('dashboard.perhitungan.create')
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
