$(document).ready(function () {
  var token = localStorage.getItem("token");
  if (token) {
    if(window.location == "http://localhost:8000/api/iniciar-sesion") {
      window.location = "http://localhost:8000/api/tasks";
    }
    get_list_tasks();
    var ul = document.getElementById("navbarElements");
    var li = document.createElement("li");
    var a = document.createElement("a");
    li.appendChild(a);
    li.className = "nav-item";
    a.appendChild(document.createTextNode("Cerrar sesión"));
    a.className = "nav-link active";
    a.ariaCurrent = "page";
    a.id = "logout";
    a.href = "#";
    ul.appendChild(li);
  } else if (window.location != "http://localhost:8000/api/iniciar-sesion") {
    window.location = "http://localhost:8000/api/iniciar-sesion";
  }

  $("body").on("click", '#login', function(e){
    var token = '';
    e.preventDefault();
    var email = $("#email").val();
    var password = $("#password").val();
    $.ajax({
      url: 'login',
      type: 'post',
      data: {
        email: email,
        password: password
      },
      success: function (data) {
        window.location = "http://localhost:8000/api/tasks";
        var token = data.data.token;
        localStorage.setItem("token", token);
        get_list_tasks();
      },
      error: function (xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.message);
      }
    });
  });

  $("body").on("click","#logout",function(e){
    e.preventDefault;
    window.alert("Salió del sistema.");
    localStorage.removeItem("token");
    window.location = "http://localhost:8000/api/iniciar-sesion";
  });

  function get_list_tasks()  {
    $.ajax({
      url: tasks_url,
      beforeSend: function (xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer '+token);
      },
      type:'GET',
      data: {
      }
    }).done(function(data){
      if(data == { status: 'Token is Expired' }) {
        console.log("holi");
        window.alert("La sesión ha expirado, vuelve a iniciar sesión.");
        console.log("holi2");
        localStorage.removeItem("token");
        window.location = "http://localhost:8000/api/iniciar-sesion";
      } else if (data.data.length > 0) {
        fill_table(data.data);
      } else {
        $("tbody").html("");
      }
    });
  }

  function fill_table(data) {
    var	rows = '';
	  $.each( data, function( key, value ) {
      rows = rows + '<tr>';
      rows = rows + '<td>'+value.id+'</td>';
	  	rows = rows + '<td>'+value.name+'</td>';
	  	rows = rows + '<td>'+value.category+'</td>';
      var statusCap = value.status.charAt(0).toUpperCase() + value.status.slice(1);
      if (value.status == 'realizada') {
        rows = rows + '<td><input type="checkbox" id="updateStatus-'+value.id+'" value="'+value.id+'" checked><span id="taskStatus-'+value.id+'" style="padding-left: 20px;"> '+statusCap+' <span></td>';
        rows = rows + '<td data-id="'+value.id+'">';
                rows = rows + '<button class="btn btn-round" disabled><i class="fas fa-pen fa-sm link-warning pe-none"></i></a> ';
                rows = rows + '<button class="btn btn-round" disabled><i class="fas fa-trash fa-sm link-danger pe-none"></i></a> ';
                rows = rows + '</td>';
      } else {
        rows = rows + '<td><input type="checkbox" id="updateStatus-'+value.id+'" value="'+value.id+'"><span id="taskStatus-'+value.id+'" style="padding-left: 20px;"> '+statusCap+' <span></td>';
	  	  rows = rows + '<td data-id="'+value.id+'">';
                rows = rows + '<a class="btn btn-round btnEdit" id="editTask" data-id="'+value.id+'" data-toggle="modal" data-target="#modalEditar"><i class="fas fa-pen fa-sm link-warning pe-none"></i></a> ';
                rows = rows + '<a class="btn btn-round btnDelete" id="deleteTask" data-id="'+value.id+'" data-toggle="modal" data-target="#modalEliminar"><i class="fas fa-trash fa-sm link-danger pe-none"></i></a> ';
                rows = rows + '</td>';
      }
	  	rows = rows + '</tr>';
    $("tbody").html(rows);
    });
  }

  $("body").on("click", 'input[type="checkbox"]', function(e){
    e.preventDefault();
    let id = this.id;
    let task_id = id.split("-")[1];
    if($(this).is(':checked')){
      //If the checkbox is checked.
      var status = 'realizada';
    } else{
      var status = 'no realizada';
    }
    $.ajax({
      url: '/api/updateStatus',
      type: 'post',
      headers: {
        'Authorization': 'Bearer '+token
      },
      data: {
        id: task_id,
        status: status
      },
      success: function (response) {
        get_list_tasks();
      },
      error: function (xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.message);
      }
    });
  });

  $("body").on("click","#createTask",function(e){
    e.preventDefault;
    $('#taskId').val('');
    $('#modalAgregar').modal('show');
    $('#modalId').val('modalAgregar')
    $('#formData').trigger("reset");
  });

  $('body').on('click', '#submit', function (e) {
    e.preventDefault()
    var id = $("#taskId").val();
    var modalId = $("#modalId").val();
    if (modalId == 'modalAgregar') {
      var name = $("#createName").val();
      var category = $("#createCategory").val();
    } else {
      var name = $("#editName").val();
      var category = $("#editCategory").val();
    }
  
    $.ajax({
      url: task,
      type: "POST",
      headers: {
        'Authorization': 'Bearer '+token
      },
      data: {
        id: id,
        name: name,
        category: category
      },
      dataType: 'json',
      success: function (data) {
          $('#formData').trigger("reset");
          $('#'+modalId).modal('hide');
          get_list_tasks();
      },
      error: function (data) {
        console.log("Error: " + data)
      }
    });
  });

  //Edit modal window
  $('body').on('click', '#editTask', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    
    $.ajax({
      url: task+'/'+id+'/show',
      beforeSend: function (xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer '+token);
      },
      type:'GET',
      data: {
      }
    }).done(function(data){
      $('#modalEditar').modal('show');
        $('#modalId').val('modalEditar');
        $('#taskId').val(data.data.id);
        $('#editName').val(data.data.name);
        $('#editCategory').val(data.data.category);
    });
  });

  //DeleteCompany
  $('body').on('click', '#deleteTask', function (e) {
    e.preventDefault();
    $('#modalEliminar').modal('show');
    var id = $(this).attr('data-id');
    $('#taskId').val(id);
  });

  $('body').on('click', '#btnDelete', function (e){
    var id = $('#taskId').val();
    $.ajax(
        {
          url: task+'/'+id,
          type: 'DELETE',
          beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer '+token);
          },
          data: {
                id: id
        },
        success: function (response){
          $('#modalEliminar').modal('hide');
          get_list_tasks();
        }
    });
  });
}); 