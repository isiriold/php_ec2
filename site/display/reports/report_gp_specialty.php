 <?php
 
  
   include("pChart/pData.class");     
   include("pChart/pChart.class");     
   
   
   // Dataset definition      
   $DataSet = new pData;   
  
   $db = mysql_connect("localhost", "root", "isiri");  

   if ( $db == "" ) { 
   	echo " DB Connection error...\r\n"; 
   }  
  
   mysql_select_db("dpm_maindb_new",$db); 
				
	
	$Request = "	select specialty, month_name,sum(time_spent_mins)/nbr_of_sessions as avg_time_spent_per_sess
						from dpm_maindb_new.dpm_t_rpt_usr_activity
						where specialty = 'GENERAL PRACTICE'
						group by specialty,month_name";
									
   $result  = mysql_query($Request,$db);  
 
	
   while ($row = mysql_fetch_array($result))  
   {  
     
	  $DataSet->AddPoint($row["avg_time_spent_per_sess"],"Serie1");  
 
   }  
   

   //$DataSet->AddAllSeries(); 
   
   // Set the X Labels
   $DataSet->AddPoint("Jan","XLabel"); 
   $DataSet->AddPoint("Feb","XLabel"); 
   $DataSet->AddPoint("Mar","XLabel"); 
   $DataSet->AddPoint("Apr","XLabel"); 
   $DataSet->AddPoint("May","XLabel"); 
   $DataSet->AddPoint("Jun","XLabel"); 
   $DataSet->AddPoint("Jul","XLabel");  
 
    
   //$DataSet->SetAbsciseLabelSerie("XLabel");     
   $DataSet->SetSerieName("EJohnson","Serie1");     
    
   $DataSet->SetYAxisName("Average Time per Session");  
   $DataSet->SetYAxisUnit("mins");  
   $DataSet->AddSerie("Serie1");
   $DataSet->SetAbsciseLabelSerie("XLabel");
   
    
   // Initialise the graph     
   $Test = new pChart(700,230);     
   $Test->setFontProperties("Fonts/tahoma.ttf",8);     
   $Test->setGraphArea(70,30,680,200);     
   $Test->drawFilledRoundedRectangle(7,7,693,223,5,240,240,240);     
   $Test->drawRoundedRectangle(5,5,695,225,5,230,230,230);     
   $Test->drawGraphArea(255,255,255,TRUE);  
   $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2);     
   $Test->drawGrid(4,TRUE,230,230,230,50);  

  
   // Draw the 0 line     
   $Test->setFontProperties("Fonts/tahoma.ttf",6);     
   $Test->drawTreshold(0,143,55,72,TRUE,TRUE);     
    
   // Draw the line graph  
   $Test->drawLineGraph($DataSet->GetData(),$DataSet->GetDataDescription());     
   $Test->drawPlotGraph($DataSet->GetData(),$DataSet->GetDataDescription(),3,2,255,255,255);     

   echo "hello world";
   
   // Finish the graph     
   $Test->setFontProperties("Fonts/tahoma.ttf",8);     
   $Test->drawLegend(75,35,$DataSet->GetDataDescription(),255,255,255);     
   $Test->setFontProperties("Fonts/tahoma.ttf",10);     
   $Test->drawTitle(60,22,"report 2",50,50,50,585);     
   $Test->Render("report2.png");
   //$Test->Render->Stroke()   


?>

   
