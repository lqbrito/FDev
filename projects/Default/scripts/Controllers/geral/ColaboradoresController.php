<?php

namespace App\Http\Controllers\geral;

use App\Http\Controllers\GlobalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Colaboradores;
use App\Services\ColaboradoresService;
use Redirect;
use Session;
use Exception;

class ColaboradoresController extends GlobalController
{
	private $colaboradoresService;

	function __construct() 
	{
    	$this->colaboradoresService = new ColaboradoresService();    
    }


    public function pesquisar(Request $request)
    {
        $this->colaboradoresService->pesquisar($request);

        return Redirect::to("/colaboradores");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();

		if ($this->colaboradoresService->excluindo($request))
			return Redirect::to("/colaboradores");
		else
			return back()->withInput();
	}

	public function excluir(Request $request)
	{
		$this->validausuario();

		$colaboradores = $this->colaboradoresService->excluir($request);

		if (isset($colaboradores))
			return view('geral.colaboradores.excluir', ['colaboradores' => $colaboradores]);
		else
			return back()->withInput();
	}

	public function alterando(Request $request)
	{
		$this->validausuario();

		if ($this->colaboradoresService->alterando($request))
			return Redirect::to("/colaboradores");
		else
			return back()->withInput();
	}

	public function alterar(Request $request)
	{
		$this->validausuario();

		$colaboradores = $this->colaboradoresService->alterar($request);

		if (isset($colaboradores))
			return view('geral.colaboradores.alterar', ['colaboradores' => $colaboradores]);
		else
			return back()->withInput();
	}

	public function consultar(Request $request)
	{
		$this->validausuario();

		$colaboradores = $this->colaboradoresService->consultar($request);

		if (isset($colaboradores))
			return view('geral.colaboradores.consultar', ['colaboradores' => $colaboradores]);
		else
			return back()->withInput();
	}

	public function incluindo(Request $request)
	{
		$this->validausuario();

		if ($this->colaboradoresService->incluindo($request))
			return Redirect::to("/colaboradores");
		else
			return back()->withInput();
	}

	public function incluir()
	{
		$this->validausuario();

		$colaboradores = $this->colaboradoresService->incluir();

		if (isset($colaboradores))
			return view('geral.colaboradores.incluir', ['colaboradores' => $colaboradores]);
		else
			return back()->withInput();
	}

	public function index()
	{
		$this->validausuario();

		$parametros = $this->colaboradoresService->index();

		return view('geral.colaboradores.index', $parametros);
	}
}
