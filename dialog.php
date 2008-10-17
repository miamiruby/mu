#!/usr/bin/php
<?php
   `dialog --msgbox "This demonstrates PHP interacting smoothly with dialogs." 10 40`;
   $result = `dialog --menu "Please select an option" 0 0 0 "1)" "File Selection" "2)" "Calendar" "3)" "Password Box" "4)" "Checklist" 2>/dev/stdout`;

   switch ($result) {
      case "1)":
         $result = `dialog --fselect /usr/bin 0 0 2>/dev/stdout`;
         print "The filename you selected was $result\n\n";
         break;
      case "2)":
         $result = `dialog --calendar "When is your birthday this year?" 0 0 22 12 2003 2>/dev/stdout`;
         print "The date you selected was $result\n\n";
         break;
      case "3)":
         $result = `dialog --passwordbox "Please enter your MySQL password." 0 0 2>/dev/stdout`;
         print "The password you entered was $result\n\n";
         break;
      case "4)":
         $result = `dialog --checklist "Please select your Foo" 0 0 0 "1)" "Some Option" "on" "2)" "Another Option" "off" 2>/dev/stdout`;
         print "The options you chose were $result\n\n";
         break;
   }
?>

