document.addEventListener('DOMContentLoaded', function() {
    
    const playerContainer = document.createElement('div');
    playerContainer.classList.add('persistent-player');

    
    const playBtn = document.createElement('button');
    playBtn.id = 'play-btn';
    playBtn.innerHTML = '<i class="fas fa-play"></i>';

    const pauseBtn = document.createElement('button');
    pauseBtn.id = 'pause-btn';
    pauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
    pauseBtn.style.display = 'none';

    
    const audio = document.createElement('audio');
    audio.id = 'radio';
    audio.src = 'https://listen-nation.sharp-stream.com/nationradio80s.mp3';
    audio.loop = true;

    
    playerContainer.appendChild(playBtn);
    playerContainer.appendChild(pauseBtn);
    playerContainer.appendChild(audio);
    document.body.appendChild(playerContainer);

    
    if (localStorage.getItem('radioPlaying') === 'true') {
        audio.play();
        playBtn.style.display = 'none';
        pauseBtn.style.display = 'block';
    }

    
    playBtn.addEventListener('click', () => {
        audio.play();
        playBtn.style.display = 'none';
        pauseBtn.style.display = 'block';
        localStorage.setItem('radioPlaying', 'true');
    });

    
    pauseBtn.addEventListener('click', () => {
        audio.pause();
        playBtn.style.display = 'block';
        pauseBtn.style.display = 'none';
        localStorage.setItem('radioPlaying', 'false');
    });
});
