<?php 
include_once "includes/functions.php";
$id = 0;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}
$posts = get_posts($id);
$artists = get_artists($id);
?>

const music = new Audio('/pages/Undefined.mp3');


// create Array

const songs = [
    <?php $n = 1;
    foreach ($posts as $post) { ?>
    {
        id:"<?php echo $n++; ?>",
        songName:`<?php echo $post['name_song'] ?><br>
            <div class="subtitle"><?php echo $post['nickname'] ?></div>`,
        poster: "<?php echo $post['avatar_song'] ?>",
        source: "<?php echo get_url('artist?id=' . $post['artist_id']); ?>",
    },
    <?php } ?>
]
console.log(songs);

/*Array.from(document.getElementsByClassName('songItem')).forEach((element, i)=>{
    element.getElementsByTagName('img')[0].src = songs[i].poster;
    element.getElementsByTagName('h5')[0].innerHTML = songs[i].songName;
})*/


// search data start

let search_result = document.getElementsByClassName('search_result')[0];

songs.forEach(element => {
    const{ id, songName, poster, source } = element;
    let card = document.createElement('a');
    card.href = `${source}`;
    card.classList.add('card');
    card.innerHTML = `
    <img src ="${poster}" alt="">
    <div class="content-card">
        ${songName}
    </div>
    `;
    search_result.appendChild(card);
});

let input = document.getElementsByTagName('input')[0];

input.addEventListener('keyup', ()=>{
    let input_value = input.value.toUpperCase();
    let items = search_result.getElementsByTagName('a');

    for (let i = 0; i < items.length; i++) {
        const as = items[i].getElementsByClassName('content-card')[0];
        let text_value = as.textContent || as.innerText;

        if (text_value.toUpperCase().indexOf(input_value) > -1) {
            items[i].style.display = "flex";
        } else {
            items[i].style.display = "none";
        }

        if (input.value == 0) {
            search_result.style.display = "none";
        } else {
            search_result.style.display = "flex";
        }
    }
})
// search data end

let master_play = document.getElementById('masterPlay');
let wave = document.getElementsByClassName('wave')[0]

masterPlay.addEventListener('click',()=>{
    if (music.paused || music.currentTime <=0) {
        music.play();
        master_play.classList.remove('bi-play-fill');
        master_play.classList.add('bi-pause-fill');
        wave.classList.add('active2');
    } else {
        music.pause();
        master_play.classList.add('bi-play-fill');
        master_play.classList.remove('bi-pause-fill');
        wave.classList.remove('active2');
    }
})

const makeAllPlays = () =>{
    Array.from(document.getElementsByClassName('playListPlay')).forEach((element)=>{
        element.classList.add('bi-play-circle-fill');
        element.classList.remove('bi-pause-circle-fill');
    })
}

const makeAllBackgrounds = () =>{
    Array.from(document.getElementsByClassName('songItem')).forEach((element)=>{
        //element.style.background = "rgba(255, 255, 255, 0)";
        element.style['border-radius'] = '20px';
})
}

let index = 0;
let poster_master_play = document.getElementById('poster_master_play');
let title = document.getElementById('title');
Array.from(document.getElementsByClassName('playListPlay')).forEach((element)=>{
    element.addEventListener('click', (e)=>{
        index = e.target.id;
        makeAllPlays();
        e.target.classList.remove('bi-play-circle-fill');
        e.target.classList.add('bi-pause-circle-fill');
        music.src = `/pages/audio/${index}.mp3`;
        poster_master_play.src = `/pages/img/poster/${index}.jpg`;
        music.play();
        let song_title = songs.filter((ele)=>{
            return ele.id == index;
        })

        song_title.forEach(ele => {
            let {songName} = ele;
            title.innerHTML = songName;
        })
        master_play.classList.remove('bi-play-fill');
        master_play.classList.add('bi-pause-fill');
        wave.classList.add('active2');
        // music.addEventListener('ended',()=>{
        //     master_play.classList.add('bi-play-fill');
        //     master_play.classList.remove('bi-pause-fill');
        //     wave.classList.remove('active2');
        // })
        makeAllBackgrounds();
        //Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = "rgba(255, 255, 255, 0.35)";
        console.log(index);
    })
})

let currentStart = document.getElementById('currentStart');
let currentEnd = document.getElementById('currentEnd');
let seek = document.getElementById('seek');
let bar2 = document.getElementById('bar2');
let dot = document.getElementsByClassName('dot')[0];

