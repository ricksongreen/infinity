<?php
/**
 * User: T08_Infinity
 * Date: 8-5-2018
 * Time: 12:41
 */
function addUser($user) {
    global $dbh;
    /** checks if the username is already stored in the database, so the usernames stay unique */
    try{
        $stmt = $dbh->prepare("SELECT gebruikersnaam FROM gebruiker WHERE gebruikersnaam=:gebruikersnaam");
        $values = array(
            'gebruikersnaam' => $user['gebruikersnaam']
        );
        $stmt->execute($values);
        $doublecheck = $stmt->fetch();
        if(!empty($doublecheck['gebruikersnaam'])){
            throw new Exception("Gebruikersnaam is al in gebruik");
        }
    }catch(Exception $e){
        echo "ERROR: ".$e->getMessage();
        exit;
    }
    /** Sets the user in the database stores its ID and creates the student or employee data as well*/
    $stmt = $dbh->prepare("INSERT INTO gebruiker (voornaam, tussenvoegsel, achternaam, email, gebruikersnaam, wachtwoord) VALUES(:voornaam, :tussenvoegsel, :achternaam, :email, :gebruikersnaam, :wachtwoord)");
    $storeUser = array(
        'voornaam' => $user['voornaam'],
        'tussenvoegsel' => $user['tussenvoegsel'],
        'achternaam' => $user['achternaam'],
        'email' => $user['email'],
        'gebruikersnaam' => $user['gebruikersnaam'],
        'wachtwoord' => $user['wachtwoord']
    );
    $stmt->execute($storeUser);

    $stmt = $dbh->prepare("SELECT ID FROM gebruiker WHERE gebruikersnaam=:gebruikersnaam");
    $stmt->execute($values);
    $ID = $stmt->fetch();

    if($user['student']==true){
        $stmt = $dbh->prepare("INSERT INTO student(ID, nummer, opleiding) VALUES (:ID, :nummer, :opleiding)");
        $values = array(
            'ID' => $ID['ID'],
            'nummer' => $user['nummer'],
            'opleiding' => $user['opleiding']
        );
        $stmt->execute($values);
    }else{
        /** Sets the data for the SLB and admin, since the database does not correctly use true/false */
        if($user['SLB'] == true) {
            $SLB = 1;
        }else{
            $SLB = 0;
        }
        if($user['admin'] == true){
            $admin = 1;
        }else{
            $admin = 0;
        }
        $stmt = $dbh->prepare("INSERT INTO werknemer(ID, nummer, studentbegeleider, systeembeheerder) VALUES(:ID, :nummer, :studentbegeleider, :systeembeheerder)");
        $values = array(
            'ID' => $ID['ID'],
            'nummer' => $user['nummer'],
            'studentbegeleider' => $SLB,
            'systeembeheerder' => $admin
        );
        $stmt->execute($values);
    }
}

function getAllClasses(){
    /** requests the IDs and names of the classes from the database */
    global $dbh;
    return $dbh->query("SELECT ID, naam FROM klas");
}

function getAllTeachers(){
    /** requests the IDs and numbers of the teachers from the database */
    global $dbh;
    return $dbh->query("SELECT ID, nummer FROM werknemer");
}

function getAllUsers() {
    /** requests the information of users out of the database*/
    global $dbh;
    return $dbh->query("SELECT ID, gebruikersnaam, voornaam, tussenvoegsel, achternaam FROM gebruiker");
}


function searchUsers($query) {
    /**  */
    global $dbh;
    $query = '%' . $query . '%';
    $stmt = $dbh->prepare("SELECT * FROM gebruiker WHERE voornaam LIKE :query OR gebruikersnaam LIKE :query");
    $waardes = array(
        'query' => $query
    );
    $stmt->execute($waardes);
    return $stmt->fetchAll();
}

    function deleteUser($userId)
    {
        /** deletes the information from the user in the database together with  the student or employee information */
        global $dbh;

        $stmt = $dbh->prepare("DELETE FROM gebruiker WHERE id=:userId");

        $waardes = array(
            'userId' => $userId
        );

        return $stmt->execute($waardes);
    }

