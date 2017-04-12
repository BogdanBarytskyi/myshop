@extends('main')

@section('content')

    <div class="container">
    <form class="form-horizontal" action="/order" method="post">
        <fieldset>

            <!-- Form Name -->
            <legend>Оформления заказа</legend>
            @if($errors->all())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
        {{ csrf_field() }}
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Имя</label>
                <div class="col-md-4">
                    <input id="name" name="user_name" type="text" placeholder="{{ old('user_name') }}" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="emailaddress">Email</label>
                <div class="col-md-4">
                    <input id="emailaddress" name="user_email" type="text" placeholder="Email" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="phone">Номер телефона</label>
                <div class="col-md-4">
                    <input id="phone" name="user_phone" type="text" placeholder="Номер телефон" class="form-control input-md" required="">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Адрес доставки</label>
                <div class="col-md-4">
                    <textarea   name="user_adres" type="text" placeholder="Адрес доставки" class="form-control input-md" required=""></textarea>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="dilivery">Способ доставки</label>
                <div class="col-md-4">
                    <select id="tourselection" name="dilivery" class="form-control">
                        <option value="Самовывоз">Самовывоз</option>
                        <option value="курьером">курьером</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="payment">Способ оплаты</label>
                <div class="col-md-4">
                    <select id="tourselection" name="payment" class="form-control">
                        <option value="Оплата картой">Оплата картой</option>
                        <option value="Оплата наличними">Оплата наличними</option>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-success" value="Оформить заказ ">
                </div>
            </div>


        </fieldset>
    </form>
    </div>

@endsection