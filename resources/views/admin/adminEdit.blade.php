<style>
    div textarea {
        color: black;
    }
    div select {
        color: black;
    }
    div input {
        color: black;
    }
</style>

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

        <div class="row justify-content-center">
            <div class="col-md-8">


                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Edit Product</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin') }}"> Back</a>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                    <form action="{{ route('update',$product) }}" method="POST" enctype="multipart/form-data">
                        @csrf



                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nom :</strong>
                                    <input type="text" name="name"  value=" {{ $product->name }}" class="form-control">
                                </div>
                                <br>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description :</strong>
                                    <textarea class="form-control" style="height:150px" name="description">{{ $product->description }}</textarea>
                                </div>
                                <br>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Price :</strong>
                                    <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                                </div>
                                <br>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Taille:</strong>
                                    <select name="size" id="">
                                        <option value="{{ $product->size }}">{{ $product->size }}</option>
                                        <option value='XS' name="size" >XS</option>
                                        <option value='S' name="size">S </option>
                                        <option value='M' name="size">M</option>
                                        <option value='L' name="size">L</option>
                                        <option value='XL' name="size">XL</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image :</strong>
                                    <input type="file" name="images" accept="image/png, image/jpeg">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Visibilité:</strong>
                                    <select name="visibility">
                                        <option value='{{ $product->visibility }}' >{{ $product->visibility }}</option>
                                        <option value='publié' name="visibility">Publié</option>
                                        <option value='non publié' name="visibility">Non publié</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Etat:</strong>
                                    <select name="state">
                                        <option value='{{ $product->state }}'>{{ $product->state }}</option>
                                        <option value='en solde' name="state">En solde</option>
                                        <option value='standard' name="state">Standard</option>
                                    </select>
                                </div>
                            </div><div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Réference:</strong>
                                    <textarea class="form-control" style="height:150px" name="reference">{{ $product->reference }}</textarea>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Catégorie:</strong>
                                    <select name="id_category" id="">
                                        <option value='{{ $product->id_category }}'>{{ $product->categories->gender }}</option>
                                        <option value='homme' name="id_category">Homme</option>
                                        <option value='femme' name="id_category">Femme</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
            </div>
        </div>

    </div>
</div >
</div >
</div >



</x-app-layout>

