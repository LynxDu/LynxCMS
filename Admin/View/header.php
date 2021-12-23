<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Админ-панель</title>

    <!-- Bootstrap core CSS -->
    <link href="/LynxCMS/Admin/Assets/css/mdb.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/LynxCMS/Admin/Assets/css/login.css" rel="stylesheet">

    <!-- simplelineicons for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button
                    class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarCenteredExample"
                    aria-controls="navbarCenteredExample"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div
                    class="collapse navbar-collapse justify-content-center"
                    id="navbarCenteredExample"
            >
                <!-- Left links -->
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/lynxcms/admin/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/lynxcms/">Index</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/lynxcms/admin/pages/">Pages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/lynxcms/admin/plagins/">Plagins</a>
                    </li>
                    <!-- Navbar dropdown -->
                    <li class="nav-item dropdown">
                        <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-mdb-toggle="dropdown"
                                aria-expanded="false"
                        >
                            Settings
                        </a>
                        <!-- Dropdown menu -->
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/lynxcms/admin/settings/general/">Setting</a>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                                <a class="dropdown-item" href="/lynxcms/admin/logout/">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
<!--    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">-->
<!--        <div class="container">-->
<!--            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                <span class="navbar-toggler-icon"></span>-->
<!--            </button>-->
<!--            <a class="navbar-brand" href="#">Admin CMS</a>-->
<!--            <div class="collapse navbar-collapse" id="navbarNavDropdown">-->
<!--                <ul class="navbar-nav mr-auto">-->
<!--                    <li class="nav-item active">-->
<!--                        <a class="nav-link" href="">-->
<!--                            <i class="icon-speedometer icons"></i> Home-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="">-->
<!--                            <i class="icon-doc icons"></i> Pages-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item dropdown">-->
<!--                        <a class="nav-link" href="">-->
<!--                            <i class="icon-equalizer icons"></i> Settings-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item dropdown">-->
<!--                        <a class="nav-link" href="">-->
<!--                            <i class="icon-wrench icons"></i> Plagins-->
<!--                        </a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!---->
<!--            <div class="right-toolbar">-->
<!--                <a href="/lynxcms/admin/logout/">-->
<!--                    <i class="icon-logout icons"></i> Logout-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </nav>-->
</header>