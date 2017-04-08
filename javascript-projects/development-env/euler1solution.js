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
		while(currentNumber < this.limit);
		
		return arrayOfMultiples;
	}

}

function arrayOperations()
{
	this.removedDuplicates = function(arrayA, arrayB)
	{
		var removedDuplicateArray = arrayA;
		for(var a = 0; a < arrayB.length; a++)
		{
			if(arrayA.indexOf(arrayB[a]) < 0)
			{
				removedDuplicateArray.push(arrayB[a]);
			}
		}
		return removedDuplicateArray;//
	};
	
	this.sumArray = function(arrayA)
	{
		var sum = 0;
		var index = 0;
		while(index < arrayA.length)
		{
			sum = sum + arrayA[index];
			index++;
		}
		return sum;	
	}
	
}

function printArray(arrayA)
{
	this.arrayInput = arrayA;
	this.printContentsOfArray = function()
	{
		for(var index =0; index < this.arrayInput.length; index++)
		{
			document.write(this.arrayInput[index]);
			document.write("<br>");
		}
	}		
}

var threeMultiplesObject = new multipleFactor(3, 1000);
var fiveMultiplesObject = new multipleFactor(5, 1000);
var threeMultiples = threeMultiplesObject.multiplesOfNumber();
var fiveMultiples = fiveMultiplesObject.multiplesOfNumber();
var printArrayObject = new printArray(threeMultiples);
//printArrayObject.printContentsOfArray();
var printArrayObject = new printArray(fiveMultiples);
//printArrayObject.printContentsOfArray();
var arrayOp = new arrayOperations();
var removeDuplicatesArray = arrayOp.removedDuplicates(threeMultiples, fiveMultiples);
document.write('Solution to the Euler problem 1 is: '.concat(arrayOp.sumArray(removeDuplicatesArray)));