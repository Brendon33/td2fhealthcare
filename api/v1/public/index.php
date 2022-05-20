<?php

use Slim\Container;

use td2fhealthcare\Connect\Connect;
use td2fhealthcare\DataSource\DataSource;


include '../vendor/autoload.php';
//include '../src/Connect/Connect.php';
//include '../src/DataSource/DataSource.php';

$container = new Container();
$app = new \Slim\App($container);

$container = $app->getContainer();
$container['db'] = function(){
    $conn = new Connect();
    $data = new DataSource($conn);

    return $data;
};




$app->get('/test', function ($request, $response,$args) {
       return $response->withStatus(200)->write('Hello World');

});

$app->get('/paitents',function ($request, $response,$args) {
//exit("error");
$data = $this->db;


$paitents = $data->getAllPaitents();

if ($paitents) {
    $response = $response->withJson($paitents);

    return $response;

}

});

$app->get('/paitents/{pid}', function ($request, $response, $args){
    $data = $this->db;
    $pid = $args['pid'];

    $paitents = $data->getPaitentsById($pid);

        if ($paitents) {
            # code...
            $response = $response->withJson($paitents);
            return $response;
        }

});

$app->post('/Paitent', function ($request, $response, $args){
    $params = $request->getParams();
    $data = $this->db;

    
    $newpaitents = $data->addNewPaitents($params);
   // exit('RR');
    
        if ($newpaitents) {
            # code...
            $response = $response->withJson("Paitents Added Successfully!"); 
        }else {
            # code...
            $response = $response->withJson("Error Adding Paitents");
        }
        return $response;
       // print_r($params);
});

$app->get('/doctors', function($request,$response,$args){
    $data = $this->db;

    $doctors = $data->getAllDoctors();
        if ($doctors) {
            # code...
            $response = $response->withJson($doctors);
            return $response;
        }
});

$app->get('/doctors/{Did}', function($request, $response, $args){
    $data = $this->db;
    $Did = $args['Did'];

        $doctors = $data->getDoctorsById($Did);

        if ($doctors) {
            # code...
            $response = $response->withJson($doctors);
            return $response;
        }
});

$app->post('/Doctors', function($request, $response,$args){
    $params = $request->getparams();
    $data = $this->db;
        $newdoctor = $data->addNewDoctors($params);
        if ($newdoctor) {
            # code...
            $response = $response->withJson("Docter added Successfully");
        }else {
            # code...
            $response = $response->withJson("Error Adding Doctor");
        }
        return $response;
});


$app->get('/staff', function($request, $response, $args){
    $data = $this->db;

        $staff = $data->getAllStaff();

        if ($staff) {
            # code...
            $response = $response->withJson($staff);
            return $response;
        }

});

$app->get('/staff/{Sid}', function($request, $response, $args){
    $data = $this->db;
    $Sid = $args['Sid'];

        $staff = $data->getStaffById($Sid);
        if ($staff) {
            # code...
            $response = $response->withJson($staff);
            return $response;
        }
});

$app->post('/Staff', function($request,$response,$args){
    $params = $request->getparams();
    $data = $this->db;

    $newstaff = $data->addNewStaff($params);
    if ($newstaff) {
        # code...
        $response = $response->withJson("Staff added Successfully!");
    }else {
        # code...
        $response = $response->withJson("Error Adding Staff");
    }
    return $response;
});

$app->get('/appointment', function($request,$response,$args){
    $data = $this->db;

        $appointment = $data->getAppointment();

        if ($appointment) {
            # code...
            $response = $response->withJson($appointment);
        }
});

$app->get('/appointment/{Aid}', function($request, $response,$args){
    $data = $this->db;
    $Aid = $args['Aid'];

    $appointment = $data->getAppointmentById($Aid);

    if ($appointment) {
        # code...
        $response = $response->withJson($appointment);
        return $response;
    }
});

$app->post('/Appointment', function($request,$response,$args){
    $params = $request->getparams();
    $data = $this->db;

    $newappointment = $data->addNewAppointment($params);
    if ($newappointment) {
        # code...
        $response = $response->withJson("Appointment added Successfully!");
    }else {
        # code...
        $response = $response->withJson("Error Adding Appointment");
    }
    return $response;
});


$app->run();