function getAllClasslessStudents(){
    global $dbh;
    /** makes sure the array is clean so that this function can get called multiple times */
    unset($array);
    /** retrieves al the classless students and sets them in an array called $array */
    $stmt = $dbh->query("SELECT ID, nummer, opleiding FROM student WHERE klas_ID IS NULL");
    $ids = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($ids as $id){
        $stmt = $dbh->prepare("SELECT ID, voornaam, tussenvoegsel, achternaam FROM gebruiker WHERE ID = :id");
        $values = array (
            'id' => $id['ID']
        );
        $stmt->execute($values);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $data['nummer'] = $id['nummer'];
        $data['opleiding'] = $id['opleiding'];
        $array[] = $data;
    }
    return $array;
}

function makeClass($array){
    global $dbh;
    /** checks if the filled in class name might not already be in use and throws an error if that is the case */
    try{
        $stmt = $dbh->prepare("SELECT naam FROM klas WHERE naam =:naam");
        $values = array(
            'naam' => $array['klasnaam']
        );
        $stmt->execute($values);
        $doublecheck = $stmt->fetch();
        if(!empty($doublecheck['naam'])){
            throw new Exception("Klasnaam is al in gebruik");
        }
    }catch(Exception $e){
        echo "ERROR: ".$e->getMessage();
        exit;
    }
    /** if no errors where thrown, the class will be made and the ID will be stored */
    $stmt = $dbh->prepare("INSERT INTO klas(naam) VALUES (:naam)");
    $stmt->execute($values);
    $stmt= $dbh->prepare("SELECT ID FROM klas WHERE naam = :naam");
    $stmt->execute($values);
    $id = $stmt->fetch();

    /** these loops check if students where added to the class and updates their values in the database */
    if(!empty($array['students'])){
        foreach($array['students'] as $studentID){
            $stmt = $dbh->prepare("UPDATE student SET klas_ID=:id WHERE ID=:studentID");
            $values = array(
                'id' => $id['ID'],
                'studentID' => $studentID
            );
            $stmt->execute($values);
        }
    }
}

function makeLesson($data){
    /** uses the data from the addLessonForm to create a lesson in the database */
    global $dbh;
    $stmt = $dbh->prepare("INSERT INTO lessen(naam, locatie, datum, begintijd, eindtijd, klas_ID, docent_ID) VALUES (:naam, :locatie, :datum, :begintijd, :eindtijd, :klas_ID, :docent_ID)");
    $values = array(
        'naam' => $data['name'],
        'locatie' => $data['location'],
        'datum' => $data['date'],
        'begintijd' => $data['startTime'],
        'eindtijd' => $data['endTime'],
        'klas_ID' => $data['class'],
        'docent_ID' => $data['teacher']
    );
    $stmt->execute($values);
}


function getAllLessons(){
    global $dbh;
    /** retrieves all the information of the lessons */
    $stmt = $dbh->query("SELECT * FROM lessen ORDER BY naam, datum");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $biggerArray = [];
    /** for each lessen the classname and teachernumber gets retrieves from the database based on the ID's given in the lesson data */
    foreach($data as $smallerData) {
        $array = $smallerData;
        $stmt = $dbh->prepare("SELECT naam FROM klas WHERE ID=:klas_ID");
        $value = array ('klas_ID' => $smallerData['klas_ID']);
        $stmt->execute($value);
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        $array['klasnaam'] = $info['naam'];
        $stmt = $dbh->prepare("SELECT nummer FROM werknemer WHERE ID=:docent_ID");
        $value = array ('docent_ID' => $smallerData['docent_ID']);
        $stmt->execute($value);
        $info = $stmt->fetch(PDO::FETCH_ASSOC);
        $array['nummer'] = $info['nummer'];
        $biggerArray[] = $array;
    }
    return $biggerArray;
}