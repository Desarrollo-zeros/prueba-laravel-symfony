<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Example Crud</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}	
</style>
<script type="text/javascript">
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                                <h2><b>Usuario</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Nuevo Usuario</span></a>
						<a href="#deleteEmployeeModal" onclick="deleteAll = true;" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Eliminar selecionados</span></a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="tables">
                <div class="form-group">
                    <h3>Buscar por aparicion</h3>
                    <input type="search" onkeyup="search()" id="search"  class="form-control" required>
                    <script>
                        function search() {
                            var input, filter, table, tr, td, cell, i, j;
                            input = document.getElementById("search");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("tables");
                            tr = table.getElementsByTagName("tr");
                            for (i = 1; i < tr.length; i++) {
                                // Hide the row initially.
                                tr[i].style.display = "none";
                                td = tr[i].getElementsByTagName("td");
                                for (var j = 0; j < td.length; j++) {
                                    cell = tr[i].getElementsByTagName("td")[j];
                                    if (cell) {
                                        if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                            break;
                                        }
                                    }
                                }
                            }
                        }
                    </script>
                </div>
                <br>
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
						<th>Cédula</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Accíon</th>
                    </tr>
                </thead>
                <tbody id="table">

                </tbody>
            </table>
			<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formAdd">
					<div class="modal-header">						
                            <h4 class="modal-title">Agregar Usuario</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">

                        <div class="form-group">
                            <span id="add-error"></span>
                        </div>

						<div class="form-group">
							<label>nombres</label>
							<input type="text" id="nombres"  class="form-control" required>
						</div>
						<div class="form-group">
							<label>Apellidos</label>
							<input type="text"  id="apellidos" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Cédula</label>
							<input type="text" id="cedula" class="form-control" required min="10" max="10" pattern="[0-9]{10}">
						</div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email"  id="correo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="tel"  id="telefono" class="form-control" required min="10" max="10" pattern="[0-9]{10}">
                        </div>
                    </div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Agregar Usuario">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formEdit">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">

                        <div class="form-group">
                            <span id="edit-error"></span>
                        </div>

                        <div class="form-group">
                            <label>id</label>
                            <input type="number" disabled="disabled"  id="edit-id"  class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>nombres</label>
                            <input type="text" id="edit-nombres"  class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Apellidos</label>
                            <input type="text"  id="edit-apellidos" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Cédula</label>
                            <input type="text" id="edit-cedula" class="form-control" required min="10" max="10" pattern="[0-9]{10}">
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email"  id="edit-correo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="tel"  id="edit-telefono" class="form-control" required min="10" max="10" pattern="[0-9]{10}">
                        </div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Actualizar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formDel">
                    <input type="hidden" id="del-id">
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar Registros?</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Seguro que quieres eliminar estos registros?</p>
						<p class="text-warning"><small>Esta acción no se puede deshacer.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" id="btnEliminar" class="btn btn-danger" value="Eliminar">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>


