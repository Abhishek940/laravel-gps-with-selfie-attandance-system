<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ Auth::user()->name }}</p>
          
        </div>
    </div>
<ul class="app-menu">
<li>
<a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
<i class="app-menu__icon fa fa-dashboard"></i>
<span class="app-menu__label">Dashboard</span>
</a>
</li>
		
<li class="treeview">
<a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i>
<span class="app-menu__label">Registration</span>
<i class="treeview-indicator fa fa-angle-right"></i>
</a>
<ul class="treeview-menu">
<li>
<a class="treeview-item" href="{{route('employee.register')}}"  ><i class="icon fa fa-circle-o"></i>Employee Registration</a>
</li>
                
</ul>
</li>

<li class="treeview">
<a class="app-menu__item" href="#" data-toggle="treeview"><i class="fa fa-th-list"></i>
&nbsp;&nbsp;&nbsp;<span class="app-menu__label">Registration list</span>
<i class="treeview-indicator fa fa-angle-right"></i>
</a>
<ul class="treeview-menu">
<li>
<a class="treeview-item" href="{{route('employee.list')}}"><i class="icon fa fa-circle-o"></i>Employee list</a>
</li>
              
</ul>
</li>
		
 <li class="treeview">
<a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i>
<span class="app-menu__label">Attandance list</span>
<i class="treeview-indicator fa fa-angle-right"></i>
</a>
<ul class="treeview-menu">
<li>
<a class="treeview-item" href="{{route('admin.view-attandance')}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;View Attandance</a>
</li>

<li>
<a class="treeview-item" href="{{route('admin.view-attandance-location')}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;View Attandance location</a>
</li>
                
</ul>
</li>
 <li>
<a class="app-menu__item" href="{{route('admin.change.password')}}">
<i class="fa fa-unlock-alt" aria-hidden="true"></i>
<span class="app-menu__label">&nbsp;&nbsp;&nbsp;Change Password</span>
</a>
</li>
<li>
<a class="app-menu__item" href="{{route('admin.logout')}}"><i class="fa fa-sign-out fa-lg"></i> 
<span class="app-menu__label">&nbsp;&nbsp;&nbsp;Logout</span>
</a>
</li>
</ul>

</aside>

