<?php

include 'app/helpers/autoloader.php';
include 'app/helpers/consoleHelper.php';

// Object initialization 
$childRepository = new ChildRepository();
$presentRepository = new PresentRepository();
$easySanta = new EasySanta($childRepository, $presentRepository);


// Console app menu
for ($i = 0; $y = 'exit'; $i++) {
  consoleClear();
  echo "+----------------------------------------------------------------+\n";
  echo "|                           EASY SANTA                           |\n";
  echo "+----------------------------------------------------------------+\n";
  echo "Number of unassigned Gifts: ";
  echo count($presentRepository->presentList);
  echo "\nNumber of unassigned Children: ";
  echo count($childRepository->childrenList);
  echo "\nAssigned gifts count: ";
  print_r(count($easySanta->santasList));
  echo "\n
  _______________________________________________________________\n
  c - add child,\n
  p - add present,\n
  r - assign presents to all children randomly \n
  s - assign 1 random present, to 1 random child to santas list\n
  m - manually assign present to a child and put it on santas list\n
  n - manually assign present to a child that is not present in initial list\n
  q - current Santa's list\n
  _______________________________________________________________\n
  e - exit application\n
  ";

  $input = readline('Type option letter and press enter: ');
  switch ($input) {
    case 'c':
      echo "\n";
      $name = readline('Input child name: ');

      if ($easySanta->validInput($name)) {
        $child = new Child($name, $childRepository);
        consoleClear();
        $childArray = $child->add();
        $childCount = count($childArray);
        if ($childCount !== 0) {
          echo "Unassigned children: \n";
          foreach ($childArray as $child) {
            echo $child."\n";
          }
          echo "\n";
          echo "\nChild has been added successfully. \n";
        } else {
          echo $name . " is already in the list \n";
        }
      } else {
        echo "Name can't be empty and can only contain letters and spaces";
      }
      
      echo "\n";
      readline('Press enter to continue . . .');
      break;

    case 'p':
      echo "\n";
      $presentName = readline('Input present name: ');

      if ($easySanta->validInput($presentName)) {
        $present = new Present($presentName, $presentRepository);
        consoleClear();
        // print_r($present->add());
        $presentArray = $present->add();
        echo "\n";
        foreach ($presentArray as $present) {
          echo $present."\n";
        }
        echo "\nPresent has been added successfully. \n";
      }else {
        echo "Name can't be empty and can only contain letters and spaces";
      }

      echo "\n";
      readline('Press enter to continue . . .');
      break;

    case 's':
      echo "\n";
      consoleClear();
      $easySanta->assignSingleRandomPresent();
      $easySanta->displaySantasList();
      echo "Random present has been successfully assigned to a random child. \n\n";
      readline('Press enter to continue . . .');
      break;

    case 'q':
      echo "\n";
      consoleClear();
      $easySanta->displaySantasList();
      echo "Assigned child - gift pair count: ";
      print_r(count($easySanta->santasList));
      echo "\n\n";

      echo "Unassigned gifts: \n";
      foreach($presentRepository->getPresentArray() as $present) {
        echo $present . "\n";
      }
      echo "\n";

      echo "Unassigned children: \n";
      foreach($childRepository->getChildrenArray() as $child) {
        echo $child . "\n";
      }

      echo "\n\n";
      echo "Present has been successfully assigned to a child. \n";
      readline('Press enter to continue . . .');
      break;

    case 'm':
      echo "\n";
      consoleClear();
      $childRepository->displayChildren();
      echo "\n";
      $manualChild = readline('Input who will recieve the gift: ');
      consoleClear();
      $presentRepository->displayPresents();
      echo "\n";
      $manualPresent = readline('Input what will be the gift: ');
      echo "\n";
      
      if($easySanta->validInput($manualPresent) && $easySanta->validInput($manualChild)){
        $easySanta->assignManually($manualPresent, $manualChild);
        echo "\n";
        $easySanta->displaySantasList();
      
        echo "Assigned gifts count: ";
        $easySanta->assignedGiftsCount();
        echo "\n";
        readline('Press enter to continue . . .');
      } else {
        echo "Name and Present can't be empty and can only contain letters and spaces\n";
        readline('Press enter to continue . . .');
      }
      break;

      case 'n':
        echo "\n";
        consoleClear();
        $specialChild = readline('Input who will recieve the gift: ');
        echo "\n";
        $specialPresent = readline('Input what will be the gift: ');
        echo "\n";
        
        if($easySanta->validInput($specialPresent) && $easySanta->validInput($specialChild)){
          $easySanta->assignManuallyNew($specialPresent, $specialChild);
          echo "\n";
          $easySanta->displaySantasList();
        
          echo "Assigned gifts count: ";
          $easySanta->assignedGiftsCount();
          echo "\n";
          readline('Press enter to continue . . .');
        } else {
          echo "Name and Present can't be empty and can only contain letters and spaces\n";
          readline('Press enter to continue . . .');
        }
        break;

    case 'r':
      consoleClear();
      $easySanta->assignRandomPresents();
      echo "\n\n\n";
      if ($presentRepository->getPresentArray() == !null) {
        echo "Leftover gifts: \n";
        $presentRepository->displayPresents();
        echo "\n";
      }
      if ($childRepository->childrenList == !null) {
        echo "Children without presents: \n";
        $childRepository->displayChildren();
        echo "\n";
      }
      
      readline('Press enter to continue . . .');
      break;

    case 'e':
      echo "\nThanks for using Easy Santa application.\n\n";
      readline('Press Enter to exit . . .');
      $y = 'exit';
      return;

    default:
      echo "+--------------------------------------------------+\n";
      echo "|      You must input one of the menu letters      |\n";
      echo "+--------------------------------------------------+\n";
      echo "\n";
      readline('Press Enter to continue. . .');
      consoleClear();
      break;
  }
}
