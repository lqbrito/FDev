<?php

namespace App\Http\Controllers\tipos;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tpdocumentossgq;
use Redirect;
use Session;
use Exception;

class tpdocumentossgqController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/tpdocumentossgq");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$tpdocumentossgq = tpdocumentossgq::findorfail($request->id);
			$nome = $tpdocumentossgq->descricao;

			DB::beginTransaction();
			$tpdocumentossgq->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpdocumentossgq");
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
			$tpdocumentossgq = tpdocumentossgq::findorfail($request->id);
			return view('tipos.tpdocumentossgq.excluir', ['tpdocumentossgq' => $tpdocumentossgq]);
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
			$tpdocumentossgq = tpdocumentossgq::findorfail($request->id);
			
			$tpdocumentossgq->id_cli = $request->id_cli;
			$tpdocumentossgq->id_ = $request->id_;
			$tpdocumentossgq->descricao = $request->descricao;

			DB::beginTransaction();
			$tpdocumentossgq->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/tpdocumentossgq");
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
			$tpdocumentossgq = tpdocumentossgq::findorfail($request->id);
			return view('tipos.tpdocumentossgq.alterar', ['tpdocumentossgq' => $tpdocumentossgq]);
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
			$tpdocumentossgq = tpdocumentossgq::findorfail($request->id);
			return view('tipos.tpdocumentossgq.consultar', ['tpdocumentossgq' => $tpdocumentossgq]);
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
			$tpdocumentossgq = new tpdocumentossgq();
			
			$tpdocumentossgq->id_cli = $request->id_cli;
			$tpdocumentossgq->id_ = $request->id_;
			$tpdocumentossgq->descricao = $request->descricao;

			DB::beginTransaction();
			$tpdocumentossgq->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpdocumentossgq");
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
		return view('tipos.tpdocumentossgq.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$tpdocumentossgq = tpdocumentossgq::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$tpdocumentossgq = tpdocumentossgq::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('tipos.tpdocumentossgq.listagem', ['tpdocumentossgq' => $tpdocumentossgq, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
