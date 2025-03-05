   <!-- Sidebar -->
   <div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="/admin" class="logo">
          <img
            src="{{asset('lite/assets/img/kaiadmin/logo_light.svg')}}"
            alt="navbar brand"
            class="navbar-brand"
            height="20"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item active">
            <a
              data-bs-toggle="collapse"
              href="#dashboard"
              class="collapsed"
              aria-expanded="false"
            >
              <i class="fas fa-home"></i>
              <p>Dashboard</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="dashboard">
              <ul class="nav nav-collapse">
                <li>
                  <a href="/admin">
                    <span class="sub-item">Home</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Components</h4>
          </li>
          <li class="nav-item">
            <a href="/admin/users">
              <i class="icon-user"></i>
              <p>Users</p>
            </a>
          </li>

         
          <li class="nav-item">
            <a href="/admin/messages">
              <i class="icon-speech"></i>
              <p>Messages</p>
              <span class="badge badge-success">3</span>
            </a>
          </li>

          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#sidebarLayouts">
              <i class="fas fa-th-list"></i>
              <p>Support Our Work</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="sidebarLayouts">
              <ul class="nav nav-collapse">
                <li>
                  <a href="/admin/add-support-section1">
                    <span class="sub-item">Add Section 1</span>
                  </a>
                </li>
                <li>
                  <a href="/admin/add-support-section2">
                    <span class="sub-item">Add Section 2</span>
                  </a>
                </li>
                <li>
                  <a href="/admin/add-support-section3">
                    <span class="sub-item">Add Section 3</span>
                  </a>
                </li>
               
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a data-bs-toggle="collapse" href="#tables">
              <i class="icon-settings"></i>
              <p>Settings</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav nav-collapse">
                <li>
                  <a href="/admin/website-settings">
                    <span class="sub-item">Website Settings</span>
                  </a>
                </li>
                <li>
                  <a href="#" class="logout">
                    <span class="sub-item ">Logout</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
       
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->