


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Form</title>
    <link rel="stylesheet" href="student.css">
</head>
<body>
    <div class="form-container">
        <div class="header">
            <h3>Add Parent Form</h3>
            <h3>Parent Information</h3>
        </div>


        <form action="process.php" method="post">

            <div class="form-group">
                <label for="father-name">Father Name</label>
                <input type="text" name="father-name" id="father-name" required>
            </div>
            
            <div class="form-group">
                <label for="mother-name">Mother Name</label>
                <input type="text" name="mother-name" id="mother-name" required>
            </div>
            <div class="form-group">
                <label for="father-occupation">Father Occupation</label>
                <input type="text" name="father-occupation" id="father-occupation" required>
            </div>

            <div class="form-group">
                <label for="mother-occupation">Mother Occupation</label>
                <input type="text" name="mother-occupation" id="mother-occupation" required>
                 
            </div>

            <div class="form-group">
                <label for="phone-number">Fathers Phone Number</label>
                <input type="text" name="father-phone-number" id="father-phone-number" optional>
            </div>

            <div class="form-group">
                <label for="phone-number">Mother's Phone Number</label>
                 <input type="text" name="mother-phone-number" id="mother-phone-number" optional>
            </div>

            <div class="form-group">
                <label for="nationlity">Nationality</label>
                <input type="text" name="Nationality" id="nationlity" optional>
            </div>

            <div class="form-group">
                <label for="parent-address">Parents Address</label>
                <input type="text" name="parent-address" id="parrent-address" optional>
            </div>

            <div class="button-container">
                <button id="submit">Save</button>
                <button id="reset">Reset</button>
            </div>
 
        </form>
       

    </div>
    </div>
</body>
</html>