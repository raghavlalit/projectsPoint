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
          <li><a href="projects.php?category=<?php echo $project['project_category']; ?>"><?php echo $project['project_category']; ?></a></li>
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
            <ul class="text-left">
              <li><b>Category -</b> <?php echo $project['project_category']; ?></li>
              <li><b>Language Used -</b> <?php echo $project['language_used']; ?></li>
              <li><b>Frontend Used -</b> <?php echo $project['frontend']; ?></li>
              <li><b>Database Used -</b> <?php echo $project['database_used']; ?></li>
              <li><b>Description -</b> <?php echo htmlspecialchars_decode($project['description']); ?></li>
            </ul>
            <div class="btn-wrap">
              <a href="<?php echo $project['github_link']; ?>" class="btn-buy" target="_blank">Download Now</a>
              <a href="<?php echo $project['youtube_demo_link']; ?>" class="btn-buy" target="_blank">View Demo</a>
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
