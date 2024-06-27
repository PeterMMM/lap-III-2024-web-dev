<?php
// Constants
const PASS_GRADE = 70;
const SUBJECTS = [
    "Math" => 80,
    "Science" => 75,
    "English" => 61,
    "History" => 70,
    "Art" => 90
];

// Function to calculate average grade
function calculateAverageGrade($grades) {
    $totalSubjects = count($grades);
    $sumGrades = array_sum($grades);
    $averageGrade = $sumGrades / $totalSubjects;
    return $averageGrade;
}

// Check if student passed or failed
function checkPassOrFail($averageGrade) {
    if ($averageGrade >= PASS_GRADE) {
        echo "Congratulations! You passed the year with an average grade of $averageGrade.\n";
    } else {
        echo "Oops! You failed the year with an average grade of $averageGrade.\n";
    }
}

// Determine subject grades
function analyzeSubjectGrades($grades) {
    echo "Subject Grades: <br/>";
    foreach ($grades as $subject => $grade) {
        if ($grade >= PASS_GRADE) {
            echo "$subject: Passed\n";
        } elseif ($grade >= 60 && $grade < PASS_GRADE) {
            echo "$subject: Conditional Pass\n";
        } else {
            echo "$subject: Failed\n";
        }
        echo "<br/>";
    }
}

// Calculate average grade
$averageGrade = calculateAverageGrade(SUBJECTS);

// Check if student passed or failed
checkPassOrFail($averageGrade);

// Determine subject grades
analyzeSubjectGrades(SUBJECTS);
?>
