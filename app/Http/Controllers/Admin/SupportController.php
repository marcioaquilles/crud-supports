<?php

namespace App\Http\Controllers\Admin;

use App\DTO\{CreateSupportDTO, UpdateSupportDTO};
use App\Http\Requests\StoreUpdateSupport;
use App\Services\SupportService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SupportController extends Controller
{
    const MESSAGE = 'Registro não encontrado';

    public function __construct(
        protected SupportService $service,
        protected Request $request,
    ) {
    }

    public function index()
    {
        // $supports = $support->all();
        $supports = $this->service->getAll($this->request->filter);

        return view('admin.supports.index', compact('supports'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request)
    {

        // $data = $request->validate(); //Método validate pega somente os dados que foram validados.

        // $support = $support->create($data);

        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index')->with('mensagem', 'Registro adicionado com sucesso!');;
    }

    public function show(string $id)
    {
        try {
            // $supportShow = Support::findOrFail($id);
            $supportShow = $this->service->findOne($id);
            // Lógica para exibir o registro encontrado
            return view('admin.supports.show', compact('supportShow'));
        } catch (ModelNotFoundException $e) {
            // Lógica para lidar com o ID não encontrado
            return view('errors.404')->with('message', self::MESSAGE);
        }
    }

    public function edit(string $id)
    {
        // $supportEdit = $support->find($id);
        $supportEdit = $this->service->findOne($id);

        if (!$supportEdit) {
            $errorMessage = "O registro com o ID $id não foi encontrado.";
            return view('errors.404')->with('message', $errorMessage);
        }

        // Lógica para exibir o registro encontrado
        return view('admin.supports.edit', compact('supportEdit'));
    }

    // public function update(StoreUpdateSupport $request, string|int $id, Support $support)
    // {

    //     try {
    //         $support = $support->findOrFail($id);
    //         $support->update($request->only([
    //             'subject',
    //             'status',
    //             'body'
    //         ]));

    //         return redirect()->route('supports.index');
    //     } catch (ModelNotFoundException $e) {
    //         // Lógica para lidar com o ID não encontrado
    //         return view('errors.404')->with('message', self::MESSAGE);
    //     }
    // }

    public function update(StoreUpdateSupport $request)
    {
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );

        if (!$support) {
            return back();
        }

        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {
        // if (!$support = $support->find($id)) {
        //     return back();
        // }
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
