<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" style="height: 36px;width: 36px"
             src="{{ asset('uploads/user_images/default.png') }}"
             alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ auth()->user()->email }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item text-capitalize" href="{{ route('dashboard.welcome') }}"><i
                    class="app-menu__icon fa fa-dashboard"></i><span
                    class="app-menu__label">Tableau de board</span></a></li>
        <li><a class="app-menu__item text-capitalize" href="{{ route('dashboard.sondages.index') }}"><i
                    class="app-menu__icon fa fa-th"></i><span
                    class="app-menu__label">Sondages</span></a></li>
        <li><a class="app-menu__item text-capitalize" href="{{ route('dashboard.users.index') }}"><i
                    class="app-menu__icon fa fa-user"></i><span
                    class="app-menu__label">Utilisateurs</span></a></li>

    </ul>
</aside>
