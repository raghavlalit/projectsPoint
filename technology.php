<?php
  include('header.php');

  $tech = $_GET['technology'];

  $technologies = "SELECT * FROM technologies WHERE technology='$tech'";
  $query = $conn->prepare($technologies);
  $query->execute();
  $technology = $query->fetch(PDO::FETCH_ASSOC);
?>

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2><?php echo ucfirst($technology['technology']); ?></h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li><a href="technologies.php">Technology</a></li>
          <li><?php echo $technology['technology']; ?></li>
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
            <h4>Technology - <?php echo ucfirst($technology['technology']); ?></h4>
            <ul class="text-left">
              <li><?php echo $technology['content']; ?></li>
            </ul>
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
