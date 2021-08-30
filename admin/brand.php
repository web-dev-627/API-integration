<?php  
// $con = dbCon();

// $q = mysqli_query($con, "SELECT * FROM shop_brand");
// if(mysqli_num_rows($q) > 0) {	
// 	$fetch = mysqli_fetch_all_n($q, MYSQLI_ASSOC);
// }

$con = dbCon();

$tr = '';

$q = mysqli_query($con, "SELECT * FROM shop_brand");
if(mysqli_num_rows($q) > 0) {
	
	$fetch = mysqli_fetch_all_n($q, MYSQLI_ASSOC);
	$i = 0;
	foreach($fetch as $f) {	

		if($f['picture'] != '') {
			$imageLink = '<a href="../uploads/tyreImg/'.$f['picture'].'" target="_blank">View</a>';
		}
		
		$bSelect = $mSelect = $pSelect = '';
		if($f['category'] == 'budget') { $bSelect = 'selected'; }
		else if($f['category'] == 'mellom') { $mSelect = 'selected'; }
		else if($f['category'] == 'premium') { $pSelect = 'selected'; }

		$seasonS = $seasonW = $season = $seasonWS = '';
		if($f['season'] == 'summer') { $seasonS = 'selected'; $season="Sommerdekk";}
		else if($f['season'] == 'winter') { $seasonW = 'selected'; $season="Vinterdekk - piggfrie";}
		else if($f['season'] == 'winterStudded') { $seasonWS = 'selected'; $season="Vinterdekk - piggdekk";}
		
		$categorySelect = '<select id="category'.$f['id'].'" class="form-control form-control-sm txtInput editField'.$f['id'].'" style="display:none; font-weight:bold; width:100px;">
						<option value="budget" '.$bSelect.'>Budget</option>
						<option value="mellom" '.$mSelect.'>Mellom</option>
						<option value="premium" '.$pSelect.'>Premium</option>
					</select>';

		$seasonSelect = '<select id="season'.$f['id'].'" class="form-control form-control-sm txtInput editField'.$f['id'].'" style="display:none; font-weight:bold; width:100px;">
						<option value="summer" '.$seasonS.'>Sommerdekk</option>
						<option value="winter" '.$seasonW.'>Vinterdekk - piggfrie</option>
						<option value="winterStudded" '.$seasonWS.'>Vinterdekk - piggdekk</option>

					</select>';
			if(isset($f['tyre_info'])) {
			$tyreInfo = $f['tyre_info'];
			$readInfoLink = '<button href="#" class="btn btn-sm py-0 m-0 btn-outline-primary editButton'.$f['id'].' button'.$f['id'].'" data-toggle="modal" data-target="#tyreModal" data-tyreid="'.$f['id'].'" data-mode="readonly">View</button>';
			$editInfoLink = '<button href="#" class="btn btn-sm py-0 m-0 btn-outline-warning saveButton'.$f['id'].' button'.$f['id'].'" data-toggle="modal" data-target="#tyreModal" data-tyreid="'.$f['id'].'" data-mode="edit" style="display:none;">Change</button>';
		}
		$i++;		
		$tr .= '<tr>
				<textarea id="tyreInfo'.$f['id'].'" hidden="hidden">'.$tyreInfo.'</textarea>
				<td><span class="txtField'.$f['id'].'">'.$i.'</span></td>
				<td>
					<span class="txtField'.$f['id'].'">'.$f['brand_name'].'</span>
					<input type="text" class="form-control form-control-sm txtInput editField'.$f['id'].'" value="'.$f['brand_name'].'" id="brand'.$f['id'].'" style="display:none; font-weight:bold; ">	
				</td>
				<td>
					<span class="txtField'.$f['id'].'">'.$f['model_name'].'</span>
					<input type="text" class="form-control form-control-sm txtInput editField'.$f['id'].'" value="'.$f['model_name'].'" id="model'.$f['id'].'" style="display:none; font-weight:bold; ">	
				</td>
				<td>
					<span class="txtField'.$f['id'].'">'.$f['category'].'</span>
					'.$categorySelect.'	
				</td>
				<td>
					<span class="txtField'.$f['id'].'">'.$f['speed'].'</span>
					<input type="text" class="form-control form-control-sm txtInput editField'.$f['id'].'" value="'.$f['speed'].'" id="speed'.$f['id'].'" style="display:none; font-weight:bold; ">	
				</td>
				<td>
					<span class="txtField'.$f['id'].'">'.$f['load'].'</span>
					<input type="text" class="form-control form-control-sm txtInput editField'.$f['id'].'" value="'.$f['load'].'" id="load'.$f['id'].'" style="display:none; font-weight:bold; ">	
				</td>
				<td>
					<span class="txtField'.$f['id'].'">'.$f['drivstoff_forbruk'].'</span>
					<input type="text" class="form-control form-control-sm txtInput editField'.$f['id'].'" value="'.$f['drivstoff_forbruk'].'" id="forbru'.$f['id'].'" style="display:none; font-weight:bold; ">	
				</td>
				<td>
					<span class="txtField'.$f['id'].'">'.$f['stoy_niva'].'</span>
					<input type="text" class="form-control form-control-sm txtInput editField'.$f['id'].'" value="'.$f['stoy_niva'].'" id="niva'.$f['id'].'" style="display:none; font-weight:bold; ">	
				</td>
				<td>
					<span class="txtField'.$f['id'].'">'.$f['vat_grep'].'</span>
					<input type="text" class="form-control form-control-sm txtInput editField'.$f['id'].'" value="'.$f['vat_grep'].'" id="grep'.$f['id'].'" style="display:none; font-weight:bold; ">	
				</td>
				<td>
					<span class="txtField'.$f['id'].'">'.$season.'</span>
					'.$seasonSelect.'	
				</td>

				<td>
					<span class="txtField'.$f['id'].'">'.$imageLink.'</span>
					 <input type="file" class="form-control-file editField'.$f['id'].'" id="image'.$f['id'].'" style="display:none;">
					<div id="imageUploadBar'.$f['id'].'" style="display:none;"><img src="../images/Rolling.gif" id="uploadLoading'.$f['id'].'" style="width:20px; margin-right:10px;" /> <span id="uploadPerc'.$f['id'].'" style=""></span>%</div>
				</td>
				<td>
					<span class="txtField'.$f['id'].'">'.$readInfoLink.'</span>
					'.$editInfoLink.'
				</td>
										
				
				<td>
					<button class="btn btn-sm btn-outline-warning py-0 m-0 editButton'.$f['id'].' button'.$f['id'].'" data-id="'.$f['id'].'" onclick="edit('.$f['id'].')">Edit</button>
					<button class="btn btn-sm btn-outline-success py-0 m-0 saveButton'.$f['id'].' button'.$f['id'].'" data-id="'.$f['id'].'" onclick="saveNew('.$f['id'].')" style="display:none;">Save</button>
					<button class="btn btn-sm btn-outline-danger py-0 m-0 editButton'.$f['id'].' button'.$f['id'].'" data-id="'.$f['id'].'" onclick="deleteRow(\'brand\', '.$f['id'].', 1)">Delete</button>
				</td>
				</tr>';
		
	}
}

