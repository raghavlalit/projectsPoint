<?php
include('header.php');

$projects_category = "SELECT * FROM project_categories";
$query = $conn->prepare($projects_category);
$query->execute();
$projects = $query->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($projects); die;
?>


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
                    <label>Project Category</label>
                    <select class="form-control" name="project_category" placeholder="Project Category">
                      <option>Select Category</option>
                      <?php foreach ($projects as $key => $project_category) {
                        ?><option><?php echo $project_category['category']; ?></option>
                      <?php } ?>
                    </select>
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
                    <label for="exampleInputText">Project URL Name</label>
                    <input type="text" name="project_url" class="form-control" id="exampleInputText" placeholder="Project URL Name">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputText">Project GitHub Link</label>
                    <input type="text" name="github_link" class="form-control" id="exampleInputText" placeholder="Project GitHub Link">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText">Project YouTube Demo Link</label>
                    <input type="text" name="youtube_demo_link" class="form-control" id="exampleInputText" placeholder="Project YouTube Demo Link">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputText">Language Used</label>
                    <input type="text" name="language_used" class="form-control" id="exampleInputText" placeholder="Language Used">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText">Database Used</label>
                    <input type="text" name="database_used" class="form-control" id="exampleInputText" placeholder="Database Used">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText">Frountend Languages</label>
                    <input type="text" name="frontend" class="form-control" id="exampleInputText" placeholder="Frontend Languages">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputText">Description</label>
                    <textarea type="text" name="description" class="form-control" id="exampleInputText" placeholder="Description"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="type" value="add_project" class="btn btn-primary">Upload</button>
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
