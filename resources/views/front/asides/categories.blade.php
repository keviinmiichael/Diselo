<h3 class="side-heading">Categorías</h3>
<div class="list-group categories">
    @foreach ($categories as $category)
        <a href="/{{$category->slug}}" class="list-group-item">
            <i class="fa fa-angle-right"></i> {{ $category->name }}
        </a>
    @endforeach
</div>