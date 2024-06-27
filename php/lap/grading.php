<?php
// Constants
const PASS_GRADE = 70;
const SUBJECTS = [
    "Math" => 80,
    "Science" => 75,
    "English" => 85,
    "History" => 70,
    "Art" => 90
];

// Calculate average grade
$totalSubjects = count(SUBJECTS);
$sumGrades = array_sum(SUBJECTS);
$averageGrade = $sumGrades / $totalSubjects;

// Check if student passed or failed
if ($averageGrade >= PASS_GRADE) {
    echo "Congratulations! You passed the year with an average grade of $averageGrade.\n";
} else {
    echo "Oops! You failed the year with an average grade of $averageGrade.\n";
}

// Determine subject grades
echo "<br/>Subject Grades:\n <br/>";
foreach (SUBJECTS as $subject => $grade) {
    if ($grade >= PASS_GRADE) {
        echo "$subject: Passed\n";
    } elseif ($grade >= 60 && $grade < PASS_GRADE) {
        echo "$subject: Conditional Pass\n";
    } else {
        echo "$subject: Failed\n";
    }
    echo "<br/>";
}

// Analyze highest and lowest grades
$highestGrade = max(SUBJECTS);
$lowestGrade = min(SUBJECTS);

echo "\n";
echo "Highest Grade: $highestGrade\n";
echo "Lowest Grade: $lowestGrade\n";

// Perform extra credit calculation using a switch statement
$extraCreditSubject = "Math";
$extraCredit = 0;

switch ($extraCreditSubject) {
    case "Math":
        $extraCredit = $highestGrade * 0.1;
        break;
    case "Science":
        $extraCredit = $highestGrade * 0.05;
        break;
    default:
        $extraCredit = 0;
        break;
}

echo "\n";
echo "Extra Credit for $extraCreditSubject: $extraCredit\n";
?>
