<div class="container">
    <div class="alert alert-success" style="display: none">

    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="show_customers">

                </tbody>
            </table>
            <button id="add_customer" class="btn btn-primary">Add</button>
        </div>
    </div>
</div>

<div id="customerModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <form id="customerAddForm" method="post" class="form-horizontal" action="">

                    <div class="form-group">
                        <label for="name" class="label-control col-md-4">Name</label>
                        <div class="col-md-8">
                            <input type="text" name="name" size="50" class="form-control" />
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="lastname" class="label-control col-md-4">Lastname</label>
                        <div class="col-md-8">
                            <input type="text" name="lastname" size="50" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="label-control col-md-4">Email</label>
                        <div class="col-md-8">
                            <input id="email" type="email" name="email" size="50" class="form-control" />
                            <span id="email_status" class="help-block"></span>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="customer_save" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?= base_url('templates/assets/js/customer.js') ?>"></script>
