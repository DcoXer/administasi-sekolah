<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserManagement extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $name, $email, $password, $role = 'operator', $userId;
    public $updateMode = false;
    public $fileImport;

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('role', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.user-management', ['users' => $users]);
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->role = 'operator';
        $this->userId = null;
        $this->updateMode = false;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:operator,kepala_sekolah,staff_keuangan',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'role' => $this->role,
        ]);

        session()->flash('message', 'User created successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->updateMode = true;
        $this->password = '';
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'password' => 'nullable|min:6',
            'role' => 'required|in:operator,kepala_sekolah,staff_keuangan',
        ]);

        $user = User::findOrFail($this->userId);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = $this->role;

        if ($this->password) {
            $user->password = bcrypt($this->password);
        }

        $user->save();

        session()->flash('message', 'User updated successfully.');

        $this->resetInputFields();
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'User deleted successfully.');
    }

}
