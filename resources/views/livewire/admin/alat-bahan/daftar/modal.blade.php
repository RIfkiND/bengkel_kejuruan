<div>
    <div wire:ignore.self class="modal fade" id="ModalAlat">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                @if ($keluarMode)
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Alat Atau Bahan Keluar</h4>
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
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <input wire:model="nama_pemakai" type="text" class="form-control input-default"
                                        placeholder="Nama Pemakai">
                                    @error('nama_pemakai')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <input wire:model="volume_keluar" type="text" class="form-control input-default"
                                        placeholder="Jumlah Di Ambil">
                                    @error('volume_keluar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea wire:model="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
                            @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            wire:click.prevent='cancel()'>Batal</button>
                        <button type="button" class="btn btn-primary" wire:click.prevent="keluar()">Simpan</button>
                    </div>
                @elseif ($masukMode)
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Penambahan Stock</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            wire:click.prevent='cancel()'><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tanggal Masuk</label>
                            <input wire:model="tanggal_masuk" type="date" id="tanggal_masuk"
                                class="form-control input-default">
                            @error('tanggal_masuk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <input wire:model="sumber_dana" type="text" class="form-control input-default"
                                        placeholder="Sumber Dana">
                                    @error('sumber_dana')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <input wire:model="saldo" type="text" class="form-control input-default"
                                        placeholder="Harga">
                                    @error('saldo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <input wire:model="volume_masuk" type="text" class="form-control input-default"
                                        placeholder="Jumlah Di Tambah">
                                    @error('volume_masuk')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            wire:click.prevent='cancel()'>Batal</button>
                        <button type="button" class="btn btn-primary" wire:click.prevent="masuk()">Simpan</button>
                    </div>
                @else
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Informasi Lengkap</h4>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if ($historyData)
                            <div>
                                <h4>RIwayat Transaksi Alat: {{ $historyData->nama_alat_atau_bahan }}</h4>
                                <ul>
                                    <li>Pemasukan Alat Atau Bahan:</li>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal Ditambahkan</th>
                                                        <th>Sumber Dana</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($historyData->alatmasuk->sortByDesc('id')->take(5) as $masuk)
                                                        <tr>
                                                            <td>{{ $masuk->tanggal_masuk }}</td>
                                                            <td>{{ $masuk->sumber_dana }}</td>
                                                            <td>{{ $masuk->volume }}</td>
                                                            <td>Rp {{ number_format($masuk->saldo, 2, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4">
                                                                <h1>Data Kosong</h1>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    {{-- @if ($historyData->alatmasuk->count() > 5)
                                        <p class="text-center"><a href="jjavascript:void(0)" class="btn btn-link"
                                                wire:click='viewmasuk'>Lihat Lebih
                                                Banyak
                                                Alat Masuk</a></p>
                                    @endif --}}

                                    <li>Pemakaian Alat Atau Bahan:</li>
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal Pemakaian</th>
                                                        <th>Nama Pemakai</th>
                                                        <th>Jumlah Dipakai</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($historyData->alatkeluar->sortByDesc('id')->take(5) as $keluar)
                                                        <tr>
                                                            <td>{{ $keluar->tanggal_keluar }}</td>
                                                            <td>{{ $keluar->nama_pemakai }}</td>
                                                            <td>{{ $keluar->volume }}</td>
                                                            <td>{{ $keluar->keterangan }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4">
                                                                <h1>Data Kosong</h1>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- @if ($historyData->alatkeluar->count() > 5)
                                        <p class="text-center"><a href="javascript:void(0)" class="btn btn-link"
                                                wire:click='viewkeluar'>Lihat Lebih Banyak
                                                Alat
                                                Keluar</a></p>
                                    @endif --}}
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-white"
                            data-dismiss="modal">Tutup</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
