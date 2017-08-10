<button data-remodal-action="close" class="remodal-close"></button>
<div id="selected-items">
    <div class="row">
        <div class="col-sm-3">
            <label id="select-zise">Talle</label>
            <select name="size" id="select-zise" class="form-control">
                @foreach ($availableSizes as $size)
                    <option value="{{ $size->id }}">{{ $size->value }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-4">
            <label id="select-zise">Color</label>
            <select name="color" id="select-zise" class="form-control">
                @foreach ($availableColors as $color)
                    <option value="{{ $color->id }}">{{ $color->value }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-4">
            <label>Cantidad</label>
            <input type="text" name="quantity" class="amount form-control" value="1" size="1" min="1" max="{{$availableStock->amount}}" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p class="text-left"><a href="agregar"><span class="fa fa-plus"></span> Más</a></p>
    </div>
</div>
<div class="row">
    <div class="col-md-12" style="margin-top: 30px">
        <button data-remodal-action="confirm" class="btn btn-primary">Aceptar</button>
        <button data-remodal-action="cancel" class="btn btn-danger">Cancelar</button>
    </div>
</div>