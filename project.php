<?php
  include('header.php');
  $php_projects = "SELECT * FROM projects WHERE project_category='php'";
  $query = $conn->prepare($php_projects);
  $query->execute();
  $projects = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Project</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Project</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->
  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="row">

      </div>

    </div>
  </section><!-- End Services Section -->
</main><!-- End #main -->
<!-- ======= Footer ======= -->
<?php include('footer.php');?>
<!-- End Footer -->
