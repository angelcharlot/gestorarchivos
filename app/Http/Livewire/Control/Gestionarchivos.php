<?php

namespace App\Http\Livewire\Control;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\models\archivo;
use App\models\user;
use Illuminate\Database\Eloquent\Collection;
use App\models\categoria;
use Spatie\Permission\Models\Permission;


class Gestionarchivos extends Component
{
    use WithFileUploads;
    public $usuario_unico;
   
    public $lista_de_usuario=[];
   public $permisos_de_archivo=[];
    public $vista_permisos=0;
    public $archivo_select;
    public $tipo_de_permiso="usuarios";
    public $usuarios_para_compartir;
    public $vista=0;
    public $archivo;
    public $archivos;
    public $accion=0;
    public $categorias;
    public $categoria_select;
    protected $rules = [ 
        'categoria_select'=>'required',
        'archivo' => 'required', 
    ];
    public function mount(){

        $this->categorias= auth()->user()->categorias;
        $this->usuarios_para_compartir=new Collection();
    }
    public function render()
    {
        $this->archivos=auth()->user()->archivos;
        
        return view('livewire.control.gestionarchivos');
    }
    public function save()
    {
        $this->validate();

        $file=new archivo();
      
        $file->url= 'storage/'.$this->archivo->store('archivos','public'); 
        $file->name=$this->archivo->getClientOriginalName();
        $file->extencion=$this->archivo->getClientOriginalExtension();
        $file->categoria_id=$this->categoria_select;
        //permiso de eliminar
        $permiso_delete=new Permission();
        $permiso_delete->name=uniqid('p_delete_archivo-').$this->archivo->getClientOriginalName();
        $permiso_delete->guard_name="web";
        $file->p_delete=$permiso_delete->name;
        $permiso_delete->save();
        //permiso de actualizar
        $permiso_update=new Permission();
        $permiso_update->name=uniqid('p_update_archivo-').$this->archivo->getClientOriginalName();
        $permiso_update->guard_name="web";
        $file->p_update=$permiso_update->name;
        $permiso_update->save();

        $file->save();
        $file->users()->sync(auth()->user()->id);

       auth()->user()->givePermissionTo($permiso_update);
       auth()->user()->givePermissionTo($permiso_delete);

        

    }
    public function dar_permiso(archivo $archivo){
        $this->archivo_select=$archivo;
        $this->vista_permisos=1;
        $this->usuarios_para_compartir=new Collection();

       


    }
    public function cargar_usuario(){

        $this->lista_de_usuario=[];



            switch ($this->tipo_de_permiso) {
                case 'departamentos':
                    $this->usuarios_para_compartir=$this->archivo_select->categoria->departamento->users;
                    foreach ($this->usuarios_para_compartir as $key => $usuario) {
                        if ($usuario->archivos->find($this->archivo_select->id)) {
                            $this->lista_de_usuario[$key]['user']=$usuario->id;
                        }
                        if ($usuario->hasPermissionTo($this->archivo_select->p_update)) {
                            $this->lista_de_usuario[$key]['p_update']=$this->archivo_select->p_update;
                        }
                        if ($usuario->hasPermissionTo($this->archivo_select->p_delete)) {
                            $this->lista_de_usuario[$key]['p_delete']=$this->archivo_select->p_delete;
                        }
                    }
                break;
                case 'categorias':
                    $this->usuarios_para_compartir=$this->archivo_select->categoria->users;
                    foreach ($this->usuarios_para_compartir as $key => $usuario) {
                        if ($usuario->archivos->find($this->archivo_select->id)) {
                            $this->lista_de_usuario[$key]['user']=$usuario->id;
                        }
                        if ($usuario->hasPermissionTo($this->archivo_select->p_update)) {
                            $this->lista_de_usuario[$key]['p_update']=$this->archivo_select->p_update;
                        }
                        if ($usuario->hasPermissionTo($this->archivo_select->p_delete)) {
                            $this->lista_de_usuario[$key]['p_delete']=$this->archivo_select->p_delete;
                        }
                    }
                break;
                case 'usuarios':
                    $this->usuarios_para_compartir=new Collection();
                break;

                default:
                
                break;
            }
           // dd( $this->lista_de_usuario);

        }

