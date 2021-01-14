<?php
	session_start();
	require ("_definicoes.php");

	function delTree($dir) 
	{ 
		$files = array_diff(scandir($dir), array('.','..')); 
		foreach ($files as $file) 
		{ 
			(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
		} 
		return rmdir($dir); 
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

	header ("location:projetos.php");	
?>