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
      <!-- left column -->
      <div class="col-md-6"><!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit User</h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <?php $this->Form->create() ?>
          <div class="box-body">
              <?php echo $this->Form->input('name', ['required' => false,'placeholder'=>'Enter email','label'=>'User Name','id'=>'name','class'=>'form-control','div'=>['class'=>'form-group']]);?>
              <?php echo $this->Form->input('name', ['required' => false,'placeholder'=>'Enter Score','label'=>'Score','id'=>'score','class'=>'form-control','div'=>['class'=>'form-group']]);?>              
            </div><!-- /.box-body -->

            <div class="box-footer">
              <?php echo $this->Form->button('Submit',['class'=>'btn btn-primary']);?>
            </div>
          <?php echo $this->Form->end();?>
        </div><!-- /.box -->
      </div>
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->