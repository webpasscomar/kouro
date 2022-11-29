<h1>Home del shopping</h1>

<ul>

  @foreach( $products as $p)

  <li>{{ $p->name }}</li>

  @endforeach

</ul>