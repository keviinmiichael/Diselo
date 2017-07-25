<h3 class="side-heading">Destacados</h3>
<div class="product-col">
    <div class="image">
        <img src="/content/products/250x320/{{$bestsellers->thumb}}" alt="{{$bestsellers->name}}" class="img-responsive" />
    </div>
    <div class="caption">
        <h4><a href="productos/{{$bestsellers->slug}}">{{ $bestsellers->name }}</a></h4>
        <div class="description">
            We are so lucky living in such a wonderful time. Our almost unlimited ...
        </div>
        <div class="price">
            <span class="price-new">${{ $bestsellers->price }}</span> 
        </div>
    </div>
</div>