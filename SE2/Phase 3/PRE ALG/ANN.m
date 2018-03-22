function [fiveDayPrice] = ANN(data, delay) 

traindata = length(data);
        
        %allocate memory for training data
        inputSeries = cell(1,traindata); %secondary data (open, high, low, volume)
        targetSeries = cell(1,traindata); %primary data to be predicted (close)
        
       
        
        %fill in data from the query data
        for i=1:traindata
           inputSeries{i} = datenum(data{i, 6});
           targetSeries{i} = data{i, 4};
        end
        
     

inputDelays = 1:delay;
feedbackDelays = 1:delay;

hiddenLayerSize = 50;


net = narxnet(inputDelays,feedbackDelays,hiddenLayerSize);


[inputs,inputStates,layerStates,targets] = preparets(net,inputSeries,{},targetSeries);

net.divideParam.trainRatio = 70/100;
net.divideParam.valRatio = 15/100;
net.divideParam.testRatio = 15/100;


[net,tr] = train(net,inputs,targets,inputStates,layerStates);

dateVector = clock;
year = dateVector(1);
month = dateVector(2);
day = dateVector(3);

%secondary data series used for prediction
inputSeriesPred  = [inputSeries(end-delay+1:end),datenum(year,month,day)+1:datenum(year,month,day)+5];
%primary data series used for prediction concatenated with NANS for closing
%prices yet unknown
targetSeriesPred = [targetSeries(end-delay+1:end), con2seq(nan(1,5))];


netc = closeloop(net); %close the loop
netc.name = [net.name ' - Closed Loop'];

[xc,xic,aic,tc] = preparets(netc,inputSeriesPred,{},targetSeriesPred);
%yc is the closed loop output
yc = netc(xc,xic,aic);
%we only care about the last 5 days since we already know the first and
%second
fiveDayPrice = cell2mat(yc);