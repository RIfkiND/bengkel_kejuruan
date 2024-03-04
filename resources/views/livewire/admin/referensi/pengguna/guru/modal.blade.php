<div>
    <div wire:ignore.self class="modal fade" id="ModalGuru" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <form>
                    <div class="modal-header">
                        @if ($updateMode)
                            <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                        @else
                            <h4 class="modal-title" id="myModalLabel">Tambahkan Data</h4>
                        @endif
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"
                            wire:click.prevent='cancel()'></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Nama Guru" wire:model='nama_guru'>
                            @error('nama_guru')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <input type="text" class="form-control" placeholder="Teknik Mesin"
                                wire:model='mata_pelajaran'>
                            @error('mata_pelajaran')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if (auth()->user()->sekolah_id == null)
                            <div class="form-group">
                                <label>Sekolah</label>
                                <select id="sekolah_guru" class="form-control" wire:model='sekolah_guru'>
                                    <option selected="selected">Pilih</option>
                                    @foreach ($sekolahs as $sekolah)
                                        <option value="{{ $sekolah->id }}">{{ $sekolah->nama_sekolah }}</option>
                                    @endforeach
                                </select>
                                @error('sekolah_guru')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
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
