<?php
include("server.php");

$id = $_GET['id'];
$result = mysqli_query($db, "SELECT * FROM employees WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container" >
        <form action="server.php" method="post"class="col-md-8 ">
        <?php include('error.php'); ?>
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <div class="form-group">
                <Label for="name">Name</Label>
                <input type="text" name="name" class="form-control col-md-4" id="name"  value="<?php echo $row['name'] ;?>">
            </div>
            <div class="form-group">
                <Label for="birthday">Birthday</Label>
                <input type="text" name="Birthday" class="form-control col-md-4" id="birthday" value="<?php echo $row['birthday'] ?>" >
            </div>
            <div class="form-group">
                <Label for="education">Education</Label>&nbsp;&nbsp;&nbsp;
                <input type="radio" name="Edu" value="Graduated"<?php if("Graduated"==$row['education']) echo "checked"?>> Graduated
                <input type="radio" name="Edu" value="Post Graduated"<?php if("Post Graduated"==$row['education']) echo "checked"?>>Post Graduated
            </div>
            <div class="form-group">
                <Label for="ITSkill">IT Skill</Label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               
               <?php
                    $result = mysqli_query($db,"SELECT ITskill FROM employees WHERE id = $id"); 
                    while($ans = mysqli_fetch_array($result))
                    {
                        $Skill = explode(",", $ans['ITskill']);
                ?>   

                <input type="checkbox" name="SKILL[]" value="PHP" <?php if(in_array("PHP",$Skill)) echo 'checked="checked"'; ?>>PHP
                <input type="checkbox" name="SKILL[]" value="JavaScript" <?php if(in_array("JavaScript",$Skill)) echo "checked";?>>JavaScript
                <input type="checkbox" name="SKILL[]" value="CSS" <?php if(in_array("CSS",$Skill))  echo "checked"; ?>>CSS
                <input type="checkbox" name="SKILL[]" value="MySql" <?php if(in_array("MySql",$Skill))  echo "checked";?>>MySql
            </div>
            <?php
              }
           ?>
            
            <div class="form-group">
                <Label for="department">Department</Label>
                <select class="custom-select col-md-4" id="department" name="Department" >
                    <option>Choose...</option>

                    <?php
                        $teams = mysqli_query($db, "SELECT * FROM team");
                        while($team = mysqli_fetch_assoc($teams))
                        {
                    ?>

                        <option value="<?php echo $team['team_id'] ?>"
                            <?php if($team['team_id'] == $row['team_id']) echo "selected"?> >
                            <?php echo $team['team_name']?>
                        </option>

                        <?php 
                        } 
                        ?>

                </select>
            </div>

            <div class="form-group">
                <Label for="gender">Gender</Label>&nbsp;&nbsp;&nbsp;
                <input type="radio" name="Gender" value="Male" <?php if("Male"==$row['gender']) echo "checked"?> > Male
                <input type="radio" name="Gender" value="Female" <?php if("Female"==$row['gender']) echo "checked"?>> Female
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control col-md-4" id="address" rows="5" name="Address" ><?php echo $row['address']?></textarea>
            </div>
            
            
            <div class="form-group">
              <button type="submit" name="update"  class="btn btn-outline-primary col-md-3" >Update</button>
            </div>
        </form>
    </div>
    
</body>
</html>
