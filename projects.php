<?php
  include('header.php');
  $category = $_GET['category'];
  $php_projects = "SELECT * FROM projects WHERE project_category='$category'";
  $query = $conn->prepare($php_projects);
  $query->execute();
  $projects = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2><?php echo $category; ?> Projects</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li><?php echo $category; ?> Projects</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->
  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="row">
        <?php
        foreach ($projects as $project) {

        ?>
        <div class="col-md-8">
          <div class="icon-box">
            <i class="icofont-file-php"></i>
            <h4><a href="project.php?id=<?php echo $project['id']; ?>"><?php echo $project['project_title']; ?></a></h4>
          </div>
        </div>

      <?php } ?>
      </div>

    </div>
  </section><!-- End Services Section -->
</main><!-- End #main -->
<!-- ======= Footer ======= -->
<?php include('footer.php');?>
<!-- End Footer -->
