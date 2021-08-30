<?php

$con = dbCon();

//get year select box from order table.
//year dropdown
if(isset($_POST['yearID'])) {
    $yearID = $_POST['yearID'];
}
else
    $yearID = 2021;
if(isset($_POST['monthID'])) {
    $monthID = $_POST['monthID'];
}

$year_tr = '';
$q_year = mysqli_query($con, "SELECT YEAR(changeDate) AS year FROM shop_invoice GROUP BY YEAR(changeDate)");
if(mysqli_num_rows($q_year) > 0) {
    $year_fetch = mysqli_fetch_all_n($q_year, MYSQLI_ASSOC);
    $year_Select = '<select name="yearID" class="form-control form-control-sm txtInput" onchange="changeYear(this)" style="font-weight:bold; ">';
    $year_Select .= '<option value="">Select Year</option>';
    foreach($year_fetch as $year_f) {
        if($yearID == $year_f['year'])
            $year_Select .= '<option value="'.$year_f['year'].'" selected>'.$year_f['year'].'</option>';
        else
            $year_Select .= '<option value="'.$year_f['year'].'" >'.$year_f['year'].'</option>';
    }
    $year_Select .= '</select>';
}


$month_Select = '<select name="monthID" class="form-control form-control-sm txtInput" onchange="changeMonth(this)" style="font-weight:bold; ">';
$month_Select .= '<option value="">Select Month</option>';
for ($j = 1; $j <= 12; $j++) {
    if($monthID == $j)
        $month_Select .= '<option value="'.$j.'" selected>'.$j.'</option>';
    else
        $month_Select .= '<option value="'.$j.'" >'.$j.'</option>';
}
$month_Select .= '</select>';

$bank_due = '';
$bank_account = '';
$q_bank = mysqli_query($con, "SELECT * FROM shop_bank limit 1");
if(mysqli_num_rows($q_bank) > 0) {
    $bank_fetch = mysqli_fetch_all_n($q_bank, MYSQLI_ASSOC);
    foreach($bank_fetch as $bank_f) {
        $bank_id .= '<input type="hidden" id="bank_id" value="'.$bank_f['id'].'">';
        $bank_due .= '<input type="text" class="form-control form-control-sm " id="due_period" placeholder="Due period" value="'.$bank_f['due_period'].'" style="font-weight:bold; width:100px;">';
        $bank_account .= '<input type="text" class="form-control form-control-sm " id="bank_account" placeholder="Account nr" value="'.$bank_f['account_in'].'" style="font-weight:bold; width:100px;">';
    }
}

