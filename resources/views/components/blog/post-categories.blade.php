
<div class="aside-widget text-center">
    <a href="#" style="display: inline-block;margin: auto;">
        <img class="img-responsive" src="{{ url('blog/') }}/img/ad-1.jpg" alt="">
    </a>
</div>


<div class="aside-widget">
    <div class="section-title">
        <h2>Catagories</h2>
    </div>
    <div class="category-widget">
        <ul>
            @foreach($categories as $category)
                <li><a href="#" class="cat-1" >{{ $category->name }}<span style="background-color: #{{ $category->color }};">{{ $category->blogs_count }}</span></a></li>
            @endforeach
        </ul>
    </div>
</div>

<div class="aside-widget">
    <div class="tags-widget">
        <ul>
            <li><a href="#">Chrome</a></li>
            <li><a href="#">CSS</a></li>
            <li><a href="#">Tutorial</a></li>
            <li><a href="#">Backend</a></li>
            <li><a href="#">JQuery</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Development</a></li>
            <li><a href="#">JavaScript</a></li>
            <li><a href="#">Website</a></li>
        </ul>
    </div>
</div>

