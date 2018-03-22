#include "Eigen/Dense"

using namespace Eigen;

#include <iostream>
#include <fstream>
using namespace std;
#define N 10
#define M 6
int main()
{

	

	double alph = 0.0047;
	double beta = 0.225;
	double x_train[N];
	double t_train[N];
	double  x_train_phi[N][M+1];
	double x;
	double x_phi[M+1];
	char filename[20];
	cin >> filename;
	fstream input;
	input.open(filename);

	for (int i = 0; i < N; i++)
	{
		input >>  t_train[i];
		x_train[i] = i + 1;
	}
	x = N + 1;
	for (int i = 0; i < N; i++)
	{
		x_train_phi[i][0] = 1;
	}
	x_phi[0] = 1;
	for (size_t i = 0; i < N; i++)
	{
		for (size_t j = 1; j <= M; j++)
		{
			x_train_phi[i][j] = x_train_phi[i][j - 1] * x_train[i];
			x_phi[j] = x_phi[j - 1] * x;
		}
	}	
	MatrixXd S_inverse(M+1, M+1);

	for (size_t i = 0; i <= M; i++)
	{
		for (size_t j = 0; j <= M; j++)
		{
			S_inverse(i, j) = 0;
		}
	}
	VectorXd train_fai(M+1);
	for (size_t i = 0; i <N; i++)
	{
		for (size_t j = 0; j <=M; j++)
		{
			train_fai(j) = x_train_phi[i][j];
			
		}
		
		S_inverse += train_fai*train_fai.transpose();
	}	


	S_inverse = S_inverse*beta;
	VectorXd x_phi_vector(M+1);
	VectorXd sum(M+1);
	for (size_t i = 0; i <=M; i++)
		{
			sum(i) = 0;
			x_phi_vector(i) = x_phi[i];
		}	

	
	for (size_t i = 0; i <= M; i++)
	{
		S_inverse(i, i) += alph;
	}
	
	MatrixXd S;


	S = S_inverse.inverse();

	
	
	//cout << S;

	VectorXd s2x;
	VectorXd mx;
	double mx_value;
	double s2x_value;
	s2x = x_phi_vector.transpose()*S*x_phi_vector;

	s2x_value = s2x(0);
	s2x_value += (1 / beta);
	for (size_t i = 0; i < N; i++)
	{
		for (size_t j = 0; j <= M; j++)
		{
			sum(j) += t_train[i] * x_train_phi[i][j];
		}

	}
	

	mx = beta*x_phi_vector.transpose()*S*sum;
	mx_value = mx(0);
	cout <<"The predictive value is "<< mx_value<<endl;
	cout << "The predictive variance is " << s2x_value << endl;
	//cout << "The actual value is " << t << endl;
	return 0;
}