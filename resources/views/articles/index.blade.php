<x-main>
    <div class="col-lg-6 col-md-8 mx-auto mt-5">
        <h1 class="fw-light">Lista degli Articoli</h1>
        <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the
            creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
            <a href="{{ route('articles.create') }}" class="btn btn-primary my-2">Aggiungi Articolo</a>
        </p>
    </div>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <th scope="row">{{ $article->id }}</th>
                        <td>{{ $article->title }}</td>
                        <td class="d-flex gap-4">
                            <a href="{{ route('articles.show', $article) }}" class="btn btn-info">Info</a>

                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning">Modifica</a>
                            @if (Auth::user()->is_admin)
                                <form action="{{ route('articles.destroy', $article) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach






            </tbody>
        </table>
    </div>
</x-main>
