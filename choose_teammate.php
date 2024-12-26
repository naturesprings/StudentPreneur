<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Teammate</title>
    <link rel="stylesheet" href="styleteam.css">
</head>

<body>
    <?php
    include 'header.php';

    require_once('model/database.php');
    require_once('model/user_db.php');
    require_once('model/search_user_db.php');

    $show_network_container = true;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['select_user'])) {
        $selected_user = [
            'id' => $_POST['selected_user_id'],
            'name' => $_POST['selected_user_name'],
            'avatar' => $_POST['selected_user_avatar']
        ];
        $_SESSION['team'][] = $selected_user;

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    $current_user_id = $_SESSION['user_id'];

    $users = get_users(7);

    $filtered_users = array_filter($users, function ($user) use ($current_user_id) {
        return $user['id'] !== $current_user_id;
    });
    ?>
    <div class="progress-bar-container">
        <div class="progress-bar">
            <div class="step completed">Welcome</div>
            <div class="step completed">Set Up Your Team</div>
            <div class="step active">Choose Your Teammate</div>
            <div class="step">Succeed</div>
        </div>
    </div>
    <main class="choose">
        <div class="left-column">
            <h1>Choose Your Teammate</h1>
            <div class="form-container">
                <form method="post" action="">
                    <div class="input-wrapper">
                        <input type="text" name="tag" placeholder="Tag..." required>
                        <button type="submit" name="search_user" class="search-button">🔍</button>
                    </div>
                </form>
                <button type="button" class="next-button" onclick="location.href='succeed.php'">Next</button>

            </div>
        </div>

        <div class="right-column-choose">
            <h3 style="text-align: center;color:#666;">Your connect here</h3>
            <div class="user-results">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search_user'])) {
                    $tag = $_POST['tag'];
                    $users = search_users_by_tag($tag);
                    $show_network_container = false;
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search_user'])) {
                    foreach ($users as $user) {
                        echo '<div class="user-card">';
                        echo '<img src="' . htmlspecialchars($user['avatar']) . '" alt="' . htmlspecialchars($user['firstName']) . '" class="user-avatar">';
                        echo '<div class="user-info">';
                        echo '<p>' . htmlspecialchars($user['firstName'] . ' ' . $user['lastName']) . '</p>';
                        echo '<p>' . htmlspecialchars($user['description']) . '</p>';
                        echo '</div>';
                        echo '<form method="post" action="" target="hidden_iframe">';
                        echo '<input type="hidden" name="selected_user_id" value="' . $user['id'] . '">';
                        echo '<input type="hidden" name="selected_user_name" value="' . htmlspecialchars($user['firstName'] . ' ' . $user['lastName']) . '">';
                        echo '<input type="hidden" name="selected_user_avatar" value="' . htmlspecialchars($user['avatar']) . '">';
                        echo '<button type="submit" name="select_user" class="select-button">Select</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                }
                ?>
                <?php if ($show_network_container) { ?>
                    <?php
                    foreach ($filtered_users as $user) {
                        echo '<div class="user-card">';
                        echo '<img src="' . htmlspecialchars($user['avatar']) . '" alt="' . htmlspecialchars($user['firstName']) . '" class="user-avatar">';
                        echo '<div class="user-info">';
                        echo '<p>' . htmlspecialchars($user['firstName'] . ' ' . $user['lastName']) . '</p>';
                        echo '<p>' . htmlspecialchars($user['description']) . '</p>';
                        echo '</div>';
                        echo '<form method="post" action="" target="hidden_iframe">';
                        echo '<input type="hidden" name="selected_user_id" value="' . $user['id'] . '">';
                        echo '<input type="hidden" name="selected_user_name" value="' . htmlspecialchars($user['firstName'] . ' ' . $user['lastName']) . '">';
                        echo '<input type="hidden" name="selected_user_avatar" value="' . htmlspecialchars($user['avatar']) . '">';
                        echo '<button type="submit" name="select_user" class="select-button">Select</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                    ?>
                <?php } ?>
            </div>
        </div>
    </main>

    <iframe name="hidden_iframe" style="display:none;"></iframe>

    <footer>
        &copy; 2024 StudentPreneur. All rights reserved.
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const buttons = document.querySelectorAll('.select-button');
            buttons.forEach(button => {
                button.addEventListener('click', (e) => {
                    button.classList.add('selected');
                });
            });
        });
    </script>
</body>

</html>