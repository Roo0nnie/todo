<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class TodoList extends Component
{

    use WithPagination;

    #[Rule('required|min:3|max:100')]
    public $name;

    public $editID;

    #[Rule('required|min:3|max:100')]
    public $editName;

    public $search;

    public function create() {
        $validate = $this->validateOnly('name');

        try {
            if($validate) {
                Todo::create($validate);
                $this->reset('name');
                $this->resetPage();
                session()->flash('success', 'Todo created successfully');
            }
        }
        catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

    }

    public function delete($id) {
        try {
            Todo::find($id)->delete();
            session()->flash('success', 'Todo deleted successfully');
        }
        catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function edit($id) {
        $todo = Todo::find($id);
        $this->editID = $id;
        $this->editName = $todo->name;
    }

    public function cancel($id) {
        $todo = Todo::find($id);
        $this->reset('editID', 'editName');
        session()->flash('success', 'Todo cancel successfully');
    }

    public function update($id) {
        try {
            $validate = $this->validateOnly('editName');
            if($validate) {
                Todo::find($id)->update(['name' => $validate['editName']]);
                $this->reset('editID', 'editName');
                session()->flash('success', 'Todo updated successfully');
            }
        }
        catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function toggle($id) {
        $todo = Todo::find($id);
        $todo->status = !$todo->status;
        $todo->save();
    }

    public function selectAll() {
        $todos = Todo::all();

        foreach ($todos as $todo) {
            $todo->status = true;
            $todo->save();
        }

        \Log::info('selectAll event emitted');
        $this->emit('selectAll');
    }
    public function render()
    {
        return view('livewire.todo-list',
            [
                'todos' => Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(5)
            ]
        );
    }
}
