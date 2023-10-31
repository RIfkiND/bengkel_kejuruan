<?php

namespace App\Livewire\Admin\Referensi\Pengguna\Akun;

use App\Models\Guru;
use App\Models\User;
use App\Models\Ruangan;
use App\Models\Sekolah;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    public $name, $email, $password, $role, $sekolah_user, $guru_user, $ruangan_user, $password_confirmation, $user_id, $searchUser, $selectedUserId;
    public $updateMode = false;
    public $showSekolahSelect = false;
    public $showGuruSelect = false;
    public $showRuanganSelect = false;

    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete'];
    public function getListeners()
    {
        return ['delete'];
    }

    public function updateSekolahVisibility()
    {
        if (auth()->user()->sekolah_id) {
            $this->showSekolahSelect = false;
            $this->showGuruSelect = $this->role == '0';
            $this->showRuanganSelect = $this->role == '1';
        } else {
            $this->showSekolahSelect = $this->role == '2';
        }
    }

    public function resetPage()
    {
        $this->gotoPage(1, 'userPage');
    }
    public function render()
    {
        $searchUser = '%' . $this->searchUser . '%';
        if (auth()->user()->role == 'Admin') {
            return view('livewire.admin.referensi.pengguna.akun.index', [
                'users' => User::where('name', 'LIKE', $searchUser)
                    ->where('role', '!=', '4')
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'userPage'),
                'sekolahs' => Sekolah::all(),
            ]);
        } elseif (auth()->user()->role == 'AdminSekolah') {
            return view('livewire.admin.referensi.pengguna.akun.index', [
                'users' => User::where('name', 'LIKE', $searchUser)
                    ->where('sekolah_id', auth()->user()->sekolah_id)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'userPage'),
                'ruangans' => Ruangan::where('sekolah_id', auth()->user()->sekolah_id)->get(),
                'gurus' => Guru::where('sekolah_id', auth()->user()->sekolah_id)->get(),
            ]);
        } else {
            return view('livewire.admin.referensi.pengguna.akun.index', [
                'users' => User::where('name', 'LIKE', $searchUser)
                    ->orderBy('id', 'DESC')
                    ->paginate(10, ['*'], 'userPage'),
                'sekolahs' => Sekolah::all(),
            ]);
        }
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->role = '';
        $this->sekolah_user = '';
        $this->showSekolahSelect = false;
        $this->showGuruSelect = false;
        $this->showRuanganSelect = false;
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',
        ]);

        if ($this->showSekolahSelect == true) {
            $validatedDate = $this->validate([
                'sekolah_user' => 'required',
            ]);

            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'role' => $this->role,
                'sekolah_id' => $this->sekolah_user,
            ]);
        } elseif (auth()->user()->sekolah_id) {
            if ($this->showGuruSelect == true) {
                $validatedDate = $this->validate([
                    'guru_user' => 'required',
                ]);

                User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                    'role' => $this->role,
                    'sekolah_id' => auth()->user()->sekolah_id,
                    'guru_id' => $this->guru_user,
                ]);
            } elseif ($this->showRuanganSelect == true) {
                $validatedDate = $this->validate([
                    'ruangan_user' => 'required',
                ]);

                User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                    'role' => $this->role,
                    'sekolah_id' => auth()->user()->sekolah_id,
                    'ruangan_id' => $this->ruangan_user,
                ]);
            } else {
                User::create([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                    'role' => $this->role,
                    'sekolah_id' => auth()->user()->sekolah_id,
                ]);
            }
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'role' => $this->role,
            ]);
        }

        $this->resetInputFields();
        $this->alert('success', 'Berhasil Ditambahkan!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        if ($this->password) {
            $validatedDate = $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6|confirmed',
                'role' => 'required',
            ]);

            if ($this->showSekolahSelect == true) {
                $validatedDate = $this->validate([
                    'sekolah_user' => 'required',
                ]);
                $user = User::find($this->user_id);
                $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                    'role' => $this->role,
                    'sekolah_id' => $this->sekolah_user,
                ]);
            } elseif (auth()->user()->sekolah_id) {
                if ($this->showGuruSelect == true) {
                    $validatedDate = $this->validate([
                        'guru_user' => 'required',
                    ]);

                    $user = User::find($this->user_id);
                    $user->update([
                        'name' => $this->name,
                        'email' => $this->email,
                        'password' => bcrypt($this->password),
                        'role' => $this->role,
                        'sekolah_id' => auth()->user()->sekolah_id,
                        'guru_id' => $this->guru_user,
                    ]);
                } elseif ($this->showRuanganSelect == true) {
                    $validatedDate = $this->validate([
                        'ruangan_user' => 'required',
                    ]);

                    $user = User::find($this->user_id);
                    $user->update([
                        'name' => $this->name,
                        'email' => $this->email,
                        'password' => bcrypt($this->password),
                        'role' => $this->role,
                        'sekolah_id' => auth()->user()->sekolah_id,
                        'ruangan_id' => $this->ruangan_user,
                    ]);
                } else {
                    $user = User::find($this->user_id);
                    $user->update([
                        'name' => $this->name,
                        'email' => $this->email,
                        'password' => bcrypt($this->password),
                        'role' => $this->role,
                        'sekolah_id' => auth()->user()->sekolah_id,
                    ]);
                }
            } else {
                $user = User::find($this->user_id);
                $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                    'role' => $this->role,
                ]);
            }
        } else {
            $validatedDate = $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'role' => 'required',
            ]);

            if ($this->showSekolahSelect == true) {
                $validatedDate = $this->validate([
                    'sekolah_user' => 'required',
                ]);
                $user = User::find($this->user_id);
                $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'role' => $this->role,
                    'sekolah_id' => $this->sekolah_user,
                ]);
            } elseif (auth()->user()->sekolah_id) {
                if ($this->showGuruSelect == true) {
                    $validatedDate = $this->validate([
                        'guru_user' => 'required',
                    ]);

                    $user = User::find($this->user_id);
                    $user->update([
                        'name' => $this->name,
                        'email' => $this->email,
                        'role' => $this->role,
                        'sekolah_id' => auth()->user()->sekolah_id,
                        'guru_id' => $this->guru_user,
                    ]);
                } elseif ($this->showRuanganSelect == true) {
                    $validatedDate = $this->validate([
                        'ruangan_user' => 'required',
                    ]);

                    $user = User::find($this->user_id);
                    $user->update([
                        'name' => $this->name,
                        'email' => $this->email,
                        'role' => $this->role,
                        'sekolah_id' => auth()->user()->sekolah_id,
                        'ruangan_id' => $this->ruangan_user,
                    ]);
                } else {
                    $user = User::find($this->user_id);
                    $user->update([
                        'name' => $this->name,
                        'email' => $this->email,
                        'role' => $this->role,
                        'sekolah_id' => auth()->user()->sekolah_id,
                    ]);
                }
            } else {
                $user = User::find($this->user_id);
                $user->update([
                    'name' => $this->name,
                    'email' => $this->email,
                    'role' => $this->role,
                ]);
            }
        }

        $this->updateMode = false;
        $this->resetInputFields();
        $this->alert('success', 'Berhasil Diubah!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }

    public function ondel($id)
    {
        $this->selectedUserId = $id;

        $this->alert('question', 'Yakin Ingin di Hapus ?', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'timerProgressBar' => true,
            'showCancelButton' => true,
            'cancelButtonText' => 'Tidak',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Ya',
            'onConfirmed' => 'delete',
            'confirmButtonColor' => '#f03535',
        ]);
    }

    public function delete()
    {
        $user = User::find($this->selectedUserId);

        if ($user) {
            $user->delete();
            $this->alert('success', 'Berhasil Dihapus!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        } else {
            $this->alert('error', 'Category Tidak Ditemukan!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'timerProgressBar' => true,
            ]);
        }
    }
}
