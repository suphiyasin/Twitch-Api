[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=https://github.com/suphiyasin/Twitch-Api&count_bg=%23C83D3D&title_bg=%23057386&icon=&icon_color=%23BA0808&title=View&edge_flat=false)](https://github.com/suphiyasin/Twitch-Api)


<br />
<p align="center">
<a href="https://github.com/suphiyasin/Twitch-Api/">
    
![image](https://user-images.githubusercontent.com/65618247/179454194-63852586-f2ff-4d31-a329-405c68404df5.png)



</a>

<h3 align="center">Twitch Api V1.0.0</h3>

<p align="center">
twitch login, 2 factor login, follow/unfollow streamers, report inappropriate broadcasts and new features as the day progresses..
    <br>
    <a href="https://github.com/suphiyasin/Twitch-Api/issues">Feedback</a>
    <br>
    <a href="https://github.com/suphiyasin/Twitch-Api/blob/main/README-TR.md" style="font-size:24px">Türkçe</a>
</p>


## About the project

Twitch login, 2 factor login, follow/unfollow streamers, report inappropriate broadcasts and new features as the day progresses..


### Requirements

- PHP 7.4 or higher

## Using the repo by downloading

1. <a href="https://github.com/suphiyasin/Twitch-Api/archive/refs/heads/main.zip">This</a> download script
2. Edit test.php:8 
3. Run test.php

# Examples

### Login 
```
<?php
session_start();
include("api.php");
$use = new tw();
$look = $use->login("TWITCH-USERNAME", "TWITCH-PASSWORD");
echo $look;

```

### Two Factor Login
```
<?php
session_start();
include("api.php");
$use = new tw();
$use->auth = $_SESSION['authcode'];
$look = $use->login("TWITCH-USERNAME", "TWITCH-PASSWORD");
echo $look;
if(isset($_POST['codetoken'])){
	$check = $use->twofactor($_POST['codetoken'], $_POST['code']);
	echo $check;
}

```

### Follow
```
<?php
session_start();
include("api.php");
$use = new tw();
$use->auth = $_SESSION['authcode'];
$use->follow("wtcn");
``` 

### Unfollow
```
<?php
session_start();
include("api.php");
$use = new tw();
$use->auth = $_SESSION['authcode'];
$use->unfollow("wtcn");
``` 
### Info 
```
<?php
session_start();
include("api.php");
$use = new tw();
$use->auth = $_SESSION['authcode'];
$info = $use->getInfo("wtcn");
//0 = bio , 1 = username, 2 = pplink, 3 = offline pp, 4 = viewcount, 5 = Create Date, 6 = display name
$a = explode("`", $info);
echo '<img src="'.$a[3].'"/>';
```
### Report Streamer
```
<?php
session_start();
include("api.php");
$use = new tw();
$use->auth = $_SESSION['authcode'];
$use->report("reason for report", "StreamerUsername");
```


[contributors-shield]: https://img.shields.io/github/contributors/suphiyasin/Twitch-Api.svg?style=for-the-badge
[contributors-url]: https://github.com/suphiyasin/Twitch-Api/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/suphiyasin/Twitch-Api.svg?style=for-the-badge
[forks-url]: https://github.com/suphiyasin/Twitch-Api/network/members
[stars-shield]: https://img.shields.io/github/stars/suphiyasin/Twitch-Api.svg?style=for-the-badge
[stars-url]: https://github.com/suphiyasin/Twitch-Api/stargazers
[issues-shield]: https://img.shields.io/github/issues/suphiyasin/Twitch-Api.svg?style=for-the-badge
[issues-url]: https://github.com/suphiyasin/Twitch-Api/issues
