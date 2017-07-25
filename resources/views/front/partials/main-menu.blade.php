<nav id="main-menu" class="navbar" role="navigation">
    <!-- Nested Container Starts -->
    <div class="container">
        <!-- Nav Header Starts -->
        <div class="navbar-header">
            <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-cat-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- Nav Header Ends -->
        <!-- Navbar Cat collapse Starts -->
        <div class="collapse navbar-collapse navbar-cat-collapse">
            <ul class="nav navbar-nav">

                @foreach ($categories as $category)
                    @if ($category->subcategories->count())
                        <li class="dropdown">
                            <a href="{{$category->slug}}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10">{{$category->name}}</a>
                            <ul class="dropdown-menu" role="menu">
                                @foreach ($category->subcategories as $subcategory)
                                    <li><a tabindex="-1" href="{{$category->slug}}/{{$subcategory->slug}}">{{$subcategory->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li><a href="{{$category->slug}}">{{$category->name}}</a></li>
                    @endif
                @endforeach
                
            </ul>
        </div>
        <!-- Navbar Cat collapse Ends -->
    </div>
    <!-- Nested Container Starts -->
</nav>