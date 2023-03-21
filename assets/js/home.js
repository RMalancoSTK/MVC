$(function () {
  "use strict";
  generateChartSales();
});

function generateTableSales() {
  var table = $("#tableSales").DataTable({
    ajax: {
      url: "/Sales/GetSales",
      type: "GET",
      datatype: "json",
    },
    columns: [
      { data: "id", autoWidth: true },
      { data: "name", autoWidth: true },
      { data: "price", autoWidth: true },
      { data: "quantity", autoWidth: true },
      { data: "date", autoWidth: true },
      {
        data: "id",
        render: function (data) {
          return (
            "<div class='text-center'><a href='/Sales/Edit/" +
            data +
            "' class='btn btn-success text-white' style='cursor:pointer; width:70px;'>Edit</a> | <a href='/Sales/Delete/" +
            data +
            "' class='btn btn-danger text-white' style='cursor:pointer; width:70px;'>Delete</a></div>"
          );
        },
        autoWidth: true,
      },
    ],
    language: {
      emptyTable: "No data found",
    },
    width: "100%",
  });
}

function generateChartSales() {
  // $.ajax({
  //   url: "/Sales/GetSales",
  //   type: "GET",
  //   contentType: "application/json;charset=UTF-8",
  //   dataType: "json",
  //   success: function (result) {
  //     var data = [];
  //     var label = [];
  //     $.each(result, function (key, item) {
  //       data.push(item.quantity);
  //       label.push(item.name);
  //     });
  //     var ctx = document.getElementById("chartSales").getContext("2d");
  //     var chart = new Chart(ctx, {
  //       type: "bar",
  //       data: {
  //         labels: label,
  //         datasets: [
  //           {
  //             label: "Sales",
  //             backgroundColor: "rgb(255, 99, 132)",
  //             borderColor: "rgb(255, 99, 132)",
  //             data: data,
  //           },
  //         ],
  //       },
  //       options: {
  //         responsive: true,
  //         legend: {
  //           position: "top",
  //         },
  //         title: {
  //           display: true,
  //           text: "Sales",
  //         },
  //       },
  //     });
  //   },
  //   error: function (errormessage) {
  //     alert(errormessage.responseText);
  //   },
  // });

  if (document.getElementById("totalVentas")) {
    const ctx = document.getElementById("totalVentas").getContext("2d");
    const totalVentas = new Chart(ctx, {
      type: "bar",
      data: {
        labels: [
          "Enero",
          "Febrero",
          "Marzo",
          "Abril",
          "Mayo",
          "Junio",
          "Julio",
        ],
        datasets: [
          {
            label: "Total de ventas",
            data: [12, 19, 3, 5, 2, 3, 10],
            // color success
            backgroundColor: "#28a745",
            borderColor: "#28a745",
            borderWidth: 1,
          },
          {
            label: "Total de compras",
            data: [12, 19, 3, 5, 2, 3, 10],
            // color danger
            backgroundColor: "#dc3545",
            borderColor: "#dc3545",
            borderWidth: 1,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });
  }
}
