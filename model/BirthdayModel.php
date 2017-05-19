<?php
function getBirthday($id) //Get 1 specific birthday
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM birthdays WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id));

	$db = null;

	return $query->fetch();
}

function getBirthdayMonth($month) //Get birthday with specific month
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM birthdays WHERE month = :month ORDER BY day, year";
	$query = $db->prepare($sql);
	$query->execute(array(
		":month" => $month));

	$db = null;

	return $query->fetchAll();
}

function getBirthdays() //Get all birthdays
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM birthdays  ORDER BY month, day, person";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function createBirthday() //Create
{
    $person = isset($_POST['person']) ? $_POST['person'] : null;
    $day = isset($_POST['day']) ? $_POST['day'] : null;
    $month = isset($_POST['month']) ? $_POST['month'] : null;
    $year = isset($_POST['year']) ? $_POST['year'] : null;

    if (strlen($person) == 0 || strlen($day) == 0 || strlen($month) == 0 || strlen($year) == 0) {
        return false;
    }

    $db = openDatabaseConnection();

    $sql = "INSERT INTO birthdays(person, day, month, year) VALUES (:person, :day, :month, :year)";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':person' => $person,
        ':day' => $day,
        ':month' => $month,
        ':year' => $year));

    $db = null;

    return true;
}

function editBirthday() //Edit birthday
{
	$person = isset($_POST['person']) ? $_POST['person'] : null;
	$day = isset($_POST['day']) ? $_POST['day'] : null;
	$month = isset($_POST['month']) ? $_POST['month'] : null;
	$year = isset($_POST['year']) ? $_POST['year'] : null;
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	
	if (strlen($person) == 0 || strlen($day) == 0 || strlen($month) == 0 || strlen($year) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "UPDATE birthdays SET person = :person, day = :day, month = :month, year = :year WHERE id = :id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':person' => $person,
		':day' => $day,
		':month' => $month,
		':year' => $year,
		':id' => $id));

	$db = null;
	
	return true;
}

function deleteBirthday($id = null) //Delete birthday
{
	if (!$id) {
		return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "DELETE FROM birthdays WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id));

	$db = null;
	
	return true;
}