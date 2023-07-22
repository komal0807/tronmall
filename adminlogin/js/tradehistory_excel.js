	$(document).ready(function () { 
		$("#formID").on('submit',(function(e) {
		e.preventDefault();
var userid = $('select#userid').val();
var tabtype = $('select#tabtype').val();
var periodid = $('input#periodid').val();
var startdate = $('input#startdate').val();
var enddate = $('input#enddate').val();
var startdate1 = startdate.split('-');
var enddate1 = enddate.split('-');

function addDays(theDate, days) {
    return new Date(theDate.getTime() + days*24*60*60*1000);
}


var newstartDate =new Date( startdate1[2] + '-' + startdate1[1] + '-' + startdate1[0].slice(-2));
var newendDate = new Date(enddate1[2] + '-' + enddate1[1] + '-' + enddate1[0].slice(-2));
var newDate = addDays(newstartDate, 30);
//alert(tabtype);
if(newendDate<newstartDate){
alert('End date must be greater than start date');
return false;
}
if(newendDate>newDate){
alert('More than 30 days not allowed');
return false;
}
		
$.ajax({
			type: "POST", 
			url: "usertradehistoryExcelNow.php",              
			data: new FormData(this), 
			contentType: false,       
			cache: false,             
			processData:false,       

			success: function(html)   
			{ 
			    console.log(html);
			    if(html==2)
			    { 
			        alert("Data not found according to your search...");
			        return false;
				}
			$.each(JSON.parse(html), (index, row) => {
			  const rowContent 
			  = `<tr>
			       <td>${row.id}</td>
			       <td>${row.mobile}</td>
			       <td>${row.code}</td>
			       <td>${row.owncode}</td>
			       <td>${row.createdate}</td>
			       <td>${row.periodid}</td>
			       <td>${row.tab}</td>
			       <td>${row.amount}</td>
			       <td>${row.value}</td>
			       <td>${row.result}</td>
			       <td>${row.color}</td>
			       <td>${row.status}</td>
			       <td>${row.paidamount}</td>
			     </tr>`;
			  $('#table_data').append(rowContent);
			});
		
			
			}
		});
	
	}));
	
	
	
});