<?php 
	session_start();
	$pag = 6;
	$titulo = "FDev - Geração de scripts PHP e Laravel";
	include_once ("_cabecalho.php");
?>

<!------------------------- Código do script ------------------------>

<?php
	require ("_definicoes.php");
	echo "<p>";
	echo "Projeto <b>" . $_SESSION['project'] . "</b> selecionado na área de trabalho. ";
	if (isset($_SESSION['databasename']))
		echo "Conectado ao banco de dados <b>" . $_SESSION['databasename'] . ".</b>";
	else
		echo "Nenhuma conexão com banco de dados ativa no momento.";
	echo "</p>";

	$pastas = scandir('projects' . DIRECTORY_SEPARATOR . $_SESSION['project'] . DIRECTORY_SEPARATOR . 'namespaces');

	$pastasScripts = scandir('projects' . DIRECTORY_SEPARATOR . $_SESSION['project'] . DIRECTORY_SEPARATOR . 'scripts');
?>

<!------------------------------------------------------------------->      

<div class="row mb-3">
	<div class="col-md-4">
		<div class="card">
		 	<div class="card-header">
		    	Scripts de layout do projeto <b><?php echo $_SESSION['project']; ?></b>
		 	</div>
		  
	  		<div class="card-body">			    
		    	<div class="form-row">
					<div class="col-md-12">
						<ul class = 'list-unstyled'>
							<?php

								$path = 'projects' . DIRECTORY_SEPARATOR . $_SESSION['project'] . DIRECTORY_SEPARATOR . 'layouts';

								$diretorio = dir($path);

								while ($arquivo = $diretorio->read())
									if ($arquivo != '.' && $arquivo != '..')
									echo "<li>$arquivo</li>";					
								
								$diretorio->close();
							?>
						</ul>
					</div>
				</div>
		  	</div>
		
		</div>
	</div>

	<div class="col-md-4">
		<div class="card">
	 		<div class="card-header">
		    	Estrutura das namespaces
		 	</div>
	  		<div class="card-body">			    
	  			<ul>
	  				<?php
	  					foreach ($pastas as $tp)
	  						if ($tp != '.' && $tp != '..')
	  						{
	  							$estrutura = 'projects' . DIRECTORY_SEPARATOR . $_SESSION['project'] . DIRECTORY_SEPARATOR . 'namespaces' . DIRECTORY_SEPARATOR . $tp;
	  							$subpastas = scandir($estrutura);

	  							echo "<li>$tp</li>";
	  							
	  							if (count($subpastas) > 2)
	  							{
	  								echo "<ul class = 'list-unstyled'>";
	  								foreach ($subpastas as $sub)
										if ($sub != '.' && $sub != '..')
										{
											echo "<li>$sub</li>";
										}
	  								echo "</ul>";
	  							}
	  						}
	  				?>
	  			</ul>
		  	</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card">
	 		<div class="card-header">
		    	Scripts gerados para o projeto <b><?php echo $_SESSION['project']; ?></b>
		 	</div>
		 	<div class="card-body">
		 		<form action = "__manipulascripts.php" method = "post">
		 			<div class="icheck-light d-inline">
                        <input type="radio" name="fonte" id="f1" value="php">
                        <label for="f1">Php</label>
                    </div>
                    <div class="icheck-light d-inline">
                        <input type="radio" name="fonte" checked id="f2" value="laravel">
                        <label for="f2">Laravel</label>
                    </div>
                    <button class="btn btn-primary btn-block mt-2" type="submit" name="criar"><i class="fas fa-file"></i> Criar scripts</button>
  					<button class="btn btn-danger btn-block" type="submit" name="excluir"><i class="fas fa-trash"></i> Excluir scripts</button>
  				</form>
	  			<hr>
	  			<ul>
	  				<?php
	  					foreach ($pastasScripts as $tp)
	  						if ($tp != '.' && $tp != '..')
	  						{
	  							$estrutura = 'projects' . DIRECTORY_SEPARATOR . $_SESSION['project'] . DIRECTORY_SEPARATOR . 'scripts' . DIRECTORY_SEPARATOR . $tp;
	  						
	  							echo "<li>$tp</li>";
	  							if ($tp == 'Models')
	  							{
	  								echo "<ol class = 'list-unstyled'>";
	  								$diretorio = dir($estrutura);

									while ($arquivo = $diretorio->read())
										if ($arquivo != '.' && $arquivo != '..')
										echo "<li>$arquivo</li>";					
									
									$diretorio->close();
									echo "</ol>";
	  							}
	  							else
	  							if ($tp == 'Domains')
	  							{
	  								echo "<ol class = 'list-unstyled'>";
	  								$diretorio = dir($estrutura);

									while ($arquivo = $diretorio->read())
										if ($arquivo != '.' && $arquivo != '..')
										echo "<li>$arquivo</li>";					
									
									$diretorio->close();
									echo "</ol>";
	  							}
	  							else
	  							if ($tp == 'Services')
	  							{
	  								echo "<ol class = 'list-unstyled'>";
	  								$diretorio = dir($estrutura);

									while ($arquivo = $diretorio->read())
										if ($arquivo != '.' && $arquivo != '..')
										echo "<li>$arquivo</li>";					
									
									$diretorio->close();
									echo "</ol>";
	  							}
	  							else
	  								if ($tp == 'Controllers')
									{
										$subpastas = scandir($estrutura);

										if (count($subpastas) > 2)
										{
											echo "<ul>";
											foreach ($subpastas as $sub)
											if ($sub != '.' && $sub != '..')
											{
												echo "<li>$sub</li>";
												
												echo "<ol class = 'list-unstyled'>";
												$diretorio = dir($estrutura . DIRECTORY_SEPARATOR . $sub);

												while ($arquivo = $diretorio->read())
													if ($arquivo != '.' && $arquivo != '..')
														echo "<li>$arquivo</li>";					

													$diretorio->close();
													echo "</ol>";
											}
											echo "</ul>";
										}
									}
									else
		  								if ($tp == 'Views')
										{
											$subpastas = scandir($estrutura);

											if (count($subpastas) > 2)
											{
												echo "<ul>";
												foreach ($subpastas as $sub)
												if ($sub != '.' && $sub != '..')
												{
													echo "<li>$sub</li>";
													
													$subsubpastas = scandir($estrutura . DIRECTORY_SEPARATOR . $sub);

													echo "<ul>";
													foreach ($subsubpastas as $subsub)
														if ($subsub != '.' && $subsub != '..')
														{
															echo "<li>$subsub</li>";
															echo "<ol class = 'list-unstyled'>";
															$diretorio = dir($estrutura . DIRECTORY_SEPARATOR . $sub . DIRECTORY_SEPARATOR . $subsub);

															while ($arquivo = $diretorio->read())
																if ($arquivo != '.' && $arquivo != '..')
																	echo "<li>$arquivo</li>";					

															$diretorio->close();
															echo "</ol>";
														}
													echo "</ul>";											
												}
												echo "</ul>";
											}
										}	
	  						}
	  				?>
	  			</ul>
		  	</div>
		</div>
	</div>
</div>

<?php 
	include_once ("_rodape.php");
?>