<?php
  include('header.php');

  $project_id = $_GET['id'];

  $projects = "SELECT * FROM projects WHERE id='$project_id'";
  $query = $conn->prepare($projects);
  $query->execute();
  $project = $query->fetch(PDO::FETCH_ASSOC);
?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2><?php echo $project['project_title']; ?></h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li><?php echo $project['project_title']; ?></li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->
  <!-- ======= Services Section ======= -->
  <section id="pricing" class="pricing">
    <div class="container">

      <div class="row">
        <div class="col-lg-9">
          <div class="box">
            <h4>Project - <?php echo $project['project_title']; ?></h4>
            <ul>
              <li>Category - <?php echo $project['project_category']; ?></li>
              <li>Language Used - <?php echo $project['language_used']; ?></li>
              <li>Frontend Used - <?php echo $project['frontend']; ?></li>
              <li>Database Used - <?php echo $project['database_used']; ?></li>
              <li>Description - <?php echo $project['description']; ?></li>
            </ul>

            <h4>How to setup:-</h4>
            <ul>
              <li><strong>URL - </strong>http://localhost/<?php echo $project['project_url_name']; ?></li>
              <li><strong>admin username - </strong>admin@123.com</li>
              <li><strong>admin password - </strong>admin@123</li>
              <li>download project, upload database in phpmyadmin and run your project using above URL</li>
            </ul>
            <div class="btn-wrap">
              <a href="localhost/projects_point/uploads/<?php echo $project['project_name']; ?>" class="btn-buy">Download Now</a>
              <a href="#" class="btn-buy">View Demo</a>
            </div>
          </div>

        </div>
        <div class="col-lg-3">
          
        </div>
      </div>

    </div>
  </section><!-- End Services Section -->
</main><!-- End #main -->
<!-- ======= Footer ======= -->
<?php include('footer.php');?>
<!-- End Footer -->
