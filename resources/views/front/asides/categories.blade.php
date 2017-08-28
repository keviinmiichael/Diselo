<h3 class="side-heading">Categorías</h3>
<div class="list-group categories">
    @foreach ($categories as $category)
        <a href="/{{$category->slug}}" class="list-group-item">
            <i class="fa fa-angle-right"></i> {{ $category->name }}
        </a>
    @endforeach
</div>
<!-- Filters Options Starts -->
<h3 class="side-heading">Filtros</h3>
<form class="list-group" accept-charset="utf-8">
	<!-- Product Sort by Starts -->
	<div class="product-filter">
		<div class="row">
			<div class="col-md-4 text-right">
				<label class="control-label">Ordenar </label>
			</div>
			<div class="col-md-8 text-right">
				<select name="sort" class="form-control">
					<option value="default" selected="selected">Sin orden</option>
					<option value="NAZ">Nombre (A - Z)</option>
					<option value="NZA">Nombre (Z - A)</option>
					<option value="PHL">Precio (Alto - Bajo)</option>
					<option value="PLH">Precio (Bajo - Alto)</option>
				</select>
			</div>
		</div>
	</div>
	<!-- Product Sort by Ends -->
	<div class="list-group-item">
		Talles
	</div>
	<div class="list-group-item">
		<div class="filter-group">
			<label class="checkbox">
				<input name="sizes[]" type="checkbox" value="1" @if (request()->has('sizes') && in_array(1, request('sizes'))) checked @endif />
				XS
			</label>
			<label class="checkbox">
				<input name="sizes[]" type="checkbox" value="2" @if (request()->has('sizes') && in_array(2, request('sizes'))) checked @endif />
				S
			</label>
			<label class="checkbox">
				<input name="sizes[]" type="checkbox" value="3" @if (request()->has('sizes') && in_array(3, request('sizes'))) checked @endif) />
				M
			</label>
			<label class="checkbox">
				<input name="sizes[]" type="checkbox" value="4" @if (request()->has('sizes') && in_array(4, request('sizes'))) checked @endif />
				L
			</label>
			<label class="checkbox">
				<input name="sizes[]" type="checkbox" value="5" @if (request()->has('sizes') && in_array(5, request('sizes'))) checked @endif />
				XL
			</label>
			@if (isset($_GET['page'])) <input type="hidden" name="page" value="{{$_GET['page']}}"> @endif
		</div>
	</div>
	<div class="list-group-item">
		<button type="submit" class="btn btn-main">Filtrar</button>
	</div>
</form>
<!-- Filters Options Ends -->
