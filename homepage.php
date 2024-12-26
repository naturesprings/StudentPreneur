<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>StudentPreneur</title>
  <link rel="stylesheet" href="style_02.css" />
</head>

<body>
  <div id="app">
    <?php
    require('model/database.php');
    require('model/course_db.php');
    require('model/mentor_db.php');
    require('model/live_db.php');

    $courses = get_courses();
    $mentors = get_mentors();
    $lives = get_lives(3);
    ?>
    <header>
      <nav>
        <div class="logo">StudentPreneur</div>
        <a href="learning.php">Learning</a>
        <a href="event.php">Events</a>
        <a href="globalConnections.php">Global Connections</a>
        <a href="setup_team.php"><button class="teamup-btn">Team Up</button></a>
      </nav>
    </header>
    <div class="homeCover">
      <h1>Turn your ideas into reality</h1>
      <button @click="signIn">Join us now</button>
    </div>

    <!-- Mentors -->
    <section class="mentors">
      <h2>Meet Our Entrepreneurial Mentors</h2>
      <div class="slide-container">
        <button class="prev" @click="prevSlide">&#10094;</button>
        <div class="mentor-slide">
          <?php foreach ($mentors as $mentor) : ?>
            <div class="mentor-card" key="<?php echo $mentor['id']; ?>">
              <img src="<?php echo htmlspecialchars($mentor['avatar']); ?>" alt="mentor" />
              <h3><?php echo htmlspecialchars($mentor['name']); ?></h3>
              <p><?php echo htmlspecialchars($mentor['description']); ?></p>
              <button style="padding: 6px 10px; border: none; background-color: #686868; color: white; font-size: 12px; border-radius: 10px; cursor: pointer;"
              @click="bookSession()">Book a Session</button>
            </div>
          <?php endforeach; ?>
        </div>
        <button class="next" @click="nextSlide">&#10095;</button>
      </div>
      <div class="dots">
        <span v-for="(dot, index) in dots" :key="index" :class="{'dot': true, 'active': index === currentSlide}" @click="setSlide(index)"></span>
      </div>
    </section>

    <!-- Live Session -->
    <section class="live-session">
      <h2>Start Your Live Session</h2>
      <div class="live-list">
        <?php foreach ($lives as $live) : ?>
          <div class="session-card" key="<?php echo $live['id']; ?>">
            <img src="<?php echo htmlspecialchars($live['image']); ?>" alt="live" />
            <h3><?php echo htmlspecialchars($live['title']); ?></h3>
            <p><?php echo htmlspecialchars($live['date']); ?></p>
            <button @click="remindMe()">Remind Me</button>
            <button @click="joinSession()">Join this Session</button>
          </div>
        <?php endforeach; ?>
      </div>
    </section>


    <!-- Global Connections -->
    <section class="global-connections">
      <h2>Discover Global Connections</h2>
      <div class="map">
        <img src="img/connection.png" />
      </div>
    </section>

    <footer>
      <p>&copy; 2024 StudentPreneur. All rights reserved.</p>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
  <script>
    new Vue({
      el: "#app",
      data: {
        currentSlide: 0,
        mentors: <?php echo json_encode($mentors); ?>,
      },
      computed: {
        dots() {
          return this.mentors.length;
        },
      },
      methods: {
        signIn() {
          window.location.href = 'login.php';
        },
        bookSession() {
          window.location.href = 'learning.php';
        },
        remindMe() {
          window.location.href = 'event.php';
        },
        joinSession() {
          window.location.href = 'event.php';
        },
        nextSlide() {
          if (this.currentSlide < this.dots - 1) {
            this.currentSlide++;
          }
        },
        prevSlide() {
          if (this.currentSlide > 0) {
            this.currentSlide--;
          }
        },
        setSlide(index) {
          this.currentSlide = index;
        },
      },
      watch: {
        currentSlide(newVal) {
          const slider = this.$el.querySelector(".mentor-slide");
          slider.style.transform = `translateX(-${newVal * 100}%)`;
        },
      },
    });
  </script>

</body>

</html>