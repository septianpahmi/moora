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
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>NIP</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->alternatif->nama}}</td>
                        <td>{{$item->alternatif->jabatan}}</td>
                        <td>{{$item->alternatif->nip}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="{{route('perhitungan')}}" class="btn btn-default btn-block">Kembali</a>
            </div>
            <div class="col-md-9">
                <a href="{{route('perhitungan.matrik')}}" class="btn btn-success btn-block">Selanjutnya</a>
            </div>
        </div>
        </div>
        </div>
      </div>
    </section>
  </div>
@include('dashboard.partials.footer')
