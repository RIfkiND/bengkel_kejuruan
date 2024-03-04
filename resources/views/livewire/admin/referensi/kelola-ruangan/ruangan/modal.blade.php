<div>
    <div wire:ignore.self class="modal fade" id="ModalRuangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <form>
                    <div class="modal-header">
                        @if ($updateMode)
                            <h4 class="modal-title" id="myModalLabel">Edit Ruangan</h4>
                        @else
                            <h4 class="modal-title" id="myModalLabel">Tambahkan Ruangan</h4>
                        @endif
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            wire:click.prevent='cancel()'>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="LAB-TIK" wire:model='nama_ruangan'>
                            @error('nama_ruangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Letak Ruangan</label>
                            <input type="text" class="form-control" placeholder="Bangunan NO. 1 Lantai 1"
                                wire:model='letak_ruangan'>
                            @error('letak_ruangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click.prevent='cancel()'>Batal</button>
                        @if ($updateMode)
                            <button type="button" class="btn btn-primary" wire:click.prevent="update()">Simpan</button>
                        @else
                            <button type="button" class="btn btn-primary"
                                wire:click.prevent="store()">Tambahkan</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
