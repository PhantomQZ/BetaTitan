<?php
	header("Content-type: text/css; charset: UTF-8");
	$devid = $_GET['dev'];
	$a = mysqli_fetch_assoc(mysqli_query($conn,"select * from developer_group where Dev_ID = '$devid' "));
	$background1= $a["headerIMG"];
?>
body{
	background-color:#424242;
	background-position: top;
	
}

#contentlock{
margin:0 auto;margin-top:80px;
width:1050px;
}

#topdiv{

}

#topdivHeader{
background-color:#151515;
padding:10px;
padding-bottom:6px;
height:55px;
}
#settitle{
	width: 865px;
	margin-left: 171px;
	margin-bottom: 0px;
	margin-top: -66px;
}

#Hicon{
	width: 64px;
	height: 64px;
	margin-left: 1px;
	margin-top: -8px;
}

#locktitle{
	width: 620px;
	margin-top: -74px;
	margin-left: -101px;
}

#titlecss{}
#titlecss b{
	color: white;
	font-size: 36px;
	float: left;
	margin-top: 15px;
	margin-left: 5px;
}

#lockpurchase{}
#lockpurchase a{
	float: right;
	margin-top: 11px;
}

#purc {}	
#purc a{
	float: right;
	text-decoration: none;
	color: white;
	font-size: 30px;
	padding-top: 16px;
	margin-top: -10px;
}

#gameprice{
	color: rgba(255,0,4,1.00);
	float: right;
	margin-top: 23px;
	margin-right: -129px;
	font-size: 23px;
}

#titleExB{
	background-image: url(battlefield_3_tanklar.jpg);
	width:1035px;
	height:40px;
}

#topDivBackg{
	
	width: 1050px;
	height: 410px;
	margin-left: -10px;
	margin-top: 12px;
	background-repeat: no-repeat;
	background-size: 100% 720px;
}

#topdivDescrip{
	height: 393px;
	width: 350px;
	background-color: rgba(0,0,0,0.6);
	float: right;
	margin-top: 8px;
	margin-right: -314px;
	color: rgba(190,190,190,0.8);
}

.rating {
    float:left;
    width:160px;
}
.rating span { float:right; position:relative; }
.rating span input {
    position:absolute;
    top:0px;
    left:0px;
    opacity:0;
}
.rating span label {
    display:inline-block;
    width:30px;
    height:30px;
    text-align:center;
    color:#FFF;
    background:#ccc;
    font-size:30px;
    margin-right:2px;
    line-height:30px;
    border-radius:50%;
    -webkit-border-radius:50%;
}
.rating span:hover ~ span label,
.rating span:hover label,
.rating span.checked label,
.rating span.checked ~ span label {
    background:#F90;
    color:#FFF;
}

#SummaryDivision{
	width: 1050px;
	height: 400px;
	margin-top: -35px;
	margin-left: -11px;
}

#SumNavBar{
	width:1050px;
	height:29px;
	background-color:black;
}

.tablist { list-style:none;  height:2em; padding:0;  margin:0;  border: none; }
.tablist li { float:left;  margin-right:0.13em;  }
.tablist li a { display:block; padding:0 1em; text-decoration:none; border:0.06em solid #000; border-bottom:0; 
			font:bold 0.88em/2em arial,geneva,helvetica,sans-serif; color:#000; background-color:#ccc;  
			/* CSS 3 elements */ webkit-border-top-right-radius:0.50em; -webkit-border-top-left-radius:0.50em; -moz-border-radius-topright:0.50em; 
			-moz-border-radius-topleft:0.50em; border-top-right-radius:0.50em; border-top-left-radius:0.50em; }
.tablist li a:hover { background:#3cf;  color:#fff; text-decoration:none; }
.tablist li#current a { background-color: #777; color: #fff; }
.tablist li#current a:hover { background: #39C; }

#SummaryDescrip
{
		padding:10px;
		background-color: rgba(225,225,225,1);
}

#imgDiv{
	height:200px;
}

.wrapper { 
		background:#EFEFEF; 
		box-shadow: 1px 1px 10px #999; 
		margin: auto; 
		text-align: center; 
		position: relative;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		margin-bottom: 20px !important;
		width: 1050px;
		padding-top: 5px;
	}
.scrolls {
    overflow-x: scroll;
    overflow-y: hidden;
    height: 180px;
    white-space:nowrap
	}
.imageDiv img {
    box-shadow: 1px 1px 10px #999;
    margin: 2px;
    max-height: 150px;
    cursor: pointer;
    display:inline-block;
    *display:inline;/* For IE7*/
    *zoom:1;/* For IE7*/
    vertical-align:top;
	}
.imageDiv img { 
		box-shadow: 1px 1px 10px #999; 
		margin: 2px;
		max-height: 150px;
		cursor: pointer;
	}
	
#CommentSec{
		width:1010px;
		height:auto;
		background-color:rgba(225,225,225,0.9);
		padding:20px;
}
