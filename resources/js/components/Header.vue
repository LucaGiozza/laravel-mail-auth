<template>
    <div>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <div class="container-fluid">

           <router-link :to="{ name: 'home' }" class="navbar-brand">
               Boolpress
           </router-link>
         
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav">
             <li class="nav-item" v-for="(link,index) in menuBoolpress" :key="index">

                 <router-link :to="{ name: link.routeName}"  class="nav-link active">

                    {{link.label}}
                 </router-link>
                
             </li>

             <!-- cosi senza ciclo for -->
             <!-- <li class="nav-item">
                 <router-link :to="{ name: 'about'}" class="nav-link">
                     Chi siamo

                 </router-link>

               
             </li> -->
             <!-- <li class="nav-item">
                <a class="nav-link" href="#">Contatti</a>
             </li> -->
             
           </ul>
         </div>
       </div>
     </nav>
 </div>
</template>

<script>
export default {
    name: "Header",
    data(){

        return{
            menuBoolpress: [

                {
                    label:'Home',
                    routeName: 'home'
                },
                 {
                    label:'Chi siamo',
                    routeName: 'about'
                },
                 {
                    label:'Contatti',
                    routeName: 'contact'
                },
            ]
        }
    }
     
}
</script>
<style lang="scss" scoped>

</style>