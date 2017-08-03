<h3 class="side-heading">Categorías</h3>
<div class="list-group categories">
    @foreach ($categories as $category)
        <a href="/{{$category->slug}}" class="list-group-item">
            <i class="fa fa-angle-right"></i> {{ $category->name }}
        </a>
    @endforeach
</div>
<!-- Filters Options Starts -->
	<h3 class="side-heading">Shopping Options</h3>
	<div class="list-group">
		<div class="list-group-item">
			Talles
		</div>
		<div class="list-group-item">
			<div class="filter-group">
				<label class="checkbox">
					<input name="filter1" type="checkbox" value="br1" checked="checked" />
					XS
				</label>
				<label class="checkbox">
					<input name="filter2" type="checkbox" value="br2" />
					S
				</label>
				<label class="checkbox">
					<input name="filter2" type="checkbox" value="br2" />
					M
				</label>
				<label class="checkbox">
					<input name="filter2" type="checkbox" value="br2" />
					L
				</label>
				<label class="checkbox">
					<input name="filter2" type="checkbox" value="br2" />
					XL
				</label>
			</div>
		</div>
		<div class="list-group-item">
			Manufacturer
		</div>
		<div class="list-group-item">
			<div class="filter-group">
				<label class="radio">
					<input name="filter-manuf" type="radio" value="mr1" checked="checked" />
					Manufacturer Name 1
				</label>
				<label class="radio">
					<input name="filter-manuf" type="radio" value="mr2" />
					Manufacturer Name 2
				</label>
				<label class="radio">
					<input name="filter-manuf" type="radio" value="mr3" />
					Manufacturer Name 3
				</label>
			</div>
		</div>
		<div class="list-group-item">
			<button type="button" class="btn btn-main">Filter</button>
		</div>
	</div>
<!-- Filters Options Ends -->
