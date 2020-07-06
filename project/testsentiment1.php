<?php
// Include composer autoloader file.
require __DIR__ . '/sentiment/autoload.php';

// Create a new instance of analyzer with default configuration.
$analyzer = SentimentAnalysis\Analyzer::withDefaultConfig();

// Analyze the text.
$result = $analyzer->analyze('worst ');

// Get and print the category.
echo $result->category();