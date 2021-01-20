<div class="card-body">


    <div class="form-group row">
        <label for="role" class="col-form-label">Role Name</label>
        <div class="col-sm-6">
            <input type="text"  class="form-control" name="name" placeholder="Role Name"
                   value="@if($role->name){{ $role->name }}@endif" required
                   @if (Route::currentRouteName() == 'roles.show') readonly @endif>
        </div>
    </div>

    <h5>Permissions:</h5>


    <div class="form-group row">
        <label for="user" class="col-form-label col-sm-2">User</label>
        <div class="form-check-all col-sm-2">
            <input class="form-check-input check_all" type="checkbox"
                   @if (Route::currentRouteName() == 'roles.show') readonly @endif>
            <label class="form-check-label">Select all</label>
        </div>

        <div class="col-sm-8 row">
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="users.create"
                @if(in_array('users.create', $role_permissions)) checked @endif
                @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">Create</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="users.view"
                       @if(in_array('users.view', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">View</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="users.edit"
                       @if(in_array('users.edit', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">Update</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="users.delete"
                       @if(in_array('users.delete', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">Delete</label>
            </div>
        </div>
    </div>


    <div class="form-group row">
        <label for="user" class="col-form-label col-sm-2">Role</label>
        <div class="form-check-all col-sm-2">
            <input class="form-check-input check_all" type="checkbox"
                   @if (Route::currentRouteName() == 'roles.show') readonly @endif>
            <label class="form-check-label">Select all</label>
        </div>

        <div class="col-sm-8 row">
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="roles.create"
                       @if(in_array('roles.create', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">Create</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="roles.view"
                       @if(in_array('roles.view', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">View</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="roles.edit"
                       @if(in_array('roles.edit', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">Update</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="roles.delete"
                       @if(in_array('roles.delete', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">Delete</label>
            </div>
        </div>
    </div>



    <div class="form-group row">
        <label for="user" class="col-form-label col-sm-2">Category</label>
        <div class="form-check-all col-sm-2">
            <input class="form-check-input check_all" type="checkbox"
                   @if (Route::currentRouteName() == 'roles.show') readonly @endif>
            <label class="form-check-label">Select all</label>
        </div>

        <div class="col-sm-8 row">
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="categories.create"
                       @if(in_array('categories.create', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">Create</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="categories.view"
                       @if(in_array('categories.view', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">View</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="categories.edit"
                       @if(in_array('categories.edit', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">Update</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="categories.delete"
                       @if(in_array('categories.delete', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">Delete</label>
            </div>
        </div>
    </div>




    <div class="form-group row">
        <label for="user" class="col-form-label col-sm-2">Unit</label>
        <div class="form-check-all col-sm-2">
            <input class="form-check-input check_all" type="checkbox"
                   @if (Route::currentRouteName() == 'roles.show') readonly @endif>
            <label class="form-check-label">Select all</label>
        </div>

        <div class="col-sm-8 row">
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="units.create"
                       @if(in_array('units.create', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">Create</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="units.view"
                       @if(in_array('units.view', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">View</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="units.edit"
                       @if(in_array('units.edit', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">Update</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="units.delete"
                       @if(in_array('units.delete', $role_permissions)) checked @endif
                       @if (Route::currentRouteName() == 'roles.show') readonly @endif>
                <label class="form-check-label">Delete</label>
            </div>
        </div>
    </div>





</div>
<!-- /.card-body -->

<script>
    $(document).ready(function () {
        $(".form-check-all").each(function () {
            var checking = true;
            $(this).siblings().find("input[type='checkbox']").each(function () {
                if(!$(this).is(":checked")){
                    checking = false;
                }
            })
            if(checking){
                $(this).children(".form-check-input").prop( "checked", true )
            }
        })



        $(".check_all").click(function () {
            console.log(this)
            // alert("Checked")
            if ($(this).closest(".form-group").find(".form-check-input").prop("checked") == true){
                $(this).closest(".form-group").find(".form-check-input").each(function () {
                    console.log("Checked ");
                    $(this).prop("checked",true);
                })
            } else {
                $(this).closest(".form-group").find(".form-check-input").each(function () {
                    console.log("unChecked ");
                    $(this).prop("checked",false);
                })
            }
            // alert("Checked End")
        })

    })
</script>