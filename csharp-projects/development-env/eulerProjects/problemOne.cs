using System;

namespace problemOne
{
	static class HelperMethod
	{
		
		public static void printContentsArray(string outputStart, int[] array, string end="")
		{
			Console.WriteLine(outputStart);
			foreach(int element in array)
			{
				Console.WriteLine(element);
			}
			Console.WriteLine(end);
		}

		public static void printNiceMessage(string output, int contents)
		{
			Console.WriteLine(output);
			Console.WriteLine(Convert.ToString(contents));
		}
	}

	class ProblemOne
	{
		public readonly int numberOne;
		public readonly int numberTwo;

		private int amountSequence = 0;

		public int AmountSequence{
			get{return amountSequence;}
			set{if(amountSequence > 0) amountSequence = value;}
		}

		public ProblemOne(int noOne, int noTwo)
		{
			numberOne = noOne;
			numberTwo = noTwo;
			this.AmountSequence = -9;
		}

		public int getAmountSequence()
		{
			return this.amountSequence;
		}

		public static int[] introduceUser()
		{
			int[] info = new int[2];
			Console.WriteLine("Can you provide two numbers?");
			info[0] = Convert.ToInt32(Console.ReadLine());
			info[1] = Convert.ToInt32(Console.ReadLine());
			return info;
		}
	}

	class mainProgram
	{
		static void Main(string[] args)
		{
			int[] info = new int[2];
			info = ProblemOne.introduceUser();
			HelperMethod.printContentsArray("Numbers to calculate on:", info);
			ProblemOne x = new ProblemOne(1,3);
			HelperMethod.printNiceMessage("Contents:", x.getAmountSequence());
		}
	}
}
