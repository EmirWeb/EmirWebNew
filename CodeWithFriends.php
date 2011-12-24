<html>
<head>
<title>Code with friends</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />

<!-- Jquery -->
<script src="javascript/jquery.js"></script>
<script src="javascript/jquery-ui-1.8.16.custom.min.js"></script>
<script src="javascript/jstorage.js"></script>

<!-- Facebook -->
<script src="http://connect.facebook.net/en_US/all.js"></script>

<!-- Example question -->
<script src="javascript/stubQuestion.js"></script>

<script type="text/javascript">
			var answerFrame;
			var userFrame;
			
			function createIframe (element, iframeName) {
				var iframe;
				if (document.createElement && (iframe = document.createElement('iframe'))) {
					iframe.name = iframe.id = iframeName;
					iframe.width = "100%";
					iframe.height = "100%";
					iframe.src = 'about:blank';
					document.getElementById(element).appendChild(iframe);
				}
				return iframe;
			}

			function renderFrame (element, body) {
				var iframe = createIframe(element, 'iframe0');
				var iframDoc;
				if (iframe) {
					if (iframe.contentDocument) {
						iframeDoc = iframe.contentDocument;
					} else if (iframe.contentWindow) {
						iframeDoc = iframe.contentWindow.document;
					} else if (window.frames[iframe.name]) {
						iframeDoc = window.frames[iframe.name].document;
					}
					if (iframeDoc) {
						iframeDoc.open();
						iframeDoc.write(body);
						iframeDoc.close();
					}
				}
				return iframDoc;
			}
		</script>

<script type="text/javascript">
			var answer
			
			$().ready(function() {

				//Make clues
				var clues = $("div.clues");
				for (var index in options1){
					var answer = options1[index];
					var clue = $("<div value='" + answer + "' class='clue label success'>" + answer + "</div>");	
					clues.append(clue);
				}
				

				// Make elements draggable
				$("div.clue").draggable({ helper: 'clone' });
				
				// Make element drappable
				$("div.container").droppable({ 
					hoverClass: 'drophover',
					drop: function(event, ui) {
						this.innerHTML = event.target.outerHTML;
						this.children[0].style.position = "static";
					}
				 });


				var stubAnswer = generateStub(answers1,stubQuestion1);
				renderFrame("complete_code", stubAnswer);
				renderFrame("working_code", generateStub());

			})
		</script>
<script type="text/javascript">			
			function checkAnswers() {

				var correct = true;
				var incomplete = false;
				var answers = [];
				$("div.container").each( function(i) {
					if (!incomplete){
						var correctAnswer = this.getAttribute("correct");
						var child = this.children[0];
						if (child == undefined){
							correct = false;
							incomplete = true;
						}else {
							var submittedAnswer = child.getAttribute("value");
					
							if (correctAnswer != submittedAnswer) { 
								correct = false;
							};
							answers[answers.length] = child.innerHTML;
						}
					}
				});
				if (!incomplete && iframeDoc) {
					iframeDoc.open();
					iframeDoc.write(generateStub(answers, stubQuestion1));
					iframeDoc.close();
				}
				
				if (correct) {
					alert("That's Right!")
				} else if (incomplete){
					alert("Please fill in all the blanks.");
				} else { 
					alert("Try Again!")
				}
			}
		</script>
