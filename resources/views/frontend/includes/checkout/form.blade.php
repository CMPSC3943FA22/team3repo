<div class="container-fluid">
    <form method="POST" action="{{route('order')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name <span class="text-danger">*</span> </label>
                            <input class="form-control" name="name" type="text" placeholder="John Doe" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail <span class="text-danger">*</span></label>
                            <input class="form-control" name="email" type="text" placeholder="example@email.com" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No <span class="text-danger">*</span></label>
                            <input class="form-control" name="mobile_number" type="text" placeholder="+123 456 789" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1 <span class="text-danger">*</span></label>
                            <input class="form-control" name="address_line1" type="text" placeholder="123 Street" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" name="address_line2" type="text" placeholder="123 Street">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <div class="d-flex justify-content-between">
                            <p>{{$product->name}}</p>
                            <p>{{$product->price}}</p>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>{{$product->price}}</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck" checked>
                                <label class="custom-control-label" for="directcheck">Direct Cash</label>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-block btn-primary font-weight-bold py-3" value="Place Order">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>