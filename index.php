<!DOCTYPE html>

<html>
<!-- PHP -->

  <head>

    <title>Passphrase Generator</title>


    <link rel="icon" href="/Hamster-generator.ico" >



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
	});
    }
    getWords();
</script>


                <header>

      <div class="header-text">

        <h1> 
        </h1> 


      </div>

        <nav class="round">

          <ul>

            <li>

<strong>      Passphrase Generator </strong>
</li>



          </ul>

        </nav>

      </header>



      <section class="round">

        <div>
<input id="generate" type="button" value="Generate Passphrase" onclick="getWords();" />
        </div>

      </section> 




      <section class="round">

        <div id="passphrase">
        correct battery horse staple

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




