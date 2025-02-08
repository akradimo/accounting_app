<?php require_once __DIR__ . '/../layouts/main.php'; ?>

<div class="component-detail-panel">
    <div class="dx-validationgroup">
        <div class="row m-0 p-0 mb-2 content">
            <div class="col col-md-auto text-center pt-md-4" id="image" style="width: 280px;">
                <div class="image mt-3 mt-md-5">
                    <img alt="product image" src="https://core.hesabfa.com/api/bdata/other/contact.jpg">
                </div>
                <br>
                <div class="file-upload">
                    <button class="btn btn-primary">انتخاب</button>
                    <input type="file" accept="image/*" hidden>
                </div>
                <button class="btn btn-secondary mt-2">دوربین</button>
                <button class="btn btn-danger mt-2">حذف</button>
            </div>
            <div class="col-12 col-md">
                <div class="row">
                    <div class="col-9 col-sm-6" id="code">
                        <label>کد حسابداری</label>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control" readonly>
                            <div class="form-check form-switch ms-2">
                                <input class="form-check-input" type="checkbox" id="autoCode" checked>
                                <label class="form-check-label" for="autoCode">اتوماتیک</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 col-sm-6 pt-2">
                        <label>&nbsp;</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="active" checked>
                            <label class="form-check-label" for="active">فعال</label>
                        </div>
                    </div>
                    <div class="col-12" id="company">
                        <label>شرکت</label>
                        <input type="text" class="form-control" name="company">
                    </div>
                    <div class="col-4" id="title">
                        <label>عنوان</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="col-4">
                        <label>نام</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="col-4">
                        <label>نام خانوادگی</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                    <div class="col-12" id="display">
                        <label>نام مستعار <i class="icon icon-asterisk"></i></label>
                        <input type="text" class="form-control" name="display_name">
                    </div>
                    <div class="col-12" id="category">
                        <label>دسته بندی</label>
                        <select class="form-control" name="category">
                            <option>انتخاب کنید...</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label>نوع</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="customer" name="type[]" value="مشتری">
                            <label class="form-check-label" for="customer">مشتری</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="supplier" name="type[]" value="تامین کننده">
                            <label class="form-check-label" for="supplier">تامین کننده</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="shareholder" name="type[]" value="سهامدار">
                            <label class="form-check-label" for="shareholder">سهامدار</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="employee" name="type[]" value="کارمند">
                            <label class="form-check-label" for="employee">کارمند</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dx-nav-bar mt-4 border">
            <div class="dx-tabs">
                <div class="dx-tab dx-tab-selected" onclick="showTab('general')">عمومی</div>
                <div class="dx-tab" onclick="showTab('address')">اطلاعات آدرس</div>
                <div class="dx-tab" onclick="showTab('contact')">تماس</div>
                <div class="dx-tab" onclick="showTab('bank')">حساب بانکی</div>
                <div class="dx-tab" onclick="showTab('other')">سایر</div>
            </div>
        </div>
        <div class="p-3">
            <div id="general" class="tab-content">
                <div class="row">
                    <div class="col-sm-4">
                        <label>اعتبار مالی</label>
                        <input type="number" class="form-control" name="financial_credit">
                    </div>
                    <div class="col-sm-4">
                        <label>لیست قیمت</label>
                        <select class="form-control" name="price_list">
                            <option>انتخاب کنید...</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>نوع مالیات</label>
                        <select class="form-control" name="tax_type">
                            <option>انتخاب کنید...</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <label>شناسه ملی</label>
                        <input type="text" class="form-control" name="national_code">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label>کد اقتصادی</label>
                        <input type="text" class="form-control" name="economic_code">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label>شماره ثبت</label>
                        <input type="text" class="form-control" name="registration_number">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <label>کد شعبه</label>
                        <input type="text" class="form-control" name="branch_code">
                    </div>
                    <div class="col-12">
                        <label>توضیحات</label>
                        <textarea class="form-control" rows="3" name="description"></textarea>
                    </div>
                </div>
            </div>
            <div id="address" class="tab-content hidden">
                <div class="row">
                    <div class="col-12">
                        <label>آدرس</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="col-sm-6">
                        <label>کشور</label>
                        <input type="text" class="form-control" name="country">
                    </div>
                    <div class="col-sm-6">
                        <label>استان</label>
                        <input type="text" class="form-control" name="state">
                    </div>
                    <div class="col-sm-6">
                        <label>شهر</label>
                        <input type="text" class="form-control" name="city">
                    </div>
                    <div class="col-sm-6">
                        <label>کدپستی</label>
                        <input type="text" class="form-control" name="postal_code">
                    </div>
                </div>
            </div>
            <div id="contact" class="tab-content hidden">
                <div class="row">
                    <div class="col-sm-4">
                        <label>تلفن</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="col-sm-4">
                        <label>موبایل</label>
                        <input type="text" class="form-control" name="mobile">
                    </div>
                    <div class="col-sm-4">
                        <label>فکس</label>
                        <input type="text" class="form-control" name="fax">
                    </div>
                    <div class="col-sm-4">
                        <label>تلفن ۱</label>
                        <input type="text" class="form-control" name="phone1">
                    </div>
                    <div class="col-sm-4">
                        <label>تلفن ۲</label>
                        <input type="text" class="form-control" name="phone2">
                    </div>
                    <div class="col-sm-4">
                        <label>تلفن ۳</label>
                        <input type="text" class="form-control" name="phone3">
                    </div>
                    <div class="col-sm-6">
                        <label>ایمیل</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="col-sm-6">
                        <label>وب سایت</label>
                        <input type="text" class="form-control" name="website">
                    </div>
                </div>
            </div>
            <div id="bank" class="tab-content hidden">
                <div class="row">
                    <div class="col-12">
                        <label>نام بانک</label>
                        <input type="text" class="form-control" name="bank_name">
                    </div>
                    <div class="col-12">
                        <label>شماره حساب</label>
                        <input type="text" class="form-control" name="account_number">
                    </div>
                    <div class="col-12">
                        <label>شماره کارت</label>
                        <input type="text" class="form-control" name="card_number">
                    </div>
                    <div class="col-12">
                        <label>شماره شبا</label>
                        <input type="text" class="form-control" name="sheba_number">
                    </div>
                </div>
            </div>
            <div id="other" class="tab-content hidden">
                <div class="row">
                    <div class="col-sm-4">
                        <label>تاریخ تولد</label>
                        <input type="date" class="form-control" name="birth_date">
                    </div>
                    <div class="col-sm-4">
                        <label>تاریخ ازدواج</label>
                        <input type="date" class="form-control" name="marriage_date">
                    </div>
                    <div class="col-sm-4">
                        <label>تاریخ عضویت</label>
                        <input type="date" class="form-control" name="membership_date">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <button type="submit" class="btn btn-success w-100">ذخیره</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-secondary w-100" onclick="window.location.href='/project/public/persons'">انصراف</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showTab(tabName) {
        const tabs = document.querySelectorAll('.tab-content');
        tabs.forEach(tab => tab.classList.add('hidden'));

        const selectedTab = document.getElementById(tabName);
        selectedTab.classList.remove('hidden');

        const tabButtons = document.querySelectorAll('.dx-tab');
        tabButtons.forEach(button => button.classList.remove('dx-tab-selected'));

        const selectedButton = document.querySelector(`[onclick="showTab('${tabName}')"]`);
        selectedButton.classList.add('dx-tab-selected');
    }
</script>