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

$(document).ready(function() {	
	$('.back').bind('click', function () {
		history.back();
	});
	$('#top').bind('keyup', function() {
		generate();
	});
	$('#bottom').bind('keyup', function() {
		generate();
	});
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
	$(document).delegate("#caption", "pageinit", function(){
		$('#top').width($('#memePreview').width());
		$('#bottom').width($('#memePreview').width());
	});
	$(document).delegate("#up", "click", function(){
		alert("We're sorry! This feature has yet to be implemented!");
	});	
    loadMemeList();		
	orientationHandler();
	$('#next').css("display", "none");
	$('#up').css("display", "none");
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

function orientationHandler() {
	width 	 = $(document).width();
	height 	= $(document).height();
	getData();
}

function getData() {
	if($('#meme').val() == "Silhouette" || $('#meme').val() == "placeholder") {
		$('#next').hide('fast');
		//$('#up').show('fast');
	} else {
		$('#next').show('fast');
		//$('#up').hide('fast');
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
	var top = $('#top').val();	
	var bottom = $('#bottom').val();		
	$.ajax({
		type: "GET",
		url: "generate.php",
		data: { choice: choice, top: top, bottom: bottom, devHeight: height }
	}).done(function(response) {	
		$('#targetDiv2').html(response);
		$('#newMeme').html(response);		
	});
}

function getMeme() {
	//memeFileName = document.getElementById('meme').value;
	memeFileName = $('#meme').val();
	meme = document.getElementById('meme').options[document.getElementById('meme').selectedIndex].text;	
	$('#selectedMeme').html(meme);
	$('#targetDiv3').html(meme);
}