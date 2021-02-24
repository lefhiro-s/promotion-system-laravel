  <div class="container row">
    <div class="col-md-10">
        <h4 class="title-conditions">Lista de Condiciones</h4> 
    </div>
    <div class="col-md-2 text-right">
        <button class="btn btn-primary create-data create-conditions" value="conditions">Agregar</button>
    </div>
  </div>
  <br>
  <div class="container-table-conditions">
    <table class="table conditions-table table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Promoción</th>
          <th scope="col">Descripción</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($conditions as $condition)
          <tr>
            <td>{{$condition->id}}</td>
            <td>{{$condition->title_main}}</td>
            <td>{!!$condition->description!!}</td>
            <td><button class="btn btn-warning edit-button edit-conditions" onclick="promotions._editConditions({{$condition->id}})">
                <i class="fa fa-edit"></i>Editar</button></td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
  <form class="form-horizontal form-conditions" method="POST" style="display:none" action="{{route('storeCondition')}}">
    @csrf
      <input id="tab" name="tab" type="hidden" class="form-control" value="conditions" />
      <input id="id" name="id" type="hidden" class="id_conditions form-control" value="" />
      <div class="form-group row">
        <label class="text-right col-form-label col-md-2 col-sm-3 col-xs-12" for="id_promotion">Promoción</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="id_promotion" name="id_promotion" class="promotion_id_condition form-control @error('id_promotion') is-invalid @enderror">
              @foreach ($promotions as $promotion)
                <option {{ old('id_promotion') == $promotion->id ? 'selected' : '' }} value="{{$promotion->id}}">{{$promotion->title_main}}</option>
              @endforeach
            </select>
            @error('id_promotion')
                <span class="col-md-6 text-danger error-create-conditions">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="form-group row">
        <label class="text-right col-form-label col-md-2 col-sm-3 col-xs-12" for="description_conditions">Descripción</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <textarea id="description_conditions" name="description_conditions" type="text" class="description_conditions form-control @error('description_conditions') is-invalid @enderror">{{old('description_conditions')}}</textarea>
          @error('description_conditions')
            <span class="col-md-6 text-danger error-create-conditions">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-md-2 col-md-6 col-sm-6 col-xs-12">
            <button type="submit" class="btn btn-primary add-conditions">Guardar</button>
            <button type="reset" class="btn btn-default back-list" value="conditions">Volver</button>
        </div>
      </div>
  </form>