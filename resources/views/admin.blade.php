<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Base styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        /* Sidebar styles */
        .sidebar {
            background-color: #1a2b3c; /* Dark navy blue */
            color: white;
            padding: 20px;
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            transition: all 0.3s;
        }

        .sidebar .webcraft-logo {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #f39c12; /* Unique color for portfolio name */
            font-family: 'Dancing Script', cursive; /* Different font */
        }

        .sidebar .webcraft-logo i {
            font-size: 2rem;
            margin-right: 10px;
        }

        .sidebar h4 {
            color: #f1f1f1;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .sidebar .nav-link {
            color: #f1f1f1;
            font-size: 16px;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 15px;
            transition: background 0.3s;
        }

        .sidebar .nav-link:hover {
            color: #f39c12;
            background-color: #495057;
        }

        /* Header styles */
        .header {
            background-color: #1a2b3c; /* Dark navy blue */
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between; /* Align header items to the right */
            align-items: center;
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            z-index: 999;
            transition: all 0.3s;
        }

        .header .user-actions {
            display: flex;
            align-items: center;
        }

        .header .user-actions a {
            margin-left: 15px;
            color: white;
            font-size: 18px;
        }

        .header .user-actions a:hover {
            color: #f39c12;
        }

        /* Content styles */
        .content {
            margin-left: 250px;
            padding: 30px;
            min-height: 100vh;
            transition: margin-left 0.3s;
        }

        .content h2 {
            margin-bottom: 30px;
            font-size: 2rem;
            color: #333;
            font-weight: 600;
        }

        /* Banner styles */
        .banner {
            background-image: url('{{ asset('images/web3.png') }}');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .banner h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .banner p {
            font-size: 1.25rem;
        }

        /* Card Styles */
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin-bottom: 30px;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-weight: 600;
            font-size: 1.5rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Custom title style */
        .sidebar h4 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #f39c12; /* Portfolio name color */
            font-size: 1.8rem;
            letter-spacing: 1px;
            text-transform: capitalize;
            margin-bottom: 40px;
            text-align: center;
            font-weight: bold;
        }
        .sidebar .nav-link.active {
            background-color: #495057; /* Dark background for active link */
            color: #f39c12; /* Highlight the active link color */
        }

        .admin-title {
    color: white; /* White text color */
    font-size: 1.25rem; /* Make the font slightly larger */
    font-weight: 600; /* Slightly bolder font */
   /* Make the font italic */
    display: flex; /* Align the icon and text horizontally */
    align-items: center; /* Center the icon and text vertically */
}

.icon {
    margin-right: 10px;
     /* Space between icon and text */
     color:white;
}

.admin-dashboard-text {
    font-size: 1.1rem; 
    color: white;
    text-align: left; /* Ensures the text size remains consistent */
    
}
.sidebar-toggle {
    color: white;
    font-size: 1rem;
    cursor: pointer;
    background: none;
    border: none;
    padding: 10px 20px;
   
    font-weight: bold;
    order: -1;  /* This moves the button to the left of the header */
}


        

        /* Responsive design */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .content {
                margin-left: 200px;
            }

            .header {
                left: 200px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .content {
                margin-left: 0;
            }

            .sidebar .nav-link {
                font-size: 14px;
                padding: 12px;
            }
        }


    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="webcraft-logo">
            <i class="fas fa-code"></i> <span>Portfolio Lab</span>
        </div>
     

        <a href="{{ route('admin') }}" style="text-decoration: none;">
            <h4 class="admin-title">
                <i class="fas fa-tachometer-alt icon"></i> <span class="admin-dashboard-text">Admin Dashboard</span>
            </h4>
        </a>
        
        
        
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('services') ? 'active' : '' }}" href="{{ route('services.index') }}">
                    <i class="fas fa-cogs"></i> Services
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('contactdetails') ? 'active' : '' }}" href="{{ route('contactdetails.index') }}">
                    <i class="fas fa-address-card"></i> Contact Details
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('contactme*') ? 'active' : '' }}" href="{{ route('contactme.index') }}">
                    <i class="fas fa-envelope"></i> Contact Messages
                </a>
            </li>
            
            
            <li class="nav-item">
                <a class="nav-link {{ Request::is('aboutme/education*') ? 'active' : '' }}" href="{{ route('education.index') }}">
                    <i class="fas fa-graduation-cap"></i> Education
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('aboutme/about*') ? 'active' : '' }}" href="{{ route('about.index') }}">
                    <i class="fas fa-user"></i> About Me
                </a>
            </li>
            
            

            
           
            
            <li class="nav-item">
                <a class="nav-link {{ Request::is('portfolio*') ? 'active' : '' }}" href="{{ route('portfolio.index') }}">
                    <i class="fas fa-briefcase"></i> Portfolio
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('aboutme/skills*') ? 'active' : '' }}" href="{{ route('skills.index') }}">
                    <i class="fas fa-lightbulb"></i> Skills
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('aboutme/experience*') ? 'active' : '' }}" href="{{ route('experience.index') }}">
                    <i class="fas fa-briefcase"></i> Experience
                </a>
            </li>
            
            
           
           
        </ul>
    </div>

      <!-- Header -->
      <div class="header">
        <a href="{{ route('admin') }}" style="text-decoration: none;">
            <button class="sidebar-toggle" id="sidebar-toggle" style="color: white; font-size: 1rem; cursor: pointer; background: none; border: none; padding: 10px 20px; font-weight: bold;">
                <i class="fas fa-bars" style="margin-right: 8px;"></i> Home
            </button>
        </a>
        
        <div class="user-actions">
            <!-- Settings with Manage Email under it -->
