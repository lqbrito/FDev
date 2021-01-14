<?php

namespace App\Http\Controllers\equipamentos;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\inventario;
use Redirect;
use Session;
use Exception;

class inventarioController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/inventario");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$inventario = inventario::findorfail($request->id);
			$nome = $inventario->descricao;

			DB::beginTransaction();
			$inventario->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/inventario");
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();			
			Session::Flash('Erro', $e->getMessage());
			return back()->withInput();
		}
	}

	public function excluir(Request $request)
	{
		$this->validausuario();
		try
		{	
			$inventario = inventario::findorfail($request->id);
			return view('equipamentos.inventario.excluir', ['inventario' => $inventario]);
		} 
		catch (\Exception $e) 
		{
			report($e);
			Session::Flash('Erro', $e->getMessage());
			return back()->withInput();
		}
	}

	public function alterando(Request $request)
	{
		$this->validausuario();
		try
		{	
			$inventario = inventario::findorfail($request->id);
			
			$inventario->id_cli = $request->id_cli;
			$inventario->id_equipamento = $request->id_equipamento;
			$inventario->id_ = $request->id_;
			$inventario->data_inicio = $request->data_inicio;
			$inventario->hora_inicio = $request->hora_inicio;
			$inventario->data_fim = $request->data_fim;
			$inventario->hora_fim = $request->hora_fim;
			$inventario->id_usuario_responsavel = $request->id_usuario_responsavel;
			$inventario->id_lancamento = $request->id_lancamento;
			$inventario->id_departamento = $request->id_departamento;
			$inventario->id_tpestado = $request->id_tpestado;
			$inventario->concluida = $request->concluida;
			$inventario->custo_materiais = $request->custo_materiais;
			$inventario->custo_servicos = $request->custo_servicos;
			$inventario->id_agente_servico_interno = $request->id_agente_servico_interno;
			$inventario->id_agente_servico_externo = $request->id_agente_servico_externo;
			$inventario->observacoes = $request->observacoes;

			DB::beginTransaction();
			$inventario->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/inventario");
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();			
			Session::Flash('Erro', $e->getMessage());
			return back()->withInput();
		}
	}

	public function alterar(Request $request)
	{
		$this->validausuario();
		try
		{	
			$inventario = inventario::findorfail($request->id);
			return view('equipamentos.inventario.alterar', ['inventario' => $inventario]);
		} 
		catch (\Exception $e) 
		{
			report($e);
			Session::Flash('Erro', $e->getMessage());
			return back()->withInput();
		}
	}

	public function consultar(Request $request)
	{
		$this->validausuario();
		try
		{	
			$inventario = inventario::findorfail($request->id);
			return view('equipamentos.inventario.consultar', ['inventario' => $inventario]);
		} 
		catch (\Exception $e) 
		{
			report($e);
			Session::Flash('Erro', $e->getMessage());
			return back()->withInput();
		}
	}

	public function incluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$inventario = new inventario();
			
			$inventario->id_cli = $request->id_cli;
			$inventario->id_equipamento = $request->id_equipamento;
			$inventario->id_ = $request->id_;
			$inventario->data_inicio = $request->data_inicio;
			$inventario->hora_inicio = $request->hora_inicio;
			$inventario->data_fim = $request->data_fim;
			$inventario->hora_fim = $request->hora_fim;
			$inventario->id_usuario_responsavel = $request->id_usuario_responsavel;
			$inventario->id_lancamento = $request->id_lancamento;
			$inventario->id_departamento = $request->id_departamento;
			$inventario->id_tpestado = $request->id_tpestado;
			$inventario->concluida = $request->concluida;
			$inventario->custo_materiais = $request->custo_materiais;
			$inventario->custo_servicos = $request->custo_servicos;
			$inventario->id_agente_servico_interno = $request->id_agente_servico_interno;
			$inventario->id_agente_servico_externo = $request->id_agente_servico_externo;
			$inventario->observacoes = $request->observacoes;

			DB::beginTransaction();
			$inventario->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/inventario");
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();			
			Session::Flash('Erro', $e->getMessage());
			return back()->withInput();
		}
	}

	public function incluir()
	{
		$this->validausuario();
		return view('equipamentos.inventario.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$inventario = inventario::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$inventario = inventario::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('equipamentos.inventario.listagem', ['inventario' => $inventario, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
