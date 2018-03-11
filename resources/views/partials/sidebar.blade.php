@inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'categories' ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}">
                    <i class="fa fa-list"></i>
                    <span class="title">Category</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'products' ? 'active' : '' }}">
                <a href="{{ route('products.index') }}">
                    <i class="fa fa-list-alt"></i>
                    <span class="title">Product</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'warehouses' ? 'active' : '' }}">
                <a href="{{ route('warehouses.index') }}">
                    <i class="fa fa-tasks"></i>
                    <span class="title">Inventory</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'reports' ? 'active' : '' }}">
                <a href="{{ route('reports.index') }}">
                    <i class="fa fa-area-chart"></i>
                    <span class="title">Report</span>
                </a>
            </li>

            {{-- <li data-toggle="collapse" data-target="#settings" class="">
                <a href="#"><i class="fa fa-gears"></i>Settings </a>
                <ul id="settings" class="page-sidebar-menu collapse" > --}}
                    @if(Auth::user()->role_id == 1)
                    <li class="{{ $request->segment(1) == 'roles' ? 'active' : '' }}">
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-key"></i>
                            <span class="title">Roles</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->role_id == 1 OR 'owner' == strtolower(Auth::user()->role->title))
                    <li class="{{ $request->segment(1) == 'users' ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">Users</span>
                        </a>
                    </li>
                    @endif
                    <li class="{{ $request->segment(1) == 'user_actions' ? 'active' : '' }}">
                        <a href="{{ route('user_actions.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">User actions</span>
                        </a>
                    </li>
                    
               {{--  </ul>
            </li> --}}
            

            <li>
                <a href="{{ url('/logout') }}">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
