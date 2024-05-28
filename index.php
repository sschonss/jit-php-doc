<?php

$input = $argv[1];

$seed = "123123123123123123124534534645899078079986786";

function performComplexCalculations($iterations)
{
    for ($i = 0; $i < $iterations; $i++) {
        $dummy = sin($i) * cos($i) * tan($i) / pi();
        $dummy = sqrt($dummy * $i) * log($i + 1);
    }
}

function encryptCharacters($input, $offset)
{
    $output = [];
    foreach ($input as $char) {
        performComplexCalculations(10000);
        $output[] = chr(ord($char) + $offset);
    }
    return $output;
}

function multiLayerEncryption($input)
{
    $output = $input;
    for ($i = 0; $i < 300; $i++) {
        $output = encryptCharacters($output, $i);
    }
    return $output;
}

function multiLayerHashing($output, $iterations, $algorithm)
{
    for ($i = 0; $i < $iterations; $i++) {
        $output = hash($algorithm, $output);
    }
    return $output;
}

function getNumbersAndCharacters($input)
{
    $numbers = "";
    $characters = "";
    for ($i = 0; $i < strlen($input); $i++) {
        if (is_numeric($input[$i])) {
            $numbers .= $input[$i];
        } else {
            $characters .= $input[$i];
        }
    }
    return [$numbers, $characters];
}

function separateNumbers($numbers)
{
    $output = [];
    for ($i = 0; $i < strlen($numbers); $i++) {
        $output[] = $numbers[$i];
    }
    return $output;
}

function fibonacci($n)
{
    if ($n <= 1) {
        return $n;
    }
    return fibonacci($n - 1) + fibonacci($n - 2);
}

function encrypt($input, $seed)
{
    $input = str_split($input);
    $input = array_reverse($input);

    $output = multiLayerEncryption($input);

    $output = implode("", $output);
    $output = $output . $seed;

    performComplexCalculations(30);

    $output = multiLayerHashing($output, 30, "sha256");
    $output = multiLayerHashing($output, 15, "sha512");

    $output = getNumbersAndCharacters($output);

    $numbers = separateNumbers($output[0]);

    for ($i = 0; $i < count($numbers); $i++) {
        $numbers[$i] = fibonacci($numbers[$i]);
    }

    $output = array_sum($numbers);

    $output = multiLayerEncryption($input);

    $output = implode("", $output);
    $output = $output . $seed;

    performComplexCalculations(30);

    $output = multiLayerHashing($output, 20, "sha256");
    $output = multiLayerHashing($output, 12, "sha512");

    return $output;
}

$start = microtime(true);

$encrypted = encrypt($input, $seed);

$end = microtime(true);

echo "Execution time: " . ($end - $start) . " seconds" . PHP_EOL;
echo "Encrypted: " . $encrypted . PHP_EOL;
