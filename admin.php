<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="styleadmin.css">
</head>

<body>
<header>
        <nav>
            <div class="logo"><a href="homepage.php">StudentPreneur</a></div> 
        </nav>
    </header>

  <div class="main-content">
    <aside class="sidebar-content">
      <div class="sidebar-header">
        <a href="admin.php" class="heading">
          <h1>Admin Dashboard</h1>
        </a>
      </div>
      <div class="sidebar-menu">
        <nav class="nav-menu">
          <ul class="nav-treeview" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="#" class="nav-link" id="courses-toggle">
                <p>Courses<span class="toggle-icon">▶</span></p>
              </a>
              <ul class="nav-treeview" id="courses-menu">
                <li class="nav-item">
                  <a href="admin.php?page=course_list" class="nav-link">
                    <p>Course List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="admin.php?page=add_course" class="nav-link">
                    <p>Add New Course</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" id="events-toggle">
                <p>Events<span class="toggle-icon">▶</span>
                </p>
              </a>
              <ul class="nav-treeview" id="events-menu">
                <li class="nav-item">
                  <a href="admin.php?page=event_list" class="nav-link">
                    <p>Event List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="admin.php?page=add_event" class="nav-link">
                    <p>Add New Event</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="admin.php?page=report" class="nav-link">
                <p>Get Report</p>
              </a>
            </li>
            <li class="nav-item">
              <form action="admin_logout.php" method="post" style="display:inline;">
                <button type="submit" id="logout-btn">Logout</button>
              </form>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <div class="content">
      <?php
      $page = isset($_GET['page']) ? $_GET['page'] : '';
      switch ($page) {
        case 'course_list':
          include 'course_list.php';
          break;
        case 'add_course':
          include 'add_course.php';
          break;
        case 'manage_course':
          include 'manage_course.php';
          break;
        case 'event_list':
          include 'event_list.php';
          break;
        case 'add_event':
          include 'add_event.php';
          break;
        case 'report':
          include 'reports.php';
          break;
        default:
          echo '<h1 class="dashboard-title">Welcome to Admin Dashboard</h1>';
          echo '<p class="dashboard-description">Select an option from the sidebar to manage courses and events.</p>';
          break;
      }
      ?>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const coursesToggle = document.getElementById('courses-toggle');
      const coursesMenu = document.getElementById('courses-menu');
      const eventsToggle = document.getElementById('events-toggle');
      const eventsMenu = document.getElementById('events-menu');

      coursesMenu.style.display = 'none';
      eventsMenu.style.display = 'none';

      coursesToggle.addEventListener('click', function(event) {
        event.preventDefault();
        toggleMenu(coursesMenu, coursesToggle);
      });

      eventsToggle.addEventListener('click', function(event) {
        event.preventDefault();
        toggleMenu(eventsMenu, eventsToggle);
      });

      function toggleMenu(menu, toggleButton) {
        if (menu.style.display === 'block') {
          menu.style.display = 'none';
          toggleButton.querySelector('.toggle-icon').textContent = '▶';
        } else {
          menu.style.display = 'block';
          toggleButton.querySelector('.toggle-icon').textContent = '▼';
        }
      }
    });
  </script>
</body>

</html>