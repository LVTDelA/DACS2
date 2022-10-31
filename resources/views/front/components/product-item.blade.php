<div class="product-item">
    <div class="pi-pic">
        <img src="/front/img/products/{{$product->CoffeeImages[0]->path}}" alt="">

        @if($product->discount != null)
            <div class="sale">Sale</div>
        @endif

        <div class="icon">
            <i class="icon_heart_alt"></i>
        </div>

        <ul>
            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
            <li class="quick-view"><a href="shop/product/{{$product->id}}">+ Xem </a></li>
            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="catagory-name">{{$product->CoffeeBrand->name}}</div>
        <a href="shop/product/{{$product->id}}">
            <h5>{{$product->name}}</h5>
        </a>
        <div class="product-price">
            @if($product->discount != null)
                {{$product->discount}} 000₫
                <span>{{$product->price}} 000₫</span>
            @else
                {{$product->price}} 000₫
            @endif
        </div>
    </div>
</div>
