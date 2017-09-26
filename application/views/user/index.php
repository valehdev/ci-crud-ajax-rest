<div class="container">
    <div class="alert alert-success" style="display: none">

    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="show_users"></tbody>
            </table>
            <button id="add_user" class="btn btn-primary">Add</button>
            <!-- <nav aria-label="...">
                <ul class="pagination">
                    <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                    <li class="active"><a href="#" data-id="">1 <span class="sr-only">(current)</span></a></li>
                    <li><a href="javascript(void);" data-id="5">2 <span class="sr-only">(current)</span></a></li>
                </ul>
            </nav> -->
        </div>
    </div>

</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <form id="userAddForm" method="post" class="form-horizontal" action="">

                    <div class="form-group">
                        <label for="username" class="label-control col-md-4">Username</label>
                        <div class="col-md-8">
                            <input type="text" name="username" size="50" class="form-control" data-validation="length" data-validation-length="3-255" />
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="password" class="label-control col-md-4">Password</label>
                        <div class="col-md-8">
                            <input type="password" name="password" size="50" class="form-control" data-validation="length strength" data-validation-length="3-255" data-validation-strength="2" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="label-control col-md-4">Email</label>
                        <div class="col-md-8">
                            <input id="email" type="email" name="email" size="50" class="form-control" data-validation="email" />
                            <span id="email_status" class="help-block"></span>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="user_save" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="deleteUserModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirm Modal</h4>
            </div>
            <div class="modal-body">
                Are you sure delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="user_delete" type="button" class="btn btn-danger">Delete</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?= base_url('templates/assets/js/user.js') ?>"></script>
