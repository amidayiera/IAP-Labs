$(document).ready(function () {
    $('#btn-place-order').click(function (e) {
   
     var name_of_food = $('#name_of_food').val();
     var number_of_units = $('#number_of_units').val();
     var unit_price = $('#unit_price').val();
     var order_status = $('#order_status').val();
   
     $.ajax({

        type: "post",
        url: "http://192.168.64.2/IAP-Labs/api/v1/orders/Index.php",
        data: { name_of_food: name_of_food, number_of_units: number_of_units, unit_price: unit_price, order_status: order_status },
        success: function (data) {
            alert(data['message']);
        },
      error: function () {
       alert('An Error occured');
      }
     });
   
    });
   
    $('#btn-check-status').click(function (e) {
     e.preventDefault();
   
     var order_id = $('#order_id').val();
     $.ajax({
      type: "get",
      url: "http://192.168.64.2/IAP-Labs/api/v1/orders/Index.php",
      data: { order_id: order_id },
      headers: { 'Authorization': 'Basic m8Qgm3ceLycXH6aZoH9n6yRTkqtwBBi4IQcAo7gdr6Fd9DLquVnp6xGP4AUF6gol' },
      success: function (data) {
       alert(data['message']);
      },
      error: function () {
       alert("An Error Occurred");
      }
     });
   
    });
   });