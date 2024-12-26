<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style_01.css" />
  <title>StudentPreneur Resource</title>
</head>

<body>
  <?php
  require('model/database.php');
  require('model/investor_db.php');
  require('model/funding_db.php');
  require('model/supplier_db.php');

  session_start();

  $investors = get_investors(3);
  $fundings = get_fundings(3);
  $suppliers = get_suppliers(3);
  ?>
  <header>
    <nav>
      <div class="logo"><a href="post.php">StudentPreneur</a></div>
      <a href="post.php">Home</a>
      <a href="learning.php">Learning</a>
      <a href="event.php">Events</a>
      <a href="globalConnections.php">Global Connections</a>
      <div class="icons">
        <a href="teamprofile.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
            <path d="M0-240v-63q0-43 44-70t116-27q13 0 25 .5t23 2.5q-14 21-21 44t-7 48v65H0Zm240 0v-65q0-32 17.5-58.5T307-410q32-20 76.5-30t96.5-10q53 0 97.5 10t76.5 30q32 20 49 46.5t17 58.5v65H240Zm540 0v-65q0-26-6.5-49T754-397q11-2 22.5-2.5t23.5-.5q72 0 116 26.5t44 70.5v63H780Zm-455-80h311q-10-20-55.5-35T480-370q-55 0-100.5 15T325-320ZM160-440q-33 0-56.5-23.5T80-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T160-440Zm640 0q-33 0-56.5-23.5T720-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T800-440Zm-320-40q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-600q0 50-34.5 85T480-480Zm0-80q17 0 28.5-11.5T520-600q0-17-11.5-28.5T480-640q-17 0-28.5 11.5T440-600q0 17 11.5 28.5T480-560Zm1 240Zm-1-280Z" />
          </svg></a>
        <a href="message.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
            <path d="M240-400h320v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z" />
          </svg></a>
        <a href="profile.php">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
            <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
          </svg>
        </a>
        <a href="setup_team.php"><button class="teamup-btn">Team Up</button></a>
        <?php if (isset($_SESSION['user_id'])) : ?>
          <form action="logout.php" method="post" style="display: inline">
            <button type="submit" id="logout-btn">Logout</button>
          </form>
        <?php endif; ?>
      </div>
    </nav>
  </header>

  <div class="home">
    <div class="background-image">
      <img src="img/11.jpg" alt="Background Image" />
      <h2>
        Discover how our investors have fueled <br />SuccessStories in
        startups.
      </h2>
    </div>
    <div class="slideshow">
      <div class="slide">
        <img src="img/mentor1.png" alt="Slide Image 1" />
        <p>Michael Chen</p>
        <p>Heaalthcare Innovations</p>
      </div>
      <div class="slide">
        <img src="img/mentor3.png" alt="Slide Image 2" />
        <p>Anna Zhang</p>
        <p>Digital Healthcare Solutions</p>
      </div>
      <div class="slide">
        <img src="img/mentor4.png" alt="Slide Image 3" />
        <p>Emily Johnson</p>
        <p>Sustainable Technologies</p>
      </div>
    </div>
  </div>

  <section id="resource-main">
    <div class="investor">
      <h2>Featured Investor Profiles</h2>
      <div class="investor-profile">
        <?php foreach ($investors as $investor) : ?>
          <div class="resource-card" key="<?php echo $investor['id']; ?>">
            <div class="profile-content">
              <img id="avatar" src="<?php echo htmlspecialchars($investor['avatar']); ?>" alt="img" />
              <div class="text-content">
                <p class="investor-p"><?php echo htmlspecialchars($investor['name']); ?></p>
                <p class="investor-p">Expert in <?php echo htmlspecialchars($investor['field']); ?></p>
              </div>
            </div>
            <a href="under_construction.php" class="supplier_view">View</a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="funding">
      <h2>Current Funding Opportunities</h2>
      <div class="fundings-profile">
        <?php foreach ($fundings as $funding) : ?>
          <div class="resource-card" key="<?php echo $funding['id']; ?>">
            <p>Funding Project:</p>
            <p>Funding Amount: <?php echo htmlspecialchars($funding['amount']); ?></p>
            <p>Investment Field: <?php echo htmlspecialchars($funding['field']); ?></p>

            <p>Application Deadline: <?php echo htmlspecialchars($funding['deadline']); ?></p>
            <a href="under_construction.php" class="supplier_view">View</a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="supplier">
      <h2>Global Suppliers</h2>
      <div class="supplier-profile">
        <?php foreach ($suppliers as $supplier) : ?>
          <div class="resource-card" key="<?php echo $supplier['id']; ?>">
            <p>Supplier Name: <?php echo htmlspecialchars($supplier['name']); ?></p>
            <p>Supplier Field: <?php echo htmlspecialchars($supplier['field']); ?></p>
            <p>Supplier Country/Area: <?php echo htmlspecialchars($supplier['country']); ?></p>
            <a href="under_construction.php" class="supplier_view">View</a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>
  <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll(".slide");
    const totalSlides = slides.length;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.display = i === index ? "block" : "none";
      });
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % totalSlides;
      showSlide(currentSlide);
    }

    showSlide(currentSlide);
    setInterval(nextSlide, 3000);
  </script>
</body>

</html>