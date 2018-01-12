$(document).ready(function() {
  var date = new Date();
  var d = date.getDate();
  var m = date.getMonth();
  var y = date.getFullYear();

/*  $("#link-teacher").change(function(){
    $('#calendar').fullCalendar("removeEvents");
  });
*/

//ORIGNAL
 $(".teacher").on("change",function(){
    console.log($(this).val());
    $("#calendar").fullCalendar("refetchEvents");

  });


  var calendar = $('#calendar').fullCalendar({
   editable: true,
   header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay'
   },
  defaultView:'agendaWeek',
  timeFormat: 'h:mm',
  displayEventEnd :true,
  eventLimit: true,
  // events: 'events.php',
  events: function ( start, end, timezone, callback ) {

     $.ajax({
        url: 'events.php',
        dataType: 'json',
        data: {
            start: start.unix(),
            end: end.unix(),
            teacher: $('.teacher').val()

        },
         success: function(doc) {
               /* console.log(doc);*/
            var events = [];
            $(doc).find('event').each(function() {
              events.push({
                title: $(this).attr('title'),
                start: $(this).attr('start')
              });

            });
            callback(doc);
         }
     });
  },
   
   // Convert the allDay from string to boolean
   eventRender: function(event, element, view) {
   // console.log(event);

    $(element).attr('el-id', event.id);
    $(element).attr('start',event.start);
    // console.log
    $(element).contextmenu(function(event){
      event.preventDefault();
    });
    var color = $(element).contextmenu(changeColor);

   },
   selectable: true,
   selectHelper: true,
   select: function(start, end, allDay) {
	   var title = prompt('اسم المدرس:');

	  // var url = prompt('Type Event url, if exits:');

   		if (title) {
  			 var start = $.fullCalendar.moment(start).format();
  			 var end = $.fullCalendar.moment(end).format();
   			/* console.log(console.log(start));*/
  			 $.ajax({
  					 url: "add_events.php",
          	 data: 'title='+ encodeURIComponent(title)+
                '&start='+encodeURIComponent(start)+
                '&end='+encodeURIComponent(end),
          //    +  '&url='+ encodeURIComponent(url),
  					 type: 'POST',
             dataType:'text',
   					success: function(json) {
   						                     alert('وضعنا المدرس على الجدول');
  					 },
					error: function(xhr, textStatus, errorThrown) {
    					                     alert(xhr.responseText); 
  					}
  			 });
   			calendar.fullCalendar('renderEvent',
   			{
  				 title: title,
  				 start: start,
  				 end: end,
   			//	 url:url,
  				 allDay: allDay
  			},
   				true // make the event "stick"
   			);
   		}
  		calendar.fullCalendar('unselect');
      calendar.fullCalendar('refetchEvents');
   },
  
   editable: true,
   eventDrop: function(event, delta) {
                  var start = $.fullCalendar.moment(event.start);
                  var end = $.fullCalendar.moment(event.end);
                  $.ajax({
                           url: 'update_events.php',
                           data: 'title='+ encodeURIComponent(event.title)+
                                 '&start='+encodeURIComponent(start)+
                                 '&end='+encodeURIComponent(end)+
                                 '&id='+ encodeURIComponent(event.id),
                           type: 'POST',
                           dataType: 'text',
                           success: function(json) {
                                                    alert("غيرت معلومالت المدرس");
                           },

                          error: function(xhr, textStatus, errorThrown) {
                                                     alert(xhr.responseText);
                          }
                  });
   },
   eventResize: function(event) {
                  var start = $.fullCalendar.moment(event.start);
                  var end = $.fullCalendar.moment(event.end);
                  $.ajax({
                          url: "update_events.php",
                          data: 'title='+ encodeURIComponent(event.title)+
                                 '&start='+encodeURIComponent(start)+
                                 '&end='+encodeURIComponent(end)+
                                 '&id='+ encodeURIComponent(event.id),
                          type: 'POST',
                          dataType: 'text',
                          success: function(json) {
                                                  alert("غيرت معلومالت المدرس");
                          },

                          error: function(xhr, textStatus, errorThrown) {
                                                     alert(xhr.responseText);
                          }
                  });

    },
    eventClick: function(event) {
                var decision = confirm("هل تريد ان تحذف هذه معلومة?"); 
                if (decision) {
                    $.ajax({
                           
                           url: "delete_events.php",
                           type: 'POST',
                           data: '&id='+ encodeURIComponent(event.id),
                           dataType: 'text',
                    });
                    $('#calendar').fullCalendar('removeEvents', event.id);

                } 
    }
   
  });
  
 });




/*
Set up the removeEvents function and than set the addEventSource function a spart of ajax response.
success: function(response) 
{
  $('#calendar').fullCalendar('addEventSource', response);
}
*/