$tr = '';
$i = 1;
$month = $monthID;
if($seen == 0) {
    $paidButton = '<button class="btn btn-sm btn-outline-success py-0 m-0" >Paid</button>';
}
$nopaidButton = '<button class="btn btn-sm btn-outline-danger py-0 m-0" >No Paid</button>';
    $some_time = mktime(1, 1, 1, $month, 1, $yearID);
    $strMonth = date('m', $some_time);
    if(!empty($yearID)){
        if(!empty($monthID)){
            $q = mysqli_query($con, "SELECT * FROM shop_invoice WHERE changeDate LIKE '%$yearID/$strMonth%' ORDER BY id DESC");
        }
        else{
            $q = mysqli_query($con, "SELECT * FROM shop_invoice WHERE changeDate = $yearID ORDER BY id DESC");
        }
    }
    else{
        $q = mysqli_query($con, "SELECT * FROM shop_invoice WHERE changeDate = '' ORDER BY id DESC");

    }

    $price = 0;
    if (mysqli_num_rows($q) > 0) {
        if($month != ''){
            $dt = DateTime::createFromFormat('!m', $month);
            $tr .= '<tr><td colspan="10">'.$dt->format('F').' '.$yearID.'</td></tr>';
        }
        else{
            $tr .= '<tr><td colspan="10">'.$yearID.'</td></tr>';
        }


        $fetch = mysqli_fetch_all_n($q, MYSQLI_ASSOC);
        foreach ($fetch as $f) {

            $imageLink = '<i class="fa fa-file-pdf-o"></i>';
            $paymentMode = $f['paymentMode'];

            $tr .= '<tr>				
				<td style="vertical-align: middle;">
					<span id="pdfMaker' . $f['id'] . '" onclick="pdfdownload('.$f['id'].')" style="cursor:pointer;" class="txtField' . $f['id'] . '">' . $imageLink . '</span>
				</td>
				<td style="vertical-align: middle;">
					<span class="txtField' . $f['id'] . '">' . $i . '</span>					
				</td>
				<td style="vertical-align: middle;">
					<span class="txtField' . $f['id'] . '">' . ((int)$f['id'] + 10000) . '</span>
				</td>
				<td style="vertical-align: middle;">
					<span class="txtField' . $f['id'] . '">' . $f['orderedOn'] . '</span>
				</td>
				<td style="vertical-align: middle;">
					<span class="txtField' . $f['id'] . '" style="background-color:#f6c3c5; border-radius: 4px; padding:2px; margin:0px 1px;">' . $f['changeDate'] . '</span>
				</td>
				<td style="vertical-align: middle;">
					<span class="txtField' . $f['id'] . '">' . $f['regNr'] . '</span>
					<input type="text" class="form-control form-control-sm txtInput editField' . $f['id'] . '" value="' . $f['load'] . '" id="load' . $f['id'] . '" style="display:none; font-weight:bold; width:50px;">	
				</td>
				<td style="vertical-align: middle;">
					<span class="txtField' . $f['id'] . '">' . $f['name'] . '</span>
				</td>
				<td style="vertical-align: middle;">
					<span class="txtField' . $f['id'] . '">' . $paymentMode . '</span>
				</td>
				<td style="vertical-align: middle;">
					<span class="txtField' . $f['id'] . '">' . $f['price'] . '</span>
				</td>			
				<td style="vertical-align: middle;">
					<span class="txtField' . $f['id'] . '">' . ((int)($f['price'])*1/5) . '</span>					
				</td>	
				<td style="vertical-align: middle;">
					<span class="txtField' . $f['id'] . '" onclick="doPay('.$f['id'].', '.$f['isPay'].')">' . ((int)($f['isPay']) > 0 ? $paidButton:$nopaidButton) . '</span>					
				</td>					
				</tr>';
            $i++;
            $price +=$f['price'];
        }
        $tr .= '<tr><td colspan="7"></td>';
        $tr .= '<td colspan="1">Total amount</td>';
        $tr .= '<td colspan="1">'.$price.'</td>';
        $tr .= '<td colspan="1">'.((int)$price*1/5).'</td>';
        $tr .= '</tr>';

    }


