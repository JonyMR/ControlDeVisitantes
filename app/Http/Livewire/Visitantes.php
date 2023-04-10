<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Visitante;

class Visitantes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $departamento;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.visitantes.view', [
            'visitantes' => Visitante::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('departamento', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->nombre = null;
		$this->departamento = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'departamento' => 'required',
        ]);

        Visitante::create([ 
			'nombre' => $this-> nombre,
			'departamento' => $this-> departamento
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Visitante Successfully created.');
    }

    public function edit($id)
    {
        $record = Visitante::findOrFail($id);
        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->departamento = $record-> departamento;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'departamento' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Visitante::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'departamento' => $this-> departamento
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Visitante Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Visitante::where('id', $id)->delete();
        }
    }
}