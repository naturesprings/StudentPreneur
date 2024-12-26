<div class="content">
    <h1 class="course-title">Event List</h1>

    <?php
    include 'db_connect.php';

    if (isset($_GET['delete_id'])) {
        $delete_id = intval($_GET['delete_id']);
        $delete_sql = "DELETE FROM event WHERE id=$delete_id";
        if ($conn->query($delete_sql) === TRUE) {
            echo "<p class='success-message'>Event deleted successfully.</p>";
        } else {
            echo "<p class='error-message'>Error: " . $conn->error . "</p>";
        }
    }

    if (isset($_POST['update'])) {
        $id = intval($_POST['id']);
        $name = $conn->real_escape_string($_POST['name']);
        $type = $conn->real_escape_string($_POST['type']);
        $field = $conn->real_escape_string($_POST['field']);
        $related_skills = $conn->real_escape_string($_POST['related_skills']);
        $date = $_POST['date'];
        $topic = $conn->real_escape_string($_POST['topic']);
        $speaker = floatval($_POST['speaker']);

        $update_sql = "UPDATE event SET
                name='$name',
                type='$type',
                field='$field',
                related_skills='$related_skills',
                date='$date',
                topic='$topic',
                speaker=$speaker
                WHERE id=$id";

        if ($conn->query($update_sql) === TRUE) {
            echo "<p class='success-message'>Event updated successfully.</p>";
        } else {
            echo "<p class='error-message'>Error: " . $conn->error . "</p>";
        }
    }

    $sql = "SELECT * FROM event";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='course-table'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Field</th>
                        <th>Related Skills</th>
                        <th>Date</th>
                        <th>Topic</th>
                        <th>Speaker</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["name"]) . "</td>
                    <td>" . htmlspecialchars($row["type"]) . "</td>
                    <td>" . htmlspecialchars($row["field"]) . "</td>
                    <td>" . htmlspecialchars($row["related_skills"]) . "</td>
                    <td>" . htmlspecialchars($row["date"]) . "</td>
                    <td>" . htmlspecialchars($row["topic"]) . "</td>
                    <td>" . htmlspecialchars($row["speaker"]) . "</td>
                    <td>
                       <a href='admin.php?page=event_list&edit_id=" . urlencode($row["id"]) . "' class='edit-link'>Edit<br></a> 
                    <br>
					<a href='admin.php?page=event_list&delete_id=" . urlencode($row["id"]) . "' class='delete-link' onclick='return confirm(\"Are you sure you want to delete this event?\")'>Delete</a>
                </td>
                </tr>";
        }
        echo "</tbody></table>";
    }

    if (isset($_GET['edit_id'])) {
        $edit_id = intval($_GET['edit_id']);
        $edit_sql = "SELECT * FROM event WHERE id=$edit_id";
        $edit_result = $conn->query($edit_sql);
        if ($edit_result->num_rows > 0) {
            $row = $edit_result->fetch_assoc();
    ?>
            <h2 class="edit-title">Edit Event</h2>
            <form class="course-form" action="admin.php?page=event_list" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required><br>

                <label for="type">Type:</label>
                <select id="type" name="type" required>
                    <option value="Live" <?php if ($row['type'] == 'Live') echo 'selected'; ?>>Live</option>
                    <option value="Workshop" <?php if ($row['type'] == 'Workshop') echo 'selected'; ?>>Workshop</option>
                    <option value="Seminar" <?php if ($row['type'] == 'Seminar') echo 'selected'; ?>>Seminar</option>
                </select><br>

                <label for="field">Field:</label>
                <select id="field" name="field" required>
                    <option value="Business" <?php if ($row['field'] == 'Business') echo 'selected'; ?>>Business</option>
                    <option value="Engineering" <?php if ($row['field'] == 'Engineering') echo 'selected'; ?>>Engineering</option>
                    <option value="Account" <?php if ($row['field'] == 'Account') echo 'selected'; ?>>Account</option>
                    <option value="Computer Science" <?php if ($row['field'] == 'Computer Science') echo 'selected'; ?>>Computer Science</option>
                    <option value="Data Science" <?php if ($row['field'] == 'Data Science') echo 'selected'; ?>>Data Science</option>
                    <option value="Others" <?php if ($row['field'] == 'Others') echo 'selected'; ?>>Others</option>
                </select><br>

                <label for="related_skills">Related Skills:</label>
                <textarea id="related_skills" name="related_skills" required><?php echo htmlspecialchars($row['related_skills']); ?></textarea><br>

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($row['date']); ?>" required><br>

                <label for="topic">Topic:</label>
                <input type="text" id="topic" name="topic" value="<?php echo htmlspecialchars($row['topic']); ?>" required><br>

                <label for="speaker">Speaker:</label>
                <input type="number" id="speaker" name="speaker" step="0.1" min="0" value="<?php echo htmlspecialchars($row['speaker']); ?>"><br>

                <input type="submit" name="update" value="Update Event" class="update-button">
            </form>
    <?php
        }
    }

    $conn->close();
    ?>
</div>