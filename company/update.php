<?php
    include("connection.php");
    error_reporting(E_ALL);

    $id = $_GET['id'];

    $fquery = "SELECT * FROM data WHERE id = '$id'";
    $fdata = mysqli_query($conn, $fquery);
    $res = mysqli_fetch_assoc($fdata);

    if(isset($_POST['submit'])) {
        $name = $_POST['company'];
        $dateApp = $_POST['date'];
        $skills = $_POST['skills'];
        $link = $_POST['link'];

        $query = "UPDATE data SET name='$name', dateApp='$dateApp', skills='$skills', link='$link' WHERE id='$id'";
        $data = mysqli_query($conn, $query);
        if($data) {
          echo "<script>alert('record updated successfully.');</script>";
          echo "<script>window.location.href = 'home.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
<html>
  
  <head>
    <title>update</title>
    <style>
        a.custom-link {
            color: black;
            text-decoration: none;
            height: 5px;
            width: 5px;
            transition: background-color 0.3s ease;
            padding: 4px 2px;
        }
        a.custom-link:hover {
            color: white;
            background-color: black;
            height: 7px;
            width: 7px;
            padding: 5px 6px;
        }
        a.custom-link:visited {
            color: black;
            text-decoration: none;
            height: 5px;
            width: 5px;
            padding: 4px 2px;
            transition: background-color 0.3s ease;
        }
        a.custom-link:visited:hover {
            color: white;
            background-color: black;
            text-decoration: none;
            height: 7px;
            padding: 5px 6px;
            width: 7px;
        }
        .custom-select {
            background-color: white;
            color: black;
            border: 1px solid black;
            border-radius: 4px;
            margin: 5px;
            width: 200px;
            height: 25px;
            transition: background-color 0.3 ease;
            transition: height 0.3s ease;
        }
        .custom-select:hover {
            background-color: rgb(230, 230, 250);
            color: black;
            border: 2px solid black;
            border-radius: 4px;
            margin: 5px;
            width: 200px;
            height: 27px;
        }
        .custom-select option {
            background-color: ivory;
            color: black;
            border: 1px solid black;
            width: 200px;
            height: 25px;
        }
        .inputnorm {
            background-color: white; /* Button color on hover */
            padding: 10px 10px;
            color: black; /* Default text color */
            border: 1px solid black;
            border-radius: 4px;
            margin: 5px;
            width: 200px;
            height: 25px;
            transition: background-color 0.3s ease;
            transition: height 0.3s ease;
        }
        .inputnorm:hover {
            background-color: rgb(230, 230, 250); /* Button color on hover */
            padding: 10px 10px;
            color: black; /* Default text color */
            border: 2px solid black;
            border-radius: 4px;
            margin: 5px;
            width: 200px;
            height: 27px;
        }
        .inputnorm:focus {
            background-color: rgb(230, 230, 250); /* Button color on hover */
            padding: 10px 10px;
            color: black; /* Default text color */
            border: 2px solid black;
            border-radius: 4px;
            margin: 5px;
            width: 200px;
            height: 27px;
        }
        #searchResults tr:nth-child(even) {
            background-color: lavender;
        }
        .my-button {
            background-color: #fff; /* Default button color */
            color: black; /* Default text color */
            border: 1px solid black;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition on hover */
            transition: padding 0.3s ease;
        }
        .my-button:hover {
            background-color: gold; /* Button color on hover */
            padding: 10px 18px;
            color: black; /* Default text color */
            border: 2px solid black;
            border-radius: 4px;
        }

        .table-button {
            background-color: #fff; /* Default button color */
            color: black; /* Default text color */
            border: 1px solid black;
            border-radius: 4px;
            padding: 4px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition on hover */
            transition: padding 0.3s ease;
        }
        .table-button:hover {
            background-color: grey; /* Button color on hover */
            padding: 6px 12px;
            color: black; /* Default text color */
            border: 1px solid black;
            border-radius: 4px;
        }
        .intable-button {
            background-color: white;
            color: black;
            border: 1px solid black;
            border-radius: 4px;
            padding: 4px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            transition: padding 0.3s ease;
        }
        .intable-button:hover {
            background-color: black;
            padding: 6px 12px;
            color: greenyellow;
            border: 1px solid black;
            border-radius: 4px;
        }
        body {
            text-align: center;
            background-color: black;
            color: grey;
        }
        h1 {
            font-size: 36px;
            font-weight: bold;
            color: Yellow;
        }
        h2 {
            font-size: 24px;

        }
        input, select {
            margin: 5px;
            width: 200px;
            
        }
        table {
            width: 70%;
            border-collapse: collapse;

        }
        th, td {
            padding: 8px;
            border: 1px solid black;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
  </head>

  <body>
    <h1>Company's Record</h1>
    <h3 style="color: white;"><i>by Krushna Nemade</i></h3>
    <br>
    
    <button class="my-button" onclick="location.href='home.php'">Home</button>
    
    <br>
    <br>
    <form method="POST" target="">
        <table align="center" style="width: 500px;">
            <tr>
                <td colspan="2" style="text-align: center;"><h2 style="display: inline; color: white;">Updating Entry</h2></td>
            </tr>
            <tr>
                <td style="text-align: right;">Company Name</td>
                <td><input class="inputnorm" type="text" id="company" name="company" required value="<?php echo $res['name']; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: right;">Date Applied</td>
                <td><input class="inputnorm" type="date" id="date" name="date" required value="<?php echo $res['dateApp']; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: right;">Skills required</td>
                <td><input class="inputnorm" type="text" id="skills" name="skills" placeholder="javascript, php.." required value="<?php echo $res['skills']; ?>"></td>
            </tr>
            <tr>
                <td style="text-align: right;">Provide link</td>
                <td><input class="inputnorm" type="text" id="link" name="link" required value="<?php echo $res['link']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button class="table-button" style="width: 300px;" type="submit" name="submit" id="submit">Update</button></td>
            </tr>
        </table>
    </form>
    <script>
        window.onload = function() {
            document.getElementById('company').focus();
        };
    </script>
  </body>
</html>