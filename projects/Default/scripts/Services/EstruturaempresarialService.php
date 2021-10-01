<?php

namespace App\Services;

use App\Services\GlobalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Estruturaempresarial;
use Redirect;
use Session;
use Exception;

class EstruturaempresarialService extends GlobalService
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
    }
    
    public function excluindo(Request $request)
	{
		try
		{	
			$estruturaempresarial = Estruturaempresarial::findorfail($request->id);

			$nome = $estruturaempresarial->descricao;

			DB::beginTransaction();
			$estruturaempresarial->delete();
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
			$estruturaempresarial = Estruturaempresarial::findorfail($request->id);

			return $estruturaempresarial;
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
			$estruturaempresarial = Estruturaempresarial::findorfail($request->id);
			
			$estruturaempresarial->tipo = $request->tipo;
			$estruturaempresarial->idpai = $request->idpai;
			$estruturaempresarial->nome01 = $request->nome01;
			$estruturaempresarial->nome02 = $request->nome02;
			$estruturaempresarial->idcadastro = $request->idcadastro;

			DB::beginTransaction();
			$estruturaempresarial->save();
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
			$estruturaempresarial = Estruturaempresarial::findorfail($request->id);

			return $estruturaempresarial;
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
			$estruturaempresarial = Estruturaempresarial::findorfail($request->id);

			return $estruturaempresarial;
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
			$estruturaempresarial = new Estruturaempresarial();
			
			$estruturaempresarial->tipo = $request->tipo;
			$estruturaempresarial->idpai = $request->idpai;
			$estruturaempresarial->nome01 = $request->nome01;
			$estruturaempresarial->nome02 = $request->nome02;
			$estruturaempresarial->idcadastro = $request->idcadastro;

			DB::beginTransaction();
			$estruturaempresarial->save();
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
			$estruturaempresarial = new Estruturaempresarial();

			// Insira aqui os valores para atributos que possuem valor padrão

			return $estruturaempresarial;
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
			$estruturaempresarial = Estruturaempresarial::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$estruturaempresarial = Estruturaempresarial::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return ['estruturaempresarial' => $estruturaempresarial, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca];
	}
}
