<?php

namespace App\Http\Livewire\Control;

use Livewire\Component;
use App\Models\user;
use App\Models\departamento;
use App\Models\categoria;
class Gestionperycat extends Component
{
    public $departamentos,$categorias,$users;
    public $array_departamentos=[];
    public $array_categorias=[];
    public $array_user=[];
    public $departamento_select;
    public $categoria_select;
    public $name_departamento;
    public $name_categoria;
    public $formulario=1;
    public $area_booton=0;
    
    public function mount(){
        $this->users=user::all();
    }
    
    public function render()
    {   
        $users=$this->users;
        $this->departamentos=departamento::all();
        
        $categorias=$this->categorias;
        return view('livewire.control.gestionperycat',compact('categorias','users'));
    }
    public function store_departamento(){
        $departamento=new departamento();
        $departamento->name=$this->name_departamento;
        $departamento->save();
        $this->name_departamento="";

    }
    public function store_categoria(){
        $categoria=new categoria();
        $categoria->name=$this->name_categoria;
        $categoria->departamento_id=$this->departamento_select->id;
        $categoria->save();
        $this->departamento_select->refresh();
        $this->categorias=$this->departamento_select->categorias;
        $this->name_categoria="";
        //$this->area_booton=0;
    }
    public function delete_departamento(departamento $departamento){
        $departamento->delete();
        $this->area_booton=0;
        $this->formulario=1;

    }
    public function delete_categorias(categoria $categoria ){
        $categoria->delete();
        $this->departamento_select->refresh();
        $this->categorias=$this->departamento_select->categorias;

    }
    public function montar_formulario_categoria(departamento $departamento){

        $this->departamento_select=$departamento;
        $this->categorias=$departamento->categorias;
        $this->formulario=2;
        $this->area_booton=1;

    }
    public function mostrar_categorias(departamento $departamento){
        $this->departamento_select=$departamento;
        $this->categorias=$departamento->categorias;
        $this->area_booton=1;
    }
    public function mostrar_lista_de_usuarios(departamento $departamento){
        $this->users=user::all();
        $this->departamento_select=$departamento;
        $this->array_user=[];
        foreach ($departamento->users as $key => $value) {
            $this->array_user[]=$value->id;
        }
        $this->area_booton=2;
    }
    public function mostrar_lista_de_usuarios_categorias(categoria $categoria){
        $this->categoria_select=$categoria;
        $this->array_user=[];
        $this->users=$categoria->departamento->users;
        foreach ($categoria->users as $key => $value) {
            $this->array_user[]=$value->id;
        }
        $this->area_booton=3;
    }
    public function vincular_user_dep(){
        $this->departamento_select->users()->sync($this->array_user);
        
    }
    public function vincular_user_categoria(){

        $this->categoria_select->users()->sync($this->array_user);

    }
}
