<x-app-layout>

    <div class="container max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="flex">
            <div class="w-full m-4">
                <div class="p-6 bg-gray-100 rounded-lg">
                    <form method="POST" action="{{ route('paiement.type')}}" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
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
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="prenom" name="prenom" type="text" placeholder="Prénom" value="{{ isset($coordonneeBancaire) ? $coordonneeBancaire->prenom : '' }}">
                            </div>
                            <div class="ml-2 w-1/2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="nom">
                                    Nom sur la carte
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom" name="nom" type="text" placeholder="Nom" value="{{ isset($coordonneeBancaire) ? $coordonneeBancaire->nom : '' }}"">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="numero">
                                Numéro de carte
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="numero_carte" name="numero_carte" type="text" placeholder="Numéro de carte" value="{{ isset($coordonneeBancaire) ? $coordonneeBancaire->numero_carte : '' }}">
                        </div>
                        <div class="mb-4 flex">
                            <div class="mr-2 w-1/3">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="code">
                                    Code de sécurité (CVV)
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="code_securite" name="code_securite" type="text" placeholder="Code de sécurité" value="{{ isset($coordonneeBancaire) ? $coordonneeBancaire->code_securite : '' }}">
                            </div>
                            <div class="ml-2 w-2/3">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="expiration">
                                    Date d'expiration
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date_expiration" name="date_expiration" type="text" placeholder="MM/YY" value="{{ isset($coordonneeBancaire) ? $coordonneeBancaire->date_expiration : '' }}">
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

    <script>
        document.getElementById('numero_carte').addEventListener('input', function (e) {
            var target = e.target;
            var input = target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '').substring(0, 16);
            var cursorPosition = target.selectionStart;
            var formatted = '';
            for (var i = 0; i < input.length; i++) {
                if (i > 0 && i % 4 === 0) {
                    formatted += ' ';
                    if (cursorPosition === i + 1) {
                        cursorPosition++;
                    }
                }
                formatted += input.charAt(i);
            }
            target.value = formatted;
            target.setSelectionRange(cursorPosition, cursorPosition);
        });
        document.getElementById('code_securite').addEventListener('input', function (e) {
        var target = e.target;
        var input = target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '').substring(0, 3);
        target.value = input;
    });

    document.getElementById('date_expiration').addEventListener('input', function (e) {
        var target = e.target;
        var input = target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
        if (input.length > 4) {
            input = input.substring(0, 4);
        }
        if (input.length > 2) {
            input = input.substring(0, 2) + '/' + input.substring(2);
        }
        target.value = input;
    });
    </script>
</x-app-layout>
