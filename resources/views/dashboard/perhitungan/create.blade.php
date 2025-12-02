<div class="modal fade" id="moora">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Alternatif</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('perhitungan.create', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Alternatif</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="alternatif_id">Alternatif<code>*</code></label>
                                        <select name="alternatif_id" id="alternatif_id" class="form-control" required>
                                            <option value="" selected disabled>-- Pilih Alternatif --</option>
                                            @foreach ($alternatif as $alt)
                                                <option value="{{ $alt->id }}">{{ $alt->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Input Kriteria</h3>
                                </div>
                                <div class="card-body">
                                    @foreach ($kriteria as $krit)
                                        <div class="form-group">
                                            <label
                                                for="perhitungan_{{ $krit->id }}">{{ $krit->title }}<code>*</code></label>
                                            <select name="perhitungan[{{ $krit->id }}]"
                                                id="perhitungan_{{ $krit->id }}" class="form-control" required>
                                                <option value="" selected disabled>Pilih
                                                    {{ $krit->title }}
                                                </option>
                                                @foreach ($sub as $subs)
                                                    @if ($subs->kriteria_id == $krit->id)
                                                        <option value="{{ $subs->id }}">{{ $subs->title }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach
                                </div>
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
