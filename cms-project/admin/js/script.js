$(document).ready(function(){
  ClassicEditor
  .create( document.querySelector( '#editor' ) )
  .catch( error => {
      console.error( error );
  } );

  // Admin - Posts table - Target all checkboxes in one click
  $('#selectAllBoxes').click(function(event){
    if(this.checked){
      $('.checkbox').each(function(){
        this.checked = true;
      });
    }else{
      $('.checkbox').each(function(){
        this.checked = false;
      });
    }
  });
});