<?php
error_reporting(E_ALL && ~E_NOTICE && ~E_WARNING);
// echo "<pre>";print_r($_REQUEST);exit;
$common_handler='<table class="shadow">';
$place_holder='<tr><td class="form-label p-4 pb-2">Place Holder</td><td class="p-2"><input class="form-control" id="plho_'.$_REQUEST['vid'].'" onkeyup="editAttrs(`plho_'.$_REQUEST['vid'].'`,`ii'.$_REQUEST['vid'].'`,`placeholder`)" type="text"></td></tr>';
$label = '<tr><td class="form-label p-4 pb-2">Lable</td><td class="p-2"><input class="form-control p-2" id="label_'.$_REQUEST['vid'].'" onkeyup="editAttrs(`label_'.$_REQUEST['vid'].'`,`il'.$_REQUEST['vid'].'`,`label`)" type="text"></td></tr>';
$button_handler = '<tr><td class="form-label p-4 pb-2">Button Text</td><td class="p-2"><input class="form-control p-2" id="label_'.$_REQUEST['vid'].'" onkeyup="editAttrs(`label_'.$_REQUEST['vid'].'`,`ii'.$_REQUEST['vid'].'`,`button`)" type="text"></td></tr>';
$options_handler = '<tr><td class="form-label p-4 pb-2">Value</td><td class="p-2">Inner Text</td></tr>';
for ($num=1; $num <= $_REQUEST['child_cnt']; $num++) { 
	$options_handler .= '<tr><td class="form-label p-4 pb-2">
	<input class="form-control p-2" id="opv_'.$num.'" onkeyup="optionBuild(`ii'.$_REQUEST['vid'].'`,`opv_'.$num.'`,`'.$num.'`,`option_value`)" type="text"></td>
	<td class="p-2">
	<input class="form-control p-2" id="opt_'.$num.'" onkeyup="optionBuild(`ii'.$_REQUEST['vid'].'`,`opt_'.$num.'`,`'.$num.'`,`option_text`)" type="text">
	</td></tr>';
}
if($_REQUEST['vtype']=="input" || $_REQUEST['vtype']=="checkbox" || $_REQUEST['vtype']=="radio" || $_REQUEST['vtype']=="select"){
	$common_handler.=$label;
	if($_REQUEST['vtype']=="input"){
		$common_handler.=$place_holder;
	}
}
if($_REQUEST['vtype']=="button"){
	$common_handler.=$button_handler;
}
$common_handler .= '
<tr><td class="form-label p-4 pb-2">Name</td><td class="p-2"><input class="form-control" id="name_'.$_REQUEST['vid'].'" onkeyup="editAttrs(`name_'.$_REQUEST['vid'].'`,`ii'.$_REQUEST['vid'].'`,`name`)" type="text"></td></tr>';
if($_REQUEST['vtype']!="button"){
	$common_handler .='<tr><td class="form-label p-4 pb-2">Class Name For Label</td><td class="p-2"><input class="form-control" id="lcls_'.$_REQUEST['vid'].'" onkeyup="editAttrs(`lcls_'.$_REQUEST['vid'].'`,`il'.$_REQUEST['vid'].'`,`class`)" type="text"></td></tr>';
}
$common_handler .='<tr><td class="form-label p-4 ">Class Name For Input</td><td class="p-2"><input class="form-control" id="icls_'.$_REQUEST['vid'].'" onkeyup="editAttrs(`icls_'.$_REQUEST['vid'].'`,`ii'.$_REQUEST['vid'].'`,`class`)" type="text"></td></tr>';
if($_REQUEST['vtype']=="select"){
	$common_handler.=$options_handler;	
}

