<div class="container main">   
  	<div class="page-header">
  		<h1>Elaborador Profile</h1>
  	</div>
	
	    <div class="well">			
			<p>Nessa área o elaborador irá EDITAR as propostas.</p>
		</div>
		
	<div class="container">
		<form action="" method="post" class="form-horizontal">
			<fieldset>

			<!-- Form Name -->
			<legend>Editar proposta</legend>

			<?php  if(validation_errors()){ ?> <div class="alert alert-warning"><?php echo validation_errors(); ?></div> <?php } ?>
			<!-- Textarea -->
			<?php $error = form_error("username", "<p class='text-danger'>", '</p>'); ?> 
			<div class="form-group <?php echo $error ? 'has-error' : '' ?>">
			  <label class="col-md-4 control-label" for="textarea">Descrição</label>
			  <div class="col-md-4">                     
			    <textarea class="form-control" id="textarea" name="descricao" placeholder="descreva a proposta..."></textarea>
			  </div>
			  <?php echo $error; ?>
			</div>

			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="selectbasic">Serviços</label>
			  <div class="col-md-4">
			    <select id="selectbasic" name="servicos_id" class="form-control">			      
			      <?php foreach ($query_servicos as $key => $value): ?>
			      	<option value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>
			      <?php endforeach; ?>
			    </select>
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="selectbasic">Status da proposta</label>
			  <div class="col-md-4">
			    <select id="selectbasic" name="status" class="form-control">
			      <option value="EE">Em Elaboração</option>
			    </select>
			  </div>
			</div>

			<!-- Multiple Radios -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="radios">Ativar proposta</label>
			  <div class="col-md-4">
			  <div class="radio">
			    <label for="radios-0">
			      <input type="radio" name="ativo" id="radios-0" value="S" checked="checked">
			      Sim
			    </label>
				</div>
			  <div class="radio">
			    <label for="radios-1">
			      <input type="radio" name="ativo" id="radios-1" value="N">
			      Não
			    </label>
				</div>
			  </div>
			</div>

			<!-- Button (Double) -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="button1id"></label>
			  <div class="col-md-8">
			  	<input type="hidden" name="user_id" value="<?php echo $id_user; ?>" />
			    <input type="submit" id="button1id" name="button1id" class="btn btn-success" value="Enviar">
			    <input type="reset" id="button2id" name="button2id" class="btn btn-danger" value="Cancelar">
			  </div>
			</div>

			</fieldset>
		</form>

	</div>
</div>