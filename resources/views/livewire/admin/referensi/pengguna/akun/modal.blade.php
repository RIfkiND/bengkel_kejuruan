<div>
    <div wire:ignore.self class="modal fade" id="ModalAkun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 10px;">
                <form>
                    <div class="modal-header">
                        @if ($updateMode)
                            <h4 class="modal-title" id="myModalLabel">Edit Akun</h4>
                        @else
                            <h4 class="modal-title" id="myModalLabel">Tambahkan Akun</h4>
                        @endif
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"
                            wire:click.prevent='cancel()'></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="name" class="form-label">Nama Pengguna</label>
                                <input type="text" class="form-control" id="name" aria-describedby="nameHelp"
                                    wire:model='name'>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                {{-- <div id="nameHelp" class="form-text text-success">boleh menggunakan huruf
                                    kapital dan spasi</div> --}}
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" wire:model='email'>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                @if ($updateMode)
                                    <label class="form-label">Password Baru</label>
                                @else
                                    <label class="form-label">Password</label>
                                @endif
                                <input type="password" class="form-control" wire:model="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="con-password" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="con-password"
                                    wire:model='password_confirmation'>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if (
                                (auth()->user()->role == 'Admin' || auth()->user()->role == 'SuperAdmin') &&
                                    ($this->role == 'Guru' || $this->role == 'KepalaBengkel'))

                                <label class="form-label text-info"> Role : {{ $this->role }}</label>
                            @else
                                <div class="col-lg-12 mb-2">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" id="role" class="form-control" wire:model='role'
                                        wire:change="updateSekolahGuruRuanganVisibility">
                                        <option value="">Pilih Role</option>
                                        @if ($updateMode)
                                            @if (auth()->user()->role == 'AdminSekolah')
                                                <option value="Guru">Guru</option>
                                                <option value="KepalaBengkel">Kepala Bengkel</option>
                                            @endif
                                            @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin' or auth()->user()->role == 'AdminSekolah')
                                                <option value="AdminSekolah">Admin Sekolah</option>
                                            @endif
                                            @if (auth()->user()->role == 'SuperAdmin')
                                                <option value="Admin">Admin</option>
                                                <option value="SuperAdmin">Super Admin</option>
                                            @endif
                                        @else
                                            @if (auth()->user()->role == 'AdminSekolah')
                                                <option value="0">Guru</option>
                                                <option value="1">Kepala Bengkel</option>
                                            @endif
                                            @if (auth()->user()->role == 'SuperAdmin' or auth()->user()->role == 'Admin' or auth()->user()->role == 'AdminSekolah')
                                                <option value="2">Admin Sekolah</option>
                                            @endif
                                            @if (auth()->user()->role == 'SuperAdmin')
                                                <option value="3">Admin</option>
                                                <option value="4">Super Admin</option>
                                            @endif
                                        @endif
                                    </select>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($showSekolahSelect)
                                    <div class="col-lg-12 mb-2">
                                        <label>Sekolah</label>
                                        <select id="sekolah_user" class="form-select" wire:model='sekolah_user'>
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
                                @if ($updateMode == false)
                                    @if ($showGuruSelect)
                                        <div class="form-group col-lg-12 mb-2">
                                            <label>Nama Guru</label>
                                            <input type="text" class="form-control" placeholder="Nama Guru"
                                                wire:model='nama_guru' wire:keydown='updateGuruIndicator'>
                                            @error('nama_guru')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group col-lg-6">
                                            <label>Guru Terdata</label>
                                            <select id="selectedguru" class="form-select" wire:model='selectedguru'>
                                                <option value="">Pilih</option>
                                                @foreach ($gurus as $guru)
                                                    <option value="{{ $guru->id }}">{{ $guru->nama_guru }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('selectedguru')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> --}}
                                        <div class="form-group col-lg-6">
                                            <label>Mata Pelajaran</label>
                                            <input type="text" class="form-control" placeholder="Teknik Mesin"
                                                wire:model='mata_pelajaran'>
                                            @error('mata_pelajaran')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @endif
                                @endif
                            @endif
                            @if ($showRuanganSelect)
                                <div class="form-group col-lg-6 mb-2">
                                    <label>Ruangan</label>
                                    <select id="ruangan_user" class="form-select" wire:model='ruangan_user'>
                                        <option selected="selected" value="">Pilih</option>
                                        @foreach ($ruangans as $ruangan)
                                            <option value="{{ $ruangan->id }}">{{ $ruangan->nama_ruangan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('ruangan_user')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($updateMode == false)
                                    <div class="form-group col-lg-6 mb-2">
                                        <label>Guru Terdata</label>
                                        <select id="selectedguru" class="form-select" wire:model='selectedguru'>
                                            <option value="">Pilih</option>
                                            @foreach ($gurus as $guru)
                                                <option value="{{ $guru->id }}">{{ $guru->nama_guru }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('selectedguru')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Nama Guru</label>
                                        <input type="text" class="form-control" placeholder="Drs.Nama Anda.Spd"
                                            wire:model='nama_guru'>
                                        @error('nama_guru')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Mata Pelajaran</label>
                                        <input type="text" class="form-control" placeholder="Teknik Mesin"
                                            wire:model='mata_pelajaran'>
                                        <span class="text-info">bisa di kosongkan jika tidak mengajar</span>
                                        @error('mata_pelajaran')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                            wire:click.prevent='cancel()'>Batal</button>
                        @if ($updateMode)
                            @if (auth()->user()->role == 'Admin' or auth()->user()->role == 'SuperAdmin')
                                <button type="button" class="btn btn-primary"
                                    wire:click.prevent="update_byadmin()">Simpan</button>
                            @else
                                <button type="button" class="btn btn-primary"
                                    wire:click.prevent="update()">Simpan</button>
                            @endif
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
