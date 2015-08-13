<?php
/* @var $this yii\web\View */
?>
<h1>Vehicle Received</h1>
<br/>
<h3>Vehicle Information</h3>
<table>
<tr>
<th>VIN</th>
<td> : </td>
<td><?php echo $vehicleInventory['vin']; ?></td>
</tr>
<th>Make</th>
<td> : </td>
<td><?php echo $vehicleInventory['make']; ?></td>
</tr>
<th>Model</th>
<td> : </td>
<td><?php echo $vehicleInventory['model']; ?></td>
</tr>
<th>Year</th>
<td> : </td>
<td><?php echo $vehicleInventory['year']; ?></td>
</tr>
<th>Color</th>
<td> : </td>
<td><?php echo $vehicleInventory['color']; ?></td>
</tr>
<th>Restricted</th>
<td> : </td>
<td><?php echo $vehicleInventory['restricted']; ?></td>
</tr>
<th>Type</th>
<td> : </td>
<td><?php echo $vehicleInventory['type0']['types'];?></td>
</tr>
<th>Status</th>
<td> : </td>
<td><?php echo $vehicleInventory['status0']['status_code'];?> - <?php echo $vehicleInventory['status0']['status_description'];?></td>
</tr>
</table>
<br/><hr/><br />
<h3>Vehicle Receiving</h3>
<table>
<tr>
<th>Received Mileage</th>
<td> : </td>
<td><?php echo $vehicleHistory['received_mileage']; ?></td>
</tr>
<th>Received Date</th>
<td> : </td>
<td><?php echo $vehicleHistory['received_date']; ?></td>
</tr>
<th>Received by</th>
<td> : </td>
<td><?php echo $vehicleHistory['receivedBy']['username']; ?></td>
</tr>
<th>Released Mileage</th>
<td> : </td>
<td><?php echo $vehicleHistory['released_mileage']; ?></td>
</tr>
<th>Released Date</th>
<td> : </td>
<td><?php echo $vehicleHistory['released_date']; ?></td>
</tr>
<th>Date Added</th>
<td> : </td>
<td><?php echo $vehicleHistory['date_added']; ?></td>
</tr>
</table>
<br/><hr/><br />
<h3>Vehicle Plating</h3>
<table>
<tr>
<th>Plate Number</th>
<td> : </td>
<td><?php echo $vehiclePlating['plateNumber']['plate_number']; ?></td>
</tr>
<th>Date Assigned</th>
<td> : </td>
<td><?php echo $vehiclePlating['date_assigned']; ?></td>
</tr>
<th>Assigned By</th>
<td> : </td>
<td><?php echo $vehiclePlating['assignedBy']['username']; ?></td>
</tr>
<th>Date Unassigned</th>
<td> : </td>
<td><?php echo $vehiclePlating['date_unassigned']; ?></td>
</tr>
<th>Unassigned By</th>
<td> : </td>
<td><?php echo $vehiclePlating['unassignedBy']['username']; ?></td>
</tr>
<th>Plate Status</th>
<td> : </td>
<td><?php echo $vehiclePlating['plateStatus']['plate_status']; ?></td>
</tr>
</table>
<br/><hr/><br />
<h3>Vehicle Shipping</h3>
<table>
<tr>
<th>VIN</th>
<td> : </td>
<td><?php echo $vehicleInventory['vin']; ?></td>
</tr>
<th>Shipping Date</th>
<td> : </td>
<td><?php echo $vehicleShipping['vdate']; ?></td>
</tr>
<th>Scheduled Date</th>
<td> : </td>
<td><?php echo $vehicleShipping['scheduled_date']; ?></td>
</tr>
<th>Scheduled Time</th>
<td> : </td>
<td><?php echo $vehicleShipping['scheduled_time']; ?></td>
</tr>
<th>Plate Number</th>
<td> : </td>
<td><?php echo $vehicleShipping['vehiclePlate']['plate_number']; ?></td>
</tr>
<th>Event</th>
<td> : </td>
<td><?php echo $vehicleShipping['event0']['event_name']; ?></td>
</tr>
<th>Comments</th>
<td> : </td>
<td><?php echo $vehicleShipping['comments']; ?></td>
</tr>
</table>