</head>
<body>
	<div id="container">
		<div id="content_area">
			<div class="working_area">
				<div class="clues hero-unit"></div>
				<div class="code hero-unit">
					<div class="left_code">
						&lt;
						<div id="container_1" correct="html" class="container"></div>
						&gt;<br /> &lt;head&gt;<br /> <br /> &lt;style type="
						<div id="container_2" correct="text/css" class="container"></div>
						"&gt;<br /> body<br /> {<br /> background-image:url('
						<div id="container_3" correct="images/img_tree.png"
							class="container"></div>
						');<br /> background-repeat:
						<div id="container_4" correct="no-repeat" class="container"></div>
						;<br /> background-position:
						<div id="container_5" correct="right" class="container"></div>
						<div id="container_6" correct="top" class="container"></div>
						;<br /> margin-right:
						<div id="container_7" correct="200px" class="container"></div>
						;<br /> }<br /> &lt;/
						<div id="container_8" correct="style" class="container"></div>
						&gt;<br />
					</div>
					<div class="right_code">
						&lt;/head&gt;<br /> <br /> &lt;body&gt;<br /> &lt;h1&gt;Hello
						World!&lt;/h1&gt;<br /> &lt;p&gt;W3Schools background no-repeat,
						set postion example.&lt;/p&gt<br />; &lt;p&gt;Now the background
						image is only show once, and positioned away from the
						text.&lt;/p&gt;<br /> &lt;p&gt;In this example we have also added
						a margin on the right side, so the background image will never
						disturb the text.&lt;/p&gt;<br /> &lt;/body&gt;<br /> <br />
						&lt;/html&gt;<br />
					</div>
					<div class="clear"></div>
					<a href="#" onclick="checkAnswers();" class="btn primary large">Run</a>
					<div class="clear"></div>
					<div class="fb-like" style="margin-left: 200px;"
						data-href="ruby.biando.ca" data-send="false" data-width="450"
						data-show-faces="true"></div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="code_results">
				<div id="working_code" class="working_code well"></div>
				<div id="complete_code" class="complete_code well"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="fb-root"></div>
	<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '248677415189770', // App ID
		      channelURL : 'channel.html', // Channel File
		      status     : true, // check login status
		      cookie     : true, // enable cookies to allow the server to access the session
		      oauth      : true, // enable OAuth 2.0
		      xfbml      : true  // parse XFBML
		    });

		    // Additional initialization code here
		  };

		  // Load the SDK Asynchronously
		  (function(d){
		     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
		     js = d.createElement('script'); js.id = id; js.async = true;
		     js.src = "http://connect.facebook.net/en_US/all.js";
		     d.getElementsByTagName('head')[0].appendChild(js);
		   }(document));
		</script>

</body>
</html>

<html>
<head>
<title>Code with friends</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />

<!-- Jquery -->
<script src="javascript/jquery.js"></script>
<script src="javascript/jquery-ui-1.8.16.custom.min.js"></script>
<script src="javascript/jstorage.js"></script>

<!-- Facebook -->
<script src="http://connect.facebook.net/en_US/all.js"></script>

<!-- Example question -->
<script src="javascript/stubQuestion.js"></script>

<script type="text/javascript">
			var answerFrame;
			var userFrame;
			
			function createIframe (element, iframeName) {
				var iframe;
				if (document.createElement && (iframe = document.createElement('iframe'))) {
					iframe.name = iframe.id = iframeName;
					iframe.width = "100%";
					iframe.height = "100%";
					iframe.src = 'about:blank';
					document.getElementById(element).appendChild(iframe);
				}
				return iframe;
			}

			function renderFrame (element, body) {
				var iframe = createIframe(element, 'iframe0');
				var iframDoc;
				if (iframe) {
					if (iframe.contentDocument) {
						iframeDoc = iframe.contentDocument;
					} else if (iframe.contentWindow) {
						iframeDoc = iframe.contentWindow.document;
					} else if (window.frames[iframe.name]) {
						iframeDoc = window.frames[iframe.name].document;
					}
					if (iframeDoc) {
						iframeDoc.open();
						iframeDoc.write(body);
						iframeDoc.close();
					}
				}
				return iframDoc;
			}
		</script>

<script type="text/javascript">
			var answer
			
			$().ready(function() {

				//Make clues
				var clues = $("div.clues");
				for (var index in options1){
					var answer = options1[index];
					var clue = $("<div value='" + answer + "' class='clue label success'>" + answer + "</div>");	
					clues.append(clue);
				}
				

				// Make elements draggable
				$("div.clue").draggable({ helper: 'clone' });
				
				// Make element drappable
				$("div.container").droppable({ 
					hoverClass: 'drophover',
					drop: function(event, ui) {
						this.innerHTML = event.target.outerHTML;
						this.children[0].style.position = "static";
					}
				 });


				var stubAnswer = generateStub(answers1,stubQuestion1);
				renderFrame("complete_code", stubAnswer);
				renderFrame("working_code", generateStub());

			})
		</script>
<script type="text/javascript">			
			function checkAnswers() {

				var correct = true;
				var incomplete = false;
				var answers = [];
				$("div.container").each( function(i) {
					if (!incomplete){
						var correctAnswer = this.getAttribute("correct");
						var child = this.children[0];
						if (child == undefined){
							correct = false;
							incomplete = true;
						}else {
							var submittedAnswer = child.getAttribute("value");
					
							if (correctAnswer != submittedAnswer) { 
								correct = false;
							};
							answers[answers.length] = child.innerHTML;
						}
					}
				});
				if (!incomplete && iframeDoc) {
					iframeDoc.open();
					iframeDoc.write(generateStub(answers, stubQuestion1));
					iframeDoc.close();
				}
				
				if (correct) {
					alert("That's Right!")
				} else if (incomplete){
					alert("Please fill in all the blanks.");
				} else { 
					alert("Try Again!")
				}
			}
		</script>
