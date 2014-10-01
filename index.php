<!DOCTYPE html>

<html>
<!-- PHP -->

    <link rel="icon" href="/Hamster-generator.ico" sizes="80x36" itemprop="image" >

  <head>

    <title>Passphrase Generator - Generate secure passwords</title>




   <script src="/microajax.minified.js"></script>

    <link href="/stylesheets/blueprint/screen.css?1311293253" media="screen" rel="stylesheet" type="text/css" />

    <link href="/stylesheets/blueprint/print.css?1311293253" media="print" rel="stylesheet" type="text/css" />

    <!--[if lt IE 8]><link href="/stylesheets/blueprint/ie.css?1311293253" media="screen" rel="stylesheet" type="text/css" /><![endif]-->

    <link href="/stylesheets/custom.css?1311293249" media="screen" rel="stylesheet" type="text/css" />

  </head>

  <body>

    <div class="container">



<script type="text/javascript">
      function getWords(){
	microAjax("/passphrase.php", function (res) {
         document.getElementById("passphrase").innerHTML = res;
         document.getElementById("message").value= res.replace(/(\r\n|\n|\r)/gm," ").slice(0, -2);
	});
    }
    getWords();

    function showEmailForm(){
        document.getElementById('email-form').style.display = 'block';
        document.getElementById('email-click').style.display = 'none';
    }

   function sendEmail(){
        var emailsendto = document.getElementById('emailsendto').value;
        var subject = document.getElementById('subject').value;
        var body = document.getElementById('message').value;
        var proceed = true;
       var postDump = "sendto=" + emailsendto + "&subject=" + subject + "&body=" + body;
	   microAjax("/sendEmail.php", function (res) {
       alert(res);
}, postDump);
        document.getElementById('email-form').style.display = 'none';
        document.getElementById('email-click').style.display = 'block';
}
</script>


                <header>

      <div class="header-text">

        <h1> 
        </h1> 


      </div>

        <nav class="round">

<img src="HamsterWheel-400.png" /> 
          <ul>

            <li>

<center><strong>      Passphrase Generator </strong></center>
</li>



          </ul>

        </nav>

      </header>



      <section class="round">

        <div>
<center>
<input id="generate" type="button" value="Generate Passphrase" onclick="getWords();" />
</center>
        </div>

      </section> 




      <section class="round">

        <div id="passphrase">
        correct battery horse staple

        </div>

      </section> 


      <section class="round">

        <div id="email-click"> <a href="#" onclick="showEmailForm();return false;">Email the passphrase </a></div>
        <div id="email-form" style="display:none">
        
<form method="POST" name="contactform" action="contact-form-handler.php">
    <p>
        <label for='email'>Send to:</label>
        <br>
        <input type="text" id="emailsendto">
        <br>
    </p>
    <p>
        <label for='subject'>Subject:</label>
        <br>
        <input type="text" id="subject" value="passphrase" size="45">
    </p>
    <p>
        <label for='message'>Message:</label>
        <br>
        <textarea id="message" style="width: 450px; height: 100px;"></textarea>
    </p>
    <input type="button" value="Submit" onclick="sendEmail();">
    <br>
</form>
        </div>

      </section> 


     <footer>

  <nav class="round">

 <div>
<a href="http://xkcd.com/936/">Learn why passphrases are more secure than passwords.</a>
<br/>
<br/>
<a href="https://github.com/jakx/passphrasegen">Source (github)</a>
<br/>
</div>

  </nav>

</footer>



    </div>

  </body>

</html>




