<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    .audio-player-container {
        max-width: 300px;
        margin: 20px auto;
        text-align: center;
    }

    .live-indicator {
        background-color: #4CAF50;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .audio-controls button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        margin: 5px;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
    }

    .audio-controls button:hover {
        background-color: #45a049;
    }
</style>

<div class="audio-player-container">
    <!-- Live indicator -->
    <div class="live-indicator" id="live-indicator">Live Now</div>
    
    <!-- Audio player -->
    <audio id="audio-player" src="https://listen-nation.sharp-stream.com/nationradio80s.mp3" type="audio/mpeg"></audio>

    <!-- Custom play and pause buttons with icons -->
    <div class="audio-controls">
        <button id="play-button"><i class="fas fa-play"></i></button>
        <button id="pause-button" style="display:none;"><i class="fas fa-pause"></i></button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var audio = document.getElementById('audio-player');
        var playButton = document.getElementById('play-button');
        var pauseButton = document.getElementById('pause-button');
        
        playButton.addEventListener('click', function() {
            audio.play();
            playButton.style.display = 'none';
            pauseButton.style.display = 'inline-block';
        });

        pauseButton.addEventListener('click', function() {
            audio.pause();
            pauseButton.style.display = 'none';
            playButton.style.display = 'inline-block';
        });

        audio.addEventListener('play', function() {
            playButton.style.display = 'none';
            pauseButton.style.display = 'inline-block';
        });

        audio.addEventListener('pause', function() {
            playButton.style.display = 'inline-block';
            pauseButton.style.display = 'none';
        });

        audio.addEventListener('ended', function() {
            playButton.style.display = 'inline-block';
            pauseButton.style.display = 'none';
        });
    });
</script>
