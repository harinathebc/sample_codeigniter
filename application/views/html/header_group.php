<!-- Navbar Toolbar Right -->
         <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          
          <li class="nav-item dropdown">
            <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="<?php echo site_url('assets/portraits/5.jpg'); ?>" alt="Logo">
                <i></i>
              </span>
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="<?php echo site_url('user/dashboard'); ?>" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
              <a class="dropdown-item" href="<?php echo site_url('user/changepassword'); ?>" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Change Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo site_url('user/logout'); ?>" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
            </div>
          </li>
        
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon wb-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="Search...">
              <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
              data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>
    <div class="site-menubar site-menubar-light">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu">
            <li class="site-menu-category">General</li>
          
			  <li class="site-menu-item has-sub">
              <a href="<?php echo site_url('group/profile'); ?>" data-dropdown-toggle="false">
                <i class="site-menu-icon icon wb-user" aria-hidden="true"></i>
                <span class="site-menu-title">Group Profile</span>
                <span class="site-menu-arrow"></span>
              </a>
              
            </li> 
			<li class="site-menu-item has-sub">
              <a href="<?php echo site_url('user/lists'); ?>" data-dropdown-toggle="false">
                <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                <span class="site-menu-title">Employees</span>
                <span class="site-menu-arrow"></span>
              </a>
              
            </li> 
           
			<li class="site-menu-item has-sub">
              <a href="<?php echo site_url('user/orders'); ?>" data-dropdown-toggle="false">
                <i class="site-menu-icon wb-payment" aria-hidden="true"></i>
                <span class="site-menu-title">Orders</span>
                <span class="site-menu-arrow"></span>
              </a>
              
            </li> 			
           	
            </li> 
			</ul>
        </div>
      </div>
    </div>
  </div>