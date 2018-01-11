<!-- Form Starts -->
{!! Form::model($client, $formOptions) !!}
    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Nombre :</label>
        <div class="col-sm-9">
            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-3 control-label">Apellido :</label>
        <div class="col-sm-9">
            {!! Form::text('lastname', null, ['class' => 'form-control', 'id' => 'lastname']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="business_name" class="col-sm-3 control-label">Razón Social :</label>
        <div class="col-sm-9">
            {!! Form::text('business_name', null, ['class' => 'form-control', 'id' => 'business_name']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="phone" class="col-sm-3 control-label">Teléfono :</label>
        <div class="col-sm-9">
            {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email :</label>
        <div class="col-sm-9">
            {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    @if (!$client->id && $showPass)
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Contaseña :</label>
            <div class="col-sm-9">
                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
                <span class="help-block"></span>
            </div>
        </div>
    @endif
    <div class="form-group">
        <label for="street" class="col-sm-3 control-label">Calle :</label>
        <div class="col-sm-9">
            {!! Form::text('street', null, ['class' => 'form-control', 'id' => 'street']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="number" class="col-sm-3 control-label">Número :</label>
        <div class="col-sm-9">
            {!! Form::text('number', null, ['class' => 'form-control', 'id' => 'number']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="floor" class="col-sm-3 control-label">Piso :</label>
        <div class="col-sm-9">
            {!! Form::text('floor', null, ['class' => 'form-control', 'id' => 'floor']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="apartment" class="col-sm-3 control-label">Depto :</label>
        <div class="col-sm-9">
            {!! Form::text('apartment', null, ['class' => 'form-control', 'id' => 'apartment']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="neighborhood" class="col-sm-3 control-label">Barrio :</label>
        <div class="col-sm-9">
            {!! Form::text('neighborhood', null, ['class' => 'form-control', 'id' => 'neighborhood']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="zip_code" class="col-sm-3 control-label">Código Postal :</label>
        <div class="col-sm-9">
            {!! Form::text('zip_code', null, ['class' => 'form-control', 'id' => 'zip_code']) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="provincia" class="col-sm-3 control-label">Provincia :</label>
        <div class="col-sm-9">
            {!! \App\Provincia::toSelect($client) !!}
            <span class="help-block"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="localidad" class="col-sm-3 control-label">
            <span style="display: none" class="fa fa-spin fa-spinner"></span> Localidad :
        </label>
        <div class="col-sm-9">
            <select class="form-control" value="{{ old('localidad_id') }}" name="localidad_id" id="localidad">
                <option>Seleccionar</option>
            </select>
            <span class="help-block"></span>
        </div>
    </div>
    <input type="hidden" name="localidad_id_hidden" value="{{ ($client->id) ? $client->localidad_id : '' }}">
    <div class="form-group">
        <div class="checkbox col-sm-offset-2 terminos">
            <label>
                <input type="checkbox" name="condiciones" value="1">Aceptar términos y condiciones
            </label>
            <span class="help-block"></span>
            <br><a target="_blank" href="/terminos">Ver términos y condiciones</a>
        </div>
        <br>
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" id="comprar" class="btn btn-black">
                {{ $btn_txt }}
            </button>
        </div>
    </div>
{!! Form::close() !!}
<!-- Form Ends -->
