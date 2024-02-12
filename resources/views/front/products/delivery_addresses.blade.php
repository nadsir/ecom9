<h4 class="section-h4 deliveryText" style="background-color: rgba(252,179,19,0.42);padding: 10px" id="update_product">
    اضافه کردن آدرس دریافت جدید</h4>
<div class="u-s-m-b-24" style="padding: 10px">
    <input type="checkbox" class="check-box" id="ship-to-different-address" data-toggle="collapse"
           data-target="#showdifferent">
    @if(count($deliveryAddresses)>0)
        <label class=" newAddress" for="ship-to-different-address">دریافت با آدرس جدید ؟</label>
    @else
        <checkbox class=" newAddress" for="ship-to-different-address">برای ضافه کردن آدرس تیک را بزنید</checkbox>
    @endif
</div>
<div class="collapse" id="showdifferent" style="padding: 10px">
    <!-- Form-Fields -->
    <form id="addressAddEditForm" action="javascript:;" method="post">
        @csrf
        <input type="hidden" name="delivery_id">
        <div class="group-inline u-s-m-b-13">
            <div class="group-1 u-s-p-r-16">
                <label for="first-name-extra">نام
                    <span class="astk">*</span>
                </label>
                <input type="text" name="delivery_name" id="delivery_name" class="text-field">
                <p class="alert alert-danger" id="delivery_delivery_name" style="display: none" role="alert"></p>
            </div>
            <div class="group-2" style="padding: 10px">
                <label for="last-name-extra">آدرس
                    <span class="astk">*</span>
                </label>
                <input type="text" name="delivery_address" id="delivery_address" class="text-field">
                <p class="alert alert-danger" id="delivery_delivery_address" style="display: none" role="alert"></p>
            </div>
        </div>
        <div class="u-s-m-b-13" style="padding: 10px">
            <label for="select-country-state">استان
                <span class="astk">*</span>
            </label>
            <div class="select-box-wrapper">
                <select class="select-box" name="delivery_country" id="delivery_country"
                        style="background-color: white;text-align: right;direction: rtl">
                    <option value="">انتخاب استان</option>
                    @foreach($countries as $country)
                        <option value="{{$country['country_name']}}"
                                @if(isset($country['country_name']) && $country['country_name']==Auth::user()->country)selected @endif>{{$country['country_name']}}</option>
                    @endforeach
                </select>
                <p class="alert alert-danger" id="delivery_delivery_country" style="display: none" role="alert"></p>
            </div>
        </div>
        <div class="group-inline u-s-m-b-13">
            <div class="group-1 u-s-p-r-16">
                <label for="first-name-extra">شهر
                    <span class="astk">*</span>
                </label>
                <input type="text" name="delivery_city" id="city_name" class="text-field">
                <p class="alert alert-danger" id="delivery_delivery_city" style="display: none" role="alert"></p>

            </div>
            <div class="group-2" style="padding: 10px">
                <label for="last-name-extra">محله
                    <span class="astk">*</span>
                </label>
                <input type="text" name="delivery_state" id="delivery_state" class="text-field">
                <p class="alert alert-danger" id="delivery_delivery_state" style="display: none" role="alert"></p>
            </div>
        </div>
        <div class="u-s-m-b-13" style="padding: 10px">
            <label for="postcode-extra">کد پستی
                <span class="astk">*</span>
            </label>
            <input type="text" name="delivery_pincode" id="delivery_pincode" class="text-field">
            <p class="alert alert-danger" id="delivery_delivery_pincode" style="display: none" role="alert"></p>
        </div>
        <div class="u-s-m-b-13" style="padding: 10px">
            <label for="postcode-extra">موبایل
                <span class="astk">*</span>
            </label>
            <input type="text" name="delivery_mobile" id="delivery_mobile" class="text-field">
            <p class="alert alert-danger" id="delivery_delivery_mobile" style="display: none" role="alert"></p>

        </div>
        <div class="u-s-m-b-13">
            <button style="width: 100%;background-color: #fdb414;
    width: 100%;
    border: none!important;
    -webkit-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    -moz-box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);
    box-shadow: 4px 4px 16px -6px rgba(0,0,0,0.75);margin-top: 10px" class="button button-outline-secondary"
                    type="submit" id="btnShipping">ذخیره
            </button>
        </div>
    </form>
    <!-- Form-Fields /- -->
</div>
<div style="padding: 10px">
    <label for="order-notes">توضیحات سفارش</label>
    <textarea class="text-area" id="order-notes" placeholder="توضیحات اضافه در باره سفارش"></textarea>
</div>

<!--                                <div class="u-s-m-b-30">
                                    <input type="checkbox" class="check-box" id="create-account">
                                    <label class="label-text" for="create-account">Create Account</label>
                                </div>-->
<!-- Form-Fields /- -->

<script>
    import Checkbox from "../../../../vendor/laravel/breeze/stubs/inertia-vue-ts/resources/js/Components/Checkbox";

    export default {
        components: {Checkbox}
    }
</script>
