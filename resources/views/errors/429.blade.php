<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>429 Too Many Requests | Laravel</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;1,400&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            color: #2d3748;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            width: 100%;
            text-align: center;
            padding: 40px 30px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
        }

        .error-code {
            font-size: 120px;
            font-weight: 700;
            color: #e53e3e;
            line-height: 1;
            margin-bottom: 20px;
        }

        .error-title {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #2d3748;
        }

        .error-message {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
            color: #4a5568;
        }

        .animation-container {
            margin: 40px auto;
            max-width: 300px;
        }

        .timer-svg {
            width: 100%;
            height: auto;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-primary {
            background: #e53e3e;
            color: white;
        }

        .btn-primary:hover {
            background: #c53030;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: transparent;
            color: #4a5568;
            border: 1px solid #e2e8f0;
        }

        .btn-secondary:hover {
            border-color: #cbd5e0;
            transform: translateY(-2px);
        }

        .help-text {
            margin-top: 30px;
            font-size: 14px;
            color: #718096;
        }

        @media (max-width: 640px) {
            .error-code {
                font-size: 80px;
            }

            .error-title {
                font-size: 24px;
            }

            .error-message {
                font-size: 16px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }

        /* Animation for the timer */
        @keyframes countdown {
            from {
                stroke-dashoffset: 0;
            }

            to {
                stroke-dashoffset: 283;
            }
        }

        .countdown-circle {
            fill: none;
            stroke: #e53e3e;
            stroke-width: 10;
            stroke-dasharray: 283;
            stroke-dashoffset: 0;
            animation: countdown 60s linear infinite;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="error-code">429</div>
        <h1 class="error-title">Too Many Requests</h1>
        <p class="error-message">
            You've made too many requests to our server recently.
            Please wait a moment before trying again.
        </p>

        <div class="animation-container">
            <svg class="timer-svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="45" fill="none" stroke="#edf2f7" stroke-width="10" />
                <circle class="countdown-circle" cx="50" cy="50" r="45" />
                <text x="50" y="55" text-anchor="middle" font-size="24" fill="#e53e3e" font-weight="bold">60s</text>
            </svg>
        </div>

        <div class="action-buttons">
            <a href="javascript:location.reload();" class="btn btn-primary">Try Again</a>
            <a href="/" class="btn btn-secondary">Go Home</a>
            <a href="javascript:history.back();" class="btn btn-secondary">Go Back</a>
        </div>

        <p class="help-text">
            If you believe this is a mistake, please contact support.
        </p>
    </div>
</body>

</html>
