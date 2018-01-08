<header class="header-wrap inner">
    <div id="main-carousel">
        @section('banner')
        <img src="/images/front/main-banner.jpg" alt="{{ config('app.name') }}" class="img-responsive" />
        @show
    </div>


	@include('front.partials.top-bar')

</header>
