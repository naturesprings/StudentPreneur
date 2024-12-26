<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style_01.css" />
  <title>StudentPreneur Events</title>
</head>

<body>
<?php session_start();?>
  <header>
    <nav>
      <div class="logo"><a href="post.php">StudentPreneur</a></div>
      <a href="post.php">Home</a>
      <a href="learning.php">Learning</a>
      <strong class="strong"><a href="event.php">Events</a></strong>
      <a href="globalConnections.php">Global Connections</a>
      <div class="icons">
        <a href="teamprofile.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
            <path d="M0-240v-63q0-43 44-70t116-27q13 0 25 .5t23 2.5q-14 21-21 44t-7 48v65H0Zm240 0v-65q0-32 17.5-58.5T307-410q32-20 76.5-30t96.5-10q53 0 97.5 10t76.5 30q32 20 49 46.5t17 58.5v65H240Zm540 0v-65q0-26-6.5-49T754-397q11-2 22.5-2.5t23.5-.5q72 0 116 26.5t44 70.5v63H780Zm-455-80h311q-10-20-55.5-35T480-370q-55 0-100.5 15T325-320ZM160-440q-33 0-56.5-23.5T80-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T160-440Zm640 0q-33 0-56.5-23.5T720-520q0-34 23.5-57t56.5-23q34 0 57 23t23 57q0 33-23 56.5T800-440Zm-320-40q-50 0-85-35t-35-85q0-51 35-85.5t85-34.5q51 0 85.5 34.5T600-600q0 50-34.5 85T480-480Zm0-80q17 0 28.5-11.5T520-600q0-17-11.5-28.5T480-640q-17 0-28.5 11.5T440-600q0 17 11.5 28.5T480-560Zm1 240Zm-1-280Z" />
          </svg></a>
        <a href="message.php"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
            <path d="M240-400h320v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z" />
          </svg></a>
        <a href="profile.php"> <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
            <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q53 0 100-15.5t86-44.5q-39-29-86-44.5T480-280q-53 0-100 15.5T294-220q39 29 86 44.5T480-160Zm0-360q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0-60Zm0 360Z" />
          </svg> </a>
        <a href="setup_team.php"><button class="teamup-btn">Team Up</button></a>
        <?php if (isset($_SESSION['user_id'])) : ?>
                <form action="logout.php" method="post" style="display:inline;">
                    <button type="submit" id="logout-btn">Logout</button>
                </form>
            <?php endif; ?>
      </div>
    </nav>
  </header>


  <?php
  require('model/database.php');
  require('model/live_db.php');
  require('model/workshop_db.php');


  $lives = get_lives(3);
  $workshops = get_workshops(3);
  ?>

  <main id="app">
    <section class="events-hero">
      <h1>Project Showcase</h1>
      <h2>Sustainable Fashion Startup</h2>
      <p>
        Join our main event next Friday where Team Green Threads will
        <br />showcase their innovative approach to sustainable fashion. Don't
        miss it!
      </p>
    </section>

    <section class="events-sessions">
      <h2>Upcoming Live Sessions</h2>
      <div class="events-sessions-container">
        <?php foreach ($lives as $live) : ?>
          <div class="events-session-card">
            <img src="<?php echo htmlspecialchars($live['image']); ?>" alt="<?php echo htmlspecialchars($live['title']); ?>" />
            <h3><?php echo htmlspecialchars($live['title']); ?></h3>
            <p><?php echo htmlspecialchars($live['date']); ?></p>
            <button><?php echo htmlspecialchars($live['buttonText']); ?></button>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="events-competition">
      <h2>Showcase Your Innovation, Compete for Glory!</h2>
      <p>
        Join our upcoming startup competitions and test your ideas. Compete
        for exciting prizes, gain valuable feedback, and connect with
        potential investors and collaborators.
      </p>
      <div class="events-competition-details">
        <h3>Startup Pitch Competition</h3>
        <img src="img/event-competition.jpeg" />
        <p>July 18, 2024, 3:00 PM</p>
        <button>Register Now</button>
        <p>Registration Deadline: July 15, 2024</p>
      </div>
    </section>

    <section class="events-workshops">
      <h2>Explore Our Interactive Workshops and Seminars</h2>
      <div class="events-workshops-search">
        <input type="text" placeholder="Search by topic or speaker..." />
        <select>
          <option value="">Type</option>
        </select>
        <select>
          <option value="">Time</option>
        </select>
        <button class="event-search">Search</button>
      </div>
      <div class="events-workshops-container">
        <?php foreach ($workshops as $workshop) : ?>
          <div class="events-workshop-card">
            <img src="<?php echo htmlspecialchars($workshop['image']); ?>" alt="<?php echo htmlspecialchars($workshop['title']); ?>" />
            <h3><?php echo htmlspecialchars($workshop['title']); ?></h3>
            <p><?php echo htmlspecialchars($workshop['date']); ?></p>
            <button><?php echo htmlspecialchars($workshop['buttonText']); ?></button>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
  </main>

  <?php include 'footer.php'; ?>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const sections = document.querySelectorAll('main section');
      
      const options = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
      };

      const callback = (entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('section-animated');
            observer.unobserve(entry.target);
          }
        });
      };

      const observer = new IntersectionObserver(callback, options);

      sections.forEach(section => {
        observer.observe(section);
      });
    });
  </script>
</body>

</html>