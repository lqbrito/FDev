<?php
    include_once('../parent/view.php');

    class excluirView extends View
    {
        public function view($data)
        {
            $pag = 0;
            $tpaquisicoes = $data['tpaquisicoes'];
            $titulo = "Exclusão de tpaquisicoes";
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
                        
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="row">
                                        <dt class='col-sm-2 text-right'>id</dt>
                                        <dd class='col-sm-10'><?php echo $tpaquisicoes['id']; ?></dd>
                                        <dt class='col-sm-2 text-right'>id_cli</dt>
                                        <dd class='col-sm-10'><?php echo $tpaquisicoes['id_cli']; ?></dd>
                                        <dt class='col-sm-2 text-right'>id_</dt>
                                        <dd class='col-sm-10'><?php echo $tpaquisicoes['id_']; ?></dd>
                                        <dt class='col-sm-2 text-right'>descricao</dt>
                                        <dd class='col-sm-10'><?php echo $tpaquisicoes['descricao']; ?></dd>
                                        <dt class='col-sm-2 text-right'>created_at</dt>
                                        <dd class='col-sm-10'><?php echo $tpaquisicoes['created_at']; ?></dd>
                                        <dt class='col-sm-2 text-right'>updated_at</dt>
                                        <dd class='col-sm-10'><?php echo $tpaquisicoes['updated_at']; ?></dd>
                                    </dl>
                                </div>
                            </div>

                            <form action='../controllers/tpaquisicoes.php' method="post">

                                <input type = "hidden" name = "operacao" value = "action/excluir">
                                <input type = "hidden" name = "id" value = "<?php echo $tpaquisicoes['id']; ?>">
                                <input type = "hidden" name = "csrf" value = "<?php echo $this->csrf()?>">

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir</button>
                                        <a href="../controllers/tpaquisicoes.php" class="btn btn-default" title="Fechar'"><i class="fas fa-undo"></i> Cancelar</i></a>
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