?>
<div style="">
		<div class=" card px-0 m-2" style="overflow:auto; box-shadow:0px 2px 2px #ccc;">
			<div class="card-header">
				Search Invoices
			</div>
			<div class="card-body">
				<div class="row">
					<div class="input-group input-group-sm col-4" >
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">reg nr</span>
						</div>
						<input type="text" class="form-control" id="regNr" aria-label="Small"  aria-describedby="inputGroup-sizing-sm" />
						<div class="input-group-append">
							<button class="btn btn-outline-primary search" type="button" data-type="regNr">Search</button>
						</div>
					</div>
					
					<div class="input-group input-group-sm col-4">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">nr</span>
						</div>
						<input type="text" class="form-control" id="nr" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
						<div class="input-group-append">
							<button class="btn btn-outline-primary search" type="button" data-type="nr">Search</button>
						</div>
					</div>
					
					<div class="input-group input-group-sm col-4">
						<div class="input-group-prepend">
							<span class="input-group-text" id="inputGroup-sizing-sm">name</span>
						</div>
						<input type="text" class="form-control" id="name" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
						<div class="input-group-append">
							<button class="btn btn-outline-primary search" type="button" data-type="name">Search</button>
						</div>
					</div>
					
				</div>
				<hr>
                <form method="post" action="#" id="buyChangeYear" name="myform">
                <div class="row">
                    <div class="input-group input-group-sm col-2" >
                        <div class="input-group-prepend">
                            <span class="" id="inputGroup-sizing-sm" style="padding-right: 10px;">Year</span>
                        </div>
                            <?php
                            echo $year_Select;
                            ?>
                    </div>
                    <div class="input-group input-group-sm col-2" >
                        <div class="input-group-prepend">
                            <span class="" id="inputGroup-sizing-sm" style="padding-right: 10px;">Month</span>
                        </div>
                        <?php
                        echo $month_Select;
                        ?>
                    </div>
                    <div class="input-group input-group-sm col-6" >
                    </div>
                    <div class="input-group input-group-sm col-2" >
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" data-type="brand" onclick="printPage();" style="border-radius: 5px;"><i class="fa fa-print fa-1x"> print</i></button>
                        </div>
                    </div>
                </div>
                </form>
                <hr>
                <form method="post" action="#" id="shopBank" name="bankForm">
                <div class="row">
                    <div class="input-group input-group-sm col-3" >
                        <div class="input-group-prepend">
                            <span class="" id="inputGroup-sizing-sm" style="padding-right: 10px;">Due period:</span>
                        </div>
                        <?php echo $bank_id;?>
                        <?php echo $bank_due;?>
                    </div>
                    <div class="input-group input-group-sm col-3" >
                        <div class="input-group-prepend">
                            <span class="" id="inputGroup-sizing-sm" style="padding-right: 10px;">Account nr:</span>
                        </div>
                        <?php echo $bank_account;?>
                    </div>
                    <div class="input-group input-group-sm col-4" >
                    </div>
                    <div class="input-group input-group-sm col-2" >
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button" data-type="brand" onclick="saveBank();" style="border-radius: 5px;"><i class="fa fa-save fa-1x"> save</i></button>
                        </div>
                    </div>
                </div>
                </form>

				<!--
				<h5 class="card-title text-center">List of all products</h5>
				<div class="container-fluid">
					<div class="row px-0">
					<div class="col">
						<nav aria-label="products">
							<ul class="pagination pagination-sm justify-content-end">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1">Previous</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item active">
									<a class="page-link" href="#">2</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">Next</a></li>
							</ul>
						</nav>
					</div>
					</div>
				</div>
				-->
				
				<table class="table table-hover table-sm" style="margin-top:30px; font-size:13px;">
					<thead class="thead" >
						<tr>
						  <th>PDF</th>
						  <th scope="col">No</th>
						  <th scope="col">Nr</th>
						  <th scope="col">Date</th>
						  <th scope="col">Due Date</th>
						  <th scope="col">REG Nr</th>
						  <th scope="col">Customer</th>
						  <th scope="col">Payment Mode</th>
						  <th scope="col">Sum</th>
						  <th scope="col">Sum without mva</th>
						  <th scope="col">Pay</th>
						  <th></th>
						</tr>
					  </thead>
					  <tbody id="invoiceBody">
						<?php echo $tr; ?>
					  </tbody>
					</table>
			</div>
		</div>
</div>

<div class="modal fade" id="tyreInfoModal" tabindex="-1" role="dialog" aria-labelledby="tyreInfoModal" aria-hidden="true">
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

<script>
variables = new Array();

$('#tyreInfoModal').on('show.bs.modal', function (e) {
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
	$('#tyreInfoModal').modal('hide');
});

