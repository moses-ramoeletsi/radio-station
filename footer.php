
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        padding: 0;
        }
        .footer-container {
            background-color: #f7fafc;
            color: #4a5568;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            max-width: 1280px;
            margin: 0 auto;
            flex-direction: row;
        }
        .footer-container img {
            height: 40px;
        }
        .footer-container p {
            margin: 0.5rem 0;
        }
        .social-buttons {
            display: flex;
            gap: 1.5rem;
        }
        .social-button {
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            width: 2rem;
            height: 2rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .social-button:hover {
            background-color: rgba(0, 0, 0, 0.2);
        }
        .hidden {
            display: none;
        }
    </style>
    <div class="footer-container">
        <img src="/assets/images/logo.png" alt="Logo">
        <p>© 2024 LowLife Dev. All rights reserved</p>
        <div class="social-buttons">
            <a class="social-button" href="#" aria-label="Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a class="social-button" href="#" aria-label="WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a class="social-button" href="#" aria-label="Twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a class="social-button" href="#" aria-label="Telegram">
                <i class="fab fa-telegram"></i>
            </a>
            <a class="social-button" href="#" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>
