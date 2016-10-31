from types import *
"""
Script which is used to determine the type of variable entered by the
user.
"""

def variableChecker(variableToCheck):
	printString = None;
        if type(variableToCheck) is IntType:
                printString = "Int";
        elif type(variableToCheck) is BooleanType:
                printString = "Boolean";
        elif type(variableToCheck) is StringType:
                printString = "String";
        elif type(variableToCheck) is ListType:
                printString = "List"; 
        else:
                printString = "Other Type";

	return printString;

def stringParserForTypeChecker(variableToCheck):
	variableType = variableChecker(variableToCheck);
	printString = variableType+" inserted with value: "+str(variableToCheck);
	return printString;

def main(variableToCheck):
	print stringParserForTypeChecker(variableToCheck);

"""Main user code to be ran"""
user_input = eval(raw_input('Can you please enter some input?'));
main(user_input);
