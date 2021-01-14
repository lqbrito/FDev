<?php

namespace App\Http\Controllers\cadastros;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\departamentos;
use Redirect;
use Session;
use Exception;

class departamentosController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/departamentos");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$departamentos = departamentos::findorfail($request->id);
			$nome = $departamentos->descricao;

			DB::beginTransaction();
			$departamentos->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/departamentos");
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
			$departamentos = departamentos::findorfail($request->id);
			return view('cadastros.departamentos.excluir', ['departamentos' => $departamentos]);
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
			$departamentos = departamentos::findorfail($request->id);
			
			$departamentos->id_cli = $request->id_cli;
			$departamentos->id_ = $request->id_;
			$departamentos->descricao = $request->descricao;

			DB::beginTransaction();
			$departamentos->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/departamentos");
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
			$departamentos = departamentos::findorfail($request->id);
			return view('cadastros.departamentos.alterar', ['departamentos' => $departamentos]);
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
			$departamentos = departamentos::findorfail($request->id);
			return view('cadastros.departamentos.consultar', ['departamentos' => $departamentos]);
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
			$departamentos = new departamentos();
			
			$departamentos->id_cli = $request->id_cli;
			$departamentos->id_ = $request->id_;
			$departamentos->descricao = $request->descricao;

			DB::beginTransaction();
			$departamentos->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/departamentos");
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
		return view('cadastros.departamentos.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$departamentos = departamentos::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$departamentos = departamentos::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('cadastros.departamentos.listagem', ['departamentos' => $departamentos, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
