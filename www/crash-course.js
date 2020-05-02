// comment

/* multi
line 
comments */

// variables : let, const 

// type of variables : string, numbers, boolean, null, undefined, symbols
const name = 'John';
const age = 30;
const rating = 4.5; // in JS there's no difference between float and integer, all is number
const iscool = true;
const x = null; // means mainly empty
const y = undefined;
let z; // start an undefined value for z

//concatenation
('my name is ' + name + ' and I am ' + age)  // old method, don't use it anymmore
// template strings
`my names is $(name) and I am $(age)` // current method

//asign to a constant
const hello = `my names is $(name) and I am $(age)`

// properties and methods
const s = 'Hello world';
s.length // give number of characters
s.toUpperCase // set characters to uppercase
s.substring(0, 5) // select 0 to 5 characters (here: Hello) 
s.substring(0, 5).toLowerCase // concatenation
s.split('') // will split each character in an array 
  //ex of use 
  const s= 'technology, computer, it, code'
  s.split(', ') // will create an array with words, using comma space as separator

// arrays: variables that holds multiple values
const fruits = ['apples', 'peach', 'strawberry', 10, true]; // array construction, can contain multiple type of variables
fruits[1]; // return array value of second variable (here peach), arrays are zero based
fruits[3] = 'grapes'; // add a value to an array, not very sure cause you don't know numbers of items in array, better use belows
fruits.push('mangos'); // add a value to the end of array 
fruits.unshift('banana'); // add a value to the start of array
fruits.pop(); // remove last entry of array
Array.isArray('fruits'); // return boolean true if array fruits exist, else false
fruits.indexOf('peach'); // willl return position number of variable, here will be 1



