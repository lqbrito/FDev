<?php

namespace App\Http\Controllers\equipamentos;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\equipamentos;
use Redirect;
use Session;
use Exception;

class equipamentosController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/equipamentos");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$equipamentos = equipamentos::findorfail($request->id);
			$nome = $equipamentos->descricao;

			DB::beginTransaction();
			$equipamentos->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/equipamentos");
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
			$equipamentos = equipamentos::findorfail($request->id);
			return view('equipamentos.equipamentos.excluir', ['equipamentos' => $equipamentos]);
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
			$equipamentos = equipamentos::findorfail($request->id);
			
			$equipamentos->id_cli = $request->id_cli;
			$equipamentos->id_ = $request->id_;
			$equipamentos->codigo_interno = $request->codigo_interno;
			$equipamentos->nome_tecnico = $request->nome_tecnico;
			$equipamentos->nome_comercial = $request->nome_comercial;
			$equipamentos->foto = $request->foto;
			$equipamentos->modelo = $request->modelo;
			$equipamentos->ano_fabricacao = $request->ano_fabricacao;
			$equipamentos->nro_serie = $request->nro_serie;
			$equipamentos->nro_lote = $request->nro_lote;
			$equipamentos->id_tpequipamento = $request->id_tpequipamento;
			$equipamentos->id_fabricante = $request->id_fabricante;
			$equipamentos->id_tpaquisicao = $request->id_tpaquisicao;
			$equipamentos->id_fornecedor = $request->id_fornecedor;
			$equipamentos->id_tpuso = $request->id_tpuso;
			$equipamentos->id_tpestado = $request->id_tpestado;
			$equipamentos->data_hora_estado_atual = $request->data_hora_estado_atual;
			$equipamentos->id_departamento = $request->id_departamento;
			$equipamentos->periodicidade_manutencoes = $request->periodicidade_manutencoes;
			$equipamentos->condicao = $request->condicao;
			$equipamentos->temperatura_media = $request->temperatura_media;
			$equipamentos->temperatura_minima = $request->temperatura_minima;
			$equipamentos->temperatura_maxima = $request->temperatura_maxima;
			$equipamentos->umidade_media = $request->umidade_media;
			$equipamentos->umidade_minima = $request->umidade_minima;
			$equipamentos->umidade_maxima = $request->umidade_maxima;
			$equipamentos->preco = $request->preco;
			$equipamentos->observacoes = $request->observacoes;

			DB::beginTransaction();
			$equipamentos->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/equipamentos");
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
			$equipamentos = equipamentos::findorfail($request->id);
			return view('equipamentos.equipamentos.alterar', ['equipamentos' => $equipamentos]);
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
			$equipamentos = equipamentos::findorfail($request->id);
			return view('equipamentos.equipamentos.consultar', ['equipamentos' => $equipamentos]);
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
			$equipamentos = new equipamentos();
			
			$equipamentos->id_cli = $request->id_cli;
			$equipamentos->id_ = $request->id_;
			$equipamentos->codigo_interno = $request->codigo_interno;
			$equipamentos->nome_tecnico = $request->nome_tecnico;
			$equipamentos->nome_comercial = $request->nome_comercial;
			$equipamentos->foto = $request->foto;
			$equipamentos->modelo = $request->modelo;
			$equipamentos->ano_fabricacao = $request->ano_fabricacao;
			$equipamentos->nro_serie = $request->nro_serie;
			$equipamentos->nro_lote = $request->nro_lote;
			$equipamentos->id_tpequipamento = $request->id_tpequipamento;
			$equipamentos->id_fabricante = $request->id_fabricante;
			$equipamentos->id_tpaquisicao = $request->id_tpaquisicao;
			$equipamentos->id_fornecedor = $request->id_fornecedor;
			$equipamentos->id_tpuso = $request->id_tpuso;
			$equipamentos->id_tpestado = $request->id_tpestado;
			$equipamentos->data_hora_estado_atual = $request->data_hora_estado_atual;
			$equipamentos->id_departamento = $request->id_departamento;
			$equipamentos->periodicidade_manutencoes = $request->periodicidade_manutencoes;
			$equipamentos->condicao = $request->condicao;
			$equipamentos->temperatura_media = $request->temperatura_media;
			$equipamentos->temperatura_minima = $request->temperatura_minima;
			$equipamentos->temperatura_maxima = $request->temperatura_maxima;
			$equipamentos->umidade_media = $request->umidade_media;
			$equipamentos->umidade_minima = $request->umidade_minima;
			$equipamentos->umidade_maxima = $request->umidade_maxima;
			$equipamentos->preco = $request->preco;
			$equipamentos->observacoes = $request->observacoes;

			DB::beginTransaction();
			$equipamentos->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/equipamentos");
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
		return view('equipamentos.equipamentos.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$equipamentos = equipamentos::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$equipamentos = equipamentos::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('equipamentos.equipamentos.listagem', ['equipamentos' => $equipamentos, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
