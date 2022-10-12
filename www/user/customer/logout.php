<?php
session_start();
if (session_unset()) {
    echo "<script>alert('Logout Successful');</script>";
    echo "<script>window.location.href = '/';</script>";
				
}

?>