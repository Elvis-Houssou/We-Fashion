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

                    <form action=" {{route('store')}} " method="POST" enctype="multipart/form-data">
                        @csrf

                            <br>
                            <div>
                                {{-- <label for="">Nom :</label>
                                <br>
                                <select name="author_id" id=""> --}}
                                    {{-- @foreach ($authors as $author)
                                        <option value=" {{$author->id}} ">{{$author->name}} </option>
                                    @endforeach --}}
                                {{-- </select> --}}
                            </div>
                            <br><br>
                            <div>
                                <label for="">Name :</label>
                                <br>
                                <input type="text" name="name">
                            </div>
                            <br><br>
                            <div>
                                <label for="">description :</label>
                                <br>
                                <textarea id="description" name="description" rows="4" cols="50"></textarea>
                            </div>
                            <br><br>
                             <label for="">Prix :</label>
                                <br>
                                <select name="price" id="">
                                    {{-- @foreach ($authors as $author)
                                        <option value=" {{$author->id}} ">{{$author->name}} </option>
                                    @endforeach --}}
                                    <option value="3500" name="price">3500</option>
                                    <option value="4500" name="price">4500</option>
                                    <option value="4000" name="price">4000</option>
                                </select>
                            <br><br>

                            <br><br>
                            <div>
                                <label for="">reférence :</label>
                                <br>
                                <textarea id="reference" name="reference" rows="4" cols="50"></textarea>
                            </div>
                            <br><br>
                            <label for="">Taille :</label>
                               <br>
                               <select name="size" id="">
                                   {{-- @foreach ($authors as $author)
                                       <option value=" {{$author->id}} ">{{$author->name}} </option>
                                   @endforeach --}}
                                   <option value='XS' name="size" >XS</option>
                                    <option value='S' name="size">S </option>
                                    <option value='M' name="size">M</option>
                                    <option value='L' name="size">L</option>
                                    <option value='XL' name="size">XL</option>
                               </select>
                           <br><br>
                           <label for="">Visibilité :</label>
                               <br>
                               <select name="visibility" id="">
                                   {{-- @foreach ($authors as $author)
                                       <option value=" {{$author->id}} ">{{$author->name}} </option>
                                   @endforeach --}}
                                   <option value="Publié" name="visibility">Publié</option>
                                   <option value="Non publié" name="visibility">Non publié</option>
                               </select>
                           <br><br>
                           <label for="">Etat :</label>
                               <br>
                               <select name="state" id="">
                                   {{-- @foreach ($authors as $author)
                                       <option value=" {{$author->id}} ">{{$author->name}} </option>
                                   @endforeach --}}
                                   <option value="En solde" name="state">En solde</option>
                                   <option value="Standard" name="state">Standard</option>
                               </select>
                           <br><br>
                           <label for="">Catégorie :</label>
                               <br>
                               <select name="id_category" id="">
                                   @foreach ($categories as $categorie)
                                       <option value=" {{$categorie->id}} ">{{$categorie->gender}} </option>
                                   @endforeach
                                   {{-- <option value="">Homme</option>
                                   <option value="">Femme</option> --}}
                               </select>
                           <br><br>
                           <div>
                                <strong>Image:</strong>
                                <input type="file" name="images" accept="image/png, image/jpeg">
                            </div>
                            <br><br>

                            <div>
                                <input type="submit" value="Soumettre">
                            </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

