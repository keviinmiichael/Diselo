<h3 class="side-heading">Destacados</h3>
@foreach($bestsellers as $bestseller)
    <div class="product-col">
        <div class="image">
            <img src="/content/products/250x320/{{$bestseller->thumb}}" alt="{{$bestseller->name}}" class="img-responsive" />
        </div>
        <div class="caption">
            <h4><a href="productos/{{$bestseller->slug}}">{{ $bestseller->name }}</a></h4>
            <div class="description">
                We are so lucky living in such a wonderful time. Our almost unlimited ...
            </div>
            <div class="price">
                <span class="price-new">${{ $bestseller->price }}</span>
            </div>
        </div>
    </div>
@endforeach
