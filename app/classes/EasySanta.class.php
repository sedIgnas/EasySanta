<?php

// Santa class with methods for general logic of application.
class EasySanta
{
  private PresentRepository $presentRepository;
  private ChildRepository $childRepository;

  public function __construct(ChildRepository $childRepository, PresentRepository $presentRepository)
  {
    $this->presentRepository = $presentRepository;
    $this->childRepository = $childRepository;
    $this->santasList = [];
  }

  /**
   * arrayRandomizer
   * randomizes given array and returns it  
   * @param  mixed $array1
   * @return array
   */
  public function arrayRandomizer(array $array1): array
  {
    $randomized = [];
    while (count($array1) > 0) {
      $randomNum = rand(0, count($array1) - 1);
      $extracted = array_splice($array1, $randomNum, 1);
      $randomized[] = $extracted[0];
    }
    return $randomized;
  }

  /**
   * isRepoEmpty
   * checks if repositories are empty and returns boolean accordingly
   * @return bool
   */
  public function isRepoEmpty(): bool
  {
    if (!$this->childRepository->childrenList && !$this->presentRepository->presentList) {
      return true;
    }
    return false;
  }


  /**
   * assignRandomPresents
   * Checks if repository is not empty, assigns presents to children randomly, displays information accordingly
   * @return void
   */
  public function assignRandomPresents(): void
  {
    if (!$this->isRepoEmpty()) {
      while ($this->presentRepository->presentList && $this->childRepository->childrenList) {
        $this->assignSingleRandomPresent();
      }
      echo "\nGifts assigned to children randomly! Please check the Santa's list \n";
    } else {
      echo "Can't assign. Add more children and presents\n";
    }
  }

  // assigns 1 random present to 1 random child, then stores it in Santa's list  
  /**
   * assignSingleRandomPresent
   * checks if repositories have at least one entry, assigns 1 random present to 1 random child,
   * then stores it in Santa's list and if there are not enough presents or children,displays information in menu
   * @return void
   */
  public function assignSingleRandomPresent()
  {
    if (count($this->childRepository->childrenList) > 0 && count($this->presentRepository->presentList) > 0) {
      $randomChild = $this->childRepository->getRandomChild();
      $randomPresent = $this->presentRepository->getRandomPresent();
      $rndAssignedPresent = [$randomPresent => $randomChild];

      return array_push($this->santasList, $rndAssignedPresent);
    } else {
      echo "Add more children or presents\n";
      readline('Press enter to continue . . . ');
      return;
    }
  }

  /**
   * assignManually
   * accepts input from user, checks if name from input are not already
   * present in santa's list, checks if name is not present in repository,
   * adds name and present to santa's list and removes child and present name
   * from repositories respectively
   * @param  mixed $presentInput
   * @param  mixed $childInput
   * @return void
   */
  public function assignManually(string $presentInput, string $childInput): void
  {
    if (!$this->inSantasList($childInput) && $this->inRepository($childInput)) {
      if ($this->inPresentRepository($presentInput)) {
        array_push($this->santasList, [$presentInput => $childInput]);
        array_splice(
          $this->childRepository->childrenList,
          array_search($childInput, $this->childRepository->childrenList),
          1
        );
        array_splice(
          $this->presentRepository->presentList,
          array_search($presentInput, $this->presentRepository->presentList),
          1
        );
        echo "Present has been successfully assigned to a child!\n";
      } else {
        echo "There is no such gift in gifts list.\n";
      }
    } else if (!$this->inRepository($childInput)) {
      echo $childInput . ". There is no such child in the list!\n";
    } elseif (!$this->inSantasList($childInput) && !$this->inRepository($childInput)) {
      echo "This child is either in candidate or Santa's list";
    }
  }

  /**
   * assignManuallyNew
   * checks if input string(childInput) is not present in repository and santa's list
   * adds presentInput and childInput to santa's list or displays a message in the menu
   * @param  mixed $presentInput
   * @param  mixed $childInput
   * @return void
   */
  public function assignManuallyNew(string $presentInput, string $childInput): void
  {
    if (!$this->inRepository($childInput) && !$this->inSantasList($childInput)) {
      array_push($this->santasList, [$presentInput => $childInput]);
    } else {
      echo "This option is for SPECIAL children that are not in inital list of children.\n
      If you would like to assign present to a child which is already in initial children list\n
      please choose other options instead\n";
    }
  }

  /**
   * validInput
   * checks input for empty string, allows only letters and spaces
   * @param  mixed $inputString
   * @return bool
   */
  public function validInput(string $inputString): bool
  {
    if ($inputString !== '' && ctype_alpha(str_replace(' ', '', $inputString))) {
      return true;
    }
    return false;
  }

  /**
   * inSantasList
   * checks if input string is in Santa's list, returns boolean
   * @param  mixed $inputName
   * @return bool
   */
  public function inSantasList(string $inputName): bool
  {
    foreach ($this->santasList as $item) {
      if (in_array($inputName, $item) === true)
        return true;
    }
    return false;
  }

  /**
   * inRepository
   * checks if passed string is in repository
   * @param  mixed $name
   * @return bool
   */
  public function inRepository(string $name): bool
  {
    if (in_array($name, $this->childRepository->childrenList)) {
      return true;
    }
    return false;
  }

  /**
   * assignedGiftsCount
   * prints out assigned gifts number
   * @return void
   */
  public function assignedGiftsCount(): void
  {
    print_r(count($this->santasList));
  }

  public function inPresentRepository(string $presentName): bool
  {
    if (in_array($presentName, $this->presentRepository->presentList)) {
      return true;
    }
    return false;
  }

  /**
   * displaySantasList
   * displays santa's list and gifts assigned to children
   * @return void
   */
  public function displaySantasList(): void
  {
    echo "Currently in Santa's list: \n\n";
    foreach ($this->santasList as $item) {
      foreach ($item as $present => $child) {
        echo $child . "   ->   " . $present . "\n";
      }
    }
    echo "\n";
  }
}
