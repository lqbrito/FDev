<?php

namespace App\Http\Controllers\cadastros;

use App\Http\Controllers\globalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\fabricantes_fornecedores;
use Redirect;
use Session;
use Exception;

class fabricantes_fornecedoresController extends globalController
{
    public function pesquisar(Request $request)
    {
        parent::pesquisar($request);
        return Redirect::to("/fabricantes_fornecedores");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();
		try
		{	
			$fabricantes_fornecedores = fabricantes_fornecedores::findorfail($request->id);
			$nome = $fabricantes_fornecedores->descricao;

			DB::beginTransaction();
			$fabricantes_fornecedores->delete();
	        DB::commit();

	        \Session::Flash('Status', "Exclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/fabricantes_fornecedores");
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
			$fabricantes_fornecedores = fabricantes_fornecedores::findorfail($request->id);
			return view('cadastros.fabricantes_fornecedores.excluir', ['fabricantes_fornecedores' => $fabricantes_fornecedores]);
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
			$fabricantes_fornecedores = fabricantes_fornecedores::findorfail($request->id);
			
			$fabricantes_fornecedores->id_cli = $request->id_cli;
			$fabricantes_fornecedores->id_ = $request->id_;
			$fabricantes_fornecedores->tipo_pessoa = $request->tipo_pessoa;
			$fabricantes_fornecedores->cpf_cnpj = $request->cpf_cnpj;
			$fabricantes_fornecedores->nome_razao_social = $request->nome_razao_social;
			$fabricantes_fornecedores->endereco = $request->endereco;
			$fabricantes_fornecedores->bairro = $request->bairro;
			$fabricantes_fornecedores->cep = $request->cep;
			$fabricantes_fornecedores->id_cidade = $request->id_cidade;
			$fabricantes_fornecedores->www = $request->www;
			$fabricantes_fornecedores->email = $request->email;
			$fabricantes_fornecedores->ddd = $request->ddd;
			$fabricantes_fornecedores->fone1 = $request->fone1;
			$fabricantes_fornecedores->fone2 = $request->fone2;
			$fabricantes_fornecedores->contato = $request->contato;
			$fabricantes_fornecedores->situacao = $request->situacao;

			DB::beginTransaction();
			$fabricantes_fornecedores->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Alteração de '$nome' realizada com sucesso");
	        return Redirect::to("/fabricantes_fornecedores");
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
			$fabricantes_fornecedores = fabricantes_fornecedores::findorfail($request->id);
			return view('cadastros.fabricantes_fornecedores.alterar', ['fabricantes_fornecedores' => $fabricantes_fornecedores]);
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
			$fabricantes_fornecedores = fabricantes_fornecedores::findorfail($request->id);
			return view('cadastros.fabricantes_fornecedores.consultar', ['fabricantes_fornecedores' => $fabricantes_fornecedores]);
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
			$fabricantes_fornecedores = new fabricantes_fornecedores();
			
			$fabricantes_fornecedores->id_cli = $request->id_cli;
			$fabricantes_fornecedores->id_ = $request->id_;
			$fabricantes_fornecedores->tipo_pessoa = $request->tipo_pessoa;
			$fabricantes_fornecedores->cpf_cnpj = $request->cpf_cnpj;
			$fabricantes_fornecedores->nome_razao_social = $request->nome_razao_social;
			$fabricantes_fornecedores->endereco = $request->endereco;
			$fabricantes_fornecedores->bairro = $request->bairro;
			$fabricantes_fornecedores->cep = $request->cep;
			$fabricantes_fornecedores->id_cidade = $request->id_cidade;
			$fabricantes_fornecedores->www = $request->www;
			$fabricantes_fornecedores->email = $request->email;
			$fabricantes_fornecedores->ddd = $request->ddd;
			$fabricantes_fornecedores->fone1 = $request->fone1;
			$fabricantes_fornecedores->fone2 = $request->fone2;
			$fabricantes_fornecedores->contato = $request->contato;
			$fabricantes_fornecedores->situacao = $request->situacao;

			DB::beginTransaction();
			$fabricantes_fornecedores->save();
	        DB::commit();

	        $nome = $request->descricao;

	        \Session::Flash('Status', "Inclusão de '$nome' realizada com sucesso");
	        return Redirect::to("/fabricantes_fornecedores");
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
		return view('cadastros.fabricantes_fornecedores.incluir');
	}

	public function index()
	{
		$this->validausuario();
		
		$textobusca = $this->buscarpesquisa();
		$listaTudo = strlen($textobusca) >= $this->tamanhoStringBusca;
		if ($listaTudo)
			$fabricantes_fornecedores = fabricantes_fornecedores::where('', '=', "")->where('', 'like', '%' . "$textobusca" . '%')->orderBy('', 'asc')->limit($this->limiteRegistros)->get();
		else
			$fabricantes_fornecedores = fabricantes_fornecedores::where('', '=', "")->orderBy('', 'asc')->paginate(10);
		
		return view('cadastros.fabricantes_fornecedores.listagem', ['fabricantes_fornecedores' => $fabricantes_fornecedores, 'listaTudo' => $listaTudo, 'tamanhoStringBusca' => $this->tamanhoStringBusca, 'textobusca' => $textobusca]);
	}
}
