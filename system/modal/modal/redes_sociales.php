<div class="modal" id="<? echo $_GET["modal"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Titulo del modal</h5>
      </div>
      <div class="modal-body">
<!-- ./  content -->
<div id="msj"></div>

 <form id="form-redes">



  <div class="form-row">

    <div class="col-md-6 mb-1 md-form">
      <label for="facebook">* Facebook. Eje. @hibridosv</label>
      <input type="text" class="form-control" id="facebook" name="facebook" value="<?php echo $facebook; ?>">
    </div>


    <div class="col-md-6 mb-1 md-form">
      <label for="instagram">* Instagram. Eje. @hibridosv</label>
      <input type="text" class="form-control" id="instagram" name="instagram" value="<?php echo $instagram; ?>">
    </div>

  </div> 


  <div class="form-row">

    <div class="col-md-6 mb-1 md-form">
      <label for="twitter">* Twitter. Eje. @hibridosv</label>
      <input type="text" class="form-control" id="twitter" name="twitter" value="<?php echo $twitter; ?>">
    </div>


    <div class="col-md-6 mb-1 md-form">
      <label for="whatsapp">* WhatsApp Eje. +50378541247</label>
      <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?php echo $whatsapp; ?>">
    </div>

  </div> 


  <div class="form-row">
        <div class="col-6 my-6 md-form text-left">
    </div>
    <div class="col-6 my-6 md-form text-right">
     <button class="btn btn-info btn-rounded my-4" type="submit" id="btn-redes"><i class="fas fa-user mr-1"></i> Guardar </button>

    </div>
  </div>

</form>

<!-- ./  content -->
      </div>
      <div class="modal-footer">

          <a href="?iconos" class="btn btn-primary btn-rounded">Regresar</a>
    
      </div>
    </div>
  </div>
</div>
<!-- ./  Modal -->