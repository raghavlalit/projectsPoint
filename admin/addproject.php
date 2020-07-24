<?php include('header.php');?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Project</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add New Project</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="backend_handler.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputText">Project Category</label>
                    <input type="text" name="project_category" class="form-control" id="exampleInputText" placeholder="Project Category">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText">Project Title</label>
                    <input type="text" name="project_title" class="form-control" id="exampleInputText" placeholder="Project Ttile">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText">Project Author</label>
                    <input type="text" name="project_author" class="form-control" id="exampleInputText" placeholder="Project Author">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Upload Project</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="project" id="InputFile">
                        <label class="custom-file-label" for="InputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="type" value="upload" class="btn btn-primary">Upload</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include('footer.php');?>
