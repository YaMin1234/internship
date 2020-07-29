<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="addNew.php" method="post" class="col-md-8">
        <?php include('error.php'); ?>
            <div class="form-group">
                <Label for="name" >Name</Label>
                <input type="text" name="name" class="form-control col-md-5" id="name"  >
            </div>
            <div class="form-group">
                <Label for="birthday" >Birthday</Label>
                <input type="date" name="birthday" class="form-control  col-md-5" id="birthday">
            </div>
            <div class="form-group">
                <Label for="education" >Education</Label><br>
                <input type="radio" name="edu" value="Graduated"> Graduated
                <input type="radio" name="edu" value="Post Graduated">Post Graduated
            </div>
            <div class="form-group">
                <Label for="ITSkill" >IT Skill</Label><br>
                <input type="checkbox" name="skill[]" value="PHP">PHP
                <input type="checkbox" name="skill[]" value="JavaScript">JavaScript
                <input type="checkbox" name="skill[]" value="CSS">CSS
                <input type="checkbox" name="skill[]" value="MySql">MySql
            </div>
            <div class="form-group">
                <Label for="department" >Department</Label>
                <br>
                <select class="custom-select  col-md-5" id="department" name="department">
                    <option selected>Choose...</option>
                    <?php
                        $result = mysqli_query($db, "SELECT team_id, team_name FROM team");
                        while($row = mysqli_fetch_assoc($result)):
                        ?>
                        <option value="<?php echo $row['team_id'] ?>">
                        <?php echo $row['team_name'] ?>
                        </option>
                        <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <Label for="gender" >Gender</Label>
                <br>
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female
            </div>
            <div class="form-group">
                <label for="address" >Address</label>
                <textarea class="form-control rounded-0  col-md-5" id="address" rows="5" name="address" ></textarea>
            </div>
            
            
            <div class="form-group">
            <button type="submit" name="insert" class="btn btn-outline-primary col-md-3">Insert</button>
            </div>
        </form>
    </div>
    
</body>
</html>