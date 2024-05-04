 <!--**********************************
            Sidebar start
        ***********************************-->
 <div class="deznav">
     <div class="deznav-scroll">
         <ul class="metismenu" id="menu">
             <li>
                <a href="{{ route('admin-dashboard') }}" aria-expanded="false">
                     <i class="fa-solid fa-house"></i>
                     <span class="nav-text">Dashboard</span>
                 </a>
             </li>
             <li>
                <a href="{{ route('department') }}" aria-expanded="false">
                     <i class="fa-solid fa-building-user"></i>
                     <span class="nav-text">Department</span>
                 </a>
             </li>
             <li>
                <a href="{{ route('designation') }}" aria-expanded="false">
                     <i class="fa-solid fa-building-columns"></i>
                     <span class="nav-text">Designation</span>
                 </a>
             </li>
             <li class="has-menu">
                 <a class="has-arrow ai-icon" href="#" aria-expanded="false">
                     <i class="fa-solid fa-user"></i>
                     <span class="nav-text">Employee</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{ route('add-employee') }}">Add</a></li>
                     <li><a href="{{ route('all-employee') }}">List</a></li>
                 </ul>
             </li>
             <li>
                <a href="{{ route('all-leavetype') }}" aria-expanded="false">
                     <i class="fas fa-envelope"></i>
                     <span class="nav-text">Leave Type</span>
                 </a>
             </li>


         </ul>
     </div>
 </div> <!--**********************************
                    Sidebar end
                ***********************************-->