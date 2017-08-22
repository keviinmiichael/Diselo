@php $col_md = $col_md ?? '4' @endphp
<div class="col-md-{{$col_md}} col-sm-6">
    <div class="product-col">
        <div class="image">
            <img src="/content/products/250x320/{{$product->thumb}}" alt="{{$product->name}}" class="img-responsive" />
        </div>
        <div class="caption">
            <h4><a href="/productos/{{$product->slug}}">{{ $product->name }}</a></h4>
            <div class="description">
                {{str_limit($product->description, 80)}}
            </div>
            <div class="price">
                <span class="price-new">${{ $product->price }}</span>
            </div>
            <div class="cart-button button-group">
                <a data-remodal-target="modal-{{$product->id}}" class="btn btn-cart">
                    <i class="fa fa-shopping-cart hidden-sm hidden-xs"></i>
                    Agregar al carrito
                </a>
            </div>
        </div>
        @include('front.products.modal')
    </div>
</div>