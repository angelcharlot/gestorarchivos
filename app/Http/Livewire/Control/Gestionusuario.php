<?php

namespace App\Http\Livewire\Control;

use Livewire\Component;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;

class Gestionusuario extends Component
{
    use WithPagination;
    public $updateMode = 4;
    public $user;
    public $rolesall;
    public $select_rols=[];
    public $allpermisos;
    public $select_permisos=[]; 
    public $permisosdirectos;
    public $roles;
    public $password;
    public $password_confirmation;
    public $searchUser;
    protected $listeners = ['delete'];
    protected $rules=[
        'user.name'=>'required',
        'user.email'=>'required|email|unique:App\Models\User,email',
        'password'=> 'required|min:6|confirmed',
        'password_confirmation'=>'min:6',
    ];
        public function mount(){
            
            $this->user=new user();
            $this->rolesall=Role::all();
            $this->allpermisos=permission::all(); 


    
        }
        public function render(){
            $this->permisosdirectos=$this->allpermisos->diff($this->user->getPermissionsViaRoles());
           $users=user::where('name','like',"%".$this->searchUser."%")
           ->orWhere('email','like',"%".$this->searchUser."%")->paginate(10);
          
                    return view('livewire.control.gestionusuario',compact('users'));
        }
        public function delete(user $user){

            $user->delete();

        }
        public function store(){
            $this->validate();
            $this->user->password=Hash::make($this->password);
            $this->user->save();
            $this->emit('alert_create');
            $this->resertimput();

        }
        public function edit(user $user){

            $this->resertimput();
            $this->updateMode=2;
            $this->user=$user;

        }
        public function update(){
            $this->user->delete();
            $this->validate();
            $this->user->password=Hash::make($this->password);
            $this->user->save();
            $this->emit('alert_update');
            $this->resertimput();
        }
        public function vconfi(user $user){
            $this->user=$user;
            $this->select_rols=[];
            $this->select_permisos=[]; 

            foreach ($user->roles as $value) {
                $this->select_rols[]=$value->id;
            }
            foreach ($user->permissions as $value) {
                $this->select_permisos[]=$value->id;
            }

            

            $this->updateMode=3;
        }
        public function btnagregar(){
           
            $this->resertimput();
            $this->updateMode=1;
        }
        public function updatingsearchUser(){
            $this->resetPage();
        }
        public function actualizarroles(){

            $this->user->syncRoles($this->select_rols);
            $this->emit('alert_asig');
        }
        public function actualizapermisos(){
            $this->user->syncPermissions($this->select_permisos);
            $this->emit('alert_asig');
            
        }
        private function resertimput(){

            $this->user=new user();
            $this->password="";
            $this->password_confirmation="";
            $this->updateMode=4;
            $this->resetValidation();
        }
}
