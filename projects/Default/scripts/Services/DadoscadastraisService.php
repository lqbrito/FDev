<?php

namespace App\Services;

use App\Services\GlobalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dadoscadastrais;
use Redirect;
use Session;
use Exception;

class DadoscadastraisService extends GlobalService
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
    }
    
    public function excluindo(Request $request)
	{
		try
		{	
			$dadoscadastrais = Dadoscadastrais::findorfail($request->id);

			$nome = $dadoscadastrais->descricao;

			DB::beginTransaction();
			$dadoscadastrais->delete();
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
			$dadoscadastrais = Dadoscadastrais::findorfail($request->id);

			return $dadoscadastrais;
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
			$dadoscadastrais = Dadoscadastrais::findorfail($request->id);
			
			$dadoscadastrais->endereco = $request->endereco;
			$dadoscadastrais->numero = $request->numero;
			$dadoscadastrais->quadra = $request->quadra;
			$dadoscadastrais->lote = $request->lote;
			$dadoscadastrais->complemento = $request->complemento;
			$dadoscadastrais->bairro = $request->bairro;
			$dadoscadastrais->cep = $request->cep;
			$dadoscadastrais->idcidade = $request->idcidade;
			$dadoscadastrais->avatar = $request->avatar;

			DB::beginTransaction();
			$dadoscadastrais->save();
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
			$dadoscadastrais = Dadoscadastrais::findorfail($request->id);

			return $dadoscadastrais;
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
			$dadoscadastrais = Dadoscadastrais::findorfail($request->id);

			return $dadoscadastrais;
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
			$dadoscadastrais = new Dadoscadastrais();
			
			$dadoscadastrais->endereco = $request->endereco;
			$dadoscadastrais->numero = $request->numero;
			$dadoscadastrais->quadra = $request->quadra;
			$dadoscadastrais->lote = $request->lote;
			$dadoscadastrais->complemento = $request->complemento;
			$dadoscadastrais->bairro = $request->bairro;
			$dadoscadastrais->cep = $request->cep;
			$dadoscadastrais->idcidade = $request->idcidade;
			$dadoscadastrais->avatar = $request->avatar;

			DB::beginTransaction();
			$dadoscadastrais->save();
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
			$dadoscadastrais = new Dadoscadastrais();

			// Insira aqui os valores para atributos que possuem valor padrão

			return $dadoscadastrais;
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
			$dadoscadastrais = Dadoscadastrais::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$dadoscadastrais = Dadoscadastrais::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return ['dadoscadastrais' => $dadoscadastrais, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca];
	}
}