?>
<div class=" card px-0 m-2" style="overflow:auto; box-shadow:0px 2px 2px #ccc;">
		<div class="card-header">
			Add Brand
		</div>
		<div class="card-body">
			<div class="row">					
				
				<div class="input-group input-group-sm">
					<div class="input-group-append">
						<button class="btn btn-success search " style="position: absolute; right:20px;   width:100px;" data-toggle="modal" data-target="#addmodal">Add New</button>
					</div>
				</div>
				
			</div>
		
			
			<table class="table table-hover table-sm" style="margin-top:30px; font-size:17px;">
				<thead class="thead" >
					<tr>
						<th scope="col">#</th>
						<th scope="col">Brand</th>
						<th scope="col">Model</th>
						<th scope="col">Category</th>
						<th scope="col">Speed</th>
						<th scope="col">Load</th>
						<th scope="col">Drivstoff forbruk</th>
						<th scope="col">støy nivå</th>
						<th scope="col">Våt Grep</th>
						<th scope="col">Season</th>
						<th scope="col">Pictures</th>
						<th scope="col">Tyre Info</th>
						<th scope="col">Action</th>
						<th></th>
					</tr>
					</thead>
					<tbody id="tyreBody">
					<?php echo $tr; ?>
					</tbody>
				</table>
		</div>
	</div>
</div>

<!-- model -->


