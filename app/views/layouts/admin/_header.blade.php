<header class="header">
    <a href="<?php echo route('admin.root') ?>" class="logo">
        Bravo Tours Admin
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i> <span>Admin Name <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo route('admin.profile') ?>" class="">My Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo route('admin.logout') ?>" class="">Log out</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>