<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
//Chamando o Inertia
use Inertia\Inertia;

class TarefaController extends Controller
{
    /**
     * Exibir uma listagem do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Tarefa/Index', [
            'tarefas' => Tarefa::all()
        ]);
    }

    /**
     * Mostre o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Return Inertia::render('Tarefa/Create');
    }

    /**
     * Armazene um recurso recém-criado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validando os dados
        $validacao = [
            'titulo' => 'required|max:255|min:3',
            'descricao' => 'required',
        ];
        $mensagens = [
            'titulo.required' => 'O campo título é obrigatório',
            'titulo.max' => 'O campo título deve ter no máximo 255 caracteres',
            'titulo.min' => 'O campo título deve ter no mínimo 3 caracteres',
            'descricao.required' => 'O campo descrição é obrigatório',
        ];
        $request->validate($validacao, $mensagens);

        //Criando a tarefa
        $tarefa = new Tarefa();
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->concluida = false;
        $tarefa->save();

        //Redirecionando para a página de listagem
        return redirect()->route('tarefa.index');
    }

    /**
     * Exiba o recurso especificado.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa, Request $request) //Rota que vai ser chamada para mostrar a tarefa
    {
        //Pegando o id da tarefa
        $id = $request->id;
        //Pegando a tarefa
        $tarefa = Tarefa::find($id);
        //Retornando a view com vue
        return Inertia::render('Tarefa/Show', [
            'tarefa' => $tarefa
        ]);
    }

    /**
     * Mostra o formulário para editar o recurso especificado.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        //Retornando a view com vue
        return Inertia::render('Tarefa/Edit', [
            'tarefas' => $tarefa
        ]);
    }

    /**
     * Atualize o recurso especificado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }

    /**
     * Remova o recurso especificado do armazenamento.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        //Apagando a tarefa
        $tarefa->delete();
        //Redirecionando para a página de listagem
        return redirect()->route('tarefa.index');
    }
}