<script src="notify.js"></script>
<script>
    //javascript and jquery framework
    var deleteAll = false;

    var datas = [];
    var whereIn = [];
    var url = "http://127.0.0.1:8000/user/"; //link peticiones igual para laravel que symfony

    $(document).ready(function () {
        loaderTable();
    });

    function loaderTable() {
        var string = "";
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                data = data["data"];
                for(var i in data){
                    string += "<tr>";
                    string += '<td>\n' +
                        '\t\t\t\t\t\t\t<span class="custom-checkbox">\n' +
                        '\t\t\t\t\t\t\t\t<input type="checkbox" disabled="disabled" class="options" name="options[]" value="">\n' +
                        '\t\t\t\t\t\t\t\t<label for="checkbox1"></label>\n' +
                        '\t\t\t\t\t\t\t</span>\n' +
                        '\t\t\t\t\t\t</td>';
                    string += '<td>'+data[i].nombres+'</td>';
                    string += '<td>'+data[i].apellidos+'</td>';
                    string += '<td>'+data[i].cedula+'</td>';
                    string += '<td>'+data[i].correo+'</td>';
                    string += '<td>'+data[i].telefono+'</td>';
                    string += '<td>\n' +
                        "<a href='#editEmployeeModal'  onclick='return editLoader("+JSON.stringify(data[i])+")' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>\n" +
                        '<a href="#deleteEmployeeModal"  class="delete" onclick="del('+data[i].id+')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>\n' +
                        '</td>';
                    string += "</tr>";
                }
                datas = data;
                $("#table").html(string);
            },
        });
    }

    function copy(obj) {
        return JSON.parse(JSON.stringify(obj));
    }

    $("#formAdd").on("submit",function (form) {
        form.preventDefault();

        var obj = {
            "nombres" : $("#nombres").val(),
            "apellidos" : $("#apellidos").val(),
            "cedula" : $("#cedula").val(),
            "correo" : $("#correo").val(),
            "telefono" : $("#telefono").val(),
        };

        $.ajax({
            type: "POST",
            url: url+"new",
            data : obj,
            dataType : 'json',
            success: function (data) {
                if(data["status_code"] == 500){
                    $.notify("Ocurrio un error al momento de guardar Usuario","error");
                    $("#add-error").html(JSON.stringify(data["message"])).css("color","red");
                }else{
                    $("#add-error").html("").css("color","green");
                    $.notify("Usuario almacenado con exito","success");
                    loaderTable();
                }
            }
        });
    });

    function editLoader(data) {
        $("#edit-id").val(data.id);
        $("#edit-nombres").val(data.nombres);
        $("#edit-apellidos").val(data.apellidos);
        $("#edit-cedula").val(data.cedula);
        $("#edit-correo").val(data.correo);
        $("#edit-telefono").val(data.telefono);
    }


   $("#formEdit").on("submit",function (form) {
       form.preventDefault();

       if(confirm("Actualizar, Desea Continuar?")){
           var obj = {
               "id" : $("#edit-id").val(),
               "nombres" : $("#edit-nombres").val(),
               "apellidos" : $("#edit-apellidos").val(),
               "cedula" : $("#edit-cedula").val(),
               "correo" : $("#edit-correo").val(),
               "telefono" : $("#edit-telefono").val(),
           };

           $.ajax({
               type: "POST",
               url: url+obj.id+"/edit",
               data : obj,
               dataType : 'json',
               success: function (data) {
                   if(data["status_code"] == 500){
                       $.notify("Ocurrio un error al momento de actualizar el Usuario","error");
                       $("#edit-error").html(JSON.stringify(data["message"])).css("color","red");
                       console.log(data["message"]);
                   }else{
                       $.notify("Usuario Actualizado con exito","success");
                       $("#edit-error").html("").css("color","green");
                       loaderTable();
                   }
               }
           });
       }
   });

    function del(id) {
        $("#del-id").val(id);
        deleteAll = false;
    }

    $("#formDel").on("submit",function (form) {
        form.preventDefault();

        $("#btnEliminar").prop("disabled",true);
        if(deleteAll && whereIn.length > 0){
            $.ajax({
                type: "post",
                url: url+"delete_in",
                data : {"where" :whereIn},
                dataType : 'json',
                success: function (data) {
                    if(data["status_code"] == 500){
                        $.notify("Ocurrio un error al momento de Eliminar el registros","error");
                    }else{
                        $.notify("registros Eliminado con exito","success");
                    }
                    $("#selectAll").prop('checked', false);
                    loaderTable();
                }
            });
            return;
        }

        else if(deleteAll && whereIn.length < 1){
            $.notify("Por favor debe seleccionar elemento a eliminar","error");
            return;
        }

        else if($("#del-id").val() != ""){
            $.ajax({
                type: "DELETE",
                url: url+$("#del-id").val(),
                dataType : 'json',
                success: function (data) {
                    if(data["status_code"] == 500){
                        $.notify("Ocurrio un error al momento de Eliminar el Usuario ","error");
                        $.notify(JSON.stringify(data["message"]),"error");
                    }else{
                        $.notify("Usuario Eliminado con exito","success");
                    }
                    $("#del-id").val("");
                    loaderTable();
                }
            });
        }
        $("#btnEliminar").prop("disabled",false);
        $("#deleteEmployeeModal").modal("toggle");
    });



    $("#selectAll").on( 'change', function() {
        var list = document.getElementsByClassName("options");
        if( $(this).is(':checked') ) {
            for (var i = 0; list[i]; ++i){
                var currentchckbox = $(list[i]);
                if ((currentchckbox.val()) == currentchckbox .val() ) {
                    currentchckbox.prop('checked', true);
                    whereIn.push(datas[i].id);
                    $(".delete").prop("disabled",true);
                }
            }
        } else {
            for (var i = 0; list[i]; ++i){
                var currentchckbox = $(list[i]);
                if ((currentchckbox.val()) == currentchckbox .val() ) {
                    currentchckbox.prop('checked', false);
                    var index = whereIn.indexOf(datas[i].id);
                    if (index > -1) {
                        whereIn.splice(index, 1);
                    }
                    $(".delete").prop("disabled",false);
                }
            }
        }
        console.log(whereIn);
    });







</script>

</html>                                		                            