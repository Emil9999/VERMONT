

<div class="sidenav">
    <a href="explore.php"><i class="fa fa-star" aria-hidden="true"></i> V Selection </a>
    <a href="discover.php"><i class="fa fa-television" aria-hidden="true"></i> Discover</a>
    <a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Profil</a>
    <a href="stats.php"><i class="fa fa-bar-chart" aria-hidden="true"></i> Stats</a>

    <a href="watchlist.php"><i class="fa fa-list" aria-hidden="true"></i> Watchlist
    </a>
    <a href="upcomin.php"><i class="fa fa-calendar" aria-hidden="true"></i> Calendrier</a>
    <a href="Qaccueil.php"> <i class="fa fa-trophy" aria-hidden="true"></i> Quiz</a>

    <br>
    <br>
    <br><br><br><br><br>
    <?php
    if (isset($_SESSION['user'])){ ?>
        <a href="Settings.php"> <i class="fa fa-cog" aria-hidden="true"></i> Settings </a>
<br> <br>
        <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a> <?php } ?>


</div>
