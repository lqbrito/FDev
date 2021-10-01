<?php

namespace App\Services;

use App\Services\GlobalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\[nome_classe_model];
use Redirect;
use Session;
use Exception;

class [nome_classe_service]Service extends GlobalService
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
    }
    
    public function excluindo(Request $request)
	{
		try
		{	
			$[nome_model] = [nome_classe_model]::findorfail($request->id);

			$nome = $[nome_model]->descricao;

			DB::beginTransaction();
			$[nome_model]->delete();
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
			$[nome_model] = [nome_classe_model]::findorfail($request->id);

			return $[nome_model];
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
			$[nome_model] = [nome_classe_model]::findorfail($request->id);
			
			[nome_campo]

			DB::beginTransaction();
			$[nome_model]->save();
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
			$[nome_model] = [nome_classe_model]::findorfail($request->id);

			return $[nome_model];
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
			$[nome_model] = [nome_classe_model]::findorfail($request->id);

			return $[nome_model];
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
			$[nome_model] = new [nome_classe_model]();
			
			[nome_campo]

			DB::beginTransaction();
			$[nome_model]->save();
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
			$[nome_model] = new [nome_classe_model]();

			// Insira aqui os valores para atributos que possuem valor padrão

			return $[nome_model];
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
			$[nome_model] = [nome_classe_model]::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$[nome_model] = [nome_classe_model]::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return ['[nome_model]' => $[nome_model], 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca];
	}
}
