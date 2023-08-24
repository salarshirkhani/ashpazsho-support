                        <h4 style="margin-top:45px; font-weight:900">واریز ترون</h4>
                        <p> شما در حال واریز ترون هستید . لطفا پس از واریز دکمه نارنجی رنگ واریز کردم را بزنید تا سیستم وارد پروسه بررسی صحت واریزی شما به صورت خودکار شود</p>
                        <div class="generate-box">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                <input id="text" type="hidden" value="{{$address}}" />
                                <div id="qrcode" style="width:200px; height:200px; margin:15px 0px; display:block; margin-left:auto; margin-right:auto; text-align:center;"></div>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="address">
                                        <p class="alert alert-info">مقدار واریزی شما{{$value}} دلار است</p>
                                        <p class="alert alert-warning">پس از واریز دکمه واریز کردم را بزنید</p>
                                        <input id="text1" type="text" value="{{$address}}" readonly/>
                                        <button onclick="myFunction()">کپی کردن آدرس ولت</button>  
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <form action="{{ route('dashboard.customer.payment.create') }}" method="POST">
                                         @csrf
                                         <input name="address" type="hidden" value="{{$address}}" />
                                         <input name="value" type="hidden" value="{{$value}}" />
                                         <input name="coin" type="hidden" value="{{$coin}}" />
                                         <button type="submit" class="submit">واریز کردم :)</button>
                                    </form>
                                </div>
                             </div>
                        </div>
                        <h4 style="margin-top:105px; font-weight:900">سوابق مالی ترون</h4>
                        <p>آخرین سوابق مالی خود را اعم از واریز و برداشت را در اینجا مشاهده کنید </p>