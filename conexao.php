<?php 
	session_start();
	$pag = 3;
	$titulo = "FDev - Conexão com o banco de dados";
	include_once ("_cabecalho.php");
?>

<!------------------------- Código do script ------------------------>

<?php
	require ("_definicoes.php");
	
	if (isset($_POST['servername']))
		$_SESSION['servername'] = $_POST['servername'];
	
	if (isset($_POST['databasename']))
		$_SESSION['databasename'] = $_POST['databasename'];
	
	if (isset($_POST['username']))
		$_SESSION['username'] = $_POST['username'];
	
	if (isset($_POST['password']))
		$_SESSION['password'] = $_POST['password'];
	
	if (isset($_POST['sgbd']))
		$_SESSION['sgbd'] = $_POST['sgbd'];
	

	if (isset($_SESSION['servername']))
		$servername = $_SESSION['servername'];
	else
		$servername = 'localhost';
	
	if (isset($_SESSION['databasename']))
		$databasename = $_SESSION['databasename'];
	else
		$databasename = '';
	
	if (isset($_SESSION['username']))
		$username = $_SESSION['username'];
	else
		$username = 'root';
	
	if (isset($_SESSION['password']))
		$password = $_SESSION['password'];
	else
		$password = '';
	
	if (isset($_SESSION['sgbd']))
		$sgbd = $_SESSION['sgbd'];
	else
		$sgbd = 'mysql';
	 
	try 
	{
		if (isset($_POST['databasename']))
		{
			if (isset($conn))
				$conn->close();
			$conn = new PDO("$sgbd:host=$servername;dbname=$databasename", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn = null;
			echo "<p>";
			echo "Projeto <b>" . $_SESSION['project'] . "</b> selecionado na área de trabalho. ";
			echo "Conectado ao banco de dados <b>" . $_SESSION['databasename'] . "</b>";
			echo "</p>";
		}
		else
		{
			echo "<p>";
			echo "Projeto <b>" . $_SESSION['project'] . "</b> selecionado na área de trabalho. ";
			if (isset($_SESSION['databasename']))
				echo "Conectado ao banco de dados <b>" . $_SESSION['databasename'] . ".</b>";
			else
				echo "Nenhuma conexão com banco de dados ativa no momento.";
			echo "</p>";
		}
	} 
	catch(PDOException $e) 
	{
		$_SESSION['databasename'] = "";
		echo "<div class='alert alert-danger alert-dismissible'>";
        echo "<button type='button' class='close' data-dismiss='alert' aria-hIDden='true'>×</button>";
        echo "<h4><i class='icon fa fa-info'></i> Erro!</h4>";
        echo $e->getMessage();
        echo "</div>";
	}
?>    

<div class="card">
 	<div class="card-header">
    	Dados para conexão
 	</div>
  
  	<form action = "conexao.php" method = "post">
		<div class="card-body">
	    
	    	<div class="form-row">
				<div class="col-md-4 mb-3">
					 <label for="servername">Servidor</label>
					 <input type="text" class="form-control" id="servername" name="servername" value="<?php echo $servername; ?>" required autofocus>
				</div>
				<div class="col-md-2 mb-3">
					<label for="databasename">Banco de dados</label>
					<input type="text" class="form-control" id="databasename" name="databasename" value="<?php echo $databasename; ?>" required>
				</div>
				<div class="col-md-2 mb-6">
					<label for="username">Usuário</label>
					<input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required>
				</div>
				<div class="col-md-2 mb-6">
					<label for="password">Senha</label>
					<input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
				</div>
				<div class="col-md-2 mb-6">
					<label for="sgbd">SGBD PDO</label>
					<select class="form-control" id="sgbd" name="sgbd">
						<option value='mysql'>mysql</option>
						<!--option value='pgsql'>pgsql</option-->
					</select>
				</div>
			</div>
	  	</div>

		<div class="card-footer">
	    	<button class="btn btn-primary" type="submit"><i class="fas fa-database"></i> Conectar</button>
	 	</div>
  
	</form>

</div>

<!------------------------------------------------------------------->

<?php 
 	include_once ("_rodape.php");
?>