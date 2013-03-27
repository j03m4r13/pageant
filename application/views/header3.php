<html>
<head><title></title>
<script type="text/javascript" src="/pageant/js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  $("#pic_left img").load(function() {
    $(this).wrap(function(){
      return '<span class="image-wrap ' + $(this).attr('class') + '" style="position:relative; display:inline-block; background:url(' + $(this).attr('src') + ') no-repeat center center; width: ' + $(this).width() + 'px; height: ' + $(this).height() + 'px;" />';
    });
    $(this).css("opacity","0");
  });

});
function confirmBox()
{
 var where_to = confirm("Are you sure to continue with the submission?");
 if (where_to== true)
     return true;
 else{
     return false;
 }
}
</script>

<style>
/* button links */

.button-link {
    padding: 10px 8px;
    background: #4479BA;
    color: #FFF;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    border: solid 1px #20538D;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    -webkit-transition-duration: 0.2s;
    -moz-transition-duration: 0.2s;
    transition-duration: 0.2s;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
}
.button-link:hover {
    background: #356094;
    border: solid 1px #2A4E77;
    text-decoration: none;
}
.button-link:active {
    -webkit-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.6);
    -moz-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.6);
    box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.6);
    background: #2E5481;
    border: solid 1px #203E5F;
}

.button-link-red {
    padding: 10px 8px;
    background: #aa2222;
    color: #FFF;    
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    border: solid 1px #20538D;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    -webkit-transition-duration: 0.2s;
    -moz-transition-duration: 0.2s;
    transition-duration: 0.2s;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
}
.button-link-red:hover {
    background: #ff2222;
    border: solid 1px #2A4E77;
    text-decoration: none;
}
.button-link-red:active {
    -webkit-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.6);
    -moz-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.6);
    box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.6);
    background: #aa2222;
    border: solid 1px #203E5F;
}

/* tables */

.table1 thead th{
    padding:15px;
    color:#fff;
    width:700px;
    font-size:20px;
    
    text-shadow:1px 1px 1px #568F23;
    border:1px solid #93CE37;
    border-bottom:3px solid #9ED929;
    background-color:#9DD929;
    background:-webkit-gradient(
        linear,
        left bottom,
        left top,
        color-stop(0.02, rgb(123,192,67)),
        color-stop(0.51, rgb(139,198,66)),
        color-stop(0.87, rgb(158,217,41))
        );
    background: -moz-linear-gradient(
        center bottom,
        rgb(123,192,67) 2%,
        rgb(139,198,66) 51%,
        rgb(158,217,41) 87%
        );
    -webkit-border-top-left-radius:5px;
    -webkit-border-top-right-radius:5px;
    -moz-border-radius:5px 5px 0px 0px;
    border-top-left-radius:5px;
    border-top-right-radius:5px;
}

.table1 thead th:empty{
    background:transparent;
    border:none;
}

