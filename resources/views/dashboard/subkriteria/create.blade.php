<div class="modal fade" id="subkriteria">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Sub Kriteria</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('subkriteria.create')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title">Sub Kriteria</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="bobot">Bobot</label>
                            <input type="text" class="form-control" id="bobot" name="bobot" required>
                        </div>
                        
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="kriteria">Kriteria</label>
                            <select name="kriteria_id" class="form-control" id="kriteria">
                              <option value="" selected disabled>Pilih Kriteria</option>
                              @foreach($kriteria as $krit)
                              <option value="{{$krit->id}}">{{$krit->title}}</option>
                              @endforeach
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