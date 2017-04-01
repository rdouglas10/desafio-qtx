<div class="container main">   
  	<div class="page-header">
  		<h1>Elaborador Profile</h1>
  	</div>
	
	    <div class="well">			
			<p>Nessa área estão listadas todas as propostas criadas.</p>
		</div>
		<div class="well">
			<a href="<?php echo site_url('elaborador/add'); ?>" class="glyphicon glyphicon-plus-sign btn btn-primary" role="button" aria-pressed="true"></a>
		</div>
		<?php if($query_propostas): ?>
		
		<?php  if(isset($alert_message)): ?> 
			<div class="alert alert-<?php echo $type_alert; ?>"><?php echo $alert_message; ?></div> 
		<?php endif; ?>

		<table class="table table-striped">
			<thead>
			    <tr>
			        <th>#</th>
			        <th>Descrição</th>
			        <th>Data de criação</th>
			        <th>Status</th>
			        <th>Ativo</th>
			        <th>Ações</th>
			    </tr>
			</thead>
			<tbody>
				<?php foreach ($query_propostas as $key => $value): ?>
			    <tr>
			        <th><?php echo $value['id']; ?></th>
			        <th><?php echo $value['descricao']; ?></th>
			        <th><?php echo $value['data_criacao']; ?></th>
			        <th><?php echo $value['status']; ?></th>
			        <th><?php echo $value['ativo']; ?></th>
			        <th>
			        	<a href="<?php  echo site_url('elaborador/send/'.$value['id'])?>">
			        	<button type="button" class="btn btn-info">Enviar</button> </a>
			        	<a href="<?php  echo site_url('elaborador/desativar/'.$value['id'])?>">
			        	<button type="button" class="btn btn-danger">Desativar</button></a>
			        </th>
			        <!--<th><a href="<?php  echo site_url('elaborador/edit/'.$value['id'])?>">Editar</a></th>-->
			    </tr>
			    <?php endforeach; ?>
			</tbody>
		</table>
		<?php echo $pagination; ?>
	<?php endif; ?>
</div>