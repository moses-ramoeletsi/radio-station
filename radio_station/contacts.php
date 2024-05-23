<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 2rem;
            max-width: 1300px;
            margin: 0 auto;
        }
        .grid {
            display: grid;
            gap: 1rem;
            padding: 1rem;
        }
        .grid-2 {
            grid-template-columns: repeat(2, 1fr);
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 1rem;
            padding: 1rem;
        }
        .center {
            text-align: center;
        }
        .icon {
            font-size: 1.5rem;
            color: #3182ce;
            margin-right: 0.5rem;
        }
        .social-icon {
            font-size: 2rem;
            margin: 0 0.5rem;
        }
        .form-control {
            margin-bottom: 1rem;
        }
        .form-label {
            margin-bottom: 0.5rem;
            display: block;
        }
        .form-input,
        .form-textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
        }
        .form-textarea {
            resize: vertical;
        }
        .btn {
            background-color: #3182ce;
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #2b6cb0;
        }
        @media (min-width: 768px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .half-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 767px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include ('user_header.php'); ?>
    <div class="container">
        <div class="grid grid-2">
            <div>
                <div class="center">
                    <h2>Contact Information</h2>
                    <img src="/assets/images/icon.png" alt="Air Academy FM Logo" style="width: 32%; border-radius: 50%;">
                </div>
                <div class="card">
                    <div class="form-control">
                        <i class="fas fa-map-marker-alt icon"></i>
                        <span>Qoaling, <br>Maseru 100, <br>Lesotho</span>
                    </div>
                    <div class="form-control">
                        <i class="fas fa-phone icon"></i>
                        <span>+266 56121920</span>
                    </div>
                    <div class="form-control">
                        <i class="fas fa-envelope icon"></i>
                        <span>info@airacademyfm.com</span>
                    </div>
                </div>
                <div class="center" style="margin-top: 1rem;">
                    <a href="#" class="social-icon"><i class="fab fa-whatsapp" style="color: green;"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-facebook" style="color: #4267B2;"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-telegram" style="color: #0088cc;"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter" style="color: #1DA1F2;"></i></a>
                </div>
            </div>
            <div>
                <div class="card">
                    <h2 class="center">Get in Touch</h2>
                    <p>Have a question or suggestion? Feel free to get in touch with us using the form below. We'll get back to you as soon as possible!</p>
                    <form>
                        <div class="half-grid">
                            <div class="form-control">
                                <label class="form-label" for="firstName">First Name</label>
                                <input type="text" id="firstName" name="firstName" class="form-input" placeholder="Your First Name">
                            </div>
                            <div class="form-control">
                                <label class="form-label" for="lastName">Last Name</label>
                                <input type="text" id="lastName" name="lastName" class="form-input" placeholder="Your Last Name">
                            </div>
                        </div>
                        <div class="half-grid">
                            <div class="form-control">
                                <label class="form-label" for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-input" placeholder="Your Email Address">
                            </div>
                            <div class="form-control">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-input" placeholder="Your Phone Number">
                            </div>
                        </div>
                        <div class="form-control">
                            <label class="form-label" for="message">Message</label>
                            <textarea id="message" name="message" class="form-textarea" rows="4" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
