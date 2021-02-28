<x-guest-layout>
    <div class="font-sans text-gray-200 antialiased">
        <div class="bg-white py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24">
            <div class="relative max-w-xl mx-auto">
                <svg class="absolute left-full transform translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                    <defs>
                        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                </svg>
                <svg class="absolute right-full bottom-0 transform -translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                    <defs>
                        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                </svg>
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Wyszukiwarka numerów NIP
                    </h2>
                </div>
                <div class="mt-12">
                    @include('flash-message')
                    <form action="{{ route('home') }}" method="GET" role="search">
                        <div class="w-full mb-12">
                            <label for="search" class="sr-only">Szukaj</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <!-- Heroicon name: solid/search -->
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input id="search" name="nip" value="{{ old('nip') }}" aria-invalid="true" aria-describedby="search-error" class="block w-full bg-white border border-gray-300 rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="prosze wpisac numer NIP" type="search">
                            </div>
                        </div>
                    </form>
                    @isset($results)
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Wynik wyszukiwania
                                </h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                    NIP <b> {{ $nip }}</b>
                                </p>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                    @foreach($results as $result)
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Regon
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getRegon()))
                                                    ------
                                                @else
                                                    {{ $result->getRegon() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                NIP
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getNip()))
                                                    ------
                                                @else
                                                    {{ $result->getNip() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                NIP Status
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getNipStatus()))
                                                    ------
                                                @else
                                                    {{ $result->getNipStatus() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Nazwa
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getName()))
                                                    ------
                                                @else
                                                    {{ $result->getName() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Województwo
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getProvince()))
                                                    ------
                                                @else
                                                    {{ $result->getProvince() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Dzielnica
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getDistrict()))
                                                    ------
                                                @else
                                                    {{ $result->getDistrict() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Gmina
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getCommunity()))
                                                    ------
                                                @else
                                                    {{ $result->getCommunity() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Miejscowość
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getCity()))
                                                    ------
                                                @else
                                                    {{ $result->getCity() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Numer Nieruchomości
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getPropertyNumber()))
                                                    ------
                                                @else
                                                    {{ $result->getPropertyNumber() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Numer Mieszkania
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getApartmentNumber()))
                                                    ------
                                                @else
                                                    {{ $result->getApartmentNumber() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Kod pocztowy
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getZipCode()))
                                                    ------
                                                @else
                                                    {{ $result->getZipCode() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Ulica
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getStreet()))
                                                    ------
                                                @else
                                                    {{ $result->getStreet() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Typ
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getType()))
                                                    ------
                                                @else
                                                    {{ $result->getType() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Silos ID
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getSilo()))
                                                    ------
                                                @else
                                                    {{ $result->getSilo() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Data zakończenia działania
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getActivityEndDate()))
                                                    ------
                                                @else
                                                    {{ $result->getActivityEndDate() }}
                                                @endif
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">
                                                Miejscowość Poczty
                                            </dt>
                                            <dd class="mt-1 text-sm text-gray-900">
                                                @if(empty($result->getPostCity()))
                                                    ------
                                                @else
                                                    {{ $result->getPostCity() }}
                                                @endif
                                            </dd>
                                        </div>
                                    @endforeach
                                </dl>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
