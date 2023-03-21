"use strict";
const endpointClients = "../clientes/getClients";
const endpointClient = "../clientes/getClient";
const endpointValidateToken = "../clientes/setValidateToken";
const endpointDeactivateClient = "../clientes/deactivateClient";
const endpointSaveClient = "../clientes/saveClient";
const endpointUpdateClient = "../clientes/updateClient";
const endpointActivateClient = "../clientes/activateClient";

$(function () {
  console.log("clientes.js");
  getClients()
    .then(function (clientes) {
      initTable(clientes);
    })
    .catch(function (error) {
      console.log(error);
    });

  document
    .getElementById("btnNuevoCliente")
    .addEventListener(
      "click",
      clearForm,
      $("#tituloModal").html("Nuevo Cliente")
    );
});

function getClients() {
  return new Promise(function (resolve, reject) {
    $.get(endpointClients, function (data) {
      console.log(data);
      var data = JSON.parse(data);
      $.post(endpointValidateToken, { data: data.data }, function (validate) {
        console.log(validate);
        var response = JSON.parse(validate);
        resolve(response.data); // resolver la Promise con los datos
      });
    }).fail(function (error) {
      reject(error); // rechazar la Promise con el error
    });
  });
}

function initTable(data) {
  $("#tablaClientes").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: false,
    info: true,
    autoWidth: false,
    responsive: true,
    data: data,
    columns: [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        },
      },
      { data: "cliente" },
      { data: "email" },
      { data: "telefono" },
      { data: "direccion" },
      { data: "rfc" },
      { data: "fecha_registro" },
      { data: "status", render: status },
      { data: null, render: actions },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json",
    },
  });
}

function createTableClientes(data) {
  $("#tablaClientes").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: false,
    info: true,
    autoWidth: false,
    responsive: true,
    data: data,
    columns: [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        },
      },
      { data: "cliente" },
      { data: "email" },
      { data: "telefono" },
      { data: "direccion" },
      { data: "rfc" },
      { data: "fecha_registro" },
      { data: "status", render: status },
      { data: null, render: actions },
    ],
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json",
    },
  });
}

function actions(data) {
  if (data.status == 1) {
    return `
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCliente" onclick="getCliente('${data.id_cliente}')">
      <i class="bi bi-pencil-square"></i>
    </button>
    <button type="button" class="btn btn-danger btn-sm" onclick="deactivateClient('${data.id_cliente}')">
      <i class="bi bi-trash"></i>
    </button>    
    `;
  } else {
    return `   
    <button type="button" class="btn btn-success btn-sm" onclick="activateClient('${data.id_cliente}')">
      <i class="bi bi-arrow-repeat"></i>
    </button>    
    `;
  }
}

function status(data) {
  if (data == 1) {
    return `<span class="badge bg-success">Activo</span>`;
  } else {
    return `<span class="badge bg-danger">Inactivo</span>`;
  }
}

function getCliente(id_cliente) {
  $("#tituloModal").html("Editar Cliente");
  $.post(endpointClient, { id_cliente: id_cliente }, function (request) {
    console.log(request);
    var response = JSON.parse(request);
    $.post(endpointValidateToken, { data: response.data }, function (validate) {
      console.log(validate);
      var data = JSON.parse(validate);
      var cliente = data.data;
      $("#id_cliente").val(cliente.id_cliente);
      $("#cliente").val(cliente.cliente);
      $("#email").val(cliente.email);
      $("#telefono").val(cliente.telefono);
      $("#direccion").val(cliente.direccion);
      $("#rfc").val(cliente.rfc);
      $("#contacto").val(cliente.contacto);
      $("#razon_social").val(cliente.razon_social);
    });
  }).fail(function (error) {
    console.log(error);
  });
}

function clearForm() {
  $("#id_cliente").val("");
  $("#cliente").val("");
  $("#email").val("");
  $("#telefono").val("");
  $("#direccion").val("");
  $("#rfc").val("");
  $("#contacto").val("");
  $("#razon_social").val("");
}

function deactivateClient(id_cliente) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "¡El cliente será desactivado!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "¡Sí, desactivar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        endpointDeactivateClient,
        { id_cliente: id_cliente },
        function (response) {
          const data = JSON.parse(response);
          if (data.status == "success") {
            Swal.fire("¡Éxito!", data.message, "success");
            getClients().then(function (clientes) {
              $("#tablaClientes").DataTable().destroy();
              createTableClientes(clientes);
            });
          } else {
            Swal.fire("¡Error!", data.message, "error");
          }
        }
      ).fail(function (error) {
        console.log(error);
      });
    }
  });
}

function activateClient(id_cliente) {
  Swal.fire({
    title: "¿Estás seguro?",
    text: "¡El cliente será desactivado!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "¡Sí, desactivar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        endpointActivateClient,
        { id_cliente: id_cliente },
        function (response) {
          const data = JSON.parse(response);
          if (data.status == "success") {
            Swal.fire("¡Éxito!", data.message, "success");
            getClients().then(function (clientes) {
              $("#tablaClientes").DataTable().destroy();
              createTableClientes(clientes);
            });
          } else {
            Swal.fire("¡Error!", data.message, "error");
          }
        }
      ).fail(function (error) {
        console.log(error);
      });
    }
  });
}

function guardarNuevoCliente(event) {
  event.preventDefault();
  const datosCliente = {
    cliente: $("#cliente").val(),
    email: $("#email").val(),
    telefono: $("#telefono").val(),
    direccion: $("#direccion").val(),
    rfc: $("#rfc").val(),
    contacto: $("#contacto").val(),
    razon_social: $("#razon_social").val(),
  };
  const idCliente = $("#id_cliente").val();
  const url = idCliente ? endpointUpdateClient : endpointSaveClient;
  if (idCliente) {
    datosCliente.id_cliente = idCliente;
  }
  $.post(url, datosCliente, function (response) {
    const data = JSON.parse(response);
    if (data.status == "success") {
      Swal.fire("¡Éxito!", data.message, "success");
      getClients().then(function (clientes) {
        $("#tablaClientes").DataTable().destroy();
        createTableClientes(clientes);
      });
      clearForm();
      $("#modalCliente").modal("hide");
    } else {
      Swal.fire("¡Error!", data.message, "error");
    }
  }).fail(function (error) {
    console.log(error);
  });
}
