<?php

namespace App\Http\controllers\Painel;

use App\Http\Controllers\controller;
use App\Http\Requests\Painel\ProductFormRequest;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Models\Painel\Product;

class ProdutoController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        Product $product
    ) {

        $title = 'Listagem dos produtos';
        $products = $product->all();

        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastro novo produto';
        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        return view('painel.products.create-edit', compact('title', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
//        Pega todos os dados que vem do formulário
        $dataForm = $request->all();

//        normal
//        if ($dataForm['active']=='')
//            $dataForm['active']=0;
//        else
//            $dataForm['active'] = 1;

//        MAIS PRÁTICO
        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;
        /*  $messages = [
              'name.required'=>'O campo nome é de preenchimento obrigatório!',
              'name.number'=>'O campo número é de preenchimento obrigatório!',
              'number.required'=>'Precisa ser apenas números!',

          ];
  //        Validar os dados antes de salvar
  //        $this->validate($request, $this->product->rules);
  //        $validate = Validator::make($dataForm, $this->product->rules);
          $validate = Validator($dataForm, $this->product->rules,$messages );
          if ($validate->fails()) {
              return redirect()
                  ->route('produtos.create')
                  ->withErrors($validate)
                  ->withInput();
          }
  */

//        Faz o cadastro
        $insert = $this->product->create($dataForm);
        if ($insert) {
            return redirect()->route('produtos.index');
        } else {
//            return redirect()->back(); ou
            return redirect()->route('produtos.create');
        }
//        dd($request->all());
//        dd($request->only('name', 'number'));
//        dd($request->except(['_token','category']));
//dd($request->input('name'));

        return 'Cadastrando...';
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        return "Editar item {$id}";
//        Recupera o produto pelo eu ID
        $product = $this->product->find($id);

        $title = "Editar produto: {$product->name}";
        $categorys = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.products.create-edit', compact('title', 'categorys','product'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "Editando o item {$id}";
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tests()
    {
//       modo  normal
        /*
        $prod = $this->product;
        $prod->name = 'Nome do produto';
        $prod->number = 102030;
        $prod->active = true;
        $prod->category = 'eletronicos';
        $prod->description = 'Description do produto Aqui';
        $insert = $prod->save();
        if ($insert)
            return 'Inserido com sucesso';
         else
            return 'Falha ao inserir';
        */

//        MAIS PRODUTIVO
        /* $insert = $this->product->create([
             'name' => 'Nomeme do produtoo create',
             'number' => 434445,
             'active' => false,
             'category' => 'eletronicos',
             'description' => 'Descrição vem aqui ',

         ]);
         if ($insert) {
             return "Inserido com sucesso create, ID: {$insert->id}";
         } else {
             return 'Falha ao inserir create';
         }
        */

//       modo  normal
        /* $prod = $this->product->find(5);
 //        dd($prod);
         $prod->name = 'UPDATE9';
         $prod->number = 4525429;
         $update = $prod->save();

         if ($update) {
             return "Alterado com sucesso 999!";
         } else {
             return 'Falha ao alterar! ';
         }
 */
        //        MAIS PRODUTIVO
        /*$prod = $this->product->find(6);
        $update = $prod->update([
            'name' => 'update teste produtivo',
            'number' => 77,
            'active' => true,
            'category' => 'banho',
            'description' => 'update prodtivo vem aqui ',
        ]);
        if ($update) {
            return "Alterado com sucesso produtivo!";
        } else {
            return 'Falha ao alterarprodutivo! ';
        }*/

        //        MAIS PRODUTIVO - 2
//        $update = $this->product
//            ->where('number', 102030)
//            ->update([
//                'name' => 'update teste produtivo22',
//                'number' => 222,
//                'active' => true,
//                'category' => 'banho',
//                'description' => 'update prodtivo vem aqui ',
//            ]);
//        if ($update) {
//            return "Alterado com sucesso produtivo 22!";
//        } else {
//            return 'Falha ao alterarprodutivo! ';
//        }

//        DELETAR POR ID
//        $prod = $this->product->find(3);
//        $delete = $prod->delete();

//        DELETAR POR DADO EXISTENTE
        $delete = $this->product
            ->where('number, 645455')
            ->delete();

        if ($delete) {
            return 'Deletado com sucesso!';
        } else {
            return 'Falha ao deletar o item';
        }


    }
}
