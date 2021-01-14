<?php

namespace App\Http\Controllers\cadastros;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pacientes;
use Redirect;
use Session;
use Exception;

class pacientesController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/pacientes");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$pacientes = pacientes::findorfail($request->id);
			$nome = $pacientes->descricao;

			DB::beginTransaction();
			$pacientes->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/pacientes");
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
			$pacientes = pacientes::findorfail($request->id);
			return view('cadastros.pacientes.excluir', ['pacientes' => $pacientes]);
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
			$pacientes = pacientes::findorfail($request->id);
			
			$pacientes->id_cli = $request->id_cli;
			$pacientes->id_ = $request->id_;
			$pacientes->cpf = $request->cpf;
			$pacientes->nome = $request->nome;

			DB::beginTransaction();
			$pacientes->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/pacientes");
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
			$pacientes = pacientes::findorfail($request->id);
			return view('cadastros.pacientes.alterar', ['pacientes' => $pacientes]);
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
			$pacientes = pacientes::findorfail($request->id);
			return view('cadastros.pacientes.consultar', ['pacientes' => $pacientes]);
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
			$pacientes = new pacientes();
			
			$pacientes->id_cli = $request->id_cli;
			$pacientes->id_ = $request->id_;
			$pacientes->cpf = $request->cpf;
			$pacientes->nome = $request->nome;

			DB::beginTransaction();
			$pacientes->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/pacientes");
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
		return view('cadastros.pacientes.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$pacientes = pacientes::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$pacientes = pacientes::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('cadastros.pacientes.listagem', ['pacientes' => $pacientes, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
