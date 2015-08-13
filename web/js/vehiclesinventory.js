/**
 * vehicles inventory
 *   This js file load only on vehicle inventory view
 *   This run ajax on input in vin number
 */

$(document).on('click', '.searchByVinNumber', function () {

    // Trim if space after vin number
    var vinNo = $('.vinNumber').val().trim();

    if(vinNo == ''){
        alert('Please enter vin number');
        $('.vinNumber').focus();
        return false;
    }

    // If vin number has value than call goes for ajax
    if (vinNo) {

        // Run ajax,insert value by jquery
        getVehicleDetails(vinNo);
    }
});





/**
 * Get Vehicle details
 * @param vinNo
 */
function getVehicleDetails(vinNo) {
    $.ajax({
        url: baseUrl + '/index.php/vehicles/get-vehicle',
        type: 'POST',
        data: {
            vinNo: vinNo
        },
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (response) {
            response = $.parseJSON(JSON.stringify(response));

            if (response.status == '1') {
                // Vehicle Inventory
                var vehicleInventory = response.vehicle.inventory;

                $.each(vehicleInventory, function (index, value) {
                    $(':input[name="VehicleInventory[' + index + ']"]').val(value);
                });

                // Vehicle History
                var vehicleHistory = response.vehicle.history;

                $.each(vehicleHistory, function (index, value) {
                    $(':input[name="VehicleHistory[' + index + ']"]').val(value);
                });


                // Vehicle shipping
                var vehicleShipping = response.vehicle.shipping;

                $.each(vehicleShipping, function (index, value) {
                    $(':input[name="VehicleShipping[' + index + ']"]').val(value);
                });


                // Vehicle plating
                var vehiclePlateAssigneds = response.vehicle.plateAssigneds;

                $.each(vehiclePlateAssigneds, function (index, value) {
                    $(':input[name="VehiclePlateAssigned[' + index + ']"]').val(value);
                });

                var events = response.vehicle.events;

                $.each(events, function (index, value) {
                    $(':input[name="Events[' + index + ']"]').val(value);
                });
            }
            else {
                alert(response.message);
                $('.vehiclesInventoryForm')[0].reset();
                $('.vinNumber').focus();



            }
        }
    });
}

$(document).on('change','.eventDropDownInVehiclesInfo', function(){

    var eventId = $(this).val().trim();
    $.ajax({
        url: baseUrl + '/index.php/vehicles/get-event-details-by-id',
        type: 'POST',
        data: {
            eventId: eventId
        },
        dataType: 'JSON',
        beforeSend: function () {

        },
        success: function (response) {
            response = $.parseJSON(JSON.stringify(response));

            if (response.status == '1') {
                // Vehicle Inventory
                var events = response.Events;

                $.each(events, function (index, value) {
                    $(':input[name="Events[' + index + ']"]').val(value);
                });
            }
            else {
                alert(response.message);
            }
        }
    });
});