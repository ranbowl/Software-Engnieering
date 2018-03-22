%clear all variables
clear all;

%------------ DECLARE A FEW CONSTANTS ------------

%database name
db = 'demo1'; 
%database url
dburl = ['jdbc:mysql://127.0.0.1:3306/demo1' db]; 
%mysql driver
driver = 'com.mysql.jdbc.Driver';
%uername and password
username = 'root';
password = 'lxy369874521';
%number of days ahead to predict
N = 5;

%establish connection to the database
conn = database('demo1','root','lxy369874521','com.mysql.jdbc.Driver','jdbc:mysql://127.0.0.1:3306/demo1');

tic %start timer

%get current year, month, and dat
dateVector = clock;
year = dateVector(1);
month = dateVector(2);
day = dateVector(3);

%format current date
currDate = [num2str(year) '-' num2str(month) '-' num2str(day)];
%format the date of one year prior
yearBefore = [num2str(year - 1) '-' num2str(month) '-' num2str(day)];

%if a connection exists
str = exec(conn,['SELECT symbol FROM sys_stock ']);
str=fetch(str);
str=str.data;

for iii=1:length(str)
    a =  str{iii}; 
    %get open, high, low, close, and volume of stocks for the previous
    %year
curs = exec(conn,['SELECT Open, High, Low, Close, Volume FROM stocks_history WHERE Symbol= ''',a,''' order by StockID desc']);
curs = fetch(curs);  
data = curs.data;
        
   
fiveDayPrice2 = Prediction_EMA(cell2mat(data(:,4)));
       
 currPrice = curs.data{:,1};
 
 fiveDayprice = zeros(1,1);
 i=1;
 fiveDayprice(i) = fiveDayPrice2(i);
 
 nextDayPrice = fiveDayprice(1);
 avgPredictedprice = mean(fiveDayprice);
 %calculate the gain
 gain = avgPredictedprice - currPrice;
 
 %add in current price into 5 day forecast
 yc = [currPrice fiveDayprice];
 
 %if gain is within 10 cents declare hold decision
 if abs(gain) < 0.1
    decision = 0;
    days = 0;
 %otherwise of gain is positive declare buy decision
 elseif gain > 0
    decision = 1;
    index = find(yc > avgPredictedprice,1);
    [price, days] = min([currPrice yc(1:index)]);
    days=days-1;
 %otherwise gain is negative, declare hold decision
 else
    decision = -1;
    index = find(yc < avgPredictedprice,1);
    [price, days] = min([currPrice yc(1:index)]);
    days=days-1;
 end

%insert all calculated data into the database
%datainsert(conn,'Predictions',{'StockID', 'Date', 'NextDayPrice', 'AvgPrice', 'ConfidenceValue', 'PredictedDecision', 'Gain' ,'WaitTime'},{ID{currID}, datestr(currDate, 'yyyy-mm-dd'), nextDayPrice, avgPredictedprice, confidence, decision, gain, days});
%end

%time take for the prediction session
%elapsedTime = toc

tablename = 'EMA_pre';
colnames = {'PRE'};
whereclause = ['where name=''',a,''' '];
%update(conn,tablename,colnames,decision,['where Symbol=''',a,''' ']); 
data_ema = num2str(decision);
URL = 'http://se2.peterjiang.me/stockadmin/update_hit_pre.php';
str_1 = urlread(URL,'Get',{'s', a  ,'d','ema','v',  data_ema });
end


%close database connection
close(conn);

