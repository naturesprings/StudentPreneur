<div class="content">
	<div class="add-course">
		<h1>Add New Event</h1>
		<?php include 'db_connect.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $type = $_POST['type'];
            $field = $_POST['field'];
            $related_skills = $_POST['related_skills'];
            $date = $_POST['date'];
            $topic = $_POST['topic'];
            $speaker = $_POST['speaker'];

            $stmt = $conn->prepare("INSERT INTO event (name, type, field, related_skills, date, topic, speaker) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $name, $type, $field, $related_skills, $date, $topic, $speaker);

            if ($stmt->execute()) {
                header("Location: admin.php?page=event_list");
                exit();
            } else {
                echo "<p class='error-message'>Error: " . $stmt->error . "</p>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>

        <form action="admin.php?page=add_event" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="Live">Live</option>
                <option value="Workshop">Workshop</option>
                <option value="Seminar">Seminar</option>
            </select><br>

            <label for="field">Field:</label>
            <select id="field" name="field" required>
                <option value="Business">Business</option>
                <option value="Engineering">Engineering</option>
                <option value="Account">Account</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Data Science">Data Science</option>
                <option value="Others">Others</option>
            </select><br>

            <label for="related_skills">Related Skills:</label>
            <textarea id="related_skills" name="related_skills" required></textarea><br>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br>

            <label for="topic">Topic:</label>
            <input type="text" id="topic" name="topic" required><br>

            <label for="speaker">Speaker:</label>
            <input type="text" id="speaker" name="speaker" required><br>

            <input type="submit" value="Add Event">
        </form>
    </div>
</div>
