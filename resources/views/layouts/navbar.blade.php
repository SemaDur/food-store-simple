<div class="top-header">
    <div class="wrap">
        <!----start-logo---->
        <div class="logo">
            <a href="/"><img src="{{ asset('images/logo.png') }}" style=" height: 31px; width: 203px; " title="logo" /></a>
        </div>
        <!----end-logo---->
        <!----start-top-nav---->
        <div class="top-nav">
            <ul>


                @foreach (\App\Category::get() as $category)
                    <li>
                        <a href="/category/{{$category['id']}}">{{$category['name']}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="clear"> </div>
    </div>
</div>