<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ Auth::user()->name }}</p>
          
        </div>
</div>
<ul class="app-menu">
<li>
<a class="app-menu__item {{ Route::currentRouteName() == 'employee.dashboard' ? 'active' : '' }}" href="{{route('employee.dashboard')}}">
<i class="app-menu__icon fa fa-dashboard"></i>
<span class="app-menu__label">Dashboard</span>
</a>
</li>
		
<li class="treeview">
<a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i>
<span class="app-menu__label">Attandance</span>
<i class="treeview-indicator fa fa-angle-right"></i>
</a>
<ul class="treeview-menu">
<li>
<a class="treeview-item" href="{{route('employee.make-attandance')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Make Attandance</a>
</li>
<li>
<a class="treeview-item" href="{{route('employee.view-attandance')}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;View Attandance</a>
</li>
<li>
<a class="treeview-item" href="{{route('employee.location')}}"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;View location</a>
</li>
</ul>
</li>
		
<li>
<a class="app-menu__item" href="{{route('employee.change.password')}}">
<i class="fa fa-unlock-alt" aria-hidden="true"></i>
<span class="app-menu__label">&nbsp;&nbsp;&nbsp;Change Password</span>
</a>
</li>

<li>
<a class="app-menu__item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
 @csrf
</form>
<i class="fa fa-sign-out fa-lg"></i> 
<span class="app-menu__label">&nbsp;&nbsp;&nbsp;Logout</span>
</a>
</li>
</ul>

</aside>

@section('scripts')
@parent
<script>
function switchWorkStatus(data) {
    let $timer = $("#timer span");
    let text = $timer.text() == 'Punch Out' ? 'Punch In' : 'Punch Out';
    $timer.text(text);

    Swal.fire({
        title: 'Success!',
        text: data.status,
        icon: 'success'
    })
}

$(function() {
    $.get("{{ route('times-entries.showCurrent') }}", function (data) {
        if(data.timeEntry != null) {
            switchWorkStatus();
        }
    });

    $('#timer').click(function () {
        $.ajax({
            method: "POST",
            url: "{{ route('times-entries.updateCurrent') }}",
            data: {
                _token
            },
            success: (data) => switchWorkStatus(data),
            error: () => window.location.reload()
        });
    });
});
</script>
@endsection

