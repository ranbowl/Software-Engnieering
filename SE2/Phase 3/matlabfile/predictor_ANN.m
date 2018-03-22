%clear all variables
clear all;

%------------ DECLARE A FEW CONSTANTS ------------
conn = database('demo1','root','lxy369874521','com.mysql.jdbc.Driver','jdbc:mysql://localhost:3306/demo1');
isconnection(conn) ;
str = exec(conn,['SELECT symbol FROM sys_stock ']);
str=fetch(str);
str=str.data;
for i=1:length(str)
    a =  str{i}; 



conn = database('demo1','root','lxy369874521','com.mysql.jdbc.Driver','jdbc:mysql://127.0.0.1:3306/demo1');



%format current date

curs = exec(conn,['SELECT Open, High, Low, Close, Volume, Date FROM stocks_history WHERE Symbol= ''',a,''' order by StockID desc']);
curs = fetch(curs);  
data = curs.data;
        
    [fiveDayPrice1] = ANN(data, 7)
%fiveDayPrice2 = Prediction_EMA(cell2mat(data(:,4)));
       


tablename = 'ann_pre';
colnames = {'Predict'};

%update(conn,tablename,colnames,ans,['where Symbol=''',a,''' ']);

data = num2str(fiveDayPrice1(1));
URL = 'http://se2.peterjiang.me/stockadmin/update_hit_pre.php';
str_1 = urlread(URL,'Get',{'s', a  ,'d','ann','v',  data });
end
%close database connection
close(conn);

