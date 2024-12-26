<?php include 'db_connect.php'; ?>

<div class="reports-content">
  <h1>Course Report</h1>
  <div class="chart-container">
    <canvas id="courseChart"></canvas>
  </div>

  <h1>Event Report</h1>
  <div class="chart-container">
    <canvas id="eventChart"></canvas>
  </div>
</div>

<?php
// Fetch course data
$course_query = "SELECT field, COUNT(*) as count FROM course GROUP BY field";
$course_result = $conn->query($course_query);
$course_data = [];
if ($course_result->num_rows > 0) {
  while ($row = $course_result->fetch_assoc()) {
    $course_data[] = $row;
  }
}
$course_result->free();

// Fetch event data
$event_query = "SELECT type, COUNT(*) as count FROM event GROUP BY type";
$event_result = $conn->query($event_query);
$event_data = [];
if ($event_result->num_rows > 0) {
  while ($row = $event_result->fetch_assoc()) {
    $event_data[] = $row;
  }
}
$event_result->free();

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
  const courseData = <?php echo json_encode($course_data); ?>;
  const eventData = <?php echo json_encode($event_data); ?>;

  const courseLabels = courseData.map(item => item.field);
  const courseCounts = courseData.map(item => item.count);

  const eventLabels = eventData.map(item => item.type);
  const eventCounts = eventData.map(item => item.count);

  const courseCtx = document.getElementById('courseChart').getContext('2d');
  const courseChart = new Chart(courseCtx, {
    type: 'bar',
    data: {
      labels: courseLabels,
      datasets: [{
        label: '# of Courses',
        data: courseCounts,
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const eventCtx = document.getElementById('eventChart').getContext('2d');
  const eventChart = new Chart(eventCtx, {
    type: 'pie',
    data: {
      labels: eventLabels,
      datasets: [{
        label: '# of Events',
        data: eventCounts,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true
    }
  });
});
</script>
