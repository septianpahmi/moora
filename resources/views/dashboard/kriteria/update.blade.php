@foreach($data as $item)
<div class="modal fade" id="kriteria{{$item->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Kriteria</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('kriteria.update', $item->id)}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="code">Kode</label>
                            <input type="text" class="form-control" value="{{$item->code}}" id="code" name="code" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="title">Kriteria</label>
                            <input type="text" class="form-control" id="title" value="{{$item->title}}" name="title" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input type="text" class="form-control" id="bobot" value="{{$item->bobot}}" name="bobot" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="type">Tipe</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="" selected disabled>Pilih Tipe</option>
                                <option value="benefit">Benefit</option>
                                <option value="cost">Cost</option>
                            </select>
                        </div>
                    </div>
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