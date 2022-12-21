<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\archivo as file;
use Illuminate\Support\Facades\Storage;
class Archivo extends Component
{
    
    public $archivo;
    public $url;
    public function mount($id){

        $this->archivo=file::find($id);
        $this->page = Storage::disk('public')->allFiles('archivos/'.$this->archivo->id);
        //dd($this->page);
    }
    public function render()
    {
        
        $this->url=Storage::disk('public')->url('archivos/92Ue0KWMAEzAwGK6Wr0hdUDyVtPwLO0PBTVQm7sx.pdf');
        //dd($this->url);
        return view('livewire.archivo');
       
        
    }  
 
    
}