        public function btn_compartir(){

            switch ($this->tipo_de_permiso) {
                case 'departamentos':

                //dd($this->lista_de_usuario);
                foreach ($this->lista_de_usuario as $key => $value) {
                   
                    if (isset($value['user']))
                    {

                        $user=user::find($value['user']);
                        if ($user){




                            if (!$user->archivos->find($this->archivo_select->id)) {
                                $user->archivos()->attach($this->archivo_select);
                            }
                            //--------------------------------------------------------------
                            
                            if (isset($value['p_update'] ) ) {
                               
                                if ($value['p_update']!=false) { 
                                     if (!$user->hasPermissionTo($value['p_update'])) {
                                            $user->givePermissionTo($value['p_update']);
                                        }
                                }else{
                                    $user->revokePermissionTo($this->archivo_select->p_update);
                                }
                            }else{
                                $user->revokePermissionTo($this->archivo_select->p_update);
                            }


                            //--------------------------------------------------------------

                            if (isset($value['p_delete'] ) ) {
                               
                                if ($value['p_delete']!=false) { 
                                     if (!$user->hasPermissionTo($value['p_delete'])) {
                                            $user->givePermissionTo($value['p_delete']);
                                        }
                                }else{
                                    $user->revokePermissionTo($this->archivo_select->p_delete);
                                }
                            }else{
                                $user->revokePermissionTo($this->archivo_select->p_delete);
                            }
                            //----------------------------------------------------------------------------
                        }else{
                            $this->usuarios_para_compartir[$key]->archivos()->detach($this->archivo_select->id);
                            $this->usuarios_para_compartir[$key]->revokePermissionTo($this->archivo_select->p_update);
                            $this->usuarios_para_compartir[$key]->revokePermissionTo($this->archivo_select->p_delete);
                        }
                    }




                }
            
                    
                break;
                case 'categorias':
                    
                  //dd($this->lista_de_usuario);
                foreach ($this->lista_de_usuario as $key => $value) {
                   
                    if (isset($value['user']))
                    {

                        $user=user::find($value['user']);
                        if ($user){




                            if (!$user->archivos->find($this->archivo_select->id)) {
                                $user->archivos()->attach($this->archivo_select);
                            }
                            //--------------------------------------------------------------
                            
                            if (isset($value['p_update'] ) ) {
                               
                                if ($value['p_update']!=false) { 
                                     if (!$user->hasPermissionTo($value['p_update'])) {
                                            $user->givePermissionTo($value['p_update']);
                                        }
                                }else{
                                    $user->revokePermissionTo($this->archivo_select->p_update);
                                }
                            }else{
                                $user->revokePermissionTo($this->archivo_select->p_update);
                            }


                            //--------------------------------------------------------------

                            if (isset($value['p_delete'] ) ) {
                               
                                if ($value['p_delete']!=false) { 
                                     if (!$user->hasPermissionTo($value['p_delete'])) {
                                            $user->givePermissionTo($value['p_delete']);
                                        }
                                }else{
                                    $user->revokePermissionTo($this->archivo_select->p_delete);
                                }
                            }else{
                                $user->revokePermissionTo($this->archivo_select->p_delete);
                            }
                            //----------------------------------------------------------------------------
                        }else{
                            $this->usuarios_para_compartir[$key]->archivos()->detach($this->archivo_select->id);
                            $this->usuarios_para_compartir[$key]->revokePermissionTo($this->archivo_select->p_update);
                            $this->usuarios_para_compartir[$key]->revokePermissionTo($this->archivo_select->p_delete);
                        }
                    }




                }

                break;
                case 'usuarios':
                    $this->usuarios_para_compartir=new Collection();
                    $usuarios=user::where('email','=',$this->usuario_unico)->first();
                   


                    if($usuarios)
                    {
                        if (!$usuarios->archivos->find($this->archivo_select->id)) {
                            $this->archivo_select->users()->attach($usuarios->id);
                        }
                        
                           foreach ($this->permisos_de_archivo as $key => $value) {
                            if (!$usuarios->hasPermissionTo($value)) {
                               $usuarios->givePermissionTo($value);
                            }
                            
                           }
                            


                    }else {
                        $this->emit('alert_create');
                    }


                break;

                default:
                
                break;
            }

        }

}
