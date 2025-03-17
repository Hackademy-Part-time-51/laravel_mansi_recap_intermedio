<x-main>
    <div class="col-lg-6 col-md-8 mx-auto mt-5">
        <h1 class="fw-light">Crea nuovo Articolo</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" value="{{ old('title') }}" id="title" name="title"
                    placeholder="">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Cover</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="">
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
</x-main>
