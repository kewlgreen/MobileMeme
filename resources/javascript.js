var memeFileName;
var meme;
var width = 0;
var height = 0;
var XMLHttpRequestObject = false; 
if (window.XMLHttpRequest) {
	XMLHttpRequestObject = new XMLHttpRequest();
} else if (window.ActiveXObject) {
	XMLHttpRequestObject = new ActiveXObject("Microsoft.XMLHTTP");
}
/*
<option value="placeholder">
                    ---- Memes ----
                </option>
                <option value="Most_Interesting_Man">
                    Most Interesting Man
                </option>
                <option value="Disaster_Girl">
                    Disaster Girl
                </option>
                <option value="Annoying_Facebook_Girl">
                    Annoying Facebook Girl
                </option>
                <option value="First_World_Problems">
                    First World Problems
                </option>
                <option value="High_Expectations_Asian_Father">
                    High Expectation Asian Father
                </option>
                <option value="Karate_Kyle">
                    Karate Kyle
                </option>
                <option value="One_Does_Not_Simply">
                    One Does Not Simply
                </option>
                <option value="Overly_Attached_Girlfriend">
                    Overly Attached Girlfriend
                </option>
                <option value="Philosoraptor">
                    Philosoraptor
                </option>
                <option value="Scumbag_Steve">
                    Sc**bag Steve
                </option>
                <option value="Skeptical_Third_World_Kid">
                    Skeptical Third World Kid
                </option>
                <option value="Success_Kid">
                    Success Kid
                </option>
                <option value="Vengeance_Dad">
                    Vengeance Dad
                </option>
                <option value="X_All_The_Y">
                    X All The Y
                </option>
                <option value="Y_U_No">
                    Y U NO
                </option>
                <option value="custom">
                    Custom
                </option>
				*/
$(document).ready(function() {	
	$('#back').bind('click', function () {
		history.back();
	});
	$('#up').hide(0, null, null);
	$('#next').hide(0, null, null);
	
	$(window).bind('orientationchange', orientationHandler);
	$(document).delegate("#next", "click", function(){
		getMeme();
		$('#userCaps').width($('#memePreview').width());	
	});
	$(document).delegate("#gen", "click", function(){
		generate();
	});
	$(document).delegate("#meme", "change", function(){
		getData();
	});
	$(document).delegate("#meme", "pageinit", function(){
		getData();
	});
	$(document).delegate("#up", "click", function(){
		alert("We're sorry! This feature has yet to be implemented!");
	});	
    loadMemeList();		
	orientationHandler();
});



function loadMemeList() {
	$.ajax({
		type: "GET",
		url: "getMemeList.php",
		data: { dir: "/home/urquhaty/public_html/MobileWebFinal/memes/" }
	}).done(function(response) {
		$('#meme').html(response);
	});
}

function orientationHandler(event) {
	width 	 = $(document).width();
	height 	= $(document).height();
	getData();
}

function getData(event) {
	if($('#meme').val() == "Custom") {
		$('#next').hide('fast');
		$('#up').show('fast');
	} else {
		$('#next').show('fast');
		$('#up').hide('fast');
	}
	var choice = $('#meme').val();

	$.ajax({
		type: "GET",
		url: "preview.php",
		data: { choice: choice, devHeight: height }
	}).done(function(response) {
		$('#targetDiv').html(response);
		$('#targetDiv2').html(response);
	});
}

function generate() {	
	var choice = memeFileName;
    var top = document.getElementById('top').value;
	var bottom = document.getElementById('bottom').value;	
	if(XMLHttpRequestObject) {
		var newMeme = document.getElementById("newMeme");
	  var targetURL = "generate.php?choice="+choice+"&top="+top+"&bottom="+bottom+"&devHeight="+height;
	  XMLHttpRequestObject.open("GET",targetURL,true); 
	  XMLHttpRequestObject.send(null); 
	  XMLHttpRequestObject.onreadystatechange = function() {
		  if (XMLHttpRequestObject.readyState == 4 && XMLHttpRequestObject.status == 200) {
			  document.getElementById("newMeme").style.display="block";
			  newMeme.innerHTML = XMLHttpRequestObject.responseText;
	  	  } 
	  } 
	}
}

function getMeme() {
	memeFileName = document.getElementById('meme').value;
	meme = document.getElementById('meme').options[document.getElementById('meme').selectedIndex].text;
	document.getElementById('selectedMeme').innerHTML = meme;
	document.getElementById('targetDiv3').innerHTML = meme;
}