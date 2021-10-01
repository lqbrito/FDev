<?php

namespace App\Http\Controllers\geral;

use App\Http\Controllers\GlobalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Estados;
use App\Services\EstadosService;
use Redirect;
use Session;
use Exception;

class EstadosController extends GlobalController
{
	private $estadosService;

	function __construct() 
	{
    	$this->estadosService = new EstadosService();    
    }


    public function pesquisar(Request $request)
    {
        $this->estadosService->pesquisar($request);

        return Redirect::to("/estados");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();

		if ($this->estadosService->excluindo($request))
			return Redirect::to("/estados");
		else
			return back()->withInput();
	}

	public function excluir(Request $request)
	{
		$this->validausuario();

		$estados = $this->estadosService->excluir($request);

		if (isset($estados))
			return view('geral.estados.excluir', ['estados' => $estados]);
		else
			return back()->withInput();
	}

	public function alterando(Request $request)
	{
		$this->validausuario();

		if ($this->estadosService->alterando($request))
			return Redirect::to("/estados");
		else
			return back()->withInput();
	}

	public function alterar(Request $request)
	{
		$this->validausuario();

		$estados = $this->estadosService->alterar($request);

		if (isset($estados))
			return view('geral.estados.alterar', ['estados' => $estados]);
		else
			return back()->withInput();
	}

	public function consultar(Request $request)
	{
		$this->validausuario();

		$estados = $this->estadosService->consultar($request);

		if (isset($estados))
			return view('geral.estados.consultar', ['estados' => $estados]);
		else
			return back()->withInput();
	}

	public function incluindo(Request $request)
	{
		$this->validausuario();

		if ($this->estadosService->incluindo($request))
			return Redirect::to("/estados");
		else
			return back()->withInput();
	}

	public function incluir()
	{
		$this->validausuario();

		$estados = $this->estadosService->incluir();

		if (isset($estados))
			return view('geral.estados.incluir', ['estados' => $estados]);
		else
			return back()->withInput();
	}

	public function index()
	{
		$this->validausuario();

		$parametros = $this->estadosService->index();

		return view('geral.estados.index', $parametros);
	}
}