function doPay(i, j) {
    if(j>0) return;
    showLoadingBar(1);
    var url = 'method=doPay&id='+i;
    fetchA(url, function(result) {
        hideLoadingBar();
        var e = JSON.parse(result);

        if(e[0] == 'success') {
            showAlert('success', 'Successfully pay');
        }else if(e[0] == 'other') {

        }else if(e[0] == 'fail') {
            showAlert('danger', 'Fail');
        }else {
            showAlert('danger', 'Technical error, contact developer');
        }
    });
}

function pdfdownload(i) {
    showLoadingBar(1);
    var url = 'method=pdfDownload&id='+i;
    fetchA(url, function(result) {
        hideLoadingBar();
        var e = JSON.parse(result);

        if(e[0] == 'success') {
            showAlert('success', 'Successfully saved the changes');
            window.open("download.php",'_blank');
        }else if(e[0] == 'no admin') {
            showAlert('danger', 'You are not logged in as admin');
        }else if(e[0] == 'no tyre') {
            showAlert('danger', 'Tyre not found');
        }else {
            showAlert('danger', 'Technical error, contact developer');
        }
    });
}

function edit(i) {
	$('.txtField'+i).hide();
	$('.editField'+i).show();
	$('#recommended'+i).removeAttr('disabled');
	$('.editButton'+i).hide();
	$('.saveButton'+i).show();
}

