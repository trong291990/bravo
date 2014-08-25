<section class="sidebar">
    <ul class="sidebar-menu">
        <li class="active">
            <a href="<?php echo route('admin.root') ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="treeview active">
            <a href="#">
                <i class="fa fa-file"></i>
                <span>Tour management</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.tour.index') }}"><i class="fa fa-angle-double-right"></i> List Tours</a></li>
                <li><a href="{{ route('admin.tour.create') }}"><i class="fa fa-angle-double-right"></i> New Tour</a></li>
            </ul>
        </li>
        <li class="treeview active">
            <a href="#">
                <i class="fa fa-bookmark"></i>
                <span>Booking management</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.reservation.index') }}"><i class="fa fa-angle-double-right"></i> List reservations</a></li>
                <li><a href="{{ route('admin.reservation.create') }}"><i class="fa fa-angle-double-right"></i> New </a></li>
            </ul>
        </li>        
        <li class="treeview active">
            <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Setting</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Site </a></li>
                <li><a href="{{ route('admin.profile') }}"><i class="fa fa-angle-double-right"></i> Profile</a></li>
            </ul>
        </li>         
    </ul>
</section>