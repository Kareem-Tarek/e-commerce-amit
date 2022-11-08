<!-- ***** Explore Area Starts ***** -->
<section class="section" id="explore">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left-content">
                    <h2>Explore Our Products</h2>
                    <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique quasi ipsum, obcaecati eum quaerat error magni dolore ipsa distinctio commodi quae earum minima exercitationem veniam iste rerum praesentium eos? Commodi.</span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit non quas ullam neque, por.</p>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste optio at obcaecati laudantium, minus saepe accusantium quia provident, exercitationem soluta quidem quo voluptate.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo <a href="javascript:void(0);" style="color: rgb(46, 46, 222):">molestias velit</a>, doloribus totam labore enim distinctio nemo, atque laudantium sint sunt minus in.</p>
                    <div class="main-border-button">
                        <a href="{{ route('products') }}">Discover More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="right-content">
                    <div class="row">
                        <div class="col-lg-6">
                            @foreach($latest_product as $latest_product_result)
                            <div class="leather" style="/* background: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url('{{ '/assets/images/'.$latest_product_result->image_name }}'); */">
                                <h4>
                                    <a href="{{ route('single_product_page' , $latest_product_result->id) }}" style="color:inherit; transition: all 0.25s ease-in-out;" onMouseOver="this.style.color='#3385ff'" onMouseOut="this.style.color='inherit'">
                                        {{ $latest_product_result->name ?? 'No product found!' }}
                                    </a>
                                </h4>
                                <span>Checkout Latest Items</span>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-lg-6">
                            <div class="first-image">
                                <img src="/assets/images/explore-image-01.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="second-image">
                                <img src="/assets/images/explore-image-02.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="types">
                                <h4>Different Types</h4>
                                <span>Over {{\App\Models\Product::count()-5}} Products</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Explore Area Ends ***** -->