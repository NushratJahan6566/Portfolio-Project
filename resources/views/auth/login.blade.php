<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #16222A, #3A6073);
        }
        .container {
            display: flex;
            max-width: 1000px;
            width: 90%;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        .left-section {
            flex: 1;
            position: relative;
            background: url('{{ asset('images/web6.webp') }}') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            padding: 50px;
        }
        .left-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.156); /* Darker overlay for better contrast */
        }
        .left-section-content {
            position: relative;
            z-index: 1;
        }
        .left-section h2 {
    font-size: 48px; /* Increased font size for better visibility */
    font-weight: 600; /* Use a slightly heavier weight for more boldness */
    margin-bottom: 10px;
    color: #ffffff; /* Pure white for maximum contrast */
    font-family: 'Poppins', sans-serif; /* Apply the Poppins font */
    text-shadow: 4px 4px 12px rgba(0, 0, 0, 0.4); /* Stronger, softer shadow for a more refined look */
}

.left-section p {
    font-size: 18px;
    margin-bottom: 20px;
    color: #ffffff; /* Slightly off-white for a cleaner look */
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3); /* Stronger shadow for contrast and readability */
}


        .right-section {
            flex: 1;
            background: radial-gradient(circle, rgba(255,255,255,1) 20%, rgba(104, 129, 198, 0.3) 100%);
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .right-section .user-icon {
            font-size: 60px;
            color: #1a73e8;
            margin-bottom: 20px;
        }
        /* Style for error message */
.error {
    color: #ff4d4d; /* Red color for the error text */
    font-size: 16px; /* Adjust the font size */
    margin-bottom: 20px;
    background-color: rgba(255, 77, 77, 0.1); /* Light red background for emphasis */
    padding: 10px;
    border-radius: 5px;
    display: flex; /* Display the icon and message in a row */
    align-items: center; /* Vertically center the content */
}

.error i {
    margin-right: 10px; /* Space between the icon and the text */
    color: #ff4d4d; /* Red color for the icon */
}

        .right-section h2 {
            font-size: 32px;
            font-weight: bold;
            color: #000; /* Black color for better contrast */
            margin-bottom: 30px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        }
        .input-group {
            width: 100%;
            max-width: 350px;
            margin-bottom: 20px;
            position: relative;
        }
        .input-group input {
            width: 100%;
            padding: 15px;
            padding-left: 45px;
            border: none;
            border-radius: 30px;
            background: #f3f3f3;
            font-size: 16px;
            color: #000; /* Black text color */
            outline: none;
            box-shadow: inset 0 0 10px rgba(0,0,0,0.1);
        }
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #aaa;
        }
        .login-btn {
            width: 100%;
            max-width: 350px;
            padding: 15px;
            border: none;
            background: linear-gradient(135deg, #1a73e8, #003c8f);
            color: #fff;
            font-size: 18px;
            border-radius: 30px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .login-btn:hover {
            background: #003c8f;
        }
        .social-text {
            margin: 20px 0;
            font-size: 16px;
            color: #555;
        }
        .social-icons a {
            margin: 0 10px;
            display: inline-block;
            font-size: 24px;
            color: #555;
            transition: 0.3s;
        }
        .social-icons a:hover {
            color: #1a73e8;
        }
    </style>
    
</head>
<body>
    <div class="container">
        <div class="left-section">
            <div class="admin-section">
                <h2>Welcome Back!</h2>
                <p>Manage your portfolio content and stay updated with the latest projects and posts.</p>
                
            </div>
            
        </div>
        <div class="right-section">
            <i class="fas fa-user-circle user-icon"></i>
            <h2>Login</h2>
           <!-- Display error message if session contains an error -->
@if(session('error'))
<div class="error" id="error-message">
    <i class="fas fa-exclamation-triangle"></i> 
    {{ session('error') }}
</div>

<script>
    // Close error message when clicking anywhere on the screen
    document.addEventListener('click', function(event) {
        const errorMessage = document.getElementById('error-message');
        if (errorMessage && !errorMessage.contains(event.target)) {
            errorMessage.style.display = 'none';
        }
    });
</script>
@endif

            
            <!-- Login Form -->
            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                
                <!-- Username Input -->
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                
                <!-- Password Input -->
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                
                <!-- Login Button -->
                <button class="login-btn" type="submit">Login</button>
            </form>
        </div>
        
    </div>
</body>
</html>
