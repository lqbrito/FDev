<?php

namespace App\Http\Controllers\[namespace];

use App\Http\Controllers\GlobalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\[nome_classe_model];
use App\Services\[nome_classe_service]Service;
use Redirect;
use Session;
use Exception;

class [nome_classe_controller]Controller extends GlobalController
{
	private $[nome_service]Service;

	function __construct() 
	{
    	$this->[nome_service]Service = new [nome_classe_service]Service();    
    }


    public function pesquisar(Request $request)
    {
        $this->[nome_service]Service->pesquisar($request);

        return Redirect::to("/[nome_controller]");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();

		if ($this->[nome_service]Service->excluindo($request))
			return Redirect::to("/[nome_controller]");
		else
			return back()->withInput();
	}

	public function excluir(Request $request)
	{
		$this->validausuario();

		$[nome_model] = $this->[nome_service]Service->excluir($request);

		if (isset($[nome_model]))
			return view('[namespace].[nome_model].excluir', ['[nome_model]' => $[nome_model]]);
		else
			return back()->withInput();
	}

	public function alterando(Request $request)
	{
		$this->validausuario();

		if ($this->[nome_service]Service->alterando($request))
			return Redirect::to("/[nome_controller]");
		else
			return back()->withInput();
	}

	public function alterar(Request $request)
	{
		$this->validausuario();

		$[nome_model] = $this->[nome_service]Service->alterar($request);

		if (isset($[nome_model]))
			return view('[namespace].[nome_model].alterar', ['[nome_model]' => $[nome_model]]);
		else
			return back()->withInput();
	}

	public function consultar(Request $request)
	{
		$this->validausuario();

		$[nome_model] = $this->[nome_service]Service->consultar($request);

		if (isset($[nome_model]))
			return view('[namespace].[nome_model].consultar', ['[nome_model]' => $[nome_model]]);
		else
			return back()->withInput();
	}

	public function incluindo(Request $request)
	{
		$this->validausuario();

		if ($this->[nome_service]Service->incluindo($request))
			return Redirect::to("/[nome_controller]");
		else
			return back()->withInput();
	}

	public function incluir()
	{
		$this->validausuario();

		$[nome_model] = $this->[nome_service]Service->incluir();

		if (isset($[nome_model]))
			return view('[namespace].[nome_model].incluir', ['[nome_model]' => $[nome_model]]);
		else
			return back()->withInput();
	}

	public function index()
	{
		$this->validausuario();

		$parametros = $this->[nome_service]Service->index();

		return view('[namespace].[nome_model].index', $parametros);
	}
}