function save(i) {
	var category = $('#category'+i).find(':selected').val();
	var brand = $('#brand'+i).val();
	var model = $('#model'+i).val();
	var speed = $('#speed'+i).val();
	var load = $('#load'+i).val();
	var size = $('#size'+i).val();
	var price = $('#price'+i).val();
	var fuel = $('#fuel'+i).find(':selected').val();
	var grip = $('#grip'+i).find(':selected').val();
	var noise = $('#noise'+i).find(':selected').val();
	var recommended = $('#recommended'+i).val();
	var image = '';
	
	
	showLoadingBar(1);
	var url = 'method=saveTyreInfo&category='+category+'&brand='+brand+'&model='+model+'&speed='+speed+'&load='+load+'&size='+size+'&price='+price+'&fuel='+fuel+'&grip='+grip+'&noise='+noise+'&image='+image+'&id='+i;
	fetchA(url, function(result) {
		hideLoadingBar();
		var e = JSON.parse(result);
		
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

$('.search').on('click', function() {
	var type = $(this).data('type');
	var value = $('#'+type).val();
	if(value == '') { 
		showModal('Empty Field', 'Field cannot be left empty');
		return;
	}
	
	showLoadingBar(1);
	var url='method=invoiceSearch&type='+type+'&value='+value;
	fetchA(url, function(result) {
		hideLoadingBar();
		var e = JSON.parse(result);
		if(e[0] == 'no admin') {
			showAlert('danger', 'You are not logged in as admin');
		}else if(e[0] == 'success') {
			showAlert('success', 'Found some entries');
			$('#invoiceBody').html(e[1]);
		}else if(e[0] == 'no entry') {
			showAlert('danger', 'No entries found');
		}else {
			showAlert('danger', 'Technical error occurred, contact developer');
		}
	});
	
});


function saveNew(i) {
	
	var category = $('#category'+i).find(':selected').val();
	var brand = $('#brand'+i).val();
	var model = $('#model'+i).val();
	var speed = $('#speed'+i).val();
	var load = $('#load'+i).val();
	var size = $('#size'+i).val();
	var price = $('#price'+i).val();
	var fuel = $('#fuel'+i).find(':selected').val();
	var grip = $('#grip'+i).find(':selected').val();
	var noise = $('#noise'+i).find(':selected').val();
	var recommended = 0;
	if ($('#recommended'+i).prop('checked')==true){ 
        recommended = 1;
    }
	
	//var image = $('#image'+i).prop('files');
	var image = $('#image'+i)[0].files[0];
	var tyreInfo = $('#tyreInfo'+i).val();
	var runFlat = $('#runFlat'+i).find(':selected').val();
	var season = $('#season'+i).find(':selected').val();

	var fd = new FormData();
	fd.append("method", "saveTyreInfo");
	fd.append("category", category);
	fd.append("brand", brand);
	fd.append("model", model);
	fd.append("speed", speed);
	fd.append("load", load);
	fd.append("size", size);
	fd.append("price", price);
	fd.append("fuel", fuel);
	fd.append("grip", grip);
	fd.append("noise", noise);
	fd.append("id", i);
	fd.append("image", image);
	fd.append("tyreInfo", tyreInfo);
	fd.append("runFlat", runFlat);
	fd.append("season", season);
	fd.append('recommended', recommended)
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
			console.log(percentComplete + '% uploaded');
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
}

function changeYear(controll){
    var yearID = controll.value;
    myform.submit();
}

function changeMonth(controll){
    var monthID = controll.value;
    myform.submit();
}

function printPage() {

    var docprint = window.open("");
    var oTable = document.getElementById("invoiceBody");
    docprint.document.open();
    docprint.document.write('<html><head><title></title>');
    docprint.document.write('<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />');
    docprint.document.write('<link href="../css/bootstrap.css" rel="stylesheet" />');
    docprint.document.write('<link href="../css/customStyle.css" rel="stylesheet" />');
    // docprint.document.write('<link href="./assets/css/style.css" rel="stylesheet" />');
    // docprint.document.write('<style>');
    // docprint.document.write('#estimate_title{ text-align: center!important;}');
    // docprint.document.write('#logo{ text-align: center!important;}');
    // docprint.document.write('</style>');
    docprint.document.write('</head><body onload="window.print()">');
    // $('#HomeBtn').hide();
    // $('#BackBtn').hide();
    // $('#PrintBtn').hide();
    // $('#logo').css({ position: "unset"});
    docprint.document.write('<table class="table table-hover table-sm" style="margin-top:30px; font-size:13px;">');
    docprint.document.write('<thead class="thead" >');
    docprint.document.write('<tr>');
    docprint.document.write('<th>PDF</th>');
    docprint.document.write('<th scope="col">No</th>');
    docprint.document.write('<th scope="col">Nr</th>');
    docprint.document.write('<th scope="col">Date</th>');
    docprint.document.write('<th scope="col">Due Date</th>');
    docprint.document.write('<th scope="col">REG Nr</th>');
    docprint.document.write('<th scope="col">Customer</th>');
    docprint.document.write('<th scope="col">Payment Mode</th>');
    docprint.document.write('<th scope="col">Sum</th>');
    docprint.document.write('<th scope="col">Sum without mva</th>');
    docprint.document.write('<th scope="col">Pay</th>');
    docprint.document.write('<th></th>');
    docprint.document.write('</tr>');
    docprint.document.write('</thead>');
    docprint.document.write(oTable.innerHTML);
    docprint.document.write('</table>');
    docprint.document.write('</body></html>');
    docprint.document.close();
    docprint.focus();
    docprint.print();
    $('#HomeBtn').show();
    $('#BackBtn').show();
    $('#PrintBtn').show();
    $('#logo').css({ position: "relative"});
    docprint.close();
}

function saveBank() {
    var id = $('#bank_id').val();
    var due_period = $('#due_period').val();
    var bank_account = $('#bank_account').val();

    if(due_period == '' || bank_account == '') { alert('All fields are required'); return; }

    showLoadingBar(1);
    var url = 'method=saveBank&id='+id+'&due_period='+due_period+'&bank_account='+bank_account;
    fetchA(url, function(result) {
        hideLoadingBar();
        var e = $.parseJSON(result);
        if(e[0] == 'success') {
            showAlert('success','Successfully updated service');
            location.reload(true);
        }else if(e[0] == 'no admin') {
            showAlert('danger', 'You are not logged in');
        }else {
            showAlert('danger', 'Technical error contact Admin');
        }
    });
}

</script>