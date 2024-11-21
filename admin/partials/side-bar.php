<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary vh-100">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company Name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/admin/Dashboard.php">
                        <i class="fa-solid fa-gauge fa-fw me-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/admin/subject/add.php">
                        <i class="fa-solid fa-book fa-fw me-2"></i>
                        Subjects
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/admin/student/register.php">
                        <i class="fa-solid fa-user fa-fw me-2"></i>
                        Students
                    </a>
                </li>                
            </ul>

            <hr class="my-3">

            <!-- Logout Button -->
            <div class="mt-auto">
                <a href="logout.php" class="btn btn-danger w-0 d-flex align-items-center justify-content-center gap-2">
                   
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>
