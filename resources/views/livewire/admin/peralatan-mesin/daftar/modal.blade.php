<div>
    <div wire:ignore.self class="modal fade" id="ModalPeralatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 10px">
                @if ($keluarMode)
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Peralatan Atau Mesin Keluar</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click.prevent='cancel()'>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tanggal Keluar</label>
                            <input wire:model="tanggal_keluar" type="date" id="tanggal_keluar"
                                class="form-control input-default">
                            @error('tanggal_keluar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alasan</label>
                            <textarea wire:model="alasan" class="form-control" id="alasan" rows="3"></textarea>
                            @error('alasan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click.prevent='cancel()'>Batal</button>
                        <button type="button" class="btn btn-primary" wire:click.prevent="keluar()">Simpan</button>
                    </div>
                @else
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Informasi Peralatan</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- <div class="row">
                            <div class="col">
                                Terakhir Di Pakai Oleh : Guru Bersama Kelas
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                Pada : Tanggal pukul waktu
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-lg-6 ">
                                <div class="card-text">
                                    <span>Merk : {{ $merk }}</span><br><br>
                                    <Span>Type/Model : {{ $type }}</Span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-text">
                                    <span>Tahun : {{ $tahun }}</span><br><br>
                                    <span>Kapasitas : {{ $kapasitas }} <br><br></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-text">
                                    <span>Kategori : {{ $kategori_id }}</span><br><br>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-text">
                                    <span>Harga : {{ $harga }}</span><br><br>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col">
                                <div class="card-text">
                                    <a href="{{ route('print.kartupemakaaianalat', ['id' => $peralatan->id]) }}">Print Pemakaian</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal"
                            wire:click='cancel()'>Tutup</button>
                    </div>
            </div>
            @endif
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="ModalImportPeralatan" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 10px">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Import Peralatan Dari Excel</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click.prevent='cancel()'>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <h6>Pastikan Data Ada Pada Kolom Yang Sesuai <br> Seperti Pada
                                Gambar :</h6>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <a href="/Asset/images/peralatan-tutor.png" target="_blank" class="enlarge-image">
                                <img src="/Asset/images/peralatan-tutor.png" alt="" width="100%">
                            </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control mb-2" type="file" wire:model="file">
                        @if ($errors->has('file'))
                            <div class="alert alert-danger">
                                {{ $errors->first('file') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        wire:click.prevent='cancel()'>Batal</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="importperalatan()"
                        wire:loading.attr="disabled">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
