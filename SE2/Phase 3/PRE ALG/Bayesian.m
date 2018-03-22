clear all

conn = database('demo1','root','root','com.mysql.jdbc.Driver','jdbc:mysql://localhost:3306/demo1');
isconnection(conn) 

str = exec(conn,['SELECT symbol FROM sys_stock ']);
str=fetch(str);
str=str.data;
for i=1:length(str)
    a =  str{i}; 

cursorA = exec(conn,['SELECT  DISTINCT Price  FROM stocks_realtime  Where Symbol= ''',a,''' order by StockID desc ']);
cursorA=fetch(cursorA);
cursorA=cursorA.data;
cursorA = cell2mat(cursorA);

M=6;
N=10;
alph=0.0047;
beta=0.225;
x_train = 1:N;
t_train=cursorA(1:10);

for i=1:N
    phi=1;
    for j=2:M+1
        phi(j)=phi(j-1)*i;
    end
    
    b{i}=phi;
end
x_phi=[1];
for i=2:M+1
    x_phi(i)=x_phi(i-1)*11;
end
for i=1:N
    S_inverse=S_inverse+b{i}'*b{i};
end
S_inverse=S_inverse*beta;
S_inverse=S_inverse+alph*eye(M+1);

S=S_inverse^-1;
temp=b{1}'.*t_train(1);
for i=2:N
   temp=temp+b{i}'.*t_train(i);
end
ans=beta*x_phi*S*temp

end

