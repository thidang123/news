<!-- Create user   -->
<header class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <!-- Logo -->
                    <a class="navbar-brand" href="/home"><img src="img/core-img/logo.png" alt="Logo"></a>
                    <!-- Navbar Toggler -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav"
                            aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <!-- Navbar -->
                    <div class="collapse navbar-collapse" id="worldNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="nav-item active dropdown-item" href="/home">Home</a>
                                    <a class="dropdown-item" href="{{route('post.index')}}">Posts</a>
                                    <a class="dropdown-item" href="/blog"></a>
                                    <a class="dropdown-item" href="/regular">Regular Page</a>
                                    <a class="dropdown-item" href="/contact">Contact</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Gadgets</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Lifestyle</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Video</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="accountDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tài Khoản</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/users">Trang Admin</a>
                                    <a class="dropdown-item" href="/user/login">Đăng Nhập</a>
                                </div>
                            </li>
                        </ul>


                        <!-- Search Form  -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
