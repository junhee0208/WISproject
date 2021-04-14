<?php
	echo "<link rel='stylesheet' type='text/css' href='css/style.css'/>";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <style>

        #footer{
            height: 300px;
            margin-left:10%;
            background-image: url("properties/ftBanner.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            
        }
        .imgStyle {
            width: 30px;
            height: 30px;
        }

        h3{
            font-family:Verdana;
        }
    </style>
</head>
<body style="width:100%">
    <div id="footer">
        <table style="width:100%">
            <tr>
                <td style="overflow:hidden">
                    <!--<img src="properties/footerBanner.jpg" style="opacity: 0.5; width:100%; height:300px;">-->
                </td>
            </tr>
            <tr>
                <td style="width:20%">
                    <h3>Social Links: </h3>
                    <table id="socialLinks">
                    <tr>
                        <td><a href=""><img class="imgStyle" src="properties/instagram.png" style="margin-left:0"></a></td>
                        <td><a href=""><img class="imgStyle" src="properties/facebook.png" ></a></td>
                        <td><a href=""><img class="imgStyle" src="properties/youtube.png"  ></a></td>
                        <td><a href=""><img class="imgStyle" src="properties/tweeter.png"  ></a></td>
                    </tr>
                    </table>
                </td>
            </tr>
        </table>
        
    </div>
</body>
</html>