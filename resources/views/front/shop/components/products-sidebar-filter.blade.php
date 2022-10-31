<form action="{{request()->segment(2) == 'product' ? 'shop' : ''}}">
    <div class="filter-widget">
        <h4 class="fw-title"> Loại Cà Phê </h4>
        <ul class="filter-catagories">

            @foreach($categories as $category)
                <li><a href="shop/{{$category->name}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Hãng Cà Phê</h4>
        <div class="fw-brand-check">

            @foreach($brands as $brand)
                <div class="bc-item">
                    <label>
                        {{$brand->name}}
                        <input type="checkbox"
                               name="brand[{{$brand->id}}]"
                               {{(request('brand')[$brand->id] ?? '') == 'on' ? 'checked' : ''}}
                               onchange="this.form.submit()">
                        <span class="checkmark"></span>
                    </label>
                </div>
            @endforeach

        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Giá cả</h4>
        <!-- find price in shop page  -->
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount" name="price_min">
                    <input type="text" id="maxamount" name="price_max">
                </div>
            </div>
            <div
                class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                data-min="8" data-max="888"
                data-min-value="{{str_replace(' 000₫', '', request('price_min'))}}"
                data-max-value="{{str_replace(' 000₫', '', request('price_max'))}}">
                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
            </div>
        </div>

        <button type="submit" class="filter-btn">Tìm</button>
    </div>
    <!-- tags -->
    <div class="filter-widget">
        <h4 class="fw-title">Tags</h4>
        <div class="fw-tags">
            <a href="#">Trung Nguyên</a>
            <a href="#">Nescafe</a>
            <a href="#">Cafe Arabica</a>
            <a href="#">Cafe Chồn</a>
            <a href="#">Cafe Cherry</a>
            <a href="#">Cafe ROBUSTA </a>
        </div>
    </div>
</form>
