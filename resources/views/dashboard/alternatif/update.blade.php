@foreach ($data as $item)
    <div class="modal fade" id="alternatif{{ $item->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Alternatif</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('alternatif.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="foto">Foto<code>*</code></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" accept="image/*" name="image"
                                                class="custom-file-input" value="{{ $item->image }}" id="foto">
                                            <label class="custom-file-label" for="foto">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nip">NIP<code>*</code></label>
                                    <input type="text" value="{{ $item->nip }}" name="nip" maxlength="10"
                                        id="nip" class="form-control numeric" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama<code>*</code></label>
                                    <input type="text" value="{{ $item->nama }}" name="nama" id="nama"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan<code>*</code></label>
                                    <select name="jabatan" id="jabatan" class="form-control" required>
                                        <option value="" selected disabled>-- Pilih Jabatan --</option>
                                        <option value="Perangkat" {{ $item->jabatan == 'perangkat' ? 'selected' : '' }}>
                                            Perangkat</option>
                                        <option value="Kepala Urusan"
                                            {{ $item->jabatan == 'Kepala Urusan' ? 'selected' : '' }}>Kepala Urusan
                                        </option>
                                        <option value="Kepala Seksi"
                                            {{ $item->jabatan == 'Kepala Seksi' ? 'selected' : '' }}>Kepala Seksi
                                        </option>
                                        <option value="Kepala Dusun"
                                            {{ $item->jabatan == 'Kepala Dusun' ? 'selected' : '' }}>kepala dusun
                                        </option>
                                        <option value="BPD" {{ $item->jabatan == 'BPD' ? 'selected' : '' }}>BPD
                                        </option>
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
@endforeach
