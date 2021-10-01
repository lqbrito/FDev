<?php 
	session_start();
	$pag = 7;
	$titulo = "FDev - Ferramentas de código fonte adicionais";
	include_once ("_cabecalho.php");
?>

<!------------------------- Código do script ------------------------>

<?php

	$pastas = scandir('projects' . DIRECTORY_SEPARATOR . $_SESSION['project'] . DIRECTORY_SEPARATOR . 'namespaces');

	// Criação do script web.php para o Laravel <= 7
	$webphp7 = "<?php";
	$webphp7 .= "\n\nuse Illuminate\Support\Facades\Route;";

	foreach ($pastas as $tp)
		if ($tp != '.' && $tp != '..')
		{
			$estrutura = 'projects' . DIRECTORY_SEPARATOR . $_SESSION['project'] . DIRECTORY_SEPARATOR . 'namespaces' . DIRECTORY_SEPARATOR . $tp;
			$subpastas = scandir($estrutura);

			$webphp7 .= "\n\nRoute::namespace('$tp')->group(function () {";
			
			if (count($subpastas) > 2)
			{
				foreach ($subpastas as $sub)
				if ($sub != '.' && $sub != '..')
				{
					$webphp7 .= "\n\n\tRoute::get('/$sub', '$sub" . "Controller@index');";
					$webphp7 .= "\n\tRoute::get('/$sub/incluir', '$sub" . "Controller@incluir');";
					$webphp7 .= "\n\tRoute::post('/$sub/incluindo', '$sub" . "Controller@incluindo');";
					$webphp7 .= "\n\tRoute::post('/$sub/consultar', '$sub" . "Controller@consultar');";
					$webphp7 .= "\n\tRoute::post('/$sub/alterar', '$sub" . "Controller@alterar');";
					$webphp7 .= "\n\tRoute::post('/$sub/alterando', '$sub" . "Controller@alterando');";
					$webphp7 .= "\n\tRoute::post('/$sub/excluir', '$sub" . "Controller@excluir');";
					$webphp7 .= "\n\tRoute::post('/$sub/excluindo', '$sub" . "Controller@excluindo');";
					$webphp7 .= "\n\tRoute::any('/$sub/pesquisar', '$sub" . "Controller@pesquisar');";
				}
			}

			$webphp7 .= "\n\n});";
		}

	// Criação do script web.php para o Laravel >= 8
	$webphp8 = "<?php";
	$webphp8 .= "\n\nuse Illuminate\Support\Facades\Route;\n";

	foreach ($pastas as $tp)
		if ($tp != '.' && $tp != '..')
		{
			$estrutura = 'projects' . DIRECTORY_SEPARATOR . $_SESSION['project'] . DIRECTORY_SEPARATOR . 'namespaces' . DIRECTORY_SEPARATOR . $tp;
			$subpastas = scandir($estrutura);

			if (count($subpastas) > 2)
			{
				foreach ($subpastas as $sub)
				if ($sub != '.' && $sub != '..')
				{
					$classetabela = ucfirst($sub);
					$webphp8 .= "\nuse App\Http\Controllers\\$tp\\$classetabela" . "Controller;";

				}
			}

			$webphp8 .= "\n\nRoute::namespace('$tp')->group(function () {";
			
			if (count($subpastas) > 2)
			{
				foreach ($subpastas as $sub)
				if ($sub != '.' && $sub != '..')
				{
					$classetabela = ucfirst($sub);
					$webphp8 .= "\n\n\tRoute::get('/$sub', " . "[$classetabela" . "Controller::class, 'index']);";
					$webphp8 .= "\n\tRoute::get('/$sub/incluir', " . "[$classetabela" . "Controller::class, 'incluir']);";
					$webphp8 .= "\n\tRoute::post('/$sub/incluindo', " . "[$classetabela" . "Controller::class, 'incluindo']);";
					$webphp8 .= "\n\tRoute::post('/$sub/consultar', " . "[$classetabela" . "Controller::class, 'consultar']);";
					$webphp8 .= "\n\tRoute::post('/$sub/alterar', " . "[$classetabela" . "Controller::class, 'alterar']);";
					$webphp8 .= "\n\tRoute::post('/$sub/alterando', " . "[$classetabela" . "Controller::class, 'alterando']);";
					$webphp8 .= "\n\tRoute::post('/$sub/excluir', " . "[$classetabela" . "Controller::class, 'excluir']);";
					$webphp8 .= "\n\tRoute::post('/$sub/excluindo', " . "[$classetabela" . "Controller::class, 'excluindo']);";
					$webphp8 .= "\n\tRoute::any('/$sub/pesquisar', " . "[$classetabela" . "Controller::class, 'pesquisar']);";
				}
			}

			$webphp8 .= "\n\n});";
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
    	Arquivo de rotas web.php do Laravel >= 8
 	</div>
  
	<div class="card-body">   
    	<div class="form-row">
			<div class="col-md-12">
				 <textarea class='form-control' rows='30' id='' name=''><?php echo $webphp8; ?></textarea>
			</div>				
		</div>
  	</div>

</div>
<br>
<div class="card">
 	<div class="card-header">
    	Arquivo de rotas web.php do Laravel <= 7
 	</div>
  
	<div class="card-body">   
    	<div class="form-row">
			<div class="col-md-12">
				 <textarea class='form-control' rows='30' id='' name=''><?php echo $webphp7; ?></textarea>
			</div>				
		</div>
  	</div>

</div>

<!------------------------------------------------------------------->      

<?php 
	include_once ("_rodape.php");
?>