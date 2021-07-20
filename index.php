

<html lang="fr">
<head>
	<title>Scrapping d'URL</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="table/css/style.css">
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-43">
						Scrapping d'URL
					</span>
					
					
					<div class="wrap-input100">
						<input class="input100" type="url" name="url">
						<span class="focus-input100"></span>
						<span class="label-input100">URL à analyser</span>
					</div>	

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							<span id="texturl">Envoyer l'URL</span>
							<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
						</button>
					</div>
					<div id="message"></div>
				</form>

				<div class="login100-more">
					<div class="container">
						<table>
							<thead>
								<tr>
									<th>Adresse e-mail</th>
									<th>Date d'ajout</th>
								</tr>
							</thead>
							<tbody id="listeadresse">
								
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
			
			
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
	<script>
		$(function () {
  
		  $('form').on('submit', function (e) {
  
			e.preventDefault();
			url = $("input[name=url]").val();
			$.ajax({
			  type: 'post',
			  url : 'envoi.php',
			  data: $(this).serialize(),
			  dataType: 'html',
			  success: function(response)
				  {
					  $("#message").html(response);
					  $("#listeadresse").load("fetch.php");
				  },
			  error: function(response)
				  {
					  $("#message").html(response);
					  $("#listeadresse").load("fetch.php");
				  }
			});
  
		  });
  
		});

		$(document).ready(function () {
			$("#listeadresse").load("fetch.php");
		});
	  </script>
</body>
</html>