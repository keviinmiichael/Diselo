@php
    $availableSizes = $product->availableSizes();
    $availableColors = $product->availableColors($availableSizes->first()->id);
    $availableStock = $product->availableStock($availableSizes->first()->id, $availableColors->first()->id);
@endphp

<div class="remodal" data-remodal-id="modal-{{$product->id}}">
    <button data-remodal-action="close" class="remodal-close"></button>
    <form class="selected-items">
        <div class="row">
            <div class="col-sm-3">
                <label for="select-zise-{{$product->id}}">Talle</label>
                <select name="size[]" id="select-zise-{{$product->id}}" class="form-control">
                    @foreach ($availableSizes as $size)
                        <option value="{{ $size->id }}">{{ $size->value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <label for="select-color-{{$product->id}}">Color</label>
                <select name="color[]" id="select-color-{{$product->id}}" class="form-control">
                    @foreach ($availableColors as $color)
                        <option value="{{ $color->id }}">{{ $color->value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
                <label>Cantidad</label>
                <input type="text" name="amount[]" class="amount form-control" value="1" size="1" min="1" max="{{$availableStock->amount}}" />
            </div>
        </div>
        <input type="hidden" name="product_id" value="{{$product->id}}">
    </form>
    <div class="row">
        <div class="col-md-12">
            <p class="text-left"><a href="agregar"><span class="fa fa-plus"></span> Más</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="margin-top: 30px">
            <button data-remodal-action="confirm" class="btn btn-primary agregar-producto">
                <span class="fa fa-spin fa-spinner" style="display: none"></span> 
                Aceptar
            </button>
            <button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
        </div>
    </div>
    <textarea style="display: none" class="modal-row-template">@include('front.products._modal-row')</textarea>
</div>