<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tyreInfoModal">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form id="addTyreForm" enctype="multipart/form-data" method="post">
			<input type="hidden" name="method" value="brand">
			<div class="form-group row" style = "margin-top:20	px">
			    <div class = "col-sm-4">
					<label class="col-sm-4" for="brandName">BrandName</label>
				</div>
				<div class = "col-sm-8">
					<input type="text"class="form-control modal_form" name="brandName">
				</div>		
			</div>
			<div class="form-group row"  style = "margin-top:20px">
				<div class = "col-sm-4"><label class="co-sm-4">Model name</label></div>
				<div class = "col-sm-8"><input type="text"class="form-control modal_form" name="model_name"></div>			
			</div>
			<div class="form-group row" style = "margin-top:20px">
			<div class = "col-sm-4"><label class="co-sm-4">Category</label></div>
			<div class = "col-sm-8">
				<select  class="form-control modal_form" name="Category">
					<option>mellom</option>
					<option>budget</option>
					<option>premium</option>
				</select>
			</div>
				
				
			</div>
			<div class="form-group row" style = "margin-top:20px">
				<div class = "col-sm-4"><label class="co-sm-4">Speed</label></div>
				<div class = "col-sm-8"><input type="text"class="form-control modal_form" name="Speed"></div>
				
				
			</div>
			<div class="form-group row" style = "margin-top:20px">
				<div class = "col-sm-4"><label class="co-sm-4">Load</label></div>
				<div class = "col-sm-8"><input type="text"class="form-control modal_form" name="Load"></div>
				
				
			</div>
			<div class="form-group row" style = "margin-top:20px">
				<div class = "col-sm-4"><label class="co-sm-4">Drivstoff forbruk</label></div>
				<div class = "col-sm-8"><input type="text"class="form-control modal_form" name="Drivstoff_forbruk"></div>
				
				
			</div>
			<div class="form-group row" style = "margin-top:20px">
				<div class = "col-sm-4"><label class="co-sm-4"> støy nivå</label></div>
				<div class = "col-sm-8"><input type="text"class="form-control modal_form" name="Stoy_niva"></div>
			</div>
			<div class="form-group row" style = "margin-top:20px">
				<div class = "col-sm-4"><label class="co-sm-4"> våt grep</label></div>
				<div class = "col-sm-8"><input type="text"class="form-control modal_form" name="vat_grep"></div>
				
				
			</div>
			<div class="form-group row" style = "margin-top:20px">
				<div class = "col-sm-4"><label class="co-sm-4">Season</label></div>
				<div class = "col-sm-8">
					
					<select class="form-control modal_form" name="Season"> 
				    	<option value="summer">Sommerdekk</option>
						<option value="winter">Vinterdekk - piggfrie</option>
						<option value="winterStudded">Vinterdekk - piggdekk</option>
						
					</select>
				</div>
				
				
			</div>
			<div class="form-group row" style = "margin-top:20px">
				<div class = "col-sm-4"><label class="co-sm-4">Pictures</label></div>
				<div class = "col-sm-8"><input type="file"  id="image" name="image" accept="image/*" style = "max-width:700px;overflow:hidden"/></div>
				
				
			</div>
			<div class="form-group row" style = "margin-top:20px">
				<div class = "col-sm-4"><label class="co-sm-4">Tyre Info</label></div>
				<div class = "col-sm-8"><textarea rows="10" type="text" name="Tyre_Info"class="form-control modal_form" > </textarea></div>
				
				
			</div>
			<input type="submit" id="add_brand_btn" class="btn btn-primary" style="margin-left:40px" name="addTyre" value="Add">
		</form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tyreModal" tabindex="-1" role="dialog" aria-labelledby="tyreInfoModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tyreInfoModal">Tyre Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <textarea class="form-control" id="tyreInfo" style="height:250px;"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="saveModalButton" style="display:none;">Save</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelModalButton">Cancel</button>
      </div>
    </div>
  </div>
</div>


<style type="text/css">
	label 
	{
		padding-left:40px !important;
	}
	.form-control 
	{
		width:90% !important;
	}
</style>

<script>
var isEditPossible = true;
var emptyFields = 0;
variables = new Array();

$('#tyreModal').on('show.bs.modal', function (e) {
	var button = $(e.relatedTarget);
	var mode = button.data('mode');
	var id = button.data('tyreid');
	variables['tyreID'] = id;
	if(mode == 'readonly') {
		$('#tyreInfo').prop('readonly', true);
		$('#saveModalButton').hide();
	}else if(mode == 'edit') {
		$('#tyreInfo').prop('readonly', false);
		$('#saveModalButton').show();
	}
	
	var tyreInfo = $('#tyreInfo'+id).val();
	$('#tyreInfo').val(tyreInfo);
	
});

$('#saveModalButton').on('click', function() {
	var id = variables['tyreID'];
	var newInfo = $('#tyreInfo').val();
	$('#tyreInfo'+id).val(newInfo);
	$('#tyreModal').modal('hide');
});

