<div>
    <div wire:ignore.self class="modal fade" id="ModalPeralatan">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                @if ($keluarMode)
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Peralatan Atau Mesin Keluar</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            wire:click.prevent='cancel()'><span>&times;</span>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            wire:click.prevent='cancel()'>Batal</button>
                        <button type="button" class="btn btn-primary" wire:click.prevent="keluar()">Simpan</button>
                    </div>
                @else
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Informasi Pemakaian (Nama Alat)</h4>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
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
                                    <span>Merk : -</span><br><br>
                                    <Span>Type/Model : -</Span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-text">
                                    <span>Tahun : -</span><br><br>
                                    <span>Kapasitas : -</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Tutup</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
