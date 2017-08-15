<div class="product-col">
    <div class="image">
        <img src="/content/products/250x320/{{$product->thumb}}" alt="{{$product->name}}" class="img-responsive" />
    </div>
    <div class="caption">
        <h4><a href="/productos/{{$product->slug}}">{{ $product->name }}</a></h4>
        <div class="description">
            {{str_limit($product->description, 30)}}
        </div>
        <div class="price">
            <span class="price-new">${{ $product->price }}</span>
        </div>
    </div>
</div>