music.addEventListener('timeupdate',()=>{
    let music_curr = music.currentTime;
    let music_dur = music.duration;

    let min = Math.floor(music_dur/60);
    let sec = Math.floor(music_dur%60);
    if (sec<10) {
        sec = `0${sec}`
    }
    currentEnd.innerText = `${min}:${sec}`;

    let min1 = Math.floor(music_curr/60);
    let sec1 = Math.floor(music_curr%60);
    if (sec1<10) {
        sec1 = `0${sec1}`
    }
    currentStart.innerText = `${min1}:${sec1}`;

    let progressbar = parseInt((music.currentTime/music.duration)*100);
    seek.value = progressbar;
    let seekbar = seek.value;
    bar2.style.width = `${seekbar}%`;
    dot.style.left = `${seekbar}%`;
})

seek.addEventListener('change', ()=>{
    music.currentTime = seek.value * music.duration/100;
})


music.addEventListener('ended', ()=>{
    masterPlay.classList.add('bi-pause-fill');
    wave.classList.add('active2');
    index ++;
    music.src = `/pages/audio/${index}.mp3`;
    poster_master_play.src = `/pages/img/poster/${index}.jpg`;
    music.play();
    let song_title = songs.filter((ele)=>{
        return ele.id == index;
    })
    song_title.forEach(ele => {
        let {songName} = ele;
        title.innerHTML = songName;
    })

    makeAllBackgrounds();
    //Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = "rgba(255, 255, 255, 0.35)";
    makeAllPlays();
    document.getElementsByClassName('playlistPlay')[index - 1].classList.remove('bi-play-circle-fill');
    document.getElementsByClassName('playlistPlay')[index - 1].classList.add('bi-pause-circle-fill');
})


let vol_icon = document.getElementById('vol_icon');
let vol = document.getElementById('vol');
let vol_dot = document.getElementById('vol_dot');
let vol_bar = document.getElementsByClassName('vol_bar')[0];

vol.addEventListener('change', ()=>{
    if (vol.value == 0) {
        vol_icon.classList.remove('bi-volume-down');
        vol_icon.classList.add('bi-volume-mute');
        vol_icon.classList.remove('bi-volume-up');
    }
    if (vol.value > 0) {
        vol_icon.classList.add('bi-volume-down');
        vol_icon.classList.remove('bi-volume-mute');
        vol_icon.classList.remove('bi-volume-up');
    }
    if (vol.value > 50) {
        vol_icon.classList.remove('bi-volume-down');
        vol_icon.classList.remove('bi-volume-mute');
        vol_icon.classList.add('bi-volume-up');
    }

    let vol_a = vol.value;
    vol_bar.style.width = `${vol_a}%`;
    vol_dot.style.left = `${vol_a}%`;
    music.volume = vol_a/100;
})


let back = document.getElementById('back');
let next = document.getElementById('next');

back.addEventListener('click', ()=>{
    index -= 1;
    if (index < 1) {
        index = Array.from(document.getElementsByClassName('songItem')).length;
    }
    music.src = `/pages/audio/${index}.mp3`;
    poster_master_play.src =`/pages/img/poster/${index}.jpg`;
    music.play();
    let song_title = songs.filter((ele)=>{
        return ele.id == index;
    })

    song_title.forEach(ele =>{
        let {songName} = ele;
        title.innerHTML = songName;
    })

    makeAllPlays()

    document.getElementById(`${index}`).classList.remove('bi-play-fill');
    document.getElementById(`${index}`).classList.add('bi-pause-fill');
    master_play.classList.remove('bi-play-fill');
    master_play.classList.add('bi-pause-fill');
    wave.classList.add('active2');
    makeAllBackgrounds();
    //Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = "rgba(255, 255, 255, 0.35)";
    document.getElementById(`${index}`).classList.remove('bi-play-circle-fill');
    document.getElementById(`${index}`).classList.add('bi-pause-circle-fill');
})

next.addEventListener('click', ()=>{
    index -= 0;
    index +=1;
    if (index > Array.from(document.getElementsByClassName('songItem')).length) {
        index = 1;
    }
    music.src = `/pages/audio/${index}.mp3`;
    poster_master_play.src =`/pages/img/poster/${index}.jpg`;
    music.play();
    let song_title = songs.filter((ele)=>{
        return ele.id == index;
    })

    song_title.forEach(ele =>{
        let {songName} = ele;
        title.innerHTML = songName;
    })

    makeAllPlays()

    document.getElementById(`${index}`).classList.remove('bi-play-fill');
    document.getElementById(`${index}`).classList.add('bi-pause-fill');
    master_play.classList.remove('bi-play-fill');
    master_play.classList.add('bi-pause-fill');
    wave.classList.add('active2');
    makeAllBackgrounds();
    //Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = "rgba(255, 255, 255, 0.35)";
    document.getElementById(`${index}`).classList.remove('bi-play-circle-fill');
    document.getElementById(`${index}`).classList.add('bi-pause-circle-fill');
})
