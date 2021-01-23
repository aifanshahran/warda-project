
function Add(){ 
$("#tblData tbody").append( 
"<tr>"+ 
"<td><input type='text'/></td>"+ 
"<td><input type='text'/></td>"+ 
"<td><input type='text'/></td>"+ 
"<td><img src='images/disk.png' class='btnSave'><img src='images/delete.png' class='btnDelete'/></td>"+ "</tr>"); 
$(".btnSave").bind("click", Save);	
$(".btnDelete").bind("click", Delete); 
}; 
function Save(){ var par = $(this).parent().parent(); //tr 
var tdName = par.children("td:nth-child(1)"); 
var tdPhone = par.children("td:nth-child(2)"); 
var tdEmail = par.children("td:nth-child(3)"); 
var tdButtons = par.children("td:nth-child(4)"); 

tdName.html(tdName.children("input[type=text]").val()); 
tdPhone.html(tdPhone.children("input[type=text]").val()); 
tdEmail.html(tdEmail.children("input[type=text]").val()); 
tdButtons.html("<img src='images/delete.png' class='btnDelete'/><img src='images/pencil.png' class='btnEdit'/>"); 
$(".btnEdit").bind("click", Edit); 
$(".btnDelete").bind("click", Delete); 
}; 
function Delete(){ var par = $(this).parent().parent(); //tr
par.remove(); 
}; 
$(function(){ 
//Add, Save, Edit and Delete functions code 
$(".btnEdit").bind("click", Edit); 
$(".btnDelete").bind("click", Delete); 
$("#btnAdd").bind("click", Add); 
});