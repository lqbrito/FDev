<?php

namespace App\Http\Controllers\cadastros;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\documentossgq;
use Redirect;
use Session;
use Exception;

class documentossgqController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/documentossgq");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$documentossgq = documentossgq::findorfail($request->id);
			$nome = $documentossgq->descricao;

			DB::beginTransaction();
			$documentossgq->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/documentossgq");
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
			$documentossgq = documentossgq::findorfail($request->id);
			return view('cadastros.documentossgq.excluir', ['documentossgq' => $documentossgq]);
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
			$documentossgq = documentossgq::findorfail($request->id);
			
			$documentossgq->id_cli = $request->id_cli;
			$documentossgq->id_ = $request->id_;
			$documentossgq->descricao = $request->descricao;
			$documentossgq->id_tpdocumentossgq = $request->id_tpdocumentossgq;
			$documentossgq->nomedoc = $request->nomedoc;
			$documentossgq->localizacao_documentacao = $request->localizacao_documentacao;

			DB::beginTransaction();
			$documentossgq->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/documentossgq");
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
			$documentossgq = documentossgq::findorfail($request->id);
			return view('cadastros.documentossgq.alterar', ['documentossgq' => $documentossgq]);
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
			$documentossgq = documentossgq::findorfail($request->id);
			return view('cadastros.documentossgq.consultar', ['documentossgq' => $documentossgq]);
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
			$documentossgq = new documentossgq();
			
			$documentossgq->id_cli = $request->id_cli;
			$documentossgq->id_ = $request->id_;
			$documentossgq->descricao = $request->descricao;
			$documentossgq->id_tpdocumentossgq = $request->id_tpdocumentossgq;
			$documentossgq->nomedoc = $request->nomedoc;
			$documentossgq->localizacao_documentacao = $request->localizacao_documentacao;

			DB::beginTransaction();
			$documentossgq->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/documentossgq");
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
		return view('cadastros.documentossgq.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$documentossgq = documentossgq::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$documentossgq = documentossgq::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('cadastros.documentossgq.listagem', ['documentossgq' => $documentossgq, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
