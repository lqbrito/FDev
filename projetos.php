<?php 
	session_start();
	$pag = 2;
	$titulo = "FDev - Área de trabalho e projetos";
	include_once ("_cabecalho.php");
?>

<!------------------------- Código do script ------------------------>

<?php
	require ("_definicoes.php");

	function delTree($dir) { 
		$files = array_diff(scandir($dir), array('.','..')); 
		foreach ($files as $file) { 
			(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
		} 
		return rmdir($dir); 
	}
			
	if (isset($_POST['nameproject']))
	{
		try 
		{
			$dir = 'projects' . DIRECTORY_SEPARATOR . $_POST['nameproject'];
			$dirlayouts = $dir . DIRECTORY_SEPARATOR . 'layouts';
			$dirscripts = $dir . DIRECTORY_SEPARATOR . 'scripts';
			$dirnamespaces = $dir . DIRECTORY_SEPARATOR . 'namespaces';
			if(!is_dir($dir))
			{
				mkdir($dir);
				mkdir($dirlayouts);
				mkdir($dirscripts);
				mkdir($dirnamespaces);
				echo "<div class='alert alert-info alert-dismissible'>";
		        echo "<button type='button' class='close' data-dismiss='alert' aria-hIDden='true'>×</button>";
		        echo "<h4><i class='icon fa fa-info'></i> Aviso!</h4>";
		        echo 'Projeto "' . $_POST['nameproject'] . '" criado com sucesso';
		        echo "</div>";
			}
			else
			{
				echo "<div class='alert alert-danger alert-dismissible'>";
		        echo "<button type='button' class='close' data-dismiss='alert' aria-hIDden='true'>×</button>";
		        echo "<h4><i class='icon fa fa-info'></i> Aviso!</h4>";
		        echo 'Projeto "' . $_POST['nameproject'] . '" Já existe';
		        echo "</div>";
			}
		}
		catch(Exception $e) 
		{
			echo "<div class='alert alert-danger alert-dismissible'>";
	        echo "<button type='button' class='close' data-dismiss='alert' aria-hIDden='true'>×</button>";
	        echo "<h4><i class='icon fa fa-info'></i> Erro!</h4>";
	        echo $e->getMessage();
	        echo "</div>";
		}
	}
	
	if (isset($_POST['abrir']))
	{
		$_SESSION['project'] = $_POST['project'];
	}

	if (isset($_POST['excluir']))
	{
		if ($_POST['project'] == 'Default')
		{
			echo "<div class='alert alert-danger alert-dismissible'>";
	        echo "<button type='button' class='close' data-dismiss='alert' aria-hIDden='true'>×</button>";
	        echo "<h4><i class='icon fa fa-info'></i> Aviso!</h4>";
	        echo 'Projeto "Default" não pode ser excluído';
	        echo "</div>";
		}
		else
		{
			try 
			{
				$dir = 'projects' . DIRECTORY_SEPARATOR . $_POST['project'];
				delTree($dir);
				echo "<div class='alert alert-info alert-dismissible'>";
		        echo "<button type='button' class='close' data-dismiss='alert' aria-hIDden='true'>×</button>";
		        echo "<h4><i class='icon fa fa-info'></i> Aviso!</h4>";
		        echo 'Projeto "' . $_POST['project'] . '" excluído com sucesso';
		        echo "</div>";
		        $_SESSION['project'] = 'Default';
			}
			catch(Exception $e) 
			{
				echo "<div class='alert alert-danger alert-dismissible'>";
		        echo "<button type='button' class='close' data-dismiss='alert' aria-hIDden='true'>×</button>";
		        echo "<h4><i class='icon fa fa-info'></i> Erro!</h4>";
		        echo $e->getMessage();
		        echo "</div>";
			}			
		}
	}

	echo "<p>";
	echo "Projeto <b>" . $_SESSION['project'] . "</b> selecionado na área de trabalho. ";
	if (isset($_SESSION['databasename']))
		echo "Conectado ao banco de dados <b>" . $_SESSION['databasename'] . ".</b>";
	else
		echo "Nenhuma conexão com banco de dados ativa no momento.";
	echo "</p>";

	$pastas = scandir("projects");
	
?>

<div class="row">
	<div class="col-md-6">
		<div class="card">
		 	<div class="card-header">
		    	Projetos disponíveis na área de trabalho
		 	</div>
		  
		  	<form action = "projetos.php" method = "post">
				<div class="card-body">			    
			    	<div class="form-row">
						<div class="col-md-12">
							<label for="project">Projetos</label>
							<select class="form-control" id="project" name="project">
								<option value='Default'>Default (*)</option>
								<?php
									foreach ($pastas as $tp)
										if ($tp != '.' && $tp != '..' && $tp != 'Default')
											echo "<option value='$tp'>$tp</option>";
								?>
							</select>
						</div>
					</div>
			  	</div>
			  	
				<div class="card-footer">
			    	<button class="btn btn-primary" type="submit" name="abrir"><i class="fas fa-folder-open"></i> Abrir</button>
			    	<button class="btn btn-danger" type="submit" name="excluir"><i class="fas fa-trash"></i> Excluir</button>
			 	</div>
		  
			</form>

		</div>
	</div>

	<div class="col-md-6">
		<div class="card">
		 	<div class="card-header">
		    	Novo projeto para a área de trabalho
		 	</div>
		  
		  	<form action = "projetos.php" method = "post">
				<div class="card-body">
			    
			    	<div class="form-row">
						<div class="col-md-12">
							 <label for="nameproject">Nome do projeto</label>
							 <input type="text" class="form-control" id="nameproject" name="nameproject"required>
						</div>
					</div>
			  	</div>
			  	
				<div class="card-footer">
			    	<button class="btn btn-primary" type="submit"><i class="fas fa-folder"></i> Criar</button>
			 	</div>
		  
			</form>

		</div>
	</div>
</div>

<!------------------------------------------------------------------->      

<?php 
	include_once ("_rodape.php");
?>