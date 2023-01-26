<?php
// Include the model
include 'model/faq.requests.php';
// Get the faq
$faq = GetFAQCurrentLang();

include 'views/public/faq.php';
