<x-main>
    <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Pagina Principale</h1>
            @auth
                <p class="col-md-8 fs-4"> Sei utenticato come: {{ Auth::user()->is_admin ? 'Admin' : 'Utente' }}</p>
                <a href="{{ route('articles.index') }}">Lista Articoli</a>
            @endauth
        </div>
    </div>
    {{-- <section>
        <div>
            @auth
                @if (Auth::user()->is_admin)
                    <button>Cancella tutto</button>
                @else
                    <button>Non puoi fare nulla</button>
                @endif
            @endauth

        </div>
    </section> --}}
</x-main>
