		<!--sidebar-wrapper-->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div class="">
					<img src="assets/images/logo-icon.png" class="logo-icon-2" alt="" />
				</div>
				<div>
					<h4 class="logo-text">SI PARKIR</h4>
				</div>
				<a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
				</a>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{route('dashboard.index')}}" class="">
						<div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					
				</li>
				<li class="menu-label">Data</li>
				<li>
					<a href="{{route('user.index')}}">
						<div class="parent-icon icon-color-4"> <i class="bx bx-user"></i>
						</div>
						<div class="menu-title">Data User</div>
					</a>
				</li>
								<li>
					<a href="{{route('mahasiswa.index')}}">
						<div class="parent-icon icon-color-4"> <i class="bx bx-user"></i>
						</div>
						<div class="menu-title">Data Mahasiswa</div>
					</a>
				</li>

			
				
			</ul>
			<!--end navigation-->
		</div>