</head>
<body>
	<div id="container">
		<div id="content_area">
			<div class="working_area">
				<div class="clues hero-unit"></div>
				<div class="code hero-unit">
					<div class="left_code">
						&lt;
						<div id="container_1" correct="html" class="container"></div>
						&gt;<br /> &lt;head&gt;<br /> <br /> &lt;style type="
						<div id="container_2" correct="text/css" class="container"></div>
						"&gt;<br /> body<br /> {<br /> background-image:url('
						<div id="container_3" correct="images/img_tree.png"
							class="container"></div>
						');<br /> background-repeat:
						<div id="container_4" correct="no-repeat" class="container"></div>
						;<br /> background-position:
						<div id="container_5" correct="right" class="container"></div>
						<div id="container_6" correct="top" class="container"></div>
						;<br /> margin-right:
						<div id="container_7" correct="200px" class="container"></div>
						;<br /> }<br /> &lt;/
						<div id="container_8" correct="style" class="container"></div>
						&gt;<br />
					</div>
					<div class="right_code">
						&lt;/head&gt;<br /> <br /> &lt;body&gt;<br /> &lt;h1&gt;Hello
						World!&lt;/h1&gt;<br /> &lt;p&gt;W3Schools background no-repeat,
						set postion example.&lt;/p&gt<br />; &lt;p&gt;Now the background
						image is only show once, and positioned away from the
						text.&lt;/p&gt;<br /> &lt;p&gt;In this example we have also added
						a margin on the right side, so the background image will never
						disturb the text.&lt;/p&gt;<br /> &lt;/body&gt;<br /> <br />
						&lt;/html&gt;<br />
					</div>
					<div class="clear"></div>
					<a href="#" onclick="checkAnswers();" class="btn primary large">Run</a>
					<div class="clear"></div>
					<div class="fb-like" style="margin-left: 200px;"
						data-href="ruby.biando.ca" data-send="false" data-width="450"
						data-show-faces="true"></div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="code_results">
				<div id="working_code" class="working_code well"></div>
				<div id="complete_code" class="complete_code well"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="fb-root"></div>
	<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '248677415189770', // App ID
		      channelURL : 'channel.html', // Channel File
		      status     : true, // check login status
		      cookie     : true, // enable cookies to allow the server to access the session
		      oauth      : true, // enable OAuth 2.0
		      xfbml      : true  // parse XFBML
		    });

		    // Additional initialization code here
		  };

		  // Load the SDK Asynchronously
		  (function(d){
		     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
		     js = d.createElement('script'); js.id = id; js.async = true;
		     js.src = "http://connect.facebook.net/en_US/all.js";
		     d.getElementsByTagName('head')[0].appendChild(js);
		   }(document));
		</script>

</body>
</html>

<html>
<head>
<title>Code with friends</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="styles/index.css" />

<!-- Jquery -->
<script src="javascript/jquery.js"></script>
<script src="javascript/jquery-ui-1.8.16.custom.min.js"></script>
<script src="javascript/jstorage.js"></script>

<!-- Facebook -->
<script src="http://connect.facebook.net/en_US/all.js"></script>

<!-- Example question -->
<script src="javascript/stubQuestion.js"></script>

<script type="text/javascript">
			var answerFrame;
			var userFrame;
			
			function createIframe (element, iframeName) {
				var iframe;
				if (document.createElement && (iframe = document.createElement('iframe'))) {
					iframe.name = iframe.id = iframeName;
					iframe.width = "100%";
					iframe.height = "100%";
					iframe.src = 'about:blank';
					document.getElementById(element).appendChild(iframe);
				}
				return iframe;
			}

			function renderFrame (element, body) {
				var iframe = createIframe(element, 'iframe0');
				var iframDoc;
				if (iframe) {
					if (iframe.contentDocument) {
						iframeDoc = iframe.contentDocument;
					} else if (iframe.contentWindow) {
						iframeDoc = iframe.contentWindow.document;
					} else if (window.frames[iframe.name]) {
						iframeDoc = window.frames[iframe.name].document;
					}
					if (iframeDoc) {
						iframeDoc.open();
						iframeDoc.write(body);
						iframeDoc.close();
					}
				}
				return iframDoc;
			}
		</script>

