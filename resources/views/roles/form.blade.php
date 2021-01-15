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
            <input class="form-check-input check_all" type="checkbox">
            <label class="form-check-label">Select all</label>
        </div>

        <div class="col-sm-8 row">
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="users.create">
                <label class="form-check-label">Create</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="users.view">
                <label class="form-check-label">View</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="users.edit">
                <label class="form-check-label">Update</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="users.delete">
                <label class="form-check-label">Delete</label>
            </div>
        </div>
    </div>


    <div class="form-group row">
        <label for="user" class="col-form-label col-sm-2">Role</label>
        <div class="form-check-all col-sm-2">
            <input class="form-check-input check_all" type="checkbox">
            <label class="form-check-label">Select all</label>
        </div>

        <div class="col-sm-8 row">
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="roles.create">
                <label class="form-check-label">Create</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="roles.view">
                <label class="form-check-label">View</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="roles.edit">
                <label class="form-check-label">Update</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="roles.delete">
                <label class="form-check-label">Delete</label>
            </div>
        </div>
    </div>



    <div class="form-group row">
        <label for="user" class="col-form-label col-sm-2">Category</label>
        <div class="form-check-all col-sm-2">
            <input class="form-check-input check_all" type="checkbox">
            <label class="form-check-label">Select all</label>
        </div>

        <div class="col-sm-8 row">
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="categories.create">
                <label class="form-check-label">Create</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="categories.view">
                <label class="form-check-label">View</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="categories.edit">
                <label class="form-check-label">Update</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="categories.delete">
                <label class="form-check-label">Delete</label>
            </div>
        </div>
    </div>




    <div class="form-group row">
        <label for="user" class="col-form-label col-sm-2">Unit</label>
        <div class="form-check-all col-sm-2">
            <input class="form-check-input check_all" type="checkbox">
            <label class="form-check-label">Select all</label>
        </div>

        <div class="col-sm-8 row">
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="units.create">
                <label class="form-check-label">Create</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="units.view">
                <label class="form-check-label">View</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="units.edit">
                <label class="form-check-label">Update</label>
            </div>
            <div class="form-check col-sm-3">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="units.delete">
                <label class="form-check-label">Delete</label>
            </div>
        </div>
    </div>





</div>
<!-- /.card-body -->

<script>
    $(document).ready(function () {
        $(".check_all").click(function () {
            console.log(this)
            console.log("clicked ");

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