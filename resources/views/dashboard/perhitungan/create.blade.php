@foreach($data as $item)
<div class="modal fade" id="perhitungan{{$item->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Masukan Nilai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('perhitungan.create', $item->id)}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row">
                    @foreach($kriteria as $krit)
                    <div class="col-6">
                        <div class="form-group">
                            <label for="perhitungan_{{$krit->id}}">{{$krit->title}}</label>
                            <select name="perhitungan[{{$krit->id}}]" id="perhitungan_{{$krit->id}}" class="form-control" required>
                                <option value="" selected disabled>Pilih {{$krit->title}}</option>
                                @foreach($sub as $subs)
                                    @if($subs->kriteria_id == $krit->id)
                                        <option value="{{$subs->id}}">{{$subs->title}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endforeach