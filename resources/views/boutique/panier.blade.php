<x-app-layout>

    <div class="container w-2/3 mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center items-center bg-white rounded">
            <div class="w-full max-h-screen bg-white text-center m-4">
                <h2 class="text-3xl font-semibold mb-2">Votre panier</h2>
                @if ($user->produits->count() > 0)
                    <table class="min-w-full text-left text-sm whitespace-nowrap">
                        <thead class="uppercase tracking-wider border-b-2 dark:border-neutral-600">
                            <tr>
                                <th scope="col" class="px-6 py-4">
                                    Nom
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Prix
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Voir
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Retirer
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->produits as $produit)
                                <tr class="border-b dark:border-neutral-600">
                                    <th scope="row" class="px-6 py-4">
                                        {{ $produit->label }}
                                    </th>
                                    <td class="px-6 py-4"><img class="mx-auto h-20"
                                            src="{{ asset('storage') }}/{{ $produit->image }}" alt="Image Produit"></td>
                                    <td class="px-6 py-4">{{ $produit->prix }}</td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('produit.show', ['produit' => $produit->id]) }}"
                                            method="GET">
                                            @csrf
                                            <button class="bg-lime-400 rounded p-2" type="submit">Page Produit</button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('panier.delete', ['produit' => $produit->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-600 rounded p-2" type="submit">Retirer du
                                                panier</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form action="{{ route('panier.payer') }}" method="POST">
                        @csrf
                        <button class="bg-green-700 rounded p-2 mt-2" type="submit">Payer</button>
                    </form>
                @else
                    <h3 class="text-2xl font-semibold mb-2">Vous n'avez aucun produit dans votre panier</h3>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
