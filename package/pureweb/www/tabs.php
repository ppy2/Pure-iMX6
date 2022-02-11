<head>
<meta charset="utf-8">
<title>Pure</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link type="text/css" rel="stylesheet" href="style.css">
<script src="javascript.js"></script>
<?php include ($_SERVER['DOCUMENT_ROOT']."/var/www/common_plugins.php");?>
<?php include ($_SERVER['DOCUMENT_ROOT']."/var/www/user/user_plugins.php");?>
</head>

<?php
$update = 0;
?>
<body bgcolor="#565656" onload='pageLoad()'>
<div id='clickDisabler'>
</div>
<div id='fullContainer'>
	<div id='middleContainer'>
		<div id='preloadBack' >
			<div id='preload' >
			</div>
		</div>
		<table id='mainContent' cellspacing="0" cellpadding="0">
			<tr id='optionsTop' >
				<td id='audioTab' onClick='selAudioTab()' >
					<span>Audio</span>
				</td>
				<td>
					<span id='settingsLink'>
						<?php
						 $server = $_SERVER['HTTP_HOST']; 
						 echo "&emsp;<a href=http://" ;   
						 echo $server ;                   
						 echo ":7779>Settings</a>";
						?>
					</span>
				</td>
				<td>
				</td>
				<td  id='systemTab' onClick='selSystemTab()'>
					<span>System</span>
				</td>
			</tr>
			<tr>
				<td colspan=4 id='contentCell' >
					<div id='protocolSel'>
						<form action="" method="post">
							<div id='iconContainer'>
								<div class='row'>
									<div class='cell'>
										<?php
										 $a = `pidof networkaudiod`;
										 if (empty($a)){
										 echo '<input type="submit" name="naaButton" value="" id="naaButton" class="unselButton"/><input type="submit" id="naaText" name="naaButton" value="NAA (HQPlayer)" class="unselButtonText"/>';
										 } else {
										 echo '<input type="submit" name="naaButton" value="" id="naaButton" class="selButton"/><input type="submit"  id="naaText" name="naaButton" value="NAA (HQPlayer)" class="selButtonText"/>';
										 }
										?>
									</div>
									<div class='cell'>
										<?php
										 $a = `pidof raat_app`;
										 if (empty($a)){
										 echo '<input type="submit" name="raatButton" value="" id="raatButton" class="unselButton"/><input type="submit" id="raatText" name="raatButton" value="RAAT (Roon)" class="unselButtonText"/>';
										 } else {
										 echo '<input type="submit" name="raatButton" value="" id="raatButton" class="selButton"/><input type="submit"  id="raatText" name="raatButton" value="RAAT (Roon)" class="selButtonText"/>';
										 }
										?>
									</div>
									<div class='cell'>
										<?php
										$a = `pidof mpd`;
										if (empty($a)){
										 echo '<input type="submit" name="mpdButton" value="" id="mpdButton" class="unselButton"/><input type="submit" id="mpdText" name="mpdButton" value="UPNP (MPD)" class="unselButtonText"/>';
										} else {
										 echo '<input type="submit" name="mpdButton" value="" id="mpdButton" class="selButton"/><input type="submit" id="mpdText" name="mpdButton" value="UPNP (MPD)" class="selButtonText"/>';
										}
										?>
									</div>
								</div>										

								<div class='row'>
									<div class='cell'>
										<?php
										 $a = `pidof ap2renderer`;
										 if (empty($a)){
										 echo '<input type="submit" name="aplayerButton" value="" id="aplayerButton" class="unselButton"/><input type="submit" id="aplayerText" name="aplayerButton" value="UPNP (APlayer)" class="unselButtonText"/>';
										 } else {
										 echo '<input type="submit" name="aplayerButton" value="" id="aplayerButton" class="selButton"/><input type="submit" id="aplayerText" name="aplayerButton" value="UPNP (APlayer)" class="selButtonText"/>';
										 echo '<script type="text/javascript">document.getElementById("settingsLink").style.display="block";</script>';
										 }
										?>
									</div>
									<div class='cell'>
										<?php
										 $a = `pidof shairport-sync`;
										 if (empty($a)){
										 echo '<input type="submit" name="airPlayButton" value="" id="airPlayButton" class="unselButton"/><input type="submit" id="airPlayText" name="airPlayButton" value="AirPlay (ShairportSync)" class="unselButtonText"/>';
										 } else {
										 echo '<input type="submit" name="airPlayButton" value="" id="airPlayButton" class="selButton"/><input type="submit" id="airPlayText" name="airPlayButton" value="AirPlay (ShairportSync)" class="selButtonText"/>';
										 }
										?>
									</div>
									<div class='cell'>
										<?php
										 $a = `pidof squeezelite`;
										 if (empty($a)){
										 echo '<input type="submit" name="lmsButton" value="" id="lmsButton" class="unselButton"/><input type="submit" id="lmsText" name="lmsButton" value="LMS (Squeezelite)" class="unselButtonText"/>';
										 } else {
										 echo '<input type="submit" name="lmsButton" value="" id="lmsButton" class="selButton"/><input type="submit" id="lmsText" name="lmsButton" value="LMS (Squeezelite)" class="selButtonText"/>';
										 }
										?>
									</div>
								</div>

								<div class='row'>
									<div class='cell'>
										<?php
										 $a = `pidof scream`;
										 if (empty($a)){
										 echo '<input type="submit" name="screamButton" value="" id="screamButton" class="unselButton"/><input type="submit" id="screamText" name="screamButton" value="Scream audio" class="unselButtonText"/>';
										 } else {
										 echo '<input type="submit" name="screamButton" value="" id="screamButton" class="selButton"/><input type="submit" id="screamText" name="screamButton" value="Scream audio" class="selButtonText"/>';
										 }
										?>    
									</div>
									<div class='cell'>
										<?php
										 $a = `pidof spotifyd`;
										 if (empty($a)){
										 echo '<input type="submit" name="spotifyButton" value="" id="spotifyButton" class="unselButton"/><input type="submit" id="spotifyText" name="spotifyButton" value="Spotify Connect" class="unselButtonText"/>';
										 } else {
										 echo '<input type="submit" name="spotifyButton" value="" id="spotifyButton" class="selButton"/><input type="submit" id="spotifyText" name="spotifyButton" value="Spotify Connect" class="selButtonText"/>';
										 }
										?>    
									</div>
									<div class='cell'>
										<?php
										 $tf = '/etc/init.d/S90tidal';
										 if (file_exists($tf)) {
										 echo '<input type="submit" name="tidalButton" value="" id="tidalButton" class="selButton"/><input type="submit" id="tidalText" name="tidalButton" value="Tidal Connect" class="selButtonText"/>';
										 } else {
										 echo '<input type="submit" name="tidalButton" value="" id="tidalButton" class="unselButton"/><input type="submit" id="tidalText" name="tidalButton" value="Tidal Connect" class="unselButtonText"/>';
										 }
										?>    
									</div>
								</div>
							</div>
						</form>
							
					</div>
					<div id='systemSel'>
						<div class='row'>

						</div>

						<div class='row'>
						    <div id='wifi'>
							<span class="title">Hostname:</span>
							<?php
							$HOST = `cat /etc/hostname` ;
							echo '<form method="post">' ;
							echo 'http://<input type="text" size="5" id="fname" name="hostN" value="'.$HOST.'">.local<br><br>' ;
							echo '<div class="buttonSpacer"><input type="submit" name="hostname" id="hostname" value="Apply settings and reboot" /></div>' ;
							echo '</form>' ;
							?>
							<br>
						    </div>
						</div>

						
						
						
						<div class='row'>
								<br><br><br><br><br><br><br><br><br><br><br>
								<span class="title">ver.</span>
								<div id='upd'>
									<form method="post">
										<?php
										echo "<div><input type='submit' class='selOutputText' id='update' name='updateFirmW' value='Upgrade to latest version' /></div>";
										?>
									</form>
								</div>
						</div>
					</div>
					<div id='sign'>
						<div></div><span>Pure</span>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php
	if(isset($_POST['naaButton'])){
		{`echo 1 > /sys/class/gpio/gpio113/value ;
		killall -9 mpd upmpdcli startroon.sh raat_app shairport-sync squeezelite spotifyd librespot scream ;
                /etc/init.d/S90aprenderer stop ;
                rm /etc/init.d/S90* ;
                /etc/rc.pure/S90tidal stop ;
                cp /etc/rc.pure/S90naa /etc/init.d/ && sync ; 
                /etc/rc.pure/S90naa start` ; }
    		echo '<script type="text/javascript">removeSelButtons();</script>';
		echo '<script type="text/javascript">document.getElementById("naaButton").classList.remove("unselButton"); document.getElementById("naaButton").classList.add("selButton");</script>';
		echo '<script type="text/javascript">document.getElementById("naaText").classList.remove("unselButtonText"); document.getElementById("naaText").classList.add("selButtonText");</script>';
		echo '<script type="text/javascript">console.log("button1");</script>';
	} else if(isset($_POST['raatButton'])){ 
		{`echo 1 > /sys/class/gpio/gpio113/value ;
		killall -9 networkaudiod mpd upmpdcli shairport-sync squeezelite spotifyd librespot scream ;
		/etc/init.d/S90aprenderer stop ;
		rm /etc/init.d/S90* ;
		/etc/rc.pure/S90tidal stop ;
		cp /etc/rc.pure/S90roonready /etc/init.d/ && sync ; 
		/etc/rc.pure/S90roonready start` ; }
		echo '<script type="text/javascript">removeSelButtons();</script>';
		echo '<script type="text/javascript">document.getElementById("raatButton").classList.remove("unselButton"); document.getElementById("raatButton").classList.add("selButton");</script>';
		echo '<script type="text/javascript">document.getElementById("raatText").classList.remove("unselButtonText"); document.getElementById("raatText").classList.add("selButtonText");</script>';
	} else if(isset($_POST['mpdButton'])){ 
                {`echo 1 > /sys/class/gpio/gpio113/value ;
		killall -9 networkaudiod startroon.sh raat_app shairport-sync squeezelite spotifyd librespot scream ; 
    		/etc/init.d/S90aprenderer stop ;
		rm /etc/init.d/S90* ;
		/etc/rc.pure/S90tidal stop ;
                cp /etc/rc.pure/S90mpd /etc/init.d/ ; cp /etc/rc.pure/S90upmpdcli /etc/init.d/ && sync ;
                /etc/rc.pure/S90mpd start ; /etc/rc.pure/S90upmpdcli start` ;  }
		echo '<script type="text/javascript">removeSelButtons();</script>';
		echo '<script type="text/javascript">document.getElementById("mpdButton").classList.remove("unselButton"); document.getElementById("mpdButton").classList.add("selButton");</script>';
		echo '<script type="text/javascript">document.getElementById("mpdText").classList.remove("unselButtonText"); document.getElementById("mpdText").classList.add("selButtonText");</script>';
	} else if(isset($_POST['aplayerButton'])){ 
                {`echo 1 > /sys/class/gpio/gpio113/value ;
		killall -9 mpd upmpdcli startroon.sh raat_app networkaudiod shairport-sync squeezelite spotifyd librespot scream ; 
		rm /etc/init.d/S90* ;
		/etc/rc.pure/S90tidal stop ;
                cp /etc/rc.pure/S90aprenderer /etc/init.d/ && sync ; 
                /etc/init.d/S90aprenderer start` ; }
		echo '<script type="text/javascript">removeSelButtons();</script>';
		echo '<script type="text/javascript">document.getElementById("aplayerButton").classList.remove("unselButton"); document.getElementById("aplayerButton").classList.add("selButton");</script>';
		echo '<script type="text/javascript">document.getElementById("aplayerText").classList.remove("unselButtonText"); document.getElementById("aplayerText").classList.add("selButtonText");</script>';
		echo '<script type="text/javascript">document.getElementById("settingsLink").style.display="block";</script>';
	} else if(isset($_POST['airPlayButton'])){ 
		{`echo 1 > /sys/class/gpio/gpio113/value ;
		killall -9 mpd upmpdcli startroon.sh raat_app networkaudiod squeezelite spotifyd librespot scream ; 
		/etc/init.d/S90aprenderer stop ;
		rm /etc/init.d/S90* ;
		/etc/rc.pure/S90tidal stop ;
		cp /etc/rc.pure/S90shairport-sync /etc/init.d/ && sync ; 
		/etc/init.d/S90shairport-sync start` ; }
		echo '<script type="text/javascript">removeSelButtons();</script>';
		echo '<script type="text/javascript">document.getElementById("airPlayButton").classList.remove("unselButton"); document.getElementById("airPlayButton").classList.add("selButton");</script>';
		echo '<script type="text/javascript">document.getElementById("airPlayText").classList.remove("unselButtonText"); document.getElementById("airPlayText").classList.add("selButtonText");</script>';
	} else if(isset($_POST['lmsButton'])){ 
		{`echo 1 > /sys/class/gpio/gpio113/value ;
		killall -9 mpd upmpdcli startroon.sh raat_app networkaudiod shairport-sync spotifyd librespot scream ; 
		/etc/init.d/S90aprenderer stop ;
		rm /etc/init.d/S90* ;
		/etc/rc.pure/S90tidal stop ;
		cp /etc/rc.pure/S90squeezelite /etc/init.d/ && sync ; 
		/etc/init.d/S90squeezelite start` ; }
		echo '<script type="text/javascript">removeSelButtons();</script>';
		echo '<script type="text/javascript">document.getElementById("lmsButton").classList.remove("unselButton"); document.getElementById("lmsButton").classList.add("selButton");</script>';
		echo '<script type="text/javascript">document.getElementById("lmsText").classList.remove("unselButtonText"); document.getElementById("lmsText").classList.add("selButtonText");</script>';
	} else if(isset($_POST['spotifyButton'])){ 
		{`echo 1 > /sys/class/gpio/gpio113/value ;
		killall -9 mpd upmpdcli startroon.sh raat_app networkaudiod shairport-sync squeezelite scream ; 
		/etc/init.d/S90aprenderer stop ;
		rm /etc/init.d/S90* ;
		/etc/rc.pure/S90tidal stop ;
		cp /etc/rc.pure/S90spotify /etc/init.d/ && sync ; 
		/etc/rc.pure/S90spotify start` ;  }
		echo '<script type="text/javascript">removeSelButtons();</script>';
		echo '<script type="text/javascript">document.getElementById("spotifyButton").classList.remove("unselButton"); document.getElementById("spotifyButton").classList.add("selButton");</script>';
		echo '<script type="text/javascript">document.getElementById("spotifyText").classList.remove("unselButtonText"); document.getElementById("spotifyText").classList.add("selButtonText");</script>';
	} else if(isset($_POST['screamButton'])){ 
		{`echo 1 > /sys/class/gpio/gpio113/value ;
		killall -9 mpd upmpdcli startroon.sh raat_app networkaudiod shairport-sync squeezelite spotifyd librespot ; 
		/etc/init.d/S90aprenderer stop ;
		rm /etc/init.d/S90* ;
		/etc/rc.pure/S90tidal stop ;
		cp /etc/rc.pure/S90scream /etc/init.d/ && sync ; 
		nohup /sbin/scream > /dev/null 2>&1 &` ; }
		echo '<script type="text/javascript">removeSelButtons();</script>';
		echo '<script type="text/javascript">document.getElementById("screamButton").classList.remove("unselButton"); document.getElementById("screamButton").classList.add("selButton");</script>';
		echo '<script type="text/javascript">document.getElementById("screamText").classList.remove("unselButtonText"); document.getElementById("screamText").classList.add("selButtonText");</script>';
	} else if(isset($_POST['tidalButton'])){ 
		{`echo 1 > /sys/class/gpio/gpio113/value ;
		killall -9 mpd upmpdcli startroon.sh raat_app networkaudiod shairport-sync squeezelite spotifyd librespot scream; 
		/etc/init.d/S90aprenderer stop ;
		rm /etc/init.d/S90* ;
		cp /etc/rc.pure/S90tidal /etc/init.d/ && sync ; 
		/etc/rc.pure/S90tidal start` ; }
		echo '<script type="text/javascript">removeSelButtons();</script>';
		echo '<script type="text/javascript">document.getElementById("tidalButton").classList.remove("unselButton"); document.getElementById("tidalButton").classList.add("selButton");</script>';
		echo '<script type="text/javascript">document.getElementById("tidalText").classList.remove("unselButtonText"); document.getElementById("tidalText").classList.add("selButtonText");</script>';
        } else if(isset($_POST['i2sOutput']) && $_POST["i2sOutput"] != "" ){
                exec ('/opt/to_i2s.sh' . '>/dev/null &');
                echo '<script type="text/javascript">updatePage();</script>';
                echo '<script type="text/javascript">setTimeout(function() {window.location = window.location.href; }, 1000);</script>';
        } else if(isset($_POST['i2slrOutput']) && $_POST["i2slrOutput"] != "" ){
                exec ('/opt/to_i2slr.sh' . '>/dev/null &');
                echo '<script type="text/javascript">updatePage();</script>';
                echo '<script type="text/javascript">setTimeout(function() {window.location = window.location.href; }, 1000);</script>';
        } else if(isset($_POST['+-i2slrOutput']) && $_POST["+-i2slrOutput"] != "" ){
                exec ('/opt/to_+-i2slr.sh' . '>/dev/null &');
                echo '<script type="text/javascript">updatePage();</script>';
                echo '<script type="text/javascript">setTimeout(function() {window.location = window.location.href; }, 1000);</script>';
        } else if(isset($_POST['spdifOutput']) && $_POST["spdifOutput"] != "" ){
                exec ('/opt/to_spdif.sh' . '>/dev/null &');
                echo '<script type="text/javascript">updatePage();</script>';
                echo '<script type="text/javascript">setTimeout(function() {window.location = window.location.href; }, 15000);</script>';
        } else if(isset($_POST['usbOutput']) && $_POST["usbOutput"] != "" ){
                exec ('/opt/to_usb.sh' . '>/dev/null &');
                echo '<script type="text/javascript">updatePage();</script>';
                echo '<script type="text/javascript">setTimeout(function() {window.location = window.location.href; }, 1000);</script>';
	} else if(isset($_POST['updateFirmW']) && $_POST["updateFirmW"] != "" ){
		echo '<script type="text/javascript">updatePage();</script>';
		echo '<script type="text/javascript">setTimeout(function() {window.location = window.location.href; }, 30000);</script>';
		exec ('/opt/update' . '>/dev/null &');
	} else if(isset($_POST['hostname']) && $_POST["hostname"] != "" ){					
		echo '<script type="text/javascript">updatePage();</script>';
		echo '<script type="text/javascript">setTimeout(function() {window.location = window.location.href; }, 10000);</script>';
		$name = $_POST["hostN"] ;
		exec ('echo '.$name.' > /etc/hostname' ) ;
		exec ('reboot' ) ;
		}
	
?>
</body>   
<br>
                                                                                                                                            