<div class="row">
    <div class="col-md-3">
        <select name="size" id="select-zise-${time}" class="form-control">
            @foreach ($availableSizes as $size)
                <option value="{{$size->id}}">{{ $size->value }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <select name="color" id="select-color-${time}" class="form-control">
            @foreach ($availableColors as $color)
                <option value="{{$color->id}}">{{ $color->value }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <input type="text" name="quantity" class="amount form-control" value="1" size="1" min="1" max="{{$availableStock->amount}}" />
    </div>
    <div class="col-sm-1">
        <p>
            <a href="remover" class="btn btn-default"><span class="fa fa-trash"></span></a>
        </p>
    </div>
</div>