<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Youtube Downloader</title>
    <meta name="keywords" content="Video downloader, download youtube, video download, youtube video, youtube downloader, download youtube FLV, download youtube MP4, download youtube 3GP, php video downloader" />
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	 <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-download {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-download .form-download-heading,
      .form-download .checkbox {
        margin-bottom: 10px;
      }
      .form-download input[type="text"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <script>
    var filename = "False";
        var loadDir = function (){
                var div = $("#dir");
                    $.ajax({
                        url : 'dir.php',
                        success: function(response){div.html(response);}
                    });
        }
        var loadLog = function (){
                var div = $("#result");
                if(filename != "False"){
                    $.ajax({
                        url : 'get_log.php',
                        type :"post",
                        data : "filename="+filename,
                        success: function(response){if(response!="False"){div.html(response);}else{
                    div.html("Failed");}}
                    });
                }else{
                    div.html("Failed");
                }
        }
    </script>    
	</head>
<body>	
    <form id="get_video">
		<h1 class="form-download-heading">Youtube Downloader</h1>
		<input type="text" id="videoid" />
		<label class="checkbox">
			<input type="checkbox" name="debug" id="debug"> Show Debug Info
		</label>
		<input class="btn btn-primary" type="submit" value="Download" />
		<p>Put in just the ID bit, the part after v=.</p>
        <p>Example: http://www.youtube.com/watch?v=<b>Fw-BM-Mqgeg</b></p>
        </form>
        <div id="dir"></div>
        <pre id="result"></pre>
<script>
    var form = $("#get_video");
    $(document).ready(function(){
        form.submit(function(){
            $.ajax({
                url : "dir.php",
                success : function (response){filename = response;}
            });
            return false;
        });
        loadDir();
        setInterval(loadLog, 5000);
        setInterval(loadDir, 5000);
    });
</script>
</body>
</html>	
