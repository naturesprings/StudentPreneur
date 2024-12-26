<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Project Management</title>
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

  <div class="manage-container">
    <h2>Manage Your Team Project</h2>
    <div class="manage-projects-bar" id="projects-bar">
      <h3>Projects</h3>
      <div id="projects">
        <div id="projects-list">
        </div>
        <button id="addProjectButton">+</button>
      </div>
    </div>
    <hr>
    <div class="manage-sprints-bar" id="sprints-bar">
      <h3>Sprints</h3>
      <div id="sprints">
        <div id="sprints-list"></div>
        <button id="addSprintButton">+</button>
      </div>
    </div>

    <div class="tasks" id="tasks">
      <div class="tasks-column" id="to-do">
        <h4>To-do<button class="addTask" data-status="to-do">+</button></h4>
      </div>
      <div class="tasks-column" id="in-progress">
        <h4>
          On progress<button class="addTask" data-status="in-progress">
            +
          </button>
        </h4>
      </div>
      <div class="tasks-column" id="review">
        <h4>Review<button class="addTask" data-status="review">+</button></h4>
      </div>
      <div class="tasks-column" id="done">
        <h4>Done<button class="addTask" data-status="done">+</button></h4>
      </div>
    </div>
  </div>

  <div class="modal" id="modal">
    <div class="modal-content">
      <span class="close" id="closeModal">&times;</span>
      <h3 id="modalTitle">Add New</h3>
      <form id="modalForm">
        <label for="modalInput">Name:</label>
        <input type="text" id="modalInput" name="name" required />
        <button type="submit" id="modalSubmitButton">Add</button>
      </form>
    </div>
  </div>

  <div class="task-modal" id="taskModal">
    <div class="task-modal-content">
      <span class="close" id="closeTaskModal">&times;</span>
      <h3>Add New Task</h3>
      <form id="taskForm">
        <label for="taskName">Task Name:</label>
        <input type="text" id="taskName" name="taskName" required />
        <label for="taskAssignee">Assignee:</label>
        <input type="text" id="taskAssignee" name="taskAssignee" required />
        <label for="taskDeadline">Deadline:</label>
        <input type="date" id="taskDeadline" name="taskDeadline" required />
        <label for="taskImage">Task Image:</label>
        <input type="file" id="taskImage" name="taskImage" accept="image/*" />
        <button type="submit">Add Task</button>
      </form>
    </div>
  </div>
  <footer>
    <p>&copy; 2024 StudentPreneur. All rights reserved.</p>
  </footer>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const addProjectButton = document.getElementById("addProjectButton");
      const addSprintButton = document.getElementById("addSprintButton");
      const modal = document.getElementById("modal");
      const closeModal = document.getElementById("closeModal");
      const modalForm = document.getElementById("modalForm");
      const modalInput = document.getElementById("modalInput");
      const modalTitle = document.getElementById("modalTitle");
      const modalSubmitButton = document.getElementById("modalSubmitButton");
      const projectsList = document.getElementById("projects-list");
      const sprintsList = document.getElementById("sprints-list");
      const taskModal = document.getElementById("taskModal");
      const closeTaskModal = document.getElementById("closeTaskModal");
      const taskForm = document.getElementById("taskForm");
      let currentProject = null;
      let currentSprint = null;
      let currentStatus = null;

      function openModal(type) {
        modal.style.display = "flex";
        modalTitle.textContent =
          type === "project" ? "Add New Project" : "Add New Sprint";
        modalSubmitButton.textContent =
          type === "project" ? "Add Project" : "Add Sprint";
        modalSubmitButton.dataset.type = type;
      }

      function closeModalHandler() {
        modal.style.display = "none";
      }

      function openTaskModal(event) {
        const status = event.target.dataset.status;
        if (!currentSprint) {
          alert("Please select a sprint first.");
          return;
        }
        currentStatus = status;
        taskModal.style.display = "flex";
      }

      function closeTaskModalHandler() {
        taskModal.style.display = "none";
      }

      function addProject(name) {
        const projectDiv = document.createElement("div");
        projectDiv.className = "project-item";
        projectDiv.textContent = name;
        projectDiv.addEventListener("click", () => {
          document
            .querySelectorAll(".project-item")
            .forEach((el) => el.classList.remove("active"));
          projectDiv.classList.add("active");
          currentProject = name;
          updateSprints();
          updateTasks();
        });
        projectsList.appendChild(projectDiv);
      }

      function addSprint(name) {
        const sprintDiv = document.createElement("div");
        sprintDiv.className = "sprint-item";
        sprintDiv.textContent = name;
        sprintDiv.addEventListener("click", () => {
          document
            .querySelectorAll(".sprint-item")
            .forEach((el) => el.classList.remove("active"));
          sprintDiv.classList.add("active");
          currentSprint = name;
          updateTasks();
        });
        sprintsList.appendChild(sprintDiv);
      }

      function addTaskToColumn(status, taskName, assignee, deadline, imageSrc) {
        const column = document.getElementById(status);
        const taskDiv = document.createElement("div");
        taskDiv.className = "task-item";
        taskDiv.innerHTML = `<div><strong>${taskName}</strong></div><div>Assignee: ${assignee}</div>
        <div>Deadline: ${deadline}</div>
        ${imageSrc ? `<img src="${imageSrc}" alt="Task image" class="task-image" />` : ""}`;
        column.appendChild(taskDiv);
      }

      function updateSprints() {
        const sprints = sprintsList.querySelectorAll(".sprint-item");
        sprints.forEach((sprint) => {
          sprint.style.display = currentProject ? "block" : "none";
          if (sprint.classList.contains("active")) {
            sprint.classList.add("active");
          }
        });
      }

      function updateTasks() {
        document.querySelectorAll(".tasks-column").forEach((column) => {
          column.innerHTML = column.querySelector("h4").outerHTML;
        });
        if (currentSprint) {
          document
            .querySelectorAll(".tasks-column .addTask")
            .forEach((button) => {
              button.disabled = !currentSprint;
            });
        }
        bindTaskButtons();
      }

      function bindTaskButtons() {
        const taskButtons = document.querySelectorAll(".addTask");
        taskButtons.forEach((button) => {
          button.addEventListener("click", openTaskModal);
        });
      }


      addProject("DreamCreations");
      addProject("SmartQuest");

      addProjectButton.addEventListener("click", () => openModal("project"));
      addSprintButton.addEventListener("click", () => {
        if (!currentProject) {
          alert("Please select a project first.");
          return;
        }
        openModal("sprint");
      });

      modalForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const name = modalInput.value.trim();
        if (modalSubmitButton.dataset.type === "project") {
          addProject(name);
        } else {
          addSprint(name);
        }
        closeModalHandler();
        modalForm.reset();
      });

      closeModal.addEventListener("click", closeModalHandler);

      bindTaskButtons();

      closeTaskModal.addEventListener("click", closeTaskModalHandler);

      taskForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const taskName = document.getElementById("taskName").value.trim();
        const taskAssignee = document.getElementById("taskAssignee").value.trim();
        const taskDeadline = document.getElementById("taskDeadline").value;
        const taskImageInput = document.getElementById("taskImage");
        const taskImageFile = taskImageInput.files[0];

        if (currentStatus && taskName && taskAssignee && taskDeadline) {
          let imageSrc = null;
          if (taskImageFile) {
            const reader = new FileReader();
            reader.onload = function(e) {
              imageSrc = e.target.result;
              addTaskToColumn(currentStatus, taskName, taskAssignee, taskDeadline, imageSrc);
            };
            reader.readAsDataURL(taskImageFile);
          } else {
            addTaskToColumn(currentStatus, taskName, taskAssignee, taskDeadline, imageSrc);
          }

          closeTaskModalHandler();
          taskForm.reset();
        }
      });
    });
  </script>
</body>

</html>