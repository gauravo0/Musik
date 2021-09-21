<!DOCTYPE html>
<html>
  <head>
    <title>MUSIK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>

  <body>
    <ul>
    <li><a href="home.php">Home</a></li>
      <li><a href="contact.php">Register</a></li>
      <li><a href="about.php">Log In</a></li>
      <li><a href="musicplayer.php">Music Player</a></li>
    </ul>

    <div class="main">
      <p id="logo"><i class="fa fa-music"></i>MUSIK</p>

      <!-- show_song_number -->
      <div class="show_song_no">
        <p id="present">1</p>
        <p>/</p>
        <p id="total">5</p>
      </div>

      <!--- left part --->
      <div class="left">
        <!--- song img --->
        <img id="track_image" />
        <div class="volume">
          <p id="volume_show">90</p>
          <i
            class="fa fa-volume-up"
            aria-hidden="true"
            onclick="mute_sound()"
            id="volume_icon"
          ></i>
          <input
            type="range"
            min="0"
            max="100"
            value="90"
            onchange="volume_change()"
            id="volume"
          />
        </div>
      </div>

      <!--- right part --->
      <div class="right">
        <!--- song title & artist name --->
        <div class="song_detail">
          <p id="title">title.mp3</p>
          <p id="artist">Artist name</p>
        </div>

        <!--- middle part --->
        <div class="middle">
          <button onclick="previous_song()" id="pre">
            <i class="fa fa-step-backward" aria-hidden="true"></i>
          </button>
          <button onclick="justplay()" id="play">
            <i class="fa fa-play" aria-hidden="true"></i>
          </button>
          <button onclick="next_song()" id="next">
            <i class="fa fa-step-forward" aria-hidden="true"></i>
          </button>
        </div>

        <!--- song duration part --->
        <div class="duration">
          <input
            type="range"
            min="0"
            max="100"
            value="0"
            id="duration_slider"
            onchange="change_duration()"
          />
          <button id="auto" onclick="autoplay_switch()">
            Auto &nbsp;<i class="fa fa-circle-o-notch" aria-hidden="true"></i>
          </button>
        </div>
      </div>
    </div>

    <script src="main.js"></script>
  </body>
</html>
