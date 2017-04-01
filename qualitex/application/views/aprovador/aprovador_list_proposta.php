<div class="container main">   
  	<div class="page-header">
  		<h1>Aprovador Profile</h1>
  	</div>
	
	    <div class="well">			
			<p>Nessa área estão listadas todas as propostas enviadas pelos ELABORADORES aguardando para serem aprovadas ou não.</p>
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
			        	<a href="<?php  echo site_url('aprovador/dowload_proposta/'.$value['id'])?>">
			        	<button type="button" class="btn btn-default navbar-btn">Baixar</button></a>
			        	
			        	<a href="<?php  echo site_url('aprovador/aprovar/'.$value['id'])?>">
			        	<button type="button" class="btn btn-info">Aprovar</button></a>
			        	
			        	<a href="<?php  echo site_url('aprovador/recusar/'.$value['id'])?>">
			        	<button type="button" class="btn btn-danger">Recusar</button></a>
			        	
			        </th>	        
			    </tr>
			    <?php endforeach; ?>
			</tbody>
		</table>
		<?php echo $pagination; ?>
	<?php endif; ?>
  </div>