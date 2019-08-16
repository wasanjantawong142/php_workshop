<style>
    .navbar-nav.navbar-center {
        position: absolute;
        left: 50%;
        transform: translatex(-50%);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #fb3 !important;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <button class="btn btn-primary" id="menu-toggle">Menu</button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav mr-auto navbar-center">
            <li class="nav-item">
                <a class="nav-link" href="#">Jean By พี่หมี<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <a href="logout.php"><button class="btn btn-secondary my-2 my-sm-0" type="button">Logout</button></a>
        </form>
    </div>
</nav>

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>