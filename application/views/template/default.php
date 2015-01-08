<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ELAfeedback<?php if( isset( $title ) ) print ' - ' . $title ?></title>
<LINK href="/static/css/default.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="header_wrapper">
   <div class="header_image">
	<img src="/static/images/ELA_test_for_web_t670.jpg" height="150" width="250" alt="test" />
  </div>
  <div class="header_text"><br>Responses to the ELA Exam</div>
  <div class="nav">&nbsp;
    <ul id="navcontainer">
	  <li style="margin-left: 22px; "><a href="/" style=""><img src="/static/images/house-icon.png" width="32" height="32"></a></li>
	  <!--<li><a href="/comment/submit">Submit</a> or <a href="/comments/view/-/-">view</a> comments</li>-->
	  <li><a href="/comments/view/-/-">NY Response</a></li>
	  <li><a href="/comments/view/National/-">National Response</a></li>
          <li><a href="/misc/links" style="">Links</a></li>
	 <li><a href="/misc/lcletter">Letters from Lucy</a></li>
</ul>
  </div>
</div>

<div style="padding:10px 5px 5px 10px; font-family:Georgia; /*background-color: #FFF8E8;*/">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-40596554-1', 'elafeedback.com');
            ga('send', 'pageview');

</script>

<?php echo $content ?>
</div>
</body>
</html>
