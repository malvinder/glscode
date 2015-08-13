/**
 * Created by vikramjeet on 06-08-2015.
 */
// Set 1st index for add more button


/**
 * search by vin for add appointment
 */
$(document).on('change', '.searchByVinForAppointment', function () {

    var vinNo = $(this).val().trim();

    var srNumnber = $(this).data('indexid');

    if (vinNo == '') {
        alert('Please Select vin number');
        return false;
    }

    // If vin number has value than call goes for ajax
    if (vinNo) {

        $.ajax({
            url: baseUrl + '/index.php/vehicles/get-vehicle-for-appointment',
            type: 'POST',
            data: {
                vinNo: vinNo
            },
            dataType: 'JSON',
            beforeSend: function () {

            },
            success: function (response) {
                response = $.parseJSON(JSON.stringify(response));
                console.log(response);

                if (response.status == '1') {
                    // Vehicle Inventory
                    var vehiclesAppointmentForm = response.vehiclesAppointmentForm;

                    $.each(vehiclesAppointmentForm, function (index, value) {
                        $(':input[name="VehiclesAppointmentForm['+srNumnber+'][' + index + ']"]').val(value);
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
});



var indexForAddMore = 0;

/**
 * add more appointment
 */
$(document).on('click','#addMoreAppointment',function(){

    indexForAddMore++;

    // First column
    var html = '<tr><td><div class="form-group field-vehiclesappointmentform-vin_drop_down">\
            <select id="vehiclesappointmentform-vin_drop_down_' + indexForAddMore + '" class="searchByVinForAppointment" name="VehiclesAppointmentForm['+ indexForAddMore+'][vin_drop_down]" data-indexid="' + indexForAddMore + '">\
                <option value="">--Choose Type--</option>';
    html += $('.searchByVinForAppointment').html();
    html += '</select>\
            <div class="help-block"></div>\
        </div> </td>';

    // Second Column
    html += '<td><div class="form-group field-vehiclesappointmentform-vehicle_id required">\
                <input type="hidden" id="vehiclesappointmentform-vehicle_id_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][vehicle_id]">\
                    <div class="help-block"></div>\
                </div>\
                <p></p>\
                <div class="form-group field-vehiclesappointmentform-vin">\
                    <input type="text" id="vehiclesappointmentform-vin_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][vin]" disabled="disabled">\
                        <div class="help-block"></div>\
                    </div>\
                    <p></p>\
                    <p></p>\
                    <div class="form-group field-vehiclesappointmentform-transport_type">\
                        <input type="text" id="vehiclesappointmentform-transport_type_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][transport_type]" value="shipment">\
                            <div class="help-block"></div>\
                        </div>\
                        <p></p>\
                    </td>';

    // 3 rd column
    html += '<td>\
                  <p></p><div class="form-group field-vehiclesappointmentform-requested_date">\
                       <input type="text" id="vehiclesappointmentform-requested_date_' + indexForAddMore + '" name="VehiclesAppointmentForm[' + indexForAddMore + '][requested_date]" class="datePikerRe">\
                                <div class="help-block"></div>\
                            </div>\
                            <p></p>\
                            <p></p>\
                            <div class="form-group field-vehiclesappointmentform-requested_time">\
                                <input type="text" id="vehiclesappointmentform-requested_time_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][requested_time]">\
                                    <div class="help-block"></div>\
                                </div>\
                                <p></p>\
                            </td>';
    html += '<td><p></p>\
                                <div class="form-group field-vehiclesappointmentform-scheduled_date">\
                                    <input type="text" id="vehiclesappointmentform-scheduled_date_' + indexForAddMore + '" name="VehiclesAppointmentForm[' + indexForAddMore + '][scheduled_date]" class="datePikerRe">\
  <div class="help-block"></div>\
                                    </div>\
                                    <p></p>\
                                    <p></p>\
                                    <div class="form-group field-vehiclesappointmentform-scheduled_time">\
                                        <input type="text" id="vehiclesappointmentform-scheduled_time_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][scheduled_time]">\
                                           <div class="help-block"></div>\
                                        </div>\
                                        <p></p>\
                                    </td>';
    // 4th coloumn
    html += '<td>\
                                        <p> </p>\
                                        <div class="form-group field-vehiclesappointmentform-delivery_date required">\
                                            <input type="text" id="vehiclesappointmentform-delivery_date_' + indexForAddMore + '" name="VehiclesAppointmentForm[' + indexForAddMore + '][delivery_date]" class="datePikerRe">\
                                                <div class="help-block"></div>\
                                            </div>\
                                            <p></p>\
                                            <p></p>\
                                            <div class="form-group field-vehiclesappointmentform-delivery_time">\
                                                <input type="text" id="vehiclesappointmentform-delivery_time_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][delivery_time]">\
                                                   <div class="help-block"></div>\
                                                </div>\
                                                <p></p>\
                                            </td>';
    // 5th column
    html += '<td>    <p></p>\
                                                <div class="form-group field-vehiclesappointmentform-pick_up_date required">\
                                                    <input type="text" id="vehiclesappointmentform-pick_up_date_' + indexForAddMore + '" name="VehiclesAppointmentForm[' + indexForAddMore + '][pick_up_date]" class="datePikerRe">\
                                                        <div class="help-block"></div>\
                                                    </div>\
                                                    <p></p>\
                                                    <p></p>\
                                                    <div class="form-group field-vehiclesappointmentform-pick_up_time">\
                                                        <input type="text" id="vehiclesappointmentform-pick_up_time_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][pick_up_time]">\
                                                            <div class="help-block"></div>\
                                                        </div>\
                                                        <p></p>\
                                                    </td>';
   html += '<td>    <p> </p>\
                                                        <div class="form-group field-vehiclesappointmentform-prep_level">\
                                                            <input type="text" id="vehiclesappointmentform-prep_level_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][prep_level]">\
                                                                <div class="help-block"></div>\
                                                            </div>\
                                                            <p></p>\
                                                            <p></p>\
                                                            <div class="form-group field-vehiclesappointmentform-fuel_level">\
                                                                <input type="text" id="vehiclesappointmentform-fuel_level_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][fuel_level]">\
                                                                    <div class="help-block"></div>\
                                                                </div>\
                                                                <p></p>\
                                                            </td>';
    // 6th column

    html += '<td>  <p></p>\
                                                                <div class="form-group field-vehiclesappointmentform-vehicle_returned">\
                                                                    <input type="text" id="vehiclesappointmentform-vehicle_returned_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][vehicle_returned]" disabled="disabled">\
                                                                        <div class="help-block"></div>\
                                                                    </div>\
                                                                    <p></p>\
                                                                </td>';
    // 7th column
    html += '<td>                       <p> </p>\
                                                                    <div class="form-group field-vehiclesappointmentform-plate_number">\
                                                                        <input type="text" id="vehiclesappointmentform-plate_number_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][plate_number]" disabled="disabled">\
                                                                            <div class="help-block"></div>\
                                                                        </div>\
                                                                        <p></p>\
                                                                    </td>';
    // 8 th column
    html += '<td>                                                                        <p></p>\
                                                                        <div class="form-group field-vehiclesappointmentform-event_id">\
                                                                            <input type="hidden" id="vehiclesappointmentform-event_id_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][event_id]" value="';
    html += $('#vehiclesappointmentform-event_id').val();
    html +='">\
                                                                                <div class="help-block"></div>\
                                                                            </div>\
                                                                            <div class="form-group field-vehiclesappointmentform-contact_name">\
                                                                                <input type="text" id="vehiclesappointmentform-contact_name" class="form-control" name="VehiclesAppointmentForm[0][contact_name]" value="contact name2" disabled="disabled" value="';
    html += $('#vehiclesappointmentform-contact_name').val();
    html += '">\
                                                                                    <div class="help-block"></div>\
                                                                                </div>\
                                                                                <p></p>\
                                                                            </td>';

    // 9th column

    html += '<td>  <p></p>\
                                                                                <div class="form-group field-vehiclesappointmentform-coordinator">\
                                                                                    <input type="text" id="vehiclesappointmentform-coordinator_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][coordinator]" disabled="disabled" value="';
    html += $('#vehiclesappointmentform-coordinator').val();
    html += '">\
                                                                                        <div class="help-block"></div>\                                                                                    </div>\
                                                                                   <p></p>\
                                                                                </td>';

    // 10 th column
    html += '<td>                                     <p>\
                                                                                    </p>\
                                                                                    <div class="form-group field-vehiclesappointmentform-material_required">\
                                                                                        <select id="vehiclesappointmentform-material_required_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm[' + indexForAddMore + '][material_required]">\
                                                                                            <option value="0">no</option>\
                                                                                        </select>\
                                                                                        <div class="help-block"></div>\
                                                                                    </div>\
        <p></p>\
                                                                                </td>';
    // 11 th column
    html +='<td><p> </p>                                                                                    <div class="form-group field-vehiclesappointmentform-vdate">\
                                                                                        <input type="text" id="vehiclesappointmentform-vdate_' + indexForAddMore + '" name="VehiclesAppointmentForm[' + indexForAddMore + '][vdate]" class="datePikerRe">\
                                                                                            <div class="help-block"></div>\
                                                                                        </div>\
                                                                                        <p></p>\
                                                                                    </td>\
                                                                                </tr>';


/*
     var html = '<div class="form-group">\
             <div class="form-group field-vehiclesappointmentform-vin_drop_down">\
                 <label class="control-label" for="searchByVinForAppointment">Select Vin</label>\
                 <select class="searchByVinForAppointment" class="form-control" data-indexid = "' + indexForAddMore + '" name="VehiclesAppointmentForm['+indexForAddMore+'][vin_drop_down]">';

        html  +=  $('.searchByVinForAppointment').html();

        html +='</select>\
                  \
                 <div class="help-block"></div>\
             </div>\
         </div>\
         <div class= "form-group" >\
    <div class="form-group field-vehiclesappointmentform-vehicle_id_' + indexForAddMore + ' required">\
        <input type="hidden" id="vehiclesappointmentform-vehicle_id_' + indexForAddMore + '" class="form-control"\ name="VehiclesAppointmentForm['+indexForAddMore+'][vehicle_id]">\
        <div class="help-block"></div>\
        </div>\
        <div class="form-group field-vehiclesappointmentform-vin">\
            <label class="control-label" for="vehiclesappointmentform-vin_' + indexForAddMore + '">Vin</label>\
            <input type="text" id="vehiclesappointmentform-vin_'+indexForAddMore+'" class="form-control" name="VehiclesAppointmentForm['+indexForAddMore+'][vin]" disabled="disabled">\
                <div class="help-block"></div> \
            </div>\
        </div>\
        <div class="form-group">\
            <div class="form-group field-vehiclesappointmentform-transport_type">\
                <label class="control-label" for="vehiclesappointmentform-transport_type">Transport Type</label>\
                <input type="text" id="vehiclesappointmentform-transport_type_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm['+indexForAddMore+'][transport_type]" value="shipment">\
                    <div class="help-block"></div>\
                </div>\
            </div>\
            <div class="form-group">\
                <div class="form-group field-vehiclesappointmentform-scheduled_date">\
                    <label class="control-label" for="vehiclesappointmentform-scheduled_date_' + indexForAddMore + '">Scheduled Date</label>\
                    <input type="text" id="vehiclesappointmentform-scheduled_date_' + indexForAddMore + '" name="VehiclesAppointmentForm['+indexForAddMore+'][scheduled_date]" class="datePikerRe">\
                        <div class="help-block"></div>\
                    </div>\
                </div>\
                <div class="form-group">\
                    <!-- pickup date -->\
                    <div class="form-group field-vehiclesappointmentform-pick_up_date_' + indexForAddMore + ' required">\
                        <label class="control-label" for="vehiclesappointmentform-pick_up_date_' + indexForAddMore + '">Pick Up Date</label>\
                        <input type="text" id="vehiclesappointmentform-pick_up_date_' + indexForAddMore + '" name="VehiclesAppointmentForm['+indexForAddMore+'][pick_up_date]" class="datePikerRe">\
                    <div class="help-block"></div>\
                    </div>\
                    </div>\
                <div class="form-group">\
            <!-- delivery date -->\
                        <div class="form-group field-vehiclesappointmentform-delivery_date_' + indexForAddMore +' required">\
                            <label class="control-label" for="vehiclesappointmentform-delivery_date_' + indexForAddMore + '">Delivery Date</label>\
                            <input type="text" id="vehiclesappointmentform-delivery_date_' + indexForAddMore + '" name="VehiclesAppointmentForm['+indexForAddMore+'][delivery_date]" class="datePikerRe">\
                                <div class="help-block"></div>\
                            </div>\
                        </div>\
                        <div class="form-group">\
                            <!-- fuel level  -->\
                            <div class="form-group field-vehiclesappointmentform-prep_level">\
                                <label class="control-label" for="vehiclesappointmentform-prep_level_' + indexForAddMore + '">Prep Level</label>\
                                <input type="text" id="vehiclesappointmentform-prep_level_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm['+indexForAddMore+'][prep_level]">\
                                    <div class="help-block"></div>\
                                </div>\
                            </div>\
                            <div class="form-group">\
                                <!-- fuel level  -->\
                                <div class="form-group field-vehiclesappointmentform-fuel_level">\
                                    <label class="control-label" for="vehiclesappointmentform-fuel_level_' + indexForAddMore + '">Fuel Level</label>\
                                    <input type="text" id="vehiclesappointmentform-fuel_level_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm['+indexForAddMore+'][fuel_level]">\
                                        <div class="help-block"></div>\
                                    </div>\
                                </div>\
                                <div class="form-group">\
                                    <!-- return data -->\
                                    <div class="form-group field-vehiclesappointmentform-vehicle_returned">\
                                        <label class="control-label" for="vehiclesappointmentform-vehicle_returned_' + indexForAddMore + '">Vehicle Returned</label>\
                                        <input type="text" id="vehiclesappointmentform-vehicle_returned_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm['+indexForAddMore+'][vehicle_returned]" disabled="disabled">\
                                            <div class="help-block"></div>\
                                        </div>\
                                    </div>\
                                    <div class="form-group">\
                                        <!-- return data -->\
                                        <div class="form-group field-vehiclesappointmentform-plate_number">\
                                            <label class="control-label" for="vehiclesappointmentform-plate_number_' + indexForAddMore + '">Plate Number</label>\
                                            <input type="text" id="vehiclesappointmentform-plate_number_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm['+indexForAddMore+'][plate_number]" disabled="disabled">\
                                                <div class="help-block"></div>\
                                            </div>\
                                        </div>\
                                        <div class="form-group">\
                                            <!-- client name -->\
                                            <div class="form-group field-vehiclesappointmentform-event_id">\
                                                <input type="hidden" id="vehiclesappointmentform-event_id_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm['+indexForAddMore+'][event_id]" value="';
    html += $('#vehiclesappointmentform-event_id').val();

    html +='"><div class="help-block"></div>\
                                                </div>\
                                                <div class="form-group field-vehiclesappointmentform-contact_name">\
                                                    <label class="control-label" for="vehiclesappointmentform-contact_name_' + indexForAddMore + '">Contact Name</label>\
                                                    <input type="text" id="vehiclesappointmentform-contact_name_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm['+indexForAddMore+'][contact_name]"  disabled="disabled" value="';
    html += $('#vehiclesappointmentform-contact_name').val();
    html +='"><div class="help-block"></div>\
                                                    </div>\
                                                </div>\
                                                <div class="form-group">\
                                                    <!-- coordinator -->\
                                                    <div class="form-group field-vehiclesappointmentform-coordinator">\
                                                        <label class="control-label" for="vehiclesappointmentform-coordinator">Coordinator</label>\
                                                        <input type="text" id="vehiclesappointmentform-coordinator_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm['+indexForAddMore+'][coordinator]" disabled="disabled" value="';
    html += $('#vehiclesappointmentform-coordinator').val();
    html+='">\
                                                            <div class="help-block"></div>\
                                                        </div>\
                                                    </div>\
                                                    <div class="form-group">\
                                                        <div class="form-group field-vehiclesappointmentform-material_required">\
                                                            <label class="control-label" for="vehiclesappointmentform-material_required_' + indexForAddMore + '">Material Required</label>\
                                                            <select id="vehiclesappointmentform-material_required_' + indexForAddMore + '" class="form-control" name="VehiclesAppointmentForm['+indexForAddMore+'][material_required]">\
                                                                <option value="0">no</option>\
                                                            </select>\
                                                            <div class="help-block"></div>\
                                                        </div>\
                                                    </div>\
                                                    <div class="form-group">\
                                                        <!-- coordinator -->\
                                                        <div class="form-group field-vehiclesappointmentform-vdate">\
                                                            <label class="control-label" for="vehiclesappointmentform-vdate">Vdate</label>\
                                                            <input type="text" id="vehiclesappointmentform-vdate_' + indexForAddMore + '" name="VehiclesAppointmentForm['+indexForAddMore+'][vdate]" class="datePikerRe">\
                                                                <div class="help-block"></div>\
                                                            </div>\
                                                        </div>\
                                                    </fieldset>';
*/
    $('.addvehiclesAppointmentForm table tbody').append(html);
    $('.addvehiclesAppointmentForm table tr:last .datePikerRe').datepicker();
    //validation(indexForAddMore);
});

$(document).on('click', '.closeAppointmentForm', function(){
   $(this).parents('fieldset').remove();
});

function validation(indexForAddMore){
    jQuery('.addvehiclesAppointmentForm').yiiActiveForm([{
        "id": "vehiclesappointmentform-vehicle_id_"+ indexForAddMore,
        "name": "vehicle_id",
        "container": ".field-vehiclesappointmentform-vehicle_id_" + indexForAddMore,
        "input": "#vehiclesappointmentform-vehicle_id_" + indexForAddMore,
        "validate": function (attribute, value, messages, deferred, $form) {
            yii.validation.required(value, messages, {"message": "Vehicle Id cannot be blank."});
        }
    },  {
        "id": "vehiclesappointmentform-pick_up_date_" + indexForAddMore,
        "name": "pick_up_date",
        "container": ".field-vehiclesappointmentform-pick_up_date_" + indexForAddMore,
        "input": "#vehiclesappointmentform-pick_up_date_" + indexForAddMore,
        "validate": function (attribute, value, messages, deferred, $form) {
            yii.validation.required(value, messages, {"message": "Pick Up Date cannot be blank."});
        }
    }, {
        "id": "vehiclesappointmentform-delivery_date_" + indexForAddMore,
        "name": "delivery_date",
        "container": ".field-vehiclesappointmentform-delivery_date_" + indexForAddMore,
        "input": "#vehiclesappointmentform-delivery_date_" + indexForAddMore,
        "validate": function (attribute, value, messages, deferred, $form) {
            yii.validation.required(value, messages, {"message": "Delivery Date cannot be blank."});
        }
    }
    ], []);
}