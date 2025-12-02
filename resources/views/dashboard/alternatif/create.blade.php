<div class="modal fade" id="alternatif">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat Alternatif</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('alternatif.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="foto">Foto<code>*</code></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" name="image" class="custom-file-input"
                                            id="foto">
                                        <label class="custom-file-label" for="foto">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip">NIP<code>*</code></label>
                                <input type="text" name="nip" maxlength="10" id="nip"
                                    class="form-control numeric" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama<code>*</code></label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jabatan">Jabatan<code>*</code></label>
                                <select name="jabatan" id="jabatan" class="form-control" required>
                                    <option value="" selected disabled>-- Pilih Jabatan --</option>
                                    <option value="perangkat">Perangkat</option>
                                    <option value="kepala urusan">Kepala Urusan</option>
                                    <option value="kepala seksi">Kepala Seksi</option>
                                    <option value="kepala dusun">kepala dusun</option>
                                    <option value="bpd">bpd</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
