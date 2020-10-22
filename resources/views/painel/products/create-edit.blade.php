@extends('painel.templates.template')

@section('content')
    <h1 class="title-pg">Gestão Pruduto</h1>

    @if(isset($errors) && count($errors) >0)

        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>
                    {{$error}}
                </p>
            @endforeach
        </div>

    @endif

    @if(isset($product))
        <form class="form" method="post" action="{{route('produtos.update',$product->id)}}">
            {!! method_field('PUT') !!}

            @else



            @endif
            <form class="form" method="post" action="{{route('produtos.store')}}">
                {{--        token de segurança para validar o formulário--}}
                {{--        <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                {!! csrf_field() !!}

                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Nome:"
                           value="{{$product->name ?? old('name')}}">
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="active" value="1"
                               @if(isset($product)&& $product->active == '1') checked @endif>
                        Ativo?
                    </label>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="number" placeholder="Número"
                           value="{{$product->number ?? old('number')}}">
                </div>
                <div class="form-group">
                    <select class="form-control" name="category" value="{{old('category')}}">
                        <option value="">Escolha a Categoria</option>
                        @foreach($categorys as $category)
                            <option value="{{$category}}"
                                    @if(isset($product) && $product->category == $category)
                                    selected
                                @endif

                            >{{$category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
            <textarea class="form-control" name="description" placeholder="Descrição"
                      value="">{{$product->description ?? old('description')}}</textarea>
                </div>
                <button class="btn btn-primary">Enviar</button>
            </form>
@endsection
