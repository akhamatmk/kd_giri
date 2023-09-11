<?php
$items = ['11','12','cii','001','2','1998','7','89','iia','fii'];

// Create an array to store the results
$results = [];
$allSubstrings = [];

foreach ($items as $item) {
    if (! containsNumber($item)) {
        $substrings = [];
        $itemLength = strlen($item);

        for ($i = 0; $i < $itemLength; $i++) {
            for ($j = $i + 1; $j <= $itemLength; $j++) {
                $substrings[] = substr($item, $i, $j - $i);
            }
        }
        $results[$item] = $substrings;
        // Combine substrings from all items
        $allSubstrings = array_merge($allSubstrings, $substrings);
    }
}

function containsNumber($input) {
    // Use regular expression to check if the input contains at least one digit
    return preg_match('/\d/', $input) === 1;
}

// Print the results
foreach ($results as $item => $substrings) {
    echo $item . " = {\"" . implode('","', $substrings) . "\"}\n";
}

echo "S = {\"" . implode('","', $allSubstrings) . "\"}\n";
?>
