<x-app-layout>

    <div class="container w-1/2 mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center items-center bg-white rounded">
            <div class="w-full max-h-screen bg-white text-center m-4">
                <h2 class="text-3xl font-semibold mb-2">{{ $produit->label }}</h2>
                <img class="mx-auto h-40" src="{{ asset('storage') }}/{{ $produit->image }}" alt="Image Produit">
                <h3 class="text-2xl font-semibold mb-2">{{ $produit->description }}</h3>
                <p class="text-gray-600 mt-4 mb-3 text-xl">{{ $produit->prix }}€</p>
                <form action="{{ route('panier.add', ['produit' => $produit->id]) }}" method="POST">
                    @csrf
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Ajouter au panier
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
