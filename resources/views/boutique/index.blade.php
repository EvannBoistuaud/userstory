<x-app-layout>

    <div class="container max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <form action="{{ route('index') }}" method="GET">
            <input type="text" class="py-2 px-4 rounded-md border border-gray-300 focus:outline-none focus:border-blue-500 mb-2" name="search" placeholder="Rechercher un produit...">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Rechercher
            </button>
        </form>
        <div class="flex flex-wrap -mx-4">
            @foreach ($produits as $produit)
                <div class="w-full text-center md:w-1/2 lg:w-1/3 px-4 mb-4">
                    <a href="{{ route('produit.show', ['produit' => $produit->id]) }}">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-xl font-semibold mb-2">{{ $produit->label }}</h2>
                            <img class="mx-auto h-40" src="{{ asset('storage') }}/{{ $produit->image }}" alt="Image Produit">
                            <p class="text-gray-600 mt-4">{{ $produit->prix }}€</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
