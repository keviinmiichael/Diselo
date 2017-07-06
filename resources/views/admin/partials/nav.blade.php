<!-- #NAVIGATION -->
<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
        <span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
            
            <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                <img src="/images/admin/avatars/sunny.png" alt="me" class="online" /> 
                <span>
                    john.doe 
                </span>
                <i class="fa fa-angle-down"></i>
            </a> 
            
        </span>
    </div>
    <!-- end user info -->

    <nav>
        <ul>
            <li>
                <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
                <ul>
                    <li>
                        <a href="index.html" title="Dashboard"><span class="menu-item-parent">Analytics Dashboard</span></a>
                    </li>
                    <li class="">
                        <a href="dashboard-social.html" title="Dashboard"><span class="menu-item-parent">Social Wall</span></a>
                    </li>
                </ul>   
            </li>
            <li>
                <a href="widgets.html"><i class="fa fa-lg fa-fw fa-list-alt"></i> <span class="menu-item-parent">Widgets</span></a>
            </li>
        </ul>
    </nav>

    <span class="minifyme" data-action="minifyMenu"> 
        <i class="fa fa-arrow-circle-left hit"></i> 
    </span>

</aside>
<!-- END NAVIGATION -->