<?php
namespace app\controllers;


use yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\VehiclesType;
use app\models\VehicleTypeForm;
use app\models\VehicleStatus;
use app\models\VehicleStatusForm;
use app\models\VehicleInventory;
use app\models\VehicleHistory;
use app\models\VehiclePlateAssigned;
use app\models\VehicleShipping;
use app\models\VehiclePlateNumber;
use app\models\VehiclePlatingStatus;
use app\models\VehiclePlatingType;
use app\models\Events;

/**
 * Class VehiclesController
 *       This class is vehicles controller.
 *       Its manage vehicles.
 * @package app\controllers
 */
class VehiclesController extends Controller
{

    /**
     * index
     *    Its default function
     */
    public function actionIndex()
    {

        // Render to view
        $this->render('index');
    }

    /**
     * vehicles types
     *      Its shows vehicles type Listing.
     * @return string
     */
    public function actionVehiclesTypes()
    {
        // Set title
        $this->view->title = 'Vehicles Types';

        // Fetch all records from vehicles_type table
        $query = VehiclesType::find();

        // Pagination
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        // Vehicles type table results order by and pagination
        $vehiclesType = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        // Render to vehicles-types view
        return $this->render('vehicles-types', [
            'vehiclesType' => $vehiclesType,
            'pagination' => $pagination,
        ]);
    }

    /**
     * add vehicles type
     *     This function add new types in Vehicles types.
     * @return string
     */
    public function actionAddVehiclesType()
    {
        // Set title
        $this->view->title = 'Add Vehicles Type';

        // Define object of vehicles type form class object which define in model
        $vehicleTypeForm = new VehicleTypeForm();

        // Check has post set and data validate
        if ($vehicleTypeForm->load(Yii::$app->request->post()) && $vehicleTypeForm->validate()) {

            // Object for vehicles_type table
            $vehiclesTypeTable = new VehiclesType;

            // Set types
            $vehiclesTypeTable->types = $vehicleTypeForm->type;

            // Save records
            $vehiclesTypeTable->save();

            // Redirect after successfully save to listing page
            $this->redirect(array('/index.php/vehicles/types'));

        } else {
            // If post is not set than render for add form
            return $this->render('add-vehicles-type-form', ['model' => $vehicleTypeForm]);
        }
    }

    /**
     * edit Vehicles type
     * @param null $id
     * @return string
     */

    public function actionEditVehiclesType($id = NULL)
    {
        // Set title
        $this->view->title = 'Edit Vehicle Type';

        // Define object of vehicles type form class object which define in model
        $vehicleTypeForm = new VehicleTypeForm();

        // Object for vehicles_type table
        $vehiclesTypeTable = new VehiclesType;

        // If edit form submit than update in db
        if ($vehicleTypeForm->load(Yii::$app->request->post()) && $vehicleTypeForm->validate()) {

            // Get records which one edit
            $vehiclesTypeTable = $vehiclesTypeTable->findOne($vehicleTypeForm->id);

            // Set values
            $vehiclesTypeTable->types = $vehicleTypeForm->type;
            $vehiclesTypeTable->save();

            // After edit redirect to vehicles types
            $this->redirect(array('/index.php/vehicles/types'));

        } else {

            // If id is not come than redirect to add vehicles types
            if (!$id) {
                $this->redirect(array('/index.php/vehicles/add-vehicles-type'));
            }

            // Query for find one particular record which one going to edit
            $vehiclesTypeTable = $vehiclesTypeTable->findOne($id);

            // Render to view
            return $this->render('edit-vehicles-type-form', ['model' => $vehicleTypeForm, 'vehiclesTypeTable' => $vehiclesTypeTable]);
        }
    }

    /**
     * vehicles status
     *      It shows listing of vehicles status
     * @return string
     */
    public function actionVehiclesStatus()
    {
        // Set title
        $this->view->title = 'Vehicles Status';
        // Query for all records
        $query = VehicleStatus::find();

        // Pagination
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        // Order by
        $vehiclesStatus = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        // Render to view
        return $this->render('vehicles-status', [
            'vehiclesStatus' => $vehiclesStatus,
            'pagination' => $pagination,
        ]);
    }

