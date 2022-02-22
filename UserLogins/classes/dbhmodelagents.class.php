<?php

class DbhModelAgents extends Dbh
{


  // checking given login information if exists
  protected function loginUser($username, $password)
  {
    $sql = "SELECT * FROM login_data WHERE username = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username]);
    $rowCount = $stmt->rowCount();

    if ($rowCount == 0) {
      $stmt = null;
      echo "<script>alert('Invalid Password!')</script>";
      header("Refresh: 0");
      exit();
    } else {
      $hashedPassword = $stmt->fetchAll();
      $hashPassword = password_verify($password, $hashedPassword[0]['password']);

      if (!$hashPassword) {

        $stmt = null;
        echo "<script>alert('Invalid Password!')</script>";
        header("Refresh: 0");
        exit();
      } else {
        return $hashedPassword;
      }
    }
  }




  // adding status to agents record as 'active' when logged in
  protected function adding_agent_status($status, $username)
  {
    $sql = $this->connect();
    $stmt = $sql->prepare("UPDATE login_data SET status = ? WHERE username = ?");
    $stmt->execute([$status, $username]);
    return $stmt;
  }


  // getting all data from database
  protected function getAgentsData()
  {
    $sql = "SELECT * FROM login_data";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();
    return $result;
  }


  // deleting data from databese
  protected function deleteUserDetails($id)
  {
    $sql = $this->connect();
    $stmt = $sql->prepare("DELETE FROM login_data where id =:id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return ($stmt);
  }


  // adding data from database
  protected function createUser($firstname, $middlename, $lastname, $username, $gender, $email, $department, $position, $password, $access)
  {

    $sql = "INSERT INTO login_data (`first_name`, `middle_name`, `last_name`, `username`, `gender`, `email`, `department`, `position`, `password`, `access`) VALUES (?,?,?,?,?,?,?,?,?,?)";

    if (!$stmt = $this->connect()->prepare($sql)) {
      $stmt = null;
      exit();
    }
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$firstname, $middlename, $lastname, $username, $gender, $email, $department, $position, $hashPassword, $access]);

    return $stmt;
  }

  protected function userAvailability($username, $email)
  {
    $sql = "SELECT * FROM login_data WHERE username = ? OR email = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username, $email]);
    $rowCount = $stmt->rowCount();

    return $rowCount;
  }


  // setting up session logged from username
  protected function sessionLoggedIn($username)
  {
    $sql = $this->connect();
    $stmt = $sql->prepare("SELECT * FROM login_data WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    return $user;
  }


  // get single data using agents ID from database
  protected function getUserData($id)
  {
    $sql = "SELECT * FROM login_data WHERE id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetchAll();

    return $result;
  }

  //updating single record
  protected function updateData($firstname, $middlename, $lastname, $username, $gender, $email, $department, $position, $password, $id)
  {
    $sql = "UPDATE login_data SET first_name = ?, middle_name = ?, last_name = ?, username = ?, gender = ?, email = ?, department = ?, position = ?, password = ? WHERE id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$firstname, $middlename, $lastname, $username, $gender, $email, $department, $position, $password, $id]);
  }
}
