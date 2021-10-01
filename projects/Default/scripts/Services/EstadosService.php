<?php

namespace App\Services;

use App\Services\GlobalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Estados;
use Redirect;
use Session;
use Exception;

class EstadosService extends GlobalService
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
    }
    
    public function excluindo(Request $request)
	{
		try
		{	
			$estados = Estados::findorfail($request->id);

			$nome = $estados->descricao;

			DB::beginTransaction();
			$estados->delete();
	        DB::commit();

	        Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");

	        return true;
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();

			Session::Flash('Erro', $e->getMessage());

			return false;
		}
	}

	public function excluir(Request $request)
	{
		try
		{	
			$estados = Estados::findorfail($request->id);

			return $estados;
		} 
		catch (\Exception $e) 
		{
			report($e);

			Session::Flash('Erro', $e->getMessage());

			return null;
		}
	}

	public function alterando(Request $request)
	{
		try
		{	
			$estados = Estados::findorfail($request->id);
			
			$estados->estado = $request->estado;
			$estados->sigla = $request->sigla;

			DB::beginTransaction();
			$estados->save();
	        DB::commit();

	        $nome = $request->descricao;

	        Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");

	        return true;
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();

			Session::Flash('Erro', $e->getMessage());

			return false;
		}
	}

	public function alterar(Request $request)
	{
		try
		{	
			$estados = Estados::findorfail($request->id);

			return $estados;
		} 
		catch (\Exception $e) 
		{
			report($e);

			Session::Flash('Erro', $e->getMessage());

			return null;
		}
	}

	public function consultar(Request $request)
	{
		try
		{	
			$estados = Estados::findorfail($request->id);

			return $estados;
		} 
		catch (\Exception $e) 
		{
			report($e);

			Session::Flash('Erro', $e->getMessage());

			return null;
		}
	}

	public function incluindo(Request $request)
	{
		try
		{	
			$estados = new Estados();
			
			$estados->estado = $request->estado;
			$estados->sigla = $request->sigla;

			DB::beginTransaction();
			$estados->save();
	        DB::commit();

	        $nome = $request->descricao;

	        Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");

	        return true;
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();

			Session::Flash('Erro', $e->getMessage());

			return false;
		}
	}

	public function incluir()
	{
		try
		{
			$estados = new Estados();

			// Insira aqui os valores para atributos que possuem valor padrão

			return $estados;
		} 
		catch (\Exception $e) 
		{
			report($e);
			DB::rollBack();

			Session::Flash('Erro', $e->getMessage());
			
			return null;
		}
	}

	public function index()
	{
		$idempresa = Session::get('idempresa');
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$estados = Estados::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$estados = Estados::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return ['estados' => $estados, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca];
	}
}
