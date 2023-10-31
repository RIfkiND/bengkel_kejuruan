<div>
    <div wire:ignore.self class="modal fade" id="ModalAkun">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        @if ($updateMode)
                            <h4 class="modal-title" id="myModalLabel">Edit Akun</h4>
                        @else
                            <h4 class="modal-title" id="myModalLabel">Tambahkan Akun</h4>
                        @endif
                        <button type="button" class="close" data-dismiss="modal"
                            wire:click.prevent='cancel()'><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Satya N.R" wire:model='name'>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" wire:model='email'>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                @if ($updateMode)
                                    <label>Password Baru</label>
                                @else
                                    <label>Password</label>
                                @endif
                                <input type="password" class="form-control" placeholder="Password"
                                    wire:model='password'>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control" placeholder="Konfirmasi Password"
                                    wire:model='password_confirmation'>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label>Role</label>
                                <select id="role" class="form-control" wire:model='role'
                                    wire:change="updateSekolahVisibility">
                                    <option value="">Pilih</option>
                                    @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'AdminSekolah')
                                        <option value="0" >Guru</option>
                                        <option value="1">Kepala Bengkel</option>
                                    @endif
                                    @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin' or auth()->user()->role == 'AdminSekolah')
                                        <option value="2">Admin Sekolah</option>
                                    @endif
                                    @if (auth()->user()->role == 'SuperAdmin')
                                        <option value="3">Admin</option>
                                        <option value="4">Super Admin</option>
                                    @endif
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if ($showSekolahSelect)
                                <div class="form-group col">
                                    <label>Sekolah</label>
                                    <select id="sekolah_user" class="form-control" wire:model='sekolah_user'>
                                        @if (auth()->user()->sekolah_id)
                                            <option value="">Pilih</option>
                                            <option selected value="{{ auth()->user()->sekolah_id }}">
                                                {{ auth()->user()->sekolah->nama_sekolah }}</option>
                                        @else
                                            <option selected="selected" value="">Pilih</option>
                                            @foreach ($sekolahs as $sekolah)
                                                <option value="{{ $sekolah->id }}">{{ $sekolah->nama_sekolah }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('sekolah_user')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif
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
