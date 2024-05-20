<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .sticky {
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            background-color: #130f2b;
            color: white;
            min-height: 60px;
            padding: 0.5rem 1rem;
            border-bottom: 1px solid gray;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-logo {
            font-family: heading;
            font-weight: 800;
            text-align: center;
        }

        .desktop-nav,
        .mobile-nav {
            display: none;
        }

        .desktop-nav a,
        .mobile-nav a {
            color: white;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.5rem;
            text-decoration: none;
        }

        .desktop-nav a:hover,
        .mobile-nav a:hover {
            border-radius: 0.375rem;
            background: gray;
            text-decoration: underline;
            color: white;
        }

        .mobile-nav {
            background-color: white;
            padding: 1rem;
        }

        .mobile-nav a {
            color: gray;
            display: block;
            padding: 0.5rem 0;
        }

        .mobile-nav .submenu {
            margin-top: 0 !important;
            margin-left: 1rem;
            border-left: 1px solid gray;
        }

        .hamburger {
            display: flex;
            background: none;
            border: none;
            color: white;
            cursor: pointer;
        }

        .hamburger:focus {
            outline: none;
        }

        .audio-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .audio-controls button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 1.25rem;
        }

        .audio-controls button:focus {
            outline: none;
        }

        .persistent-player {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #130f2b;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0.5rem 0;
        }

        .persistent-player button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 1.25rem;
        }

        .persistent-player button:focus {
            outline: none;
        }

        @media (min-width: 768px) {
            .desktop-nav {
                display: flex;
                justify-content: center;
                gap: 1rem;
            }

            .hamburger {
                display: none;
            }
        }

        @media (max-width: 767px) {
            .mobile-nav {
                display: flex;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="sticky">
        <div class="nav-container">
            <button class="hamburger" id="nav-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="nav-logo">
                Radio Station
            </div>
            <div class="desktop-nav">
                <a href="home.php">Home</a>
                <a href="news.php">Latest news</a>
                <a href="schedule.php">Schedule</a>
                <a href="advertisement.php">Advertisement</a>
                <a href="about.php">About us</a>
                <a href="contacts.php">Contact us</a>
            </div>
        </div>
        <div class="mobile-nav" id="mobile-nav">
            <a href="home.php">Home</a>
            <a href="news.php">Latest news</a>
            <a href="schedule.php">Schedule</a>
            <a href="advertisement.php">Advertisement</a>
            <a href="about.php">About us</a>
            <a href="contacts.php">Contact us</a>
        </div>
    </div>

    <script src="persistent-player.js" defer></script>
</body>
</html>
