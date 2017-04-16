<div class="panel panel-default">
	<div class="panel-heading">Директории</div>
  	<div class="panel-body">
  		<div class="row">
  			<div class="col-lg-6">	
  				<form class="form-inline" role="form">
				  	<div class="form-group">
				    	<input type="text" class="form-control" id="newDerectory" placeholder="Название новой директории">
				  	</div>
  					<a href="#" class="btn btn-sm btn-primary" onclick="addNewDirectory()">Создать новую</a>
				</form>
  			</div>
  		</div>
  		<hr/>
  		<div class="row" id="dirs">
  			<?php
				//var_dump($files);
				$count = 0;
				foreach ($files as $file) {
					$count += 1;
					if($count > 2){
						if(!stristr($file, '.')){
							$dirs = $dir.'/'.$file;
							echo '<div class="col-lg-2"><center><a href="#" onclick="openFolder(\''.$dirs.'\',\''.$file.'\')"><img src="/img/folder.jpg" width="100px"><p>'.$file.'</p></a></center></div>';
						}

					}
				}
			?>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading" id="files-header">Файлы</div>
  	<div class="panel-body">
  		<div class="row">
  			<div class="col-lg-2">
  				Загрузка файла:
  			</div>
  			<div class="col-lg-2">
  				<input type="file" id="uploadFile">	
  			</div>
  			
  		</div>
  		<hr/>
  		<div class="row" id="files">
			<?php
				$count = 0;
				foreach ($files as $file) {
					$count += 1;
					if($count > 2){
						if(stristr($file, '.')){
							echo '<div class="col-lg-2"><center><div style="height:200px;"><img src="'.$dir_foto.'/'.$file.'" width="100px"><p>'.$file.'</p></div></center></div>';
						}

					}
				}
			?>
		</div>
	</div>
</div>
<input type="hidden" value="/web/img" id="uploadDir">