<?php
// Load JSON data
$students = json_decode(file_get_contents("students.json"), true);
$courses = json_decode(file_get_contents("courses.json"), true);

// Get register number from URL
$regno = $_GET['regno'] ?? '';

$student = null;
foreach ($students as $s) {
    if ($s['regno'] == $regno) {
        $student = $s;
        break;
    }
}

if (!$student) {
    die("<h2>❌ Student not found. Try again.</h2>");
}

// Get courses by branch + semester
$key = $student['branch'] . "_" . $student['semester'];
$student_courses = $courses[$key] ?? [];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hall Ticket - <?php echo $student['regno']; ?></title>
    <style>
        body { font-family: "Times New Roman", serif; margin: 20px; }
        .bor { border: 1px; padding: 15px; width: 900px; margin: auto; }
        .ticket { border: 1px solid black; padding: 15px; width: 900px; margin: auto; }
        .header { text-align: center; }
        .header img { float: left; }
        .serial { float: right; font-size: 12px; }
        h2,h3 { margin: 5px 0; }
        .details { width: 100%; border: 1px solid black; border-collapse: collapse; margin-top: 10px; font-size: 18px; }
        .details td { padding: 9px; }
        .details .photo { text-align: center; }
        .details .photo img { width: 100px; height: 120px; border: 1px solid black; }
        .courses { width: 100%; border: 1px solid black; margin-top: 3px; border-bottom-style: none;}
        .courses th, .courses td { padding: 5px; text-align: left; font-size: 18px; }
        .courses td.desc { text-align: left; }
        .note { margin-top: 15px; font-size: 11px; text-align: justify; }
        .statement { text-align: center; font-size:20px; margin-top:0px; margin-bottom:0px; border-left: 1px solid black; border-right: 1px solid black; padding: 0px;border-collapse: collapse;}
        .footer { width:100%; border:1px ; border-collapse:collapse; margin-top:20px; font-size:17px; }



    </style>
</head>
<body>
<div class="bor">
    <div class="header">
        <img src="years.png" alt="Logo" width="90" height="90">
        <div class="serial"><img src="logoS.png" alt="Logo" width="200" height="100"></div>
        <!-- <h2>SRM INSTITUTE OF SCIENCE AND TECHNOLOGY</h2> -->
        <!-- <p>(Deemed to be University u/s 3 of the UGC Act, 1956)<br>SRM Nagar, Kattankulathur - 603 203</p> -->
        <h1 style=" margin-top: 0px; padding-top: 180px;"><?php echo $student['exam']; ?></h1>
        <h2>HALL TICKET</h2>
         <b><p style="text-align: left;">Serial No.: 25/<?php echo $student['regno']; ?></p></b>
    </div>
<!-- <div class="ticket"> -->
    <table class="details">
        <tr>
            <td><b>EXAMINATION CENTRE</b></td>
            <td>:   <?php echo $student['venue']; ?></td>
            <td rowspan="5" class="photo"><img src="<?php echo $student['photo']; ?>" alt="Photo"></td>
        </tr>
        <tr><td><b>NAME OF THE CANDIDATE</b></td><td>:  <?php echo $student['name']; ?></td></tr>
        <!-- <tr><td><b>ABC ID</b></td><td>:    <?php echo $student['abc_id']; ?></td></tr> -->
        <tr><td><b>REGISTRATION NUMBER</b></td><td>:    <?php echo $student['regno']; ?></td></tr>
        <tr><td><b>PROGRAM/SECTION</b></td><td>:    <?php echo $student['programme']; ?></td></tr>
        <tr><td><br></td></tr>
    </table>

    <table class="courses">
        <tr><td colspan="5" style="height: 5px;"></td></tr>
        <tr ><th>SEMESTER</th><th>SUB. CODE</th><th>SUBJECT</th><th>DATE OF EXAM</th><th>SESSION</th></tr>
        <tr><td colspan="5" style="height: 5px;"></td></tr>
        <?php foreach ($student_courses as $c): ?>
            <tr>
                <td><?php echo $student['semester']; ?></td>
                <td><?php echo $c['code']; ?></td>
                <td class="desc"><?php echo $c['desc']; ?></td>
                <td><?php echo $c['date']; ?></td>
                <td><?php echo $c['session']; ?></td>
            </tr>
            <tr>
                <td colspan="5" style="height: 5px;"></td>
            </tr>
            
        <?php endforeach; ?>
        <!-- <tr><th >****End of Statement****</th></tr> -->
    </table>
    <p class="statement"><br><br>***** End of Statement *****<br><br><br><br><br><br><br><br><br><br><br></p>
    <table style="width:100%; border:1px solid black; border-collapse:collapse; margin-top:0px; font-size:17px; border-bottom-style: none; border-top-style: none;">
            <tr>
                <td style="width:60%; padding:10px; vertical-align:top;">
                    <div style=width:250px; margin-bottom:5px;"></div>
                    <b>SIGNATURE OF THE CANDIDATE</b>
                </td>
                <td style="text-align:right; padding:10px; vertical-align:bottom;">
                    <!-- <img src="controller_sign.png" alt="Controller Signature" style="width:150px;"><br> -->
                    <b>CLASS MENTOR</b>
                </td>
            </tr>

    </table>
    <table style="width:100%; border:1px solid black; border-collapse:collapse; margin-top:0px; font-size:17px; padding:0px; border-top-style: none;">
        <tr>
            <td style="width:60%; padding-bottom:20px; padding-top:90px; vertical-align:top; text-align: center; ">
                <!-- <div style=width:250px; margin-bottom:5px;></div> -->
                <b>HEAD IEC</b>
            </td>
        </tr>

    </table>
</div>
</body>
</html>
