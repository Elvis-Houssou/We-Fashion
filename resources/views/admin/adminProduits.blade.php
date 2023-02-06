
<style>
    .pull-right a {
        background-color: rgb(45, 163, 45);
        color: white;
    }
    table{
        border: 1px solid white;
        color: white;
    }
    table td{
        border: 1px solid white;
        padding: 25px;
    }
    table th{
        border: 1px solid white;
    }

    .edit a {
        background-color: rgb(88, 88, 255);
    }
    .del button {
        background-color: red;
    }
</style>

<x-app-layout>
    <x-slot name="header">

        <div class="container">

            <div class="row" style="margin-top: 5rem;">
                <div class="col-lg-12 margin-tb text-end">
                    <div class="pull-right">
                        <a class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-white-500 dark:text-gray-400 bg-dark dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150" href=" {{ route('create') }} "> Create New Products</a>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <br>

            <table class="table table-bordered">
                <tr>
                    <th>Catégorie</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Etat</th>
                    <th></th>
                </tr>
                @foreach ($products as $product )
                <tr>
                    {{-- <td>{{ $article->title }}</td>
                    <td>{{ $article->category }}</td> --}}
                    <td> {{$product->id_category}} </td>
                    <td>  {{$product->name}} </td>
                    <td> {{$product->price}} </td>
                    <td> {{$product->state}} </td>
                    <td>
                        <form action=" {{ route('destroy', $product->id) }} " method="POST">
                            {{-- <a class="btn btn-primary" href="">Edit</a> --}}
                            <span class="edit">
                                <a class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-white-500 dark:text-gray-400 bg-dark dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150" href="{{ route('edit',$product->id) }}">Edit</a>
                            </span>
                            @csrf
                            @method('DELETE')
                            <span class="del">
                                <button type="submit" class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-white-500 dark:text-gray-400 bg-dark dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150" onclick="return confirm('Are you sure?')">Delete</button>
                            </span>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            <div class="w-25 p-3">
                {{ $products->links() }}
            </div>
        </div>
    </x-slot>
</x-app-layout>

