<ul class="ml-2 mt-2">
    @foreach ($categorias as $categoria)
        <li class="mb-2"><i class="fa fa-caret-right" aria-hidden="true"></i>
            <a href="{{ route('productos.categoria', $categoria['slug']) }}" class="text-red-700 hover:text-red-400">
                {{ $categoria['categoria'] }}</a>
            @if ($categoria->hijas->count() > 0)
                @include('productos.partials_categorias', ['categorias' => $categoria->hijas])
            @endif
        </li>
    @endforeach
</ul>
