<!-- Add New -->
<div class="modal fade" ID="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hIDden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hIDden="true">&times;</button>
                <center><h4 class="modal-title" ID="myModalLabel">Add New</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluID">
			<form method="POST" action="add.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Name" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">CountryCode:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="CountryCode" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Population:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Population" required>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>

        </div>
    </div>
</div>