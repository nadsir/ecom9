@if(count($deliveryAddresses)>0)
    <h4 class="section-h4">آدرس دریافت</h4>
    @foreach($deliveryAddresses as $address)
        <div class="control-group" style="float: left;margin-right: 5px">
            <input type="radio" id="{{$address['id']}}" name="address_id" value="{{$address['id']}}">
        </div>
        <div>
            <label for="" class="control-label">{{$address['id']}}, {{$address['name']}}  , {{$address['address']}} , {{$address['city']}} ,
                {{$address['state']}} , {{$address['country']}} , ({{$address['mobile']}})</label>
            <a style="float: right;margin-left:10px" href="javascript:;" data-addressid="{{$address['id']}}" class="removeAddress">Remove</a>&nbsp;&nbsp;
            <a style="float: right" href="javascript:;" data-addressid="{{$address['id']}}" class="editAddress">Edit</a>&nbsp;&nbsp;

        </div>
    @endforeach
@endif
    <br>
    <h4 class="section-h4 deliveryText">اضافه کردن آدرس دریافت جدید</h4>
    <div class="u-s-m-b-24">
        <input type="checkbox" class="check-box" id="ship-to-different-address" data-toggle="collapse" data-target="#showdifferent">
        <label class="label-text newAddress" for="ship-to-different-address">دریافت با آدرس جدید ؟</label>
    </div>
    <div class="collapse" id="showdifferent">
        <!-- Form-Fields -->
        <form id="addressAddEditForm" action="javascript:;" method="post">
            @csrf
            <input type="hidden" name="delivery_id">
        <div class="group-inline u-s-m-b-13">
            <div class="group-1 u-s-p-r-16">
                <label for="first-name-extra">Name
                    <span class="astk">*</span>
                </label>
                <input type="text" name="delivery_name" id="delivery_name" class="text-field">
                <p id="delivery_delivery_name"></p>
            </div>
            <div class="group-2">
                <label for="last-name-extra">Address
                    <span class="astk">*</span>
                </label>
                <input type="text" name="delivery_address" id="delivery_address" class="text-field">
                <p id="delivery_delivery_address"></p>
            </div>
        </div>
        <div class="group-inline u-s-m-b-13">
            <div class="group-1 u-s-p-r-16">
                <label for="first-name-extra">City
                    <span class="astk">*</span>
                </label>
                <input type="text" name="delivery_city" id="city_name" class="text-field">
                <p id="delivery_delivery_city"></p>
            </div>
            <div class="group-2">
                <label for="last-name-extra">State
                    <span class="astk">*</span>
                </label>
                <input type="text" name="delivery_state" id="delivery_state" class="text-field">
                <p id="delivery_delivery_name"></p>
            </div>
        </div>
        <div class="u-s-m-b-13">
            <label for="select-country-state">Country
                <span class="astk">*</span>
            </label>
            <div class="select-box-wrapper">
                <select class="select-box" name="delivery_country" id="delivery_country">
                    <option value="">انتخاب کشور</option>
                    @foreach($countries as $country)
                        <option value="{{$country['country_name']}}"
                                @if(isset($country['country_name']) && $country['country_name']==Auth::user()->country)selected @endif>{{$country['country_name']}}</option>
                    @endforeach
                </select>
                <p id="delivery_delivery_country"></p>
            </div>
        </div>
        <div class="u-s-m-b-13">
            <label for="postcode-extra">Pincode
                <span class="astk">*</span>
            </label>
            <input type="text" name="delivery_pincode" id="delivery_pincode" class="text-field">
            <p id="delivery_delivery_pincode"></p>
        </div>
        <div class="u-s-m-b-13">
            <label for="postcode-extra">Mobile
                <span class="astk">*</span>
            </label>
            <input type="text" name="delivery_mobile" id="delivery_mobile" class="text-field">
            <p id="delivery_delivery_mobile"></p>
        </div>
        <div class="u-s-m-b-13" >
            <button style="width: 100%" class="button button-outline-secondary" type="submit" id="btnShipping">Save</button>
        </div>
        </form>
        <!-- Form-Fields /- -->
    </div>
    <div>
        <label for="order-notes">Order Notes</label>
        <textarea class="text-area" id="order-notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
    </div>

    <!--                                <div class="u-s-m-b-30">
                                        <input type="checkbox" class="check-box" id="create-account">
                                        <label class="label-text" for="create-account">Create Account</label>
                                    </div>-->
    <!-- Form-Fields /- -->