    /**
     * add vehicles status
     * @return string
     */
    public function actionAddVehiclesStatus()
    {
        // Set title
        $this->view->title = 'Add Vehicles Status';

        // Add vehicles status form object
        $vehicleStatusForm = new VehicleStatusForm();

        // Check form submit
        if ($vehicleStatusForm->load(Yii::$app->request->post()) && $vehicleStatusForm->validate()) {

            // Table object
            $vehiclesStatusTable = new VehicleStatus;

            // Set values
            $vehiclesStatusTable->status_code = $vehicleStatusForm->statusCode;
            $vehiclesStatusTable->status_description = $vehicleStatusForm->statusDescription;

            // Save
            $vehiclesStatusTable->save();

            // Redirect on success
            $this->redirect(array('/index.php/vehicles/status'));

        } else {

            // Render to view
            return $this->render('add-vehicles-status-form', ['model' => $vehicleStatusForm]);
        }
    }

    /**
     * edit vehicles status
     * @param null $id
     * @return string
     */

    public function actionEditVehiclesStatus($id = NULL)
    {
        // Set title
        $this->view->title = 'Edit Vehicles Status';

        // Define object of vehicles type form class object which define in model
        $vehicleStatusForm = new VehicleStatusForm();

        // Object for vehicles_type table
        $vehiclesStatusTable = new VehicleStatus();

        if ($vehicleStatusForm->load(Yii::$app->request->post()) && $vehicleStatusForm->validate()) {

            // Get particular record which one edit
            $vehiclesStatusTable = $vehiclesStatusTable->findOne($vehicleStatusForm->id);

            // Set values
            $vehiclesStatusTable->status_code = $vehicleStatusForm->statusCode;
            $vehiclesStatusTable->status_description = $vehicleStatusForm->statusDescription;

            // Save
            $vehiclesStatusTable->save();

            // Redirect on success
            $this->redirect(array('/index.php/vehicles/status'));

        } else {

            // If id is not come than redirect to
            if (!$id) {
                $this->redirect(array('/index.php/vehicles/add-vehicles-status'));
            }

            // Get one records
            $vehiclesStatusTable = $vehiclesStatusTable->findOne($id);

            // Render to view
            return $this->render('edit-vehicles-status-form', ['model' => $vehicleStatusForm, 'vehiclesStatusTable' => $vehiclesStatusTable]);
        }
    }

    /**
     * Vehicles Info
     *   Shows vehicles entry form
     *   Save vehciles entry
     *   Update vehciles entry
     * @return string
     */
    public function actionVehicleInfo()
    {
        // Set title
        $this->view->title = 'Save Vehicle';

        // Load Models
        $vehicleInventory = new VehicleInventory();
        $vehicleHistory = new VehicleHistory();
        $vehiclePlating = new VehiclePlateAssigned();
        $vehicleShipping = new VehicleShipping();


        // Load post data to VehicleInventory Model
        if ($vehicleInventory->load(Yii::$app->request->post())) {

            // If id come than update record
            if ($vehicleInventory->id) {
                $vehicleInventory->setOldAttributes(['id' => $vehicleInventory->id]);
            }

            // Value save or update
            if ($vehicleInventory->save(false)) {

                // Get id from newly inserted or update record
                $id = $vehicleInventory->id;

                // Load post data to VehicleHistory Model
                if ($vehicleHistory->load(Yii::$app->request->post())) {
                    // If id come than update record
                    if ($vehicleHistory->id) {
                        $vehicleHistory->setOldAttributes(['id' => $vehicleHistory->id]);
                    }
                    // Set vehicleId by vehicle_inventory primary key
                    $vehicleHistory->vehicleId = $id;

                    // Save record
                    $vehicleHistory->save(false);
                }

                // Load post data to VehiclePlating Model
                if ($vehiclePlating->load(Yii::$app->request->post())) {
                    // If id come than update record
                    if ($vehiclePlating->id) {
                        $vehiclePlating->setOldAttributes(['id' => $vehiclePlating->id]);
                    }

                    // Set vehicleId by vehicle_inventory primary key
                    $vehiclePlating->vehicleId = $id;

                    // Save record
                    $vehiclePlating->save(false);
                }

                // Load post data to VehiclePlating Model
                if ($vehicleShipping->load(Yii::$app->request->post())) {

                    // If id come than update record
                    if ($vehicleShipping->id) {
                        $vehicleShipping->setOldAttributes(['id' => $vehicleShipping->id]);
                    }

                    // Set vehicleId by vehicle_inventory primary key
                    $vehicleShipping->vehicleId = $id;

                    // Save record
                    $vehicleShipping->save(false);
                }
                // Redirect to vehicle-display
                $this->redirect(array('vehicles/vehicle-display', 'vehicleId' => $id));
            } else {

                // Get error
                $vehicleInventory->getErrors();
            }
        } else {

            // Render to view
            return $this->render('vehicles-inventory', [
                'vehicleInventory' => $vehicleInventory,
                'vehicleHistory' => $vehicleHistory,
                'vehiclePlating' => $vehiclePlating,
                'vehicleShipping' => $vehicleShipping
            ]);
        }
    }

