<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentPreneur</title>
    <link rel="stylesheet" href="style_01.css">
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

        $userId = $_SESSION['user_id'];
        $user = get_user($userId);
        ?>
  
  <header>
        <nav>
          <div class="logo"><a href="post.php">StudentPreneur</a></div>
          <strong class="strong"><a href="post.php">Home</a></strong>
          <a href="learning.php">Learning</a></strong>
          <a href="event.php">Events</a>
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
    <div class="container">
        <div class="column">
            <div class="postpage-card" id="profile-card">
                <div id="profile">
                    <a href="profile.php">
                        <img src="<?php echo htmlspecialchars($user['avatar']); ?>" alt="Profile" id="profile-img">
                    </a>
                    <h2><?php echo htmlspecialchars($user['firstName']); ?></h2>
                    <h3><?php echo htmlspecialchars($user['description']); ?></h3>
                    <p><?php echo htmlspecialchars($user['skills']); ?></p>
                </div>
                <div>
                    <button>Get More with Premium</button>
                </div>
                <br>
                <img src="img/social.png" alt="">
            </div>

            <div class="postpage-card" id="explore-card">
                <div id="title">
                    <img src="img/explore.svg" alt="">
                    <a>Explore</a>
                </div>
                <hr>
                <div id="nav">
                    <ul>
                        <li><img src="img/nav1.svg" alt=""><a href="event.php"> Events</a></li>
                        <li><img src="img/nav2.svg" alt=""><a href="learning.php"> Learning</a></li>
                        <li><img src="img/nav3.svg" alt=""><a href="profile.php"> My Network</a></li>
                        <li><img src="img/nav4.svg" alt=""><a href="globalConnections.php"> Global Connections</a></li>
                        <li><img src="img/nav2.svg" alt=""><a href="resource.php"> Resource</a></li>
                    </ul>
                </div>
            </div>

            <div class="postpage-card" id="trending-card">
                <div id="title">
                    <img src="img/trending.svg" alt="">
                    <a>Trending</a>
                </div>
                <hr>
                <div id="nav">
                    <ul style="font-size:20px;">
                        <li>#StartupTips</li>
                        <li>#Funding</li>
                        <li>#Networking</li>
                        <li>#BusinessGrowth</li>
                        <li>#Entrepreneurship</li>
                        <li>#Mentorship</li>
                        <li>#ProductDevelopment</li>
                        <li>#MarketTrends</li>
                        <li>#TechInnovation</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="postpage-card" id="search-card">
                <img src="img/Search.svg" alt="">
                <a href="">#Global Connections </a>


            </div>

            <div class="postpage-card" id="write-post">
                <div id="write">
                    <img style="object-fit:cover;" src="img/profile1.jpg" alt="" id="write-profile">
                    <div id="edit">
                        <a>Writing someting... </a>
                        <img src="img/Edit.svg" alt="">
                    </div>
                </div>
                <div id="post">
                    <img src="img/emoji.png" alt="">
                    <button>Post</button>
                </div>
            </div>

            <div class="postpage-card" id="post-card">
                <img src="img/Post1.png" alt="">
                <img src="img/Post2.png" alt="">
                <img src="img/Post3.png" alt="">
                <img src="img/Post4.png" alt="">
            </div>
        </div>

        <div class="column">
            <div class="postpage-card" id="teammate-card">
                <div id="title">
                    <a id="find">Find Your Teammate</a>
                    <a class="see-more">See more</a>
                </div>
                <hr>

                <div class="teammate-profile">
                    <img src="img/avatar/James.jpeg" alt="">
                    <div class="profile-info">
                        <a style='color:black; font-size: 14px;padding-bottom:4px;'>John Doe</a><br>
                        <a>Research Science</a>
                    </div>
                    <button>+ Connect</button>
                </div>
                <div class="teammate-profile">
                    <img src="img/avatar/Jade.jpeg" alt="">
                    <div class="profile-info">
                        <a style='color:black; font-size: 14px;padding-bottom:4px;'>Jade Smith</a><br>
                        <a>Java Developer</a>
                    </div>
                    <button>+ Connect</button>
                </div>


            </div>


            <div class="postpage-card" id="live-card">
                <div class="disc-container">
                    <h3 style="font-size: 18px;padding-left: 5px;">Upcoming Live Session</h3>
                    <hr>
                    <p style="text-align: left;padding-left: 5px;">Effective Marketing Strategies</p>
                    <img src="img/event-competition.jpeg" alt="">
                    <p style="font-size: 14px;padding-left: 10px;padding-right: 10px;">Gain insights into the most effective marketing strategies for your business</p>
                    <p style="font-size: 14px;padding-left: 10px;padding-right: 10px;">July 15, 2024, 5:00 PM</p>
                </div>
                <div class="btn-contianer">
                    <button>Remind Me</button><br>
                    <button id="btn-join">Join Now</button>
                </div>
            </div>

            <div class="postpage-card" id="course-card">
                <div class="disc-container">
                    <h3 style="font-size: 18px;padding-left: 5px;">Featured Courses</h3>
                    <hr>
                    <p style="text-align: left;padding-left: 5px;">Marketing for Startups</p>
                    <p style="font-size: 14px;padding-left: 10px;padding-right: 10px;">Learn effective marketing strategies to promote your startup and attract users.</p>
                    <p style="text-align: left;padding-left: 5px;">Rating: 4.9/5</p>
                    <img src="img/learning-course3.jpg" alt="">
                    <p style="text-align: left;padding-left: 5px;">Duration: 5 Weeks</p>
                </div>
                <div class="btn-contianer2">
                    <button>Watch for Free (Members)</button><br>
                    <button id="btn-buy">Buy Now for £19</button>
                </div>
            </div>


            <div class="postpage-card" id="ad-card">
                <div>ad</div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>