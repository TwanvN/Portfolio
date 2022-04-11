<?php
  include_once 'includes\dbh.inc.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body>
    <!-- navigation-->
        <nav class="navbar">
            <div class="content">
                <div class="logo"><a href="#">Portfolio</a></div>
                <ul class="menu-list">
                    <div class="icon cancel-btn">
                        <i class="fas fa-times"></i>
                    </div>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">Over mezelf</a></li>
                    <li><a href="projects.php"><span>Projecten</span></a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
                <div class="icon menu-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </nav>

        <!--home section-->
        <section class="projects-header" id="projects-header">
            <div class="max-width">
                <div class="home-content">
                    <div class="text-2">Mijn <span>Projecten</span></div>
                </div>
            </div>
        </section>

        <!-- projects -->
        <?php
          $sql = "SELECT * FROM projects ORDER BY project_id ASC;";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<section class="project-java" id="project-java">' . '<div class="max-width">' . '<h2 class="title">' . $row['project_name'] . '</h2>' . '<div class="about-content">' . '<div class="column left">' . '<img src="' . $row['project_image_url'] . '" alt="">' . '</div>' . '<div class="column right">' . '<div class="text"><span>' . $row['project_name'] . '</span> </div>' . '<div class="text-goal">' . $row['project_description_short'] . '</div>' . '<p>' . $row['projec_description_long'] . '</p>' . '<a href=' . $row['project_video_link'] . ' target="_blank"> Bekijk demo' . '</a>' . '</div>' . '</div>' . '</div>' . '</section> <br>';
            }
          }
         ?>

        <!-- footer section-->
        <footer>
            <span>Created by <a href="#">Twan van Noorloos</a> | <span class ="far fa-copyright"></span> 2021 All rights reserved</span>
        </footer>

        <script>
            const body = document.querySelector("body");
            const navbar = document.querySelector(".navbar");
            const menu = document.querySelector(".menu-list");
            const menuBtn = document.querySelector(".menu-btn");
            const cancelBtn = document.querySelector(".cancel-btn");
            menuBtn.onclick = ()=>{
                menu.classList.add("active");
                menuBtn.classList.add("hide");
                body.classList.add("disabledScroll");
            }

            cancelBtn.onclick = ()=>{
                menu.classList.remove("active");
                menuBtn.classList.remove("hide");
                body.classList.remove("disabledScroll");
            }

            window.onscroll = ()=>{
                this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
            }
        </script>
    </body>
</html>
