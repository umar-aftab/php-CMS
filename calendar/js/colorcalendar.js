var currentElement = null;

function changeColor(element) {
  //event.preventDefault();
  currentElement = element.currentTarget;

  // $(el).css('background', 'red');

    $(".custom-menu").data('element', $(this)).finish().toggle(100).
      // In the right position (the mouse)
      css({
        top: element.pageY + "px",
        left: element.pageX + "px"
      });
}

// If the menu element is clicked
$("ul.custom-menu li").click(function() {  
//var $event = $(this).parent().data('event'); 
//var color = $(this).attr('data-color') || 'lightblue'; 
// Default to light blue
// $event.css('background-color', color);
 switch($(this).attr("data-action")) {
        // var color = '';
        // A case for each action. Your actions here
        case "red": 
         // var event = $(currentElement);
         $(currentElement).css("background-color","red");
         saveElementColor('red');
          break;
            // saveColor('red');
        
        case "green": 

          // var $event = $(".fc-event");
          // $event.css("background-color","green"); 
         $(currentElement).css("background-color","green");
         saveElementColor('green');
            // saveColor(color);

          break;

          case "blue": 
         // var event = $(currentElement);
          $(currentElement).css("background-color","blue");
          saveElementColor('blue');
            // saveColor(color, element);

          break;

    }
  

  // Hide it AFTER the action was triggered
  $(".custom-menu").hide(100);
});


function saveElementColor(color)
{
  
  console.log(currentElement);
  var id = $(currentElement).attr('el-id');
  var start = $(currentElement).attr('start');
  console.log(id);
  console.log(color);
 // console.log(start);

   $.ajax({
     url: 'update_color.php',
     type: 'post',
     data: //{id: id, color: color}
          'id='+ encodeURIComponent(id)+
          '&color='+encodeURIComponent(color),

     type: 'POST',
     dataType:'text',
     success: function(json) {
             alert('Added Successfully');
     },
     error: function(xhr, textStatus, errorThrown) {
             alert(xhr.responseText); 
     } // update where id = 

   });
}
