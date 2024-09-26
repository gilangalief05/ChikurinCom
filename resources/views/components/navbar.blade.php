<style>
    .dropdown-toggle.profile-navbar span {
        font-size: 1em;
    }
    .dropdown-toggle.profile-navbar img {
        max-height: 32px;
    }
    .dropdown-toggle.profile-navbar::after {
        display: none;
    }
</style>
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a href="/" class="navbar-brand d-flex align-items-center">
            <i class="fa fa-github fa-lg me-2"></i>
            ChikurinCom
        </a>
        <form class="d-flex align-items-center input-group w-50" role="search">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary material-icons" type="submit">search</button>
            <button class="btn btn-primary dropdown-toggle input-group-text" data-bs-toggle="dropdown" aria-expanded="false"></button>
            <ul class="dropdown-menu dropdown-menu-center input-group w-100">
                <li class="m-1 text-center"><label for="pict-search" class="form-label">Image Search</label></li>
                <li class="m-1"><div class="input-group">
                    <input type="file" class="form-control" id="pict-search" aria-describedby="pict-search-addon" aria-label="Upload">
                    <button class="btn btn-primary material-icons" type="button" id="pict-search-addon">search</button>
                </div></li>
            </ul>
        </form>
        <div class="d-flex align-items-center">
            <!-- Belum Login -->
            <!-- <a href="/register" role="button" class="btn btn-outline-primary m-1">Register</a>
            <a href="/login" role="button" class="btn btn-primary m-1">Login</a> -->
            <!-- Sudah Login -->
            <a href="#" class="btn position-relative" role="button" data-bs-toggle="button">
                <span class="material-icons mt-1">shopping_cart</span>
                <span class="position-absolute top-10 start-90 translate-middle p-1 bg-danger rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
            </a>
            <a href="#" class="btn" role="button" data-bs-toggle="button">
                <span class="material-icons mt-1">notifications</span>
                <span class="position-absolute top-10 start-90 translate-middle p-1 bg-danger rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
            </a>
            <div class="dropdown d-flex align-items-center">
                <button class="btn dropdown-toggle profile-navbar p-0" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="mx-2">username</span>
                    <img src="../wer6fy191bl91.jpg" class="img-cover rounded-circle">
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="d-grid">
                        <a href="/u/1" role="button" class="btn text-start d-flex align-items-center">
                            <span class="material-icons">person</span> Profil
                        </a>
                    </li>
                    <li class="d-grid">
                        <a href="/u/1/wishlist" role="button" class="btn text-start d-flex align-items-center">
                            <span class="material-icons">bookmark</span> Wishlist
                        </a>
                    </li>
                    <li class="d-grid">
                        <a href="#" role="button" class="btn text-danger text-start d-flex align-items-cente">
                            <span class="material-icons">logout</span> Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>