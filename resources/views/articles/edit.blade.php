<x-main>
    <div class="col-lg-6 col-md-8 mx-auto mt-5">
        <h1 class="fw-light">Modifica Articolo</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" value="{{ $article->title }}" id="title" name="title"
                    placeholder="">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $article->description }}</textarea>
            </div>
            <div class="mb-3">
                <img width="40" src="{{ Storage::url($article->image) }}" alt="">
                <label for="image" class="form-label">Cover</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="">
            </div>

            <button type="submit" class="btn btn-primary">Aggiorna</button>
        </form>
    </div>
</x-main>
