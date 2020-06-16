<div class="container-sm container product-list features">
    <div class="product-list-title">
        {{ trans('front.features_items') }}
    </div>
    <div class="container">
        <div class="row">
            @foreach ($productsNew as $key => $product_new)
            <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                <div class="product-item">
                    <div class="product-main">
                        <div class="product-group">
                            @if ($product_new->price != $product_new->getFinalPrice() && $product_new->kind !=
                            SC_PRODUCT_GROUP)
                            <img src="{{ asset($templateFile.'/images/home/sale.png') }}" class="new" alt="" />
                            @elseif($product_new->kind == SC_PRODUCT_BUILD)
                            <img src="{{ asset($templateFile.'/images/home/bundle.png') }}" class="new" alt="" />
                            @elseif($product_new->kind == SC_PRODUCT_GROUP)
                            <img src="{{ asset($templateFile.'/images/home/group.png') }}" class="new" alt="" />
                            @endif
                        </div>
                        <div class="product-photo">
                            <a href="{{ $product_new->getUrl() }}">
                                <img src="{{ asset($product_new->getThumb()) }}" alt="{{ $product_new->name }}">
                            </a>
                        </div>
                        <div class="product-name">
                            <a href="{{ $product_new->getUrl() }}">
                                <h4>{{ $product_new->name }}</h4>
                            </a>
                        </div>
                        {{--
                        <div class="product-price">
                            {!! $product_new->showPrice() !!}
                        </div>

                        
                        <div class="product-add-cart">
                            @if ($product_new->allowSale())
                            <a class="btn btn-default"
                                onClick="addToCartAjax('{{ $product_new->id }}','default')">
                                <i class="fa fa-shopping-cart"></i> <span>{{trans('front.add_to_cart')}}</span>
                            </a>
                            @else
                            &nbsp;
                            @endif
                        </div>
                        --}}

                    </div>

                    {{--
                    <div class="product-choose">
                        <ul class="nav nav-pills nav-justified">
                            <li>
                                <a onClick="addToCartAjax('{{ $product_new->id }}','wishlist')">
                                    <i class="fas fa-heart"></i> {{trans('front.add_to_wishlist')}}
                                </a>
                            </li>
                            <li>
                                <a onClick="addToCartAjax('{{ $product_new->id }}','compare')">
                                    <i class="fas fa-exchange-alt"></i> {{trans('front.add_to_compare')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                    --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="btn-view">
            <a href="" class="">Xem thêm</a>
        </div> --}}
</div>