    /**
     * Vehicle Display
     *      Display the vehicle details
     * @return string
     */
    public function actionVehicleDisplay($vehicleId)
    {
        // Set title
        $this->view->title = 'Vehicle Details';

        // Get record from vehicle_inventory
        $vehicleInventoryRecord = VehicleInventory::find()->with(['type0', 'status0', 'coordinator0'])->where(['id' => $vehicleId])->asArray()->one();

        // Get record from vehicle_history
        $vehicleHistoryRecord = VehicleHistory::find()->with(['receivedBy'])->where(['vehicleId' => $vehicleId])->asArray()->one();

        // Get record from vehicle_plate_assigned
        $vehiclePlateAssignedRecord = VehiclePlateAssigned::find()->with(['assignedBy', 'unassignedBy', 'plateNumber', 'plateStatus'])->where(['vehicleId' => $vehicleId])->asArray()->one();

        // Get record from vehicle_shipping
        $vehicleShippingRecord = VehicleShipping::find()->with(['event0', 'vehiclePlate'])->where(['vehicleId' => $vehicleId])->asArray()->one();

        // Render to view
        return $this->render('vehicles-display', ['vehicleInventory' => $vehicleInventoryRecord, 'vehicleHistory' => $vehicleHistoryRecord, 'vehiclePlating' => $vehiclePlateAssignedRecord, 'vehicleShipping' => $vehicleShippingRecord]);

    }


    /**
     * Get Vehicle details
     *  This works on ajax
     *  Get record from vn number
     *
     * @return json $response;
     */
    public function actionGetVehicle()
    {
        // Set default response
        $response = [
            'status' => '0',
            'message'=> 'Can not find any Vehicle'
        ];

        // Load Models
        $vehicleInventory = new VehicleInventory();

        // Get vin number
        $vinNo = Yii::$app->request->post('vinNo');

        // Get record by vin number
        $vehicleDetails = $vehicleInventory->findOne(['vin' => $vinNo]);

        // Check vehicleDetails has record or not
        if ($vehicleDetails) {

            // Vehicle History
            $vehicleHistory = $vehicleDetails->vehicleHistories;
            $vehicleHistory = isset($vehicleHistory['0']) ? $vehicleHistory['0'] : '';

            // Vehicle Shipping
            $vehicleShipping = $vehicleDetails->vehicleShippings;
            $vehicleShipping = isset($vehicleShipping['0']) ? $vehicleShipping['0'] : '';

            // Vehicle plates asssigneds
            $vehiclePlateAssigneds = $vehicleDetails->vehiclePlateAssigneds;
            $vehiclePlateAssigneds = isset($vehiclePlateAssigneds['0']) ? $vehiclePlateAssigneds['0'] : '';


            // Assign success status
            $response['status'] = '1';

            // Assign data
            $response['vehicle']['inventory'] = $vehicleDetails ? $vehicleDetails->toArray() : [];
            $response['vehicle']['history'] = $vehicleHistory ? $vehicleHistory->toArray() : [];
            $response['vehicle']['shipping'] = $vehicleShipping ? $vehicleShipping->toArray() : [];
            $response['vehicle']['plateAssigneds'] = $vehiclePlateAssigneds ? $vehiclePlateAssigneds->toArray() : [];
        }

        // Return response to ajax
        echo json_encode($response);
        die;
    }

