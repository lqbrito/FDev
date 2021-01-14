<?php

namespace App\Http\Controllers\tipos;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tpfalhas;
use Redirect;
use Session;
use Exception;

class tpfalhasController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/tpfalhas");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$tpfalhas = tpfalhas::findorfail($request->id);
			$nome = $tpfalhas->descricao;

			DB::beginTransaction();
			$tpfalhas->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpfalhas");
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
			$tpfalhas = tpfalhas::findorfail($request->id);
			return view('tipos.tpfalhas.excluir', ['tpfalhas' => $tpfalhas]);
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
			$tpfalhas = tpfalhas::findorfail($request->id);
			
			$tpfalhas->id_cli = $request->id_cli;
			$tpfalhas->id_ = $request->id_;
			$tpfalhas->descricao = $request->descricao;

			DB::beginTransaction();
			$tpfalhas->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/tpfalhas");
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
			$tpfalhas = tpfalhas::findorfail($request->id);
			return view('tipos.tpfalhas.alterar', ['tpfalhas' => $tpfalhas]);
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
			$tpfalhas = tpfalhas::findorfail($request->id);
			return view('tipos.tpfalhas.consultar', ['tpfalhas' => $tpfalhas]);
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
			$tpfalhas = new tpfalhas();
			
			$tpfalhas->id_cli = $request->id_cli;
			$tpfalhas->id_ = $request->id_;
			$tpfalhas->descricao = $request->descricao;

			DB::beginTransaction();
			$tpfalhas->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/tpfalhas");
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
		return view('tipos.tpfalhas.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$tpfalhas = tpfalhas::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$tpfalhas = tpfalhas::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('tipos.tpfalhas.listagem', ['tpfalhas' => $tpfalhas, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
