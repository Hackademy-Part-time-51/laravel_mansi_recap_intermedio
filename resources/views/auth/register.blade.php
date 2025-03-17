<x-main>
    <div class="container">
        <h1>Registrazione</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form-control" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Conferma Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="">
            </div>

            <button class="btn btn-primary" type="submit">Registrami</button>
        </form>
    </div>
</x-main>
