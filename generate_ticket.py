def generate_hall_ticket():
    php_code = """<?php
$student = array(
    "register_number" => "RA2411030030042",
    "name" => "ROOPESH SINGHAL [02-AUG-2006]",
    "programme" => "B.Tech. - CSE with Specialization in Cyber Security",
    "exam" => "B.Tech. DEGREE EXAMINATIONS - MAY 2025",
    "venue" => "SRMIST, DELHI-NCR CAMPUS, MODINAGAR, GHAZHIABAD",
    "abc_id" => "425940831343"
);

$courses = array(
    array("semester"=>"II","code"=>"21MAB102T","desc"=>"ADVANCED CALCULUS AND COMPLEX ANALYSIS","date"=>"16-MAY-2025","session"=>"FN (10:00-01:00)R"),
    array("semester"=>"II","code"=>"21EES101T","desc"=>"ELECTRICAL AND ELECTRONICS ENGINEERING","date"=>"19-MAY-2025","session"=>"FN (10:00-01:00)R"),
    array("semester"=>"II","code"=>"21CSC101T","desc"=>"OBJECT ORIENTED DESIGN AND PROGRAMMING","date"=>"20-MAY-2025","session"=>"FN (10:00-01:00)R"),
    array("semester"=>"II","code"=>"21PYB102J","desc"=>"SEMICONDUCTOR PHYSICS AND COMPUTATIONAL METHODS","date"=>"23-MAY-2025","session"=>"FN (10:00-01:00)R"),
    array("semester"=>"II","code"=>"21LEH101T","desc"=>"COMMUNICATIVE ENGLISH","date"=>"24-MAY-2025","session"=>"FN (10:00-01:00)R")
);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Exam Hall Ticket</title>
    <style>
        body { font-family: "Times New Roman", serif; margin: 20px; background: #f0f0f0; }
        .ticket {
            border: 3px solid black;
            padding: 25px;
            width: 850px;
            margin: auto;
            background: white;
        }
        h2 { text-align: center; margin: 5px 0; font-size: 20px; }
        h3 { text-align: center; margin: 5px 0; font-size: 16px; }
        table.details { width: 100%; margin-top: 15px; border-collapse: collapse; }
        table.details td { padding: 6px; border: ; font-size: 14px; }
        table.courses { width: 100%; margin-top: 20px; border-collapse: collapse; }
        table.courses th, table.courses td {
            border: 1px solid black;
            padding: 6px;
            font-size: 13px;
            text-align: center;
        }
        table.courses td.desc { text-align: left; }
        .footer {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <h2>SRM INSTITUTE OF SCIENCE AND TECHNOLOGY</h2>
        <h3><?php echo $student["exam"]; ?></h3>

        <table class="details">
            <tr><td><b>Register Number:</b></td><td><?php echo $student["register_number"]; ?></td></tr>
            <tr><td><b>Name of the Candidate:</b></td><td><?php echo $student["name"]; ?></td></tr>
            <tr><td><b>Programme:</b></td><td><?php echo $student["programme"]; ?></td></tr>
            <tr><td><b>Examination Venue:</b></td><td><?php echo $student["venue"]; ?></td></tr>
            <tr><td><b>ABC ID:</b></td><td><?php echo $student["abc_id"]; ?></td></tr>
        </table>

        <table class="courses">
            <tr>
                <th>Semester</th>
                <th>Course Code</th>
                <th>Course Description</th>
                <th>Exam Date</th>
                <th>Session</th>
            </tr>
            <?php foreach($courses as $c): ?>
            <tr>
                <td><?php echo $c["semester"]; ?></td>
                <td><?php echo $c["code"]; ?></td>
                <td class="desc"><?php echo $c["desc"]; ?></td>
                <td><?php echo $c["date"]; ?></td>
                <td><?php echo $c["session"]; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="footer">
            <p>Signature of the Candidate</p>
            <p><b>CONTROLLER OF EXAMINATIONS</b></p>
        </div>
    </div>
</body>
</html>
"""
    with open("hall_ticket.php", "w") as f:
        f.write(php_code)

    print("✅ hall_ticket.php created in your project folder!")

generate_hall_ticket()
