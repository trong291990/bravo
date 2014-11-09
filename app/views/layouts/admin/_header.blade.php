<header class="header">
    <a href="<?php echo route('admin.root') ?>" class="logo" id="admin-logo">
        <span class="sr-only">Bravo Administrator Panel</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        @include('partials/_flash_messages_autohide')
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i> <span><?php echo Auth::admin()->get()->name ?> <i class="caret"></i></span>
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