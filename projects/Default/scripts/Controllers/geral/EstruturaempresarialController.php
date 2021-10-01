<?php

namespace App\Http\Controllers\geral;

use App\Http\Controllers\GlobalController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Estruturaempresarial;
use App\Services\EstruturaempresarialService;
use Redirect;
use Session;
use Exception;

class EstruturaempresarialController extends GlobalController
{
	private $estruturaempresarialService;

	function __construct() 
	{
    	$this->estruturaempresarialService = new EstruturaempresarialService();    
    }


    public function pesquisar(Request $request)
    {
        $this->estruturaempresarialService->pesquisar($request);

        return Redirect::to("/estruturaempresarial");
    }
    
    public function excluindo(Request $request)
	{
		$this->validausuario();

		if ($this->estruturaempresarialService->excluindo($request))
			return Redirect::to("/estruturaempresarial");
		else
			return back()->withInput();
	}

	public function excluir(Request $request)
	{
		$this->validausuario();

		$estruturaempresarial = $this->estruturaempresarialService->excluir($request);

		if (isset($estruturaempresarial))
			return view('geral.estruturaempresarial.excluir', ['estruturaempresarial' => $estruturaempresarial]);
		else
			return back()->withInput();
	}

	public function alterando(Request $request)
	{
		$this->validausuario();

		if ($this->estruturaempresarialService->alterando($request))
			return Redirect::to("/estruturaempresarial");
		else
			return back()->withInput();
	}

	public function alterar(Request $request)
	{
		$this->validausuario();

		$estruturaempresarial = $this->estruturaempresarialService->alterar($request);

		if (isset($estruturaempresarial))
			return view('geral.estruturaempresarial.alterar', ['estruturaempresarial' => $estruturaempresarial]);
		else
			return back()->withInput();
	}

	public function consultar(Request $request)
	{
		$this->validausuario();

		$estruturaempresarial = $this->estruturaempresarialService->consultar($request);

		if (isset($estruturaempresarial))
			return view('geral.estruturaempresarial.consultar', ['estruturaempresarial' => $estruturaempresarial]);
		else
			return back()->withInput();
	}

	public function incluindo(Request $request)
	{
		$this->validausuario();

		if ($this->estruturaempresarialService->incluindo($request))
			return Redirect::to("/estruturaempresarial");
		else
			return back()->withInput();
	}

	public function incluir()
	{
		$this->validausuario();

		$estruturaempresarial = $this->estruturaempresarialService->incluir();

		if (isset($estruturaempresarial))
			return view('geral.estruturaempresarial.incluir', ['estruturaempresarial' => $estruturaempresarial]);
		else
			return back()->withInput();
	}

	public function index()
	{
		$this->validausuario();

		$parametros = $this->estruturaempresarialService->index();

		return view('geral.estruturaempresarial.index', $parametros);
	}
}
