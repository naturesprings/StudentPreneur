<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>StudentPreneur Team Profile</title>
  <link rel="stylesheet" href="style_03team.css" />
</head>

<body>
<?php session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}
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

  <div class="team-profile-page">
    <div class="latest-projects">
      <h2>Latest Projects</h2>
      <div class="project-cards">
        <div class="project-card">
          <img src="img/event-live1.jpeg" alt="Startup Platform" />
          <h3>DreamCreations</h3>
          <p>1st project</p>
          <button class="view-button" onclick="window.location.href='teammanagement.php';">View</button>
        </div>
        <div class="project-card">
          <img src="img/event-live2.jpeg" alt="NextWave" />
          <h3>SmartQuest</h3>
          <p>2nd project</p>
          <button class="view-button" onclick="window.location.href='teammanagement.php';">View</button>
        </div>
        <div class="project-card">
          <img src="img/event-live3.jpeg" alt="VisionPath" />
          <h3>project 3</h3>
          <p>3rd project</p>
          <button class="view-button">View</button>
        </div>
        <div class="project-card">
          <img src="img/event-live1.jpeg" alt="VisionPath" />
          <h3>project 4</h3>
          <p>4th project</p>
          <button class="view-button">View</button>
        </div>
      </div>
    </div>

    <div class="main-content">
      <div class="left-column">
        <div class="my-tasks">
          <h2>My Tasks</h2>
          <table id="taskTable">
            <thead>
              <tr>
                <th>Task Name</th>
                <th>Task Date</th>
                <th>Task Assignee</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="taskList"></tbody>
          </table>
          <button id="addTaskButton">Add Task</button>
        </div>
      </div>

      <div class="right-column">
        <div class="calendar">
          <div class="calendar-header">
            <button id="prevMonth">&lt;</button>
            <span id="currentMonthYear"></span>
            <button id="nextMonth">&gt;</button>
          </div>
          <div class="calendar-body">
            <div class="day-name">Sun</div>
            <div class="day-name">Mon</div>
            <div class="day-name">Tue</div>
            <div class="day-name">Wed</div>
            <div class="day-name">Thu</div>
            <div class="day-name">Fri</div>
            <div class="day-name">Sat</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="task-modal" id="taskModal">
    <div class="task-modal-content">
      <span class="close" id="closeModal">&times;</span>
      <h2>Add New Task</h2>
      <form id="taskForm">
        <label for="taskName">Task Name:</label>
        <input type="text" id="taskName" name="taskName" required /><br /><br />
        <label for="taskDate">Date:</label>
        <input type="date" id="taskDate" name="taskDate" required /><br /><br />
        <label for="taskAssignee">Assignee:</label>
        <input type="text" id="taskAssignee" name="taskAssignee" required /><br /><br />
        <button type="submit" id="saveTaskButton">Save</button>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const addTaskButton = document.getElementById("addTaskButton");
      const taskModal = document.getElementById("taskModal");
      const closeModal = document.getElementById("closeModal");
      const taskForm = document.getElementById("taskForm");
      const taskTableBody = document.getElementById("taskList");

      const calendar = document.querySelector(".calendar-body");
      const currentMonthYear = document.getElementById("currentMonthYear");
      const prevMonth = document.getElementById("prevMonth");
      const nextMonth = document.getElementById("nextMonth");

      let date = new Date();
      const monthNames = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
      ];

      function renderCalendar() {
        const year = date.getFullYear();
        const month = date.getMonth();
        currentMonthYear.textContent = `${monthNames[month]} ${year}`;
        calendar.innerHTML = "";

        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        for (let i = 0; i < 7; i++) {
          const dayName = document.createElement("div");
          dayName.className = "day-name";
          dayName.textContent = [
            "Sun",
            "Mon",
            "Tue",
            "Wed",
            "Thu",
            "Fri",
            "Sat",
          ][i];
          calendar.appendChild(dayName);
        }

        for (let i = 0; i < firstDay; i++) {
          const emptyCell = document.createElement("div");
          calendar.appendChild(emptyCell);
        }

        for (let i = 1; i <= lastDate; i++) {
          const dayCell = document.createElement("div");
          dayCell.className = "day-cell";
          dayCell.textContent = i;
          dayCell.addEventListener("click", () =>
            alert(`Selected date: ${year}-${month + 1}-${i}`)
          );
          calendar.appendChild(dayCell);
        }
      }

      prevMonth.addEventListener("click", () => {
        date.setMonth(date.getMonth() - 1);
        renderCalendar();
      });

      nextMonth.addEventListener("click", () => {
        date.setMonth(date.getMonth() + 1);
        renderCalendar();
      });

      renderCalendar();

      addTaskButton.addEventListener("click", function() {
        taskModal.style.display = "block";
      });

      closeModal.addEventListener("click", function() {
        taskModal.style.display = "none";
      });

      taskForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const taskName = document.getElementById("taskName").value;
        const taskDate = document.getElementById("taskDate").value;
        const taskAssignee = document.getElementById("taskAssignee").value;

        addTaskToTable(taskName, taskDate, taskAssignee);

        taskModal.style.display = "none";
        taskForm.reset();
      });

      function addTaskToTable(taskName, taskDate, taskAssignee) {
        const taskRow = document.createElement("tr");
        taskRow.innerHTML = `
                  <td>${taskName}</td>
                  <td>${taskDate}</td>
                  <td>${taskAssignee}</td>
                  <td class="task-actions">
                    <button class="editTask">Edit</button>
                    <button class="deleteTask">Delete</button>
                  </td>
                `;
        taskTableBody.appendChild(taskRow);

        const deleteButton = taskRow.querySelector(".deleteTask");
        deleteButton.addEventListener("click", function() {
          taskRow.remove();
        });

        const editButton = taskRow.querySelector(".editTask");
        editButton.addEventListener("click", editTaskHandler);
      }

      function editTaskHandler() {
        const editButton = this;
        const taskRow = editButton.parentElement.parentElement;
        const deleteButton = taskRow.querySelector(".deleteTask");

        if (editButton.textContent === "Edit") {
          const currentTaskName =
            taskRow.querySelector("td:nth-child(1)").innerText;
          const currentTaskDate =
            taskRow.querySelector("td:nth-child(2)").innerText;
          const currentTaskAssignee =
            taskRow.querySelector("td:nth-child(3)").innerText;

          const inputTaskName = document.createElement("input");
          inputTaskName.type = "text";
          inputTaskName.value = currentTaskName;

          const inputTaskDate = document.createElement("input");
          inputTaskDate.type = "date";
          inputTaskDate.value = currentTaskDate;

          const inputTaskAssignee = document.createElement("input");
          inputTaskAssignee.type = "text";
          inputTaskAssignee.value = currentTaskAssignee;

          taskRow.querySelector("td:nth-child(1)").innerHTML = "";
          taskRow.querySelector("td:nth-child(1)").appendChild(inputTaskName);

          taskRow.querySelector("td:nth-child(2)").innerHTML = "";
          taskRow.querySelector("td:nth-child(2)").appendChild(inputTaskDate);

          taskRow.querySelector("td:nth-child(3)").innerHTML = "";
          taskRow
            .querySelector("td:nth-child(3)")
            .appendChild(inputTaskAssignee);

          editButton.textContent = "Save";
          editButton.classList.add("saveTask");

          deleteButton.disabled = true;

          editButton.removeEventListener("click", editTaskHandler);
          editButton.addEventListener("click", saveTaskHandler);
        }
      }

      function saveTaskHandler() {
        const saveButton = this;
        const taskRow = saveButton.parentElement.parentElement;
        const deleteButton = taskRow.querySelector(".deleteTask");

        const inputTaskName = taskRow.querySelector("input[type='text']");
        const inputTaskDate = taskRow.querySelector("input[type='date']");
        const inputTaskAssignee = taskRow.querySelector("input[type='text']");

        const editedTaskName = inputTaskName.value;
        const editedTaskDate = inputTaskDate.value;
        const editedTaskAssignee = inputTaskAssignee.value;

        taskRow.querySelector("td:nth-child(1)").innerText = editedTaskName;
        taskRow.querySelector("td:nth-child(2)").innerText = editedTaskDate;
        taskRow.querySelector("td:nth-child(3)").innerText =
          editedTaskAssignee;

        saveButton.textContent = "Edit";
        saveButton.classList.remove("saveTask");

        deleteButton.disabled = false;

        saveButton.removeEventListener("click", saveTaskHandler);
        saveButton.addEventListener("click", editTaskHandler);
      }
    });
  </script>
  <footer>
    <p>&copy; 2024 StudentPreneur. All rights reserved.</p>
  </footer>
</body>

</html>