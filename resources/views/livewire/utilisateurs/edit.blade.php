<div class="row p-4 pt-5">
    <div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de modification d'un utilisateur</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" wire:submit.prevent="updateUser()">
        <div class="card-body">

            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label >Nom</label>
                    <input type="text" wire:model="editUser.nom" class="form-control @error('editUser.nom') is-invalid @enderror">

                    @error("editUser.nom")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group flex-grow-1">
                    <label >Prenom</label>
                    <input type="text" wire:model="editUser.prenom" class="form-control @error('editUser.prenom') is-invalid @enderror">

                    @error("editUser.prenom")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label >Adresse e-mail</label>
                <input type="email" class="form-control @error('editUser.email') is-invalid @enderror" wire:model="editUser.email">
                @error("editUser.email")
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label >Telephone</label>
                    <input type="text" class="form-control @error('editUser.phone') is-invalid @enderror" wire:model="editUser.phone">
                    @error("editUser.phone")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group flex-grow-1 mr-2">
                    <label >Adresse</label>
                    <input type="text" class="form-control @error('editUser.adresse') is-invalid @enderror" wire:model="editUser.adresse">
                    @error("editUser.adresse")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
          <button type="button" wire:click="goToListUser()" class="btn btn-danger">Retouner à la liste des utilisateurs</button>
        </div>
      </form>
    </div>
    <!-- /.card -->

  </div>
  <div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header d-flex align-items-center">
            <h3 class="card-title flex-grow-1"><i class="fas fa-fingerprint fa-2x"></i> Roles & permissions</h3>
            <button class="btn bg-gradient-success" wire:click="updateRoleAndPermissions">
                <i class="fas fa-check"></i> Appliquer les modifications
            </button>
        </div>
        <div class="card-body">
            <div id="accordion">
                @foreach($rolePermissions["roles"] as $role)
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title flex-grow-1">
                        <a  data-parent="#accordion" href="#" aria-expanded="true">
                            {{$role["role_nom"]}}
                        </a>
                        </h4>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" wire:model.lazy="rolePermissions.roles.{{$loop->index}}.active"
                            @if($role["active"]) checked @endif id="customSwitch{{$role['role_id']}}">
                            <label class="custom-control-label" for="customSwitch{{$role['role_id']}}">{{ $role["active"]? "Activé" : "Desactivé" }}</label>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="p-3">
                    <table class="table table-bordered">
                        <thead>
                            <th>Permissions</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($rolePermissions["permissions"] as $permission)
                                <tr>
                                    <td>{{ $permission["permission_nom"] }}</td>
                                    <td>
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">

                                                <input type="checkbox" class="custom-control-input"
                                                    @if($permission["active"]) checked @endif
                                                    wire:model.lazy="rolePermissions.permissions.{{$loop->index}}.active"
                                                    id="customSwitchPermission{{$permission['permission_id']}}">
                                                <label class="custom-control-label" for="customSwitchPermission{{$permission['permission_id']}}"> {{ $permission["active"]? "Activé" : "Desactivé" }}</label>
                                            </div>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>

