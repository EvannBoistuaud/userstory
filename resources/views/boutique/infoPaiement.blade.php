<x-app-layout>

    <div class="container max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="flex">
            <div class="w-full m-4">
                <div class="p-6 bg-gray-100 rounded-lg">
                    <form method="POST" action="" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="typePaiement">
                                Type de paiement
                            </label>
                            <select id="typePaiement" name="typePaiement" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="" disabled selected>Sélectionnez un type de paiement</option>
                                @foreach ( $allPaiements as $paiement )
                                    <option value="{{ $paiement }}" {{ isset($typePaiement) && $typePaiement->nom_paiement == $paiement->nom_paiement ? 'selected' : '' }}>{{ $paiement->nom_paiement }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Envoyer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-full m-4">
                <div class="p-6 bg-gray-100 rounded-lg">
                    <h2 class="text-3xl font-semibold mb-2">Coordonnées banquaire</h2>
                    <form method="POST" action="{{ route('paiement.coordonnees') }}" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                       @csrf
                        <div class="mb-4 flex">
                            <div class="mr-2 w-1/2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="prenom">
                                    Prénom sur la carte
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="prenom" name="prenom" type="text" placeholder="Prénom" value="{{ old('prenom') }}">
                            </div>
                            <div class="ml-2 w-1/2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                                    Nom sur la carte
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" name="nom" type="text" placeholder="Nom" value="{{ old('nom') }}">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="numero">
                                Numéro de carte
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="numero_carte" name="numero_carte" type="text" placeholder="Numéro de carte" value="{{ old('numero_carte') }}">
                        </div>
                        <div class="mb-4 flex">
                            <div class="mr-2 w-1/3">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="code">
                                    Code de sécurité (CVV)
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="code_securite" name="code_securite" type="text" placeholder="Code de sécurité" value="{{ old('code_securite') }}">
                            </div>
                            <div class="ml-2 w-2/3">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="expiration">
                                    Date d'expiration
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date_expiration" name="date_expiration" type="text" placeholder="MM/YY" value="{{ old('date_expiration') }}">
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Envoyer
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>