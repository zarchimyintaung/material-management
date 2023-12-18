<div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
						<li><a href="{{ route('dashboard.index') }}" class="" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
						</li>
					@can('report')					
						<li><a href="{{ route('report.index') }}" class="" aria-expanded="false">
							<i class="fas fa-table"></i>
							<span class="nav-text">Report</span>
						</a>
						</li>
					@endcan

					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
						<i class="fas fa-sitemap"></i>							
						<span class="nav-text">Specifications</span>
					</a>
					<ul aria-expanded="false">
						@can('items')
							<li><a href="{{ route('items.index') }}">Items</a></li>
						@endcan							
						@can('departments')
							<li><a href="{{ route('departments.index') }}">Departments</a></li>
						@endcan
						@can('categories')
							<li><a href="{{ route('categories.index') }}">Categories</a></li>
						@endcan
						@can('types')
							<li><a href="{{ route('types.index') }}">Types</a></li>
						@endcan
					</ul>
					</li>

					
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
						<i class="fas fa-user-tag"></i>
						<span class="nav-text">Authorization</span>
						</a>
						<ul aria-expanded="false">
							@can('roles')
								<li><a href="{{ route('roles.index') }}">Roles</a></li>
							@endcan
							@can('permissions')
								<li><a href="{{ route('permissions.index') }}">Permissions</a></li>
							@endcan
			
						</ul>
					</li>


                     @can('users')
					 	<li><a href="{{ route('users.index') }}" class="" aria-expanded="false">
							<i class="fas fa-user-check"></i>
							<span class="nav-text">Users</span>
						</a>
						</li>
					 @endcan

                </ul>
				
			</div>
        </div>