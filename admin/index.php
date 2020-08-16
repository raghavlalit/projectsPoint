<?php
include('header.php');
// include('con_pdo.php');

$users  = "SELECT * FROM users";
$user_query = $conn->prepare($users);
$user_query->execute();
$all_users = $user_query->fetchAll(PDO::FETCH_ASSOC);
$user_count = count($all_users);

$sql  = "SELECT * FROM projects";
$query = $conn->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$project_count = count($result);
// echo "<pre>";
// print_r($result); die;

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $project_count;?></h3>

                <p>Projects Completed</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="addproject.php" class="small-box-footer">Add New <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $user_count; ?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="adduser.php" class="small-box-footer">Add New <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>
                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main content -->
        <section class="content">
        <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Filter Users</h4>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                   <!-- form start -->
                    <form role="form" action="backend_handler.php" method="post" enctype="multipart/form-data">
                      <div class="card-body row">
                        <div class="form-group col-4">
                          <input type="text" name="project_title" class="form-control" id="exampleInputText" placeholder="Project Title">
                        </div>
                        <div class="form-group col-4">
                          <select type="text" name="project_type" class="form-control" id="exampleInputText">
                            <option>Select Project Type</option>
                            <option>php</option>
                            <option>python</option>
                            <option>student</option>
                            <option>misc</option>
                          </select>
                        </div>
                        <div class="form-group col-3">
                          <button type="submit" name="type" value="filter_users" class="btn btn-primary btn-block">Filter</button>
                        </div>

                      </div>
                      <!-- /.card-body -->
                    </form>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Projects</h3>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped projects">
                  <thead>
                      <tr>
                          <th style="width: 2%">

                          </th>
                          <th style="width: 20%">
                              Project Title
                          </th>
                          <th style="width: 20%">
                              Project Category
                          </th>
                          <th style="width: 15%">
                              Project Lead
                          </th>
                          <th style="width: 15%">
                              Project URL
                          </th>
                          <th style="width: 8%" class="text-center">
                              Status
                          </th>
                          <th style="width: 20%" class="text-center">
                            Action
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($result as $single_project) {
                      $single_project_json = json_encode($single_project);
                       ?>
                      <tr>
                          <td>
                              <?php echo $i;?>
                          </td>
                          <td>
                              <a><?php echo $single_project['project_title'];?></a>
                              <br/>
                              <small> Created at:- <?php echo $single_project['created_at'];?></small>
                          </td>
                          <td>
                            <a><?php echo $single_project['project_category'];?></a>
                          </td>
                          <td>
                            <a><?php echo $single_project['project_author'];?></a>
                          </td>
                          <td>
                            <a><?php echo $single_project['project_url_name'];?></a>
                          </td>
                          <td class="project-state">
                              <span class="badge badge-success">Active</span>
                          </td>
                          <td class="project-actions text-right">

                              <a class="btn btn-info btn-sm" href="editproject.php?project=<?php echo base64_encode($single_project_json); ?>">
                                  <i class="fas fa-pencil-alt">
                                  </i>
                                  Edit
                              </a>
                              <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_project" href="#">
                                  <i class="fas fa-trash">
                                  </i>
                                  Delete
                              </a>
                          </td>
                      </tr>
                    <?php $i++; }  ?>

                  </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <!-- Modal -->
            <div class="modal fade" id="delete_project" tabindex="-1" role="dialog" aria-labelledby="delete_projectLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="delete_projectLabel">Delete Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h3>Do you want to delete this project ?</h>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger"><a href="deleteproject.php?delete_project=<?php echo $single_project['id'];?>" class="text-white">Delete</a></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->

        </section>
        <!-- /.content -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include('footer.php');?>