$('#add_brand_btn').on('click', function(event) {
	event.preventDefault();
	$('.modal_form').each(function() {
		if($(this).val() == '') {
			//showModal('Empty Fields', 'All the fields are required');
			emptyFields = 1;
		}
	});
	if(emptyFields == 1) { showAlert('danger', 'All the fields are required'); return; }
	
	var form = document.getElementById('#addTyreForm');
	showLoadingBar(1);
	fetchA('addTyreForm', function (result) {
		console.log(result);
		hideLoadingBar();
		var e = JSON.parse(result);
		if(e[0] == 'success') {
			showAlert('success', 'Successfully added the brand');
			location.reload(true);
		}else if(e[0] == 'no admin') {
			showAlert('danger', 'You are not logged in as admin');
		}else if(e[0] == 'empty') {
			showAlert('danger', 'All the fields are required');
		}else if(e[0] == 'no image') {
			showAlert('danger', 'No image selected');
		}else if(e[0] == 'image required') {
			showAlert('danger', 'Only images are allowed');
		}else if(e[0] == 'already added') {
			showAlert('danger', 'Same brand has been already added');
		}else {
			showAlert('danger', 'Technical error, contact developer');
		}
	}, 1);
	
});

function edit(i) {
	if(!isEditPossible) return;
	$('.txtField'+i).hide();
	$('.editField'+i).show();
	$('.editButton'+i).hide();
	$('.saveButton'+i).show();
	isEditPossible = false;
}

function save(i) {
	alert(1);
	var brand = $('#brand'+i).val();
	var model = $('#model'+i).val();
	var speed = $('#speed'+i).val();
	var category = $('#category'+i).val();
	var load = $('#load'+i).val();
	var forbru = $('#forbru'+i).val();
	var niva = $('#niva'+i).val();
	var season = $('#season'+i).val();
	var pic = $('#picture'+i).val();
	var image = '';
	
	
	showLoadingBar(1);
	var url = 'method=saveBrandInfo&category='+category+'&brand='+brand+'&model='+model+'&speed='+speed+'&load='+load+'&forbru='+forbru+'&niva='+niva+'&season='+season+'&pic='+pic+'&noise='+noise+'&image='+image+'&id='+i;
	fetchA(url, function(result) {
		hideLoadingBar();
		var e = JSON.parse(result);
		console.log("aaaa");
		if(e[0] == 'success') {
			showAlert('success', 'Successfully saved the changes');
			location.reload(true);
		}else if(e[0] == 'no admin') {
			showAlert('danger', 'You are not logged in as admin');
		}else if(e[0] == 'no tyre') {
			showAlert('danger', 'Tyre not found');
		}else {
			showAlert('danger', 'Technical error, contact developer');
		}
	});
}

function saveNew(i) {
	
	var category = $('#category'+i).val();
	var brand = $('#brand'+i).val();
	var model = $('#model'+i).val();
	var speed = $('#speed'+i).val();
	var load = $('#load'+i).val();
	var forb = $('#forbru'+i).val();
	var niva = $('#niva'+i).val();
	var grep = $('#grep'+i).val();
	var season = $('#season'+i).val();
	var image = $('#image'+i)[0].files[0];
	//var image = $('#image'+i).prop('files');
	// var image = $('#image'+i)[0].files[0];
	var tyreInfo = $('#tyreInfo'+i).val();

	var fd = new FormData();
	fd.append("method", "saveBrandInfo");
	fd.append("id",i);
	fd.append("category", category);
	fd.append("brand", brand);
	fd.append("model", model);
	fd.append("speed", speed);
	fd.append("load", load);
	fd.append("forbru", forb);
	fd.append("niva", niva);
	fd.append("grep", grep);
	fd.append("season", season);
	fd.append("image", image);
	fd.append("tyreInfo", tyreInfo);

	$('#image'+i).hide();
	$('#imageUploadBar'+i).show();
	$('#uploadLoading'+i).show();
	$('#uploadPerc'+i).html('0');
	
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'queryAdmin.php', true);
	//xhr.setRequestHeader("Content-Type" ,"application/x-www-form-urlencoded");
	
	xhr.upload.onprogress = function(e) {
		if (e.lengthComputable) {
			var percentComplete = (e.loaded / e.total) * 100;
			$('#uploadPerc'+i).html(percentComplete);
			if(percentComplete == 100) {
				$('#uploadLoading'+i).hide();
			}
		}
	};

	xhr.onload = function() {
		if (this.status == 200) {
			var e = JSON.parse(this.response);
			if(e[0] == 'success') {
				showAlert('success', 'Successfully saved the changes');
				location.reload(true);
			}else if(e[0] == 'no admin') {
				showAlert('danger', 'You are not logged in as admin');
			}else if(e[0] == 'no tyre') {
				showAlert('danger', 'Tyre not found');
			}else if(e[0] == 'image required') {
				showAlert('danger', 'Only image file acceptable');
			}else {
				showAlert('danger', 'Technical error, contact developer');
			}
			
			//var image = document.createElement('img');
			//image.src = resp.dataUrl;
			//document.body.appendChild(image);
		};
	};

	xhr.send(fd);
	isEditPossible = true;
}

</script>