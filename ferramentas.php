<?php 
	session_start();
	$pag = 7;
	$titulo = "FDev - Ferramentas de código fonte adicionais";
	include_once ("_cabecalho.php");
?>

<!------------------------- Código do script ------------------------>

<?php

	$pastas = scandir('projects' . DIRECTORY_SEPARATOR . $_SESSION['project'] . DIRECTORY_SEPARATOR . 'namespaces');

	$webphp = "<?php";
	$webphp .= "\n\nuse Illuminate\Support\Facades\Route;";

	

	foreach ($pastas as $tp)
		if ($tp != '.' && $tp != '..')
		{
			$estrutura = 'projects' . DIRECTORY_SEPARATOR . $_SESSION['project'] . DIRECTORY_SEPARATOR . 'namespaces' . DIRECTORY_SEPARATOR . $tp;
			$subpastas = scandir($estrutura);

			$webphp .= "\n\nRoute::namespace('$tp')->group(function () {";
			
			if (count($subpastas) > 2)
			{
				foreach ($subpastas as $sub)
				if ($sub != '.' && $sub != '..')
				{
					$webphp .= "\n\n\tRoute::get('/$sub', '$sub" . "Controller@index');";
					$webphp .= "\n\tRoute::get('/$sub/incluir', '$sub" . "Controller@incluir');";
					$webphp .= "\n\tRoute::post('/$sub/incluindo', '$sub" . "Controller@incluindo');";
					$webphp .= "\n\tRoute::post('/$sub/consultar', '$sub" . "Controller@consultar');";
					$webphp .= "\n\tRoute::post('/$sub/alterar', '$sub" . "Controller@alterar');";
					$webphp .= "\n\tRoute::post('/$sub/alterando', '$sub" . "Controller@alterando');";
					$webphp .= "\n\tRoute::post('/$sub/excluir', '$sub" . "Controller@excluir');";
					$webphp .= "\n\tRoute::post('/$sub/excluindo', '$sub" . "Controller@excluindo');";
					$webphp .= "\n\tRoute::any('/$sub/pesquisar', '$sub" . "Controller@pesquisar');";
				}
			}

			$webphp .= "\n\n});";
		}

	echo "<p>";
	echo "Projeto <b>" . $_SESSION['project'] . "</b> selecionado na área de trabalho. ";
	if (isset($_SESSION['databasename']))
		echo "Conectado ao banco de dados <b>" . $_SESSION['databasename'] . ".</b>";
	else
		echo "Nenhuma conexão com banco de dados ativa no momento.";
	echo "</p>";
?>

<div class="card">
 	<div class="card-header">
    	Arquivo de rotas do Laravel web.php
 	</div>
  
	<div class="card-body">   
    	<div class="form-row">
			<div class="col-md-12">
				 <textarea class='form-control' rows='30' id='' name=''><?php echo $webphp; ?></textarea>
			</div>				
		</div>
  	</div>

</div>

<!------------------------------------------------------------------->      

<?php 
	include_once ("_rodape.php");
?>