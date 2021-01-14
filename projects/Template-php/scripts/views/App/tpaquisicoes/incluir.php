<?php
    include_once('../parent/view.php');

    class incluirView extends View
    {
        public function view($data)
        {
            $pag = 0;
            $tpaquisicoes = $data['tpaquisicoes'];
            $titulo = "Inclusão de tpaquisicoes";
            include_once ("../views/layouts/" . $_SESSION['app_ui'] . "_cabecalho.php");
            $this->showMessage();
            ?>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $titulo; ?>
                        </div>

                        <div class="card-body">
                        
                            <form action='../controllers/tpaquisicoes.php' method="post">
                                <input type = "hidden" name = "operacao" value = "action/incluir">
                                <input type = "hidden" name = "csrf" value = "<?php echo $this->csrf()?>">
                                
                                <div class='row'>
                                	<div class='form-group col-6'>
                                		<label class='bmd-label-floating' for='id_cli'>id_cli</label>
                                		<input type='number' class='form-control' id='id_cli' name='id_cli' required='true' autofocus value="<?php echo $tpaquisicoes['id_cli']; ?>">
                                	</div>
                                </div>
                                <div class='row'>
                                	<div class='form-group col-6'>
                                		<label class='bmd-label-floating' for='id_'>id_</label>
                                		<input type='number' class='form-control' id='id_' name='id_' required='true' value="<?php echo $tpaquisicoes['id_']; ?>">
                                	</div>
                                </div>
                                <div class='row'>
                                	<div class='form-group col-6'>
                                		<label class='bmd-label-floating' for='descricao'>descricao</label>
                                		<input type='text' class='form-control' id='descricao' name='descricao' maxlength='50' required='true' value="<?php echo $tpaquisicoes['descricao']; ?>">
                                	</div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                                        <a href="../controllers/tpaquisicoes.php" class="btn btn-light" title="Fechar'"><i class="fas fa-undo"></i> Cancelar</i></a>
                                    </div>
                                </div>
                            </form>
                        
                        </div>

                    </div>
                </div>
            </div>

            <?php
            include_once ("../views/layouts/" . $_SESSION['app_ui'] . "_rodape.php");
        }
    }
?>