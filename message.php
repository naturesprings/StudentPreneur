<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>StudentPreneur</title>
  <link rel="stylesheet" href="style_02.css" />
</head>

<body>

  <?php
  require('model/database.php');
  require('model/user_db.php');

  session_start();

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
  <main id="app" class="container">
    <section class="sidebar">
      <input type="text" class="search-bar" placeholder="Search" />
      <div class="my-team">
        <h2>My Team</h2>
        <div class="team-group">
          <div class="team-item active">
            <div class="team-name">DreamCreations</div>
            <div class="team-last-message">
              <span>Today, 9:02</span>
              <p>Thanks, everyone! Let's make sure...</p>
            </div>
          </div>
          <div class="team-item">
            <div class="team-name">Workspace</div>
            <div class="team-last-message">
              <span>8:02</span>
              <p>Maya uploaded 'Project_Plan_Revision.pd...</p>
            </div>
          </div>
        </div>
      </div>
      <div class="people">
        <h2>People</h2>
        <div class="person">
          <div class="person-name">Javier</div>
          <div class="person-last-message">
            <span>Today, 8:52</span>
            <p>Got the latest updates in. Can you...</p>
          </div>
        </div>
        <div class="person">
          <div class="person-name">Damon</div>
          <div class="person-last-message">
            <span>Today, 7:21</span>
            <p>Just saw the revised marketing pl...</p>
          </div>
        </div>
        <div class="person">
          <div class="person-name">Sammy</div>
          <div class="person-last-message">
            <span>Yesterday, 20:02</span>
            <p>Thank you for today! The insights...</p>
          </div>
        </div>

        <div class="person">
          <div class="person-name">Carl</div>
          <div class="person-last-message">
            <span>18 June, 8:02</span>
            <p>If you check and give feedbacks...</p>
          </div>
        </div>
      </div>
    </section>
    <section class="chat-section">
      <div class="chat-header">
        <div class="chat-title">DreamCreations</div>
        <div class="chat-status">Online - Last seen, 9:20</div>
        <div class="chat-actions">
          <button class="action-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
              <path d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z" />
            </svg></button>
          <button class="action-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
              <path d="M360-320h80v-120h120v-80H440v-120h-80v120H240v80h120v120ZM160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h480q33 0 56.5 23.5T720-720v180l160-160v440L720-420v180q0 33-23.5 56.5T640-160H160Zm0-80h480v-480H160v480Zm0 0v-480 480Z" />
            </svg></button>
          <button class="action-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
              <path d="M480-160q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm0-240q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm0-240q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Z" />
            </svg></button>
        </div>
      </div>
      <div class="chat-messages" id="chat-messages">
        <div class="message">
          <div class="message-info">
            <strong>Zimu</strong> <span>Today, 8:30</span>
          </div>
          <p>
            Hey, just a quick update: the prototype for our interface
            is ready for review. Please check it out and give your feedback by
            Friday!
          </p>
        </div>
      </div>
      <div class="chat-input">
        <input type="text" id="message-input" placeholder="Type your message..." />
        <button id="send-button" class="btn-send">Send</button>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
          <path d="M620-520q25 0 42.5-17.5T680-580q0-25-17.5-42.5T620-640q-25 0-42.5 17.5T560-580q0 25 17.5 42.5T620-520Zm-280 0q25 0 42.5-17.5T400-580q0-25-17.5-42.5T340-640q-25 0-42.5 17.5T280-580q0 25 17.5 42.5T340-520Zm140 260q68 0 123.5-38.5T684-400H276q25 63 80.5 101.5T480-260Zm0 180q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Z" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
          <path d="M480-400q-50 0-85-35t-35-85v-240q0-50 35-85t85-35q50 0 85 35t35 85v240q0 50-35 85t-85 35Zm0-240Zm-40 520v-123q-104-14-172-93t-68-184h80q0 83 58.5 141.5T480-320q83 0 141.5-58.5T680-520h80q0 105-68 184t-172 93v123h-80Zm40-360q17 0 28.5-11.5T520-520v-240q0-17-11.5-28.5T480-800q-17 0-28.5 11.5T440-760v240q0 17 11.5 28.5T480-480Z" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
          <path d="M720-330q0 104-73 177T470-80q-104 0-177-73t-73-177v-370q0-75 52.5-127.5T400-880q75 0 127.5 52.5T580-700v350q0 46-32 78t-78 32q-46 0-78-32t-32-78v-370h80v370q0 13 8.5 21.5T470-320q13 0 21.5-8.5T500-350v-350q-1-42-29.5-71T400-800q-42 0-71 29t-29 71v370q-1 71 49 120.5T470-160q70 0 119-49.5T640-330v-390h80v390Z" />
        </svg>
      </div>
    </section>
  </main>

  <?php include 'footer.php'; ?>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const messageInput = document.getElementById("message-input");
      const sendButton = document.getElementById("send-button");
      const chatMessages = document.getElementById("chat-messages");

      const messages = [{
        user: "Zimu",
        text: "Hey, just a quick update: the prototype for our interface is ready for review. Please check it out and give your feedback by Friday!",
        time: "Today, 8:30",
      }, ];

      function renderMessages() {
        chatMessages.innerHTML = "";
        messages.forEach((message) => {
          const messageElement = document.createElement("div");
          messageElement.classList.add("message");
          messageElement.innerHTML = `
            <div class="message-info">
              <strong>${message.user}</strong> <span>${message.time}</span>
            </div>
            <p>${message.text}</p>
          `;
          chatMessages.appendChild(messageElement);
        });
      }

      function sendMessage() {
        const text = messageInput.value.trim();
        if (text === "") return;

        const newMessage = {
          user: "User",
          text: text,
          time: new Date().toLocaleTimeString(),
        };
        messages.push(newMessage);
        renderMessages();
        messageInput.value = "";
        chatMessages.scrollTop = chatMessages.scrollHeight;
      }

      sendButton.addEventListener("click", sendMessage);
      messageInput.addEventListener("keyup", (event) => {
        if (event.key === "Enter") {
          sendMessage();
        }
      });

      renderMessages();
    });
  </script>
</body>

</html>