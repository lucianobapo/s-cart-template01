<div class="btn-categories">
    <img src="{{asset($templateFile.'/images/catalog.png')}}" alt="">
    {{ trans('front.categories') }}
</div>
<ul>
    <div class="logo-nav-sm">
        <a class="nav-close" id="close-categories"><i class="fas fa-times"></i></a>
        <a href="{{ route('home') }}" class="">
            <img src="{{ asset(sc_store('logo')) }}" alt="logo_s-cart">
        </a>
    </div>
    @foreach ($categoriesTop as $key => $category)
    @if (!empty($categories[$category->id]))
    <li>
        <a href="{{ $category->getUrl() }}">{{ $category->title }}</a>
        <a class="btn-active"> <i class="fa fa-plus"></i>
        </a>
        <ul>
            @foreach ($categories[$category->id] as $cateChild)
            <li>
                <a href="{{ $cateChild->getUrl() }}">
                    {{ $cateChild->title }}
                </a>
            </li>
            @endforeach
        </ul>
    </li>
    @else
    <li>
        <a href="{{ $category->getUrl() }}">{{ $category->title }}</a>
    </li>
    @endif
    @endforeach
</ul>