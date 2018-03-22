clear all

conn = database('demo1','root','lxy369874521','com.mysql.jdbc.Driver','jdbc:mysql://127.0.0.1:3306/demo1');

str = exec(conn,['SELECT symbol FROM sys_stock ']);
str=fetch(str);
str=str.data;

%while 1 

    for i=1:length(str)
        a =  str{i}; 

        cursorA = exec(conn,['SELECT Open, High, Low, Close, Volume FROM stocks_history Where Symbol= ''',a,''' order by StockID desc ']);
        cursorA=fetch(cursorA);
        cursorA=cursorA.data;
        cursorA = cell2mat(cursorA);
        [m,n]=size(cursorA);
        ts=cursorA(1:m,1);
        time = length(ts);
        win_num = floor(time/5);
        tsx = 1:win_num;
        tsx = tsx';

        [Low,R,Up] = FIG_D(ts','triangle',win_num);
        [TSX,TSXps] = mapminmax(tsx,100,500);

        [r, r_ps] = mapminmax(R,100,500);
        r=r';
        [bestmse,bestc,bestg]=...
            SVMcgForRegress(r,TSX,-8,8,-8,8);

        [bestmse,bestc,bestg]=...
            SVMcgForRegress(r,TSX,-4,4,-4,4,3,0.5,0.5,0.05); 

        cmd=['-c ',num2str(bestc),' -g ',num2str(bestg) , '-s 3 -p 0.1'];
        r_model = svmtrain(r,TSX,cmd);
        [r_predict,r_mse,r_decision_values] = svmpredict(r,TSX,r_model);
        r_predict = mapminmax('reverse',r_predict,r_ps);
        predict_r = svmpredict(1,win_num+1,r_model);
        predict_r = mapminmax('reverse',predict_r,r_ps);
        data = num2str(predict_r);
        tablename = 'svm_pre';
        colnames = {'Predict'};
        %data = {predict_r};
        %whereclause = ['where name=''',a,''' '];
        %update(conn,tablename,colnames,predict_r,['where Symbol=''',a,''' ']);

        URL = 'http://se2.peterjiang.me/stockadmin/update_hit_pre.php';
        str_1 = urlread(URL,'Get',{'s', a  ,'d','svm','v',  data });
    end

    %pause(3600);
%end
