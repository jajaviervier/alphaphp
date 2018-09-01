<div class="modal fade" id="modal-insertar-funcionarios"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo funcionario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formu-nuevo-funcionarios">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nombres</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Ingrese el nombre" required name="nombreFuncionarios">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Apellidos</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Ingrese el apellido" required name="apellidoFuncionarios">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Rut</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Ingrese el Rut" required name="rutFuncionarios">
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label">Fecha Nacimiento</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" required name="nacFuncionarios">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Fono</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" required name="fonoFuncionarios">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Fotografia</label>
            <div class="col-sm-10 conteEditarImagen">
              <input type="file" class="form-control"  id="imagenEditar" name="imagenFuncionarios">
              <br>
              <img src="" id="imagenFuncionarios" alt="" class="thumbnail " width="100%;  ">

            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Arma de servicio</label>
            <div class="col-sm-10">
              <select id="armaFuncionario" name="armaFuncionario" class="form-control">
              <option value="1">
              Arma 1
              </option>
              <option value="2">
              Arma 2
              </option>
              <option value="3">
              Arma 3
              </option>
               </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Casco</label>
            <div class="col-sm-10">
              <select id="cascoFuncionario" name="cascoFuncionario" class="form-control">
              <option value="1">
              Casco 1
              </option>
              <option value="2">
              Casco 2
              </option>
              <option value="3">
              Casco 3
              </option>
               </select>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-sm-2 col-form-label" >Escudo</label>
            <div class="col-sm-10">
              <select id="cascoFuncionario" class="form-control" name="escudoFuncionario">
              <option value="1">
              Escudo 1
              </option>
              <option value="2">
              Escudo 2
              </option>
              <option value="3">
              Escudo 3
              </option>
               </select>
            </div>
          </div>
   
       
          <input type="hidden" name="tipoOperacion" value="insertarFuncionarios">
          <input type="hidden" name="rutaActual">
          <input type="hidden" name="id_Funcionarios">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- EDITAR SLIDER -->
<div class="modal fade" id="modal-editar-subFuncionarios"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Funcionario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formu-nuevo-funcionarios">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nombres</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Ingrese el nombre" required name="nombreFuncionarios">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Apellidos</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Ingrese el apellido" required name="apellidoFuncionarios">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Rut</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Ingrese el Rut" required name="rutFuncionarios">
            </div>
          </div>

           <div class="form-group row">
            <label class="col-sm-2 col-form-label">Fecha Nacimiento</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" required name="nacFuncionarios">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Fono</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" required name="fonoFuncionarios">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Fotografia</label>
            <div class="col-sm-10 conteEditarImagen">
              <input type="file" class="form-control"  id="imagenEditar" name="imagenFuncionarios">
              <br>
              <img src="" id="imagenFuncionarios" alt="" class="thumbnail " width="100%;  ">

            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Arma de servicio</label>
            <div class="col-sm-10">
              <select id="armaFuncionario" name="armaFuncionario" class="form-control">
              <option value="1">
              Arma 1
              </option>
              <option value="2">
              Arma 2
              </option>
              <option value="3">
              Arma 3
              </option>
               </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Casco</label>
            <div class="col-sm-10">
              <select id="cascoFuncionario" name="cascoFuncionario" class="form-control">
              <option value="1">
              Casco 1
              </option>
              <option value="2">
              Casco 2
              </option>
              <option value="3">
              Casco 3
              </option>
               </select>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-sm-2 col-form-label" >Escudo</label>
            <div class="col-sm-10">
              <select id="cascoFuncionario" class="form-control" name="escudoFuncionario">
              <option value="1">
              Escudo 1
              </option>
              <option value="2">
              Escudo 2
              </option>
              <option value="3">
              Escudo 3
              </option>
               </select>
            </div>
          </div>
   
       
          <input type="hidden" name="tipoOperacion" value="insertarFuncionarios">
          <input type="hidden" name="rutaActual">
          <input type="hidden" name="id_Funcionarios">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Perfil -->
<div class="modal fade" id="modal-ver-subFuncionarios"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar subCategorias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 <div class="row">
 


<div class"col-sm-4 offset-sm-4">
foto
 </div>
 </div>


 <div class="row">
  
 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        

      </div>
    </div>
  </div>
</div>