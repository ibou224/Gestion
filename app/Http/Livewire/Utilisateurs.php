<?php

namespace App\Http\Livewire;

use App\Http\Requests\UserRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use MercurySeries\Flashy\Flashy;
use Illuminate\Validation\Rule;

class Utilisateurs extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELISTE;

    public $newUser = [];
    public $editUser = [];

    public $rolePermissions = [];

    //public $populateRolePermissions = [];

    // protected $rules = [
    //     'newUser.nom' => 'required',
    //     'newUser.prenom' => 'required',
    //     'newUser.email' => 'required|email|unique:users,email',
    //     'newUser.phone' => 'required|numeric|unique:users,phone',
    //     'newUser.adresse' => 'required',
    // ];
    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            return [
                'editUser.nom' => 'required',
                'editUser.prenom' => 'required',
                'editUser.email' => ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id']) ],
                'editUser.phone' => ['required', 'numeric', Rule::unique("users", "phone")->ignore($this->editUser['id']) ],
                'editUser.adresse' => 'required',
            ];
        }
        return [
            'newUser.nom' => 'required',
            'newUser.prenom' => 'required',
            'newUser.email' => 'required|email|unique:users,email',
            'newUser.phone' => 'required|numeric|unique:users,phone',
            'newUser.adresse' => 'required',
        ];
    }


    public function render()
    {
        return view('livewire.utilisateurs.index',[
            "users" => User::latest()->paginate(10)
        ])
        ->extends('layouts.default')
        ->section('content');
    }

    public function goToAddUser()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditUser($id)
    {
        $this->editUser = User::find($id)->toArray();
        //dump($this->editUser);
        $this->currentPage = PAGEEDITFORM;

        $this->populateRolePermissions();
    }

    public function populateRolePermissions(){
        $this->rolePermissions["roles"] = [];
        $this->rolePermissions["permissions"] = [];

        $mapForCB = function($value){
            return $value["id"];
        };

        $roleIds = array_map($mapForCB, User::find($this->editUser["id"])->roles->toArray());
        $permissionIds = array_map($mapForCB, User::find($this->editUser["id"])->permissions->toArray()); // [1, 2, 4]

        foreach(Role::all() as $role){
            if(in_array($role->id, $roleIds)){
                array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>true]);
            }else{
                array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>false]);
            }
        }

        foreach(Permission::all() as $permission){
            if(in_array($permission->id, $permissionIds)){
                array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nom, "active"=>true]);
            }else{
                array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nom, "active"=>false]);
            }
        }

    }

    public function updateRoleAndPermissions(){
        DB::table("user_role")->where("user_id", $this->editUser["id"])->delete();
        DB::table("user_permission")->where("user_id", $this->editUser["id"])->delete();

        foreach($this->rolePermissions["roles"] as $role){
            if($role["active"]){
                User::find($this->editUser["id"])->roles()->attach($role["role_id"]);
            }
        }

        foreach($this->rolePermissions["permissions"] as $permission){
            if($permission["active"]){
                User::find($this->editUser["id"])->permissions()->attach($permission["permission_id"]);
            }
        }

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Roles et permissions mis à jour avec succès!"]);
    }



    public function goToListUser()
    {
        $this->currentPage = PAGELISTE;
        $this->editUser = [];
    }


    public function addUser()
    {
        $validationAttributes = $this->validate();

        $validationAttributes["newUser"]["password"] = "password";

        //dump($validationAttributes);
        // Ajouter un nouvel utilisateur
        User::create($validationAttributes["newUser"]);

        $this->newUser = [];

        Flashy::message('la commande est ajouté avec effectué avec succès');
        return back();
    }

    public function updateUser(){
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        //dump($validationAttributes);
        User::find($this->editUser["id"])->update($validationAttributes["editUser"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur mis à jour avec succès!"]);

    }
}
