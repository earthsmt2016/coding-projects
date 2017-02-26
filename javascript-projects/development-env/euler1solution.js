/**
 * Function which gets the multiples of 
 * a given number up to limit
 */
function multipleFactor(number, limit)
{
	//Number to generate the multiples over.
	this.number = number;
	//Define the limit so that multiples of a number do not
	//exceed the limit.
	this.limit = limit;
	
	/**
	 * Generates the multiples of a number up to the limit
	 */
	this.multiplesOfNumber = function()
	{
		var arrayOfMultiples = new Array();
		var currentNumber = this.number;
		var index  = 0;
		do
		{
			arrayOfMultiples[index] = currentNumber;
			currentNumber = currentNumber + this.number;
			index++;
		}
		while(currentNumber <= this.limit);
		
		return arrayOfMultiples;
	}
}

function printArray(arrayInput)
{
	this.arrayInput = arrayInput;
	this.printContentsOfArray = function()
	{
		for(var index =0; index < this.arrayInput.length; index++)
		{
			document.write(this.arrayInput[index]);
			document.write("<br>");
		}
	}		
}

var a = new multipleFactor(3, 10);
var b = a.multiplesOfNumber();;
var c = new printArray(b);
c.printContentsOfArray();