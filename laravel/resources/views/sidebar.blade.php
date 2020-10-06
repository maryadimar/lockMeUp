
@if (Auth::user()->role->id == 1)
	<li class="nav-item">
		<a href="#" class="nav-link">
		  <i class="nav-icon fas fa-tachometer-alt"></i>
		  <p>
		    Dashboard
		  </p>
		</a>
	</li>
	<li class="nav-item">
		<a href="#" class="nav-link">
		  <i class="nav-icon fas fa-copy"></i>
		  <p>
		    Booking
		  </p>
		</a>
	</li>
	<li class="nav-item has-treeview">
	    <a href="#" class="nav-link">
	      <i class="nav-icon fas fa-th"></i>
	      <p>
	        Master
	        <i class="right fas fa-angle-left"></i>
	      </p>
	    </a>
	    <ul class="nav nav-treeview">
			<li class="nav-item">
				<a href="/sa/meetingid" class="nav-link">
				  <i class="far fa-circle nav-icon"></i>
				  <p>Meeting ID</p>
				</a>
			</li>

			<li class="nav-item">
				<a href="/sa/lantai" class="nav-link">
				  <i class="far fa-circle nav-icon"></i>
				  <p>Lantai</p>
				</a>
			</li>

			<li class="nav-item">
				<a href="/sa/bagian" class="nav-link">
				  <i class="far fa-circle nav-icon"></i>
				  <p>Bagian</p>
				</a>
			</li>
	    </ul>
  	</li>
	<li class="nav-item has-treeview">
	    <a href="#" class="nav-link">
	      <i class="nav-icon fas fa-users"></i>
	      <p>
	        Users
	        <i class="right fas fa-angle-left"></i>
	      </p>
	    </a>
	    <ul class="nav nav-treeview">
	      <li class="nav-item">
	        <a href="/sa/admin" class="nav-link">
	          <i class="far fa-circle nav-icon"></i>
	          <p>Admin</p>
	        </a>
	      </li>
	      <li class="nav-item">
	        <a href="pages/charts/flot.html" class="nav-link">
	          <i class="far fa-circle nav-icon"></i>
	          <p>Member</p>
	        </a>
	      </li>
	    </ul>
  	</li>
@elseif(Auth::user()->role->id == 2)	
	<li class="nav-item">
		<a href="/home" class="nav-link">
		  <i class="nav-icon fas fa-tachometer-alt"></i>
		  <p>
		    Dashboard
		  </p>
		</a>
	</li>
	<li class="nav-item has-treeview">
	    <a href="#" class="nav-link">
	      <i class="nav-icon fas fa-th"></i>
	      <p>
	        Ruangan
	        <i class="right fas fa-angle-left"></i>
	      </p>
	    </a>
	    <ul class="nav nav-treeview">
			<li class="nav-item">
				<a href="/admin/booking" class="nav-link">
				  <i class="far fa-circle nav-icon"></i>
				  <p>Booking</p>
				</a>
			</li>

			<li class="nav-item">
				<a href="/admin/booking/antrian" class="nav-link">
				  <i class="far fa-circle nav-icon"></i>
				  <p>Antrian</p>
				</a>
			</li>
	    </ul>
  	</li>
	
	<li class="nav-item">
		<a href="/admin/booking/vicon" class="nav-link">
		  <i class="nav-icon fas fa-file-alt"></i>
		  <p>
		    Vicon
		  </p>
		</a>
	</li>

	<!-- <li class="nav-item">
		<a href="/admin/booking/index-vicon-pribadi" class="nav-link">
		  <i class="nav-icon fas fa-file-alt"></i>
		  <p>
		    Pribadi
		  </p>
		</a>
	</li> -->

	<li class="nav-item">
		<a href="/admin/user" class="nav-link">
		  <i class="nav-icon fas fa-user"></i>
		  <p>
		    User
		  </p>
		</a>
	</li>
@else
	<li class="nav-item">
		<a href="/home" class="nav-link">
		  <i class="nav-icon fas fa-tachometer-alt"></i>
		  <p>
		    Dashboard
		  </p>
		</a>
	</li>
	<li class="nav-item">
		<a href="/user/antrian-meeting" class="nav-link">
		  <i class="nav-icon fas fa-file-alt"></i>
		  <p>
		    Antrian Ku
		  </p>
		</a>
	</li>
	<li class="nav-item">
		<a href="/user/profile" class="nav-link">
		  <i class="nav-icon fas fa-user"></i>
		  <p>
		    Profile
		  </p>
		</a>
	</li>
	<li class="nav-item">
		<a href="/user/booking-search" class="nav-link">
		  <i class="nav-icon fas fa-search"></i>
		  <p>
		    Cari
		  </p>
		</a>
	</li>
@endif