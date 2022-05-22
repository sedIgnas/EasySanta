<?php

// Present repository for data storing and related methods
class PresentRepository
{
  public array $presentList = [
    "Compass", "Banana", "Joystick", "Tamagotchi", "Drone", "Basketball ball",
    "Pear Watch", "Glasses", "Scooter", "Digimon", "Lego kit", "Visma internship",
    "Football ball", "Karaoke set",
  ];

  /**
   * getPresentArray
   * returns array of data from presentList 
   * @return array
   */
  public function getPresentArray(): array
  {
    return $this->presentList;
  }
  
  /**
   * displayPresents
   * displays presents, used for menu
   * @return void
   */
  public function displayPresents(): void
  {
    foreach ($this->presentList as $present) {
      echo $present."\n";
    }
  }

  /**
   * storePresent
   * stores passed value to presentList
   * @param  mixed $presentName
   * @return void
   */
  public function storePresent(string $presentName): void
  {
    array_push($this->presentList, $presentName);
  }
  
  /**
   * getRandomPresent
   * takes random element from presentList and returns it as string,
   * removes from present array
   * @return string
   */
  public function getRandomPresent(): string
  {
    $randomPresentKey = array_rand($this->presentList);
    $randomPresent = $this->presentList[$randomPresentKey];

    array_splice($this->presentList, $randomPresentKey, 1);
    array_keys($this->presentList);

    return $randomPresent;
  }
}