<div class="settings-dropdown" style="position: relative; display: inline-block;">
    <a href="javascript:void(0);" class="settings-toggle" style="text-decoration: none; color: white; transition: color 0.3s;">
        <i class="fas fa-cog"></i> Settings
    </a>
    <div class="settings-menu" style="display: none; position: absolute; background: white; border: 1px solid #ddd; border-radius: 5px; padding: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); min-width: 150px;">
        <a href="/emails" style="display: block; padding: 8px 12px; text-decoration: none; color: #333;"> 
            <i class="fas fa-envelope"></i> Manage Email
        </a>
        
        <!-- Reset Password Option with Icon -->
        <a href="/change-credentials" style="display: block; padding: 8px 12px; text-decoration: none; color: #333;">
            <i class="fas fa-key"></i> Change Login Credentials
        </a>
    </div>
</div>

        
            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
                <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();" style="text-decoration: none; color: white; transition: color 0.3s;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </form>
        </div>
        
        <script>
            // JavaScript to toggle settings dropdown
            document.querySelector('.settings-toggle').addEventListener('click', function(event) {
                var dropdown = document.querySelector('.settings-menu');
                
                // Toggle the display property to show/hide the settings menu
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                
                // Prevent the event from bubbling up to document
                event.stopPropagation();
            });
        
            // Close the settings menu if the user clicks anywhere outside the dropdown
            document.addEventListener('click', function(event) {
                var dropdown = document.querySelector('.settings-menu');
                var settingsButton = document.querySelector('.settings-toggle');
        
                // Close the dropdown if the click is outside the settings button or the dropdown
                if (!settingsButton.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.style.display = 'none';
                }
            });
        </script>
        
        <style>
            /* Hover effect for settings and logout links */
            .user-actions a:hover {
                color: rgb(182, 113, 43) !important;
            }
        </style>
        
        
        
    </div>

    <!-- Main Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Welcome Banner -->
            <div class="col-12 banner">
                <h1>Welcome to Your Portfolio Dashboard</h1>
                <p>Manage your content with ease and showcase your skills effectively.</p>
            </div>
        </div>

        <!-- First Row: About Me, Education, Skills -->
        <div class="row mt-4">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center bg-success text-white">
                        <i class="fas fa-user fa-2x"></i>
                        <h5 class="card-title mt-2">About Me</h5>
                    </div>
                    <div class="card-body bg-light-success text-center">
                        <p>Keep your bio up-to-date to engage visitors.</p>
                        <a href="{{ route('about.index') }}" class="btn btn-success">Edit Profile</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center bg-warning text-white">
                        <i class="fas fa-graduation-cap fa-2x"></i>
                        <h5 class="card-title mt-2">Education</h5>
                    </div>
                    <div class="card-body bg-light-warning text-center">
                        <p>Showcase your academic journey.</p>
                        <a href="{{ route('education.index') }}" class="btn btn-warning">Manage Education</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center bg-info text-white">
                        <i class="fas fa-lightbulb fa-2x"></i>
                        <h5 class="card-title mt-2">Skills</h5>
                    </div>
                    <div class="card-body bg-light-info text-center">
                        <p>Highlight your expertise and talents.</p>
                        <a href="{{ route('skills.index') }}" class="btn btn-info">Manage Skills</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row: Contact Messages & Projects (Centered) -->
        <div class="row mt-4 justify-content-center">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center bg-dark text-white">
                        <i class="fas fa-envelope fa-2x"></i>
                        <h5 class="card-title mt-2">Contact Messages</h5>
                    </div>
                    <div class="card-body bg-light-dark text-center">
                        <h2>{{ $unreadMessagesCount }}</h2>
                        <p>Unread Messages</p>
                        <a href="{{ route('contactme.index') }}" class="btn btn-dark">View Messages</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header text-center bg-primary text-white">
                        <i class="fas fa-briefcase fa-2x"></i>
                        <h5 class="card-title mt-2">Projects</h5>
                    </div>
                    <div class="card-body bg-light-primary text-center">
                        <h2>{{ $projectCount }}</h2>
                        <p>Completed Projects</p>
                        <a href="{{ route('portfolio.index') }}" class="btn btn-primary">View Projects</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Third Row: Experience (Full Width) -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center text-white" style="background-color: #0a6a75;">
                        <i class="fas fa-briefcase"></i>
                        <h5 class="card-title mt-2" style="color: white;">Experience</h5>
                    </div>
                    <div class="card-body text-center bg-light">
                        <p>Showcase your professional journey and milestones.</p>
                        <a href="{{ route('experience.index') }}" class="btn" style="background-color: #0a6a75; color: #fff;">Manage Experience</a>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
   
    
</body>
</html>
