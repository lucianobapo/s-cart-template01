<div class="container-sm container product-list1 bkg-blue new">
    <div class="product-list-title">
        {{ trans('front.products_hot') }}
        <div class="arrow-slider-custom">
            <div class="next">
            </div>
            <div class="prev">
            </div>
        </div>
    </div>
    <div class="row product-list-items">
        <div class="slider">
            @foreach ($productsHot as $key => $product_hot)
            <div class="col-6 col-sm-6 col-md-3">
                <div class="product-item">
                    <div class="product-main">

                        <div class="product-photo">
                            <a href="{{ $product_hot->getUrl() }}">
                                <img src="{{ asset($product_hot->getThumb()) }}" alt="{{ $product_hot->name }}">
                            </a>
                        </div>
                        <div class="product-name">
                            <a href="{{ $product_hot->getUrl() }}">
                                <h4>{{ $product_hot->name }}</h4>
                            </a>
                        </div>
                        <div class="product-price">
                            {!! $product_hot->showPrice() !!}
                        </div>
                        <div class="product-add-cart">
                            @if ($product_hot->allowSale())
                            <a class="btn btn-default"
                                onClick="addToCartAjax('{{ $product_hot->id }}','default')">
                                <i class="fa fa-shopping-cart"></i> <span>{{trans('front.add_to_cart')}}</span>
                            </a>
                            @else
                            &nbsp;
                            @endif
                        </div>

                    </div>
                    <div class="product-choose">
                        <ul class="nav nav-pills nav-justified">
                            <li>
                                <a onClick="addToCartAjax('{{ $product_hot->id }}','wishlist')">
                                    <i class="fas fa-heart"></i> {{trans('front.add_to_wishlist')}}
                                </a>
                            </li>
                            <li>
                                <a onClick="addToCartAjax('{{ $product_hot->id }}','compare')">
                                    <i class="fas fa-exchange-alt"></i> {{trans('front.add_to_compare')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>