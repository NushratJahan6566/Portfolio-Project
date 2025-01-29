<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Logo Styling */
        .webcraft-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            font-weight: 700;
            color: #f39c12;
            font-family: 'Dancing Script', cursive;
            margin-bottom: 20px;
        }

        .webcraft-logo i {
            font-size: 3.5rem;
            margin-right: 10px;
        }

        .form-container {
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 10px;
            background: radial-gradient(circle, rgba(255,255,255,1) 20%, rgba(104, 129, 198, 0.3) 100%);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #333333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555555;
            font-size: 14px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Updated Button Style */
        .btn {
            width: 100%;
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

        .btn:hover {
            background: #003c8f;
        }

        .message {
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
        }

        .message.error {
            color: #842029;
            background-color: #f8d7da;
            border: 1px solid #f5c2c7;
        }

        .message.success {
            color: #0f5132;
            background-color: #d1e7dd;
            border: 1px solid #badbcc;
        }
    </style>
</head>
<body>

    <!-- Logo outside the form -->
    <div class="webcraft-logo">
        <i class="fas fa-code"></i> <span>Portfolio Lab</span>
    </div>

    <div class="form-container">
        <h2>Verify Code</h2>
        <form action="{{ route('post-verify-code') }}" method="POST">
            @csrf
            
            <input
                type="text"
                name="code"
                required
                placeholder="Enter your verification code"
                value="{{ old('code') }}"
            >
            <button type="submit" class="btn">Verify Code</button>

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="message error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Display success message -->
            @if (session('success'))
                <div class="message success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display error messages -->
            @if (session('error'))
                <div class="message error">
                    {{ session('error') }}
                </div>
            @endif
        </form>
    </div>

</body>
</html>
