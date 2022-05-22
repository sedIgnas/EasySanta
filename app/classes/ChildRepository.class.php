<?php 

class ChildRepository
{
  public array $childrenList = [
    "Dianne Ameter", "Bodrum Salvador", "Hilary Ouse", "Indigo Violet", "Hans Down",
    "Shequondolisa Bivouac", "Ingredia Nutrisha", "Fig Nelson", "Benjamin Evalent",
    "Gustav Purpleson", "Elon Gated", "Gootsy Porkins", "Cornbread Stevens", "Slaps Guster",
  ];

  /**
   * getChildrenArray
   * returns array with children 
   * @return array
   */
  public function getChildrenArray(): array
  {
    return $this->childrenList;
  }

  /**
   * displayChildren
   * Displays name of each child. Used for menu 
   * @return void
   */
  public function displayChildren(): void
  {
    foreach ($this->childrenList as $child) {
      echo $child."\n";
    }
  }

  /**
   * storeChild
   * stores passed name to childrenList array
   * @param  mixed $fullName
   * @return void
   */
  public function storeChild(string $fullName): void
  {
    array_push($this->childrenList, $fullName);
  }

  /**
   * getRandomChild
   * takes a random element from array and returns it
   * @return string
   */
  public function getRandomChild() :string
  {
    $randomChildKey = array_rand($this->childrenList);
    $randomChild = $this->childrenList[$randomChildKey];

    array_splice($this->childrenList, $randomChildKey, 1);
    array_keys($this->childrenList);

    return $randomChild;
  }
}
