<section class="search-sec xs-my">
    <div class="container box-shadow bg-white radius-md">
        <form action="./complete.php" method="post" id="mainform_action">
            <div class="row">
                <div class="col-lg-12 font-14">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-12 p-0 hb_form xs-pt xxs-pt-mobile xxs-pb">
                            <label class="uk-form-label" for="form-stacked-text">ЗВІДКИ?</label>
                            <input type="text" class="form-control" id="otkuda" name="otkuda" placeholder="Пункт отправления" list="routes" required>
                            <datalist id="routes">
								@foreach ($dist_r_from as $from)
									<option value="{{ $from->r_from }}">
								@endforeach
								@foreach ($dist_r_to as $to)
									<option value="{{ $to->r_to }}">
								@endforeach
                            </datalist>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12 p-0 hb_form xs-pt xxs-pt-mobile xxs-pb">
                            <label class="uk-form-label" for="form-stacked-text">КУДИ?</label>
                            <input type="text" class="form-control" id="kuda" name="kuda" placeholder="Пункт прибытия" list="routes2" required>
                            <datalist id="routes2">
								@foreach ($dist_r_to as $to)
									<option value="{{ $to->r_to }}">
								@endforeach
								@foreach ($dist_r_from as $from)
									<option value="{{ $from->r_from }}">
								@endforeach
                            </datalist>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12 p-0 hb_form xs-pt xxs-pt-mobile xxs-pb">
                            <label class="uk-form-label" for="form-stacked-text">ХТО ЇДЕ?</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Имя клиента" required>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12 p-0 hb_form xs-pt xxs-pt-mobile xxs-pb">
                            <label class="uk-form-label" for="form-stacked-text">НОМЕР ТЕЛЕФОНУ</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="___ ___ __ __" required>
                        </div>

                        <div class="col-lg-2 col-md-2 col-12 p-0 hb_form xs-pt xxs-pt-mobile xxs-pb">
                            <label class="uk-form-label" for="form-stacked-text">ДАТА</label>
                            <input type="date" name="date" id="nowdate" class="form-control hb-input"  placeholder="__/__/____" required>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-12 p-0 hb_form">
                            <button type="submit" class="btn wrn-btn zamir hb_bottom_zabronirovat">ЗАБРОНЮВАТИ</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>