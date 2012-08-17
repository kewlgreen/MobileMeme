<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
        <title>
        	MemeGen
        </title>
        <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />        
        <!-- STYLES -->
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
        <link href="resources/style.css" rel="stylesheet" type="text/css"/>
        <!-- END STYLES -->        
        <!-- SCRIPTS -->        
        <script src="http://code.jquery.com/jquery-1.6.4.min.js">
        </script>
        <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js">
        </script>
        <script src="resources/javascript.js">
        </script>
        <!-- END SCRIPTS -->        
	</head>
<body>    
    <!-- PAGE: MEME SELECTION -->
    <div data-role="page" id="index" data-title="Select Your Meme">

		<div data-role="header"> 
            <h1>
                MemeGen
            </h1>
            <a href="#about" data-role="button">
                About
            </a>            
        </div>
        <div data-role="content" >	    
            <div class="nav" id="leftNav">
            </div>
            <div class="nav" id="rightNav">
            </div>
            <p>
                Welcome to MemeGen. Please select a meme below.
            </p>	
            <br/>        	
            <select id="meme">

            </select>
            <br/>
            <div id="targetDiv">                
            </div>
            <br/>            
            <a href="" data-role="button" id="up">
                Upload	
            </a>
            <a href="#caption" data-role="button" id="next">
                Next
            </a>  
        </div>
    </div>
    <!-- END PAGE: MEME SELECTION -->
    
    <!-- PAGE: ABOUT PAGE -->
    <div data-role="page" id="about" data-title="About Our Team">
        <div data-role="header">
            <h1>
                About
            </h1>
            <a href="#index" data-role="button">
                Back
            </a>
        </div>
        <div data-role="content">	
            <p>
                <span id="bold">
                    Members:
                </span>
                <br/>
                Luca DeCaprio
                <br/>
                Jon Clifford
                <br/>
                Tyler Urquhart
                <br/>
                David Shiplo
            </p>	
        </div>
    </div>
    <!-- END PAGE: ABOUT PAGE -->
    
    <!-- PAGE: YOUR CAPTION -->
    <div data-role="page" id="caption" data-title="Your Caption">
        <div data-role="header">
            <h1>
                Caption Selection
            </h1>
            <a href="" data-role="button" data-icon="back" id="back">
                Back
            </a>
        </div>
        <div data-role="content">
            <p> 
                Please type your captions 
            </p>
            <h1 id="selectedMeme">
            </h1>
            <div id="group">
                <div id="targetDiv2">        
                </div>
                	<div id="userCaps">
                        <label for="top">
                            Top Caption:
                         </label>
                        <input type="text" id="top" maxlength="35" />
                        <label for="bottom">
                            Bottom Caption:
                         </label>
                        <input type="text" id="bottom" maxlength="35"/>
                        <a href="#generate" data-role="button" id="gen">
                            Generate!
                        </a>				
                    </div>
            </div>
        </div>
    </div>
    <!-- END PAGE: YOUR CAPTION -->
    
    <!-- PAGE: MEME SELECTION -->
    <div data-role="page" id="generate" data-title="Your Final Meme!">
        <div data-role="header">
            <h1>
                Generate
            </h1>
            <a href="#index" data-role="button">
                Home
            </a>
        </div>
        <div data-role="content">
            <p>
                Thank you for using memegen!
            </p>
            <h1 id="targetDiv3">            
            </h1>
            <div id="newMeme">		
            </div>				
        </div>
    </div>
</body>
</html>