.table1 tfoot td{
    color: #9CD009;
    font-size:40px;
    text-align:center;
    padding:5px 0px;
    text-shadow:1px 1px 1px #444;
}
.table1 tfoot th{
    color:#111;
}
.table1 tbody td{
    padding:15px;
    font-size:30px;
    font-weight:900;
    text-align:center;
    background-color:#DEF3CA;
    border: 2px solid #E7EFE0;
    -moz-border-radius:2px;
    -webkit-border-radius:2px;
    border-radius:2px;
    color:#111;
    text-shadow:1px 1px 1px #fff;
}
/* end tables */
.daform{
background: -moz-linear-gradient(left top 315deg, #dd66aa, #aa88ff);
background: -webkit-gradient(linear, right top, left bottom, from(#dd99ff), to(#110000));
-moz-border-radius: 19px 13px 19px 13px;
-webkit-border-radius: 13px;
-webkit-border-top-left-radius: 19px;
-webkit-border-bottom-right-radius: 19px;
border: 2px solid #ffdd11;

}
.content{
margin-top:auto;
margin-left:auto;
margin-right:auto;
width:50%;
height:50%;
}
/* ==================== Form style sheet ==================== */

form { margin: 25px 0 0 10px; width: 450px; padding-bottom: 30px; 

}

fieldset { margin: 0 0 22px 0; border: 1px solid #A33200; padding: 12px 17px; background-color: #eebb66; 
-webkit-border-radius: 13px;
-webkit-border-top-left-radius: 19px;
-webkit-border-bottom-right-radius: 19px;

}
legend { font-size: 1.1em; background-color: #A33200; color: #FFFFFF; font-weight: bold; padding: 4px 8px; }

label.float { float: left; display: block; width: 100px; margin: 4px 0 0 0; clear: left; }
label { display: block; width: auto; margin: 0 0 10px 0; }
label.spam-protection { display: inline; width: auto; margin: 0; }

input.inp-text, textarea, input.choose, input.answer { border: 1px solid #909090; padding: 3px; }
input.inp-text { width: 300px; margin: 0 0 8px 0; }
textarea { width: 400px; height: 150px; margin: 0 0 12px 0; display: block; }

input.choose { margin: 0 2px 0 0; }
input.answer { width: 40px; margin: 0 0 0 10px; }
input.submit-button { font: 1.4em Georgia, "Times New Roman", Times, serif; letter-spacing: 1px; display: block; margin: 23px 0 0 0; }

form br { display: none; }
/* header */
#burning h1 {
        color: #fff;
        text-shadow: 0px -1px 4px white, 0px -2px 10px yellow, 0px -10px 20px #ff8000, 0px -18px 40px red;
        font: 80px 'BlackJackRegular';
}


/* ==================== Form style sheet END ==================== */

.submit_button{
background: -moz-linear-gradient(center top, #a4ccec, #72a6d4 25%, #3282c2 45%, #357cbd 85%, #72a6d4); /* mozilla gradient background */

background: -webkit-gradient(linear, center top, center bottom, from(#a4ccec), color-stop(25%, #72a6d4), color-stop(45%, #3282c2), color-stop(85%, #357cbd), to(#72a6d4)); /* Webkit gradient background */
-moz-border-radius: 15px 3px 15px 3px;
-webkit-border-radius: 3px;
-webkit-border-top-left-radius: 15px;
-webkit-border-bottom-right-radius: 15px;

color:#ffffff;
font: Arial;
font-size:16px;
padding:5px;
}
body{
background: -moz-linear-gradient(left top 315deg, #ddddaa, #111155);
background: -webkit-gradient(linear, left top, right bottom, from(#111122), to(#551122));
}
/*
img{
border: solid 1px #aaaa00;
	-moz-box-shadow: 1px 1px 10px #111;
	-webkit-box-shadow: 1px 1px 10px #111;
        box-shadow: 1px 1px 10px #111;
}
*/
.image-wrap {
	margin-right: 10px;
}
.box {
	margin: 0 0 50px;
	border-top: solid 1px #ccc;
}

/************************************************************************************
GLOSSY
*************************************************************************************/
.glossy {
	background: #222;
	padding: 20px 40px 50px;
	color: #fff;
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}
.glossy .image-wrap {
	-webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.5);
	-moz-box-shadow: inset 0 -1px 0 rgba(0,0,0,.5);
	box-shadow: inset 0 -1px 0 rgba(0,0,0,.5);
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}

.glossy .image-wrap:after {
	position: absolute;
	content: ' ';
	width: 100%;
	height: 50%;
	top: 0;
	left: 0;
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
	background: -moz-linear-gradient(top, rgba(255,255,255,0.7) 0%, rgba(255,255,255,.1) 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.7)), color-stop(100%,rgba(255,255,255,.1)));
	background: linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,.1) 100%);
}


/************************************************************************************
REFLECTION
*************************************************************************************/
.reflection .image-wrap {
	-webkit-box-shadow: inset 0 0 1px rgba(0,0,0,.5), inset 0 2px 0 rgba(255,255,255,.5), inset 0 -1px 0 rgba(0,0,0,.5);
	-moz-box-shadow: inset 0 0 1px rgba(0,0,0,.5), inset 0 2px 0 rgba(255,255,255,.5), inset 0 -1px 0 rgba(0,0,0,.5);
	box-shadow: inset 0 0 1px rgba(0,0,0,.5), inset 0 2px 0 rgba(255,255,255,.5), inset 0 -1px 0 rgba(0,0,0,.5);
	-webkit-transition: .5s;
	-moz-transition: .5s;
	transition: .5s;
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}
.reflection .image-wrap:after {
	position: absolute;
	content: ' ';
	width: 100%;
	height: 30px;
	bottom: -31px;
	left: 0;
	-webkit-border-top-left-radius: 20px;
	-webkit-border-top-right-radius: 20px;
	-moz-border-radius-topleft: 20px;
	-moz-border-radius-topright: 20px;
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
	background: -moz-linear-gradient(top, rgba(0,0,0,.3) 0%, rgba(255,255,255,0) 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,.3)), color-stop(100%,rgba(255,255,255,0)));
	background: linear-gradient(top, rgba(0,0,0,.3) 0%,rgba(255,255,255,0) 100%);
}
.reflection .image-wrap:hover {
	position: relative;
	top: -8px;
}

/************************************************************************************
GLOSSY + REFLECTION
*************************************************************************************/
.glossy-reflection {
	background: #000;
	padding: 10px 10px 50px;
	color: #fff;
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}

.glossy-reflection .image-wrap {
	-webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.5), inset 0 1px 0 rgba(255,255,255,.6);
	-moz-box-shadow: inset 0 -1px 0 rgba(0,0,0,.5), inset 0 1px 0 rgba(255,255,255,.6);
	box-shadow: inset 0 -1px 0 rgba(0,0,0,.5), inset 0 1px 0 rgba(255,255,255,.6);
	-webkit-transition: 1s;
	-moz-transition: 1s;
	transition: 1s;
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
}
.glossy-reflection .image-wrap:before {
	position: absolute;
	content: ' ';
	width: 100%;
	height: 50%;
	top: 0;
	left: 0;
	-webkit-border-radius: 20px;
	-moz-border-radius: 20px;
	border-radius: 20px;
	background: -moz-linear-gradient(top, rgba(255,255,255,0.7) 0%, rgba(255,255,255,.1) 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.7)), color-stop(100%,rgba(255,255,255,.1)));
	background: linear-gradient(top, rgba(255,255,255,0.7) 0%,rgba(255,255,255,.1) 100%);
}
.glossy-reflection .image-wrap:after {
	position: absolute;
	content: ' ';
	width: 100%;
	height: 30px;
	bottom: -31px;
	left: 0;
	-webkit-border-top-left-radius: 20px;
	-webkit-border-top-right-radius: 20px;
	-moz-border-radius-topleft: 20px;
	-moz-border-radius-topright: 20px;
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
	background: -moz-linear-gradient(top, rgba(230,230,230,.3) 0%, rgba(230,230,230,0) 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(230,230,230,.3)), color-stop(100%,rgba(230,230,230,0)));
	background: linear-gradient(top, rgba(230,230,230,.3) 0%,rgba(230,230,230,0) 100%);
}
#citylights h1 {
        color: #fff;
        text-shadow: 0px -1px 4px white, 0px -2px 10px yellow, 0px -10px 20px #ff8000, 0px -18px 40px red;
        font: 30px 'MisoRegular';
}
#burning {
width: 780px;
height: 100px;
margin-right: auto;
margin-left: auto;
border: 1px solid #aa8811;
background: black url(/pageant/images/fire.jpg) center -50;
margin-bottom: 5px;
-moz-border-radius: 19px 13px 19px 13px;
-webkit-border-radius: 13px;
-webkit-border-top-left-radius: 19px;
-webkit-border-bottom-right-radius: 19px;

}
#burning h1 { color: #fff; text-shadow: 0px -1px 4px white, 0px -2px 10px yellow, 0px -10px 20px #ff1000, 0px -18px 40px red; font: 50px 'Arial'; }

</style>
</head>
<body>
<div id='content' class='content'>
<div id='burning' align='center'>
<h1>Miss Canlaon 2013</h1>
</div>
