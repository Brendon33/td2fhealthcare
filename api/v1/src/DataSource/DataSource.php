<?php

namespace td2fhealthcare\DataSource;

class DataSource {

private $db;

function __construct($conn)

{
  //  exit('error3');
$this->db = $conn->connect();
}


public function getAllPaitents()
{

    $sql = "SELECT * FROM paitent";

$stmt = $this->db->prepare($sql);

if ($stmt->execute()){

    $paitents = $stmt->fetchAll(\PDO:: FETCH_ASSOC);
    return $paitents;
} else {

        return false;
    }     

}

public function addNewPaitents($paitentdata)
{
    $Firstname     =$paitentdata['firstname'];
    $Lastname      =$paitentdata['lastname'];
    $Middlename    =$paitentdata['middlename'];
    $DOB           =$paitentdata['dob'];
    $gender        =$paitentdata['gender'];
    $email         =$paitentdata['email'];
    $phonenumber   =$paitentdata['phonenumber'];
    $address       =$paitentdata['address'];
    $idnumber      =$paitentdata['idnumber'];
    $idtype        =$paitentdata['idtype'];

    $sql = "INSERT INTO paitent
           (First_Name, Last_Name, Middle_Name, DOB, Gender, Email, PhoneNumber, Address, Id_Number, Id_Type)
           values (?,?,?,?,?,?,?,?,?,?)";

$stmt = $this->db->prepare($sql);
//exit('11');
$result = $stmt->execute([$Firstname, $Lastname, $Middlename, $DOB, $gender, $email, $phonenumber, $address, $idnumber, $idtype]);

    if ($result) {
        # code...
        return true;
    }else{
        return false;
    }

}

public function getPaitentsById($pid)
{
    $sql ="SELECT * FROM paitent WHERE Paitent_id = ?";

        $stmt = $this->db->prepare($sql);

        if ($stmt->execute([$pid])) {
            # code...
            $paitents = $stmt->fetchALL(\PDO:: FETCH_ASSOC);
            return $paitents;
        }else {
            # code...
            return false;
        }

} 
public function getAllDoctors()
{
    $sql ="SELECT * FROM doctor";

        $stmt = $this->db->prepare($sql);

        if ($stmt->execute()) {
            # code...
            $docters = $stmt->fetchALL(\PDO:: FETCH_ASSOC);
            return $docters;
        }else {
            # code...
            return false;
        }
}

public function getDoctorsById($Did)
{
    $sql = "SELECT * FROM doctor WHERE id_Doctor =?";

        $stmt = $this->db->prepare($sql);

        if ($stmt->execute([$Did])) {
            # code...
            $doctors = $stmt->fetchALL(\PDO:: FETCH_ASSOC);
            return $doctors;
        }else {
            # code...
            return false;
        }
}

public function addNewDoctors($doctordata)
{
    $fistname         =$doctordata['Firstname'];
    $lastname         =$doctordata['Lastname'];
    $specialization   =$doctordata['Specialization'];
    $phonenumber      =$doctordata['Phonenumber'];
    $email            =$doctordata['email'];
    $address          =$doctordata['address'];
    $drn              =$doctordata['Drn'];
    $doctercol        =$doctordata['Doctercol'];

    $sql ="INSERT INTO doctor
    (First_Name, Last_Name, Specialization, PhoneNumber, Email, Address, DRN, Doctercol)
    VALUES(?,?,?,?,?,?,?,?)";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$fistname,$lastname,$specialization,$phonenumber,$email,$address,$drn,$doctercol]);
        if ($result) {
            # code...
            return true;
        }else {
            # code...
            return false;
        }
}

public function getAllStaff()
{
    $sql="SELECT * FROM staff";

    $stmt = $this->db->prepare($sql);

    if ($stmt->execute()) {
        # code...
        $staff = $stmt->fetchAll(\PDO:: FETCH_ASSOC);
        return $staff;
    }else {
        # code...
        return false;
    }
}
public function getStaffById($Sid)
{
    $sql ="SELECT * FROM staff WHERE idStaff =?";

    $stmt = $this->db->prepare($sql);

    if ($stmt->execute([$Sid])) {
        # code...
        $staff = $stmt->fetchAll(\PDO:: FETCH_ASSOC);
        return $staff;
    }else{
        return false;
    }

}

public function addNewStaff($staffdata)
{
    $fistname         =$staffdata['firstname'];
    $lastname         =$staffdata['lastname'];
    $Middlename       =$staffdata['middlename'];
    $specialization   =$staffdata['Specialization'];
    $phonenumber      =$staffdata['phonenumber'];
    $email            =$staffdata['email'];
    $address          =$staffdata['address'];
    $staffcol         =$staffdata['staffcol'];

        $sql = "INSERT INTO staff
        (FirstName, LastName, MiddleName, Specialization, PhoneNumber, Email, Address, Staffcol)
        VALUES (?,?,?,?,?,?,?,?)";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$fistname,$lastname,$Middlename,$specialization,$phonenumber,$email,$address,$staffcol]);
        if ($result) {
            # code...
            return true;
        }else {
            # code...
            return false;
        }
}

public function getAppointment()
{
    $sql="SELECT * FROM appointment";
    $stmt = $this->db->prepare($sql);
    
    if ($stmt->execute()) {
        # code...
        $appointment = $stmt->fetchAll(\PDO:: FETCH_ASSOC);
        return $appointment;
    }else {
        # code...
        return false;
}

}

public function getAppointmentById($Aid)
{
    $sql="SELECT * FROM appointment WHERE idAppointment= ?";
    $stmt = $this->db->prepare($sql);

    if ($stmt->execute([$Aid])){
        # code...
        $appointment = $stmt->fetchAll(\PDO:: FETCH_ASSOC);
    }else {
        # code...
        return false;
    }
}

public function addNewAppointment($appointmentdata)
{
    $appointmentdate    = $appointmentdata['Appointmentdate'];

    $sql ="INSERT INTO appointment
    (AppointmentDate) VALUES (?)";

    $stmt = $this->db->prepare($sql);
    $result= $stmt->execute([$appointmentdate]);
    if ($result) {
        # code...
        return true;
    }else {
        # code...
        return false;
    }

}

}
