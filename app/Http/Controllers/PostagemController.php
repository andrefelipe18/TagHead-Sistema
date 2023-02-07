<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use Illuminate\Http\Request;
use Inertia\Inertia;
class PostagemController extends Controller
{
    /**
     * Exibir uma listagem do recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retorna a view com Inertia index com a listagem de postagens

        $postagens = Postagem::all();

        return Inertia::render('Postagem/Index', [
            'postagens' => $postagens,
        ]);
    }

    /**
     * Mostre o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return Inertia::render('Postagem/Create');
    }

    /**
     * Armazene um recurso recém-criado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacoes = [
            'titulo' => 'required',
            'conteudo' => 'required',
            'legenda' => 'required',
        ];
        $mensagens = [
            'titulo.required' => 'O campo título é obrigatório',
            'conteudo.required' => 'O campo conteúdo é obrigatório',
            'legenda.required' => 'O campo legenda é obrigatório',
        ];
        $request->validate($validacoes, $mensagens);


        //Criando a postagem
        Postagem::create([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'legenda' => $request->legenda,

        ]);

        return redirect()->route('postagem.index');
    }

    /**
     * Exiba o recurso especificado.
     *
     * @param  \App\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function show(Postagem $postagem)
    {
        //
    }

    /**
     * Mostra o formulário para editar o recurso especificado.
     *
     * @param  \App\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function edit(Postagem $postagem)
    {
        //
    }

    /**
     * Atualize o recurso especificado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postagem $postagem)
    {
        //
    }

    /**
     * Remova o recurso especificado do armazenamento.
     *
     * @param  \App\Models\Postagem  $postagem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postagem $postagem)
    {
        //
    }
}