    /**
     * Vehicle Plate Numbers
     *      Its show listing of plate numbers
     * @return string
     */
    public function actionVehiclePlateNumbers(){

        // Set title
        $this->view->title = 'Plate Numbers';

        // Create object of vehicle plate number
        $vehiclePlateNumbers = new VehiclePlateNumber();

        // Fetch all records from vehicles_type table
        $query = $vehiclePlateNumbers->find();

        // Pagination
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        // Vehicles plating numbers table results order by and pagination
        $vehiclesPlateNumbers = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        // Render to vehicles-plate-numbers view
        return $this->render('vehicles-plate-numbers', [
            'vehiclesPlateNumbers' => $vehiclesPlateNumbers,
            'pagination' => $pagination,
        ]);
    }

    /**
     * add vehicle plate number
     *   add in vehicles plate number table
     * @return string
     */
    public function actionAddVehiclePlateNumber()
    {
        // Set title
        $this->view->title = 'Add Vehicle Plate Number';

        // Add Vehicle Plate Number form object
        $vehiclePlateNumberForm = new VehiclePlateNumber();

        // Check form submit
        if ($vehiclePlateNumberForm->load(Yii::$app->request->post()) && $vehiclePlateNumberForm->validate()) {

            // Save
            $vehiclePlateNumberForm->save();

            // Redirect on success
            $this->redirect(array('/index.php/vehicles/plates/numbers'));

        } else {

            // Create object for vehicle plating status table
            $vehiclePlatingStatus = new VehiclePlatingStatus();

            // Query for all records
            $vehiclePlatingStatus = $vehiclePlatingStatus->find()->all();

            // Create object for vehicle plating type table
            $vehiclePlatingType = new VehiclePlatingType();

            // Query for all records
            $vehiclePlatingType = $vehiclePlatingType->find()->all();

            // Render to view
            return $this->render('add-vehicles-plate-number-form', ['vehiclePlateNumberForm' => $vehiclePlateNumberForm , 'vehiclePlatingStatus'=> $vehiclePlatingStatus , 'vehiclePlatingType' => $vehiclePlatingType]);
        }
    }

    /**
     * edit vehicle plate number
     *    edit vehicle plate number records
     * @param $id
     * @return string
     */
    public function actionEditVehiclePlateNumber($id = NULL) {

        // Set title
        $this->view->title = 'Edit Vehicle Plate Number';

        // Add Vehicle Plate Number form object
        $vehiclePlateNumber = new VehiclePlateNumber();

        // Check form submit
        if ($vehiclePlateNumber->load(Yii::$app->request->post()) && $vehiclePlateNumber->validate()) {

            // Set id for edit
            $vehiclePlateNumber->setOldAttributes(['id' => $vehiclePlateNumber->id]);

            // Save
            $vehiclePlateNumber->save();

            // Redirect on success
            $this->redirect(array('/index.php/vehicles/plates/numbers'));

        } else {

            // Create object for vehicle plating status table
            $vehiclePlatingStatus = new VehiclePlatingStatus();

            // Query for all records
            $vehiclePlatingStatus = $vehiclePlatingStatus->find()->all();

            // Create object for vehicle plating type table
            $vehiclePlatingType = new VehiclePlatingType();

            // Query for all records
            $vehiclePlatingType = $vehiclePlatingType->find()->all();

            if (!$id) {
                // Render to view
                return $this->render('add-vehicles-plate-number-form', ['vehiclePlateNumberForm' => $vehiclePlateNumber, 'vehiclePlatingStatus' => $vehiclePlatingStatus, 'vehiclePlatingType' => $vehiclePlatingType]);
            }

            $vehiclePlateNumber = $vehiclePlateNumber->findOne($id);

            // Render to view
            return $this->render('edit-vehicles-plate-number-form', ['vehiclePlateNumber' => $vehiclePlateNumber, 'vehiclePlatingStatus' => $vehiclePlatingStatus, 'vehiclePlatingType' => $vehiclePlatingType]);
        }
    }

