<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chakra-ui/1.0.0-rc.5/chakra-ui.min.css" integrity="sha384-4lY5akVp6uKfLs8iJGBGOUlTt+Ym7mk1V1wRRqFydsStR3EsvGJwsBP4Qa1yJdxB" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 2rem;
            max-width: 1300px;
            margin: auto;
        }
        .heading {
            text-align: center;
            margin-bottom: 2rem;
        }
        .grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        .grid-item {
            display: flex;
            flex-direction: column;
        }
        .hstack {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            
            gap: 2rem;
        }
        p {
            text-align: justify;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            display: flex;
            gap: 1.5rem;
        }
        .card img {
            border-radius: 0.75rem;
            object-fit: cover;
        }
        @media (min-width: 768px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .hstack {
                flex-direction: row;
            }
            .card {
                flex-direction: row;
            }
        }
        @media (max-width: 767px) {
            .card {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<?php include ('user_header.php'); ?>
    <div class="container">
        <h1 class="heading">About Us</h1>
        <div class="grid">
            <div class="grid-item">
                <div class="hstack">
                    <div>
                        <h2>Our Mission</h2>
                        <p>
                            To serve as the premier platform for aviation enthusiasts and
                            professionals alike, Air Academy FM is committed to delivering
                            informative, engaging, and entertaining content that
                            celebrates the wonder of flight. Through our radio broadcasts,
                            we aim to inspire, educate, and unite individuals passionate
                            about aviation, fostering a community dedicated to the
                            exploration and advancement of aerospace knowledge.
                        </p>
                    </div>
                    
                    <div>
                        <h2>Our Vision</h2>
                        <p>
                            Air Academy FM envisions a world where the skies are not just
                            pathways, but sources of boundless inspiration and learning.
                            We aspire to be the beacon guiding enthusiasts, students, and
                            professionals through the intricate world of aviation,
                            providing a platform where dreams take flight and where the
                            wonders of the aerospace industry are shared with a global
                            audience. By embracing innovation and collaboration, we strive
                            to be the foremost destination for aviation education,
                            entertainment, and camaraderie, elevating the appreciation for
                            flight in all its forms.
                        </p>
                    </div>
                </div>
            </div>
            <div class="grid-item">
                <div>
                    <h2 style="text-align: center;">Station Background</h2>
                    <p>
                        Station Background: Air Academy FM was founded in [2023] with
                        the aim of filling a significant gap in the media landscape: a
                        dedicated radio station focused solely on aviation. From its
                        humble beginnings as a passion project, Air Academy FM has grown
                        into a reputable broadcasting platform, reaching audiences
                        across the globe. Our programming covers a diverse range of
                        topics, including aviation history, technology, safety, career
                        insights, and inspiring stories from within the aviation
                        industry. Whether you're a seasoned pilot, an aviation
                        enthusiast, or simply curious about the world of flight, Air
                        Academy FM offers something for everyone.
                    </p>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin: 2rem 0;">
            <h2>Air Academy Founder</h2>
        </div>
        <div class="card">
            <img src="/assets/images/Founder.jpg" alt="Founder Image" style="width: 100%; max-width: 200px;">
            <div>
                <h3>Mr. Reanetse M Ramoletsi</h3>
                <p>
                    Reanetse M Ramoeletsi, a visionary aviation enthusiast, is the
                    driving force behind the establishment of Air Academy FM. With a
                    lifelong passion for flight and a background in media and
                    communications, Reanetse recognized the need for a dedicated
                    radio station that caters to aviation enthusiasts worldwide.
                    Drawing upon their expertise in broadcasting and their deep love
                    for aviation, Reanetse embarked on a mission to create a
                    platform where people could not only learn about aviation but
                    also feel inspired and connected to the vast and exhilarating
                    world of flight. Through their leadership and unwavering
                    dedication, Reanetse has guided Air Academy FM to become a
                    leading voice in aviation broadcasting, enriching the lives of
                    listeners around the globe.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
