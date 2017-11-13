<?php

$host = "localhost";
$dbname = "gad_rms";
$dbuser = "root";
$dbpass = "";

$db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . '', $dbuser, $dbpass);

function authenticate($user, $pass)
{
    $data = $GLOBALS['db']->query('SELECT COUNT(*) FROM account WHERE username = "' . $user . '" AND password = "' . $pass . '"');
    $result = $data->fetch(PDO::FETCH_ASSOC);

    if ($result['COUNT(*)'] > 0) {
        $data = $GLOBALS['db']->query('SELECT id, status, type FROM account WHERE username = "' . $user . '" AND password = "' . $pass . '"');
        $account = $data->fetch(PDO::FETCH_ASSOC);

        session_start();

        $_SESSION['id'] = $account['id'];
        $_SESSION['status'] = $account['status'];
        $_SESSION['type'] = $account['type'];

    }

    return $result['COUNT(*)'];

}

function fetchProfile($account_id)
{
    $link = $GLOBALS['db'];
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $link->prepare("SELECT * FROM profile P INNER JOIN account A ON (A.id = P.account_id) WHERE account_id = :account_id");
    $statement->bindParam(':account_id', $account_id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function fetchEduc($account_id)
{
    $link = $GLOBALS['db'];
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $link->prepare("SELECT * FROM educ_attain E INNER JOIN account A ON (A.id = E.account_id) WHERE account_id = :account_id");
    $statement->bindParam(':account_id', $account_id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function addProfile($account_id, $fname, $mname, $lname, $suffix, $bdate, $gender, $address, $tel_no,
    $cp_no, $email, $religion, $designation, $office_add, $engage_from, $engage_to, $will_travel)
    {
        $link = $GLOBALS['db'];
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $link->prepare("INSERT INTO profile (account_id, fname, mname, lname, suffix, bdate, 
            gender, address, tel_no, cp_no, email, religion, designation, office_add, engage_from, 
            engage_to, will_travel) VALUES (:account_id, :fname, :mname, :lname, :suffix, :bdate, 
            :gender, :address, :tel_no, :cp_no, :email, :religion, :designation, :office_add, 
            :engage_from, :engage_to, :will_travel);");
        $statement->bindParam(':account_id', $account_id);
        $statement->bindParam(':fname', $fname);
        $statement->bindParam(':mname', $mname);
        $statement->bindParam(':lname', $lname);
        $statement->bindParam(':suffix', $suffix);
        $statement->bindParam(':bdate', $bdate);
        $statement->bindParam(':gender', $gender);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':tel_no', $tel_no);
        $statement->bindParam(':cp_no', $cp_no);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':religion', $religion);
        $statement->bindParam(':designation', $designation);
        $statement->bindParam(':office_add', $office_add);
        $statement->bindParam(':engage_from', $engage_from);
        $statement->bindParam(':engage_to', $engage_to);
        $statement->bindParam(':will_travel', $will_travel);
        $statement->execute();
}

function addEducation($account_id, $school_name, $year_grad, $course, $level, $date_from, $date_to)
{
    $link = $GLOBALS['db'];
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $link->prepare("INSERT INTO educ_attain (account_id, school_name, year_grad, course, 
        level, date_from, date_to) VALUES (:account_id, :school_name, :year_grad, :course, :level, 
        :date_from, :date_to);");
    $statement->bindParam(':account_id', $account_id);
    $statement->bindParam(':school_name', $school_name);
    $statement->bindParam(':year_grad', $year_grad);
    $statement->bindParam(':course', $course);
    $statement->bindParam(':level', $level);
    $statement->bindParam(':date_from', $date_from);
    $statement->bindParam(':date_to', $date_to);
    $statement->execute();
}

function changeToActive($id)
{
    $link = $GLOBALS['db'];
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $link->prepare("UPDATE account A SET A.status = 'active' WHERE A.id = :id;");
    $statement->bindParam(':id', $id);
    $statement->execute();
}

function fetchAllCollege()
{
    $data = $GLOBALS['db']->query('SELECT id, college_name AS name, alias, category, date FROM college WHERE status = "active" ORDER BY name');
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function fetchArchivedCollege()
{
    $data = $GLOBALS['db']->query('SELECT id, college_name AS name, alias, category, date FROM college WHERE status = "archive" ORDER BY name');
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function fetchAllDepartment()
{
    $data = $GLOBALS['db']->query('SELECT D.id, D.name AS name, D.alias, C.alias AS college, D.created_updated AS date 
        FROM department D INNER JOIN college C ON (D.college_id = C.id) ORDER BY name');
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function fetchAllProgram()
{
    $data = $GLOBALS['db']->query('SELECT P.id, P.name AS name, P.alias, D.alias AS department, P.created_updated AS date 
        FROM program P INNER JOIN department D ON (D.id = P.dep_id) ORDER BY name');
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function fetchAllAccount()
{
    $data = $GLOBALS['db']->query('SELECT id, username, password, type, status FROM account');
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function fetchProgram($id)
{
    $data = $GLOBALS['db']->query('SELECT * FROM program WHERE id = "' . $id . '";');
    $result = $data->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function fetchPos($id)
{
    $data = $GLOBALS['db']->query('SELECT * FROM position WHERE id = "' . $id . '";');
    $result = $data->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function fetchSDStudent()
{
    $data = $GLOBALS['db']->query('SELECT D.alias AS department, P.name AS program, P.alias AS alias, SD.male_q AS male_q, 
        SD.female_q AS female_q, SD.semester AS semester, SD.school_year AS schoolyear FROM sex_disaggregation SD 
        INNER JOIN department D ON (D.id = SD.dep_id) INNER JOIN program P ON (P.id = SD.ref_id) WHERE SD.type = "Student"');
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function fetchSDFaculty()
{
    $data = $GLOBALS['db']->query('SELECT D.alias AS department, P.name AS position, SD.male_q AS male_q, 
        SD.female_q AS female_q, SD.semester AS semester, SD.school_year AS schoolyear FROM sex_disaggregation SD 
        INNER JOIN department D ON (D.id = SD.dep_id) INNER JOIN position P ON (P.id = SD.ref_id) WHERE SD.type = "Faculty"');
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function fetchSDNfaculty()
{
    $data = $GLOBALS['db']->query('SELECT D.alias AS department, P.name AS position, SD.male_q AS male_q, 
        SD.female_q AS female_q, SD.semester AS semester, SD.school_year AS schoolyear FROM sex_disaggregation SD 
        INNER JOIN department D ON (D.id = SD.dep_id) INNER JOIN position P ON (P.id = SD.ref_id) WHERE SD.type = "Non-Faculty"');
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


if (isset($_POST['fetch_dep'])) {
    
    $college_id = $_POST['fetch_dep'];

    function fetchDepartmentbyCollege($college_id)
    {
        $data = $GLOBALS['db']->query('SELECT D.id, D.name AS name, D.alias, C.alias AS college, D.created_updated AS date 
            FROM department D INNER JOIN college C ON (D.college_id = C.id) WHERE D.college_id="' . $college_id . '" ORDER BY name');
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    $departmentsByCol = fetchDepartmentbyCollege($college_id);

    if (sizeof($departmentsByCol) < 1) {
        echo "<option value='none'>Select College</option>";
    }
    else
    {
        echo "<option value='none'>Select Department</option>";
        foreach ($departmentsByCol as $department) {
            echo "<option value='" . $department['id'] . "'>" . $department['name'] . "</option>";
        }
    }

}


if (isset($_POST['fetch_prog'])) {
    
    $dep_id = $_POST['fetch_prog'];

    function fetchProgrambyDepartment($dep_id)
    {
        $data = $GLOBALS['db']->query('SELECT P.id, P.name AS name, P.alias, D.alias AS department, P.created_updated AS date 
            FROM program P INNER JOIN department D ON (P.dep_id = D.id) WHERE P.dep_id="' . $dep_id . '" ORDER BY name');
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    $departmentsByCol = fetchProgrambyDepartment($dep_id);

    if (sizeof($departmentsByCol) < 1) {
        echo "<option value='none'>Select Department</option>";
    }
    else
    {
        echo "<option value='none'>Select Program</option>";
        foreach ($departmentsByCol as $department) {
            echo "<option value='" . $department['id'] . "'>" . $department['name'] . "</option>";
        }
    }

}

if (isset($_POST['fetch_pos'])) {
    
    $type = $_POST['fetch_pos'];

    function fetchPosition($type)
    {
        $data = $GLOBALS['db']->query('SELECT * FROM position WHERE type = "' . $type . '"');
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    $positions = fetchPosition($type);


    if (sizeof($positions) < 1) {
        echo "<option value='none'>Select Position</option>";
    }
    else
    {
        echo "<option value='none'>Select Position</option>";
        foreach ($positions as $position) {
            echo "<option value='" . $position['id'] . "'>" . $position['name'] . "</option>";
        }
    }

}

if (isset($_POST['functionName'])) {
    
    if ($_POST['functionName'] == "addDepartment") {
        
        function checkDepartment($name)
        {
            $data = $GLOBALS['db']->query('SELECT COUNT(*) FROM department WHERE name ="' . $name . '";');
            $result = $data->fetch(PDO::FETCH_ASSOC);
            return $result;
        }


        function addDepartment($name, $alias, $college_id)
        {
            $link = $GLOBALS['db'];
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $link->prepare("INSERT INTO department(name, alias, college_id)
            VALUES(:name, :alias, :college_id)");

            $statement->execute($todo = [
                'name' => $name,
                'alias' => $alias,
                'college_id' => $college_id
            ]);
        }
        $count = checkDepartment($_POST['args'][0]);
        echo $count['COUNT(*)'];
        if ($count['COUNT(*)'] < 1) {
            addDepartment($_POST['args'][0],$_POST['args'][1],$_POST['args'][2]);
            session_start();
            $_SESSION['added_dep'] = $_POST['args'][0];
        }

    }


    if ($_POST['functionName'] == "addCollege") {
        



        function checkCollege($college_name)
        {
            $data = $GLOBALS['db']->query('SELECT COUNT(*) FROM college WHERE college_name ="' . $college_name . '";');
            $result = $data->fetch(PDO::FETCH_ASSOC);
            return $result;
        }


        function addCollege($college_name, $alias, $category)
        {
            $link = $GLOBALS['db'];
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $link->prepare("INSERT INTO college(college_name, alias, category)
            VALUES(:college_name, :alias, :category)");

            $statement->execute($todo = [
                'college_name' => $college_name,
                'alias' => $alias,
                'category' => $category
            ]);
        }

        $count = checkCollege($_POST['args'][0]);

        echo $count['COUNT(*)'];

        if ($count['COUNT(*)'] < 1) {
            addCollege($_POST['args'][0],$_POST['args'][1],$_POST['args'][2]);
            session_start();
            $_SESSION['added_col'] = $_POST['args'][0];

        }
        
    }

    if ($_POST['functionName'] == "addProgram") {
        



        function checkProgram($name)
        {
            $data = $GLOBALS['db']->query('SELECT COUNT(*) FROM program WHERE name ="' . $name . '";');
            $result = $data->fetch(PDO::FETCH_ASSOC);
            return $result;
        }


        function addProgram($name, $alias, $dep_id)
        {
            $link = $GLOBALS['db'];
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $link->prepare("INSERT INTO program(name, alias, dep_id)
            VALUES(:name, :alias, :dep_id)");

            $statement->execute($todo = [
                'name' => $name,
                'alias' => $alias,
                'dep_id' => $dep_id
            ]);
        }

        $count = checkProgram($_POST['args'][0]);

        echo $count['COUNT(*)'];

        if ($count['COUNT(*)'] < 1) {
            addProgram($_POST['args'][0],$_POST['args'][1],$_POST['args'][2]);
            session_start();
            $_SESSION['added_prog'] = $_POST['args'][0];
        }
        
    }

    if ($_POST['functionName'] == "addAccount") {

        function checkAccountID($id)
        {
            $data = $GLOBALS['db']->query('SELECT COUNT(*) FROM account WHERE id ="' . $id . '";');
            $result = $data->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        function checkAccountUser($user)
        {
            $data = $GLOBALS['db']->query('SELECT COUNT(*) FROM account WHERE username ="' . $user . '";');
            $result = $data->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        function addAccount($id, $username, $password, $type)
        {
            $link = $GLOBALS['db'];
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $link->prepare("INSERT INTO account(id, username, password, status, type)
            VALUES(:id, :username, :password, :status, :type)");

            $statement->execute($todo = [
                'id' => $id,
                'username' => $username,
                'password' => $password,
                'status' => "new",
                'type' => $type
            ]);
        }

        $id_count = checkAccountID($_POST['args'][0]);
        $user_count = checkAccountUser($_POST['args'][1]);

        echo $id_count['COUNT(*)'] . "," . $user_count['COUNT(*)'];

        if ($id_count['COUNT(*)'] < 1 && $user_count['COUNT(*)'] < 1) {

            addAccount($_POST['args'][0],$_POST['args'][1],$_POST['args'][2],$_POST['args'][3]);
            session_start();
            $_SESSION['added_id'] = $_POST['args'][0];
        
        }

        
       

    }
    
    if ($_POST['functionName'] == "addSDStudent")
    {

        function addSDStudent($college, $department, $reference, $male_q, $female_q, $semester, $schoolyear)
        {
            $link = $GLOBALS['db'];
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $link->prepare("INSERT INTO sex_disaggregation(type, dep_id, ref_id, 
                male_q, female_q, semester, school_year)
            VALUES(:type, :dep_id, :ref_id, :male_q, :female_q, :semester, :school_year)");

            $statement->execute($todo = [
                'type' => "Student",
                'dep_id' => $department,
                'ref_id' => $reference,
                'male_q' => $male_q,
                'female_q' => $female_q,
                'semester' => $semester,
                'school_year' => $schoolyear
            ]);
        }

        function checkSDStudent($dep_id, $ref_id, $semester, $schoolyear)
        {
            $data = $GLOBALS['db']->query('SELECT COUNT(*) FROM sex_disaggregation WHERE 
                type ="Student" AND dep_id ="' . $dep_id . '" AND ref_id ="' . $ref_id . 
                '" AND semester ="' . $semester . '" AND school_year ="' . $schoolyear . '";');
            $result = $data->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        $count = checkSDStudent($_POST['args'][1], $_POST['args'][2], $_POST['args'][5], $_POST['args'][6])['COUNT(*)'];       
        
        if ($count < 1) 
        {
            addSDStudent($_POST['args'][0], $_POST['args'][1], $_POST['args'][2], $_POST['args'][3],
            $_POST['args'][4], $_POST['args'][5], $_POST['args'][6]);
            echo $count;
            session_start();
            $_SESSION['added_SD'] = [$_POST['args'][2], $_POST['args'][5], $_POST['args'][6]];
        }
        else
        {
            echo $count;
        }
        
    }

    if ($_POST['functionName'] == "addSDFaculty")
    {

        function addSDFaculty($college, $department, $reference, $male_q, $female_q, $semester, $schoolyear)
        {
            $link = $GLOBALS['db'];
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $link->prepare("INSERT INTO sex_disaggregation(type, dep_id, ref_id, 
                male_q, female_q, semester, school_year)
            VALUES(:type, :dep_id, :ref_id, :male_q, :female_q, :semester, :school_year)");

            $statement->execute($todo = [
                'type' => "Faculty",
                'dep_id' => $department,
                'ref_id' => $reference,
                'male_q' => $male_q,
                'female_q' => $female_q,
                'semester' => $semester,
                'school_year' => $schoolyear
            ]);
        }

        function checkSDFaculty($dep_id, $ref_id, $semester, $schoolyear)
        {
            $data = $GLOBALS['db']->query('SELECT COUNT(*) FROM sex_disaggregation WHERE 
                type ="Faculty" AND dep_id ="' . $dep_id . '" AND ref_id ="' . $ref_id . 
                '" AND semester ="' . $semester . '" AND school_year ="' . $schoolyear . '";');
            $result = $data->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        $count = checkSDFaculty($_POST['args'][1], $_POST['args'][2], $_POST['args'][5], $_POST['args'][6])['COUNT(*)'];       
        
        if ($count < 1) 
        {
            addSDFaculty($_POST['args'][0], $_POST['args'][1], $_POST['args'][2], $_POST['args'][3],
            $_POST['args'][4], $_POST['args'][5], $_POST['args'][6]);
            echo $count;
            session_start();
            $_SESSION['added_SD'] = [$_POST['args'][2], $_POST['args'][5], $_POST['args'][6]];
        }
        else
        {
            echo $count;
        }
        
    }

    if ($_POST['functionName'] == "addSDNfaculty")
    {

        function addSDNfaculty($college, $department, $reference, $male_q, $female_q, $semester, $schoolyear)
        {
            $link = $GLOBALS['db'];
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $link->prepare("INSERT INTO sex_disaggregation(type, dep_id, ref_id, 
                male_q, female_q, semester, school_year)
            VALUES(:type, :dep_id, :ref_id, :male_q, :female_q, :semester, :school_year)");

            $statement->execute($todo = [
                'type' => "Non-Faculty",
                'dep_id' => $department,
                'ref_id' => $reference,
                'male_q' => $male_q,
                'female_q' => $female_q,
                'semester' => $semester,
                'school_year' => $schoolyear
            ]);
        }

        function checkSDNfaculty($dep_id, $ref_id, $semester, $schoolyear)
        {
            $data = $GLOBALS['db']->query('SELECT COUNT(*) FROM sex_disaggregation WHERE 
                type ="Student" AND dep_id ="' . $dep_id . '" AND ref_id ="' . $ref_id . 
                '" AND semester ="' . $semester . '" AND school_year ="' . $schoolyear . '";');
            $result = $data->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        $count = checkSDNfaculty($_POST['args'][1], $_POST['args'][2], $_POST['args'][5], $_POST['args'][6])['COUNT(*)'];       
        
        if ($count < 1) 
        {
            addSDNfaculty($_POST['args'][0], $_POST['args'][1], $_POST['args'][2], $_POST['args'][3],
            $_POST['args'][4], $_POST['args'][5], $_POST['args'][6]);
            echo $count;
            session_start();
            $_SESSION['added_SD'] = [$_POST['args'][2], $_POST['args'][5], $_POST['args'][6]];
        }
        else
        {
            echo $count;
        }
        
    }

}

?>