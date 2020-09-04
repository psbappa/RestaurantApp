<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HOME</li>

        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{route('dashboard')}}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        <li><a href="{{route('category')}}"><i class="fa fa-link"></i> <span>Categories</span></a></li>
        <li><a href="{{route('product')}}"><i class="fa fa-link"></i> <span>Products</span></a></li>
        <hr>
        <div class="d-none d-lg-block w-100">
          <span class="text-small text-muted header">Quick Links</span>
          <ul class="nav nav-small flex-column mt-2">
            <li class="nav-item">
              <a href="{{route('members')}}" class="nav-link">Team Overview</a>
            </li>
            <li class="nav-item">
              <a href="{{route('projects')}}" class="nav-link">Project</a>
            </li>
            <li class="nav-item">
              <a href="nav-side-task.html" class="nav-link">Single Task</a>
            </li>
          </ul>
          <hr>
        </div>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Payments</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="">Stripe</a></li>
          </ul>
        </li>
        <hr>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Testing</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('design')}}">Design</a></li>
          </ul>
        </li>
        <!-- <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li> -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
    </aside>