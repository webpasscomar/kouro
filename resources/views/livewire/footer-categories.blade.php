<div class="container">
  @if ($categories->isNotEmpty())
    <div class="row row-cols-1 row-cols-md-4">
      @foreach ($categories as $category)
        <div class="col mb-3">
          <a href="{{ route('productos.categoria', $category->slug) }}" class="text-decoration-none">
            {{ $category->categoria }}
          </a>
        </div>
      @endforeach
    </div>
  @else
    <p>No hay categorías disponibles.</p>
  @endif
</div>