<script type="text/javascript">
			var answer
			
			$().ready(function() {

				//Make clues
				var clues = $("div.clues");
				for (var index in options1){
					var answer = options1[index];
					var clue = $("<div value='" + answer + "' class='clue label success'>" + answer + "</div>");	
					clues.append(clue);
				}
				

				// Make elements draggable
				$("div.clue").draggable({ helper: 'clone' });
				
				// Make element drappable
				$("div.container").droppable({ 
					hoverClass: 'drophover',
					drop: function(event, ui) {
						this.innerHTML = event.target.outerHTML;
						this.children[0].style.position = "static";
					}
				 });


				var stubAnswer = generateStub(answers1,stubQuestion1);
				renderFrame("complete_code", stubAnswer);
				renderFrame("working_code", generateStub());

			})
		</script>
<script type="text/javascript">			
			function checkAnswers() {

				var correct = true;
				var incomplete = false;
				var answers = [];
				$("div.container").each( function(i) {
					if (!incomplete){
						var correctAnswer = this.getAttribute("correct");
						var child = this.children[0];
						if (child == undefined){
							correct = false;
							incomplete = true;
						}else {
							var submittedAnswer = child.getAttribute("value");
					
							if (correctAnswer != submittedAnswer) { 
								correct = false;
							};
							answers[answers.length] = child.innerHTML;
						}
					}
				});
				if (!incomplete && iframeDoc) {
					iframeDoc.open();
					iframeDoc.write(generateStub(answers, stubQuestion1));
					iframeDoc.close();
				}
				
				if (correct) {
					alert("That's Right!")
				} else if (incomplete){
					alert("Please fill in all the blanks.");
				} else { 
					alert("Try Again!")
				}
			}
		</script>
</head>
<body>
	<div id="container">
		<div id="content_area">
			<div class="working_area">
				<div class="clues hero-unit"></div>
				<div class="code hero-unit">
					<div class="left_code">
						&lt;
						<div id="container_1" correct="html" class="container"></div>
						&gt;<br /> &lt;head&gt;<br /> <br /> &lt;style type="
						<div id="container_2" correct="text/css" class="container"></div>
						"&gt;<br /> body<br /> {<br /> background-image:url('
						<div id="container_3" correct="images/img_tree.png"
							class="container"></div>
						');<br /> background-repeat:
						<div id="container_4" correct="no-repeat" class="container"></div>
						;<br /> background-position:
						<div id="container_5" correct="right" class="container"></div>
						<div id="container_6" correct="top" class="container"></div>
						;<br /> margin-right:
						<div id="container_7" correct="200px" class="container"></div>
						;<br /> }<br /> &lt;/
						<div id="container_8" correct="style" class="container"></div>
						&gt;<br />
					</div>
					<div class="right_code">
						&lt;/head&gt;<br /> <br /> &lt;body&gt;<br /> &lt;h1&gt;Hello
						World!&lt;/h1&gt;<br /> &lt;p&gt;W3Schools background no-repeat,
						set postion example.&lt;/p&gt<br />; &lt;p&gt;Now the background
						image is only show once, and positioned away from the
						text.&lt;/p&gt;<br /> &lt;p&gt;In this example we have also added
						a margin on the right side, so the background image will never
						disturb the text.&lt;/p&gt;<br /> &lt;/body&gt;<br /> <br />
						&lt;/html&gt;<br />
					</div>
					<div class="clear"></div>
					<a href="#" onclick="checkAnswers();" class="btn primary large">Run</a>
					<div class="clear"></div>
					<div class="fb-like" style="margin-left: 200px;"
						data-href="ruby.biando.ca" data-send="false" data-width="450"
						data-show-faces="true"></div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="code_results">
				<div id="working_code" class="working_code well"></div>
				<div id="complete_code" class="complete_code well"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div id="fb-root"></div>
	<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '248677415189770', // App ID
		      channelURL : 'channel.html', // Channel File
		      status     : true, // check login status
		      cookie     : true, // enable cookies to allow the server to access the session
		      oauth      : true, // enable OAuth 2.0
		      xfbml      : true  // parse XFBML
		    });

		    // Additional initialization code here
		  };

		  // Load the SDK Asynchronously
		  (function(d){
		     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
		     js = d.createElement('script'); js.id = id; js.async = true;
		     js.src = "http://connect.facebook.net/en_US/all.js";
		     d.getElementsByTagName('head')[0].appendChild(js);
		   }(document));
		</script>

</body>
</html>
