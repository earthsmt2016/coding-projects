from types import *
import sys
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

try:
	main(sys.argv[1]);
except IndexError:
	print "Command line arguments were not set correctly";
