<?php
  include('header.php');

  $project_id = $_GET['id'];

  $php_projects = "SELECT * FROM projects WHERE id='$project_id'";
  $query = $conn->prepare($php_projects);
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
  <section id="services" class="services">
    <div class="container">

      <div class="row">
        <div class="col-lg-12">
          <h1>Project - <?php echo $project['project_title']; ?></h1>
          <h3>Category - <?php echo $project['project_category']; ?></h3>
          <p>Language Used - <?php echo $project['language_used']; ?></p>
          <p>Frontend Languages - <?php echo $project['frontend']; ?></p>
          <p>Database Used - <?php echo $project['database_used']; ?></p>
          <p>Description - <?php echo $project['description']; ?> </p>
          <p>Download Project - <a href="localhost/projects_point/uploads/<?php echo $project['project_name']; ?>"><?php echo $project['project_title']; ?></a> </p>
          <h3>How to run the project:-</h3>
          <p><strong>URL - </strong>http://localhost/<?php echo $project['project_url_name']; ?></br>
            <strong>admin username - </strong>admin</br>
            <strong>admin password - </strong>admin@123</br>
            download project, upload database in phpmyadmin and run your project
          </p>
        </div>
      </div>

    </div>
  </section><!-- End Services Section -->
</main><!-- End #main -->
<!-- ======= Footer ======= -->
<?php include('footer.php');?>
<!-- End Footer -->
