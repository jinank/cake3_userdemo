      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Users
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo $this->request->webroot?>users/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Users</h3>
                  <?= $this->Html->link('Add User', ['action' => 'add'],['class'=>'btn btn-info btn-flat pull-right']) ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php foreach ($users as $key => $value) {?>
                      <tr>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->username;  ?></td>
                        <td><?php echo $value->created; ?></td>
                        <td>
                          <?= $this->Html->link('Edit', ['action' => 'edit', $value->id]) ?>
                          |  
                          <?= $this->Form->postLink('Delete',['action' => 'delete', $value->id],['confirm' => 'Are you sure?']) ?>
                        </td>
                      </tr>
                  <?php } ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     

    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
