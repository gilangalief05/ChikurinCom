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
            <img src="/chikurincom_logo.svg" class="mx-1" width="24px" alt="Logo Chikurincom">
            <span class="mx-2">ChikurinCom</span>
        </a>
        <!-- Pencarian -->
        <form action="" class="d-flex align-items-center input-group w-50" id="text_search" role="search">
            @csrf
            <div class="input-group">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" required>
                <button class="btn btn-primary material-icons" type="submit">search</button>
                <button class="btn btn-primary" onclick="img_search_visible()" type="button">text</button>
            </div>
        </form>
        
        <form action="/image_search" class="d-none align-items-center w-50" id="img_search" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input type="file" class="form-control" id="image_for_search" name="image_for_search" required>
                <button class="btn btn-primary material-icons" type="submit">search</button>
                <button class="btn btn-primary" onclick="text_search_visible()" type="button">image</button>
            </div>
        </form>
            
        <script>
            function text_search_visible() {
                var img = document.getElementById("img_search");
                var text = document.getElementById("text_search");
                img.classList.remove("d-flex");
                text.classList.remove("d-none");
                img.classList.add("d-none");
                text.classList.add("d-flex");
            }
            function img_search_visible() {
                var img = document.getElementById("img_search");
                var text = document.getElementById("text_search");
                img.classList.remove("d-none");
                text.classList.remove("d-flex");
                img.classList.add("d-flex");
                text.classList.add("d-none");
            }
        </script>
        
        <div class="d-flex align-items-center">
            @if (!Auth::check())
            <a href="/register" role="button" class="btn btn-outline-primary m-1">Register</a>
            <a href="/login" role="button" class="btn btn-primary m-1">Login</a>
            @else
            <a href="/u/{{ Auth::id() }}/carts" class="btn position-relative" role="button">
                <span class="material-icons mt-1">shopping_cart</span>
                <span class="position-absolute top-10 start-90 translate-middle p-1 bg-danger rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
            </a>
            <a href="/u/{{ Auth::id() }}/notifications" class="btn" role="button">
                <span class="material-icons mt-1">notifications</span>
                <span class="position-absolute top-10 start-90 translate-middle p-1 bg-danger rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
            </a>
            <div class="dropdown d-flex align-items-center">
                <button class="btn dropdown-toggle profile-navbar p-0" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="mx-2">{{ Auth::user()->name }}</span>
                    <img src="{{ asset('storage/profile_picture/'.$filename) }}" class="img-cover rounded-circle">
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="d-grid">
                        <a href="/u/{{ Auth::id() }}" role="button" class="btn text-start d-flex align-items-center">
                            <span class="material-icons">person</span> Profil
                        </a>
                    </li>
                    <li class="d-grid">
                        <a href="/u/{{ Auth::id() }}/wishlists" role="button" class="btn text-start d-flex align-items-center">
                            <span class="material-icons">bookmark</span> Wishlist
                        </a>
                    </li>
                    <li class="d-grid">
                        <form action="/logout" method="POST" class="">
                            @csrf
                            <button class="btn text-danger text-start d-flex align-items-center" type="submit"><span class="material-icons">logout</span> Log Out</button>
                        </form>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </div>
</nav>