    /**
     * VehiclePlatingTypes
     *    Show listing of plating types
     * @return string
     */
    public function actionVehiclePlatingTypes()
    {
        // Set title
        $this->view->title = 'Type Plate Numbers';

        // Create object
        $vehiclePlatingTypes = new VehiclePlatingType();

        // Fetch all records from vehicles_type table
        $query = $vehiclePlatingTypes->find();

        // Pagination
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        // Vehicles plating type table results order by and pagination
        $vehiclePlatingTypes = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        // Render to vehicles plating types view
        return $this->render('vehicles-plating-types', [
            'vehiclePlatingTypes' => $vehiclePlatingTypes,
            'pagination' => $pagination,
        ]);
    }

    /**
     * add vehicle plating type
     *     This function add new types in Vehicles plating types.
     * @return string
     */
    public function actionAddVehiclePlatingType()
    {
        // Set title
        $this->view->title = 'Add Vehicle Plating Status';

        // Create object
        $vehiclePlatingType = new VehiclePlatingType();

        // Check has post set and data validate
        if ($vehiclePlatingType->load(Yii::$app->request->post()) && $vehiclePlatingType->validate()) {

            // Save records
            $vehiclePlatingType->save();

            // Redirect after successfully save to listing page
            $this->redirect(array('vehicles/plates/types'));

        } else {

            // If post is not set than render for add form
            return $this->render('add-vehicle-plating-type-form', ['vehiclePlatingType' => $vehiclePlatingType]);
        }
    }

    /**
     * edit vehicle plating type
     *     This function edit types in Vehicles plating types.
     * @return string
     */
    public function actionEditVehiclePlatingType($id = NULL)
    {
        // Set title
        $this->view->title = 'Edit Vehicle Plating Status';

        // Define object of vehicles type form class object which define in model
        $vehiclePlatingType = new VehiclePlatingType();

        // Check has post set and data validate
        if ($vehiclePlatingType->load(Yii::$app->request->post()) && $vehiclePlatingType->validate()) {

            $vehiclePlatingType->setOldAttributes(['id'=> $vehiclePlatingType->id]);
            // Save records
            $vehiclePlatingType->save();

            // Redirect after successfully save to listing page
            $this->redirect(array('vehicles/plates/types'));

        } else {
            if(!$id){
               // If id null than go for add
                return $this->render('add-vehicle-plating-type-form', ['vehiclePlatingType' => $vehiclePlatingType]);
            }

            // Get one particular id record
            $vehiclePlatingType = $vehiclePlatingType->findOne($id);

            // If post is not set than render for edit form
            return $this->render('edit-vehicle-plating-type-form', ['vehiclePlatingType' => $vehiclePlatingType]);
        }
    }

    /**
     * VehiclePlatingStatus
     *      Listing of vehicles plating status
     * @return string
     */
    public function actionVehiclePlatingStatus()
    {
        // Set title
        $this->view->title = 'Status Plate Numbers';

        // Create object
        $vehiclePlatingStatus = new VehiclePlatingStatus();

        // Fetch all records
        $query = $vehiclePlatingStatus->find();

        // Pagination
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        // Vehicles plating status table results order by and pagination
        $vehiclePlatingStatus = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        // Render to view
        return $this->render('vehicles-plating-status', [
            'vehiclePlatingStatus' => $vehiclePlatingStatus,
            'pagination' => $pagination,
        ]);
    }

