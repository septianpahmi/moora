@foreach($data as $item)
<div class="modal fade" id="alternatif{{$item->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Alternatif</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{route('alternatif.update',$item->id)}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" value="{{$item->nama}}" id="nama" name="nama" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="title">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control" required>
                                <option value="" selected disabled>Pilih Jabatan</option>
                                <option value="perangkat">Perangkat</option>
                                <option value="kepala urusan">Kepala Urusan</option>
                                <option value="kepala seksi">Kepala Seksi</option>
                                <option value="kepala dusun">kepala dusun</option>
                                <option value="bpd">bpd</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" value="{{$item->nip}}" id="nip" name="nip" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="foto">Image</label>
                            <input type="file" class="form-control" id="foto" name="foto" required>
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