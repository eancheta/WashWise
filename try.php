<?php
// Hard-coded test values
$enteredPassword = "sss";  // Password you entered
$storedHash = '$2y$10$MOzZ9/pSse62Npu54SWmre/jNMu3oBHNyeMKbqsUCR/yJbVBitvFa';  // Stored hash from DB

// Test password verification
if (password_verify($enteredPassword, $storedHash)) {
    echo "✅ Password matched!";
} else {
    echo "❌ Password mismatch!";
}
?>