    /**
     * add vehicle plating status
     *     This function add new types in Vehicles types.
     * @return string
     */
    public function actionAddVehiclePlatingStatus()
    {
        // Set title
        $this->view->title = 'Add Vehicle Plating Status';

        // Create object
        $vehiclePlatingStatus = new VehiclePlatingStatus();

        // Check has post set and data validate
        if ($vehiclePlatingStatus->load(Yii::$app->request->post()) && $vehiclePlatingStatus->validate()) {

            // Save records
            $vehiclePlatingStatus->save();

            // Redirect after successfully save to listing page
            $this->redirect(array('vehicles/plates/statuses'));

        } else {

            // If post is not set than render for add form
            return $this->render('add-vehicle-plating-status-form', ['vehiclePlatingStatus' => $vehiclePlatingStatus]);
        }
    }

    /**
     * edit vehicle plating status
     *     This function edit status in Vehicles plating status.
     * @return string
     */
    public function actionEditVehiclePlatingStatus($id = NULL)
    {
        // Set title
        $this->view->title = 'Edit Vehicle Plating Status';

        // Define object of vehicles type form class object which define in model
        $vehiclePlatingStatus = new VehiclePlatingStatus();

        // Check has post set and data validate
        if ($vehiclePlatingStatus->load(Yii::$app->request->post()) && $vehiclePlatingStatus->validate()) {

            $vehiclePlatingStatus->setOldAttributes(['id' => $vehiclePlatingStatus->id]);
            // Save records
            $vehiclePlatingStatus->save();

            // Redirect after successfully save to listing page
            $this->redirect(array('vehicles/plates/statuses'));

        } else {
            if (!$id) {
                // If id is null than go for add
                return $this->render('add-vehicle-plating-status-form', ['vehiclePlatingStatus' => $vehiclePlatingStatus]);
            }

            // Get the particular record
            $vehiclePlatingStatus = $vehiclePlatingStatus->findOne($id);

            // If post is not set than render for edit form
            return $this->render('edit-vehicle-plating-status-form', ['vehiclePlatingStatus' => $vehiclePlatingStatus]);
        }
    }

    /**
     * Events
     *      Listing of Events
     * @return string
     */
    public function actionEvents()
    {
        // Set title
        $this->view->title = 'Events';

        // Create object
        $events = new Events();

        // Fetch all records
        $query = $events->find();

        // Pagination
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        // Events table results order by and pagination
        $events = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        // Render to view
        return $this->render('events-listing', [
            'events' => $events,
            'pagination' => $pagination,
        ]);
    }

    /**
     * add Event
     *     This function add new types in Vehicles types.
     * @return string
     */
    public function actionAddEvent()
    {
        // Set title
        $this->view->title = 'Add Event';

        // Create object
        $events = new Events();

        // Check has post set and data validate
        if ($events->load(Yii::$app->request->post()) && $events->validate()) {

            // Save records
            $events->save();

            // Redirect after successfully save to listing page
            $this->redirect(array('vehicles/events'));

        } else {

            // If post is not set than render for add form
            return $this->render('add-event', ['events' => $events]);
        }
    }

    /**
     * edit event
     *     This function edit event
     * @return string
     */
    public function actionEditEvent($id = NULL)
    {
        // Set title
        $this->view->title = 'Edit Event';

        // Define object for events
        $event = new Events();

        // Check has post set and data validate
        if ($event->load(Yii::$app->request->post()) && $event->validate()) {

            $event->setOldAttributes(['id' => $event->id]);
            // Save records
            $event->save();

            // Redirect after successfully save to listing page
            $this->redirect(array('vehicles/events'));

        } else {
            if (!$id) {
                // If id is null than go for add
                return $this->render('add-event', ['event' => $event]);
            }

            // Get the particular record
            $event = $event->findOne($id);

            // If post is not set than render for edit form
            return $this->render('edit-event', ['event' => $event]);
        }
    }
}