$common_handler .='</table>';
$input='<table><tr>
<td id="il'.$_REQUEST['vid'].'"></td>
<td id="itd'.$_REQUEST['vid'].'"><input type="text" id="ii'.$_REQUEST['vid'].'"></td>
</tr></table>';
$radio = '<table><tr>
<td id="il'.$_REQUEST['vid'].'"></td>
<td id="itd'.$_REQUEST['vid'].'"><input type="radio" id="ii'.$_REQUEST['vid'].'"></td>
</tr></table>';
$checkBox = '<table><tr>
<td id="il'.$_REQUEST['vid'].'"></td>
<td id="itd'.$_REQUEST['vid'].'"><input type="checkbox" id="ii'.$_REQUEST['vid'].'"></td>
</tr></table>';
$button = '<table><tr>
<td id="itd'.$_REQUEST['vid'].'" class="text-center" colspan="2"><input type="button" id="ii'.$_REQUEST['vid'].'"></td>
</tr></table>';
$select='<table><tr>
<td id="il'.$_REQUEST['vid'].'"></td>
<td id="itd'.$_REQUEST['vid'].'"><select id="ii'.$_REQUEST['vid'].'">';
$select.='<option value="">Select</option>';
for ($i=0; $i < $_REQUEST['child_cnt']; $i++) { 
	$select.='<option>Dummy'.$i.'</option>';
}
$select.='</select></td>
</tr></table>';
$desc_handler='';
$desc = '<table><tr><td colspan="2" id="il'.$_REQUEST['vid'].'" class="text-left fw-bold"></td></tr></table>';
if($_REQUEST['action']=='common'){
	if($_REQUEST["vtype"]=="input"){
		ob_clean();
		ob_start();
		echo $common_handler."##".$input;
		exit;
	}
	if($_REQUEST["vtype"]=="checkbox"){
		ob_clean();
		ob_start();
		echo $common_handler."##".$checkBox;
		exit;
	}
	if($_REQUEST["vtype"]=="radio"){
		ob_clean();
		ob_start();
		echo $common_handler."##".$radio;
		exit;
	}
	if($_REQUEST["vtype"]=="button"){
		ob_clean();
		ob_start();
		echo $common_handler."##".$button;
		exit;
	}
	if($_REQUEST["vtype"]=="select"){
		ob_clean();
		ob_start();
		echo $common_handler."##".$select;
		exit;
	}
	if($_REQUEST["vtype"]=="desc"){
		ob_clean();
		ob_start();
		echo "<table>".$label."</table>##".$desc;
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form creator</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</head>
<body>
	<div style="width:100%;display: flex;flex-direction:row;justify-content: space-around;">
		<div style="width:48%;">
			<form id="frm">
				<table>
					<thead>
						<tr>
							<td class="form-label">Template Name:</td>
							<td><input class="form-control" type="text" id="template_name" name="template_name" value='' /></td>
						</tr>
						<tr>
							<td class="form-label">Main Heading</td>
							<td><input class="form-control" type="text" name="main_heading" id="main_heading" onkeyup="editMainHeading()" value='' /></td>
						</tr>
					</thead>
				</table>
				<table>
					<tbody id='field_container' style="display:block;overflow: auto;max-height:75vh">
					</tbody>
					<tfoot>
						<tr><td colspan="2">&nbsp;</td></tr>
						<tr>
							<td colspan="2" class="d-flex flex-row justify-content-between flex-wrap">
								<select class="form-select" id="field_type" onchange="showChildCout()" name="field_type" style="width:150px">
									<option value="input">Input</option>
									<option value="select">Drop Down</option>
									<option value="checkbox">Check Box</option>
									<option value="radio">Radio</option>
									<option value="button">Button</option>
									<option value="desc">Desription</option>
								</select>
								<input style="width:150px;margin-bottom: 10px;display: none;margin-left: 10px;"  class="form-control" placeholder="Number elements" type="number" name="child_cnt" id="child_cnt">
								<button style="width:150px;margin-left: 10px;" class="btn btn-success" type="button" onclick="addField()">Add Field+</button></td>
							</tr>
						</tfoot>
					</table>
				</form>
			</div>
			<div style="width:48%;">
				<div style="text-align: right;">
					<button class="btn btn-primary" onclick="download()">Download Code</button>
				</div>
				<div id='preview' class="shadow d-flex flex-column align-items-center">
					<div style="width:100%" class="mb-3">
						<h2 id="mh" style="text-align: center;"></h2>
					</div>
					<table>
						<tbody id="preview_container">

						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			function editMainHeading(){
				document.getElementById('mh').textContent = document.getElementById('main_heading').value
			}
			function addField(){
				let vid = document.getElementById('field_container').children.length;
				let vtype = document.getElementById('field_type').value;
				let child_cnt = document.getElementById('child_cnt');
				let cond="";
				if(vtype=="select"){
					if(child_cnt.value!=""){
						cond="&child_cnt="+child_cnt.value;
						child_cnt.value=null;
					}
				}
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						child_cnt=0;
						try{
							let resArr = xhttp.responseText.split("##");
							const parser = new DOMParser();
							const htmlElement1 = parser.parseFromString(resArr[0], "text/html").body.firstChild;
							const htmlElement2 = parser.parseFromString(resArr[1], "text/html").body.firstChild;
							let nodeList = htmlElement2.childNodes[0].childNodes;
							document.getElementById("field_container").appendChild(htmlElement1);
							nodeList.forEach(node=>document.getElementById("preview_container").appendChild(node));
						}catch(e){
							console.log(e)
						}
					}
				};
				xhttp.open("GET", "index.php/?action=common&vid="+vid+"&vtype="+vtype+cond, true);
				xhttp.send();
			}
			function editAttrs(vsource,vtarget,vattr){
				let srcElement = document.getElementById(vsource).value;
				let targetElement = document.getElementById(vtarget);
				if(vattr=="label"){
					targetElement.textContent = srcElement;				
				}
				if(vattr=="button"){
					targetElement.value = srcElement;				
				}
				if(vattr=="name"){
					targetElement.setAttribute("name",srcElement);
				}
				if(vattr=="class"){
					targetElement.setAttribute("class","");
					if(srcElement!=""){
						targetElement.setAttribute("class",srcElement);						
					}else{
						targetElement.removeAttribute("class");
					}
				}
				if(vattr=="placeholder"){
					targetElement.setAttribute("placeholder",srcElement);
				}
			}
			function showChildCout(){
				document.getElementById("child_cnt").removeAttribute("disable");
				let fieldType = document.getElementById("field_type").value;
				if(fieldType=="select"){
					document.getElementById("child_cnt").style.display="block";
				}else{
					document.getElementById("child_cnt").setAttribute("disable",true);
					document.getElementById("child_cnt").style.display="none";
				}
			}
			function optionBuild(vSelect,vSource,VChildNum,Vtype){
				let select = document.getElementById(vSelect);
				VChildNum = parseInt(VChildNum)
				console.log(document.getElementById(vSource).value);
				if(Vtype=="option_value"){
					select.childNodes[VChildNum].value=document.getElementById(vSource).value
				}
				if(Vtype=="option_text"){
					select.childNodes[VChildNum].innerHTML=document.getElementById(vSource).value
				}
			}
			function download(){
				let el = document.getElementById('preview');
				let fileName = document.getElementById('template_name').value;
				let htmlContent = `
				<html>
				<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>`+fileName+`</title>
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></`+`script>
				</head>
				<body>
				<div class="d-flex flex-column align-items-center">`
				htmlContent+=el.innerHTML
				htmlContent+=`</div>
				</body>
				</html>
				`;
				const blob = new Blob([htmlContent], { type: 'text/html' });
				const downloadLink = document.createElement('a');
				downloadLink.href = URL.createObjectURL(blob);
				downloadLink.download = fileName+'.html';
				console.log(fileName+'.html');
				downloadLink.click();
			}
		</script>
	</body>
	</html>