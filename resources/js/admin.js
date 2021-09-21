require('./bootstrap');

const deleteButton = document.querySelectorAll('.delete-post-form');


deleteButton.forEach(item =>{
    item.addEventListener('submit',function(e){

        confirm('Sicuro di voler cancellare il post?')
    })


});



