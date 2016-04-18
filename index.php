<!DOCTYPE html>
<html>
<head>
	<title>Potifolio</title>
	<?php include 'head_elements.php'; ?>
</head>
<body>
	<script>
	//create the click event to filter based in the category
		$(document).ready(function(){
			var $container = $('.row.conteudo');		
			$container.isotope({filter: '*',sortBy:'random',animationOptions: 
				{duration: 750,easing: 'linear',queue: false,			}					});		
			$('li.waves-effect').click(function(){			
				var selector = $(this).attr('data-filter');			
				$container.isotope({ filter: selector,animationOptions: {duration: 750,easing: 'linear',queue: false,				
			}			});			return false;		});	});	
	</script>	
	<main>	
	<!-- Create the category menu :: ADD automatic -->
		<div class="container" sytle="margin-top:5%;">
			<ul class="pagination center">	
				<li class="waves-effect light" data-filter=".marketing">Categoria 1</li>	
				<li class="waves-effect light" data-filter=".programacao">Categoria 2</li>	
				<li class="waves-effect light" data-filter=".lideranca">Categoria 3</li>	
				<li class="waves-effect light" data-filter="*">Todos</li>	
			</ul>
			<div class="row conteudo">
				<? 
				$sql = "SELECT * FROM potifolio";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
		// output data of each row
					while($row = $result->fetch_assoc()) {
						echo '
						<div class="col s12 m6 l4 '.$row["categoria"].'">
							<div class="card '.$row["cor"].'">
								<div class="card-content white-text light">							<span class="card-title">'.utf8_encode($row["titulo"]).'</span>
									'.utf8_encode($row["texto"]).'
								</div>
								<div class="card-action">							<a class="waves-effect waves-light btn white white-text red darken-4 light" href="check_portifolio.php?portifolio='.$row["link"].'">Leia Mais</a>
								</div>
							</div>
						</div>';			
					}
				}
				$conn->close();
				?>	
			</div>	
		</div>	
	</main>	
</body>
</html>