<!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
    <div class="row px-xl-5 pb-3">
        <?php $count = 0; ?>
        @foreach($categories as $category)
           <?php if($count > 11) break; ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="{{'/category/'.$category->id}}">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/cat-2.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>{{$category->name}}</h6>
                            <small class="text-body">100 Products</small>
                        </div>
                    </div>
                </a>
            </div>
         <?php $count++; ?>
        @endforeach
    </div>
</div>
<!-- Categories End -->