<div>
    <div wire:ignore.self class="modal fade" id="ModalSekolah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        @if ($updateMode)
                            <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                        @else
                            <h4 class="modal-title" id="myModalLabel">Tambahkan Data</h4>
                        @endif
                        <button type="button" class="close" data-dismiss="modal"
                            wire:click.prevent='cancel()'><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Satya N.R" wire:model='nama_sekolah'>
                            @error('nama_sekolah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
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
