<?php

namespace App\Http\Livewire\Control;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class Gestionrolpermisos extends Component
{

    
    public $allroles;
    public $allpermisos;
    public $rol;
    public $rol_select;
    public $select_permisos=[];
    protected $listeners = ['delete'];
    protected $rules=[
        'rol.name'=>'required|unique:Spatie\Permission\Models\Role,name',
    ];
    public function mount(){

       $this->rol=new role();
       $this->rol_select=new role();
    }

    public function render()
    {   
        $allpermisos=$this->allpermisos=permission::all();
        $allroles=$this->allroles=role::where('id', '!=' , 1)->get();
        return view('livewire.control.gestionrolpermisos',compact('allpermisos','allroles'));
    }
    public function store(){
        $this->validate();
        $this->rol->guard_name='web';
        $this->rol->save();
        $this->rol=new role();
        $this->emit('alert_create_rol');
    }
    public function delete(role $rol){
       
        $rol->delete();
        $this->rol_select=new role();
       
    }
    public function edit(role $rol){
        $this->select_permisos=[];
        $this->rol_select=$rol;
        foreach ($rol->permissions as $value) {
            $this->select_permisos[]=$value->id;
        }
        
    }
    public function actualizapermisos(){

        $this->rol_select->syncPermissions($this->select_permisos);
        $this->emit('alert_asig');

    }
}
