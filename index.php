<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
  <?php 
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'db_account';

    $openconnection = mysqli_connect($hostname, $username, $password, $dbname);

    if(!$openconnection){
      die('Connection failed: ' . mysqli_connect_error());
    }

    if (isset($_POST['submit-data']))
    {
      $first_name = $_POST['first-name'];
      $last_name = $_POST['last-name'];
      $gender = $_POST['gender'];
      $year_level = $_POST['year-level'];
      $bio = $_POST['bio'];

      mysqli_query($openconnection, "INSERT into tbl_account(first_name, last_name, gender, year_level, bio) VALUES ('$first_name', '$last_name', '$gender', '$year_level', '$bio')") or die(mysql_error()); 
    }
  ?>

  <div class='container-sm'>
    <form class='mx-auto shadow-sm p-4 rounded mt-5' style='width: 30rem' method='post'>

    <!-- first name -->
      <label class='form-label' for="first-name">First Name</label>  
    <input name='first-name' class='form-control' id='first-name' type="text">

    <!-- last name -->
      <label class='form-label mt-3' for="last-name">Last Name</label>  
    <input name='last-name' class='form-control' id='last-name'  type="text">

    <div>

    <fieldset class='form-group mt-3'>
      <legend class='col-form-label'>Gender</legend>

      <div class='d-flex gap-3'>
        <!-- male -->
        <div class='form-check'>
          <input class="form-check-input" type="radio" value='Male' id='male' name='gender'>
          <label class="form-check-label" for='male'>
            Male
          </label>
        </div>
        
        <!-- female -->
        <div class='form-check'>
          <input class="form-check-input" value='Female' type="radio"  id='female' name='gender'>
          <label class="form-check-label" for='female'>
            Female
          </label>
        </div>
      </div>
    </fieldset>

    <!-- year level -->
    <label for="year-level" class='form-label mt-3'>Year level</label>
    <div class="dropdown">
    <input id='year-level' name='year-level' class="form-control d-flex justify-content-between align-items-center dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" value="--No selected--" readonly style='cursor: pointer'>

  <ul class="dropdown-menu w-100">
    <li id='dropdown-item1' class='dropdown-item' onclick='changeDropdownValue("1st")'>1st</li>
    <li id='dropdown-item1' class='dropdown-item' onclick='changeDropdownValue("2nd")'>2nd</li>
    <li id='dropdown-item1' class='dropdown-item' onclick='changeDropdownValue("3rd")'>3rd  </li>
  </ul>
</div>

<!-- bio -->
<label for="bio" class='form-label mt-3'>Bio</label>
<textarea id="bio" rows="5" class='form-control' name='bio'></textarea>

<button class='btn btn-primary w-100 mt-5' name='submit-data'>Submit</button>
    </div>
    </form>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script>
  const dropdown = document.querySelector("#year-level");
  const changeDropdownValue = (value) => dropdown.value = value;
</script>
</body>
</html>