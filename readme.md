# Easy Santa

Some people really enjoy Christmas and some just hate it but it does not change the fact that the guy in Lapland named Santa Claus will be using this app this year. `Easy Santa` is a simple CONSOLE application which will allow Santa to register all the gifts that children around the world want!

Contents
========
 * [Task](#task)
 * [How to run](#how-to-run)
 * [Usage](#usage)
 * [File structure](#file-structure)

### Task

+ Create a very simple and easy to navigate console menu. Try to handle invalid characters, symbols that users might enter and various errors that might occur.
+ Let’s make this year easy for Santa. We can make it possible by assigning random gifts to random children. Keep in mind that names and gifts must be stored somewhere - array, list, dictionary or file (it’s up to you).
+ This application should be able to do several things:
    + It should be able to print out detailed registry information:
        + The amount of assigned “pairs” - gifts and children that we already have assigned in our registry
        + All the entries with names and gifts.
        + Number of unassigned children.
        + Number of unassigned gifts.
    + It should be possible for users to add new kids and gifts to the collection.
        + Try to create some check that wouldn’t allow Santa to add the same child again. Shouldn’t be a problem for gifts though as they can repeat
    + Randomly assign a gift to some child.
    + Let Santa manually assign a certain gift to a specific child.
+ Try to show object-oriented programming (OOP) principles and best practises

##### Bonus:
+ Make some more advanced logic behind Santa’s registry and after every successful
generation, remove children and gifts so they won’t duplicate.
+ Time is money right? So let’s make an option that assigns ALL the gifts at once. In
order for this to work, we must have an identical number of gifts and children (maybe
more gifts than children could also work) in our “database”. We don’t want to
leave someone without a gift this year, right?
+ Show object-oriented programming principles and best practises.
+ Creativity is a great skill to have. Create something that is not written here but you
find it to be quite interesting and document it.
+ While developing this console application listen to Mariah Carey - All I want for Christmas is you. Or don’t. Just make it work!

### How to run

#### Method 1: run php in console
Only works if PHP is installed in the operating system
1. Clone repository
2. Open folder in your favorite terminal or any IDE that has integrated terminal within:
    + CMD in windows
    + Bash in linux
    + IDE, e.g: Visual studio code, Atom, PHPStorm, Sublime and many others
3. Use command `php` with filename, in this case `php program.php` to run "Easy Santa" console application. Be sure to be in the directory of application

#### Method 2: download executable and run

1. [Download - Google drive](https://drive.google.com/file/d/1JnWxEpRv-KhYzmiZLWSrZLeuEOUeP4bk/view?usp=sharing)
2. Extract files from the archive using 7-zip, winRAR, The Unarchiver or any similar software.
3. If files were extracted into folder, navigate inside and run `EasySanta.exe`.

### Usage

Start the program using one of the listed above methods.

```
  Easily create list of children and presents and assign them to each other.

  In the top area of the menu, number of unnasigned gifts and children, assigned pair
  count will be displayed. Each child can only be assigned to one present, while same present can be
  created and assigned to multiple children. 
  Children names and presents can only be input as Letters and spaces combination.
  Upon entering invalid characters, a message will inform you to correct your input.
  Application will not let you input special characters or numbers and is case sensitive.
  If option (r) is chosen, application will assign all presents to all children, as long
  as there are at least 1 present to 1 child. 

Options:
  c - add child
  p - add present                 
  r - assign presents to all children randomly
  s - assign 1 random present, to 1 random child to list
  m - manually assign present to a child and put it on list.
  n - manually assign present to a child that is not present in initial list
  q - current Santa's list             
  e - exit application
___
c - adds new child if the child is not present in "database", will check if input has no illegal symbols,
is not empty and has not been assigned to a gift already. Then list of children that has not been assigned to
any gift will be displayed.

p - adds new present and input will be checked for illegal symbols and if not empty. Then list of available
presents will be displayed.

r - assigns presents from "database" to children. Chooses which present to assign to which child randomly,
then removes children and presents from "database". If there are quantity of presents or children are 
more than one or another, message will be displayed to add more children or presents and unassigned children
or presents will be displayed.

s - assigns one random present to one random child, then displays list of presents that are already
assigned to children.Then displays list of assigned presents to children. If there are no more presents
or children, message to add more will be displayed.

m - assigns present of user's choice (input) to child of user's choice(input). If user tries to input 
name that is not present in the "database" or is already in the Santa's list with a gift, message
will be displayed, that a child or present is not present in the initial list. Then displays
list of assigned children and presents.

n - assigns present of user choice, can be any input, to a child with any name that user enters.
Child can not be in initial "database" list, so if user inputs such child name, a corresponding message
will be displayed.

q - displays current Santa's list with assigned children and presents, assigned pair count, unassigned children,
unassigned presents. If there is nothing in the list, assigned pair count - 0 will be displayed.
```

### Application file structure

```
├── app
│   ├── classes
│   │   ├── Child.class.php
│   │   ├── ChildRepository.class.php
│   │   ├── EasySanta.class.php
│   │   ├── Present.class.php
│   │   └── PresentRepository.php
│   └── helpers
│       ├── autoloader.php
│       └──consoleHelper.php
├── program.php
└── readme.md

app/classes                                         Contains classes and logic for program.php
app/helpers                                         Contains autoloader and useful console methods
```
