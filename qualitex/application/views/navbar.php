<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	      	</button>
	      	<a class="navbar-brand" href="#">Qualitex E.S.</a>
		</div>  
  		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">		  		
	  		<ul class="nav navbar-nav">
		        <li class="active"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a></li>
				<li><a href="<?php echo site_url("elaborador") ?>">Elaborador</a></li>              
				<li><a href="<?php echo site_url("aprovador") ?>">Aprovador</a></li> 
				<!-- <li><a href="<?php echo site_url("cliente") ?>">Cliente</a></li>  -->
		    </ul>
		    <ul class="nav navbar-nav navbar-right">		        
				<li><a href="<?php echo site_url("auth/logout") ?>">logout</a></li> 
		    </ul>
	    </div>
	</div>
</nav>